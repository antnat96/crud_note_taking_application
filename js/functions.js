$(document).ready(function(){
    const production = true;

    $('.modal').modal();

    function UrlBuilder(destination) {
        if (production) {
            return location.protocol + "//" + location.hostname + "/" + location.pathname.split("/")[0] + destination;
        }
        else {
            return location.protocol + "//" + location.hostname + "/" + location.pathname.split("/")[1] + "/" + destination;
        }
    }

    $("#login-button").on("click", function() {

        // Get the pw and trim it
        let cred = $("#cred").val().trim();

        // If it's empty, throw a window alert
        if (cred === "") { 
            $("#cred").addClass("invalid");
            window.alert("Please enter a password");
        }

        // If the pw field is populated, perform the AJAX call
        else {
            $.ajax({
                url: UrlBuilder("php/login.php"),
                data: { pw: cred },
                type: "POST",
            }).done(function(result){
                // If the db connection is made, go to the notes page
                if (result === "Success") {
                    $("#cred").addClass("valid");
                    document.location.href = UrlBuilder("main.php");
                }
                // If the db connection fails, tell the user the password is incorrect
                else { 
                    window.alert("Your password is incorrect");
                    $("#cred").addClass("invalid");
                }
            }).fail(function(result) {
                window.alert("Something went wrong. Please try again later.");
                document.location.href = UrlBuilder("index.php");
            });
        }

    })

    $("#logout-button").on("click", function() {

        $.ajax({
            url: UrlBuilder("php/logout.php"),
            data: { some: "data" },
            type: "POST",
        }).done(function(result){
            window.alert("You've been logged out and will now be redirected.");
            document.location.href = UrlBuilder("index.php");
        }).fail(function(result) {
            window.alert("Something went wrong. Please try again later.");
            document.location.href = UrlBuilder("main.php");
        });

    })

    $("#add-note").on("click", function() {
        let author = $("#author-input").val();
        let contents = $("#contents-input").val();

        $.ajax({
            url: UrlBuilder("php/create-note.php"),
            data: {
                author: author, 
                contents: contents, 
            },
            type: "POST",
        }).done(function(result){
            validateSuccess(result, "create");
        }).fail(function(result) {
            window.alert("Something went wrong. Please try again later.");
            document.location.href = UrlBuilder("main.php");
        });
    });

    // Handle clicks on note delete buttons
    $(".note-delete").on("click", function() {
        let idOfRowToDelete = $(this).attr("id").split("-")[2];

        $.ajax({
            url: UrlBuilder("php/delete-note.php"),
            data: {
                idOfRowToDelete: idOfRowToDelete
            },
            type: "POST",
        }).done(function(result){
            validateSuccess(result, "delete");
        }).fail(function(result) {
            window.alert("Something went wrong. Please try again later.");
            document.location.href = UrlBuilder("main.php");
        });

    });

    function validateSuccess(result, action) {
        if (result != true && result != 1) {
            window.alert("Something went wrong. Please try again later.");
            document.location.href = UrlBuilder("main.php");
        }
        else {
            M.Modal.init($("#" + action + "-success-modal"), {
                onCloseEnd: function() {
                    document.location.href = UrlBuilder("main.php");
                }
            });
            let instance = M.Modal.getInstance($("#" + action + "-success-modal"));
            instance.open();
        }
    }
});