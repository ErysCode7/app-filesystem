<?php
   require "../includes/authentication/authentication.php";
?>

<?php require "../includes/view/header.php"; ?>

<?php 
    if(isset($_POST["submit"])) {
        $id = $_POST["id"];
        $troupe_id = $_POST["troup_id"];
        $student_number = $_POST["student_number"];
        $first_name = $_POST["first_name"];
        $last_name = $_POST["last_name"];
        $troupe = $_POST["troupe"];
        $contact_number = $_POST["contact_number"];
        $course = $_POST["course"];
        $curriculum_year = $_POST["curriculum_year"];
        $birthday = $_POST["birthday"];
        $date_of_membership = $_POST["date_of_membership"];
        $address = $_POST["address"];
        $active_status = $_POST["active_status"];
        $fathers_name = $_POST["fathers_name"];
        $fathers_occupation = $_POST["fathers_occupation"];
        $fathers_phone_number = $_POST["fathers_phone_number"];
        $mothers_name = $_POST["mothers_name"];
        $mothers_occupation = $_POST["mothers_occupation"];
        $mothers_phone_number = $_POST["mothers_phone_number"];
    }
?>

<section style="background-color: #eee;">
  <div class="container py-5">

    <div class="row">
        <div class="col">
            <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
            <ol class="breadcrumb mb-0">
                <?php 
                    require "../includes/model/connection.php";
                    $sql = "SELECT * FROM troupes WHERE id = '$troupe_id';";
                    $result = $con->query($sql);
                    $row = $result->fetch_assoc();
                ?>
                <li class="breadcrumb-item"><a href="./view-troupe-member.php?id=<?= $troupe_id; ?>"><?=$row["name"]?></a></li>
                <li class="breadcrumb-item active" aria-current="page">User Update Profile</li>
            </ol>
            </nav>
        </div>
    </div>
    
    
    <div class="col-xxl">
            <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Update records</h5>
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
                <form action="../includes/controller/update-troupe-members.php" method="post">
                    <input type="hidden" name="id" value="<?= $id ?>">    
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="student_number">Student Number</label>
                        <div class="col-sm-10">
                            <input type="text" name="student_number" maxlength="12" id="student_number" value="<?= $student_number ?>" class="form-control" style="color: black"   />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="first_name">First name</label>
                        <div class="col-sm-10">
                            <input type="text" name="first_name" maxlength="20" id="first_name" value="<?= $first_name ?>" class="form-control" style="color: black"   />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="last_name">Last name</label>
                        <div class="col-sm-10">
                            <input type="text" name="last_name" maxlength="30" id="last_name" value="<?= $last_name ?>" class="form-control" style="color: black"   />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="birthday">Birthday</label>
                        <div class="col-sm-10">
                            <input type="date" name="birthday" id="birthday" value="<?= $birthday ?>" class="form-control" style="color: black"   />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="contact_number">Contact Number</label>
                        <div class="col-sm-10">
                            <input type="text" name="contact_number" maxlength="11" id="contact_number" value="<?= $contact_number ?>" class="form-control" style="color: black"   />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="address">Address</label>
                        <div class="col-sm-10">
                            <input type="text" name="address" maxlength="70" id="address" value="<?= $address ?>" class="form-control" style="color: black"   />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="troupe">Troupe</label>
                        <div class="col-sm-10">
                            <select name="troupe" id="troupe" class="form-control" style="color: black" required>
                                <option value="">Select troupe</option>
                                <option value="Dulaang Rizalia">Dulaang Rizalia</option>
                                <option value="Sining Biswal">Sining Biswal</option>
                                <option value="Tunog Rizalia Rondalla">Tunog Rizalia Rondalla</option>
                                <option value="Himig Rizalia">Himig Rizalia</option>
                                <option value="Kultura Rizalia">Kultura Rizalia</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="course">Course</label>
                        <div class="col-sm-10">
                            <input type="text" name="course" maxlength="50" id="course" value="<?= $course ?>" class="form-control" style="color: black"   />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="curriculum_year">Curriculum year</label>
                        <div class="col-sm-10">
                            <input type="text" name="curriculum_year" maxlength="20" id="curriculum_year" value="<?= $curriculum_year ?>" class="form-control" style="color: black"   />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="date_of_membership">Date of Membership</label>
                        <div class="col-sm-10">
                            <input type="text" name="date_of_membership" maxlength="20" id="date_of_membership" value="<?= $date_of_membership ?>" class="form-control" style="color: black"   />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="active_status">Status</label>
                        <div class="col-sm-10">
                                <select name="active_status" id="active_status" value="<?= $active_status ?>"  class="form-select form-select-lg" style="color: black" required>
                                <option value="">Select status</option>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                                <option value="quit">Quit</option>
                                <option value="alumni">Alumni</option>
                            </select>
                        </div>
                    </div>

                    <!-- FATHERS -->
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="fathers_name">Fathers Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="fathers_name" maxlength="50" id="fathers_name" value="<?= $fathers_name ?>" class="form-control" style="color: black"   />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="fathers_occupation">Fathers Occupation</label>
                        <div class="col-sm-10">
                            <input type="text" name="fathers_occupation" maxlength="50" id="fathers_occupation" value="<?= $fathers_occupation ?>" class="form-control" style="color: black"   />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="fathers_phone_number">Fathers Phone Number</label>
                        <div class="col-sm-10">
                            <input type="text" name="fathers_phone_number" maxlength="11" id="fathers_phone_number" value="<?= $fathers_phone_number ?>" class="form-control" style="color: black"   />
                        </div>
                    </div>

                    <!-- MOTHERS -->
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="mothers_name">Mothers Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="mothers_name" maxlength="50" id="mothers_name" value="<?= $mothers_name ?>" class="form-control" style="color: black"   />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="mothers_occupation">Mothers Occupation</label>
                        <div class="col-sm-10">
                            <input type="text" name="mothers_occupation" maxlength="50" id="mothers_occupation" value="<?= $mothers_occupation ?>" class="form-control" style="color: black"   />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="mothers_phone_number">Mothers Phone Number</label>
                        <div class="col-sm-10">
                            <input type="text" name="mothers_phone_number" maxlength="11" id="mothers_phone_number" value="<?= $mothers_phone_number ?>" class="form-control" style="color: black"   />
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