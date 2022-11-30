<?php 

if(isset($_POST['delete_user'])) {
    require_once "connection.php";
    global $conn;

    $userId = mysqli_real_escape_string($conn, $_POST['user_id']);

    function deleteStudent($conn, $userId) {
        $query = "DELETE FROM users WHERE id='$userId'";
        $result = mysqli_query($conn, $query);

        if(!$result) {
            $res = [
                'status' => 400,
                'error' => 'Can`t delete user'
            ];
            echo json_encode($res);
        } 

        $res = [
            'status' => 200,
            'message' => 'User deleted successfully'
        ];
        echo json_encode($res);
    }

    deleteStudent($conn, $userId);
}