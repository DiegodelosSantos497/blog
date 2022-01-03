<?php


if (isset($_REQUEST['action'])) {
    require_once("../config/Config.php");
    require_once("../DAO/UserDAO.php");
    $obj = new UserDAO();

    /* default variables */
    $path = "../assets/img/users/";
    $allowedExtensions = ['jpg', 'jpeg', 'png'];

    $name = empty($_POST['name']) ? "" : $_POST['name'];
    $email = empty($_POST['email']) ? "" : $_POST['email'];
    $password = empty($_POST['password']) ? "" : $_POST['password'];
    $password2 = empty($_POST['password2']) ? "" : $_POST['password2'];
    $image = empty($_FILES['image']) ? "" : $_FILES['image'];
    $extension = strtolower(pathinfo($image['name'], PATHINFO_EXTENSION));
    $current_image = empty($_POST['current_image']) ? "" : $_POST['current_image'];
    $status = empty($_POST['status']) ? "" : $_POST['status'];
    $id = empty($_POST['id']) ? "" : $_POST['id'];



    switch ($_REQUEST['action']) {
        case 'insert':
            if (empty($name) || empty($email) || empty($password) || empty($password2) || empty($status) || empty($image['name'])) {
                messages("danger", "All fields are required");
                redirect("../public/users/form.php");
            } elseif ($obj->validate_duplicate_email($email)) {
                messages("danger", "This email already exists");
                redirect("../public/users/form.php");
            } elseif ($password != $password2) {
                messages("danger", "Passwords do not match");
                redirect("../public/users/form.php");
            } elseif (!in_array($extension, $allowedExtensions)) {
                messages("danger", "The selected file must be an image(.jpg,.jpeg,.png)");
                redirect("../public/users/form.php");
            } elseif (move_uploaded_file($image['tmp_name'], $path . $image['name']) && $obj->insert($name, $email, $password, $image['name'], $status, formatDate())) {
                messages("success", "Record inserted successfully");
                redirect("../public/users/form.php");
            } else {
                messages("danger", "Error inserting new record");
                redirect("../public/users/form.php");
            }
            break;
        case 'update':
            if (empty($name) || empty($email) || empty($password) || empty($password2) || empty($status)) {
                messages("danger", "All fields are required");
                redirect("../public/users/form.php?id=$id");
            } elseif ($password != $password2) {
                messages("danger", "Passwords do not match");
                redirect("../public/users/form.php?id=$id");
            } else {
                if (!empty($image['name'])) {
                    if (!in_array($extension, $allowedExtensions)) {
                        messages("danger", "The selected file must be an image(.jpg,.jpeg,.png)");
                        redirect("../public/users/form.php?id=$id");
                    } elseif (unlink($path . $current_image) && move_uploaded_file($image['tmp_name'], $path . $image['name']) && $obj->update($name, $email, $password, $image['name'], $status, formatDate(), $id)) {
                        if($_SESSION['user']->user_id == $id){
                            $_SESSION['user'] = ['user_id'=>$id,'user_name'=>$name,'user_email'=>$email,'user_password'=>$password,
                            'user_image'=>$image['name'],'user_status'=>$status,'user_created_at'=>formatDate()];
                        }
                        messages("success", "Record inserted successfully");
                        redirect("../public/users/");
                    } else {
                        messages("danger", "Error inserting new record");
                        redirect("../public/users/form.php?id=$id");
                    }
                } else {
                    if ($obj->update($name, $email, $password, $current_image, $status, formatDate(), $id)) {
                        if($_SESSION['user']->user_id == $id){
                            $_SESSION['user'] = ['user_id'=>$id,'user_name'=>$name,'user_email'=>$email,'user_password'=>$password,
                            'user_image'=>$current_image,'user_status'=>$status,'user_created_at'=>formatDate()];
                        }
                        messages("success", "Record inserted successfully");
                        redirect("../public/users/");
                    } else {
                        messages("danger", "Error inserting new record");
                        redirect("../public/users/form.php?id=$id");
                    }
                }
            }
            break;
        case 'delete':
            $id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);
            $current_image = filter_input(INPUT_GET, "current_image", FILTER_SANITIZE_STRING);
            if (unlink($path . $current_image) && $obj->delete($id)) {
                messages("success", "Record deleted successfully");
                redirect("../public/users/");
            } else {
                messages("danger", "Error deleting the record");
                redirect("../public/users/");
            }
            break;

        default:
            # code...
            break;
    }
}
