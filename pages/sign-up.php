<?php 
session_start();
 require "../includes/view/header.php";
?>

<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <?php
                    if(isset($_SESSION["status"])) {
                ?>
                <div class="alert alert-warning">
                    <h4><?= $_SESSION["status"]; ?></h4>
                </div>
                <?php unset($_SESSION["status"]); }?>
                <?php
                    if(isset($_SESSION["success-status"])) {
                ?>
                <div class="alert alert-success">
                    <h4><?= $_SESSION["success-status"]; ?></h4>
                </div>
                <?php unset($_SESSION["success-status"]); }?>
                <div class="card shadow">
                    <div class="card-header">
                        <h1>Sign up</h1>
                    </div>
                    <div class="card-body">
                        <form action="../includes/controller/sign-up.inc.php" method="post">
                        <?php if(isset($_GET["name"])) { $name = $_GET["name"]; ?>
                            <div class="form-group mb-3">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" placeholder="Name" value="<?= $name ?>">
                            </div>
                        <?php } else { ?>
                            <div class="form-group mb-3">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" placeholder="Name">
                            </div>
                        <?php } ?>                   
                        <?php if(isset($_GET["username"])) { $username = $_GET["username"];?>
                            <div class="form-group mb-3">
                                <label for="username">Username</label>
                                <input type="text" name="username" id="username" placeholder="Username" value="<?= $username ?>">
                            </div>
                        <?php } else { ?>
                            <div class="form-group mb-3">
                                <label for="username">Username</label>
                                <input type="text" name="username" id="username" placeholder="Username">
                            </div>
                        <?php } ?>
                            <div class="form-group mb-3">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" placeholder="Password">
                            </div>
                            <div class="form-group mb-3">
                                <label for="confirm_password">Confirm Password</label>
                                <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password">
                            </div>
                            <div class="form-group">
                                <button type="submit" name="submit" class="btn btn-primary">Sign up</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
