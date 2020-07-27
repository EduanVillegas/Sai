<script>
	var base_url = "<?php echo base_url(); ?>";
	$("#perfilusu").on("change", function() {
		id = $(this).val();
		$.ajax({
			type: "POST",
			url: base_url + "usuarios/usuarios/BuscarNumero",
			//      dataType: 'json',
			data: {
				"id": id
			},
			success: function(data) {
				$('#folio').val("");
				$('#folio').val(data.replace(/['"]+/g, ''));
			}
		}).fail(function(xhr, status, error) {
			console.log(xhr);
			console.log(status);
			console.log(error);
		})
	});

	function activarydesactivar(id, estatus) {
		swal({
				title: "Mensaje",
				text: "¿Deseas activar/desactivar este usuario?!",
				type: "warning",
				showCancelButton: true,
				confirmButtonClass: "btn-danger",
				confirmButtonText: "Si, acepto!",
				cancelButtonText: "No, cancelar!",
				closeOnConfirm: false
			},
			function() {
				//swal("Deleted!", "Your imaginary file has been deleted.", "success");
				$.ajax({
					type: "POST",
					url: base_url + "usuarios/usuarios/activarydesactivar",
					data: {
						"id": id,
						"estatus": estatus
					},
					success: function(data) {
						window.location.href = base_url + "usuarios/usuarios";
					}
				}).fail(function(xhr, status, error) {
					console.log(xhr);
					console.log(status);
					console.log(error);
				})
			});
	}

	function abrirpermisos() {
		$('#modal-permisos').modal('show');
	}
	var cont = 0;

	function detalle(idpermiso, permiso) {
		html = "<tr id='fila" + cont + "'>";
		html += "<td><input type='hidden' name='permiso[]' value='" + idpermiso + "'>" + permiso + "</td>";
		html += "<td><input type='radio' name='radiobutton[" + cont + "]' value='1' checked> Escritura <input type='radio' name='radiobutton[" + cont + "]' value='0'>Lectura";
		html += "<td><a class='btn btn-danger' onclick='eliminardetalle(" + cont + ")'><i class='fa fa-remove'></i></a></td>";
		html += "</tr>";
		cont = cont + 1;
		$("#tblpermisos tbody").append(html);
	}

	function eliminardetalle(indice) {
		$("#fila" + indice).remove();
	}

	function MiFuncionJS() {
		alert("hola");
	}
</script>
