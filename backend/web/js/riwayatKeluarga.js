/**
 * Created by rio on 23/03/15.
 */
$(document).ready(function () {
    $('#kode').mousedown(function(){
        $('#kode').val("");
    });
    $('#nama').mousedown(function(){
        $('#nama').val("");
    });
    $('#btnOk').click(function(){
        var riwayat_keluarga = $("input:checkbox[name='Anamnesa[riwayat_keluarga_pil]']:checked").map(function()
        {
            return $(this).val();
        }).get();
        $.ajax({
            type: "POST",
            url: baseurl + '/Anamnesa/anamnesa-riwayat/update-keluarga?id='+id,
            data: "riwayat_keluarga_pil="+riwayat_keluarga+"&riwayatkel_icdx_id="+$('#idicdx').val(),
            success:function(data){
                alert('Success Update Data');
                $("#m_riwayatkeluarga").modal('hide');
            }
        });
    });
});