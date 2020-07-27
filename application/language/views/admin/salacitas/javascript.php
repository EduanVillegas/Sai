<script>
	var base_url = "<?php echo base_url(); ?>";
	var currentDate; // Holds the day clicked when adding a new event
	// Holds the event object when editing an event
	$(".datetime").datetimepicker({
		//format: 'yyyy-mm-dd hh:ii',
		autoclose: true,
		todayBtn: true,
		language: 'es',
	});

	$(document).ready(function() {
		//Cada 10 segundos (10000 milisegundos) se ejecutará la función refrescar
		setTimeout(refrescar, 100000);
		var get_data = '<?php echo $get_data; ?>';
		var backend_url = '<?php echo base_url(); ?>';
		var currentEvent;
		$('#calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,agendaWeek,agendaDay'
			},
			footer: {
				left: 'prev,next today myCustomButton',
				center: 'title',
				right: 'month,agendaWeek,agendaDay'
			},
			defaultView: 'agendaWeek',
			defaultDate: moment().format('YYYY-MM-DD'),
			editable: true,
			eventLimit: true, // allow "more" link when too many events
			selectable: true,
			selectHelper: true,
			select: function(start, end) {
				$(this).removeData('modal');
				$('#create_modal input[name=calendar_id]').val("0");
				$('#create_modal input[name=calendar_id]').val(event.id);
				$('#create_modal input[name=start_date]').val(moment(start).format('YYYY-MM-DD hh:mm'));
				$('#create_modal input[name=end_date]').val(moment(end).format('YYYY-MM-DD hh:mm'));
				$('#create_modal input[name=title]').val('');
				$('#create_modal input[name=description]').val('');
				$('#create_modal select[name=color]').val('');
				$('#create_modal input[name=invitado]').val('');
				$('#guardar').show();
				$('#create_modal').modal('show');
				//save();
				$('#calendar').fullCalendar('unselect');
			},
			/* eventDrop: function(event, delta, revertFunc) { // si changement de position
			   //editDropResize(event);
			   start = event.start.format('YYYY-MM-DD HH:mm:ss');
			   if (event.end) {
			     end = event.end.format('YYYY-MM-DD HH:mm:ss');
			   } else {
			     end = start_date;
			   }

			   $.post(base_url + "salacitas/salacitasController/dragUpdateEvent", {
			     id: event.id,
			     start: start,
			     end: end
			   }, function(result) {
			     //alert(result);
			     //$('.alert').addClass('alert-success').text('Evento Actualizado Correctamente');
			     //hide_notify();

			   });
			 },
			 eventResize: function(event, dayDelta, minuteDelta, revertFunc) { // si changement de longueur
			   //editDropResize(event);
			   start = event.start.format('YYYY-MM-DD HH:mm:ss');
			   if (event.end) {
			     end = event.end.format('YYYY-MM-DD HH:mm:ss');
			   } else {
			     end = start;
			   }

			   $.post(base_url + "salacitas/salacitasController/dragUpdateEvent", {
			     id: event.id,
			     start: start,
			     end: end
			   }, function(result) {
			     // alert(result);
			     //$('.alert').addClass('alert-success').text('Evento Actualizado Correctamente');
			     //hide_notify();

			   });
			 },*/
			eventClick: function(event, element) {
				deteil(event);
				// editData(event);
				// deleteData(event);
				/* $('#create_modal .delete_calendar').click(function() {
				   alert(event.id);
				 })*/
				//$('#calendar').fullCalendar('removeEvents', event.id);
			},
			events: JSON.parse(get_data)
		});
		$('#calendar').addTouch();
	});

	$(document).on('click', '.add_calendar', function() {
		$('#create_modal input[name=calendar_id]').val(0);
		$('#create_modal input[name=calendar_id]').val(event.id);
		$('#create_modal input[name=start_date]').val('');
		$('#create_modal input[name=end_date]').val('');
		$('#create_modal input[name=title]').val('');
		$('#create_modal input[name=description]').val('');
		$('#create_modal select[name=color]').val('');
		$('#guardar').show();
		$('#create_modal').modal('show');
	})

	$(document).on('click', '.add_listar', function() {
		//alert(<?php echo $this->session->userdata("id"); ?>);
		$.ajax({
			type: "POST",
			url: base_url + "salacitas/salacitasController/listar",
			dataType: 'json',
			success: function(data) {
				// console.log(data);
				var html = '';
				var i;
				data.forEach(element => {
					html += '<tr>' +
						'<td>' + element.titulo + '</td>' +
						'<td>' + element.descripcion + '</td>' +
						'<td>' + element.color + '</td>' +
						'<td>' + element.fecha_inicio + '</td>' +
						'<td>' + element.fecha_final + '</td>' +
						'<td><div class="btn-group">' +
						'<a href="' + base_url + 'salacitas/salacitasController/update/' + element.id + '" class="btn btn-warning"><span class="fa fa-pencil"></span></a>' +
						'<a href="' + base_url + 'salacitas/salacitasController/delete/' + element.id + '" class="btn btn-danger btn-trash"><span class="fa fa-trash"></span></a>' +
						'</div></td>' +
						'</tr>';
				});
				$('#cuerpo').html(html);
				$('#listar').modal('show');
			}
		});

	})

	$("#form_create").on("submit", function(e) {
		save(e);
	})

	function deteil(event) {
		$('#create_modal input[name=calendar_id]').val(event.id);
		$('#create_modal input[name=start_date]').val(moment(event.start).format('YYYY-MM-DD hh:mm'));
		$('#create_modal input[name=end_date]').val(moment(event.end).format('YYYY-MM-DD hh:mm'));
		$('#create_modal input[name=title]').val(event.title);
		$('#create_modal input[name=description]').val(event.description);
		$('#create_modal select[name=color]').val(event.color);
		$('#create_modal input[name=invitado]').val(event.invitado);
		//$('#delete').show();
		//$('#update').show();
		$('#guardar').css("display", "none");
		$('#create_modal').modal('show');
	}

	$('#delete').click(function() {
		var id = $('#calendar_id').val();
		//alert(id);
		$.ajax({
			url: base_url + "salacitas/salacitasController/delete/" + id,
			type: "GET",
			/*data: {
			  id: id
			},*/
			contentType: false,
			processData: false,
			success: function(data) {
				//alert(data);
				window.location.href = base_url + "salacitas/salacitasController";
			}
		});
	})
	$('#update').click(function() {
		var formData = new FormData($("#form_create")[0]);
		var element = $(this);
		var eventData;
		$.ajax({
			url: base_url + "salacitas/salacitasController/update",
			type: "POST",
			data: formData,
			contentType: false,
			processData: false,
			success: function(data) {
				//alert(data);
				/*$('#create_modal').modal('hide');
				$('#calendar').fullCalendar("refetchEvents");*/
				window.location.href = base_url + "salacitas/salacitasController";
			}
		});
	})

	function save(e) {
		e.preventDefault(); //No se activará la acción predeterminada del evento
		var formData = new FormData($("#form_create")[0]);
		var element = $(this);
		var eventData;
		$.ajax({
			url: base_url + "salacitas/salacitasController/save",
			type: "POST",
			data: formData,
			contentType: false,
			processData: false,
			success: function(data) {
				//  $('.alert').addClass('alert-success').text('Event added successfuly');
				// $('#create_modal').modal('hide');
				//$('#calendar').fullCalendar("refetchEvents");
				/*$('#create_modal').modal('hide');
				$('#calendar').fullCalendar("refetchEvents");*/
				window.location.href = base_url + "salacitas/salacitasController";
			}
		});
	}
	function refrescar(){
    //Actualiza la página
    location.reload();
  }
</script>
