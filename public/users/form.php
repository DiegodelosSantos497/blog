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
                <?
                require_once("../../DAO/UserDAO.php");
                $obj = new UserDAO();
                if (!empty($_GET['id'])) {
                    $user = $obj->getById($_GET['id']);
                }
                ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                <?= empty($user) ? "Insert new" : "Update"; ?> record - <a href="<?= BASE_URL; ?>/public/users/index.php" class="btn btn-outline-light btn-sm">Go back</a>
                            </div>
                            <form action="<?= BASE_URL; ?>/control/UserControl.php?action=<?= empty($user) ? "insert" : "update"; ?>" method="post" enctype="multipart/form-data">
                                <div class="card-body">
                                    <?php
                                    if (isset($_SESSION['message'])) {
                                        echo $_SESSION['message'];
                                        unset($_SESSION['message']);
                                    } ?>
                                    <div class="form-group">
                                        <input type="hidden" name="id" value="<?= empty($user) ? "" : $user->user_id ?>">
                                        <div class="form-row">
                                            <div class="col-6">
                                                <label for="name"><span class="text-danger">*</span> User name</label>
                                                <input type="text" class="form-control" id="name" name="name" value="<?= empty($user) ? "" : $user->user_name ?>">
                                            </div>
                                            <div class="col-6">
                                                <label for="email"><span class="text-danger">*</span> Email</label>
                                                <input type="text" class="form-control" id="email" name="email" value="<?= empty($user) ? "" : $user->user_email ?>">
                                            </div>
                                        </div>
                                        <div class="form-row mt-2">
                                            <div class="col-6">
                                                <label for="password"><span class="text-danger">*</span>Password</label>
                                                <input type="text" class="form-control" id="password" name="password">
                                            </div>
                                            <div class="col-6">
                                                <label for="password2"><span class="text-danger">*</span> Confirm password</label>
                                                <input type="text" class="form-control" id="password2" name="password2">
                                            </div>
                                        </div>
                                        <div class="form-group mt-2">
                                            <label for="image"><span class="text-danger">*</span> Image</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="image" name="image">
                                                <label class="custom-file-label" for="image">Choose file</label>
                                            </div>
                                        </div>
                                        <div class="form-group mt-2">
                                            <label for="image"><span class="text-danger">*</span> Status</label>
                                            <div class="custom-control">
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="status1" name="status" class="custom-control-input" value="1" <?=empty($user) ? "" : (($user->user_status == 1) ? "checked" : "")?>>
                                                    <label class="custom-control-label" for="status1">Active</label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="status2" name="status" class="custom-control-input" value="2" <?=empty($user) ? "" : (($user->user_status == 2) ? "checked" : "")?>>
                                                    <label class="custom-control-label" for="status2">Inactive</label>
                                                </div>
                                            </div>
                                        </div>
                                        <?php if (!empty($user)) { ?>
                                            <div class="form-group mt-2">
                                                <label for="image"> Current image</label><br>
                                                <input type="hidden" id="current_image" name="current_image" value="<?=$user->user_image?>">
                                                <img src="<?=BASE_URL;?>/assets/img/users/<?=$user->user_image?>" class="w-25" alt="<?=$user->user_image?>">
                                            </div>
                                        <?php } ?>
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