<?php
if (isset($_POST['id']) && isset($_POST['id']) != "") {

    require 'connection.php';

    $user_id = $_POST['id'];

    $object = new CrudClass();
    // Remove the user record from the database via Delete method
    $object->Delete($user_id);
}