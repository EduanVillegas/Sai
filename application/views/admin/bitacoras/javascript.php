<script>
  $(function() {
    var base_url = "<?php echo base_url(); ?>";

    function btnjf(id, correo) {
      //alert(id);
      $('#emailusujf').val(correo);
      $('#idbjf').val(id);
      $('#jefe-inmediato').modal('show');
    }

    function btnrh(id) {
      //alert(id);emailusu
      $('#idbrh').val(id);
      $('#recursos-humanos').modal('show');
    }


    function correo(id) {
      $.ajax({
        type: "POST",
        //llamada al controller y su función
        url: base_url + "BitacoraController/getCorreoAjax",
        dataType: 'json',
        data: {
          "idJefe": id
        },
        success: function(data) {
          console.log(data);
          //alert(data.usucorreo);
          $('#emailjf').val(data.usucorreo);
        }
      }).fail(function(xhr, status, error) {
        console.log(xhr);
        console.log(status);
        console.log(error);
      })
    }
  
  })
</script>