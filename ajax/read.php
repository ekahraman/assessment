<?php

require "crud.class.php";

$object = new DB_OPS();

// Design initial table header
$data   = '<table class="table table-hover table-responsive">
                        <tr>
                            <th>Book Name</th>
                            <th>Author Name</th>
                            <th>ISBN No</th>
                            <th>Update / Delete</th>
                        </tr>';


// Fetch books from the Read method.
$books = $object->Read();

// Append all users to the data table
if (count($books) > 0) {
    foreach ($books as $book) {
        $data .= '<tr>
                    <td>' . $book['book_name'] .    '</td>
                    <td>' . $book['author_name'] .  '</td>
                    <td>' . $book['isbn'] .         '</td>
                    <td>
                        <button onclick="bookDetails(' . $book['id'] . ')" class="btn btn-info"><i class="fa fa-refresh" aria-hidden="true"></i></button>
                        <button onclick="deleteBook(' . $book['id'] . ')" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                    </td>
                </tr>';
    }
} else { // No books in database
    $data   .= '<tr>
                    <td colspan="4"><p class="bg-danger">Not a single book in the database yet. Why don\'t you create one?</p></td>
                </tr>';
}

$data .= '</table>';

echo $data;

?>
