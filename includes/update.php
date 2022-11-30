<?php 

if(isset($_POST['update_user'])) {
    require_once "connection.php";
    global $conn;

    $id = mysqli_real_escape_string($conn, $_POST['user_id']);
    // $id = mysqli_real_escape_string($conn, $_GET['user_id']);
    $username = mysqli_real_escape_string($conn, $_POST['newUsername']);
    $firstname = mysqli_real_escape_string($conn, $_POST['newFirstname']);
    $lastname = mysqli_real_escape_string($conn, $_POST['newLastname']);

    function updateUser($conn, $id, $username, $firstname, $lastname) {
        $query = "UPDATE users SET username='$username', firstname='$firstname', lastname='$lastname' WHERE id='$id'";
        $result = mysqli_query($conn, $query);

        if(!$result) {
            $res = [
                'status' => 400,
                'error' => 'Can`t update user'
            ];
        }

        $res = [
            'status' => 200,
            'message' => 'User updated successfully'
        ];

        echo json_encode($res);
    }

    if(empty($username) || empty($firstname) || empty($lastname)) {
        $res = [
            'status' => 401,
            'error' => 'Please fill in all fields'
        ];
        echo json_encode($res);
    } else {
        updateUser($conn, $id, $username, $firstname, $lastname);
    }
}