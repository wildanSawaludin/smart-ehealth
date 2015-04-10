/**
 * Created by rio on 02/04/15.
 */
$(document).ready(function(){
    $('#diagnosa-awal').change(function(){

        if($('#diagnosa-awal').prop( "checked" )){
            $('#m_diagnosa-awal').html('');
            $('#m_diagnosa-awal').load(baseurl + '/diagnosa/popup-diagnosa-awal?id='+id+'&param='+$(this).val());
            $('#m_diagnosa-awal').modal('show');
        }else{
            /*$.ajax({
                type: "POST",
                url: baseurl + '/Anamnesa/anamnesa-kebiasaan/update-kebiasaan-kegiatan?id='+id,
                data: "kebiasaan_kegiatan_pil_uncheck=0",
                success:function(data){
                    //alert('Success Update Data');
                    //$("#m_lamapemakaianalkohol").modal('hide');
                }
            });*/
        }
    });
});