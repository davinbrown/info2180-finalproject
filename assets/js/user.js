window.onload = function() {
    var adduser = document.getElementById("add-user-btn");
    adduser.addEventListener("click", newuser, false); // add click even listener
    
    // To login users
    function newuser(e) {
        e.preventDefault();

        var firstname = document.getElementById("firstname").value.trim();
        var lastname = document.getElementById("lastname").value.trim();
        var useremail = document.getElementById("email").value.trim();
        var userpassword = document.getElementById("password").value.trim();

        //send a request to login user
        var httpRequest = new XMLHttpRequest();
        httpRequest.open("POST", './app/controler/new.php', true);

        //Send the proper header information along with the request
        httpRequest.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        httpRequest.onreadystatechange = function() { // Call a function when the state changes.
            if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
                // Request finished. Do processing here.
                
                if (httpRequest.responseText == "success") {
                    document.getElementById("firstname").value = "";
                    document.getElementById("lastname").value = "";
                    document.getElementById("email").value = "";
                    document.getElementById("password").value = "";
                }else{
                    document.getElementById("error").innerHTML = httpRequest.responseText;
                }
            }
        }
        httpRequest.send(`request=adduser&firstname=${firstname}&lastname=${lastname}&email=${useremail}&password=${userpassword}`);
    }
};