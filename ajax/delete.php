<?php
if (isset($_POST['id']) &&
    isset($_POST['id']) != "")
{
    require "crud.class.php"; // No need to include this file if no input is posted

    $book_id    = $_POST['id'];
    $object     = new DB_OPS();

    // Remove the user record from the database via Delete method
    $object->Delete($book_id);
}
?>