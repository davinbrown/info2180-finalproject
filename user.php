<?php include("path.php") ?>
<?php include(ROOT_PATH . "/app/controler/users.php"); ?>
<?php
    if(!isset($_SESSION['id'])){
        header('location: '. BASE_URL . '/login.php');
        exit();
    }
?>
<!DOCTYPE html>
<html>
	<head>
        <meta charset="utf-8">
		<title>BugMe Issue Tracker | Users</title>
		<link href="./assets/css/styles.css" type="text/css" rel="stylesheet" />
	</head>

	<body>
        <header>
            <h4>BugMe Issue Tracker</h4>
        </header>
        <div class="container">
            <?php include(ROOT_PATH . "/app/includes/nav.php"); ?>
            <main>
                <div id="result" class="result ">
                    <div class="register">
                        <form method="post">
                            <h2>New User</h2>
                            <input id="firstname" type="text" placeholder=" Firstname " />
                            <input id="lastname" type="text" placeholder=" Lastname " />
                            <input id="email" type="text" placeholder=" E-mail " />
                            <input id="password" type="password" placeholder=" Password">
                            <button id="add-user-btn">Submit</button>
                        </form>
                    </div>
                </div>
            </main>
        </div>
	</body>
</html>