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
		<title>BugMe Issue Tracker | Issue</title>
		<link href="./assets/css/styles.css" type="text/css" rel="stylesheet" />
        <script src="./assets/js/issue.js"></script>
	</head>

	<body>
        <header>
            <h4>BugMe Issue Tracker</h4>
        </header>
        <div class="container">
            <?php include(ROOT_PATH . "/app/includes/nav.php"); ?>
            <main>
                <div id="result" class="result ">
                    <div class="issueform">
                        <form>
                            <h2>Create Issue</h2>
                            <div id="error"></div>
                            <input id="title" type="text" placeholder=" Title " />
                            <textarea id="description" rows="4" cols="50" placeholder=" Description "></textarea>
                            <br></br>
                            <label for="assigned">Assigned to:</label>
                            <select id="assigned" name="assigned" placeholder=" Assigned to">
                                <?php
                                    $allusers = selectAll("users");
                                    foreach ($allusers as $user) { ?>
                                        <option value=<?=$user['id'] ?> > <?=$user['firstname'] ." ". $user['lastname'] ?> </option>
                                    <?php
                                    }
                                ?>
                            </select>
                            <label for="type">Type:</label>
                            <select id="type" name="type">
                                <option value="bug">Bug</option>
                                <option value="proposal">Proposal</option>
                                <option value="task">Task</option>
                            </select>
                            <label for="priority">Priority:</label>
                            <select id="priority" name="priority">
                                <option value="minor">Minor</option>
                                <option value="major">Major</option>
                                <option value="critical">Critical</option>
                            </select>
                            <button id="add-issue-btn">Submit</button>
                        </form>
                    </div>
                </div>
            </main>
        </div>
	</body>
</html>