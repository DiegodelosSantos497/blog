<?php

if (isset($_REQUEST['action'])) {
    require_once("../config/Config.php");
    require_once("../DAO/PostDAO.php");
    $obj = new PostDAO();

    /* default variables */
    $path = "../assets/img/posts/";
    $allowedExtensions = ['jpg', 'jpeg', 'png'];

    $title = empty($_POST['title']) ? "" : $_POST['title'];
    $brief = empty($_POST['brief']) ? "" : $_POST['brief'];
    $body = empty($_POST['body']) ? "" : $_POST['body'];
    $image = empty($_FILES['image']) ? "" : $_FILES['image'];
    $extension = strtolower(pathinfo($image['name'], PATHINFO_EXTENSION));
    $current_image = empty($_POST['current_image']) ? "" : $_POST['current_image'];
    $status = empty($_POST['status']) ? "" : $_POST['status'];
    $user = empty($_POST['user']) ? "" : $_POST['user'];
    $category = empty($_POST['category']) ? "" : $_POST['category'];
    $id = empty($_POST['id']) ? "" : $_POST['id'];

    switch ($_REQUEST['action']) {
        case 'insert':
            if (empty($title) || empty($brief) || empty($body) || empty($image['name']) || empty($status) || empty($user) || empty($category)) {
                messages("danger", "All fields are required");
                redirect("../public/posts/form.php");
            } elseif (!in_array($extension, $allowedExtensions)) {
                messages("danger", "The selected file must be an image(.jpg,.jpeg,.png)");
                redirect("../public/posts/form.php");
            } elseif (move_uploaded_file($image['tmp_name'], $path . $image['name']) && $obj->insert($title, $brief, $body, $image['name'], formatDate(), $status, $user, $category)) {
                messages("success", "Record inserted successfully");
                redirect("../public/posts/form.php");
            } else {
                messages("danger", "Error inserting new record");
                redirect("../public/posts/form.php");
            }
            break;
        case 'update':
            if (empty($title) || empty($brief) || empty($body) || empty($status) || empty($user) || empty($category)) {
                messages("danger", "All fields are required");
                redirect("../public/posts/form.php?id=$id");
            } elseif (!empty($image['name'])) {
                if (!in_array($extension, $allowedExtensions)) {
                    messages("danger", "The selected file must be an image(.jpg,.jpeg,.png)");
                    redirect("../public/posts/form.php?id=$id");
                } elseif (unlink($path . $current_image) && move_uploaded_file($image['tmp_name'], $path . $image['name']) && $obj->update($title, $brief, $body, $image['name'], formatDate(), $status, $user, $category, $id)) {
                    messages("success", "Record updated successfully");
                    redirect("../public/posts/");
                } else {
                    messages("danger", "Error updating new record");
                    redirect("../public/posts/form.php?id=$id");
                }
            } else {
                if ($obj->update($title, $brief, $body, $current_image, formatDate(), $status, $user, $category, $id)) {
                    messages("success", "Record updated successfully");
                    redirect("../public/posts/");
                } else {
                    messages("danger", "Error updating new record");
                    redirect("../public/posts/form.php?id=$id");
                }
            }

            break;
        case 'delete':
            $id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);
            $current_image = filter_input(INPUT_GET, "current_image", FILTER_SANITIZE_STRING);
            if (unlink($path . $current_image) && $obj->delete($id)) {
                messages("success", "Record deleted successfully");
                redirect("../public/posts/");
            } else {
                messages("danger", "Error deleting the record");
                redirect("../public/posts/");
            }
            break;

        default:
            # code...
            break;
    }
}
