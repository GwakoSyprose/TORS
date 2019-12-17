<?php 

//sendSms("254706960287", "Hi");
// date_timezone_set("Africa/Nairobi")
    
    function sendSms($phoneno, $message){
        include 'connection.php';
        $url = 'https://quicksms.advantasms.com/api/services/sendsms/';
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json')); //setting custom header


        $curl_post_data = array(
            //Fill in the request parameters with valid values
            'partnerID' => '356',
            'apikey' => '9099cd8fbf6411ee3a46ef02aca6ead0',
            'mobile' => $phoneno,
            'message' => $message,
            'shortcode' => 'INFOTEXT',
            'pass_type' => 'plain', //bm5 {base64 encode} or plain
        );

        $data_string = json_encode($curl_post_data);

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);

        $curl_response = curl_exec($curl);         
        
        //
        $timeSent = date('Y-m-d H:i:sa');

        $sql = "INSERT INTO sms (`phone`, `message`, `timeSent`)
                VALUES ('$phoneno', '$message', '$timeSent');";

       
    }
?>
