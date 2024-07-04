<?php 
 
// Product Details 
$itemNumber = "DP12345"; 
$itemName = "Demo Product"; 
$itemPrice = 75;  
$currency = "USD"; 
 
/* PayPal REST API configuration 
 * You can generate API credentials from the PayPal developer panel. 
 * See your keys here: https://developer.paypal.com/dashboard/ 
 */ 
define('PAYPAL_SANDBOX', TRUE); //TRUE=Sandbox | FALSE=Production 
define('PAYPAL_SANDBOX_CLIENT_ID', 'ATZR4z-TI3DwWabX_rrmixDwmTm0vUVAyffrCwg-9vdGIQg-fIQXN95u812DHbQPqbYrTMmZU6Z2HQUl'); 
define('PAYPAL_SANDBOX_CLIENT_SECRET', 'EFxd2VZmwUSS9S6mCbxx2p7V_FHYxmB3BifxmextJCiRYxD0-PwAnL16NX42Y_GTIWEwDWG9Lcw_5aY4'); 
define('PAYPAL_PROD_CLIENT_ID', 'Insert_Live_PayPal_Client_ID_Here'); 
define('PAYPAL_PROD_CLIENT_SECRET', 'Insert_Live_PayPal_Secret_Key_Here'); 
  
// Database configuration  
define('DB_HOST', 'localhost');  
define('DB_USERNAME', 'root');  
define('DB_PASSWORD', 'Chandupa@2022');  
define('DB_NAME', 'onlineshopping_db'); 
 
?>