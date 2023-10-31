<!DOCTYPE html>
<html>
    
<body>
    <?php
    $client = new SoapClient("notes.wsdl");
    $functions = $client->__getFunctions();
    var_dump ($functions);

    if (isset($_POST["add_note_soap"])) {
        $user = $_POST["user_add"];
        $title = $_POST["title"];
        $content = $_POST["content"];
        $result = $client->add_note(array("user" => $user, "title" => $title, "description" => $content));
        
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