/**
 * Created by rio on 16/03/15.
 */
$(document).ready(function () {
    $('#btnOk').click(function(){
        var nama_penyakit = $('a span').text().split('||');

        $.ajax({
            type: "POST",
            url: baseurl + '/anamnesa/anamnesa-riwayat/update-penyakit?id='+id,
            data: "riwayat_penyakit_pil=1&riwayatsakit_icdx_id="+$('#icdx-id').val()+
                    "&riwayat_penyakit_nil="+$('#anamnesa-riwayat_penyakit_nil').val()+
                    "&riwayat_penyakit_lama="+$('#anamnesa-riwayat_penyakit_lama').val()+
                    "&riwayat_penyakit_nama="+nama_penyakit[1],
            success:function(data){
                alert('Success Update Data');
                $("#m_riwayatpenyakit").modal('hide');
            }
        });
    });
});