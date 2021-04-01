<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: GET');
header('Access-Control-Allow-Headers: application/json');


include_once('../../models/Postmodel.php');

$post = new Post();


$rs = $post->read();
$posts_arr = array();
$posts_arr['data'] = array();

while ($row = $rs->fetch(PDO::FETCH_ASSOC)) {
    extract($row);


    $post_item = array(
        'id' => $id,
        'title' => $title,
        'body' => $body
    );

    array_push($posts_arr['data'], $post_item);
}
// Turn to JSON
echo json_encode($posts_arr);
