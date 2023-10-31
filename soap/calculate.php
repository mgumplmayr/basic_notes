<!DOCTYPE html>
<html>
<head>
    <title>Calculator</title>
    <link rel="stylesheet" href="/global.css">
</head>
<body>
    <nav>
        <a href = "/basic/index.php">Home </a>
        <a href = "/rest/index.php">Home (REST)</a>
        <a href = "/soap/calculate.php">Calculator (SOAP)</a>
        <a href = "/soap/soapserver.php?wsdl">WSDL</a>
    </nav>
    <h1>Calculator</h1>
    <form name="calculate" method="post" action="calculate.php">
        <p>Number 1: <input type="number" name="intA"></p>
        <p>Number 2: <input type="number" name="intB"></p>

        <p><input type="submit" name="calculate" value="Add"></p>
    </form>
    <?php
    if(isset($_POST['calculate']))
    {
        calculate();
    }
    function calculate()
    {
        // Set up the SOAP client
        $client = new SoapClient("http://www.dneonline.com/calculator.asmx?wsdl");
        //var_dump($client);

        //$functions = $client->__getFunctions();
        //var_dump ($functions);

        $intA = $_POST["intA"];
        $intB = $_POST["intB"];
        

        $result = $client->Add(array("intA" => $intA, "intB" => $intB));

        if (is_soap_fault($result)) {
            print(" Error: $result->faultcode | Error string: 
            $result->faultstring");
        } else {
            echo "<h2>Result: " . $result->AddResult;
            //echo $result->AddResult;
        }
    }

    ?>
</body>

</html>