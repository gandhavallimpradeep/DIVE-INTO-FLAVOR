

<?php
// Connect to the database
$conn = new mysqli("localhost", "root", "", "Responsive-Pizza-main");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch total orders
$orderResult = $conn->query("SELECT COUNT(*) AS total_orders FROM orders");
$orderData = $orderResult->fetch_assoc();

// Fetch total users
$userResult = $conn->query("SELECT COUNT(*) AS total_users FROM users");
$userData = $userResult->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            display: flex;
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .sidebar {
            width: 250px;
            background: #333;
            color: white;
            padding: 20px;
            height: 100vh;
        }
        .sidebar a {
            display: block;
            color: white;
            text-decoration: none;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
        }
        .sidebar a:hover {
            background: #444;
        }
        .main-content {
            flex-grow: 1;
            padding: 20px;
        }
        .card {
            background: #f8f8f8;
            padding: 20px;
            margin: 10px 0;
            border-radius: 5px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h2>Admin Panel</h2>
        <a href="#dashboard"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
        <a href="#orders"><i class="fas fa-box"></i> Orders</a>
        <a href="#users"><i class="fas fa-users"></i> Users</a>
        <a href="#analytics"><i class="fas fa-chart-bar"></i> Analytics</a>
        <a href="#settings"><i class="fas fa-cog"></i> Settings</a>
    </div>
    <div class="main-content">
        <div class="header">
            <h1>Dashboard</h1>
            <button onclick="logout()">Logout</button>
        </div>
        <div class="card">
            <h3>Total Orders: <span id="order-count"><?= $orderData['total_orders'] ?></span></h3>
        </div>
        <div class="card">
            <h3>Total Users: <span id="user-count"><?= $userData['total_users'] ?></span></h3>
        </div>
    </div>
    <script>
        function logout() {
            alert("Logging out...");
            window.location.href = './login/index.php.html';
        }
    </script>
</body>
</html>
