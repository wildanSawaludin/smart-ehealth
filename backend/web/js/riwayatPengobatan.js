/**
 * Created by rio on 18/03/15.
 */
$(document).ready(function(){
    var i=1;
   $('#tambahObat').click(function(){
       $('#tbody-obat').append(
           "<tr id='trObatAppend"+i+"'>" +
                "<td><input type='text' name='RiwayatPengobatan[nama_obat][]' class='form-control obat' id='riwayatpengobatan-nama_obat"+i+"'></td>" +
                "<td>" +
                    "<select name='RiwayatPengobatan[frekuensi][]' class='form-control obat' id='riwayatpengobatan-frekuensi"+i+"'>" +
                       "<option value='1 kali sehari'>1 kali sehari</option>" +
                       "<option value='2 kali sehari'>2 kali sehari</option>" +
                       "<option value='3 kali sehari'>3 kali sehari</option>" +
                       "<option value='Kondisi tertentu'>Kondisi Tertentu</option>" +
                       "</select>" +
                "</td>" +
                "<td>" +
                    "<div class='col-md-4'>" +
                        "<input type='text' name='RiwayatPengobatan[lama_pengobatan][]' class='form-control obat' id='riwayatpengobatan-lama_pengobatan"+i+"'>" +
                    "</div>" +
                    "<div class='col-md-6'>" +
                        "<select name='RiwayatPengobatan[lama_pengobatan_waktu][]' class='form-control obat' id='riwayatpengobatan-lama_pengobatan_waktu"+i+"'>" +
                           "<option value='hari'>hari</option>" +
                           "<option value='minggu'>minggu</option>" +
                           "<option value='bulan'>bulan</option>" +
                           "<option value='tahun'>tahun</option>" +
                        "</select>" +
                    "</div>" +
                "</td>" +
                "<td><input type='button' id='btnDelete' class='btn btn-danger' value='X' onClick=delObatAppend("+i+")> </td>" +
           "</tr>"
       );

       i++;
   });

    $('input[name="RiwayatPengobatan[lama_pengobatan][]"]').keypress(function(e){
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
            return false;
        }
    });

    $('#btnOk').click(function(){
        $.ajax({
            type: "POST",
            url: baseurl + '/Anamnesa/anamnesa-riwayat/update-pengobatan?id='+id,
            data: $('.obat').serialize(),
            success:function(data){
                alert('Success Update Data');
                $("#m_riwayatpengobatan").modal('hide');
            }
        }) ;

    });
});

function delObat(id){
    $('#trObat'+id).remove();
}

function delObatAppend(id){
    $('#trObatAppend'+id).remove();
}