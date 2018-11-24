<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../config/Database.php';
include_once '../models/Post.php';

$database = new Database();
$db = $database->connect();

$post = new Post($db);
$post->id = isset($_GET['id']) ? $_GET['id'] : die();

$result = $post->readSingle();
$row = $result->fetch(PDO::FETCH_ASSOC);

$row_item = array(
    'id'            => $row['id'],
    'title'         => $row['title'],
    'body'          => $row['body'],
    'author'        => $row['author'],
    'category_id'   => $row['category_id'],
    'category_name' => $row['category_name']
);

echo json_encode($row_item);
