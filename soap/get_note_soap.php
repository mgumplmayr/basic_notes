<!DOCTYPE html>
<html>
<head>
    <title>Get Note SOAP</title>
    <link rel="stylesheet" href="/global.css">
</head>
<body>
    <?php
    // Set up the SOAP client
    $client = new SoapClient(null, array(
        'location' => "http://localhost:3000/soap/soapserver.php",
        'uri' => "http://localhost:3000/soap/soapserver.php",
        'trace' => 1
    ));
    var_dump($client);
    
    $functions = $client->__getFunctions();
    var_dump ($functions);

    // Call the SOAP function
    $result = $client->get_note_by_user("Max");
    var_dump($result);

    if (is_soap_fault($result)) {
        print(" Error: $result->faultcode | Error string: 
     $result->faultstring");
    } else {
        print "$result<br>";
    }
    ?>
</body>

</html>