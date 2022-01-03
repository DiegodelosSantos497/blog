<?php


if (isset($_REQUEST['action'])) {
    require_once("../config/Config.php");
    require_once("../DAO/UserDAO.php");
    $obj = new UserDAO();

    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);

    switch ($_REQUEST['action']) {
        case 'login':
            if (empty($email) || empty($password)) {
                messages("danger", "All fields are required");
                redirect("../public/login/");
            } else {
                if ($obj->login($email, $password) != "") {
                    $_SESSION['user'] = $obj->login($email, $password);
                    redirect("../public/dashboard/");
                } else {
                    messages("danger", "Verify that your data is correct");
                    redirect("../public/login/");
                }
            } 
            print_r($_POST);
            break;
        case 'logout':
            if (isset($_SESSION['user'])) {
                unset($_SESSION['user']);
                session_destroy();
                redirect("../public/login/");
            }
            break;

        default:
            # code...
            break;
    }
}
