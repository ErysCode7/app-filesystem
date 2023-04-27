<?php
   require "../includes/authentication/authentication.php";
?>

<?php require "../includes/view/header.php"; ?>

<?php 
    if(isset($_POST["submit"])) {
        $id = $_POST["id"];
        $troupes_name = $_POST["name"];
    }
?>

<section style="background-color: #eee;">
  <div class="container py-5">

    <div class="row">
        <div class="col">
            <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="./troupes.php">Troupes</a></li>
                <li class="breadcrumb-item active" aria-current="page">Update Troupes</li>
            </ol>
            </nav>
        </div>
    </div>
    
    
    <div class="col-xxl">
            <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Update troupe record</h5>
                <?php
                    if(isset($_SESSION["status"])) {
                ?>
                <div class="alert alert-warning">
                    <h4><?= $_SESSION["status"]; ?></h4>
                </div>
                <?php unset($_SESSION["status"]); } ?>
                <?php 
                    if(isset($_SESSION["status-success"])) {
                ?>
                <div class="alert alert-success">
                    <h4><?= $_SESSION["status-success"]; ?></h4>
                </div>
                <?php unset($_SESSION["status-success"]); } ?>
           
            </div>
            <div class="card-body">
                <form action="../includes/controller/troupes/update-troupes.php" method="post">
                    <input type="hidden" name="id" value="<?= $id ?>">    
                    <div class="row mb-3">
                        <label class="h4" for="troupes_name">Troupes</label>
                        <div class="">
                            <input type="troupes_name" value="<?=$troupes_name?>" name="troupes_name" maxlength="50" id="troupes_name" class="form-control py-3" style="color: black; font-size: 18px;" />
                        </div>
                    </div>
                
                    <div class="row justify-content-end">
                        <div class="col-sm-10">
                            <button type="submit" name="submit" class="btn btn-primary">Update Records</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    </div>
</section>

<?php include "../includes/view/footer.php" ?>