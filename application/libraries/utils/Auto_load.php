<?php

function __autoload($class_name) {
//    $class_name = strtolower($class_name);
    $path1 = "../../../controllers/{$class_name}.php";
    $path2 = "../../controllers/{$class_name}.php";
    $path3 = "controllers/{$class_name}.php";
    $path4 = "utils/{$class_name}.php";
    $path6 = "../../utils/{$class_name}.php";
    $path5 = "../controllers/{$class_name}.php";
    $path7 = "komite/controllers/{$class_name}.php";
    if (file_exists($path1)) {
        require_once $path1;
    } else if (file_exists($path2)) {
        require_once $path2;
    } else if (file_exists($path3)) {
        require_once $path3;
    } else if (file_exists($path4)) {
        require_once $path4;
    } else if (file_exists($path5)) {
        require_once $path5;
    } else if (file_exists($path6)) {
        require_once $path6;
    } else if (file_exists($path7)) {
        require_once $path7;
    }else {
        die("File {$class_name}.php tidak dapat ditemukan");
    }
}

?>
