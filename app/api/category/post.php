<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');


include_once('../../models/Postmodel.php');

$post = new Post();

// Get raw posted data

$data =  json_decode(file_get_contents("php://input"));


// echo json_encode($data);

$post->title = $data->title;
$post->body = $data->body;

if ($post->create()) {
    echo json_encode(
        array("message" => "Post created successfully")
    );
} else {
    echo json_encode(
        array("message" => "Post not created")
    );
}
