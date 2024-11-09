<?php
    use TECWEB\MYAPI\DELETE\Delete;
    include_once __DIR__.'/myapi/database.php';
    $p = New Delete('marketzone');
    $p->delete($_GET['id']);
    echo $p->getData();
?>