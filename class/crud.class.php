<?php

require __DIR__ . '/connection.php';


/**
 * Class CrudClass is used for database related (Create, Read, Update and Delete) operations.
 * There are 5 methods in the class in which will be explained in relevant docblocks.
 */
class DB_OPS
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

    /*
     * Insert data into the database.
     *
     * @param $book_name
     * @param $author_name
     * @param $isbn
     * @return $mixed
     * */
    public function Create($book_name, $author_name, $isbn) {

        $query = $this->db->prepare("INSERT INTO books(book_name, author_name, isbn) VALUES (:book_name,:author_name,:isbn)");
        $query->bindParam("book_name", $book_name, PDO::PARAM_STR);
        $query->bindParam("author_name", $author_name, PDO::PARAM_STR);
        $query->bindParam("isbn", $isbn, PDO::PARAM_STR);
        $query->execute();

        return $this->db->lastInsertId();
    }

    /*
     * Delete relevant record from the database.
     *
     * @param $book_id
     * */
    public function Delete($book_id) {

        $query = $this->db->prepare("DELETE FROM books WHERE id = :id");
        $query->bindParam("id", $book_id, PDO::PARAM_INT);
        $query->execute();
    }

    /*
     * Delete relevant record from the database.
     *
     * @param $book_name
     * @param $author_name
     * @param $isbn
     * @return $mixed
     * */
    public function Update($book_name, $author_name, $isbn, $book_id) {

        $query = $this->db->prepare("UPDATE books SET book_name = :book_name, author_name = :author_name, isbn = :isbn  WHERE id = :id");
        $query->bindParam("book_name", $book_name, PDO::PARAM_STR);
        $query->bindParam("author_name", $author_name, PDO::PARAM_STR);
        $query->bindParam("isbn", $isbn, PDO::PARAM_STR);
        $query->bindParam("id", $book_id, PDO::PARAM_INT);
        $query->execute();
    }

    /*
     * Get all the data from the database.
     *
     * @return string
     * */
    public function Read() {

        $query = $this->db->prepare("SELECT * FROM books");
        $query->execute();

        $data = array(); // Define result array

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $data[] = $row;
        }

        return json_encode($data);
    }

    /**
     * Get selected book details by the book's id
     *
     * @param $book_id
     * @return string
     */
    public function Details($book_id) {

        $query = $this->db->prepare("SELECT * FROM books WHERE id = :id");
        $query->bindParam("id", $book_id, PDO::PARAM_INT);
        $query->execute();

        return json_encode($query->fetch(PDO::FETCH_ASSOC));
    }
}

?>
