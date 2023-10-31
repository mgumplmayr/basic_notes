<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <link rel="stylesheet" href="/global.css">
</head>
<body>
    <?php
        if(isset($_POST["add_note"])){
            $user = $_POST["user_add"];
            $title = $_POST["title"];
            $content = $_POST["content"];
            $con = mysqli_connect("localhost", "root", "", "api");
            if($con && $user != "" && $title != "" && $content != ""){
                $sql = "insert into notes (user, title, content) values ('$user', '$title', '$content')";
                $result = mysqli_query($con, $sql);
                if($result){
                    echo "Note added successfully!";
                } else {
                    echo "Note addition failed!";
                }
            } else {
                echo "Database connection failed!";
            }
        }
    ?>
</body>
</html>
