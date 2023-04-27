<?php
   require "../includes/authentication/authentication.php";
?>

<?php require "../includes/view/header.php"; ?>

<?php

if(isset($_GET["id"])) {
   require "../includes/model/connection.php";
   $id = $_GET["id"];
   $sql = "SELECT * FROM events WHERE id = '$id';";
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
            <li class="breadcrumb-item"><a href="./events.php">Events</a></li>
            <li class="breadcrumb-item active" aria-current="page">View Events</li>
          </ol>
        </nav>
      </div>
    </div>
    <div class="d-flex align-items-center justify-content-center mb-3">
      <img src='../assets/img/event-banner.jpg' alt="" style="width: 80%; height: 450px; border-radius: 0.5rem; magin: 0 auto;  object-fit: cover; ">
    </div>
    <p clas="mb-3" style="font-size: 16px;">Event description is a written or verbal summary that provides information about a particular event, such as a conference, concert, festival, workshop, or any other gathering. It typically includes details about the event, such as the name, date, time, location, target audience, and purpose, as well as any additional information that is relevant to attendees. The purpose of an event description is to attract and inform potential attendees about the event, and to generate interest and excitement in the lead-up to the event. A well-crafted event description can help to ensure that the right people attend the event and that they are fully engaged and informed about what to expect.</p>

    <div class="d-flex justify-content-start mb-5">
      <img src='../assets/img/event-banner-1.jpg' alt="" style="width: 500px; height: 300px; border-radius: 0.5rem; magin: 0 auto; object-fit: cover;  ">
      <div style="margin-left: 20px;">
      <div class="d-flex align-items-center justify-content-start mb-1 gap-2">
        <h2><?php echo $row["event_title"]; ?></h2>
        <p style="font-bold: 400; font-size: 16px;"><?php echo $row["time"]; ?></p>
        <p style="font-bold: 400; font-size: 16px;"><?php echo $row["schedule"]; ?></p>
      </div>
        <h3 style="font-bold: bold; font-size: 30px;"><?php echo $row["event"];  ?></h3>
        <p><?php echo $row["description"]; ?></p>
      </div>
    </div>
  </div>
</section>

<?php include "../includes/view/footer.php" ?>