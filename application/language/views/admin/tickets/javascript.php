<script>
  var base_url = "<?php echo base_url(); ?>";
  var correo = "<?php echo $this->session->userdata("correo"); ?>";

  function abrirmodal(id) {
    $.ajax({
      type: "POST",
      url: base_url + "tickets/TicketsController/hostorialti",
       dataType: 'json',
      data: {
        'id': id
      },
      success: function(data) {
        $('#fechati').val(data.fechaTic);
        $('#descripcion').val(data.descTic);
        $('#fechater').val(data.fechaTicterm);
        $('#estatus').val(data.estatusTic);
        //$('#motivo').text(data.estatusTic);
        $('#idticket').val(data.idTickets);
        alert(correo);
        $('#modal-default').modal('show');
       // alert(data.fechaTic);
      }
    }).fail(function(xhr, status, error) {
      console.log(xhr);
      console.log(status);
      console.log(error);
    })
  }

  //Date picker
  $('.datepicker').datepicker({
      autoclose: true,
      language: 'es',
    })

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false,
    })
</script>