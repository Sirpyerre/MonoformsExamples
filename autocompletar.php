<?php
require_once('Conexiones/local.php'); // archivo donde se guardan los datos de la BD
?>
<html>
	<head><title>Autocompletado</title>
	<link rel="stylesheet" type="text/css" href="jquery/css/smoothness/jquery-ui-1.8.2.custom.css" />
	<script src="jquery/js/jquery-1.4.2.min.js" type="text/javascript"></script>
	<script src="jquery/js/jquery-ui-1.8.2.custom.min.js" type="text/javascript"></script>
	</head>
	<script type="text/javascript">
	  jQuery(document).ready(function(){
	   $("#municipio").autocomplete({source:"municipios.php", minLength:'4'});
	  });
	</script> 
	<body>
	<form>
	<p><label for="municipio">Municipio</label>
       <input type="text" name="municipio" id="municipio"  size="35" minlength="4"/>
	</p>
	</form>
	</body>
</html>