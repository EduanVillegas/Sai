<script>
	$(document).ready(function() {

		$('#btn_login_details').click(function() {
			$('#list_login_details').removeClass('active active_tab1');
			$('#list_login_details').removeAttr('href data-toggle');
			$('#login_details').removeClass('active');
			$('#list_login_details').addClass('inactive_tab1');
			$('#list_personal_details').removeClass('inactive_tab1');
			$('#list_personal_details').addClass('active_tab1 active');
			$('#list_personal_details').attr('href', '#personal_details');
			$('#list_personal_details').attr('data-toggle', 'tab');
			$('#personal_details').addClass('active in');
		});

		$('#previous_btn_personal_details').click(function() {
			$('#list_personal_details').removeClass('active active_tab1');
			$('#list_personal_details').removeAttr('href data-toggle');
			$('#personal_details').removeClass('active in');
			$('#list_personal_details').addClass('inactive_tab1');
			$('#list_login_details').removeClass('inactive_tab1');
			$('#list_login_details').addClass('active_tab1 active');
			$('#list_login_details').attr('href', '#login_details');
			$('#list_login_details').attr('data-toggle', 'tab');
			$('#login_details').addClass('active in');
		});

		$('#btn_personal_details').click(function() {
			$('#list_personal_details').removeClass('active active_tab1');
			$('#list_personal_details').removeAttr('href data-toggle');
			$('#personal_details').removeClass('active');
			$('#list_personal_details').addClass('inactive_tab1');
			$('#list_contact_details').removeClass('inactive_tab1');
			$('#list_contact_details').addClass('active_tab1 active');
			$('#list_contact_details').attr('href', '#contact_details');
			$('#list_contact_details').attr('data-toggle', 'tab');
			$('#contact_details').addClass('active in');
		});

		$('#previous_btn_contact_details').click(function() {
			$('#list_contact_details').removeClass('active active_tab1');
			$('#list_contact_details').removeAttr('href data-toggle');
			$('#contact_details').removeClass('active in');
			$('#list_contact_details').addClass('inactive_tab1');
			$('#list_personal_details').removeClass('inactive_tab1');
			$('#list_personal_details').addClass('active_tab1 active');
			$('#list_personal_details').attr('href', '#personal_details');
			$('#list_personal_details').attr('data-toggle', 'tab');
			$('#personal_details').addClass('active in');
		});

		$('#btn_contact_details').click(function() {
			$('#list_contact_details').removeClass('active active_tab1');
			$('#list_contact_details').removeAttr('href data-toggle');
			$('#contact_details').removeClass('active');
			$('#list_contact_details').addClass('inactive_tab1');
			$('#list_condiciones_salariales').removeClass('inactive_tab1');
			$('#list_condiciones_salariales').addClass('active_tab1 active');
			$('#list_condiciones_salariales').attr('href', '#condiciones_salariales');
			$('#list_condiciones_salariales').attr('data-toggle', 'tab');
			$('#condiciones_salariales').addClass('active in');
		});

		$('#previous_btn_condiciones_salariales').click(function() {
			$('#list_condiciones_salariales').removeClass('active active_tab1');
			$('#list_condiciones_salariales').removeAttr('href data-toggle');
			$('#condiciones_salariales').removeClass('active in');
			$('#list_condiciones_salariales').addClass('inactive_tab1');
			$('#list_contact_details').removeClass('inactive_tab1');
			$('#list_contact_details').addClass('active_tab1 active');
			$('#list_contact_details').attr('href', '#contact_details');
			$('#list_contact_details').attr('data-toggle', 'tab');
			$('#contact_details').addClass('active in');
		});

		$('#btn_condiciones_salariales').click(function() {
			$('#list_condiciones_salariales').removeClass('active active_tab1');
			$('#list_condiciones_salariales').removeAttr('href data-toggle');
			$('#condiciones_salariales').removeClass('active');
			$('#list_condiciones_salariales').addClass('inactive_tab1');
			$('#list_accesos').removeClass('inactive_tab1');
			$('#list_accesos').addClass('active_tab1 active');
			$('#list_accesos').attr('href', '#accesos');
			$('#list_accesos').attr('data-toggle', 'tab');
			$('#accesos').addClass('active in');
		});

		$('#previous_btn_accesos').click(function() {
			$('#list_accesos').removeClass('active active_tab1');
			$('#list_accesos').removeAttr('href data-toggle');
			$('#accesos').removeClass('active in');
			$('#list_accesos').addClass('inactive_tab1');
			$('#list_condiciones_salariales').removeClass('inactive_tab1');
			$('#list_condiciones_salariales').addClass('active_tab1 active');
			$('#list_condiciones_salariales').attr('href', '#condiciones_salariales');
			$('#list_condiciones_salariales').attr('data-toggle', 'tab');
			$('#condiciones_salariales').addClass('active in');
		});

		$('#btn_accesos').click(function() {
			$('#list_accesos').removeClass('active active_tab1');
			$('#list_accesos').removeAttr('href data-toggle');
			$('#accesos').removeClass('active');
			$('#list_accesos').addClass('inactive_tab1');
			$('#list_asignaciones').removeClass('inactive_tab1');
			$('#list_asignaciones').addClass('active_tab1 active');
			$('#list_asignaciones').attr('href', '#asignaciones');
			$('#list_asignaciones').attr('data-toggle', 'tab');
			$('#asignaciones').addClass('active in');
		});

		$('#previous_btn_asignaciones').click(function() {
			$('#list_asignaciones').removeClass('active active_tab1');
			$('#list_asignaciones').removeAttr('href data-toggle');
			$('#asignaciones').removeClass('active in');
			$('#list_asignaciones').addClass('inactive_tab1');
			$('#list_accesos').removeClass('inactive_tab1');
			$('#list_accesos').addClass('active_tab1 active');
			$('#list_accesos').attr('href', '#accesos');
			$('#list_accesos').attr('data-toggle', 'tab');
			$('#accesos').addClass('active in');
		});

		$('#btn_asignaciones').click(function() {
			$('#list_asignaciones').removeClass('active active_tab1');
			$('#list_asignaciones').removeAttr('href data-toggle');
			$('#asignaciones').removeClass('active');
			$('#list_asignaciones').addClass('inactive_tab1');
			$('#list_normativa_aplicable').removeClass('inactive_tab1');
			$('#list_normativa_aplicable').addClass('active_tab1 active');
			$('#list_normativa_aplicable').attr('href', '#normativa_aplicable');
			$('#list_normativa_aplicable').attr('data-toggle', 'tab');
			$('#normativa_aplicable').addClass('active in');
		});

		$('#previous_normativa_aplicable').click(function() {
			$('#list_normativa_aplicable').removeClass('active active_tab1');
			$('#list_normativa_aplicable').removeAttr('href data-toggle');
			$('#normativa_aplicable').removeClass('active in');
			$('#list_normativa_aplicable').addClass('inactive_tab1');
			$('#list_asignaciones').removeClass('inactive_tab1');
			$('#list_asignaciones').addClass('active_tab1 active');
			$('#list_asignaciones').attr('href', '#asignaciones');
			$('#list_asignaciones').attr('data-toggle', 'tab');
			$('#asignaciones').addClass('active in');
		});

		$('#btn_normativa_aplicable').click(function() {
			$('#list_normativa_aplicable').removeClass('active active_tab1');
			$('#list_normativa_aplicable').removeAttr('href data-toggle');
			$('#normativa_aplicable').removeClass('active');
			$('#list_normativa_aplicable').addClass('inactive_tab1');
			$('#list_otras_condiciones_laborales').removeClass('inactive_tab1');
			$('#list_otras_condiciones_laborales').addClass('active_tab1 active');
			$('#list_otras_condiciones_laborales').attr('href', '#otras_condiciones_laborales');
			$('#list_otras_condiciones_laborales').attr('data-toggle', 'tab');
			$('#otras_condiciones_laborales').addClass('active in');
		});

		$('#previous_otras_condiciones_laborales').click(function() {
			$('#list_otras_condiciones_laborales').removeClass('active active_tab1');
			$('#list_otras_condiciones_laborales').removeAttr('href data-toggle');
			$('#otras_condiciones_laborales').removeClass('active in');
			$('#list_otras_condiciones_laborales').addClass('inactive_tab1');
			$('#list_normativa_aplicable').removeClass('inactive_tab1');
			$('#list_normativa_aplicable').addClass('active_tab1 active');
			$('#list_normativa_aplicable').attr('href', '#normativa_aplicable');
			$('#list_normativa_aplicable').attr('data-toggle', 'tab');
			$('#normativa_aplicable').addClass('active in');
		});

		$('#btn_otras_condiciones_laborales').click(function() {
			$('#list_otras_condiciones_laborales').removeClass('active active_tab1');
			$('#list_otras_condiciones_laborales').removeAttr('href data-toggle');
			$('#otras_condiciones_laborales').removeClass('active');
			$('#list_otras_condiciones_laborales').addClass('inactive_tab1');
			$('#list_informacion_personal').removeClass('inactive_tab1');
			$('#list_informacion_personal').addClass('active_tab1 active');
			$('#list_informacion_personal').attr('href', '#informacion_personal');
			$('#list_informacion_personal').attr('data-toggle', 'tab');
			$('#informacion_personal').addClass('active in');
		});

		$('#previous_informacion_personal').click(function() {
			$('#list_informacion_personal').removeClass('active active_tab1');
			$('#list_informacion_personal').removeAttr('href data-toggle');
			$('#informacion_personal').removeClass('active in');
			$('#list_informacion_personal').addClass('inactive_tab1');
			$('#list_otras_condiciones_laborales').removeClass('inactive_tab1');
			$('#list_otras_condiciones_laborales').addClass('active_tab1 active');
			$('#list_otras_condiciones_laborales').attr('href', '#otras_condiciones_laborales');
			$('#list_otras_condiciones_laborales').attr('data-toggle', 'tab');
			$('#otras_condiciones_laborales').addClass('active in');
		});

		$('#btn_informacion_personal').click(function() {
			$('#list_informacion_personal').removeClass('active active_tab1');
			$('#list_informacion_personal').removeAttr('href data-toggle');
			$('#informacion_personal').removeClass('active');
			$('#list_informacion_personal').addClass('inactive_tab1');
			$('#list_datos_bancarios').removeClass('inactive_tab1');
			$('#list_datos_bancarios').addClass('active_tab1 active');
			$('#list_datos_bancarios').attr('href', '#datos_bancarios');
			$('#list_datos_bancarios').attr('data-toggle', 'tab');
			$('#datos_bancarios').addClass('active in');
		});

		$('#previous_btn_datos_bancarios').click(function() {
			$('#list_datos_bancarios').removeClass('active active_tab1');
			$('#list_datos_bancarios').removeAttr('href data-toggle');
			$('#datos_bancarios').removeClass('active in');
			$('#list_datos_bancarios').addClass('inactive_tab1');
			$('#list_informacion_personal').removeClass('inactive_tab1');
			$('#list_informacion_personal').addClass('active_tab1 active');
			$('#list_informacion_personal').attr('href', '#informacion_personal');
			$('#list_informacion_personal').attr('data-toggle', 'tab');
			$('#informacion_personal').addClass('active in');
		});

		$('#btn_datos_bancarios').click(function() {
			$('#btn_datos_bancarios').attr("disabled", "disabled");
			$(document).css('cursor', 'prgress');
			$("#register_form").submit();
		});

	});
</script>
