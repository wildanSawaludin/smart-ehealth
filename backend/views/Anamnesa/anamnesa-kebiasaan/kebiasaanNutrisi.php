<?php
/**
 * Created by PhpStorm.
 * User: rio
 * Date: 25/03/15
 * Time: 20:19
 */

use kartik\widgets\ActiveForm;
use kartik\widgets\Typeahead;
use yii\bootstrap\Modal;
use yii\helpers\Url;

?>

<div class="modal-content" style="width: 950px;margin-left: 260px;margin-top: 100px">
    <div class="modal-header">
        Nutrisi
        <a class="close" data-dismiss="modal">&times;</a>
    </div>

    <div class="modal-body">
        <?php $form = ActiveForm::begin([
            'id' => 'kebiasaanNutrisi-form',
            'enableAjaxValidation' => false,
            'enableClientValidation' => true,
            'type' => ActiveForm::TYPE_HORIZONTAL,
            'formConfig' => [
                'deviceSize' => ActiveForm::SIZE_SMALL,
                'labelSpan' => 1,
                'showLabels'=>false

            ]
        ]);
        ?>
        <ul class="nav nav-tabs" id="tabs-cnt" style="padding-top:0px;margin-bottom: 10px">
            <li class="active"><a href="#makanan" data-toggle="tab">Makanan </a></li>
            <li ><a href="#minuman" data-toggle="tab">Minuman</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade in active" id="makanan">
                <div class="form-group">
                    <div class="col-md-4">
                        <?= $form->field($model, 'nutrisi_selera_pil')->checkbox(['label' => 'Selera Makan :']) ?>
                    </div>
                    <div class="col-md-4">
                        <?= $form->field($model, 'nutrisi_selera_makan')->dropDownList(['Baik' => 'Baik', 'Meningkat' => 'Meningkat', 'Menurun' => 'Menurun']) ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-4">
                        <?= $form->field($model, 'makan_frekuensi_pil')->checkbox(['label' => 'Frekuensi :']) ?>
                    </div>
                    <div class="col-md-4">
                        <?= $form->field($model, 'makan_frekuensi')->dropDownList(['3 kali sehari' => '3 kali sehari', '< 3 kali sehari' => '< 3 kali sehari', '> 3 kali sehari' => '> 3 kali sehari']) ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-4">
                        <?= $form->field($model, 'makan_pembatasan_pil')->checkbox(['label' => 'Pembatasan Asupan :']) ?>
                    </div>
                    <div class="col-md-8">
                        <div class="col-md-6">
                            <?php
                                $model->makan_pembatasan_asupan = $pembatasan_asupan;
                                $list = ['Diet rendah garam' => 'Diet rendah garam', 'Diet rendah lemak' => 'Diet rendah lemak', 'Diet rendah purin' => 'Diet rendah purin',
                                            'Diet rendah sisa' => 'Diet rendah sisa', 'Diet rendah kalsium' => 'Diet rendah kalsium','Diet tinggi kalori' => 'Diet tinggi kalori', 'Diet tinggi protein' => 'Diet tinggi protein', 'Diet tinggi serat' => 'Diet tinggi serat',
                                'Diet rendah kalori' => 'Diet rendah kalori', 'Diet rendah protein' => 'Diet rendah protein' ];
                                echo $form->field($model, 'makan_pembatasan_asupan')->checkboxList($list);
                            ?>
                        </div>
                        <div class="col-md-6">
                            <?php
                            //$list2 = ['Diet tinggi kalori' => 'Diet tinggi kalori', 'Diet tinggi protein' => 'Diet tinggi protein', 'Diet tinggi serat' => 'Diet tinggi serat',
                              //  'Diet rendah kalori' => 'Diet rendah kalori', 'Diet rendah protein' => 'Diet rendah protein' ];
                            //$model->makan_pembatasan_asupan = $pembatasan_asupan;
                            //echo $form->field($model, 'makan_pembatasan_asupan')->checkboxList($list2);
                            ?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-4">
                        <?= $form->field($model, 'makan_menu_pil')->checkbox(['label' => 'Menu makan']) ?>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="minuman">
                <div class="form-group">
                    <div class="col-md-3">
                        <?= $form->field($model, 'minum_jenis_pil')->checkbox(['label' => 'Jenis :']) ?>
                    </div>
                    <div class="col-md-4">
                        <?= $form->field($model, 'minum_jenis')->dropDownList(['Air mineral' => 'Air mineral', 'Air bersoda' => 'Air bersoda', 'Teh' => 'Teh', 'Kopi' => 'Kopi', 'Jus' => 'Jus']) ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3">
                        <?= $form->field($model, 'minum_frekuensi_pil')->checkbox(['label' => 'Jenis :']) ?>
                    </div>
                    <div class="col-md-4">
                        <?= $form->field($model, 'minum_frekuensi')->dropDownList(['8 gelas per hari' => '8 gelas per hari', '< 8 gelas per hari' => '< 8 gelas per hari', '> 8 gelas per hari' => '> 8 gelas per hari']) ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3">
                        <?= $form->field($model, 'minum_cara_pil')->checkbox(['label' => 'Cara Pemenuhan :']) ?>
                    </div>
                    <div class="col-md-4">
                        <?= $form->field($model, 'minum_cara_pemenuhan')->radioList(['Mandiri' => 'Mandiri', 'Dengan bantuan orang lain']) ?>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-9">
                    <input id="btnKebiasaanNutrisiOk" type="button" class="btn btn-primary" value="OK">
                </div>
            </div>
        </div>
            <?php
                Modal::begin([
                    'id' => 'm_nutrisimenu',
                    'header' => 'Menu Makan'
                ]);
            ?>
                <ul class="nav nav-tabs" id="tabs-cnt" style="padding-top:0px;margin-bottom: 10px">
                    <li class="active"><a href="#makanan_pokok" data-toggle="tab">Makanan Pokok </a></li>
                    <li ><a href="#lauk_pauk" data-toggle="tab">Lauk Pauk</a></li>
                    <li ><a href="#sayuran" data-toggle="tab">Sayuran</a></li>
                    <li ><a href="#buah_buahan" data-toggle="tab">Buah-Buahan</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade in active" id="makanan_pokok">
                        <div class="form-group">
                            <div class="col-md-4">
                                <?php
                                    $listMakananPokok = ['Nasi' => 'Nasi', 'Roti' => 'Roti', 'Jagung' => 'Jagung', 'Singkong' => 'Singkong', 'Sagu' => 'Sagu'];
                                    echo $form->field($model, 'makan_menu_pokok')->checkboxList($listMakananPokok);
                                    //echo $form->field($model, 'makan_menu_pokok')->checkbox(['label' => '']);
                                ?>
                                <div class="checkbox"><label><input type="checkbox" name="Anamnesa[makan_menu_pokok][]"> <?= $form->field($model, 'makan_menu_pokok')->textInput(['placeholder' => 'Lainnya']) ?></label></div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="lauk_pauk">
                        <div class="form-group">
                            <div class="col-md-4">
                                <?php
                                $listLaukPauk = ['Ikan' => 'Ikan', 'Daging' => 'Daging', 'Telur' => 'Telur', 'Tempe' => 'Tempe', 'Tahu' => 'Tahu'];
                                echo $form->field($model, 'makan_menu_lauk')->checkboxList($listLaukPauk);
                                //echo $form->field($model, 'makan_menu_pokok')->checkbox(['label' => '']);
                                ?>
                                <div class="checkbox"><label><input type="checkbox" name="Anamnesa[makan_menu_lauk][]"> <?= $form->field($model, 'makan_menu_lauk')->textInput(['placeholder' => 'Lainnya']) ?></label></div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="sayuran">
                        <div class="form-group">
                            <div class="col-md-4">
                                <?php
                                $listSayuran = ['Kangkung' => 'Kangkung', 'Bayam' => 'Bayam', 'Wortel' => 'Wortel', 'Kentang' => 'Kentang', 'Daun kelor' => 'Daun kelor', 'Daun ubi' => 'Daun ubi'];
                                echo $form->field($model, 'makan_menu_sayur')->checkboxList($listSayuran);

                                ?>
                            </div>
                            <div class="col-md-4">
                                <?php
                                $listSayuran1 = ['Daun Pakis' => 'Daun Pakis', 'Daun kacang' => 'Daun kacang', 'Daun Singkong' => 'Daun Singkong', 'Kubis/kol' => 'Kubis/kol', 'Brokoli' => 'Brokoli'];
                                echo $form->field($model, 'makan_menu_sayur')->checkboxList($listSayuran1);

                                ?>
                                <div class="checkbox"><label><input type="checkbox" name="Anamnesa[makan_menu_sayur][]"> <?= $form->field($model, 'makan_menu_sayur')->textInput(['placeholder' => 'Lainnya']) ?></label></div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="buah_buahan">
                        <div class="form-group">
                            <div class="col-md-4">
                                <?php
                                $listSayuran = ['Apel' => 'Apel', 'Jeruk' => 'Jeruk', 'Anggur' => 'Anggur', 'Pepaya' => 'Pepaya', 'Jambu' => 'Jambu', 'Mangga' => 'Mangga'];
                                echo $form->field($model, 'makan_menu_sayur')->checkboxList($listSayuran);

                                ?>
                            </div>
                            <div class="col-md-4">
                                <?php
                                $listSayuran1 = ['Pisang' => 'Pisang', 'Alpukat' => 'Alpukat', 'Semangka' => 'Semangka', 'Durian' => 'Durian', 'Rambutan' => 'Rambutan', 'Salak' => 'Salak'];
                                echo $form->field($model, 'makan_menu_sayur')->checkboxList($listSayuran1);

                                ?>

                            </div>
                            <div class="col-md-4">
                                <?php
                                $listSayuran2 = ['Kelapa' => 'Kelapa', 'Melon' => 'Melon', 'Nangka' => 'Nangka', 'Pir' => 'Pir', 'Langsat' => 'langsat'];
                                echo $form->field($model, 'makan_menu_sayur')->checkboxList($listSayuran1);

                                ?>
                                <div class="checkbox"><label><input type="checkbox" name="Anamnesa[makan_menu_buah][]"> <?= $form->field($model, 'makan_menu_buah')->textInput(['placeholder' => 'Lainnya']) ?></label></div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php Modal::end(); ?>
        <?php ActiveForm::end(); ?>
    </div>
</div>

<script>var id = '<?php echo $_GET['id']; ?>' </script>
<script>
    $(document).ready(function(){
        jQuery('.numeric').keyup(function () {
            this.value = this.value.replace(/[^0-9\.]/g,'');
        });

        $('.lama_pemakaian_popup').click(function(){
            $('#m_lamapemakaianalkohol').modal('show');
        });

        $('#anamnesa-makan_menu_pil').change(function(){
           if($('#anamnesa-makan_menu_pil').prop('checked')){
               $('#m_nutrisimenu').modal('show');
           }
        });

        $('#btnKebiasaanNutrisiOk').click(function(){
            $.ajax({
                type: "POST",
                url: baseurl + 'Anamnesa/anamnesa-kebiasaan/update-kebiasaan-nutrisi?id='+id,
                data: $('#kebiasaanNutrisi-form').serialize(),
                success:function(data){
                    //alert('Success Update Data');
                    //$("#m_kebiasaanalkohol").modal('hide');
                }
            })
        });

        $('#btnLamaPemakaian').click(function(){
            $.ajax({
                type: "POST",
                url: baseurl + '/Anamnesa/anamnesa-kebiasaan/update-kebiasaan-alkohol?id='+id,
                data: "kebiasaan_alkohol_awal="+$('#anamnesa-kebiasaan_alkohol_awal').val()+"&kebiasaan_alkohol_berhenti="+$('#anamnesa-kebiasaan_alkohol_berhenti').val(),
                success:function(data){
                    alert('Success Update Data');
                    $("#m_lamapemakaianalkohol").modal('hide');
                }
            })
        });
    });
</script>