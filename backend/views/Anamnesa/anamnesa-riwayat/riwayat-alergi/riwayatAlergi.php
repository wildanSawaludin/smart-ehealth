<?php
/**
 * Created by PhpStorm.
 * User: rio
 * Date: 20/03/15
 * Time: 21:43
 */

use kartik\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\widgets\Typeahead;
use yii\helpers\Url;
use yii\bootstrap\Modal;

?>
<div class="modal-content" style="width: 750px;margin-left: 400px;margin-top: 100px">
    <div class="modal-header">
        Riwayat Penyakit
        <a class="close" data-dismiss="modal">&times;</a>
    </div>

    <div class="modal-body">
        <?php $form = ActiveForm::begin([
            'id' => 'riwayatPenyakit-form',
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
        <div class="col-md-3">
            <?= $form->field($model, 'alergi_obat_pil')->checkbox(['label' => 'Obat']); ?>
            <?= $form->field($model, 'alergi_makanan_pil')->checkbox(['label' => 'Makanan']); ?>
            <?= $form->field($model, 'alergi_sabun_pil')->checkbox(['label' => 'Sabun']); ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'alergi_udara_pil')->checkbox(['label' => 'Udara']); ?>
            <?= $form->field($model, 'alergi_debu_pil')->checkbox(['label' => 'Debu']); ?>
            <?= $form->field($model, 'alergi_lainnya_pil')->checkbox(['label' => 'lainnya']); ?>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">
                <input id="btnOk" type="button" class="btn btn-primary" value="OK">
            </div>
        </div>
        <?php
            Modal::begin([
                'id' => 'm_riwayatalergiobat',
                'header' => '<h7>Alergi Obat</h7>'
            ]);
        ?>
        <table class="table">
            <thead>
                <tr>
                    <th>Nama/Jenis</th>
                    <th><input type="button" id="btnTambah" class="btn btn-info" value="+"></th>
                </tr>
            </thead>
            <tbody id="nama_jenis">
                <?php
                    $explode = explode(',', $model->alergi_obat_jenis);

                    foreach ($explode as $key => $value) {
                ?>
                    <tr id="tr_jenis<?= $key ?>">
                        <td>
                            <?php
                                echo "<input type='text' value='$value' name='Anamnesa[alergi_obat_jenis]' class='form-control' id='anamnesa-alergi_obat_jenis'>";
                            ?>
                        </td>
                        <td id="delete_first">
                            <input type="button" onclick="deleteJenis(<?= $key ?>)" value="X" id="btnDel<?= $key ?>" class="btn btn-danger">
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">
                <input id="btnAlergiOk" type="button" class="btn btn-primary" value="OK">
            </div>
        </div>
        <?php
            Modal::end();
        ?>

        <!--popup alergi makanan-->
        <?php
        Modal::begin([
            'id' => 'm_riwayatalergimakanan',
            'header' => '<h7>Alergi Makanan</h7>'
        ]);
        ?>
        <table class="table">
            <thead>
            <tr>
                <th>Nama/Jenis</th>
                <th><input type="button" id="btnTambahMakanan" class="btn btn-info" value="+"></th>
            </tr>
            </thead>
            <tbody id="nama_jenis_makanan">
            <?php
            $explode = explode(',', $model->alergi_makanan);

            foreach ($explode as $key => $value) {
                ?>
                <tr id="tr_jenismakanan<?= $key ?>">
                    <td>
                        <?php
                        echo "<input type='text' value='$value' name='Anamnesa[alergi_makanan]' class='form-control' id='anamnesa-alergi_makanan'>";
                        ?>
                    </td>
                    <td id="delete_first">
                        <input type="button" onclick="deleteJenis(<?= $key ?>)" value="X" id="btnDel<?= $key ?>" class="btn btn-danger">
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>

        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">
                <input id="btnAlergiMakananOk" type="button" class="btn btn-primary" value="OK">
            </div>
        </div>
        <?php Modal::end(); ?>

        <!--popup alergi sabun-->
        <?php
        Modal::begin([
            'id' => 'm_riwayatalergisabun',
            'header' => '<h7>Alergi Sabun</h7>'
        ]);
        ?>
        <table class="table">
            <thead>
            <tr>
                <th>Nama/Jenis</th>
                <th><input type="button" id="btnTambahSabun" class="btn btn-info" value="+"></th>
            </tr>
            </thead>
            <tbody id="nama_jenis_sabun">
            <?php
            $explode = explode(',', $model->alergi_sabun);

            foreach ($explode as $key => $value) {
                ?>
                <tr id="tr_jenissabun<?= $key ?>">
                    <td>
                        <?php
                        echo "<input type='text' value='$value' name='Anamnesa[alergi_sabun]' class='form-control' id='anamnesa-alergi_sabun'>";
                        ?>
                    </td>
                    <td id="delete_first">
                        <input type="button" onclick="deleteJenis(<?= $key ?>)" value="X" id="btnDel<?= $key ?>" class="btn btn-danger">
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>

        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">
                <input id="btnAlergiSabunOk" type="button" class="btn btn-primary" value="OK">
            </div>
        </div>
        <?php Modal::end(); ?>

        <!--popup alergi udara-->
        <?php
        Modal::begin([
            'id' => 'm_riwayatalergiudara',
            'header' => '<h7>Alergi Udara</h7>'
        ]);
        ?>
        <table class="table">
            <thead>
            <tr>
                <th>Nama/Jenis</th>
                <th><input type="button" id="btnTambahUdara" class="btn btn-info" value="+"></th>
            </tr>
            </thead>
            <tbody id="nama_jenis_udara">
            <?php
            $explode = explode(',', $model->alergi_udara);

            foreach ($explode as $key => $value) {
                ?>
                <tr id="tr_jenisudara<?= $key ?>">
                    <td>
                        <?php
                        echo "<input type='text' value='$value' name='Anamnesa[alergi_udara]' class='form-control' id='anamnesa-alergi_udara'>";
                        ?>
                    </td>
                    <td id="delete_first">
                        <input type="button" onclick="deleteJenis(<?= $key ?>)" value="X" id="btnDel<?= $key ?>" class="btn btn-danger">
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>

        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">
                <input id="btnAlergiUdaraOk" type="button" class="btn btn-primary" value="OK">
            </div>
        </div>
        <?php Modal::end(); ?>

        <!--popup alergi debu-->
        <?php
        Modal::begin([
            'id' => 'm_riwayatalergidebu',
            'header' => '<h7>Alergi Debu</h7>'
        ]);
        ?>
        <table class="table">
            <thead>
            <tr>
                <th>Nama/Jenis</th>
                <th><input type="button" id="btnTambahDebu" class="btn btn-info" value="+"></th>
            </tr>
            </thead>
            <tbody id="nama_jenis_debu">
            <?php
            $explode = explode(',', $model->alergi_debu);

            foreach ($explode as $key => $value) {
                ?>
                <tr id="tr_jenisdebu<?= $key ?>">
                    <td>
                        <?php
                        echo "<input type='text' value='$value' name='Anamnesa[alergi_debu]' class='form-control' id='anamnesa-alergi_debu'>";
                        ?>
                    </td>
                    <td id="delete_first">
                        <input type="button" onclick="deleteJenis(<?= $key ?>)" value="X" id="btnDel<?= $key ?>" class="btn btn-danger">
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>

        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">
                <input id="btnAlergiDebuOk" type="button" class="btn btn-primary" value="OK">
            </div>
        </div>
        <?php Modal::end(); ?>

        <!--popup alergi lainnya-->
        <?php
        Modal::begin([
            'id' => 'm_riwayatalergilainnya',
            'header' => '<h7>Alergi Lainnya</h7>'
        ]);
        ?>
        <table class="table">
            <thead>
            <tr>
                <th>Nama/Jenis</th>
                <th><input type="button" id="btnTambahLainnya" class="btn btn-info" value="+"></th>
            </tr>
            </thead>
            <tbody id="nama_jenis_lainnya">
            <?php
            $explode = explode(',', $model->alergi_lainnya);

            foreach ($explode as $key => $value) {
                ?>
                <tr id="tr_jenislainnya<?= $key ?>">
                    <td>
                        <?php
                        echo "<input type='text' value='$value' name='Anamnesa[alergi_lainnya]' class='form-control' id='anamnesa-alergi_lainnya'>";
                        ?>
                    </td>
                    <td id="delete_first">
                        <input type="button" onclick="deleteJenis(<?= $key ?>)" value="X" id="btnDel<?= $key ?>" class="btn btn-danger">
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>

        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">
                <input id="btnAlergiLainnyaOk" type="button" class="btn btn-primary" value="OK">
            </div>
        </div>
        <?php Modal::end(); ?>

        <?php ActiveForm::end(); ?>
    </div>
</div>

<script>var id = '<?php echo $_GET['id']; ?>' </script>
<script src="/admin/js/riwayatAlergi.js"></script>
