<?php

// renvoie la class "active" selon la page actuelle
function active($item){
$name = $_SERVER['PHP_SELF'];
$reg = '#^(.+[\\\/])*([^\\\/]+)$#';
$page = preg_replace($reg,'$2', $name);

if ($page == $item){
echo 'active';
}
}