<?php 
    include_once 'header.php';
    $url = $_SERVER['REQUEST_URI'];
    $parts = parse_url($url);
    parse_str($parts['query'], $query);
    $message="";
    if($query['signup']=='empty')$message = "Some boxes are empty.";
    else if($query['signup']=='invalid')$message = "Invalid firstname or lastname.";
    else if($query['signup']=='email')$message = "Invalid Email.";
    else if($query['signup']=='usertaken')$message = "This username have been used.";

    if($message!=""){
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
    
?>

        <div class="body center">
            <div class="container ">
                <div class="col-lg-8 mx-auto">
                    <h2 class="topic">Signup</h2>
                    <form action="includes/signup.inc.php"  method="POST" class="register-form">
                        <input type="text" name="first" placeholder="Firstname" class="form-control">
                        <input type="text" name="last" placeholder="Lastname" class="form-control">
                        <input type="text" name="email" placeholder="E-mail" class="form-control">
                        <input type="text" name="uid" placeholder="Username" class="form-control">
                        <input type="password" name="pwd" placeholder="Password" class="form-control">
                        <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block">Sign up</button>
                    </form> 
                </div>
            </div>
        </div>
        

<?php 
    include_once 'footer.php';
?>
