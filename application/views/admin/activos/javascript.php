<script>
  var base_url = "<?php echo base_url(); ?>";

  function abre_modal(id) {
    $.ajax({
      type: "POST",
      //llamada al controller y su función
      url: base_url + "activos/activos/view/" + id,
      success: function(data) {
        data = JSON.parse(data);
        console.log(data);
        $('#abreModal').modal('show');
        $('#id').val(data.idActivo);
        $('#acusuario').val(data.idUsuario);
        $('#acempresa').val(data.idEmpresa);
        $('#acobs').val(data.observaciones);
        $('#acubicacion').val(data.ubicacion);
        $('#acestatus').val(data.estatusActivo);
      }
    }).fail(function(xhr, status, error) {
      console.log(xhr);
      console.log(status);
      console.log(error);
    })
  }

  function historial(id) {
    // $('#Historial').modal('show');
    $.ajax({
      type: "POST",
      url: base_url + "activos/activos/historial",
      dataType: 'json',
      data: {
        "id": id
      },
      success: function(data) {
        // console.log(data);
        var html = '';
        var i;
        data.forEach(element => {
          html += '<tr>' +
            '<td>' + element.tipo + '</td>' +
            '<td>' + element.usuNombre + '</td>' +
            '<td>' + element.fechaac + '</td>' +
            '<td>' + element.estatusac + '</td>' +
            '<td>' + element.motivoac + '</td>' +
            '<td>' + element.hojaac + '</td>' +
            '</tr>';
        });
        $('#cuerpo').html(html);
        $('#Historial').modal('show');
      }
    });
  }


  function qr(a, b, c, d, e, f, g, h, i, j, k, l) {
    $.ajax({
      type: "POST",
      url: base_url + "activos/activos/generarQR",
      // dataType: 'json',
      data: {
        'a': a,
        'b': b,
        'c': c,
        'd': d,
        'e': e,
        'f': f,
        'g': g,
        'h': h,
        'i': i,
        'j': j,
        'k': k,
        'l': l
      },
      success: function(respuesta) {
        window.location.href = base_url + "activos/activos";
      }
    }).fail(function(xhr, status, error) {
      console.log(xhr);
      console.log(status);
      console.log(error);
    })
  }

  function modalmanto(id, desc, activo) {
    $('#equipo').val(desc);
    $('#activo').val(activo);
    $('#idactivo').val(id);
    $('#abreModalManteniento').modal('show');
  }

  function historialmanto(id) {
    // $('#Historial').modal('show');
    $.ajax({
      type: "POST",
      url: base_url + "activos/activos/historialmanto",
      dataType: 'json',
      data: {
        "id": id
      },
      success: function(data) {
        // console.log(data);
        var html = '';
        var i;
        data.forEach(element => {
          html += '<tr>' +
            '<td>' + element.descripcionact + '</td>' +
            '<td>' + element.usuNombre + '</td>' +
            '<td>' + element.fechaManto + '</td>' +
            '<td>' + element.estatus + '</td>' +
            '<td>' + element.archivoManto + '</td>' +
            '</tr>';
        });
        $('#cuerpomanto').html(html);
        $('#historialmanto').modal('show');
      }
    });
  }


  function asigcombus(idact) {
    $.ajax({
      type: "POST",
      url: base_url + "activos/activos/getconsumibles",
      dataType: 'json',
      success: function(data) {
        // console.log(data);
        var html = '';
        var i;
        data.forEach(element => {
          html += '<tr>' +
            '<td>' + element.nombre + '</td>' +
            '<td>' + element.descripcion + '</td>' +
            '<td>' + element.marca + '</td>' +
            '<td>' + element.modelo + '</td>' +
            '<td>' + element.stock + '</td>' +
            '<td><button type="button" onclick="cargarDatos('+idact+',' + element.idconsumible +' ,\''+ element.nombre + '\');" class="btn btn-success "> <span class="fa fa-plus"></span></button></td>' +
            '</tr>';
        });
        $('#cuerpoconsumible').html(html);
        $('#asigconsumible').modal('show');
      }
    });
  }

  function cargarDatos(idact,id, nombre) {
    html = "<tr>";
    html += "<td><input type='hidden' name='idconsumible[]' value='" + id + "'>" + nombre + "</td>";
    html += "<td><input type='hidden' name='idactivo[]' value='"+idact+"'><input type='text' name='stock[]' ></td>";
    html += "</tr>";
    $("#tblactivocomsumible tbody").append(html);
  }
</script>