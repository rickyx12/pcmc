<?php

$str =  "Ť";

echo htmlentities($str, ENT_IGNORE,"ISO-8859-1");

?>



<input type="text" name="anything" value="<?php echo htmlspecialchars('Ƈ'); ?>" />


