<?php
require "db.php";
require "regex.php";
require "sinscrirelogic.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Document</title>
</head>

<body>
    <section class="vh-100">
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-9 col-lg-6 col-xl-5">
                    <img src="../img/Sign-up-amico.svg" class="img-fluid" alt="Sample image">
                </div>
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    <form action="sinscrire.php" method="post">
                        <div
                            class="d-flex flex-row align-items-center justify-content-center justify-content-lg-center">
                            <h2 class="lead text-danger fw-normal mb-0 me-3 fs-3 fw-bold">Sign up</h2>
                        </div>

                        <div class="divider d-flex align-items-center my-4">
                        </div>
                        <!-- Username -->
                        <div data-mdb-input-init class="form-outline mb-4">
                            <label class="form-label" for="form3Example3">Username</label>
                            <input type="text" id="form3Example3" class="form-control form-control-lg" placeholder="Enter your username" name="username" />
                            <?php echo "<p class='note text-danger'>" . $msg_name . "</p>"; ?>
                            <?php echo "<p class='note text-danger'>" . $msg2_name . "</p>"; ?>
                        </div>

                        <!-- Email -->
                        <div data-mdb-input-init class="form-outline mb-4">
                            <label class="form-label" for="form3Example3">E-mail</label>
                            <input type="email" name="email" id="form3Example3" class="form-control form-control-lg" placeholder="Enter your email" />
                            <?php echo "<p class='note text-danger'>" . $msg_email . "</p>"; ?>
                            <?php echo "<p class='note text-danger'>" . $msg2_email . "</p>"; ?>
                        </div>

                        <!-- Telephone -->
                        <div data-mdb-input-init class="form-outline mb-4">
                            <label class="form-label" for="form3Example3">Telephone</label>
                            <input type="tel" class="form-control form-control-lg" placeholder="Enter your telephone number" name="telephone" />
                            <?php echo "<p class='note text-danger'>" . $msg_tel . "</p>"; ?>
                        </div>

                        <!-- Password -->
                        <div data-mdb-input-init class="form-outline mb-3">
                            <label class="form-label" for="form3Example4">Password</label>
                            <input type="password" class="form-control form-control-lg" placeholder="Enter password" name="password" />
                            <?php echo "<p class='note text-danger'>" . $msg_password . "</p>"; ?>
                        </div>

                        <!-- Verify Password -->
                        <div data-mdb-input-init class="form-outline mb-3">
                            <label class="form-label" for="form3Example4">Verify Password</label>
                            <input type="password" class="form-control form-control-lg" placeholder="Repeat password" name="passwordV" />
                            <?php echo "<p class='note text-danger'>" . $msg_password_verify . "</p>"; ?>
                        </div>


                        <div class="d-flex justify-content-between align-items-center">

                        </div>

                        <div class="text-center text-lg-start mt-4 pt-2">
                            <button type="submit" name="submit" data-mdb-button-init data-mdb-ripple-init
                                class="btn btn-danger btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;">Sign
                                up</button>
                            <p class="small fw-bold mt-2 pt-1 mb-0">Have already account <a href="connexion.php"
                                    class="link-success">Connexion</a></p>
                        </div>

                    </form>


                </div>
            </div>
        </div>
        <!-- <div
            class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-xl-5 bg-primary">
            Copyright
            <div class="text-white pt-1 pb-4">
                Copyright © 2020. All rights reserved.
            </div>
        </div> -->
        <!-- Right -->
        </div>
    </section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>