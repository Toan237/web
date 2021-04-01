<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: application/json');

include_once('../../models/Postmodel.php');

$post = new Post();


$data =  json_decode(file_get_contents("php://input"));


// echo json_encode($data);

$post->id = $data->id;
$post->title = $data->title;
$post->body = $data->body;


if ($post->update()) {
    echo json_encode(
        array("message" => "Update successfully")
    );
} else {
    echo json_encode(
        array("message" => "Update failed")
    );
}
