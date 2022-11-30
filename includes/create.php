<?php 

if(isset($_POST['create_user'])) {
    require_once "connection.php";
    global $conn;

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirmPassword = mysqli_real_escape_string($conn, $_POST['confirm_password']);

    function createUser($conn, $username, $firstname, $lastname, $password, $confirmPassword) {
        $query = "INSERT INTO users (username, password, lastname, firstname) 
        VALUES ('$username', '$password', '$lastname', '$firstname')";
        $result = mysqli_query($conn, $query);
        
        if(!$result) {
            $res = [
                'status' => 400,
                'error' => 'Can`t add user'
            ];
        }

        $res = [
            'status' => 200,
            'message' => 'User created successfully'
        ];

        echo json_encode($res);
    }

    if(empty($username) || empty($firstname) || empty($lastname) || empty($password) || empty($confirmPassword)) {
        $res = [
            'status' => 401,
            'error' => 'Please fill in all fields'
        ];
        echo json_encode($res);
    }   else if($password != $confirmPassword) {
        $res = [
            'status' => 402,
            'error' => 'Password do not match'
        ];
        echo json_encode($res);
    } else {
        createUser($conn, $username, $firstname, $lastname, $password, $confirmPassword);
    }
}