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
                <?
                require_once("../../DAO/CategoryDAO.php");
                $obj = new CategoryDAO();
                if (!empty($_GET['id'])) {
                    $category = $obj->getById($_GET['id']);
                }
                ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                <?= isset($obj) ? "Update" : "Insert new"; ?> record - <a href="<?= BASE_URL; ?>/public/categories/index.php" class="btn btn-outline-light btn-sm">Go back</a>
                            </div>
                            <form action="<?= BASE_URL; ?>/control/CategoryControl.php?action=<?= isset($category) ? "update" : "insert"; ?>" method="post">
                                <div class="card-body">
                                    <?php
                                    if (isset($_SESSION['message'])) {
                                        echo $_SESSION['message'];
                                        unset($_SESSION['message']);
                                    } ?>
                                    <div class="form-group">
                                        <input type="hidden" name="id" value="<?= empty($category) ? "" : $category->category_id ?>">
                                        <label for="name"><span class="text-danger">*</span> Category name</label>
                                        <input type="text" class="form-control" id="name" name="name" value="<?= empty($category) ? "" : $category->category_name ?>">
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary mb-2"><i class="fas fa-fw fa-paper-plane"></i> Submit</button>
                                </div>
                            </form>
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