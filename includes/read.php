<?php 

if(isset($_GET['user_id'])) {
    require_once "connection.php";
    global $conn;

    $userId = mysqli_real_escape_string($conn, $_GET['user_id']);
    
    function getUser($conn, $userId) {
        
        $query = "SELECT * FROM users WHERE id='$userId'";
        $result = mysqli_query($conn, $query);

        if(!$result) {
            $res = [
                'status' => 400,
                'error' => 'There was an error'
            ];
            echo json_encode($res);
        }

        if(mysqli_num_rows($result) > 0) {
            $user = mysqli_fetch_array($result);
            
            $form = "";
            $form .= '<form id="create_form">
                    <span id="update_message" style="display: none;"></span>
                    <h3>Update User</h3>
                    <input value='.$user['id'].' id="edit-userid" name="edit-userid" type="text" placeholder="Username" disabled>
                    <input value='.$user['username'].' id="edit-username" name="edit-username" type="text" placeholder="Username">
                    <input value='.$user['firstname'].' id="edit-firstname" name="edit-firstname" type="text" placeholder="First Name">
                    <input value='.$user['lastname'].' id="edit-lastname" name="edit-lastname" type="text" placeholder="Last Name">
                    <button id="update" type="submit">Update</button>
                    <button id="edit-cancel" type="button">Cancel</button>
                </form>';

            $res = [
                'status' => 200,
                'data' => $form
            ];
            echo json_encode($res);
        } else {
            $res = [
                'status' => 404,
                'error' => 'No such user'
                
            ];
            echo json_encode($res);
        }
    }

    getUser($conn, $userId);
}