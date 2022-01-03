<? require_once("../../config/Config.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <? require_once("../inc/links.php"); ?>
    <title>Login - <?= WEB_NAME; ?></title>

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">
                <br><br>
                <div class="card o-hidden border-0 shadow-lg mt-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block text-center pt-3 pb-1">
                                <a href="<?= BASE_URL; ?>"><img class="w-75" src="<?= BASE_URL; ?>/assets/img/users/default.png" alt=""></a>
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <form class="user" action="<?= BASE_URL; ?>/control/LoginControl.php?action=login" method="POST">
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user" id="email" name="email" placeholder="Enter Email Address">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                                        </div>

                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                        <?php
                                        if (isset($_SESSION['message'])) {
                                            echo "<hr>";
                                            echo $_SESSION['message'];
                                            unset($_SESSION['message']);
                                        } ?>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <? require_once("../inc/scripts.php"); ?>

</body>

</html>