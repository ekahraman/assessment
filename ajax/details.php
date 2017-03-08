<?php
if (isset($_POST['id']) &&
    isset($_POST['id']) != "")
{
    require "crud.class.php"; // No need to include this file if no input is posted

    $book_id    = $_POST['id'];
    $object     = new DB_OPS();

    // Shows the related book's records by book_id @param via Details method
    echo $object->Details($book_id);
}
?>