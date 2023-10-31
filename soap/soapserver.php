<?php
// Define the function that will be exposed as a web service
    function add_note($title, $description, $user)
    {
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

    function get_note_by_user($user)
    {
        $conn = mysqli_connect("localhost", "root", "", "api");
        if ($conn) {
            $sql = "select * from notes where user = '$user'";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                $x = 0;
                while ($row = mysqli_fetch_assoc($result)) {
                    $response[$x]["id"] = $row["id"];
                    $response[$x]["title"] = $row["title"];
                    $response[$x]["content"] = $row["content"];
                    $response[$x]["user"] = $row["user"];
                    $x++;
                }
            }
        }
        if ($result) {
            echo json_encode($response, JSON_UNESCAPED_UNICODE);
        } else {
            echo "Database connection failed!";
        }
        // Close the connection
        $conn->close();
    }

$server = new SoapServer("notes.wsdl");
$server->addFunction("add_note");
$server->addFunction("get_note_by_user");
$server->handle();
