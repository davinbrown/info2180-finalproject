window.onload = function() {
    var adduser = document.getElementById("add-user-btn");
    adduser.addEventListener("click", newuser, false); // add click even listener
    
    // To login users
    function newuser(e) {
        e.preventDefault();

        alert("okay");

        var email_verify =  /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        var useremail = document.getElementById("email").value.trim();
        var userpassword = document.getElementById("password").value.trim();
        if (email_verify.test(useremail) && userpassword  != "" ) {
            //send a request to login user
            var httpRequest = new XMLHttpRequest();
            httpRequest.open("POST", './app/controler/users.php', true);

            //Send the proper header information along with the request
            httpRequest.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            httpRequest.onreadystatechange = function() { // Call a function when the state changes.
                if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
                    // Request finished. Do processing here.
                    if (httpRequest.responseText == "success") {
                        window.location.href="index.php";
                    }
                    document.getElementById("error").innerHTML = httpRequest.responseText;
                }
            }
            httpRequest.send(`request=login&email=${useremail}&password=${userpassword}`);
        }else{
            document.getElementById("error").innerHTML = "* Invalid email or password";
        }
    }  

};