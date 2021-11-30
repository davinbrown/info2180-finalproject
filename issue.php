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
                            <input type="text" placeholder=" Title " />
                            <textarea rows="4" cols="50" placeholder=" Description "></textarea>
                            <br></br>
                            <input type="text" placeholder=" Assigned to">
                            <label for="type">Type:</label>
                            <select id="type" name="type">
                                <option value="bug">Bug</option>
                                <option value="proposal">Proposal</option>
                                <option value="tas">Task</option>
                            </select>
                            <label for="priority">Priority:</label>
                            <select id="priority" name="priority">
                                <option value="minor">Minor</option>
                                <option value="major">Major</option>
                                <option value="critical">Critical</option>
                            </select>
                            <button>Submit</button>
                        </form>
                    </div>
                </div>
            </main>
        </div>
	</body>
</html>