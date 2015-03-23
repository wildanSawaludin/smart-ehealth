/**
 * Created by rio on 23/03/15.
 */
$(document).ready(function(){
    $('#chkbox0').change(function(){
        if($('#chkbox0').prop( "checked" )){
            $('#chkbox1').prop("disabled", true);
            $('#chkbox2').prop("disabled", true);
            $('#chkbox3').prop("disabled", true);
            $('#chkbox4').prop("disabled", true);
            $('#chkbox5').prop("disabled", true);
            $('#chkbox6').prop("disabled", true);
            $('#chkbox7').prop("disabled", true);
            $('#chkbox8').prop("disabled", true);
            $('#chkbox9').prop("disabled", true);
            $('#chkbox10').prop("disabled", true);
            $('#chkbox11').prop("disabled", true);
        }else{
            $('#chkbox1').prop("disabled", false);
            $('#chkbox2').prop("disabled", false);
            $('#chkbox3').prop("disabled", false);
            $('#chkbox4').prop("disabled", false);
            $('#chkbox5').prop("disabled", false);
            $('#chkbox6').prop("disabled", false);
            $('#chkbox7').prop("disabled", false);
            $('#chkbox8').prop("disabled", false);
            $('#chkbox9').prop("disabled", false);
            $('#chkbox10').prop("disabled", false);
            $('#chkbox11').prop("disabled", false);
        }
    });

    $('#btnImunisasiOk').click(function(){
        var value = $("input:checkbox[name='Anamnesa[riwayat_imunisasi][]']:checked").map(function()
        {
            return $(this).val();
        }).get();

        var imunisasi = $("input:checkbox[name='Anamnesa[riwayat_imunisasi_pil]']:checked").map(function()
        {
            return $(this).val();
        }).get();

        $.ajax({
            type: "POST",
            url: baseurl + '/Anamnesa/AnamnesaRiwayatLainnya/riwayat-imunisasi/update-imunisasi?id=' + id,
            data: 'nama_jenis=' + value + '&imunisasi_pil=' + imunisasi,
            success: function (data) {
                //alert('Success Update Data');
                $("#m_riwayatimunisasi").modal('hide');
            }
        });
        console.log(value);
    });
});