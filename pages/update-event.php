<?php
   require "../includes/authentication/authentication.php";
?>

<?php require "../includes/view/header.php"; ?>

<?php 
    if(isset($_POST["submit"])) {
        $id = $_POST["id"];
        $event = $_POST["event"];
        $time = $_POST["time"];
        $schedule = $_POST["schedule"];
        $event_title = $_POST["event_title"];
        $description = $_POST["description"];
    }
?>

<section style="background-color: #eee;">
  <div class="container py-5">

    <div class="row">
        <div class="col">
            <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="./events.php">Events</a></li>
                <li class="breadcrumb-item active" aria-current="page">Update Event</li>
            </ol>
            </nav>
        </div>
    </div>
    
    
    <div class="col-xxl">
            <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Update event record</h5>
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
                <form action="../includes/controller/events/update-event.php" method="post">
                    <input type="hidden" name="id" value="<?= $id ?>">    
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="event">Event</label>
                        <div class="col-sm-10">
                            <input type="text" name="event" id="event" value="<?=$event?>" class="form-control" style="color: black"   />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="time">Time</label>
                        <div class="col-sm-10">
                            <input type="time" name="time" id="time" value="<?=$time?>" class="form-control" style="color: black"   />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="schedule">Schedule</label>
                        <div class="col-sm-10">
                        <input type="date" name="schedule" id="schedule" value="<?=$schedule?>" class="form-control py-3" style="color: black; font-size: 18px;" />
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="event_title">Event Title</label>
                        <div class="col-sm-10">
                            <input type="text" name="time" id="time" value="<?=$event_title?>" class="form-control" style="color: black"   />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="description">Description</label>
                        <div class="col-sm-10">
                            <input type="text" name="description" id="description" value="<?=$description?>" class="form-control" style="color: black"   />
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