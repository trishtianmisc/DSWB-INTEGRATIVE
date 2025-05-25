<?php
// Start session to handle messages
session_start();
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta property="og:title" content="Contact Us | Department of Social Welfare and Development">
  <meta property="og:description" content="The Department of Social Welfare and Development (DSWD) is 
  mandated by law to develop, administer and implement comprehensive social welfare programs designed to uplift the 
  living conditions and empower the disadvantaged children, youth, women, older persons, person with disabilities, families in 
  crisis or at-risk and communities needing assistance.">
  <meta property="og:image" content="Images/dswdfav.png">
  <meta property="og:url" content="https://www.dswd.gov.ph/">
  <meta property="og:type" content="website">
  <link rel="icon" href="Images/dswdfav.png" type="image/x-icon">
  <title>Contact Us | Department of Social Welfare and Development</title>
  <link href="https://cdn.jsdelivr.net/npm/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="contact.css">
</head>

<body>

  <nav class="navbar navbar-expand-lg  shadow fixed-top">
    <div class="container-fluid">
      <img src="Images/dswdnav1.png" class="img-fluid dswd-nav">
      <button class="navbar-toggler bg-light border-white" type="button" data-bs-toggle="collapse"
        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
        aria-label="Toggle navigation">
        <i class='bx bx-menu' style="font-size: 30px; color: black;"></i>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mb-2 mb-lg-0">
          <li class="nav-item me-2 border-lg-end border-2">
            <a class="nav-link active" aria-current="page" href="../LandingPage/landing_page.html">Home</a>
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
            <a class="nav-link active" aria-current="page" href="../TransparencySeal/TRANSPARENCY.html">Transparency
              Seal</a>
          </li>

          <li class="nav-item me-2 border-lg-end">
            <a class="nav-link active" aria-current="page" href="../E-Service/eservices.html">e-Services</a>
          </li>

          <li class="nav-item me-2 border-lg-end">
            <a class="nav-link active" aria-current="page" href="contactus.php">Contact Us</a>
          </li>

        </ul>
      </div>
    </div>
  </nav>

  <div class="container top-container p-3">
    <div class="row">
      <div class="col-12 iii">
        <h3 style="font-weight: 700; font-size: 30px;">CONTACT US</h3>
      </div>
    </div>
  </div>
  
  <div class="container second-container align-items-center justify-content-center">
    <div class="row1">
      <div class="row">
        <div class="col-12 col-md-7">
          <iframe class="style-iframe"
            src="https://www.google.com/maps/embed?pb=!1m12!1m8!1m3!1d15701.65333336163!2d123.90766!3d10.308768!3m2!1i1024!2i768!4f13.1!2m1!1sdswd%20main%20office!5e0!3m2!1sen!2sph!4v1733808352765!5m2!1sen!2sph"
            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="col-12 col-md-5">
          <div class="row howtoreach">
            <div class="col-6 text-center">
              <p class="tele"><img src="Images/tele.png"><br>(632)8-931-81-01 TO<br>07</p>
            </div>
            <div class="col-6 text-center">
              <p><img src="Images/globe.png">GLOBE <br>09171105686 <br> 09178272543 </p>
            </div>
            <div class="col-6 text-center">
              <p><img src="Images/smart.png">SMART<br>09199116200 </p>
            </div>
            <div class="col-6 text-center">
              <p><img src="Images/enve.png"><br>inquiry@dswd.gov.ph </p>
            </div>
            <div class="col-12 text-center">
              <p><img src="Images/loc.png">General Maxilom Ave Ext, <br>Cebu City, Cebu, Philippines</p>
            </div>
            <div class="col-12 text-center">
              <p><img src="Images/clock.png">Office Hours:
                Mondays to Fridays<br>(except holidays), 8:00 AM to 5:00 PM</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="w-100 d-none d-md-block"></div>
  <div class="container">
    <!-- We'll use modals instead of alerts -->
    
    <div class="row2">
      <div class="row">
        <div class="col-12 col-sm-12">
          <form action="submit-feedback.php" method="post">
            <div class="row">
              <div class="col-12 col-sm-6">
                <div class="p1">
                  <label class="p1">Name:<br></label>
                </div>
                <input type="text" name="name" class="box" required><br><br>
              </div>
              <div class="col-12 col-sm-6">
                <div class="p1">
                  <label class="p1">E-mail Address:<br></label>
                </div>
                <input type="email" name="email" class="box" required><br><br>
              </div>
              <div class="col-12 col-sm-6">
                <div class="p1">
                  <label class="p1">Contact Number:<br></label>
                </div>
                <input type="tel" name="contact" class="box"><br><br>
              </div>
              <div class="col-12 col-sm-6">
                <div class="p1">
                  <label class="p1">Subject:<br></label>
                </div>
                <input type="text" name="subject" class="box" required><br><br>
              </div>
              <div class="col-12">
                <div class="p1">
                  <label class="p1">Send your feedback here:<br></label>
                </div>
                <textarea name="message" rows="4" cols="50" class="box2" required></textarea><br><br>
                <button class="submit-button" type="submit">Submit</button>
              </div>
            </div>
          </form>
          <br>
          <br>

          <!-- FEEDBACK TABLE START -->
          <div class="feedback-container">
            <h3 class="feedback-header">Recent Feedback</h3>
            <div class="table-responsive">
              <div class="table-scroll-container">
                <table class="table table-striped feedback-table">
                  <thead>
                    <tr>
                      <th scope="col">Name</th>
                      <th scope="col">Subject</th>
                      <th scope="col">Message</th>
                      <th scope="col">Date</th>
                    </tr>
                  </thead>
                  <tbody id="feedback-table-body">
                    <?php include 'get-feedback.php'; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <!-- FEEDBACK TABLE END -->
        </div>
      </div>
    </div>
  </div>
  
  <div class="w-100 d-none d-md-block"></div>

  <div class="container-fluid bottom-images">
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
  
  <!-- Footer Container Code -->
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
          <!-- Footer content -->
        </div>
      </div>
    </div>
  </div>

  <!-- Success Feedback Modal -->
  <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header bg-success text-white">
          <h5 class="modal-title" id="successModalLabel">Success!</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="text-center mb-4">
            <i class='bx bx-check-circle' style="font-size: 64px; color: #198754;"></i>
          </div>
          <p class="text-center fs-5">Thank you! Your feedback has been submitted successfully.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Error Feedback Modal -->
  <div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header bg-danger text-white">
          <h5 class="modal-title" id="errorModalLabel">Error</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="text-center mb-4">
            <i class='bx bx-error-circle' style="font-size: 64px; color: #dc3545;"></i>
          </div>
          <p class="text-center fs-5">Sorry, there was an error submitting your feedback. Please try again.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
    
  <script>
    // Check URL parameters for status and show appropriate modal
    document.addEventListener('DOMContentLoaded', function() {
      const urlParams = new URLSearchParams(window.location.search);
      const status = urlParams.get('status');
      
      if (status === 'success') {
        const successModal = new bootstrap.Modal(document.getElementById('successModal'));
        successModal.show();
        
        // Clear URL parameters after showing modal
        window.history.replaceState({}, document.title, window.location.pathname);
      } else if (status === 'error') {
        const errorModal = new bootstrap.Modal(document.getElementById('errorModal'));
        errorModal.show();
        
        // Clear URL parameters after showing modal
        window.history.replaceState({}, document.title, window.location.pathname);
      }
    });
  </script>
</body>



</html>
