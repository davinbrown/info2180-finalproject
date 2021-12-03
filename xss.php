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
		<link href="xss.css" type="text/css" rel="stylesheet" />
		<script src="./assets/js/issues.js"></script>
	</head>

	<body>
    <h4>"header">BugMe Issue Tracker</h4>
        <div class="container">
            <?php include(ROOT_PATH . "/app/includes/nav.php"); ?>
            <main>
                <?php $query = mysql_query("select *from issues", $connection);
                while ($row = mysql_fetch_array($query)){
                ?>
                <div class = "issues1">
                    <h2> <?php echo $rowl['title'];?> </h2>
                    <p1> <?php echo $rowl['id'];?> </p1>
                    <p> <?php echo $rowl['description'];?> </p> 
                    <br></br>
                    <l1> issue created on <?php echo $rowl['created'];?> by <?php echo $rowl['created_by'];?>  </l1>
                    <l1> Last updated on <?php echo $rowl['updated'];?> </l1>
            </main>

        </div>

        <div class="flex-container">
            <R1> Assigned To</R1>
            <p> <?php echo $rowl['assign_to'];?> </p>
            <R1> Type: </R1>
            <p> <?php echo $rowl['type'];?> </p>
            <R1> Priority </R1>
            <p> <?php echo $rowl['priority'];?> </p> 
            <R1> Status:</R1>
            <p> <?php echo $rowl['status'];?> </p> 
            <br></br>
            <button id="Mark-as-closed-btn">Mar as Closed</button>
            <button2 id="Mark-inprogress-btn">Mark In Progress</button2>
        </div>
        


    </body>
</html>