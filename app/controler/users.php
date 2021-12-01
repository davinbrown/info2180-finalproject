<?php include(ROOT_PATH . "/app/database/db.php");
// handle all request

$loginError = "";

if (isset($_POST['login-btn'])) {
    unset($_POST['login-btn']);

    /* Removes white spaces from username and password inputs. */
    $useremail = trim_input($_POST['email']);
    $password = trim_input($_POST['password']);

    /* Checks if email and password is empty or invalid */
    if(empty($useremail) || empty($password)){
        $loginError = "* Username or password is empty" ; // displays input errors
    }else{

        if (!filter_var($useremail, FILTER_VALIDATE_EMAIL)) {
            $loginError = "Invalid email format";
        }else{
            $user = selectOne('users', ['email' => $useremail]);
            if(empty($user)){
                $loginError = "* No account found";
            }else{
                /* check user password and log them in */
                if(password_verify($password, $user['password']) ){
                    /* store session variables */
                    $_SESSION['id'] = $user['id'];
                    header('location: '. BASE_URL . '/index.php'); // go to select home page.
                    exit();
                }else{
                    $loginError = "* incorrect password";    
                }
            }
        }
    }
}
?>