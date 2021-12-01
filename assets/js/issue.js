window.onload = function() {

    var addissue = document.getElementById("add-issue-btn");
    addissue.addEventListener("click", newissue, false); // add click even listener

    // To login users
    function newissue(e) {
        e.preventDefault();

        var title = document.getElementById("title").value.trim();
        var description = document.getElementById("description").value.trim();
        var assigned = document.getElementById("assigned").value.trim();
        var type = document.getElementById("type").value.trim();
        var priority = document.getElementById("priority").value.trim();
        

        //send a request to login user
        var httpRequest = new XMLHttpRequest();
        httpRequest.open("POST", './app/controler/new.php', true);

        //Send the proper header information along with the request
        httpRequest.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        httpRequest.onreadystatechange = function() { // Call a function when the state changes.
            if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
                // Request finished. Do processing here.
                
                if (httpRequest.responseText == "success") {
                    document.getElementById("title").value = "";
                    document.getElementById("description").value = "";
                }else{
                    document.getElementById("error").innerHTML = httpRequest.responseText;
                }
            }
        }
        httpRequest.send(`request=addissue&title=${title}&description=${description}&assigned=${assigned}&type=${type}&priority=${priority}`);
    }
};