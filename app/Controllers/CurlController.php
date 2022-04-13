<?php

namespace App\Controllers;

class CurlController extends Security_Controller
{
    public function __construct() {
        parent::__construct();
    }
    
    public function getAllPartners(){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,'https://partners.thewingshield.com/partners/all');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        //curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Length: ' . strlen($fields)));
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'email: validate@gmail.com',
            'password: $2y$10$m5.B8neWkBHYk3o2dMcpNe1c8RLcPIxvCw1zdwjrCOEDuZbKe7viG'
        ));
        $response = curl_exec($ch);
        curl_close($ch); // Close the connection
        echo $response;
        exit;
    }

    public function changePartnerStatus($id=null){
        if(!empty($id)){
            $post = [
                'id' => $id
            ];            
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL,'https://partners.thewingshield.com/partners/change-status');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'email: validate@gmail.com',
                'password: $2y$10$m5.B8neWkBHYk3o2dMcpNe1c8RLcPIxvCw1zdwjrCOEDuZbKe7viG'
            ));
            
            $response = curl_exec($ch);
            curl_close($ch); // Close the connection
            echo $response;
            exit;
        }
    }

    public function addPartner(){
        echo "<pre>";
        print_r($_POST);
        exit;
    }
}
