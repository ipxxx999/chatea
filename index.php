<?php
include "db.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>CHAT en PHP</title>


        <meta name="HandheldFriendly" content="True">
        <meta name="MobileOptimized" content="360">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
        <meta name="apple-itunes-app" content="app-id=">

	<link rel="stylesheet" type="text/css" href="estilos.css">
	<link href="./css/MuktaVaani.css?family=Mukta+Vaani" rel="stylesheet">

        <link href="./static/assets/css-wide.css" type="text/css" rel="stylesheet" media="all">
        <link href="./static/assets/css-tablet.css" type="text/css" rel="stylesheet" media="all">
        <link href="./static/assets/css-mobile320.css" type="text/css" rel="stylesheet" media="all">
        <link href="./static/assets/css-mobile480.css" type="text/css" rel="stylesheet" media="all">

	<script type="text/javascript">
		function ajax(){
			var req = new XMLHttpRequest();

			req.onreadystatechange = function(){
				if (req.readyState == 4 && req.status == 200) {
					document.getElementById('chat').innerHTML = req.responseText;
				}
			}

			req.open('GET', 'chat.php', true);
			req.send();
		}

		//linea que hace que se refreseque la pagina cada segundo
		setInterval(function(){ajax();}, 1000);
	</script>
</head>
<body onload="ajax();">

	<div id="contenedor">
		<div id="caja-chat">
			<div id="chat"></div>
		</div>

		<form method="POST" action="index.php">
			<input type="text" name="nombre" placeholder="Ingresa tu nombre">			
			<textarea name="mensaje" placeholder="Ingresa tu mensaje"></textarea>
			<input type="submit" name="enviar" value="Enviar">
		</form>

		<?php
			if (isset($_POST['enviar'])) {
				
				$nombre = $_POST['nombre'];
				$mensaje = $_POST['mensaje'];


				$consulta = "INSERT INTO chat (nombre, mensaje) VALUES ('$nombre', '$mensaje')";

				$ejecutar = $conexion->query($consulta);

				if ($ejecutar) {
					echo "<embed loop='false' src='beep.mp3' hidden='true' autoplay='true'>";
				}
			}

		?>
	</div>

</body>
</html>