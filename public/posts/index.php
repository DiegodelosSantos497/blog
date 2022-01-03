<?php require_once("../../config/Config.php"); ?>
<!DOCTYPE html>
<html lang="es">

<head>

    <?php require_once("../inc/links.php"); ?>
    <title>Posts - <?= WEB_NAME; ?></title>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <?php require_once("../inc/menu.php"); ?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800">Posts</h1>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                All posts - <a href="<?= BASE_URL; ?>/public/posts/form.php" class="btn btn-outline-light btn-sm">New post</a>
                            </div>
                            <div class="card-body">
                                <table class="table text-center">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Title</th>
                                            <th>Status</th>
                                            <th>Created at</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?
                                        require_once("../../DAO/PostDAO.php");
                                        $obj = new PostDAO();
                                        foreach ($obj->getAll() as $value) {
                                        ?>
                                            <tr>
                                                <td><?= $value->post_id; ?></td>
                                                <td><?= $value->post_title; ?></td>
                                                <td><?= ($value->post_status == 1) ? "Public" : "Private" ?></td>
                                                <td><?= $value->post_created_at; ?></td>
                                                <td>
                                                    <a href="./form.php?id=<?= $value->post_id; ?>" class="btn btn-warning btn-sm" title="Edit">Edit</a>
                                                    <a href="../../control/PostControl.php?action=delete&id=<?= $value->post_id; ?>&current_image=<?= $value->post_image; ?>" class="btn btn-danger btn-sm" title="Delete">Delete</a>
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