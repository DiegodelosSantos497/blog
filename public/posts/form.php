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
                <?
                require_once("../../DAO/PostDAO.php");
                $obj = new PostDAO();
                if (!empty($_GET['id'])) {
                    $post = $obj->getById($_GET['id']);
                }
                ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                <?= empty($post) ? "Insert new" : "Update"; ?> record - <a href="<?= BASE_URL; ?>/public/posts/index.php" class="btn btn-outline-light btn-sm">Go back</a>
                            </div>
                            <form action="<?= BASE_URL; ?>/control/PostControl.php?action=<?= empty($post) ? "insert" : "update"; ?>" method="post" enctype="multipart/form-data">
                                <div class="card-body">
                                    <?php
                                    if (isset($_SESSION['message'])) {
                                        echo $_SESSION['message'];
                                        unset($_SESSION['message']);
                                    } ?>
                                    <div class="form-group">
                                        <input type="hidden" name="id" value="<?= empty($post) ? "" : $post->post_id ?>">
                                        <div class="form-row">
                                            <div class="col-12">
                                                <label for="title"><span class="text-danger">*</span> Title</label>
                                                <input type="text" class="form-control" id="title" name="title" value="<?= empty($post) ? "" : $post->post_title ?>">
                                            </div>
                                        </div>
                                        <div class="form-row mt-2">
                                            <div class="col-12">
                                                <label for="brief"><span class="text-danger">*</span> Brief</label>
                                                <input type="text" class="form-control" id="brief" name="brief" value="<?= empty($post) ? "" : $post->post_brief ?>">
                                            </div>
                                        </div>
                                        <div class="form-group mt-2">
                                            <label for="body"><span class="text-danger">*</span> Content</label>
                                            <textarea name="body" id="body" rows="50"><?= empty($post) ? "" : $post->post_body ?></textarea>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <label for="user"><span class="text-danger">*</span> User</label>
                                                <select class="custom-select" id="user" name="user">
                                                    <option selected disabled value="">Choose...</option>
                                                    <?php foreach ($obj->load('user') as $user) {?>
                                                    <option value="<?=$user->user_id?>"  <?=empty($post) ? "" : (($user->user_id == $post->post_user) ? "selected" : "")?>><?=$user->user_name?></option>
                                                    <?php }?>
                                                </select>

                                            </div>
                                            <div class="col-md-6">
                                                <label for="category"><span class="text-danger">*</span> Category</label>
                                                <select class="custom-select" id="category" name="category">
                                                    <option selected disabled value="">Choose...</option>
                                                    <?php foreach ($obj->load('category') as $category) {?>
                                                    <option value="<?=$category->category_id?>"  <?=empty($post) ? "" : (($category->category_id == $post->post_category) ? "selected" : "")?>><?=$category->category_name?></option>
                                                    <?php }?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group mt-2">
                                            <label for="image"><span class="text-danger">*</span> Image</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="image" name="image">
                                                <label class="custom-file-label" for="image">Choose file</label>
                                            </div>
                                        </div>
                                        <?php if (!empty($post)) { ?>
                                            <div class="form-group mt-2">
                                                <label for="image"> Current image</label><br>
                                                <input type="hidden" id="current_image" name="current_image" value="<?= $post->post_image ?>">
                                                <img src="<?= BASE_URL; ?>/assets/img/posts/<?= $post->post_image ?>" class="w-25" alt="<?= $post->post_image ?>">
                                            </div>
                                        <?php } ?>
                                        <div class="form-group mt-2">
                                            <label for="status"><span class="text-danger">*</span> Status</label>
                                            <div class="custom-control">
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="status1" name="status" class="custom-control-input" value="1" <?= empty($post) ? "" : (($post->post_status == 1) ? "checked" : "") ?>>
                                                    <label class="custom-control-label" for="status1">Public</label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="status2" name="status" class="custom-control-input" value="2" <?= empty($post) ? "" : (($post->post_status == 2) ? "checked" : "") ?>>
                                                    <label class="custom-control-label" for="status2">Private</label>
                                                </div>
                                            </div>
                                        </div>
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