<?php include("path.php") ?>
<?php include(ROOT_PATH . "/app/controler/users.php"); ?>
<?php
if(isset($_SESSION['id'])){
    header('location: '. BASE_URL . '/index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./assets/css/styles.css" type="text/css" rel="stylesheet" />
    <title>Login</title>
</head>
<body>
    <div class="login">
        <div class="login-form">
            <form action="login.php" method="post" >
                <h2>User login</h2>
                <div id="error"><?php echo $loginError ?></div>
                <input id="email" name="email" type="text" placeholder=" E-mail " />
                <input id="password" name="password" type="password" placeholder=" Password">
                <button type="submit" id="login-btn" name="login-btn" >Login</button>
            </form>
        </div>
    </div>
</body>
</html>