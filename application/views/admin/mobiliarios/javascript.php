<script>
  var base_url = "<?php echo base_url(); ?>";

  function qr(a, b, c, d, e, f, id) {
    //alert(a+b+c+d+e+f+id);
    $.ajax({
      type: "POST",
      url: base_url + "mobiliarios/mobiliariosController/generarQR",
      // dataType: 'json',
      data: {
        'a': a,
        'b': b,
        'c': c,
        'd': d,
        'e': e,
        'f': f,
        'id': id
      },
      success: function(respuesta) {
        window.location.href = base_url + "mobiliarios/mobiliariosController";
      }
    }).fail(function(xhr, status, error) {
      console.log(xhr);
      console.log(status);
      console.log(error);
    })
  }
</script>