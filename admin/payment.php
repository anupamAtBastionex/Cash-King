<?php
 require_once __DIR__ . '/config.php';

/*------------------------------- FloxyPay UPI Payment Gateway ----------------------------------------*/
    
  function upiPayment($dataArray = [])
  {
    // API endpoint URL
    $url = 'https://api.floxypay.com/v2/withdrawal/upi';
    // Request data

   // Headers
    $headers = array(
                      'x-key: ' . X_KEY,
                      'x-secret: ' . X_SECRET,
                      'Content-Type: application/json',
                    );
   // Request data
    $data = json_encode($dataArray);

    // Initialize cURL
    $curl = curl_init($url);

    // Set cURL options
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    // Execute the request
    $response = curl_exec($curl);

    //$httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    //var_dump($response . ' UPI Code: '.$httpCode);die;

    // Check for cURL errors
    if (curl_errno($curl)) {
        die('Curl failed: ' . curl_error($curl));
    } 
    else 
    {
    	$resp = json_decode($response, true);
        // Process the response
        $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        if ($httpCode == 200) {
          $resp = "SUCCESS";
        } else {
            // Payment failed
           $resp = "Payment failed! " . $resp['message'];
        }
    }
    // Close cURL
    curl_close($curl);
    return $resp;
  }

/*------------------------------- FloxyPay Bank Transer Gateway ----------------------------------------*/
    
  function bankTranser($dataArray = [])
  {
    // API endpoint URL
    $url = 'https://api.floxypay.com/v2/withdrawal/account';

   // Headers
    $headers = array(
                      'x-key: ' . X_KEY,
                      'x-secret: ' . X_SECRET,
                      'Content-Type: application/json',
                    );
   // Request data
    $data = json_encode($dataArray);
   
    //Initialize cURL
    $curl = curl_init($url);

    // Set cURL options
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    // Execute the request
    $response = curl_exec($curl);

    //$httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    //var_dump($response . ' Code: '.$httpCode);die;

    // Check for cURL errors
    if (curl_errno($curl)) {
        die('Curl failed: ' . curl_error($curl));
    } 
    else 
    {
    	$resp = json_decode($response, true);
        // Process the response
        $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        if ($httpCode == 200) {
          $resp = "SUCCESS";
        } else {
            // Payment failed
           $resp = "Payment failed! " . $resp['message'];
        }
    }
    // Close cURL
    curl_close($curl);
    return $resp;
  }
/*------------------------------- End Payment Gateway ----------------------------------------*/
















?>


