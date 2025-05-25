<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "events";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT * FROM links ORDER BY link_id ASC";
$result = $conn->query($sql);


if (isset($_POST['add_event'])) {
    $title = $conn->real_escape_string($_POST['title']);
    $link = $conn->real_escape_string($_POST['link']);
    $date = $conn->real_escape_string($_POST['date']);
    $description = $conn->real_escape_string($_POST['description']);
    $readmore = $conn->real_escape_string($_POST['readmore']);

    $sql = "INSERT INTO links (title, link, date, description, readmore) 
            VALUES ('$title', '$link', '$date', '$description', '$readmore')";
    if ($conn->query($sql)) {

        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    } else {
        echo '<div class="alert alert-danger text-center">Failed to add event: ' . $conn->error . '</div>';
    }
}


if (isset($_POST['delete_event'])) {
    $delete_id = intval($_POST['delete_id']);
    $conn->query("DELETE FROM links WHERE link_id = $delete_id");
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}


if (isset($_POST['update_event'])) {
    $update_id = intval($_POST['update_id']);
    $title = $conn->real_escape_string($_POST['title']);
    $link = $conn->real_escape_string($_POST['link']);
    $date = $conn->real_escape_string($_POST['date']);
    $description = $conn->real_escape_string($_POST['description']);
    $readmore = $conn->real_escape_string($_POST['readmore']);

    $sql = "UPDATE links SET title='$title', link='$link', date='$date', description='$description', readmore='$readmore' WHERE link_id = $update_id";
    $conn->query($sql);
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta property="og:title" content="Department of Social Welfare and Development">
  <meta property="og:description" content="The Department of Social Welfare and Development (DSWD) is 
  mandated by law to develop, administer and implement comprehensive social welfare programs designed to uplift the 
  living conditions and empower the disadvantaged children, youth, women, older persons, person with disabilities, families in 
  crisis or at-risk and communities needing assistance.">
  <meta property="og:image" content="Images/dswd.png">
  <meta property="og:url" content="https://www.dswd.gov.ph/">
  <meta property="og:type" content="website">
  <link rel="icon" href="Images/dswdfav.png" type="image/x-icon">
  <title>Department of Social Welfare and Development</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
    rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">

  <link rel="stylesheet" href="events.css">

</head>

<body>



  <nav class="navbar navbar-expand-lg  shadow fixed-top">
    <div class="container-fluid">
      <img src="Images/dswdnav1.png" class="img-fluid dswd-nav">
      <button class="navbar-toggler bg-light border-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class='bx bx-menu' style="font-size: 30px; color: black;"></i>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mb-2 mb-lg-0">
          <li class="nav-item me-2 border-lg-end border-2">
            <a class="nav-link active text-light" aria-current="page" href="../LandingPage/landing_page.html">Home</a>
          </li>

          <li class="nav-item me-2 border-lg-end">
            <a class="nav-link active" aria-current="page" href="../AboutUs/AboutUs.html">About Us</a>
          </li>

          <li class="nav-item me-2 border-lg-end">
            <a class="nav-link active" aria-current="page" href="../History/HistoryOfDswd.html">History</a>
          </li>

          <li class="nav-item me-2 border-lg-end">
            <a class="nav-link active" aria-current="page" href="../EventsPage/events.html">Events</a>
          </li>

          <li class="nav-item me-2 border-lg-end">
            <a class="nav-link active" aria-current="page" href="../TransparencySeal/TRANSPARENCY.html">Transparency Seal</a>
          </li>

          <li class="nav-item me-2 border-lg-end">
            <a class="nav-link active" aria-current="page" href="../E-Service/eservices.html">e-Services</a>
          </li>

          <li class="nav-item me-2 border-lg-end">
            <a class="nav-link active" aria-current="page" href="../ContactUs/contactus.html">Contact Us</a>
          </li>

        </ul>
      </div>
    </div>
  </nav>

  <div class="container-fluid first-container d-flex justify-content-center align-items-center">
    
    <div class="row d-flex justify-content-center align-items-center">

    <div class="col-12 page-title d-flex justify-content-center align-items-center">

      <div class="row heyrow text-center">
        <h1>Events and Announcements</h1>
      </div>

    </div>


    <div class="text-center my-4">
      <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addEventModal">Add Event</button>
    </div>

    <?php if ($result->num_rows > 0): ?>
      <?php while ($row = $result->fetch_assoc()): ?>
        <div class="col-12 event-card mt-4">
          <div class="row">

            <div class="col-md-6 col-12">
              <div style="width: 100%; height: 300px; overflow: hidden;">
                <div style="width: 100%; height: 100%;">
                  <?php
                    echo str_replace(
                      '<iframe',
                      '<iframe style="width: 100%; height: 100%;"',
                      $row['link']
                    );
                  ?>
                </div>
              </div>
            </div>


            <div class="col-md-6 col-12">
              <div class="p-3 text-center">
                <h3 class="mt-2"><?php echo htmlspecialchars($row['title']); ?></h3>
                <h6 class="mt-2"><?php echo htmlspecialchars($row['description']); ?></h6>
                <small><strong>Date:</strong> <?php echo htmlspecialchars($row['date']); ?></small>


                <div class="mt-3">
                  <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#readMoreModal<?php echo $row['link_id']; ?>">
                    READ MORE
                  </button>
                </div>


                <div class="modal fade" id="readMoreModal<?php echo $row['link_id']; ?>" tabindex="-1" aria-labelledby="readMoreModalLabel<?php echo $row['link_id']; ?>" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="readMoreModalLabel<?php echo $row['link_id']; ?>">More Info</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <p><?php echo nl2br(htmlspecialchars($row['readmore'])); ?></p>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>


                <div class="d-flex justify-content-end gap-2 mt-3">

                  <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#updateModal<?php echo $row['link_id']; ?>">Update</button>
                  

                  <form method="POST" onsubmit="return confirm('Are you sure you want to delete this event?');">
                    <input type="hidden" name="delete_id" value="<?php echo $row['link_id']; ?>">
                    <button type="submit" name="delete_event" class="btn btn-danger">Delete</button>
                  </form>
                </div>

                <div class="modal fade" id="updateModal<?php echo $row['link_id']; ?>" tabindex="-1" aria-labelledby="updateModalLabel<?php echo $row['link_id']; ?>" aria-hidden="true">
                  <div class="modal-dialog">
                    <form method="POST" class="modal-content">
                      <input type="hidden" name="update_id" value="<?php echo $row['link_id']; ?>">
                      <div class="modal-header">
                        <h5 class="modal-title" id="updateModalLabel<?php echo $row['link_id']; ?>">Update Event</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <div class="mb-3">
                          <label class="form-label">Title</label>
                          <input type="text" class="form-control" name="title" value="<?php echo htmlspecialchars($row['title']); ?>" required>
                        </div>
                        <div class="mb-3">
                          <label class="form-label">Google Maps Embed Link (iframe)</label>
                          <textarea class="form-control" name="link" rows="3" required><?php echo htmlspecialchars($row['link']); ?></textarea>
                        </div>
                        <div class="mb-3">
                          <label class="form-label">Date</label>
                          <input type="date" class="form-control" name="date" value="<?php echo htmlspecialchars($row['date']); ?>" required>
                        </div>
                        <div class="mb-3">
                          <label class="form-label">Short Description</label>
                          <textarea class="form-control" name="description" rows="2" required><?php echo htmlspecialchars($row['description']); ?></textarea>
                        </div>
                        <div class="mb-3">
                          <label class="form-label">More Details (Read More)</label>
                          <textarea class="form-control" name="readmore" rows="3" required><?php echo htmlspecialchars($row['readmore']); ?></textarea>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="submit" name="update_event" class="btn btn-success">Save Changes</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php endwhile; ?>
    <?php else: ?>
      <div class="col-12 text-center mt-5">
        <p>No events found. Add your first event!</p>
      </div>
    <?php endif; ?>

  </div>
</div>

  <div class="container-fluid border-bottom border-top bottom-images">
    <div class="row images-bottom">
      <div class="col-6 col-sm-3 mt-3">
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="Images/dswd1.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="Images/dswd11.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="Images/dswd111.jpg" class="d-block w-100" alt="...">
            </div>
          </div>
        </div>
      </div>
      <div class="col-6 col-sm-3 mt-3">
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="Images/dswd2.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="Images/dswd22.jpg" class="d-block w-100" alt="...">
            </div>
          </div>
        </div>
      </div>
      <div class="col-6 col-sm-3 mt-3">
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="Images/dswd3.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="Images/dswd33.jpg" class="d-block w-100" alt="...">
            </div>
          </div>
        </div>
      </div>


      <div class="col-6 col-sm-3 mt-3">
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="Images/dswd5.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="Images/dswd55.jpg" class="d-block w-100" alt="...">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container-fluid p-0 " style="background-color: white;">

    <img src="Images/malacanang.png" class="img-fluid" style="width:100%;">

  </div>

  <div class="container-fluid footer-container bg-dark text-light">
    <div class="footer-wrapper" style="height: 100%;">

      <div class="row footer-wrapper" style="height: 100%;">

        <div class="col-12 ol-sm-12 col-md-2 ms-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0">
          <img src="Images/Republic.png" class="d-block img-fluid" alt="Republic Logo">
        </div>

        <div
          class="col-12 col-sm-12 col-md-2 d-flex flex-column justify-content-center text-center text-md-start republic">

          <p style="height: 155px;"><span>Republic of the Philippines</span><br><br>All
            content is in the public domain<br>unless otherwise
            stated.<br><br><br><br><br></p>

        </div>

        <div
          class="col-12 col-sm-12 col-md-3 d-flex align-items-center justify-content-center text-center text-md-start govph">
          <p><span>About GOVPH</span><br><br>
            Learn more about the Philippine government, its<br> structure, how government works and the people
            behind<br> it.
            <br><br>

            <a href="https://www.gov.ph/" target="_blank">GOV.PH</a><br>
            <a href="https://www.gov.ph/data" target="_blank">Open Data Portal</a><br>
            <a href="https://www.officialgazette.gov.ph/" target="_blank">Official Gazette</a>
          </p>
        </div>

        <div
          class="col-12 col-sm-12 col-md-2 d-flex align-items-center justify-content-center text-center text-md-start gov-links">
          <p><span>Government Links</span><br><br>
            <a href="https://president.gov.ph/" target="_blank">Office of the President</a><br>
            <a href="https://www.ovp.gov.ph/" target="_blank">Office of the Vice President</a><br>
            <a href="https://web.senate.gov.ph/" target="_blank">Senate of the Philippines</a><br>
            <a href="https://www.congress.gov.ph/" target="_blank">House of Representatives</a><br>
            <a href="https://sc.judiciary.gov.ph/" target="_blank">Supreme Court</a><br>
            <a href="https://ca.judiciary.gov.ph/" target="_blank">Court of Appeals</a><br>
            <a href="https://sb.judiciary.gov.ph/" target="_blank">Sandiganbayan</a>
          </p>

        </div>

        <div
          class="col-12 col-sm-12 col-md-2 d-flex flex-column align-items-center justify-content-center mb-3 mb-md-0">

          <div class="col-md-12 col-6 text-center mb-2">

            <h6>Stay Connected</h6>
            <div class="stay-connected">
              <a href="https://www.instagram.com/dswdphilippines/?hl=en" target="_blank"><i class='bx bxl-instagram'
                  style="font-size: 30px;"></i> </a>
              <a href="https://www.facebook.com/dswdserves/" target="_blank"><i class='bx bxl-facebook-square'
                  style="font-size: 30px;"></i> </a>
              <a href="https://x.com/dswdserves" target="_blank"><i class='bx bxl-twitter' style="font-size: 30px;"></i>
              </a>
            </div>

          </div>

          <div class="col-md-12 col-6 text-center border-top border-light">

            <p>DEVELOPED BY<img src="Images/Bini.png" class=" biniimg img-fluid" alt="Bini"></p>

          </div>

        </div>

      </div>
    </div>
  </div>

  <div class="modal fade" id="addEventModal" tabindex="-1" aria-labelledby="addEventModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <form method="POST" class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addEventModalLabel">Add New Event</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" class="form-control" name="title" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Google Maps Embed Link (iframe)</label>
            <textarea class="form-control" name="link" rows="3" required></textarea>
          </div>
          <div class="mb-3">
            <label class="form-label">Date</label>
            <input type="date" class="form-control" name="date" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Short Description</label>
            <textarea class="form-control" name="description" rows="2" required></textarea>
          </div>
          <div class="mb-3">
            <label class="form-label">More Details (Read More)</label>
            <textarea class="form-control" name="readmore" rows="3" required></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" name="add_event" class="btn btn-success">Add Event</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        </div>
      </form>
    </div>
  </div>

  <script src="events.js"></script> 

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
    integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
    crossorigin="anonymous"></script>


  <script>
  document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll('.read-more-btn').forEach(function (button) {
      button.addEventListener('click', function () {
        const container = this.closest('.text-center');
        const readMoreBox = container.querySelector('.read-more-text');

        if (readMoreBox) {
          const isVisible = readMoreBox.style.display === "block";
          readMoreBox.style.display = isVisible ? "none" : "block";
          this.textContent = isVisible ? "READ MORE" : "SHOW LESS";
        }
      });
    });
  });
  </script>

</body>

</html>