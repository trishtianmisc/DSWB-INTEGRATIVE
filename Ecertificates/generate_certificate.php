<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $type = $_POST['certificate_type'];

    $certificates = [
        'Certificate of Eligibility' => 'MC_2022-015.pdf',
        'Certificate of Indigency' => 'Barangay-Certification.pdf',
        'Certification Declaring a Child Legally Available for Adoption' => 'Citizen-Charter-CDCLAA.pdf',
        'Travel Clearance for Minors' => 'Minors-Travelling-Abroad-Application-Form.pdf',
        'Registration' => 'Primer_RLA-MC-17s2018.pdf'
    ];

    if (array_key_exists($type, $certificates)) {
        $file = $certificates[$type];

        if (file_exists($file)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/pdf');
            header('Content-Disposition: attachment; filename="' . basename($file) . '"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file));
            flush(); // Flush headers before outputting file
            readfile($file);
            exit;
        } else {
            echo "File not found.";
        }
    } else {
        echo "Invalid certificate type.";
    }
} else {
    echo "Invalid request method.";
}
?>
