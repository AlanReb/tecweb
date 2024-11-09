<?php
    use TECWEB\MYAPI\UPDATE\Update;
    include_once __DIR__.'/myapi/database.php';
    $p = New Update('marketzone');
    $p->edit(file_get_contents('php://input'));
    echo $p->getData();
?>
