<?php

header('Access-Control-Allow-Origin: *');
header('Context-Type: application/json');

$data = array(
    'get' => $_GET,
    'post' => $_POST
);

echo json_encode($data);

?>