<?php
  require "../includes/authentication/authentication.php";
?>

<?php
 require "../includes/view/header.php";
?>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        
        <!-- SIDEBAR -->
        <?php require "../includes/view/sidebar.php"; ?>
        <!-- / SIDEBAR -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

          <nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar"
          >
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
              </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
              <!-- Search -->
              <div class="navbar-nav align-items-center">
                <div class="nav-item d-flex align-items-center">
                  <i class="bx bx-search fs-4 lh-0"></i>
                  <input
                    type="text"
                    class="form-control border-0 shadow-none"
                    placeholder="Search..."
                    aria-label="Search..."
                  />
                </div>
              </div>
              <!-- /Search -->

              <ul class="navbar-nav flex-row align-items-center ms-auto">
         
                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                      <img src="../assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="#">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                              <img src="../assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <span class="fw-semibold d-block"><?= $_SESSION["auth_user"]["name"]; ?></span>
                            <small class="text-muted">Admin</small>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <form action="../includes/controller/logout.php" method="GET">                    
                        <p class="dropdown-item cursor-pointer">
                          <i class="bx bx-power-off me-2"></i>
                          <button class="align-middle btn">Log Out</button>
                        </p>
                      </form>
                    </li>
                  </ul>
                </li>
                <!--/ User -->
              </ul>
            </div>
          </nav>

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h1 class="fw-bold py-3 mb-4">Members Permanent Records</h1>

              <hr class="my-5" />

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

              <!-- Hoverable Table rows -->
              <div class="card">
                <h5 class="card-header">Hoverable rows</h5>
                <div class="table-responsive text-nowrap">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>Details</th>
                        <th>Student Number</th>
                        <th>Full name</th>
                        <th>Status</th>
                        <th>Contact Number</th>
                        <th>Course</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <?php 
                      require "../includes/model/connection.php";
                      $sql = "SELECT * FROM members_permanent_records";
                      $result = $con->query($sql);
                    ?>
                    <?php while($row = $result->fetch_assoc()) { ?>
                    <tbody class="table-border-bottom-0">
                      <tr>
                        <td><a href="./view-profile.php?student_number=<?= $row["student_number"]; ?>">View Details</td>
                        <td><?php echo $row["student_number"]; ?></td>
                        <td>
                        <?php echo $row["first_name"]; ?>
                        <?php echo $row["last_name"]; ?>
                        </td>
                        <td>
                          <?php if($row["active_status"] === "active") { ?>
                            <span class="badge bg-success me-1"><?php echo $row["active_status"]; ?></span>
                          <?php } else if($row["active_status"] === "inactive") { ?>
                            <span class="badge bg-warning me-1"><?php echo $row["active_status"]; ?></span>
                          <?php } else if($row["active_status"] === "quit") { ?>
                            <span class="badge bg-danger me-1"><?php echo $row["active_status"]; ?></span>
                          <?php } else if($row["active_status"] === "alumni" ) { ?>
                            <span class="badge bg-info me-1"><?php echo $row["active_status"]; ?></span>
                          <?php } ?>
                        </td>
                        <td><?php echo $row["contact_number"]; ?></td>
                        <td><?php echo $row["course"]; ?></td>
                        <td class="d-flex align-items-center gap-2">
                          <!-- UPDATE -->
                          <form action="./update-members-records.php" method="post">
                            <!-- UPDATING FIELDS PASSING IT TO ANOTHER FORM -->   
                            <input type="hidden" name="student_number" value="<?php echo $row["student_number"]; ?>">
                            <input type="hidden" name="first_name" value="<?php echo $row["first_name"]; ?>">
                            <input type="hidden" name="last_name" value="<?php echo $row["last_name"]; ?>">
                            <input type="hidden" name="troupe" value="<?php echo $row["troupe"]; ?>">
                            <input type="hidden" name="contact_number" value="<?php echo $row["contact_number"]; ?>">
                            <input type="hidden" name="course" value="<?php echo $row["course"]; ?>">
                            <input type="hidden" name="curriculum_year" value="<?php echo $row["curriculum_year"]; ?>">
                            <input type="hidden" name="birthday" value="<?php echo $row["birthday"]; ?>">
                            <input type="hidden" name="date_of_membership" value="<?php echo $row["date_of_membership"]; ?>">
                            <input type="hidden" name="address" value="<?php echo $row["address"]; ?>">
                            <input type="hidden" name="active_status" value="<?php echo $row["active_status"]; ?>">
                            <input type="hidden" name="fathers_name" value="<?php echo $row["fathers_name"]; ?>">
                            <input type="hidden" name="fathers_occupation" value="<?php echo $row["fathers_occupation"]; ?>">
                            <input type="hidden" name="fathers_phone_number" value="<?php echo $row["fathers_phone_number"]; ?>">
                            <input type="hidden" name="mothers_name" value="<?php echo $row["mothers_name"]; ?>">
                            <input type="hidden" name="mothers_occupation" value="<?php echo $row["mothers_occupation"]; ?>">
                            <input type="hidden" name="mothers_phone_number" value="<?php echo $row["mothers_phone_number"]; ?>">

                            <button class="btn btn-primary" type="submit"  name="submit"><i class="bx bx-edit-alt me-1"></i> Edit</button>
                          </form>
                          <!-- DELETE -->
                          <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
                            <!-- Button trigger delete modal -->
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal" data-id="<?php echo $row["student_number"]; ?>" onclick="confirmDelete(this);" ><i class="bx bx-trash me-1" ></i> Delete</butto>
                            <input type="hidden" name="student_number" value="<?php echo $row["student_number"]; ?>">
                          </form> 
                        </td>
                      </tr>
                    </tbody>
                    <?php } ?>     
                  </table>
                  </div>
            </div>
            
            <script>
              function confirmDelete(self) {
                const id = self.getAttribute("data-id");

                document.getElementById("form-delete-user").id.value = id;
                $("#myModal").modal("show");

                
              }
            </script>

              <!-- MODAL FOR DELETE  -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Record</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>

                <div class="modal-body">
                    Would you like to delete this record?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <form action="../includes/controller/delete-members-permanent-records.php" method="post" id="form-delete-user">         
                      <button type="submit" name="submit" class="btn btn-danger">Delete</button>
                      <input type="hidden" name="id">
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <!--/ Hoverable Table rows -->
          
<?php include "../includes/view/footer.php" ?>
