$(document).ready(function() {
    $("#userdk").keyup(function() {
        var user = $(this).val();
        $.post("./ajax/checkuser", {
            ur: user
        }, function(data) {
            $("#messuser").html(data);
        });
    });
});