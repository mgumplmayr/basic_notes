<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <link rel="stylesheet" href="/global.css">
</head>
<nav>
        <a href = "/basic/index.php">Home </a>
        <a href = "/rest/index.php">Home (REST)</a>
        <a href = "/soap/calculate.php">Calculator (SOAP)</a>
        <a href = "/soap/soapserver.php?wsdl">WSDL</a>
    </nav>
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
        foreach ($response as $data) {
            echo "<h2>" . $data["title"] . "</h2>";
            echo "<p>Content: " . $data["content"] . "</p>";
            echo "<p>By: " . $data["user"] . "</p>";
            echo "<p> ID: " . $data["id"] . "</p>";
            echo "<hr>";
        }
    } 
    else {
        echo "Database connection failed!";
    }
    ?>
</body>
</html>
