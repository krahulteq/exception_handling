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
            throw new Exception($email);
        }
    } catch (Exception $e) {
        $data = array(
            "status"     => false,
            "error_code"  => '202',
            "error"   => 'Please enter your email'
        );
        echo json_encode($data);
        die();
    }

    // check if email is invalid
    try {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception($email);
        }
    } catch (Exception $e) {
        $data = array(
            "status"     => false,
            "error_code"  => '203',
            "error"   => 'Please enter valid email'
        );
        echo json_encode($data);
        die();
    }

    // check if password is empty
    try {
        if (empty($password)) {
            throw new Exception($password);
        }
    } catch (Exception $e) {
        $data = array(
            "status"     => false,
            "error_code"  => '204',
            "error"   => 'Please enter your password'
        );
        echo json_encode($data);
        die();
    }

    // check if login credential is correct
    try {
        if (!empty($email) && !empty($password)) {
            $sql = " SELECT * FROM `users` WHERE `email` = '$email' AND `password` = md5('$password') AND `soft_delete` = '1' ";
            $result = mysqli_query($conn, $sql);
            $data = mysqli_fetch_assoc($result);
            $num = mysqli_num_rows($result);

            // Check for login successfully!
            if ($num != 1) {
                throw new Exception($login);
            } else {
                $data = array(
                    "status"     => true,
                    "error_code"  => '205',
                    "error"   => 'login successful'
                );
                echo json_encode($data);
                die();
            }
        }
    } catch (Exception $e) {
        $data = array(
            "status"     => false,
            "error_code"  => '204',
            "error"   => 'Please enter correct details for login...'
        );
        echo json_encode($data);
        die();
    }




    // email validation
    // if (empty($email)) {
    //     $errorcheck = 1;
    //     $data = array(
    //         "status"     => false,
    //         "error_code"  => '202',
    //         "error"   => 'Please enter your email'
    //     );
    //     echo json_encode($data);
    //     die();
    // } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    //     $errorcheck = 1;
    //     $data = array(
    //         "status"     => false,
    //         "error_code"  => '203',
    //         "error"   => 'Please enter valid email'
    //     );
    //     echo json_encode($data);
    //     die();
    // }

    // // password validation
    // if (empty($password)) {
    //     $errorcheck = 1;
    //     $data = array(
    //         "status"     => false,
    //         "error_code"  => '204',
    //         "error"   => 'Please enter your password'
    //     );
    //     echo json_encode($data);
    //     die();
    // }

    // if (empty($emailErr) && empty($passwordErr)) {
    //     $sql = " SELECT * FROM `users` WHERE `email` = '$email' AND `password` = md5('$password') AND `soft_delete` = '1' ";
    //     $result = mysqli_query($conn, $sql);
    //     $data = mysqli_fetch_assoc($result);
    //     $num = mysqli_num_rows($result);

    //     // Check for login successfully!
    //     if ($num == 1 && $data['user_type'] == "0") {
    //         $_SESSION['id'] = $data['id'];
    //         $_SESSION['admin'] = 'admin';
    //         $data = array(
    //             "status"     => true,
    //             "error_code"  => '206',
    //             "error"   => 'login successfully'
    //         );
    //         echo json_encode($data);
    //         die();
    //     } elseif ($num == 1 && $data['user_type'] == "1") {
    //         $_SESSION['id'] = $data['id'];
    //         $_SESSION['client'] = 'client';
    //         $data = array(
    //             "status"     => true,
    //             "error_code"  => '207',
    //             "error"   => 'login successfully'
    //         );
    //         echo json_encode($data);
    //         die();
    //     } else {
    //         $showError = 1;
    //         $data = array(
    //             "status"     => false,
    //             "error_code"  => '205',
    //             "error"   => 'Please enter correct details for login...'
    //         );
    //         echo json_encode($data);
    //         die();
    //     }
    // }
}
