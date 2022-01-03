<? require_once("./config/Config.php"); ?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- favicon -->
  <link rel="shortcut icon" type="image/png" href="<?= BASE_URL; ?>/assets/img/favicon.png" />
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="<?= BASE_URL; ?>/assets/vendor/bootstrap/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
  <!-- Custom styles for this template -->
  <link href="<?= BASE_URL; ?>/assets/css/album.css" rel="stylesheet">
  <link rel="stylesheet" href="<?= BASE_URL; ?>/assets/css/styles.css" />
  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>

  <title><?= WEB_NAME; ?></title>
</head>

<body>

  <header>
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
                    <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?=BASE_URL;?>/public/login/">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>
  </header>

  <main role="main">

    <section class="jumbotron text-center">
      <div class="container">
        <h1><?= WEB_NAME; ?></h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius quis fugit necessitatibus aliquid, beatae minus tenetur recusandae placeat repellendus id corrupti facilis, nesciunt reprehenderit sunt dolorem, hic molestias ipsum ex.</p>
      </div>
    </section>

    <div class="album bg-light">
      <div class="container">
        <div class="row">
          <?php
          require_once("./DAO/PostDAO.php");
          $post = new PostDAO();
          foreach ($post->getAll() as $value) {
          ?>
            <div class="col-md-4">
              <div class="card mb-4 shadow-sm">
                <img style="height: 300px;" src="<?= BASE_URL; ?>/assets/img/posts/<?= $value->post_image ?>" alt="<?= $value->post_title ?>">
                <div class="card-body">
                  <p class="card-title"><?= $value->post_title ?></p>
                  <!--  <p class="card-text"><? //=$value->post_brief
                                              ?></p> -->
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <a href="./details.php?id=<?= $value->post_id ?>" class="btn btn-sm btn-outline-secondary"><i class="far fa-eye"></i> View more</a>
                      <? //echo formatDate();
                      ?>
                    </div>
                    <small class="text-muted"><?= $value->post_created_at ?></small>
                  </div>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>

  </main>

  <footer class="text-muted">
    <div class="container">
      <p class="float-right">
        <a href="#">Back to top</a>
      </p>
      <p>Copyright &copy; <?= WEB_NAME . ' ' . date('Y'); ?></p>
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