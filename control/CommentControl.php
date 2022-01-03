<?php

if (isset($_REQUEST['action'])) {
    require_once("../config/Config.php");
    require_once("../DAO/CommentDAO.php");
    $obj = new CommentDAO();

    $name = empty($_POST['name']) ? "" : $_POST['name'];
    $email = empty($_POST['email']) ? "" : $_POST['email'];
    $content = empty($_POST['content']) ? "" : $_POST['content'];
    $post = empty($_POST['post']) ? "" : $_POST['post'];

    switch ($_REQUEST['action']) {
        case 'insert':
            if (empty($name) || empty($email) || empty($content) || empty($post)) {
                messages("danger", "All fields are required");
                redirect("../details.php?id=$post");
            } elseif ($obj->insert($name, $email, $content, $post, formatDate())) {
                messages("success", "Comment sent successfully");
                redirect("../details.php?id=$post");
            } else {
                messages("danger", "Error sending comment");
                redirect("../details.php?id=$post");
            }
            break;
        case 'delete':
            $id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);
            $post_id = filter_input(INPUT_GET, "post_id", FILTER_SANITIZE_NUMBER_INT);
            if ($obj->delete($id)) {
                messages("success", "Comment deleted successfully");
                redirect("../public/comments/details.php?id=$post_id");
            } else {
                messages("danger", "Error deleting the comment");
                redirect("../public/comments/details.php?id=$post_id");
            }
            break;

        default:
            # code...
            break;
    }
}
