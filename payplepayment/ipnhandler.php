<?php

$req = 'cmd=' . urlencode('_notify-validate');
    foreach ($_POST as $key => $value) {
    $value = urlencode(stripslashes($value));
    $req .= "&$key=$value";
  }

    
//NEW CODE: using Curl instead of fsockopen
//https://www.sandbox.paypal.com/cgi-bin/webscr
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://www.sandbox.paypal.com/cgi-bin/webscr'); // if use paypal replace https://www.paypal.com/cgi-bin/webscr
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $req);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Host:www.sandbox.paypal.com')); // replace host name as www.paypal.com for paypal
$res = curl_exec($ch);

//assign posted variables to PHP variables

//Connect to MySQL database
$mysql_hostname = "localhost";
$mysql_user = "root";
$mysql_password = "";
$mysql_database = "records";

$bd = mysql_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Could not connect database");
mysql_select_db($mysql_database, $bd) or die("Could not select database");

//include "connect.php";
//Check if any error occured
if(curl_errno($ch))
{

//HTTP ERROR occurred
//Log error to database for troubleshooting
$log='http error='.curl_error($ch);
$log = mysql_real_escape_string($log);
mysql_query("INSERT INTO ipnlogs (eventlog) VALUES ('$log')");  // error verified
}
else {

//NO HTTP ERROR OCCURRED, CLEAN
//CHECK IF VERIFIED
if (strcmp ($res, "VERIFIED") == 0) {


$log='Verified IPN Transaction';
$log = mysql_real_escape_string($log);
mysql_query("INSERT INTO ipnlogs (eventlog) VALUES ('$log')");  // success verified 

//log success to database

$payment_status = $_POST['payment_status'];   // payment status
$payment_amount = $_POST['mc_gross'];   // payment amount 
$payment_currency = $_POST['mc_currency']; // payment currency type
$txn_id = $_POST['txn_id'];          // transaction id 
$receiver_email = $_POST['receiver_email'];  
$payer_email = $_POST['payer_email'];   //payer email id
$invoice = $_POST['invoice'];       // invoice number 
$register_email = $_POST['custom'];
$productname=$_POST['item_name'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$address_city = $_POST['address_city'];
$address_country = $_POST['address_country'];
$address_country_code = $_POST['address_country_code'];
$address_name = $_POST['address_name'];
$address_state = $_POST['address_state'];
$address_status = $_POST['address_status'];
$address_stree = $_POST['address_stree'];
$address_zip = $_POST['address_zip'];
$username=$_POST['payer_id'];
$server = $_SERVER['HTTP_HOST'];

//IPN transaction is VERIFIED
//check that txn_id has not been previously processed
//query the database
$txn_id = mysql_real_escape_string($txn_id);

//no records found, transaction ID is new
//proceed with the rest of validation
// check that receiver_email is your Primary PayPal email
//check if payment currency is USD
//check if the payment amount is correct
//retrieve the product price in the MySQL database for the purchased product 
//check if the payment_status is Completed


//Set download status to incomplete because the user still need to download bought material
$downloadstatus='incomplete';
$downloadstatus = mysql_real_escape_string($downloadstatus);

// Here GOES YOUR OWN CODE 
//Log validated IPN records to MySQL database
mysql_query("
INSERT INTO customerrecords (PaymentStatus,PaymentAmount,PaymentCurrency,PayerEmail,ReceiverEmail,TransactionID,ProductPurchased,IPAddress,DownloadStatus,username,package_access) VALUES ('Completed','$payment_amount','$payment_currency','$payer_email','$receiver_email','$txn_id','$productname','$username','$downloadstatus','$register_email','$id')")
or die(mysql_error("querry wrong"));
mysql_close($dbhandle);


$to      = $register_email;
$subject = 'Purchased Details';
$message = '
Thank you for purchasing the products

Here is your Product purchased details
-------------------------
Registered Email: '.$productname.'
Transaction Id : '.$txn_id.'
Pay Amount: '.$payment_amount.'

if you like our coding please subscribe
https://www.developerdesks.com/ ';
$headers = 'From:info@developerdesks.com' . "\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
 
mail($to, $subject, $message, $headers);

//close MySQL database connection
mysql_close($dbhandle);


}
else if (strcmp ($res, "INVALID") == 0) 
{

//Invalid IPN transaction
//You can alternatively log this transaction to your database for troubleshooting purposes
$log='Invalid IPN transaction';
$log = mysql_real_escape_string($log);
mysql_query("INSERT INTO ipnlogs (eventlog) VALUES ('$log')");
}
}

//close the connection
curl_close($ch);
?>