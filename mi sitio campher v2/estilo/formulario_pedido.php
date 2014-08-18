<?php
if (empty($name_pedido) || empty($mail_pedido) || empty($formapago_paypal_pedido || empty($formapago_depositobco_pedido) )) {
echo "<h2 align=\"center\">El formulario no está completo Llene todos los campos Requeridos</h2>";
}
else {
mail ("mrgeova00@hotmail.com", "Página de campherGlutenFree",
"From: $nombre <$mail_pedido>" );
echo "<h2 align=\"center\">El mensaje ha sido enviado. Gracias.</h2>";
}
?> 