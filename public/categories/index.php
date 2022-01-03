<?php require_once("../../config/Config.php"); ?>
<!DOCTYPE html>
<html lang="es">

<head>

    <?php require_once("../inc/links.php"); ?>
    <title>Categories - <?= WEB_NAME; ?></title>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <?php require_once("../inc/menu.php"); ?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800">Categories</h1>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                All categories - <a href="<?= BASE_URL; ?>/public/categories/form.php" class="btn btn-outline-light btn-sm">New Category</a>
                            </div>
                            <div class="card-body">
                                <table class="table text-center">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?
                                        require_once("../../DAO/CategoryDAO.php");
                                        $obj = new CategoryDAO();
                                        foreach ($obj->getAll() as $value) {
                                        ?>
                                            <tr>
                                                <td><?=$value->category_id;?></td>
                                                <td><?=$value->category_name;?></td>
                                                <td>
                                                    <a href="./form.php?id=<?=$value->category_id;?>" class="btn btn-warning btn-sm" title="Edit">Edit</a>
                                                    <a href="../../control/CategoryControl.php?action=delete&id=<?=$value->category_id;?>" class="btn btn-danger btn-sm" title="Delete">Delete</a>
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