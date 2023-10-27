<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home (REST)</title>
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
</head>
<body>
    <nav>
        <a href="/index.php">Home (REST)</a>
        <a href="/soap/index.php">Home (SOAP)</a>
        <a href="/soap/soapserver.php?wsdl">WSDL</a>
    </nav>

    <h1>Home (REST)</h1>

    <h1>Add a note:</h1>
    <form name="add_notes" action="add_note.php" method="post">
        <p>Username: <input type="text" name="user_add" placeholder="Username"></p>
        <p>Title: <input type="text" name="title" placeholder="Title"></p>
        <p>Content: <input type="text" name="content" placeholder="Content"></p>
        <p><input type="submit" name="add_note" value="Add note"></p>
    </form>

    <h1>Show note from user:</h1>
    <form name="show_note" action="show_note.php" method="get">
        <p>Username: <input type="text" name="user_show" placeholder="Username"></p>
        <p><input type="submit" name="show_note" value="Show notes"></p>
    </form>

    <h1>Database content:</h1>
    <?php
        $con = mysqli_connect("localhost", "root", "", "api");
        $response = array();
        if($con) {
            $sql = "select * from notes";
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
        } else {
            echo "Database connection failed!";
        }
    ?>
</body>
</html>
