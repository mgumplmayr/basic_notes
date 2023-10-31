<!DOCTYPE html>
<html>
    
<body>
    <?php
    $soap = new SoapClient("notes.wsdl",  array( 
        "location" => "http://localhost/soap/soapserver.php",
        "uri" => "http://localhost/soap/notes",
        "soap_version" => SOAP_1_1,
        "trace" => 1
       ) );

    if (isset($_POST["add_note_soap"])) {
        $user = $_POST["user_add"];
        $title = $_POST["title"];
        $content = $_POST["content"];
        $result = $soap->add_note($title, $content, $user);
        
        if (is_soap_fault($result)) {
            print(" Error: $result->faultcode | Error string: 
         $result->faultstring");
        } else {
            print "$result<br>";
        }
    } else {
        echo "Note addition failed!";
    }

    ?>
</body>

</html>