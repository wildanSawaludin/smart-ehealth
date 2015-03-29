$(document).ready(function () {
    $('input[name="Anamnesa[faktor_resiko_kebiasaan]"]').change(function () {
        
        $("#testkeluhan").val( $('input:radio[name="Anamnesa[faktor_resiko_kebiasaan]"]:checked').val());
    });
    
});




