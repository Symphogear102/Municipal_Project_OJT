<?php 

spl_autoload_register('autoUsers');

function autoUsers($className) {
    $path = "classes/User/";
    $extenstion = ".class.php";
    $fullPath = $path . $className . $extenstion; 

    include_once $fullPath;
}
?>