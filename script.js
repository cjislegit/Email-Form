$('#submit').click(function(){
    var errorMessage = "";

    if(validateEmail($('#inputEmail')) == false){
        errorMessage += "<br>Please Enter a Valid Email";
    }

    if($('#inputSubject').val() == ""){
        errorMessage += "<br> The subject field is required";
    }

    if($('#inputMessage').val() == ""){
        errorMessage += "<br> The content field is required";
    }

    if(errorMessage != ""){
        $("#errorMessage").html('<div class="alert alert-danger"><strong>There were error(s) in your form:</strong>' + errorMessage + "</div>");
    }
});

function validateEmail(email) {
    var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    return emailReg.test(email);
  }

  $("#form").submit(function(e) {
    e.preventDefault();
});