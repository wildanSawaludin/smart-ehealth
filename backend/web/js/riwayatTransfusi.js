/**
 * Created by rio on 23/03/15.
 */
$(document).ready(function(){
   //$('#whole_blood_isi').hide();
   //$('#trombosit_isi').hide();
   //$('#eritrosit_isi').hide();

   if($('#anamnesa-transfusi_wb_pil').prop( "checked" )){
      $('#whole_blood_isi').show();
   }else{
      $('#whole_blood_isi').hide();
   }

   if($('#anamnesa-transfusi_trombosit_pil').prop( "checked" )){
      $('#trombosit_isi').show();
   }else{
      $('#trombosit_isi').hide();
   }

   if($('#anamnesa-transfusi_eritrosit_pil').prop( "checked" )){
      $('#eritrosit_isi').show();
   }else{
      $('#eritrosit_isi').hide();
   }

   $('#anamnesa-transfusi_wb_pil').change(function(){
      if($('#anamnesa-transfusi_wb_pil').prop( "checked" )){
         $('#whole_blood_isi').show();
      }else{
         $('#whole_blood_isi').hide();
      }
   });

   $('#anamnesa-transfusi_trombosit_pil').change(function(){
      if($('#anamnesa-transfusi_trombosit_pil').prop( "checked" )){
         $('#trombosit_isi').show();
      }else{
         $('#trombosit_isi').hide();
      }
   });

   $('#anamnesa-transfusi_eritrosit_pil').change(function(){
      if($('#anamnesa-transfusi_eritrosit_pil').prop( "checked" )){
         $('#eritrosit_isi').show();
      }else{
         $('#eritrosit_isi').hide();
      }
   });

   $('#btnTransfusiOk').click(function(){

      var transfusi = $("input:checkbox[name='Anamnesa[riwayat_transfusi_pil]']:checked").map(function()
      {
         return $(this).val();
      }).get();

      $.ajax({
         type: "POST",
         url: baseurl + '/Anamnesa/AnamnesaRiwayatLainnya/riwayat-transfusi/update-transfusi?id='+id,
         data: $('#riwayatTransfusi-form').serialize() + "&transfusi_pil=" + transfusi,
         success:function(data){
            //alert('Success Update Data');
            //$("#m_riwayatperawatan").modal('hide');
         }
      });
   });

});