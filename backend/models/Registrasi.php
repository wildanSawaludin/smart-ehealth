<?php

namespace backend\models;

use Yii;
use yii\db\Query;

/**
 * This is the model class for table "registrasi".
 *
 * @property integer $id
 * @property string $no_reg
 * @property integer $pasienId
 * @property string $tanggal_registrasi
 * @property string $status_registrasi
 * @property string $asal_registrasi 
 * @property string $status_pelayanan
 * @property string $tanggal_kunjungan
 * @property string $status_rawat
 * @property string $dr_penanggung_jawab
 * @property integer $icdx_id
 * @property string $status_asuransi
 * @property string $catatan
 * @property string $asuransi_noreg
 * @property string $asuransi_noreg_other
 * @property string $asuransi_nama
 * @property string $asuransi_tgl_lahir
 * @property string $asuransi_status_jaminan
 * @property string $asuransi_penanggung_jawab
 * @property string $asuransi_alamat
 * @property string $asuransi_notelp
 * @property integer $no_antrian 
 * @property integer $asuransi_provider_id 
 * @property integer $faskes_id 
 * @property integer $no_resep_racikan
 * @property integer $no_resep_nonracikan
 *
 * @property Anamnesa[] $anamnesas
 * @property AsuransiProvider $asuransiProvider 
 * @property FasilitasKesehatan $faskes 
 * @property Icdx $icdx
 * @property Pasien $pasien
 */
class Registrasi extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'registrasi';
    }

    /**
     * @inheritdoc
     */
    public $pasienNama;
    public $tanggal_registrasi_format;
    public $nomorRegistrasi;
    public $no_rm;
    public $jenis_kelamin;
    public $fasilitas_kesehatan;

    public function rules() {
        return [
            [['pasienId', 'status_pelayanan'], 'required'],
            [['pasienId', 'asuransi_provider_id', 'icdx_id', 'no_antrian', 'faskes_id', 'nomorRegistrasi', 'usia'], 'integer'],
            [['tanggal_registrasi', 'asuransi_tgl_lahir', 'no_rm', 'jenis_kelamin', 'fasilitas_kesehatan'], 'safe'],
            [['status_registrasi', 'asal_registrasi', 'status_pelayanan', 'status_rawat', 'status_asuransi', 'catatan', 'faskes'], 'string'],
            [['no_reg', 'asuransi_noreg', 'asuransi_noreg_other', 'asuransi_notelp'], 'string', 'max' => 15],
            [['dr_penanggung_jawab', 'asuransi_nama'], 'string', 'max' => 25],
            [['asuransi_status_jaminan', 'asuransi_penanggung_jawab', 'asuransi_alamat'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'no_reg' => 'No Registrasi',
            'pasienId' => 'Pasien',
            'tanggal_registrasi' => 'Tanggal Registrasi',
            'status_registrasi' => 'Status Registrasi',
            'status_pelayanan' => 'Status Pelayanan',
            'status_rawat' => 'Status Rawat',
            'dr_penanggung_jawab' => 'Dokter Penanggung Jawab',
            'icdx_id' => 'Diagnosa',
            'status_asuransi' => 'Status Asuransi',
            'catatan' => 'Catatan',
            'asuransi_noreg' => 'No Reg Asuransi',
            'asuransi_noreg_other' => 'No Reg Asuransi',
            'asuransi_nama' => 'Nama Asuransi',
            'asuransi_tgl_lahir' => 'Tanggal Lahir',
            'asuransi_status_jaminan' => 'Status Jaminan',
            'asuransi_penanggung_jawab' => 'Penanggung Jawab',
            'asuransi_alamat' => 'Alamat',
            'asuransi_notelp' => 'No Telepon/HP',
            'asuransi_provider_id' => 'Asuransi',
            'faskes_id' => 'Faskes ID',
            'usia' => 'Usia',
            'kategoriUsia' => 'Kategori Usia',
            'nomorRegistrasi' => 'No Registrasi',
            'no_rm' => 'No RM',
            'jenis_kelamin' => 'Jenis Kelamin',
            'fasilitas_kesehatan' => 'Fasilitas Kesehatan'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnamnesas() {
        return $this->hasMany(Anamnesa::className(), ['registrasi_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIcdx() {
        return $this->hasOne(Icdx::className(), ['id' => 'icdx_id']);
    }

    /**
     * @return \yii\db\ActiveQuery 
     */
    public function getAsuransiProvider() {
        return $this->hasOne(AsuransiProvider::className(), ['id' => 'asuransi_provider_id']);
    }

    /**
     * @return \yii\db\ActiveQuery 
     */
    public function getFaskes() {
        return $this->hasOne(FasilitasKesehatan::className(), ['id' => 'faskes_id']);
    }

    public function getPasien() {
        return $this->hasOne(Pasien::className(), ['id' => 'pasienId']);
    }

    public function getUsia() {
        try {
            $birthDay = new \DateTime($this->pasien->tgl_lahir);
            $now = new \DateTime();
            $diff = $now->diff($birthDay);
            return $diff->format('%y'); 
        }
        catch(\Exception $e) {
            return 0;
        }
    }

    public function getKategoriUsia() {
        // Bayi 0 - 11 bulan => 0
        // Anak 1 - 12 tahun => 1
        // Dewasa > 12 tahun => 2

        try {
            $birthDay = new \DateTime($this->pasien->tgl_lahir);
            $now = new \DateTime();
            $diff = $now->diff($birthDay);
            $totalmonth = $diff->format('%y') * 12 + $diff->format('%m');

            if($totalmonth > 12 * 12) {
                return 2;
            }
            else if($totalmonth >= 12 && $totalmonth <= 12 * 12) {
                return 1;
            }
            else 
                return 0;

        }
        catch(\Exception $e) {
            return 0;
        }
    }

    public function afterFind() {
        $birthDay = new \DateTime($this->pasien->tgl_lahir);
        $now = new \DateTime();
        $diff = $now->diff($birthDay); 

        $this->fasilitas_kesehatan = $this->faskes->nama;
        $this->jenis_kelamin = $this->pasien->jenkel;
        $this->no_rm = str_pad($this->pasien->id, 6, '0', STR_PAD_LEFT);
        $this->nomorRegistrasi = $this->asal_registrasi[0].'-'.str_pad($this->id, 6, '0', STR_PAD_LEFT);
    }

    public function beforeSave($insert) {
        if (parent::beforeSave($insert)) {

            if($this->isNewRecord) {
                $query = new Query;
                $counter = $query->select(['IFNULL(max(no_antrian), 0) + 1 as counter'])
                    ->from('registrasi')
                    ->where('tanggal_registrasi > "' . date('Y-m-d') . '"');
                $command = $query->scalar();

                $this->status_registrasi = 'Antrian';
                $this->asal_registrasi = 'Web';
                $this->faskes_id = 1;
                $this->no_antrian = $command;
            }

            return true;
        } else {
            return false;
        }
    }
}
