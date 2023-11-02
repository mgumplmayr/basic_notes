<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <link rel="stylesheet" href="/global.css">
</head>
<body>
    <nav>
        <a href = "/basic/index.php">Home </a>
        <a href = "/rest/index.php">Home (REST)</a>
        <a href = "/soap/calculate.php">Calculator (SOAP)</a>
        <a href = "/soap/soapserver.php?wsdl">WSDL</a>
    </nav>
    <h1>Home</h1>
    <h2>Add a note:</h2>
    <form name = "notes" action = "note.php" method = "post">
        <p>Username: <input type = "text" name = "user_add" placeholder = "Username"></p>
        <p>Title: <input type = "text" name = "title" placeholder = "Title"></p>
        <p>Content: <textarea type = "text" name = "content" placeholder = "Content"></textarea>

        <p><input type = "submit" name = "note" value = "Add note"></p>
    </form>
</body>
