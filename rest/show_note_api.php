<?php
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $user = $_GET["username"];
    $con = mysqli_connect("localhost", "root", "", "api");
    if($con) { //Response ausgeben
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
            if(isset($response)) {
                echo json_encode($response, JSON_UNESCAPED_UNICODE);}
            else {
                http_response_code(404);
            }
        }
        else {
            echo "Database connection failed!";
        }
    }
    }
    else {
        http_response_code(405); // Methode nicht erlaubt
    }
?>