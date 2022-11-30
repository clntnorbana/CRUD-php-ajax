<?php 
    require_once('connection.php');

    function displayUser() {
        global $conn;

        $table = "";
        $table = '<table>
            <thead>
                <tr>
                    <td>User</td>
                    <td>First Name</td>
                    <td>Last Name</td>
                    <td>Action</td>
                </tr>
            </thead>';

        $query = "SELECT * FROM users";
        $result = mysqli_query($conn, $query);

        if(mysqli_num_rows($result) > 0) {
            foreach($result as $user) {
                $table.= '<tbody>
                <tr>
                    <td>'.$user['username'].'</td>
                    <td>'.$user['firstname'].'</td>
                    <td>'.$user['lastname'].'</td>
                    <td>
                        <button id="delete" type="button" value='.$user['id'].'>delete</button>
                        <button id="edit" type="button" value='.$user['id'].'>edit</button>
                    </td>
                </tr>
            </tbody>';
            }
        }

        $table.='</table>';
        $res = [
            'status' => 200,
            'message' => 'success',
            'data' => $table
        ];

        echo json_encode($res);
    }

    displayUser();