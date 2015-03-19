$(document).ready(function () {
    $('input[name="Anamnesa[keluhan]"]').change(function () {
        $('#m_keluhanDetail').html('');
        $('#m_keluhanDetail').load(baseurl + '/anamnesa/popup-keluhan?id='+id+'&param='+$(this).val());
        $('#m_keluhanDetail').modal('show');

    });
    $('#anamnesa-riwayat_penyakit_pil').change(function(){
        $('#m_riwayatpenyakit').html('');
        $('#m_riwayatpenyakit').load(baseurl + '/Anamnesa/anamnesa-riwayat/popup-riwayat?id='+id+'&param='+$(this).val());
        $('#m_riwayatpenyakit').modal('show');
        /*$.ajax({
         type: "POST",
         url: baseurl + '/anamnesa/anamnesa-riwayat/update?id='+id,
         data: "param="+$('#anamnesa-riwayat_penyakit_pil').val(),
         success:function(data){
         console.log(data);
         }
         }); */
    });
    $('#anamnesa-riwayat_perawatan_pil').change(function(){
        $('#m_riwayatperawatan').html('');
        $('#m_riwayatperawatan').load(baseurl + '/Anamnesa/anamnesa-riwayat/popup-riwayat-perawatan?id='+id+'&param='+$(this).val());
        $('#m_riwayatperawatan').modal('show');
        /*$.ajax({
         type: "POST",
         url: baseurl + '/anamnesa/anamnesa-riwayat/update?id='+id,
         data: "param="+$('#anamnesa-riwayat_penyakit_pil').val(),
         success:function(data){
         console.log(data);
         }
         }); */
    });

    $('#anamnesa-riwayat_pengobatan_pil').change(function(){
        $('#m_riwayatpengobatan').html('');
        $('#m_riwayatpengobatan').load(baseurl + '/Anamnesa/anamnesa-riwayat/popup-riwayat-pengobatan?id='+id+'&param='+$(this).val());
        $('#m_riwayatpengobatan').modal('show');
    });


});
