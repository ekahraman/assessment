<?php
require 'crud.class.php';

$object = new CrudClass();
$data   = '<table class="table table-hover">
               <tr>
                   <th>No.</th>
                   <th>User Name</th>
                   <th>Age</th>
                   <th>Email Address</th>
                   <th>Favourite Sports Club</th>
                   <th>Update</th>
                   <th>Delete</th>
               </tr>
           ';

// Fetch users from the Read method. 
$users  = $object->Read();
// Append all users to the data table
if (count($users) > 0) {
    $i  = 1;
    foreach ($users as $user) {
        $data .= '
                    <tr>
                        <td>' . $i .                                '</td>
                        <td>' . $user['username'] .                 '</td>
                        <td>' . $user['age'] .                      '</td>
                        <td>' . $user['email'] .                    '</td>
                        <td>' . $user['favourite_sports_club'] .    '</td>
                        <td>
                            <button onclick="GetUserDetails(' . $user['id'] . ')" class="btn btn-warning">Update</button>
                        </td>
                        <td>
                            <button onclick="DeleteUser(' . $user['id'] . ')" class="btn btn-danger">Delete</button>
                        </td>
                    </tr>
                 ';
        $i++;
    }
} else { // No user in database
    $data .= '<tr><td colspan="7">Not a single user in the database yet</td></tr>';
}

$data .= '</table>';

echo $data;
