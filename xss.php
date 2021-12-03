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
		<script src="./assets/js/issues.js"></script>
	</head>

	<body>
        <header>
            <h4>BugMe Issue Tracker</h4>
        </header>
        <div class="container">
            <?php include(ROOT_PATH . "/app/includes/nav.php"); ?>
            <main>
                <div class = "issues1">
                    <h2> title </h2>
                    <p> id </p>
                    <p>description </p> 
                    <br></br>
                    <l1> issue created on  by   </l1>
                    <l1> Last updated on </l1>
                </div>

                <div class="flex-container">
                    <h1> Assigned To</h1>
                    <p> assign_to </p>
                    <h1> Type: </h1>
                    <p> type </p>
                    <h1> Priority </h1>
                    <p> priority </p> 
                    <h1> Status:</h1>
                    <p> status </p> 
                    <br></br>
                    <button id="Mark-as-closed-btn">Mar as Closed</button>
                    <button id="Mark-inprogress-btn">Mark In Progress</button>
                </div>
            </main>

        </div>
    </body>
</html>