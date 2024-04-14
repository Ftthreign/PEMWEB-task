<?php 
session_start();

if($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = 'fadhil';
    $password = '123456';
    $set_username = $_POST['username'];
    $set_password = $_POST['password'];
    
    if($set_username == $username && $set_password == $password) {
        $_SESSION['already_login'] = true;
        header("Location: index.php");
        exit;
    } else {
        $login_error ="Password atau username salah, silahkan coba lagi";
    }
}

if(isset($_SESSION['already_login']) && $_SESSION['already_login'] == true){
    header("Location: index.php");
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./style/style.css">
</head>
<body>
    <div class="login-wrapper">
        <h2>Login</h2>
        <form action="login.php" method="post">
            <label for="username">Username:</label><br>
            <input type="text" id="username" name="username"><br>
            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password"><br><br>
            <button type="submit" name="submit">Login</button>
        </form>
        <div class="error-message">
            <?php if ($_SERVER["REQUEST_METHOD"] == 'POST' && isset($login_error)) { ?>
                <p><?php echo $login_error; ?></p>
                <?php } ?>
        </div>
    </div>
</body>
</html>