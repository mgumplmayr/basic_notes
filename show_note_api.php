<?php
    $user = $_GET["username"];
    $con = mysqli_connect("localhost", "root", "", "api");
    if($con) {
        $sql = "select * from notes where user = '$user'";
        $result = mysqli_query($con, $sql);
        if($result){
            $x = 0;
            while ($row = mysqli_fetch_assoc($result)){
                $response [$x]["id"] = $row["id"];
                $response [$x]["title"] = $row["title"];
                $response [$x]["content"] = $row["content"];
                $response [$x]["user"] = $row["user"];
                $x++;
            }
            echo json_encode($response, JSON_UNESCAPED_UNICODE);
        }
        else {
            echo "Database connection failed!";
        }
    }
?>