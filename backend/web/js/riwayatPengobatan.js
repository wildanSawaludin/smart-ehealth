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



    $('#btnOk').click(function(){
        /*$.ajax({
            type: "POST",
            url: baseurl + '/Anamnesa/anamnesa-riwayat/update-pengobatan?id='+id,
            data: "riwayat_penyakit_pil=1&riwayatsakit_icdx_id="+$('#idicdx').val()+
            "&riwayat_penyakit_nil="+$('#anamnesa-riwayat_penyakit_nil').val()+
            "&riwayat_penyakit_lama="+$('#anamnesa-riwayat_penyakit_lama').val(),
            success:function(data){
                alert('Success Update Data');
                $("#m_riwayatpenyakit").modal('hide');
            }
        }) ;*/
        //console.log($('.form-control.obat').map(function() {return this.value}).get());
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