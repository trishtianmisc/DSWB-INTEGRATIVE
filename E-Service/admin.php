<?php
session_start();

$host = "localhost";
$user = "root";
$password = "";
$dbname = "travel_form";

$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function formatDate($dateStr) {
    $timestamp = strtotime($dateStr);
    return $timestamp ? date('F j, Y', $timestamp) : '';
}

// Handle login
$login_error = false;
if (isset($_POST['admin_login'])) {
    $username = $_POST['admin_username'] ?? '';
    $password = $_POST['admin_password'] ?? '';

    // Hardcoded credentials for demo, replace with your secure method!
    if ($username === 'admin' && $password === '1234') {
        $_SESSION['user_role'] = 'admin';
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    } else {
        $login_error = true;
    }
}

// Handle logout
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

// Only fetch applications if admin is logged in
$applications = [];
if (isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'admin') {
    $sql = "SELECT * FROM applications ORDER BY submitted_at DESC";
    $result = $conn->query($sql);
    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $applications[] = $row;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Application Submissions</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f4f6f8;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 1200px;
            margin: auto;
            background: #fff;
            border-radius: 12px;
            padding: 20px 30px;
            box-shadow: 0 8px 24px rgba(0,0,0,0.1);
            overflow-x: auto;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
            font-weight: 600;
            color: #333;
        }
        #h2 {
            text-align: center;
            margin-bottom: 20px;
            font-weight: 600;
            color: #333;
            margin-left: 380px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 900px; /* prevent squishing */
        }
        th, td {
            padding: 12px 15px;
            text-align: left;
            vertical-align: top;
        }
        th {
            background-color: #f0f2f5;
            color: #333;
            font-weight: 600;
            border-bottom: 2px solid #ddd;
            white-space: nowrap;
        }
        td {
            border-bottom: 1px solid #eee;
            word-wrap: break-word;
        }
        tr:hover {
            background-color: #f9fbfc;
        }
        .logout-btn {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1050; /* make sure it's above other content */
        }

        /* Responsive for smaller screens */
        @media (max-width: 768px) {
            table, thead, tbody, th, td, tr {
                display: block;
            }
            thead {
                display: none;
            }
            tr {
                margin-bottom: 15px;
                border: 1px solid #ddd;
                border-radius: 8px;
                padding: 10px;
            }
            td {
                position: relative;
                padding-left: 50%;
                text-align: right;
                white-space: normal;
            }
            td::before {
                content: attr(data-label);
                position: absolute;
                left: 15px;
                width: 45%;
                padding-right: 10px;
                font-weight: bold;
                text-align: left;
                white-space: nowrap;
            }
        }
    </style>
</head>
<body>
<div class="container">

    <?php if (isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'admin'): ?>
        <div class="d-flex justify-content-between align-items-center mb-4" style="position: relative;">
            <h2 id="h2">Travel Permit Applications</h2>
            <a href="?logout=1" class="btn btn-danger logout-btn">Logout</a>
        </div>

        <?php if (count($applications) > 0): ?>
            <table>
                <thead>
                <tr>
                    <th>Child Name</th>
                    <th>DOB</th>
                    <th>Minor Address</th>
                    <th>Parent Name</th>
                    <th>Parent Address</th>
                    <th>Validity</th>
                    <th>Companion</th>
                    <th>Relationship</th>
                    <th>Destination</th>
                    <th>Purpose</th>
                    <th>Submitted At</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($applications as $row): ?>
                    <tr>
                        <td data-label="Child Name"><?= htmlspecialchars($row['child_name']) ?></td>
                        <td data-label="DOB"><?= formatDate($row['dob']) ?></td>
                        <td data-label="Minor Address"><?= nl2br(htmlspecialchars($row['minor_address'])) ?></td>
                        <td data-label="Parent Name"><?= htmlspecialchars($row['parent_name']) ?></td>
                        <td data-label="Parent Address"><?= nl2br(htmlspecialchars($row['parent_address'])) ?></td>
                        <td data-label="Validity"><?= htmlspecialchars($row['validity_period']) ?> year(s)</td>
                        <td data-label="Companion"><?= htmlspecialchars($row['companion_name']) ?><br><?= nl2br(htmlspecialchars($row['companion_address'])) ?></td>
                        <td data-label="Relationship"><?= htmlspecialchars($row['companion_relationship']) ?></td>
                        <td data-label="Destination"><?= htmlspecialchars($row['destination']) ?></td>
                        <td data-label="Purpose"><?= nl2br(htmlspecialchars($row['purpose'])) ?></td>
                        <td data-label="Submitted At"><?= formatDate($row['submitted_at']) ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p style="text-align:center;">No applications submitted yet.</p>
        <?php endif; ?>

    <?php else: ?>
        <h2 class="mb-4 text-center">Please Log In to View Applications</h2>

        <!-- Button trigger modal -->
        <div class="d-flex justify-content-center">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#adminLoginModal">
                Admin Login
            </button>
        </div>

        <!-- Login Modal -->
        <div class="modal fade <?= $login_error ? 'show' : '' ?>" id="adminLoginModal" tabindex="-1" aria-labelledby="adminLoginLabel" aria-hidden="<?= $login_error ? 'false' : 'true' ?>" style="<?= $login_error ? 'display:block;' : '' ?>">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form method="POST" action="">
                        <div class="modal-header">
                            <h5 class="modal-title" id="adminLoginLabel">Admin Login</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <?php if ($login_error): ?>
                                <div class="alert alert-danger text-center">
                                    Invalid username or password.
                                </div>
                            <?php endif; ?>
                            <div class="mb-3">
                                <label for="adminUsername" class="form-label">Username</label>
                                <input type="text" class="form-control" name="admin_username" id="adminUsername" required>
                            </div>
                            <div class="mb-3">
                                <label for="adminPassword" class="form-label">Password</label>
                                <input type="password" class="form-control" name="admin_password" id="adminPassword" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="admin_login" class="btn btn-primary">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <script>
        <?php if ($login_error): ?>
            var myModal = new bootstrap.Modal(document.getElementById('adminLoginModal'));
            myModal.show();
        <?php endif; ?>
        </script>

    <?php endif; ?>

</div>
</body>
</html>

<?php $conn->close(); ?>
