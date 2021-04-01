<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');




include_once('../../models/Postmodel.php');

$post = new Post();

// Get ID

$post->id = isset($_GET['id']) ? $_GET['id'] : die();

// Get post

$post->read_single();

$post_arr  = array(
    'id' => $post->id,
    'title' => $post->title,
    'body' => $post->body
);

// Make JSOn

print_r(json_encode($post_arr));
