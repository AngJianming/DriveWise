<?php
// Database connection settings
$host = 'localhost';
$db   = 'drivewise';
$user = 'root';
$pass = '';

// Create a connection using mysqli
$conn = mysqli_connect($host, $user, $pass, $db);

// Check connection
if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Initialize messages
$successMessage = "";
$errorMessage = "";

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve posted values
    $role = isset($_POST['role']) ? trim($_POST['role']) : '';
    $username = isset($_POST['username']) ? trim($_POST['username']) : '';
    $password = isset($_POST['password']) ? trim($_POST['password']) : '';
    $dob = isset($_POST['dob']) ? trim($_POST['dob']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';

    // Basic validation
    if (empty($role) || empty($username) || empty($password) || empty($dob) || empty($email)) {
        $errorMessage = "All fields are required.";
    } else {
        // Hash the password before storing
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Determine which table to insert into based on $role
        if ($role === 'student') {
            // Insert into student table
            $sql = "INSERT INTO student (username, password, dob, email) VALUES (?, ?, ?, ?)";
        } elseif ($role === 'educator') {
            // Insert into educator table
            $sql = "INSERT INTO educator (username, password, dob, email) VALUES (?, ?, ?, ?)";
        } else {
            $errorMessage = "Invalid role selected.";
        }

        if (empty($errorMessage)) {
            // Prepare the statement
            $stmt = mysqli_prepare($conn, $sql);
            if ($stmt) {
                // Bind parameters: s = string, since all fields are strings
                mysqli_stmt_bind_param($stmt, "ssss", $username, $hashedPassword, $dob, $email);

                if (mysqli_stmt_execute($stmt)) {
                    $successMessage = "Registration successful! You can now log in.";
                } else {
                    $errorMessage = "Error inserting data: " . mysqli_stmt_error($stmt);
                }
                mysqli_stmt_close($stmt);
            } else {
                $errorMessage = "Database error: " . mysqli_error($conn);
            }
        }
    }
}

// Close the connection if desired
// mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DriveWise - Registration</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <style>
    /* Registration Container */
    .registration-container {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      background-color: rgba(10, 10, 40, 0.9);
      padding: 30px 20px;
      border-radius: 10px;
      width: 350px;
      text-align: center;
      max-height: 100vh; /* Limit the maximum height */
      overflow-y: auto; /* Enable vertical scrolling */
    }

    .registration-container h1,
    .registration-container h2 {
      margin-bottom: 20px;
      color: #fff;
    }

    /* Role dropdown */
    select {
      margin: 10px 0;
      padding: 10px;
      background-color: #3a3d99;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      width: 100%;
    }

    .row {
      margin-bottom: 10px;
      padding: 6px;
      border-radius: 5px;
      background-color: white;
      transition: background-color 0.3s;
      display: none; /* Hide rows by default */
    }

    #buttonsRow {
      display: none; /* Hide buttons by default */
    }

    input, select {
      padding: 8px;
      width: calc(100% - 16px);
      border: none;
      border-radius: 5px;
    }

    button {
      margin: 10px 5px;
      padding: 8px 16px;
      background-color: #3a3d99;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    button:hover {
      background-color: #5a5edd;
    }

    .message {
      margin-top: 15px;
      font-size: 14px;
      color: #000;
      background: #fff;
      padding: 5px;
      border-radius: 5px;
    }

    .login-link {
      color: #ffffff;
    }

    /* Hide the registration form by default */
    #registrationForm {
      display: none;
    }

    /* Responsive design */
    @media (max-width: 320px) {
      .register-container {
        width: 90%;
      }
    }
  </style>
</head>
<body>
<h1 style="text-align:center;">Register Page</h1>
    <header style="text-align:center;">
        <nav>
            <a href="login.html">Login</a> |
            <a href="about_drivewise.html">About DriveWise</a>
        </nav>
    </header>
  <div class="registration-container">
    <!-- Title -->
    <h1>DriveWise</h1>
    <h2>Registration Page</h2>
    
    <!-- Display error or success messages -->
    <?php if(!empty($errorMessage)): ?>
      <div class="message" style="color:red;">
        <?php echo htmlspecialchars($errorMessage); ?>
      </div>
    <?php endif; ?>

    <?php if(!empty($successMessage)): ?>
      <div class="message" style="color:green;">
        <?php echo htmlspecialchars($successMessage); ?>
      </div>
    <?php endif; ?>

    <select id="roleDropdown" onchange="toggleRegistrationForm()">
      <option value="">-- Please Select Role --</option>
      <option value="student">Student</option>
      <option value="educator">Educator</option>
    </select>

    <!-- Registration Form -->
    <form id="registrationForm" method="POST" action="">
      <!-- Hidden input to store selected role -->
      <input type="hidden" name="role" id="roleInput" value="">

      <div class="row" id="usernameRow">
        <input type="text" id="username" name="username" placeholder="Username" required>
      </div>
      <div class="row" id="passwordRow">
        <input type="text" id="password" name="password" placeholder="Password (At least 4 characters)" required>
      </div>
      <div class="row" id="dobRow">
        <input type="date" id="dob" name="dob" required>
      </div>
      <div class="row" id="emailRow">
        <input type="email" id="email" name="email" placeholder="Email Address" required>
      </div>
      <div class="buttons" id="buttonsRow">
        <button type="submit">Register</button>
        <button type="reset">Reset</button>
      </div>
    </form>

    <!-- Login link (now inside the registration-container) -->
    <div class="message" id="loginMessage"></div>
    <p style="color: white;">
      Already have an account?
      <a href="login.php" class="login-link"> Click here to log in.</a>
    </p>
  </div>

  <script>
    function toggleRegistrationForm() {
      const roleDropdown = document.getElementById("roleDropdown");
      const registrationForm = document.getElementById("registrationForm");
      const rows = document.querySelectorAll(".row");
      const buttonsRow = document.getElementById("buttonsRow");
      const roleInput = document.getElementById("roleInput");

      if (roleDropdown.value) {
        // Show the form and enable input fields
        registrationForm.style.display = "block";
        rows.forEach(row => row.style.display = "block");
        buttonsRow.style.display = "block";
        roleInput.value = roleDropdown.value;
      } else {
        // Hide the form and disable input fields
        registrationForm.style.display = "none";
        rows.forEach(row => row.style.display = "none");
        buttonsRow.style.display = "none";
        roleInput.value = "";
      }
    }
  </script>
  <script src="validateRegisterData.js"></script>
  <script src="starry.js"></script>
</body>
</html>
