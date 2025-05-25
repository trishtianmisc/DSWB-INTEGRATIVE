<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>DSWD Certificate Generator</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"/>
  
  <style>
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
  </style>
</head>
<body class="container py-5">
  <h2 class="mb-4">DSWD Certificates Templates</h2>

  <form action="generate_certificate.php" method="POST">
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
</body>
</html>
