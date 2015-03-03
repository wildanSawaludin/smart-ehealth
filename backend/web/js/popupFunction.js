$(document).ready(function () {
       $('input[name="Anamnesa[keluhan]"]').change(function () {
            $('#m_keluhanDetail').html();
            $('#m_keluhanDetail').load(baseurl + '/anamnesa/popup-keluhan?id='+1);
            $('#m_keluhanDetail').modal('show');
            $("#m_keluhanDetail .modal-content").css({
                "width": "550px",
                "margin": "-100px 0 0 -10%"
            });
    });
    });

//function keluhanRincian(id,param,grup){
//            $('#m_keluhanDetail').html();
//            $('#m_keluhanDetail').load(baseurl + "/anamnesa/popup-keluhan"+id+"?param="+param+"&grup="+grup);
//            $('#m_keluhanDetail').modal('show');
//            $("#m_pasien .modal-content").css({
//                "width": "550px",
//                "margin": "-100px 0 0 -10%"
//            });
//}