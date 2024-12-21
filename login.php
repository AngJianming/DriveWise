<?php
// Include database connection settings
$host = 'localhost';
$db   = 'drivewise';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

// Set up DSN
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// If the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $role = isset($_POST['role']) ? trim($_POST['role']) : '';
    $username = isset($_POST['username']) ? trim($_POST['username']) : '';
    $password = isset($_POST['password']) ? trim($_POST['password']) : '';

    $valid_roles = ['student', 'educator', 'admin'];
    if (in_array($role, $valid_roles)) {
        // Mapping roles to tables and redirect pages
        $roleMapping = [
            'student'  => ['table' => 'student',  'redirect' => 'student_home.html',  'col_user' => 'student_username',  'col_pass' => 'student_password'],
            'educator' => ['table' => 'educator', 'redirect' => 'educator_home.html', 'col_user' => 'educator_username', 'col_pass' => 'educator_password'],
            'admin'    => ['table' => 'admin',    'redirect' => 'admin_home.html',    'col_user' => 'admin_username',    'col_pass' => 'admin_password']
        ];

        $tableName = $roleMapping[$role]['table'];
        $redirectPage = $roleMapping[$role]['redirect'];
        $col_user = $roleMapping[$role]['col_user'];
        $col_pass = $roleMapping[$role]['col_pass'];

        // Prepare a query to fetch user data from the selected table
        $query = "SELECT $col_user AS username, $col_pass AS password FROM $tableName WHERE $col_user = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$username]);
        $userData = $stmt->fetch();

        // Validate credentials
        if ($userData && $userData['password'] === $password) {
            // Successful login
            echo "<script>alert('Login successful as $role!'); window.location.href='$redirectPage';</script>";
            exit();
        } else {
            // Invalid credentials
            echo "<script>alert('Invalid credentials. Please try again.');</script>";
        }
    } else {
        // Invalid role selected
        echo "<script>alert('Invalid role selected.');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        /* Login container styles */
        .login-container {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgba(10, 10, 40, 0.9);
            padding: 30px 20px;
            border-radius: 10px;
            width: 300px;
            text-align: center;
        }

        .login-container h1,
        .login-container h2 {
            margin-bottom: 20px;
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

        /* Login form styles */
        .login-form {
            display: none;
            flex-direction: column;
        }

        .login-form input {
            margin: 10px 0;
            padding: 10px;
            border: none;
            border-radius: 5px;
            width: calc(100% - 22px);
        }

        .login-form button {
            padding: 10px;
            background-color: #3a3d99;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .login-form button:hover {
            background-color: #5a5edd;
        }

        /* Registration message */
        .message {
            margin-top: 15px;
        }

        .register-link {
            color: #ffffff;
        }
    </style>
</head>
<body>
    <!-- Header with Navigation -->
    <header>
        <h1>Login Page</h1>
        <nav>
            <a href="register.php">Register</a> |
            <a href="about_drivewise.php">About DriveWise</a>
        </nav>
    </header>

    <!-- Login Container -->
    <div class="login-container">
        <h1>DriveWise</h1>
        <h2>Login Page</h2>
        
        <!-- Role Dropdown -->
        <select id="roleDropdown" name="role" onchange="selectRole()">
            <option value="">-- Please Select Role --</option>
            <option value="student">Student</option>
            <option value="educator">Educator</option>
            <option value="admin">Administrator</option>
        </select>

        <!-- Login Form -->
        <form class="login-form" id="loginForm" method="POST">
            <input type="hidden" id="roleInput" name="role">
            <input type="text" id="username" name="username" placeholder="Username" required>
            <input type="password" id="password" name="password" placeholder="Password" required>
            <button type="submit">Log in</button>
            <div class="message" id="registerMessage">
                Don't have an account? 
                <a href="register.html" class="register-link">Click here to register.</a>
            </div>
        </form>
    </div>

    <script src='starry.js'></script>
    <script>
        // Handle role selection display logic
        function selectRole() {
            const dropdown = document.getElementById('roleDropdown');
            const selectedRole = dropdown.value;
            const loginForm = document.getElementById('loginForm');
            const registerMessage = document.getElementById('registerMessage');
            const roleInput = document.getElementById('roleInput');

            // Update hidden input with selected role
            roleInput.value = selectedRole;

            // Hide form if no role selected
            if (!selectedRole) {
                loginForm.style.display = 'none';
                return;
            }

            // Show form
            loginForm.style.display = 'flex';

            // Hide registration message if role is admin
            if (selectedRole === 'admin') {
                registerMessage.style.display = 'none';
            } else {
                registerMessage.style.display = 'block';
            }
        }
    </script>
</body>
</html>