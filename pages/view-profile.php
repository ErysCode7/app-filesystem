<?php
   require "../includes/authentication/authentication.php";
?>

<?php require "../includes/view/header.php"; ?>


<?php

if(isset($_GET["student_number"])) {
   require "../includes/model/connection.php";
   $student_number = $_GET["student_number"];
   $sql = "SELECT * FROM members_permanent_records WHERE student_number = '$student_number';";
   $result = $con->query($sql);

   $row = $result->fetch_assoc();
}

?>


<section style="background-color: #eee;">
  <div class="container py-5">
    <div class="row">
      <div class="col">
        <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="./members-permanent-records.php">Members Permanent Records</a></li>
            <li class="breadcrumb-item active" aria-current="page">User Profile</li>
          </ol>
        </nav>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-4">
        <div class="card mb-4">
          <div class="card-body text-center">
            <?php 
               $sqlImage = "SELECT * FROM members_image WHERE student_number = '$student_number';";
               $stmt = mysqli_stmt_init($con);
               if(!mysqli_stmt_prepare($stmt, $sqlImage)) {
                   $_SESSION["status"] = "Something went wrong";
                   header("Location: ./view-profile.php");
                   exit();
               } else {
                   mysqli_stmt_execute($stmt);
                   $resultImage = mysqli_stmt_get_result($stmt);
                   $rowImage = $resultImage->fetch_assoc();
               }
            ?>
            <?php if(!isset($rowImage["status"]) || $rowImage["status"] == 0) { ?>
                  <img src="./upload/uploads/placeholder.png" alt="Profile Image" class="placeholder-image rounded-circle img-fluid" style="width: 150px;">
            <?php } else { ?>
                  <img src="./upload/<?= $rowImage["image_directory"]; ?>" alt="Profile Image" class="profile-image rounded-circle img-fluid" style="width: 150px;">
            <?php } ?>
            <h5 class="my-3"><?= $row["first_name"] ?> <?= $row["last_name"] ?></h5>
            <div class="d-flex flex-wrap  justify-content-center mb-2">
              <form action="./upload/members-upload.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="student_number" id="student_number" value="<?= $row["student_number"]; ?>"> 
                <div class="input-group my-3">
                    <input type="file" class="form-control" id="inputGroupFile02" name="image" id="image" />
                    <label class="input-group-text" for="inputGroupFile02">Upload</label>
                </div>
                <div class="profile-buttons">
                    <div class="form-group mb-3">
                      <button type="submit" name="upload" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Note please delete the profile image before uploading new one to avoid memory leak">Upload</button>
                    </div>
                </div>
              </form>
              <form action="./upload/members-delete.php" method="post">
                  <input type="hidden" name="student_number" id="student_number" value="<?= $row["student_number"]; ?>"> 
                  <input type="hidden" name="image_directory" id="image_directory" value="<?= $rowImage["image_directory"]; ?>">
                  <div class="form-group mb-3">
                      <button type="submit" name="delete" class="btn btn-danger">Delete profile image</button>
                  </div>
              </form>
            </div>
           
            
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

            <div class="d-flex justify-content-center mb-2">
              <button type="button" class="btn btn-primary">Follow</button>
              <button type="button" class="btn btn-outline-primary ms-1">Message</button>
            </div>
            
          </div>
        </div>
      </div>

      <div class="col-lg-8">
        <div class="card mb-4">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Student Number</p>
              </div>
              <div class="col-sm-9">
                <p class=" mb-0 h6 text-dark"><?= $row["student_number"] ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">First Name</p>
              </div>
              <div class="col-sm-9">
                <p class=" mb-0 h6 text-dark"><?= $row["first_name"] ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Last Name</p>
              </div>
              <div class="col-sm-9">
                <p class=" mb-0 h6 text-dark"><?= $row["last_name"] ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Birthday</p>
              </div>
              <div class="col-sm-9">
                <p class=" mb-0 h6 text-dark"><?= $row["birthday"] ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Contact Number</p>
              </div>
              <div class="col-sm-9">
                <p class=" mb-0 h6 text-dark"><?= $row["contact_number"] ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Address </p>
              </div>
              <div class="col-sm-9">
                <p class=" mb-0 h6 text-dark"><?= $row["address"] ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Troupe</p>
              </div>
              <div class="col-sm-9">
                <p class=" mb-0 h6 text-dark"><?= $row["troupe"] ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Course</p>
              </div>
              <div class="col-sm-9">
                <p class=" mb-0 h6 text-dark"><?= $row["course"] ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Curriculum Year</p>
              </div>
              <div class="col-sm-9">
                <p class=" mb-0 h6 text-dark"><?= $row["curriculum_year"] ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Date of Membership</p>
              </div>
              <div class="col-sm-9">
                <p class=" mb-0 h6 text-dark"><?= $row["date_of_membership"] ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Status</p>
              </div>
              <div class="col-sm-9">
                <p class=" mb-0 h6 text-dark text-uppercase"><?= $row["active_status"] ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Fathers Name</p>
              </div>
              <div class="col-sm-9">
                <p class=" mb-0 h6 text-dark"><?= $row["fathers_name"] ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Fathers Occupation</p>
              </div>
              <div class="col-sm-9">
                <p class=" mb-0 h6 text-dark"><?= $row["fathers_occupation"] ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Fathers phone number</p>
              </div>
              <div class="col-sm-9">
                <p class=" mb-0 h6 text-dark"><?= $row["fathers_phone_number"] ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Mothers Name</p>
              </div>
              <div class="col-sm-9">
                <p class=" mb-0 h6 text-dark"><?= $row["mothers_name"] ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Mothers Occupation</p>
              </div>
              <div class="col-sm-9">
                <p class=" mb-0 h6 text-dark"><?= $row["mothers_occupation"] ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Mothers phone number</p>
              </div>
              <div class="col-sm-9">
                <p class=" mb-0 h6 text-dark"><?= $row["mothers_phone_number"] ?></p>
              </div>
            </div>
            <hr>
          </div>
        </div>

        </div>
      </div>
    </div>
  </div>
</section>
            

<?php include "../includes/view/footer.php" ?>