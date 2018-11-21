<?php
    include_once("db.php");
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Blog</title>
</head>


    <script>
        function login() {
            location.href = "login.php";
        }
        function logout() {
            location.href = "logout.php";
        }
    </script>
   
   
<body>
    <div id=makeup>
        <?php if(isset($_SESSION['username'])) { ?>
            <input type="button" value="logout" onclick="logout();">
            <?php echo $_SESSION['username']; ?>
        <?php 
            //true al ingelogd
            } else{
        ?>
            <input type="button" value="login" onclick="login();">
        <?php } ?>

            <span class="input-group-addon" id="basic-addon1"></span>
            <input type="button" value="Registeer" onclick="location.href='register.php';">
            <input type="button" value="Nieuwe bericht" onclick="location.href='post.php';">
         
        <?php
            require_once("nbbc.php");
            $bbcode = new BBCode;
            $sql = "SELECT * FROM post ORDER BY id DESC";
            $res = mysqli_query($db, $sql) or die(mysqli_error($db));
            $post ="";
        
           
            if (isset($_SESSION['username']) && !empty($_SESSION['username'])) {
                //true al ingelogd
                if(mysqli_num_rows($res) >0) {
                    while($row = mysqli_fetch_assoc($res)) {
                        $id = $row['id'];
                        $title = $row['title'];
                        $content = $row['content'];
                        $date = $row['date'];
                        $admin = "<div><a href='del_post.php?pid=$id'>Delete</a>&nbsp;<a href='edit_post.php?pid=$id'>Edit</a>&nbsp;<a href='post.php?pid=$id'>New</a></div>";
                        $output = $bbcode->Parse($content);
                        $post .="<div><h2><a href='view_post/php?pid=$id'>$title</a></h2><h3>$date</h3><p>$output</p>$admin</div>";
                        echo $post;
                        }
                    } else {
                        echo "er is geen resultaat";
                    }
            } else if(mysqli_num_rows($res) >0) {
               while($row = mysqli_fetch_assoc($res)) {
                   $id = $row['id'];
                   $title = $row['title'];
                   $content = $row['content'];
                   $date = $row['date'];
                   //$admin = "<div><a href='del_post.php?pid=$id'>Delete</a>&nbsp;<a href='edit_post.php?pid=$id'>Edit</a>&nbsp;<a href='post.php?pid=$id'>New</a></div>";
                   $output = $bbcode->Parse($content);
                   $post .="<div><h2><a href='view_post/php?pid=$id'>$title</a></h2><h3>$date</h3><p>$output</p>$admin</div>";
                   echo $post;
                } 
            }
        ?>
    </div>
</body>  
</html>