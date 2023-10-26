<?php
// Define the function that will be exposed as a web service
function add_note($id, $title, $description, $user) {
    // Connect to the SQL database
    $conn = mysqli_connect("localhost", "root", "", "api");

    // Check for errors
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare the SQL statement
    $stmt = $conn->prepare("INSERT INTO notes (id, title, description, user) VALUES (?, ?, ?, ?)");

    // Bind the parameters to the statement
    $stmt->bind_param("ssss", $id, $title, $description, $user);

    // Execute the statement
    if ($stmt->execute() === TRUE) {
        echo "Note added successfully";
    } else {
        echo "Error adding note: " . $conn->error;
    }

    // Close the connection
    $conn->close();
}

$server = new SoapServer("ai_soap.wsdl");
//$server->setClass('NoteService');
$server->handle();
?>