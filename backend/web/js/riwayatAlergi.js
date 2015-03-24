/**
 * Created by rio on 21/03/15.
 */
$(document).ready(function(){
    //pop up untuk menambah nama jenis obat pada alergi obat
   $('#anamnesa-alergi_obat_pil').change(function(){
           $('#m_riwayatalergiobat').modal('show');
   });

    //popup untuk menambah nama jenis oobat pada alergi manakanan
    $('#anamnesa-alergi_makanan_pil').change(function(){

        $('#m_riwayatalergimakanan').modal('show');

    });

    //popup untuk menambah nama jenis obat pada alergi sabun
    $('#anamnesa-alergi_sabun_pil').change(function(){
        $('#m_riwayatalergisabun').modal('show');
    });

    //popup untuk menambah nama jenis obat pada alergi udara
    $('#anamnesa-alergi_udara_pil').change(function(){
        $('#m_riwayatalergiudara').modal('show');
    });

    //popup untuk menambah nama jenis obat pada alergi debu
    $('#anamnesa-alergi_debu_pil').change(function(){
        $('#m_riwayatalergidebu').modal('show');
    });

    //popup untuk menambah nama jenis obat pada alergi lainnya
    $('#anamnesa-alergi_lainnya_pil').change(function(){
        $('#m_riwayatalergilainnya').modal('show');
    });

    var i=1;

    //untuk tambah alergi obat
    $('#btnTambah').click(function(){
       $('#nama_jenis').append(
         "<tr id='tr_jenis"+i+"'>" +
            "<td><input type='text' name='Anamnesa[alergi_obat_jenis][]' class='form-control' id='anamnesa-alergi_obat_jenis'></td>" +
            "<td><input type='button' class='btn btn-danger' id='btnDel"+i+"' value='X' onClick='deleteJenisAppend("+i+")'> </td>" +
         "</tr>"
       );


       i++;
    });

    $('#btnAlergiOk').click(function(){
        var value = $("input[name='Anamnesa[alergi_obat_jenis]']").map(function() {
                        return this.value;
                    }).get();

        $.ajax({
            type: "POST",
            url: baseurl + '/Anamnesa/AnamnesaRiwayatLainnya/riwayat-alergi/update-alergi?id=' + id,
            data: 'nama_jenis=' + value,
            success: function (data) {
                //alert('Success Update Data');
                $("#m_riwayatalergiobat").modal('hide');
            }
        });
        console.log(value);
    });

    //untuk tambah alergi makanan
    $('#btnTambahMakanan').click(function(){
        $('#nama_jenis_makanan').append(
            "<tr id='tr_jenis_makanan"+i+"'>" +
            "<td><input type='text' name='Anamnesa[alergi_makanan]' class='form-control' id='anamnesa-alergi_makanan'></td>" +
            "<td><input type='button' class='btn btn-danger' id='btnDel"+i+"' value='X' onClick='deleteJenisAppend("+i+")'> </td>" +
            "</tr>"
        );


        i++;
    });

    $('#btnAlergiMakananOk').click(function(){
        var value = $("input[name='Anamnesa[alergi_makanan]']").map(function() {
            return this.value;
        }).get();

        $.ajax({
            type: "POST",
            url: baseurl + '/Anamnesa/AnamnesaRiwayatLainnya/riwayat-alergi/update-alergi-makanan?id='+id,
            data: 'nama_jenis='+value,
            success:function(data){
                //alert('Success Update Data');
                $("#m_riwayatalergimakanan").modal('hide');
            }
        });
        console.log(value);
    });

    //untuk tambah alergi sabun
    $('#btnTambahSabun').click(function(){
        $('#nama_jenis_sabun').append(
            "<tr id='tr_jenis_sabun"+i+"'>" +
            "<td><input type='text' name='Anamnesa[alergi_sabun]' class='form-control' id='anamnesa-alergi_sabun'></td>" +
            "<td><input type='button' class='btn btn-danger' id='btnDel"+i+"' value='X' onClick='deleteJenisAppend("+i+")'> </td>" +
            "</tr>"
        );


        i++;
    });

    $('#btnAlergiSabunOk').click(function(){
        var value = $("input[name='Anamnesa[alergi_sabun]']").map(function() {
            return this.value;
        }).get();

        $.ajax({
            type: "POST",
            url: baseurl + '/Anamnesa/AnamnesaRiwayatLainnya/riwayat-alergi/update-alergi-sabun?id='+id,
            data: 'nama_jenis='+value,
            success:function(data){
                //alert('Success Update Data');
                $("#m_riwayatalergisabun").modal('hide');
            }
        });
        console.log(value);
    });

    //untuk tambah alergi udara
    $('#btnTambahUdara').click(function(){
        $('#nama_jenis_udara').append(
            "<tr id='tr_jenis_udara"+i+"'>" +
            "<td><input type='text' name='Anamnesa[alergi_udara]' class='form-control' id='anamnesa-alergi_udara'></td>" +
            "<td><input type='button' class='btn btn-danger' id='btnDel"+i+"' value='X' onClick='deleteJenisAppend("+i+")'> </td>" +
            "</tr>"
        );


        i++;
    });

    $('#btnAlergiUdaraOk').click(function(){
        var value = $("input[name='Anamnesa[alergi_udara]']").map(function() {
            return this.value;
        }).get();

        $.ajax({
            type: "POST",
            url: baseurl + '/Anamnesa/AnamnesaRiwayatLainnya/riwayat-alergi/update-alergi-udara?id='+id,
            data: 'nama_jenis='+value,
            success:function(data){
                //alert('Success Update Data');
                $("#m_riwayatalergiudara").modal('hide');
            }
        });
        console.log(value);
    });

    //untuk tambah alergi debu
    $('#btnTambahDebu').click(function(){
        $('#nama_jenis_debu').append(
            "<tr id='tr_jenis_debu"+i+"'>" +
            "<td><input type='text' name='Anamnesa[alergi_debu]' class='form-control' id='anamnesa-alergi_debu'></td>" +
            "<td><input type='button' class='btn btn-danger' id='btnDel"+i+"' value='X' onClick='deleteJenisAppend("+i+")'> </td>" +
            "</tr>"
        );


        i++;
    });

    $('#btnAlergiDebuOk').click(function(){
        var value = $("input[name='Anamnesa[alergi_debu]']").map(function() {
            return this.value;
        }).get();

        $.ajax({
            type: "POST",
            url: baseurl + '/Anamnesa/AnamnesaRiwayatLainnya/riwayat-alergi/update-alergi-debu?id='+id,
            data: 'nama_jenis='+value,
            success:function(data){
                //alert('Success Update Data');
                $("#m_riwayatalergidebun").modal('hide');
            }
        });
        console.log(value);
    });

    //untuk tambah alergi lainnya
    $('#btnTambahLainnya').click(function(){
        $('#nama_jenis_lainnya').append(
            "<tr id='tr_jenis_lainnya"+i+"'>" +
            "<td><input type='text' name='Anamnesa[alergi_lainnya]' class='form-control' id='anamnesa-alergi_lainnya'></td>" +
            "<td><input type='button' class='btn btn-danger' id='btnDel"+i+"' value='X' onClick='deleteJenisAppend("+i+")'> </td>" +
            "</tr>"
        );


        i++;
    });

    $('#btnAlergiLainnyaOk').click(function(){
        var value = $("input[name='Anamnesa[alergi_lainnya]']").map(function() {
            return this.value;
        }).get();

        $.ajax({
            type: "POST",
            url: baseurl + '/Anamnesa/AnamnesaRiwayatLainnya/riwayat-alergi/update-alergi-lainnya?id='+id,
            data: 'nama_jenis='+value,
            success:function(data){
                //alert('Success Update Data');
                $("#m_riwayatalergilainnya").modal('hide');
            }
        });
        console.log(value);
    });
});

function deleteJenisAppend(id)
{
    $('#tr_jenis'+id).remove();
}

function deleteJenis(id)
{
    $('#tr_jenis'+id).remove();
}