<?php
if (isset($_POST)) {
    require "crud.class.php"; // No need to include this file if no input is posted

    $id             = $_POST['id'];
    $book_name      = $_POST['book_name'];
    $author_name    = $_POST['author_name'];
    $isbn           = $_POST['isbn'];

    $object         = new DB_OPS();

    // Update the database record via Update method
    $object->Update($book_name, $author_name, $isbn, $id);
}