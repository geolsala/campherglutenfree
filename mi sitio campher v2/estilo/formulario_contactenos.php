<?php
if (empty($name) || empty($mail) || empty($sugerencia)) {
echo "<h2 align=\"center\">El formulario no está completo</h2>";
}
else {
mail (mrgeova00@hotmail.com),
"$sugerencia", "De: $name <$mail>" );
echo "<h2 align=\"center\">El mensaje ha sido enviado. Gracias.</h2>";
}
?> 