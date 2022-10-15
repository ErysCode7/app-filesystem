<?php
   require "../includes/authentication/authentication.php";
?>

<?php require "../includes/view/header.php"; ?>

<?php 
    if(isset($_POST["submit"])) {
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
                <li class="breadcrumb-item"><a href="./members-permanent-records.php">Members Permanent Records</a></li>
                <li class="breadcrumb-item active" aria-current="page">User Update Profile</li>
            </ol>
            </nav>
        </div>
    </div>
    
    <div class="col-xxl">
            <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Update records</h5>
           
            </div>
            <div class="card-body">
                <form>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-name">First name</label>
                    <div class="col-sm-10">
                    <input type="text" name="first_name" value="<?= $first_name ?>" class="form-control" id="basic-default-name"  />
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-name">Last name</label>
                    <div class="col-sm-10">
                    <input type="text" name="last_name" value="<?= $last_name ?>" class="form-control" id="basic-default-name" />
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-company">Company</label>
                    <div class="col-sm-10">
                    <input
                        type="text"
                        class="form-control"
                        id="basic-default-company"
                        placeholder="ACME Inc."
                    />
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-email">Email</label>
                    <div class="col-sm-10">
                    <div class="input-group input-group-merge">
                        <input
                        type="text"
                        id="basic-default-email"
                        class="form-control"
                        placeholder="john.doe"
                        aria-label="john.doe"
                        aria-describedby="basic-default-email2"
                        />
                        <span class="input-group-text" id="basic-default-email2">@example.com</span>
                    </div>
                    <div class="form-text">You can use letters, numbers & periods</div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-phone">Phone No</label>
                    <div class="col-sm-10">
                    <input
                        type="text"
                        id="basic-default-phone"
                        class="form-control phone-mask"
                        placeholder="658 799 8941"
                        aria-label="658 799 8941"
                        aria-describedby="basic-default-phone"
                    />
                    </div>
                </div>
               
                <div class="row justify-content-end">
                    <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Send</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>

    </div>
</section>

<?php include "../includes/view/footer.php" ?>