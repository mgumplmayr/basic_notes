<!DOCTYPE html>
<html>
<head>
    <title>Home (REST)</title>
    <link rel="stylesheet" href="/global.css">
</head>
<body>
<nav>
        <a href = "/basic/index.php">Home </a>
        <a href = "/rest/index.php">Home (REST)</a>
        <a href = "/soap/calculate.php">Calculator (SOAP)</a>
        <a href = "/soap/soapserver.php?wsdl">WSDL</a>
    </nav>
    <h1>Home (REST)</h1>
    <h2>Add a note:</h2>
    <form name = "add_notes" action = "add_note.php" method = "post">
        <p>Username: <input type = "text" name = "user_add" placeholder = "Username"></p>
        <p>Title: <input type = "text" name = "title" placeholder = "Title"></p>
        <p>Content: <input type = "text" name = "content" placeholder = "Content"></p>

        <p><input type = "submit" name = "add_note" value = "Add note"></p>
    </form>

    <h2>Show note from user:</h2>
    <form name = "show_note" action = "show_note.php" method = "get">
        <p>Username: <input type = "text" name = "user_show" placeholder = "Username"></p>

        <p><input type = "submit" name = "show_note" value = "Show notes"></p>
    </form>
    <h2>Show Content in Database</h2>
    <form name = "notes" action = "all_notes.php" method = "post">
        <p><input type = "submit" name = "all_notes" value = "Show all notes"></p>
    </form>
</body>
