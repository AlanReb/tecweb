<?php
    use TECWEB\MYAPI\Products;
    include_once __DIR__.'/vendor/autoload.php';
    $R = New Read();
    $R->singleByName($_GET['name']);
    $R->getData();
?>
