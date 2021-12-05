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
                <div class="options">
                    <h1>Issues</h1>
                    <div><a class="add-a" href="<?php echo BASE_URL . '/issue.php' ?>"> NEW ISSUE</a></div>
                </div>
                <div class="controls">
                    <h1>Filter by:</h1> <span>All </span>  <span>Open</span> <span>My Ticket</span>
                </div>
                <div id="result" class="result ">
                    <div class="custom-table">
                        <table id="issues" class="">
                            <thead>
                                <th>Title</th>
                                <th>Type</th>
                                <th>Status</th>
                                <th>Asigned To</th>
                                <th>Created</th>
                            </thead>
                        <tbody>
                        <?php 
                        $allissues = selectAll('issues');
                        rsort($allissues);
                        foreach ($allissues as $issue) { ?>
                            <tr>
                                <td > <?php echo  "#". $issue['id'] ." ". $issue['title'] ; ?></td>
                                <td ><?php echo $issue['type'] ; ?></td>
                                <td ><?php echo $issue['status']; ?></td>
                                <?php  $assigned = selectOne("users", ["id" => $issue['assign_to']]);?>
                                <td> 
                                    <?php echo $assigned['firstname'] ." ". $assigned['lastname'];?>
                                </td>
                                <td ><?php echo date("M. d, Y", strtotime($issue['created'])) ; ?></td>
                                <td><a href="view.php?issue=<?php echo $issue['id']; ?>">view</a></td>
                            </tr>
                        <?php
                        }
                        ?>
                        </tbody>
                        </table>
                    </div>   
                </div>
            </main>
        </div>
	</body>
</html>