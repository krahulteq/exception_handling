<?php

require_once 'conn.php';

// define variables
$email = $password = "";
$emailErr = $passwordErr = $validErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // check if email is empty
    try {
        if (empty($email)) {
            throw new Exception("Please enter your email", 123);
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception("Please enter valid email", 124);
        }
        if (empty($password)) {
            throw new Exception("Please enter your password", 125);
        }
        if (!empty($email) && !empty($password)) {
            $sql = " SELECT * FROM `users` WHERE `email` = '$email' AND `password` = md5('$password') AND `soft_delete` = '1' ";
            $result = mysqli_query($conn, $sql);
            $num = mysqli_num_rows($result);

            // Check for login successfully!
            if ($num != 1) {
                throw new Exception("Please enter correct details for login...", 126);
            } else {
                $data = array(
                    "status"     => true,
                    "message_code"  => '205',
                    "message"   => 'login successful'
                );
                echo json_encode($data);
                die();
            }
        }
    } catch (Exception $e) {
        $data = array(
            "status"     => false,
            "error_code"  => $e->getCode(),
            "error"  => $e->getMessage(),
        );
        echo json_encode($data);
        die();
    }
}
