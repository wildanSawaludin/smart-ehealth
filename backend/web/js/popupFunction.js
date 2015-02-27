$(document).ready(function () {
        $('input[name="Anamnesa[keluhan]"]').change(function () {
            $("#m_keluhanDetail").load(baseurl+"/index.php/anamnesa/popupKeluhan/"+id+"?param="+$(this).val());
            $('#m_keluhanDetail').modal('show');
//                  if ($(this).val() == 'Sakit') {
//            alert('Y');
              
//        }
    });
    });