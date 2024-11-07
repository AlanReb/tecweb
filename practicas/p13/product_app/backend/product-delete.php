<?php
    use TECWEB\MYAPI\Products as Products;
    include_once __DIR__.'/myapi/database.php';
    $p = New Products('root', 'nomeacuerdo', 'marketzone');
    $p->delete($_GET['id']);
    echo $p->getData();
?>