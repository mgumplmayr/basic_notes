<!DOCTYPE html>
<html>
<style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #74b886;
        }

        nav {
            background-color: #333;
            padding: 10px;
            display: flex;
            justify-content: space-around;
        }

        nav a {
            color: #fff;
            text-decoration: none;
            padding: 5px 10px;
        }

        h1 {
            color: #333;
        }

        form {
            margin-bottom: 20px;
        }

        form p {
            margin: 10px 0;
        }

        input[type="text"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #555;
        }
    </style>
<body>
    <?php
            $user = $_GET["user_show"];
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
                }
            }
    ?>
    <h1>Notes from: <?php echo $user?></h1>
    <?php
    if($result) {
        echo json_encode($response, JSON_UNESCAPED_UNICODE);
    } 
    else {
        echo "Database connection failed!";
    }
    ?>
</body>
</html>
