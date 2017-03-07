<?php
if (isset($_POST)) {

    require 'crud.class.php';

    $id                     = $_POST['id'];
    $username               = $_POST['username'];
    $age                    = $_POST['age'];
    $email                  = $_POST['email'];
    $favourite_sports_team  = $_POST['favourite_sports_team'];

    $object                 = new CrudClass();
    // Update the database record via Update method.
    $object->Update($username, $age, $email, $favourite_sports_team, $id);
}