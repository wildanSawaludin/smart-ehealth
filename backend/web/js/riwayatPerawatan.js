/**
 * Created by rio on 16/03/15.
 */
$(document).ready(function () {
    $('#btnOk').click(function(){
        $.ajax({
            type: "POST",
            url: baseurl + '/Anamnesa/anamnesa-riwayat/update-perawatan?id='+id,
            data: "riwayat_perawatan_pil=1&anamnesa-riwayat_perawatan_waktu="+$('#anamnesa-riwayat_perawatan_waktu').val()+
                    "&riwayat_perawatan_tempat="+$('input[type="radio"]:checked').val()+
                    "&anamnesa-riwayat_perawatan_nil="+$('#anamnesa-riwayat_perawatan_nil').val()+
                    "&anamnesa-riwayat_perawatan_lama="+$('#anamnesa-riwayat_perawatan_lama').val(),
            success:function(data){
                alert('Success Update Data');
                $("#m_riwayatperawatan").modal('hide');
            }
        });
    });
});