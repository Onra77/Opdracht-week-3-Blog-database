<?php
include_once("db.php");
if(isset($_POST) & !empty($_POST)){
    $username = mysqli_real_escape_string($connection, ($_POST['username']);
    @password = md5($_POST['password']);
     
     $sql = "SELECT * FROM 'login' WHERE username = $username' AND password='$password'";
}    $result = mysqli_query($connection, $sql); 
     $count = mysql_num_rows($results);
     if($count=1){
        $_SESSION['username'] =$username;
     }else{
        $fmsg = "Ongeldig gebruikers/wachtwoord"
       }
}
    if (isset($_SESSION['username'])){
        $smsg = "Al reeds ingelogd."
}
?>

    
<!DOCTYPE html> 
<html>
<head>
        <title>Login</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

       <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
    
        <link rel="stylesheet" type="text/css" href="styles.css">
</head>    
<body>
    <div class="container">
        <?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"><?php echo $smsg; ?></div>} <?php } ?>
        <?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"><?php echo $fmsg; ?></div>} <?php } ?>
        <form class="form-signing" method="POST">
        <h2 class="form-signin-heading">Login</h2>
        <div class="input-group">
    <span class="input-group-addon"         id="basic-addon1">@</span>
        <input type="text"     name="username" class="form-control" placeholder="Gebruikersnaam" required>
    </div>    
        
        <label for="inputPassword" class="sr-only">Wachtwoord</label>
        <input type="password" name="password" id="inputPasword" class="form-control" placeholder="Wachtwoord vereist">
        <button class="btn btn-lg btn-primary btn-block" type="submit">login</button>
        <a class="btn btn-lg btn-primary btn-block" href="register.php">Registeer</a>
    </form>
    </div>
</body>
</html>