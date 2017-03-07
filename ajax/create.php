<?php
if (
    isset($_POST['username']) &&
    isset($_POST['age']) &&
    isset($_POST['email']) &&
    isset($_POST['favourite_sports_club'])
    ) {

    require("crud.class.php");

    $username               = $_POST['username'];
    $age                    = $_POST['age'];
    $email                  = $_POST['email'];
    $favourite_sports_club  = $_POST['favourite_sports_club'];

    $object                 = new CrudClass();

    $object->Create($username, $age, $email, $favourite_sports_club);
}