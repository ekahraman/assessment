<?php
if (isset($_POST['book_name']) &&
    isset($_POST['author_name']) &&
    isset($_POST['isbn'])
) {
    require "crud.class.php"; // No need to include this file if no input is posted

    $book_name      = $_POST['book_name'];
    $author_name    = $_POST['author_name'];
    $isbn           = $_POST['isbn'];

    $object         = new DB_OPS();

    $object->Create($book_name, $author_name, $isbn);
}
?>