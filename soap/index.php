<!DOCTYPE html>
<html>
<head>
    <title>Home (SOAP)</title>
    <link rel="stylesheet" href="/global.css">
</head>
<body>
<nav>
        <a href = "/basic/index.php">Home </a>
        <a href = "/rest/index.php">Home (REST)</a>
        <a href = "/soap/calculate.php">Calculator (SOAP)</a>
        <a href = "/soap/soapserver.php?wsdl">WSDL</a>
    </nav>
    <h1>Home (SOAP)</h1>
    <h1>Add a note:</h1>
    <form name = "add_notes_soap" action = "/soap/add_note_soap.php" method = "post">
        <p>Username: <input type = "text" name = "user_add" placeholder = "Username"></p>
        <p>Title: <input type = "text" name = "title" placeholder = "Title"></p>
        <p>Content: <input type = "text" name = "content" placeholder = "Content"></p>

        <p><input type = "submit" name = "add_note_soap" value = "Add note"></p>
    </form>

    <h1>Show note from usder:</h1>
    <form name = "show_note_soap" action = "get_note_soap.php" method = "get">
        <p>Username: <input type = "text" name = "user_show" placeholder = "Username"></p>

        <p><input type = "submit" name = "show_note_soap" value = "Show notes"></p>
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


