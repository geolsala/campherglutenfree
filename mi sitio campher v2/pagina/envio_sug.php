<?
	echo "

";
	// Primero revisamos que las variables que vienen de los formularios no se encuentren vacías
	if (empty($_POST['sug_nombre']))
		echo "No se especifico nombre
";
	if (empty($_POST['sug_email'))
		echo "No se especifico E - mail
";
	if (empty($_POST['sug_asunto']))
		echo "No se especifico asunto
";
	if (empty($_POST['sug_mensaje']))
		echo "Por favor, no envie un mensaje en blanco
";
	// Luego validamos con strchr la primera ocurrencia de la arroba y el punto, es decir, validamos
	// que sea un email lo que se escribe en el campo correspondiente
	if ((!strchr($_POST['sug_email'],"@")) || (!strchr($_POST['sug_email'],".")))
	{	
		echo "No es un correo válido
";
		// Esta bandera se activa en false si no es un email válido
		$valida = false;
	}
	
	// Si todo sale bien	
	if ((empty($_POST['sug_nombre'])) && (empty($_POST['sug_email'])) && (empty($_POST['sug_asunto'])) && (empty($_POST['sug_mensaje'])) && (valida!= false))
	{
		// Creamos el header para el mensaje
		// Sección Para:
		$to = $_POST['sug_para'];
		// Asunto
		$subject = $_POST['sug_asunto'];
		// El content-Type y demás información para el mailer
		$headers = "MIME-Version: 1.0\n";
		$headers .= "Content-type: text/html; charset=iso-8859-1 \r\n";
		// El De: en la forma Nombre elcorreo@servidor.com, esto garantiza que
		// en el cliente de correo del receptor se vea sólo el nombre de quien envia
		// en su bandeja de entrada
		$headers .= "From: $_POST[sug_nombre]  <$_POST[sug_email]> \r\n";
		// Opcional: Resopnder a:
		$headers .= "Reply-To: " . $_POST['sug_email']; 
		// El mensaje
		$message = $_POST['sug_mensaje'];
		// Abrimos un pipe Unix para ejecutar sendmail en el servidor, el "w" es porque se abre para escritura
		$fd = popen("/usr/sbin/sendmail -t", 'w');
		// Metes las cabeceras del mensaje en el pipe
		fputs($fd, "To: $to\n");
		fputs($fd, "Subject: $subject\n");
		fputs($fd, "X-Mailer: PHP4\n");
		if ($headers) {
			fputs($fd, "$headers\n");
		}
		// Dejas un espacio en blanco
		fputs($fd, "\n");
		// Metes el mensaje en el pipe
		fputs($fd, $message);
		//Cierras el pipe y con ello se envia el mensaje
		pclose($fd);
		echo "Mensaje enviado, Gracias por sus sugerencias.
";
	}
	echo 'Regresar</p>';
?>
    