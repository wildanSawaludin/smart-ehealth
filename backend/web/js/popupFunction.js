$(document).ready(function () {
       $('input[name="Anamnesa[keluhan]"]').change(function () {
            $('#m_keluhanDetail .modal-body').html();
            $('#m_keluhanDetail .modal-body').load(baseurl + "/anamnesa/popupkeluhan/"+1);
            $('#m_keluhanDetail').modal('show');
            $("#m_keluhanDetail .modal-content").css({
                "width": "750px",
                "margin": "0px 0 0 -10%"
            });
    });
    });