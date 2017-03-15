<?php

require "../class/crud.class.php";

/**
 * According to the rest method we take action
 */
switch ($_POST['method']) {

    case 'DELETE': // Delete a book
        $book_id    = $_POST['id'];
        $object     = new DB_OPS();
        // Remove the user record from the database via Delete method
        $object->Delete($book_id);

        break;

    case 'GET': // Returns all the books
        $object     = new DB_OPS();
        $books      = $object->Read();
        echo $books;

        break;

    case 'POST': // Create a new book
        if (isset($_POST['book_name']) &&
            isset($_POST['author_name']) &&
            isset($_POST['isbn'])
        ) {
            $book_name      = $_POST['book_name'];
            $author_name    = $_POST['author_name'];
            $isbn           = $_POST['isbn'];

            $object         = new DB_OPS();
            $object->Create($book_name, $author_name, $isbn);
        }

        break;

    case 'PUT': // Updates single book
        if (isset($_POST)) {
            $id             = $_POST['id'];
            $book_name      = $_POST['book_name'];
            $author_name    = $_POST['author_name'];
            $isbn           = $_POST['isbn'];

            $object         = new DB_OPS();
            // Update the database record via Update method
            $object->Update($book_name, $author_name, $isbn, $id);
        }

        break;

    case 'SELECT': // View the related book record
        if (isset($_POST['id']) &&
            isset($_POST['id']) != "")
        {
            $book_id    = $_POST['id'];

            $object     = new DB_OPS();
            // Shows the related book's records by book_id @param via Details method
            echo $object->Details($book_id);
        }
        break;

    default: // 405 = Method Not Allowed
        http_response_code(405);
        exit;

}
