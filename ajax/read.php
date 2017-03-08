<?php

require "crud.class.php";

$object = new DB_OPS();

// Design initial table header
$data   = '<table class="table table-hover table-responsive">
                        <tr>
                            <th>Record No</th>
                            <th>Book Name</th>
                            <th>Author Name</th>
                            <th>ISBN No</th>
                            <th>Update</th>
                            <th>Delete</th>
                        </tr>';


// Fetch books from the Read method.
$books = $object->Read();

// Append all users to the data table
if (count($books) > 0) {
    $i = 1;
    foreach ($books as $book) {
        $data .= '<tr>
                    <td>' . $i .                    '</td>
                    <td>' . $book['book_name'] .    '</td>
                    <td>' . $book['author_name'] .  '</td>
                    <td>' . $book['isbn'] .         '</td>
                    <td>
                        <button onclick="bookDetails(' . $book['id'] . ')" class="btn btn-warning">Update</button>
                    </td>
                    <td>
                        <button onclick="deleteBook(' . $book['id'] . ')" class="btn btn-danger">Delete</button>
                    </td>
                </tr>';
        $i++;
    }
} else { // No books in database
    $data   .= '<tr>
                    <td colspan="6">Not a single book in the database yet. Why don\'t you create one?</td>
                </tr>';
}

$data .= '</table>';

echo $data;

?>