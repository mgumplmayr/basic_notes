<?php
echo "Hello World client";
// model
class Book
{
	public $name;
	public $year;
}

// create instance and set a book name
$book =new Book();
$book->name='test 2';

$client=new SoapClient('test.wsdl', array('classmap' => $soap_class_map, 'cache_wsdl' => WSDL_CACHE_NONE));

var_dump($client);

var_dump($client->__getFunctions());

$resp  =$client->bookYear($book);
echo "Book year: $resp\n";
?>

