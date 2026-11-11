
<?php
    session_start();
    require_once 'config.php';


    if (isset($_SESSION['admin_id'])) {
        header("Location: show.php");
        exit;
    }
    $error1 = "";
    $error2 = "";

    if (isset($_POST['login'])) {

        $email = $_POST['email'];
        $password = $_POST['password'];

        $stmt = mysqli_query($conn, "SELECT * FROM admin WHERE email = '$email'");
        $admin = mysqli_fetch_assoc($stmt);

        if ($admin && $password === $admin['password']) {

            $_SESSION['admin_id'] = $admin['id'];
            $_SESSION['admin_username'] = $admin['username'];
            $_SESSION['admin_role'] = $admin['role'];
            header("Location: show.php");
            exit;
        }
         else {
            $error2 = "Invalid email or password!";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

<style>
    
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: Arial, sans-serif;
        background: #f1f4f9;
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .login-container {
        background: #ffffff;
        width: 380px;
        padding: 40px;
        border-radius: 12px;
        box-shadow: 0 5px 25px rgba(0, 0, 0, 0.08);
    }

    .login-container h2 {
        text-align: center;
        color: #2c3e50;
        margin-bottom: 30px;
        font-size: 26px;
    }

    .login-container label {
        display: block;
        margin-bottom: 8px;
        color: #34495e;
        font-weight: bold;
        font-size: 14px;
    }

    .login-container input {
        width: 100%;
        padding: 12px;
        border: 1px solid #dce1e8;
        border-radius: 6px;
        outline: none;
        margin-bottom: 20px;
        font-size: 14px;
        transition: 0.3s;
    }

    .login-container input:focus {
        border-color: #3498db;
        box-shadow: 0 0 4px rgba(52, 152, 219, 0.2);
    }

    .login-container button {
        width: 100%;
        padding: 12px;
        background: #2c3e50;
        color: white;
        border: none;
        border-radius: 6px;
        font-size: 16px;
        font-weight: bold;
        cursor: pointer;
        transition: 0.3s;
    }

    .login-container button:hover {
        background: #34495e;
    }

    .error-message {
        color: #e74c3c;
        background: #fdeaea;
        padding: 10px;
        border-radius: 5px;
        text-align: center;
        margin-bottom: 20px;
        font-size: 14px;
    }

    @media (max-width: 450px) {
        .login-container {
            width: 90%;
            padding: 30px 25px;
        }
    }

</style>
</head>
<body>

<div class="login-container">

    <h2>Login</h2>

    <?php if ($error2 != ""): ?>
        <p class="error-message">
            <?php echo ($error2); ?>
        </p>
    <?php endif; ?>

    <form method="POST" action="">

        <label>Email:</label>
        <input type="email" name="email" placeholder="Enter your email" required>

        <label>Password:</label>
        <input type="password" name="password" placeholder="Enter your password" required>

        <button type="submit" name="login">Login</button>

    </form>

</div>

</body>
</html>
