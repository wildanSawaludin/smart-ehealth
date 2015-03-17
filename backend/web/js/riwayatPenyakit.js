/**
 * Created by rio on 16/03/15.
 */
$(document).ready(function () {
    $('#kode').mousedown(function(){
        $('#kode').val("");
    });
    $('#nama').mousedown(function(){
        $('#nama').val("");
    });
    $('#btnOk').click(function(){
        $.ajax({
            type: "POST",
            url: baseurl + '/Anamnesa/anamnesa-riwayat/update-penyakit?id='+id,
            data: "riwayat_penyakit_pil=1&riwayatsakit_icdx_id="+$('#idicdx').val()+
                    "&riwayat_penyakit_nil="+$('#anamnesa-riwayat_penyakit_nil').val()+
                    "&riwayat_penyakit_lama="+$('#anamnesa-riwayat_penyakit_lama').val(),
            success:function(data){
                alert('Success Update Data');
                $("#m_riwayatpenyakit").modal('hide');
            }
        });
    });
});