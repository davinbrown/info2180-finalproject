window.onload = function() {

    var close = document.getElementById("Mark-as-closed-btn");
    var inprogress = document.getElementById("Mark-inprogress-btn");
    close.addEventListener("click", updateissue, false); // add click even listener
    inprogress.addEventListener("click", updateissue, false); // add click even listener

    // To login users
    function updateissue(e) {
        e.preventDefault();

        
        var issue = document.getElementById("issue").value;

        if(e.target.id == "Mark-as-closed-btn"){
            var update = "closed";
           
        }
        if(e.target.id == "Mark-inprogress-btn"){
            var update = "inprogress";
        }

        //send a request to login user
        var httpRequest = new XMLHttpRequest();
        httpRequest.open("POST", './app/controler/update.php', true);

        //Send the proper header information along with the request
        httpRequest.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        httpRequest.onreadystatechange = function() { // Call a function when the state changes.
            if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
                // Request finished. Do processing here.
                
                if (httpRequest.responseText == "success") {

                }else{
                    document.getElementById("error").innerHTML = httpRequest.responseText;
                }
            }
        }
        alert(update);
        httpRequest.send(`request=update&issue=${issue}&update=${update}`);
    }
};