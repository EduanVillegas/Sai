<script>
  var base_url = "<?php echo base_url(); ?>";

  function abrirchat(id) {
    $.ajax({
      type: "POST",
      url: base_url + "tickets/MantenimientoController/viewajax",
      dataType: 'json',
      data: {
        'id': id
      },
      success: function(data) {
        $('#asunto').val(data.asunto);
        $('#descripcion').val(data.descripcion);
        $('#idusuario').val(data.idusuario);
        $('#idmanto').val(data.idmantenimiento);
				$('#correousu').val(data.usucorreo);
        //alert(correo);
        $('#modalchat').modal('show');
      }
    }).fail(function(xhr, status, error) {
      console.log(xhr);
      console.log(status);
      console.log(error);
    })
  }
  function histomanto(id){
	  $.ajax({
      type: "POST",
      url: base_url + "tickets/MantenimientoController/viewhistomanto",
      dataType: 'json',
      data: {
        'id': id
      },
      success: function(data) {
		var html = '';
        var i;
		document.getElementById('titulo').innerHTML="";
        data.forEach(element => {
          html += '<tr>' +
            '<td>' + element.usuNombre + '</td>' +
            //'<td>' + element.asunto + '</td>' +
            '<td>' + element.comentarios + '</td>' +
            '<td>' + element.estatus + '</td>' +
            '<td>' + element.fecha + '</td>' +
            '</tr>';
        document.getElementById('titulo').innerHTML=element.asunto;
		});
        $('#cuerpo').html(html);
        $('#Historial').modal('show');
      }
    }).fail(function(xhr, status, error) {
      console.log(xhr);
      console.log(status);
      console.log(error);
    })
  }
  
</script>
