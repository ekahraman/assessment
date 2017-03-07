<?php

require __DIR__ . '/connection.php';

/**
 * Class CrudClass is used for database related (Create, Read, Update and Delete) operations.
 * There are 5 methods in the class in which will be explained in relevant docblocks.
 */
class CrudClass
{

    protected $db;

    /**
     * CrudClass constructor.
     */
    function __construct() {
        $this->db = PDO();
    }

    /**
     * CrudClass destructor.
     */
    function __destruct() {
        $this->db = null;
    }


    /**
     * Insert data into the database.
     *
     * @param $username
     * @param $age
     * @param $email
     * @param $favourite_sports_club
     * @return string
     */
    public function Create($username, $age, $email, $favourite_sports_club) {

        $query = $this->db->prepare("INSERT INTO users(username, age, email, favourite_sports_club) VALUES (:username,:age,:email,:favourite_sports_club)");
        $query->bindParam("username", $username, PDO::PARAM_STR);
        $query->bindParam("age", $age, PDO::PARAM_INT);
        $query->bindParam("email", $email, PDO::PARAM_STR);
        $query->bindParam("favourite_sports_club", $favourite_sports_club, PDO::PARAM_STR);
        $query->execute();

        return $this->db->lastInsertId();
    }


    /*
     * Get all the data from the database.
     *
     * @return $mixed
     */
    public function Read() {

        $query = $this->db->prepare("SELECT * FROM users");
        $query->execute();
        $data = array();
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $data[] = $row;
        }

        return $data;
    }


    /*
     * Delete relevant record from the database.
     *
     * @param $user_id
     */
    public function Delete($user_id) {

        $query = $this->db->prepare("DELETE FROM users WHERE id = :id");
        $query->bindParam("id", $user_id, PDO::PARAM_STR);
        $query->execute();
    }


    /*
     * Update data and save in database.
     *
     * @param $first_name
     * @param $last_name
     * @param $email
     * @return $mixed
     */
    public function Update($username, $age, $email, $favourite_sports_club, $user_id) {

        $query = $this->db->prepare("UPDATE users SET username= :username, age= :age, email= :email, favourite_sports_club= :favourite_sports_club WHERE id = :id");
        $query->bindParam("username", $username, PDO::PARAM_STR);
        $query->bindParam("age", $age, PDO::PARAM_INT);
        $query->bindParam("email", $email, PDO::PARAM_STR);
        $query->bindParam("favourite_sports_club", $favourite_sports_club, PDO::PARAM_STR);
        $query->bindParam("id", $user_id, PDO::PARAM_STR);
        $query->execute();
    }

    /*
     * Get selected users details by the user's id.
     *
     * @param $user_id
     * */
    public function Details($user_id) {

        $query = $this->db->prepare("SELECT * FROM users WHERE id = :id");
        $query->bindParam("id", $user_id, PDO::PARAM_STR);
        $query->execute();
        return json_encode($query->fetch(PDO::FETCH_ASSOC));

    }
}
