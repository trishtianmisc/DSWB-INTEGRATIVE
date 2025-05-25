<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta property="og:title" content="History of DSWD | Department of Social Welfare and Development">
  <meta property="og:description" content="The Department of Social Welfare and Development (DSWD) is 
  mandated by law to develop, administer and implement comprehensive social welfare programs designed to uplift the 
  living conditions and empower the disadvantaged children, youth, women, older persons, person with disabilities, families in 
  crisis or at-risk and communities needing assistance.">
  <meta property="og:image" content="Images/dswdfav.png">
  <meta property="og:url" content="https://www.dswd.gov.ph/">
  <meta property="og:type" content="website">
  <link rel="icon" href="Images/dswdfav.png" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="historyofdswd.css" />
  <script defer src="historyofdswd.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">

  <!-- Footer Fixing Styles -->
  <style>
    html, body {
      height: 100%;
      margin: 0;
      padding: 0;
      display: flex;
      flex-direction: column;
    }

    main {
      flex: 1;
    }

    #preview {
      margin-top: 20px;
      display: none;
    }

    #preview iframe {
      width: 100%;
      height: 600px;
      border: 1px solid #ccc;
      border-radius: 8px;
    }

    .footer-container {
      flex-shrink: 0;
    }
  </style>
</head>

<body>
  <main class="container py-5">
    <nav class="navbar navbar-expand-lg shadow fixed-top">
      <div class="container-fluid">
        <img src="Images/dswdnav1.png" class="img-fluid dswd-nav">
        <button class="navbar-toggler bg-light border-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <i class='bx bx-menu' style="font-size: 30px; color: black;"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mb-2 mb-lg-0">
            <li class="nav-item me-2 border-lg-end border-2">
              <a class="nav-link active" href="../LandingPage/landing_page.html">Home</a>
            </li>
            <li class="nav-item me-2 border-lg-end">
              <a class="nav-link active" href="../AboutUs/AboutUs.html">About Us</a>
            </li>
            <li class="nav-item me-2 border-lg-end">
              <a class="nav-link active" href="../History/HistoryOfDswd.html">History</a>
            </li>
            <li class="nav-item me-2 border-lg-end">
              <a class="nav-link active" href="../EventsPage/events.html">Events</a>
            </li>
            <li class="nav-item me-2 border-lg-end">
              <a class="nav-link active" href="../TransparencySeal/TRANSPARENCY.html">Transparency Seal</a>
            </li>
            <li class="nav-item dropdown me-2 border-lg-end">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                e-services
              </a>
              <ul class="dropdown-menu">
                <li class="nav-item me-2 border-lg-end">
                  <a class="nav-link active" href="../ContactUs/contactus.html">e-Certificates</a>
                </li>
                <li class="nav-item me-2 border-lg-end">
                  <a class="nav-link active" href="../ContactUs/contactus.html">Form for Minors</a>
                </li>
              </ul>
            </li>
            <li class="nav-item me-2 border-lg-end">
              <a class="nav-link active" href="../ContactUs/contactus.html">Contact Us</a>
            </li>
            <li class="nav-item dropdown me-2 border-lg-end">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Events
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="../ContactUs/contactus.html">Events</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>

  

    <form action="generate_certificate.php" method="POST">
        <h2 class=  "mb-4">DSWD Certificates Templates</h2>
      <div class="mb-3">
        <label for="certificate_type" class="form-label">CERTIFICATE TYPE</label>
        <select class="form-select" id="certificate_type" name="certificate_type" required>
          <option value="">-- Select a Certificate --</option>
          <option value="Certificate of Eligibility">Certificate of Eligibility</option>
          <option value="Certificate of Indigency">Certificate of Indigency</option>
          <option value="Certification Declaring a Child Legally Available for Adoption">Certification Declaring a Child Legally Available for Adoption</option>
          <option value="Travel Clearance for Minors">Travel Clearance for Minors</option>
          <option value="Registration">Registration, License to Operate, and Accreditation Certificates for SWDAs</option>
        </select>
      </div>
      <button type="submit" class="btn btn-primary">Download Certificate</button>
    </form>

    <div id="preview">
      <h5 class="mt-4">Certificate Preview</h5>
      <iframe id="previewFrame" src=""></iframe>
    </div>

    <script>
      const previewMap = {
        "Certificate of Eligibility": "MC_2022-015.pdf",
        "Certificate of Indigency": "Barangay-Certification.pdf",
        "Certification Declaring a Child Legally Available for Adoption": "Citizen-Charter-CDCLAA.pdf",
        "Travel Clearance for Minors": "Minors-Travelling-Abroad-Application-Form.pdf",
        "Registration": "Primer_RLA-MC-17s2018.pdf"
      };

      const select = document.getElementById('certificate_type');
      const previewDiv = document.getElementById('preview');
      const previewFrame = document.getElementById('previewFrame');

      select.addEventListener('change', function () {
        const selected = this.value.trim();
        if (previewMap[selected]) {
          previewFrame.src = previewMap[selected];
          previewDiv.style.display = 'block';
        } else {
          previewDiv.style.display = 'none';
          previewFrame.src = '';
        }
      });
    </script>
  </main>

  <!-- Footer Container Code -->
  <div class="container-fluid p-0" style="background-color: white;">
    <img src="headerpics/malacanang.99ed9ca4.svg" class="img-fluid" style="width:100%;">
  </div>

  <div class="container-fluid footer-container bg-dark text-light">
    <div class="footer-wrapper" style="height: 100%;">
      <div class="row footer-wrapper" style="height: 100%;">
        <div class="col-12 ol-sm-12 col-md-2 ms-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0">
          <img src="Images/Republic.png" class="d-block img-fluid" alt="Republic Logo">
        </div>

        <div class="col-12 col-sm-12 col-md-2 d-flex flex-column justify-content-center text-center text-md-start republic">
          <p style="height: 155px;"><span>Republic of the Philippines</span><br><br>All content is in the public domain<br>unless otherwise stated.<br><br><br><br><br></p>
        </div>

        <div class="col-12 col-sm-12 col-md-3 d-flex align-items-center justify-content-center text-center text-md-start govph">
          <p><span>About GOVPH</span><br><br>
            Learn more about the Philippine government, its<br> structure, how government works and the people behind<br> it.
            <br><br>
            <a href="https://www.gov.ph/" target="_blank">GOV.PH</a><br>
            <a href="https://www.gov.ph/data" target="_blank">Open Data Portal</a><br>
            <a href="https://www.officialgazette.gov.ph/" target="_blank">Official Gazette</a>
          </p>
        </div>

        <div class="col-12 col-sm-12 col-md-2 d-flex align-items-center justify-content-center text-center text-md-start gov-links">
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

        <div class="col-12 col-sm-12 col-md-2 d-flex flex-column align-items-center justify-content-center mb-3 mb-md-0">
          <div class="col-md-12 col-6 text-center mb-2">
            <h6>Stay Connected</h6>
            <div class="stay-connected">
              <a href="https://www.instagram.com/dswdphilippines/?hl=en" target="_blank"><i class='bx bxl-instagram' style="font-size: 30px;"></i></a>
              <a href="https://www.facebook.com/dswdserves/" target="_blank"><i class='bx bxl-facebook-square' style="font-size: 30px;"></i></a>
              <a href="https://x.com/dswdserves" target="_blank"><i class='bx bxl-twitter' style="font-size: 30px;"></i></a>
            </div>
          </div>

          <div class="col-md-12 col-6 text-center border-top border-light">
            <p>DEVELOPED BY<img src="Images/Bini.png" class="biniimg img-fluid" alt="Bini"></p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Scripts -->
  <script src="template.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
    integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>
