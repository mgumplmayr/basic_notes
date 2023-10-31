<?php
// Define the function that will be exposed as a web service
function add_note($title, $description, $user) {
    // Connect to the SQL database
    $conn = mysqli_connect("localhost", "root", "", "api");

    // Check for errors
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare the SQL statement
    $stmt = $conn->prepare("INSERT INTO notes (title, description, user) VALUES (?, ?, ?)");

    // Bind the parameters to the statement
    $stmt->bind_param("sss", $title, $description, $user);

    // Execute the statement
    if ($stmt->execute() === TRUE) {
        echo "Note added successfully";
    } else {
        echo "Error adding note: " . $conn->error;
    }

    // Close the connection
    $conn->close();
}

$server = new SoapServer("notes.wsdl", array( 
    'uri'=>"http://localhost/soap/notes",
    'encoding'=>'UTF-8', 
    'soap_version'=>SOAP_1_2
   ) );
//$server->setClass('NoteService');
$server->addFunction("add_note");
$server->handle();
?>