<?php
    include_once __DIR__.'/myapi/Products.php';
    $p = New Products('root', 'nomeacuerdo', 'marketzone');
    $p->add(file_get_contents('php://input'));
    echo $p->getData();

?>