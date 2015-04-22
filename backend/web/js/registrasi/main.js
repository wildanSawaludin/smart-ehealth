$(document).ready(function() {
    $('input[name="Registrasi[status_asuransi]"]').change(function() {
        if ($(this).val() == 'Umum') {
            $('#el-1').css('display', 'none');
            $('#el-2').css('display', 'none');
            $("#el-1 input").val(null);
            $("#el-2 input").val(null);
        }
        if ($(this).val() == 'BPJS Kesehatan') {
            $('#el-1').css('display', 'block');
            $('#el-2').css('display', 'none');
            $("#el-1 input").val(null);
            $("#el-2 input").val(null);
        }
        if ($(this).val() == 'BPJS Ketenagakerjaan') {
            $('#el-1').css('display', 'block');
            $('#el-2').css('display', 'none');
            $("#el-1 input").val(null);
            $("#el-2 input").val(null);
        }
        if ($(this).val() == 'Asuransi Lainnya') {
            $('#el-2').css('display', 'block');
            $('#el-1').css('display', 'none');
            $("#el-1 input").val(null);
            $("#el-2 input").val(null);
        }
    });

    $('#add_pasien').click(function() {
        $('#md_add_pasien .modal-body').html();
        $('#md_add_pasien .modal-body').load(baseurl + '/registrasi/mdaddpasien');
        $('#md_add_pasien').modal('show');
        $("#md_pasien .modal-content").css({
            "width": "750px",
            "margin": "0px 0 0 -10%"
        });
    });

    $('#sp_opname').click(function() {
        $('#md_spo').modal('show');
        $("#md_spo .modal-content").css({
            "width": "750px", "height": "450px",
            "margin": "0px 0 0 -10%"
        });
    });

    $('#registrasi-status_pelayanan').change(function() {

        var sp_opname = $('#sp_opname');

        if ($(this).val() == "Rawat Inap") {
            sp_opname.show();
        }
        else {
            sp_opname.hide();
        }

    });

});

function editReg(id){
    $('#md_edit_reg .modal-body').html();
    $('#md_edit_reg .modal-body').load(baseurl + '/registrasi/mdeditreg/?id='+id);
    $('#md_edit_reg').modal('show');
    $("#md_edit_reg .modal-content").css({
        "width": "750px",
        "margin": "0px 0 0 -10%"
    });
}