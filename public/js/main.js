$(document).ready(function() {
    $("#userdk").keyup(function() {
        var user = $(this).val();
        $.post("./ajax/checkuser", {
            ur: user
        }, function(data) {
            $("#messuser").html(data);
        });
    });
    $("#viewproduct").click(function() {
        $.post("./ajax/viewAllProduct", function(data) {
            $("#listproduct").html(data);
        });
    });
    $("#addproduct").click(function(){
        $.post("./ajax/addProduct",function(data){
            $("#listproduct").html(data);
        });
    });
    
    
});
