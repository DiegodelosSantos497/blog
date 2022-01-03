<?php require_once("../../config/Config.php"); ?>
<!DOCTYPE html>
<html lang="es">

<head>

    <?php require_once("../inc/links.php"); ?>
    <title>Comments - <?= WEB_NAME; ?></title>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <?php require_once("../inc/menu.php"); ?>
        <!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800">Comments</h1>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                All comments - <a href="<?= BASE_URL; ?>/public/comments/" class="btn btn-outline-light btn-sm">Go back</a>
                            </div>
                            <div class="card-body">
                                <table class="table text-center">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Title</th>
                                            <th>Total comments</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?
                                        if (isset($_GET['id'])) {
                                            require_once("../../DAO/CommentDAO.php");
                                            $obj = new CommentDAO();
                                            foreach ($obj->getCommentsById($_GET['id']) as $value) {
                                        ?>
                                                <tr>
                                                    <td><?= $value->id; ?></td>
                                                    <td><?= $value->name; ?></td>
                                                    <td><?= $value->email; ?></td>
                                                    <td><?= $value->content; ?></td>
                                                    <td><?= $value->created_at; ?></td>
                                                    <td>
                                                        <a href="../../control/CommentControl.php?action=delete&id=<?= $value->id; ?>&post_id=<?= $_GET['id']; ?>" class="btn btn-danger btn-sm" title="Delete">Delete</a>
                                                    </td>
                                                </tr>
                                        <? }
                                        } else {
                                            echo "no hay registros";
                                        } ?>
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