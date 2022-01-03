<? require_once("./config/Config.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Blog Post - Start Bootstrap Template</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="<?= BASE_URL; ?>/assets/img/favicon.png" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link rel="stylesheet" href="<?= BASE_URL; ?>/assets/css/styles.css" />
    <link rel="stylesheet" href="<?= BASE_URL; ?>/assets/vendor/bootstrap/css/bootstrap.min.css" />
</head>

<body>
    <!-- Responsive navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="<?= BASE_URL; ?>">
                <i class="fas fa-blog"></i> &nbsp;
                <strong><?= WEB_NAME; ?></strong>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="<?= BASE_URL; ?>">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?=BASE_URL;?>/public/login/">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <?php
    require_once("./DAO/PostDAO.php");
    if (isset($_GET['id'])) {

        $obj = new PostDAO();
        $post = $obj->detail($_GET['id']);
    }

    ?>
    <!-- Page content-->
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-12">
                <!-- Post content-->
                <article class="mb-5">
                    <!-- Post header-->
                    <header class="mb-4">
                        <!-- Post title-->
                        <h1 class="fw-bolder mb-1 text-center"><?= empty($post) ? "" : $post->title; ?></h1>
                        <!-- Post meta content-->
                        <div class="text-muted fst-italic mb-2">Posted on <?= empty($post) ? "" : $post->created_at; ?> by <?= empty($post) ? "" : $post->user; ?></div>
                        <!-- Post categories-->
                        <a class="badge bg-danger text-decoration-none link-light" href="#!"><?= empty($post) ? "" : $post->category; ?></a>
                    </header>
                    <!-- Preview image figure-->
                    <figure class="mb-4 mx-auto">
                        <img class="img-fluid rounded" src="<?= BASE_URL; ?>/assets/img/posts/<?= empty($post) ? "default-image.png" : $post->image; ?>" alt="..." />
                    </figure>
                    <!-- Post content-->
                    <section class="mb-5">

                        <p class="fs-5 mb-4"><?= empty($post) ? "" : $post->brief; ?></p>
                        <p class="fs-5 mb-4"><?= empty($post) ? "" : $post->body; ?></p>

                    </section>
                </article>
                <!-- Comments section-->
                <section class="mb-5 mt-5">
                    <div class="card bg-light">
                        <div class="card-header">
                            <div class="card-title">
                                Comments
                            </div>
                            <?php
                            if (isset($_SESSION['message'])) {
                                echo $_SESSION['message'];
                                unset($_SESSION['message']);
                            } ?>
                        </div>
                        <div class="card-body">
                            <!-- Comment form-->
                            <form class="mb-4" action="<?= BASE_URL; ?>/control/CommentControl.php?action=insert" method="POST">
                                <div class="form-row mb-2">
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
                                    </div>
                                </div>
                                <div class="form-group mb-2">
                                    <textarea class="form-control" rows="3" id="content" name="content" placeholder="Enter your content"></textarea>
                                </div>
                                <input type="hidden" name="post" value="<?= $post->id; ?>">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary text-white"><i class="fas fa-paper-plane"></i> Send</button>
                                </div>
                            </form>
                            <!-- Comment with nested comments-->
                            <div class="d-flex mb-4">
                                <div class="ms-3">
                                    <a href="">diegodelosasntos497@gmail.com</a><br>
                                    This post is so good
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; <?= WEB_NAME . ' ' . date('Y'); ?></p>
        </div>
    </footer>
    <!-- jquery JS -->
    <script src="<?= BASE_URL; ?>/assets/vendor/jquery/jquery.min.js"></script>
    <!-- Bootstrap core JS-->
    <script src="<?= BASE_URL; ?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- fontawesome plugins JS -->
    <script src="<?= BASE_URL; ?>/assets/vendor/fontawesome/fontawesome.js"></script>

</body>

</html>