$('#submit').click(function(){
    var errorMessage = "";

    $("form").submit(function(e) {

        if($('#inputEmail').val() == ""){
            errorMessage += "<br> The email field is required";
        }

        if($('#inputSubject').val() == ""){
            errorMessage += "<br> The subject field is required";
        }
    
        if($('#inputMessage').val() == ""){
            errorMessage += "<br> The content field is required";
        }

        if(errorMessage != ""){
            $("#errorMessage").html('<div class="alert alert-danger"><strong>There were error(s) in your form:</strong>' + errorMessage + "</div>")
            return false;
        }else{
            return true;
        }
    });

});