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
        //$data  = $_POST;
        $ch = curl_init();
        // $image = [
        //     'companyLogo' => new \CurlFile($_FILES['companyLogo']['tmp_name'], $_FILES['companyLogo']['type'], $_FILES['companyLogo']['name'])
        // ];
        // if(isset($_FILES['companyLogo']['tmp_name'])){
        //     $cfile = new \CurlFile($_FILES['companyLogo']['tmp_name'], $_FILES['companyLogo']['type'], $_FILES['companyLogo']['name']);
        // }
        // echo "<pre>";
        // print_r($data);
        // echo "<pre>";
        // print_r($cfile);
        // exit;
        $cfile = new \CURLFile(
            $_FILES['companyLogo']['tmp_name'],
            $_FILES['companyLogo']['type'],
            $_FILES['companyLogo']['name']
        );
     
        $data = array( "name"=> $_REQUEST['name'], 
                        "email"=> $_REQUEST['email'], 
                        "phone"=> $_REQUEST['phone'], 
                        "password"=> $_REQUEST['password'], 
                        "confirmPassword"=> $_REQUEST['confirmPassword'], 
                        "companyName"=> $_REQUEST['companyName'], 
                        "companyProfile"=> $_REQUEST['companyProfile'], 
                        "companyAddress"=> $_REQUEST['companyAddress'], 
                        "companyPhone"=> $_REQUEST['companyPhone'], 
                        "websiteUrl"=> $_REQUEST['websiteUrl'], 
                        "facebookLink"=> $_REQUEST['facebookLink'], 
                        "twitterLink"=> $_REQUEST['twitterLink'], 
                        "googleplus"=> $_REQUEST['googleplus'], 
                        "linkedIn"=> $_REQUEST['linkedIn'], 
                        //"linkedIn"=> $_REQUEST['linkedIn']);
                        "companyLogo"=> $cfile );
       


        // //$final_data = array_merge($data, $image);
        // $final = json_encode($final_data);

        curl_setopt($ch, CURLOPT_URL,'https://partners.thewingshield.com/partners/add-partner');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'email: validate@gmail.com',
            'password: $2y$10$m5.B8neWkBHYk3o2dMcpNe1c8RLcPIxvCw1zdwjrCOEDuZbKe7viG'
        ));
        
        $response = curl_exec($ch);
        curl_close($ch); // Close the connection
        echo $response;
        exit;
    }

    public function deletePartner($id= null){
        if(!empty($id)){
            $post = [
                'id' => $id
            ];
                
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL,'https://partners.thewingshield.com/partners/delete');
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


    //Clients Details
    public function getAllClients(){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,'https://plugins.thewingshield.com/clients/all');
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

    public function changeClientStatus($id=null){
        if(!empty($id)){
            $post = [
                'id' => $id
            ];            
            
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL,'https://plugins.thewingshield.com/clients/change-status');
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

    public function deleteClient($id= null){
        if(!empty($id)){
            $post = [
                'id' => $id
            ];
            
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL,'https://plugins.thewingshield.com/clients/delete');
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

    public function addClient(){
        $ch = curl_init();
        $cfile = new \CURLFile(
            $_FILES['companyLogo']['tmp_name'],
            $_FILES['companyLogo']['type'],
            $_FILES['companyLogo']['name']
        );
        $data = array( "name"=> $_REQUEST['name'], 
                        "email"=> $_REQUEST['email'], 
                        "phone"=> $_REQUEST['phone'], 
                        "password"=> $_REQUEST['password'], 
                        "confirmPassword"=> $_REQUEST['confirmPassword'], 
                        "companyName"=> $_REQUEST['companyName'], 
                        "companyProfile"=> $_REQUEST['companyProfile'], 
                        "companyAddress"=> $_REQUEST['companyAddress'], 
                        "companyPhone"=> $_REQUEST['companyPhone'], 
                        "websiteUrl"=> $_REQUEST['websiteUrl'], 
                        "facebookLink"=> $_REQUEST['facebookLink'], 
                        "twitterLink"=> $_REQUEST['twitterLink'], 
                        "googleplus"=> $_REQUEST['googleplus'], 
                        "linkedIn"=> $_REQUEST['linkedIn'], 
                        "partner_name"=> $_REQUEST['partner_name'], 

                        //"linkedIn"=> $_REQUEST['linkedIn']);
                        "companyLogo"=> $cfile );
        curl_setopt($ch, CURLOPT_URL,'https://plugins.thewingshield.com/clients/add-client');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

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
