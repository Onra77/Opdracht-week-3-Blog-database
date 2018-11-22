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
<body>
    <div id=makeup>
        <?php if(isset($_SESSION['username'])) { ?>
            <input type="button" value="Logout" onclick="logout();">
            <?php echo $_SESSION['username']; ?>
            <input type="button" value="Nieuwe bericht" onclick="location.href='post.php';">
        <?php 
            //true al ingelogd
            } else{
        ?>
            <input type="button" value="Login" onclick="login();">
            <input type="button" value="Registeer" onclick="location.href='register.php';">
        <?php } ?>
        
        <?php
            require_once("nbbc.php");
            $bbcode = new BBCode;
            $sql = "SELECT * FROM post ORDER BY id DESC";
            $res = mysqli_query($db, $sql) or die(mysqli_error($db));
            $post ="";
            // Geeft verschillende knoppen als je ingelog bent of niet.   
            if (isset($_SESSION['username']) && !empty($_SESSION['username'])) {
                //true al ingelogd
                if(mysqli_num_rows($res) >0) {
                    while($row = mysqli_fetch_assoc($res)) {
                        $id = $row['id'];
                        $title = $row['title'];
                        $content = $row['content'];
                        $author = $row['author'];
                        $date = $row['date'];
                        //$username = $row['username'];
                        $admin = "<div><a href='del_post.php?pid=$id'>Delete</a>&nbsp;<a href='edit_post.php?pid=$id'>Edit</a>&nbsp;<a href='post.php?pid=$id'>New</a></div>";
                        $output = $bbcode->Parse($content);
                        $post = "<div><h2><a href='view_post/php?pid=$id'>$title</a></h2><H2>$author</h2><h3>$date</h3><p>$output</p>$admin</div>";
                        echo $post;
                    }
            } else {    echo "er zijn geen berichten.";
                    }
                } else if(mysqli_num_rows($res) >0) {
                    while($row = mysqli_fetch_assoc($res)) {
                        $id = $row['id'];
                        $title = $row['title'];
                        $content = $row['content'];
                        $date = $row['date'];
                        $admin = 
                        $output = $bbcode->Parse($content);
                        $post = "<div><h2><a href='view_post/php?pid=$id'>$title</a></h2><h3>$date</h3><p>$output</div>";
                        echo $post;
                    } 
                }
        ?>
    </div>

    <script>
        function login() {
            location.href = "login.php";
        }
        function logout() {
            location.href = "logout.php";
        }
    </script>
</body>  
</html>