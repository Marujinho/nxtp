<?php

setcookie('next-session','', time()-3600*8);
setcookie('god-session','', time()-3600*24);


header("Location: index.php");

?>