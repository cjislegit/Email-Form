<?php
    $emailErr = "";
    $displayMessage = "";
    if($_POST){

        if(!$_POST['email']){
            $emailErr .= '<br>The email field is required';
        }

        if(!$_POST['subject']){
            $emailErr .= '<br>The subject field is required';
        }

        if(!$_POST['content']){
            $emailErr .= '<br>The content field is required';
        }

        if ($_POST['email'] && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) === false) {
            $emailErr .= '<br>Invalid email';
        }

        if($emailErr != ""){
            $displayMessage = '<div class="alert alert-danger"><strong>There were error(s) in your form:</strong>'.$emailErr;
        }else{
            $emailTo = "";
            $headers = 'From: '.$_POST['email'];
            $subject = $_POST['subject'];
            $content = $_POST['content'];
            if(mail($emailTo, $subject, $content, $headers)){
                $displayMessage = '<div class="alert alert-success">Your message has been sent!</div>';
            }else{
                $displayMessage = '<div class="alert alert-danger">Your message could not be sent</div>';
            }
            
        }
    }
    
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Email Form</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="stylesheet.css">
  </head>
  <body>      
    <div class="container">
        <h1>Get in touch!</h1>
        <div id="errorMessage" class="rounded"><?php echo $displayMessage  ?></div>
        <form id="form" method="POST">
            <div class="form-group">
                <label for="inputEmail1">Email</label>
                <input name="email" type="email" class="form-control" id="inputEmail" aria-describedby="emailHelp" placeholder="Enter email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="subject">Subject</label>
                <input name="subject" type="text" class="form-control" id="inputSubject">
            </div>
            <div class="form-group">
                <label for="message">What would you like to ask?</label>
                <textarea name="content" class="form-control" id="inputMessage" rows="3"></textarea>
            </div>
            <input   type="submit" class="btn btn-primary" id="submit"></input>
        </form>
    </div>  

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="script.js"></script>
  </body>
</html>