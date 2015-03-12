$(document).ready(function () {
       $('input[name="Anamnesa[keluhan]"]').change(function () {
            $('#m_keluhanDetail').html('');
            $('#m_keluhanDetail').load(baseurl + '/anamnesa/popup-keluhan?id='+id+'&param='+$(this).val());
            $('#m_keluhanDetail').modal('show');
//            $("#m_keluhanDetail .modal-content").css({
//                "width": "550px",
//                "margin": "-100px 0 0 -10%"
//            });
    });
    });
