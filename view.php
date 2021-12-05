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
		<script src="./assets/js/app.js"></script>
	</head>

	<body>
        <header>
            <h4>BugMe Issue Tracker</h4>
        </header>
        <div class="container">
            <?php include(ROOT_PATH . "/app/includes/nav.php"); ?>
            <main>
            <?php $id = $_GET['issue']; 
                $issue = selectOne("issues", ["id" => $id]);
                $user = selectOne("users", ["id" => $issue['created_by']]);
                $assigned = selectOne("users", ["id" => $issue['assign_to']]);
            ?>

            <div class="title">
                <h1><?php echo $issue['title'] ;?></h1>
                <h4><?php echo "Issue#: ". $issue['id'] ;?></h4>
            </div>

            <div class="my-grid">
                <div class="issues">
                    <p><?php echo $issue['description'] ;?> </p> 
                    <br>
                    <span> > Issue created on  by: <?php echo $user['firstname'] ." ". $user['lastname'];?> </span>
                    <br>
                    <span> > Last updated on: <?php echo date("M. d, Y", strtotime($issue['created'])) ; ?></span>
                </div>

                <div class="aside">
                    <h3> Assigned To</h3>
                    <p><?php echo $assigned['firstname'] ." ". $assigned['lastname'];?></p>
                    <h3> Type: </h3>
                    <p><?php echo $issue['type'] ; ?></p>
                    <h3> Priority </h3>
                    <p><?php echo $issue['priority']; ?> </p> 
                    <h3> Status:</h3>
                    <p><?php echo $issue['status']; ?></p> 
                    <br></br>
                    <input id="issue"type="hidden" value="<?php $issue['id'] ;?>">
                    <button id="Mark-as-closed-btn">Mar as Closed</button>
                    <button id="Mark-inprogress-btn">Mark In Progress</button>
                </div>

            </div>
            </main>
        </div>
    </body>
</html>