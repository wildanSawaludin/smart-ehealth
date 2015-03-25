$(document).ready(function () {
    var baseurl = window.location.protocol+'//'+window.location.host+'/admin/';
    $('input[name="Anamnesa[keluhan]"]').change(function () {
        $('#m_keluhanDetail').html('');
        $('#m_keluhanDetail').load(baseurl + '/anamnesa/popup-keluhan?id='+id+'&param='+$(this).val());
        $('#m_keluhanDetail').modal('show');

    });
    $('#anamnesa-riwayat_penyakit_pil').change(function(){
        if($('#anamnesa-riwayat_penyakit_pil').prop( "checked" )){
            $('#m_riwayatpenyakit').html('');
            $('#m_riwayatpenyakit').load(baseurl + '/Anamnesa/anamnesa-riwayat/popup-riwayat?id='+id+'&param='+$(this).val());
            $('#m_riwayatpenyakit').modal('show');
        }
    });
    $('#anamnesa-riwayat_perawatan_pil').change(function(){
        if($('#anamnesa-riwayat_perawatan_pil').prop( "checked" )) {
            $('#m_riwayatperawatan').html('');
            $('#m_riwayatperawatan').load(baseurl + '/Anamnesa/anamnesa-riwayat/popup-riwayat-perawatan?id=' + id + '&param=' + $(this).val());
            $('#m_riwayatperawatan').modal('show');
        }

    });

    $('#anamnesa-riwayat_pengobatan_pil').change(function(){
        if($('#anamnesa-riwayat_pengobatan_pil').prop( "checked" )) {
            $('#m_riwayatpengobatan').html('');
            $('#m_riwayatpengobatan').load(baseurl + '/Anamnesa/anamnesa-riwayat/popup-riwayat-pengobatan?id='+id+'&param='+$(this).val());
            $('#m_riwayatpengobatan').modal('show');
        }

    });

    $('#anamnesa-riwayat_keluarga_pil').change(function(){
        if($('#anamnesa-riwayat_keluarga_pil').prop( "checked" )) {
            $('#m_riwayatkeluarga').html('');
            $('#m_riwayatkeluarga').load(baseurl + '/Anamnesa/anamnesa-riwayat/popup-riwayat-keluarga?id='+id+'&param='+$(this).val());
            $('#m_riwayatkeluarga').modal('show');
        }

    });

    $('#anamnesa-riwayat_lainnya_pil').change(function(){
        if($('#anamnesa-riwayat_lainnya_pil').prop( "checked" )){
            $('#riwayat_lain_hide').show();
        }else{
            $('#riwayat_lain_hide').hide();
        }
    });

    if($('#anamnesa-riwayat_alergi_pil').prop( "checked" )){
        $('.riwayat_alergi').show();
    }else{
        $('.riwayat_alergi').hide();
    }

    if($('#anamnesa-riwayat_transfusi_pil').prop( "checked" )){
        $('.riwayat_transfusi').show();
    }else{
        $('.riwayat_transfusi').hide();
    }

    if($('#anamnesa-riwayat_imunisasi_pil').prop( "checked" )){
        $('.riwayat_imunisasi').show();
    }else{
        $('.riwayat_imunisasi').hide();
    }

    $('#anamnesa-riwayat_alergi_pil').change(function(){
       if($('#anamnesa-riwayat_alergi_pil').prop( "checked" )){
           $('.riwayat_alergi').show();
       }else{
           $('.riwayat_alergi').hide();
       }
    });

    $('#anamnesa-riwayat_transfusi_pil').change(function(){
        if($('#anamnesa-riwayat_transfusi_pil').prop( "checked" )){
            $('.riwayat_transfusi').show();
        }else{
            $('.riwayat_transfusi').hide();
        }
    });

    $('#anamnesa-riwayat_imunisasi_pil').change(function(){
        if($('#anamnesa-riwayat_imunisasi_pil').prop( "checked" )){
            $('.riwayat_imunisasi').show();
        }else{
            $('.riwayat_imunisasi').hide();
        }
    });

    $('.riwayat_alergi').click(function(){
        $('#m_riwayatalergi').html('');
        $('#m_riwayatalergi').load(baseurl + '/Anamnesa/AnamnesaRiwayatLainnya/riwayat-alergi/popup-riwayat-alergi?id='+id+'&param='+$(this).val());
        $('#m_riwayatalergi').modal('show');
    });

    $('.riwayat_transfusi').click(function(){
        $('#m_riwayattransfusi').html('');
        $('#m_riwayattransfusi').load(baseurl + '/Anamnesa/AnamnesaRiwayatLainnya/riwayat-transfusi/popup-riwayat-transfusi?id='+id+'&param='+$(this).val());
        $('#m_riwayattransfusi').modal('show');
    });

    $('.riwayat_imunisasi').click(function(){
        $('#m_riwayatimunisasi').html('');
        $('#m_riwayatimunisasi').load(baseurl + '/Anamnesa/AnamnesaRiwayatLainnya/riwayat-imunisasi/popup-riwayat-imunisasi?id='+id+'&param='+$(this).val());
        $('#m_riwayatimunisasi').modal('show');
    });




});
