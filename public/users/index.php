<?php require_once("../../config/Config.php"); ?>
<!DOCTYPE html>
<html lang="es">

<head>

    <?php require_once("../inc/links.php"); ?>
    <title>Users - <?= WEB_NAME; ?></title>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <?php require_once("../inc/menu.php"); ?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800">Users</h1>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                All users - <a href="<?= BASE_URL; ?>/public/users/form.php" class="btn btn-outline-light btn-sm">New user</a>
                            </div>
                            <div class="card-body">
                                <table class="table text-center">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Status</th>
                                            <th>Created at</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?
                                        require_once("../../DAO/UserDAO.php");
                                        $obj = new UserDAO();
                                        foreach ($obj->getAll() as $value) {
                                        ?>
                                            <tr>
                                                <td><?= $value->user_id; ?></td>
                                                <td><?= $value->user_name; ?></td>
                                                <td><?= $value->user_email; ?></td>
                                                <td><?= ($value->user_status == 1) ? "Active" : "Inactive" ?></td>
                                                <td><?= $value->user_created_at; ?></td>
                                                <td>
                                                    <a href="./form.php?id=<?= $value->user_id; ?>" class="btn btn-warning btn-sm" title="Edit">Edit</a>
                                                    <a href="../../control/UserControl.php?action=delete&id=<?= $value->user_id; ?>&current_image=<?= $value->user_image; ?>" class="btn btn-danger btn-sm" title="Delete">Delete</a>
                                                </td>
                                            </tr>
                                        <? } ?>
                                    </tbody>
                                    <?php
                                    if (isset($_SESSION['message'])) {
                                        echo "<tfoot>";
                                        echo $_SESSION['message'];
                                        unset($_SESSION['message']);
                                        echo "</tfoot>";
                                    } ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Main Content -->
    <?php require_once("../inc/footer.php"); ?>
    <?php require_once("../inc/scripts.php"); ?>
</body>

</html>