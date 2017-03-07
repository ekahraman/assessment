<?php
if (isset($_POST['id']) && isset($_POST['id']) != "") {

    require 'connection.php';

    $user_id    = $_POST['id'];
    $object     = new CrudClass();

    // Shows the related user's records by user_id @param via Details method
    echo $object->Details($user_id);
}