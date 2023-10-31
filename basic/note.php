<!DOCTYPE html>
<html>
<head>
    <title>Note</title>
    <link rel="stylesheet" href="/global.css">
</head>
<body>
<nav>
        <a href = "/basic/index.php">Home </a>
        <a href = "/rest/index.php">Home (REST)</a>
        <a href = "/soap/calculate.php">Calculator (SOAP)</a>
        <a href = "/soap/soapserver.php?wsdl">WSDL</a>
    </nav>
    <?php
        if(isset($_POST["note"])){
            $user = $_POST["user_add"];
            $title = $_POST["title"];
            $content = $_POST["content"];
        }
    ?>
    <h1>Note from <?php echo $user?></h1>
    <h2>Title: <?php echo $title?></h2>
    <p><?php echo nl2br($content)?></p>
</body>
</html>