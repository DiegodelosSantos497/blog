<?php


if (isset($_REQUEST['action'])) {
    require_once("../config/Config.php");
    require_once("../DAO/CategoryDAO.php");
    $obj = new CategoryDAO();

    $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING);
    $id = filter_input(INPUT_POST, "id", FILTER_SANITIZE_NUMBER_INT);

    switch ($_REQUEST['action']) {
        case 'insert':
            if (empty($name)) {
                messages("danger", "All fields are required");
                redirect("../public/categories/form.php");
            } else {
                if ($obj->validate_duplicate_name($name)) {
                    messages("danger", "This record already exists");
                    redirect("../public/categories/form.php");
                } elseif ($obj->insert($name)) {
                    messages("success", "Record inserted successfully");
                    redirect("../public/categories/form.php");
                } else {
                    messages("danger", "Error inserting new record");
                    redirect("../public/categories/form.php");
                }
            }
            break;
        case 'update':
            if (empty($name)) {
                messages("danger", "All fields are required");
                redirect("../public/categories/form.php?id=$id");
            } else {
                if ($obj->update($name, $id)) {
                    messages("success", "Record edited successfully");
                    redirect("../public/categories/");
                } else {
                    messages("danger", "Error editing the record");
                    redirect("../public/categories/form.php?id=id");
                }
            }
            break;
        case 'delete':
            $id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);
            if ($obj->delete($id)) {
                messages("success", "Record deleted successfully");
                redirect("../public/categories/");
            } else {
                messages("danger", "Error deleting the record");
                redirect("../public/categories/form.php?id=id");
            }
            break;

        default:
            # code...
            break;
    }
}
