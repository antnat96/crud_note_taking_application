$(document).ready(function(){
    $('.modal').modal();

    function UrlBuilder(destination) {
        return location.protocol + "//" + location.hostname + "/" + location.pathname.split("/")[1] + "/" + destination;
    }

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
            document.location.href = UrlBuilder("index.php");
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
            document.location.href = UrlBuilder("index.php");
        });

    });

    function validateSuccess(result, action) {
        if (result != '1') {
            window.alert("Something went wrong. Please try again later.");
            document.location.href = UrlBuilder("index.php");
        }
        else {
            M.Modal.init($("#" + action + "-success-modal"), {
                onCloseEnd: function() {
                    document.location.href = UrlBuilder("index.php");
                }
            });
            let instance = M.Modal.getInstance($("#" + action + "-success-modal"));
            instance.open();
        }
    }
});