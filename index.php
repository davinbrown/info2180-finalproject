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
		<title>BugMe Issue Tracker</title>
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
                    
                </div>
            </main>
        </div>
	</body>
</html>