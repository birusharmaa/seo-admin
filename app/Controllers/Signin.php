<?php

namespace App\Controllers;
use App\Libraries\Session_check;
use App\Models\Users_model;

class Signin extends AppController
{

    private $signin_validation_errors;

    function __construct(){
        $this->user_model = new Users_model();
        $this->session_check = new Session_check();

        parent::__construct();
        $this->signin_validation_errors = array();
    }

    function index()
    {        
        
        if ($this->user_model->login_user_id()) {
            app_redirect('dashboard');
        } else {
            $view_data["redirect"] = "";
            if (isset($_REQUEST["redirect"])) {
                $view_data["redirect"] = $_REQUEST["redirect"];
            }
            return view('login');
        }
    }

    private function has_recaptcha_error()
    {
        $recaptcha_post_data = $this->request->getPost("g-recaptcha-response");
        $response = $this->is_valid_recaptcha($recaptcha_post_data);
        if ($response === true) {
            return true;
        } else {
            array_push($this->signin_validation_errors, app_lang("re_captcha_error-" . $response));
            return false;
        }
    }

    private function is_valid_recaptcha($recaptcha_post_data)
    {
        //load recaptcha lib
        require_once(APPPATH . "ThirdParty/recaptcha/autoload.php");
        $recaptcha = new \ReCaptcha\ReCaptcha(get_setting("re_captcha_secret_key"));
        $resp = $recaptcha->verify($recaptcha_post_data, $_SERVER['REMOTE_ADDR']);

        if ($resp->isSuccess()) {
            return true;
        } else {

            $error = "";
            foreach ($resp->getErrorCodes() as $code) {
                $error = $code;
            }

            return $error;
        }
    }

    // check authentication
    function authenticate()
    {
        
        $validation = $this->validate_submitted_data(array(
            "email" => "required|valid_email",
            "password" => "required"
        ), true);
        
       
        $email = $this->request->getPost("email");
        $password = $this->request->getPost("password");

        if (!$email) {
            //loaded the page directly
            app_redirect('signin');
        }
       
        if (is_array($validation)) {
            //has validation errors
            $this->signin_validation_errors = $validation;
        }
     
        //check if there reCaptcha is enabled
        //if reCaptcha is enabled, check the validation
        if (get_setting("re_captcha_secret_key")) {
            //in this function, if any error found in recaptcha, that will be added
            $this->has_recaptcha_error();
        }
        
        //don't check password if there is any error
        if ($this->signin_validation_errors) {
            $this->session->setFlashdata("signin_validation_errors", $this->signin_validation_errors);
        }

        if($this->user_model->authenticate($email, $password)==="notEmail") {
            $this->session->setFlashdata("login_error",'Email id is not registered. Please register!');           
            echo json_encode(['message'=>'Email id is not registered. Please register!','status'=>false, 'email'=> true]);
            exit;
        }
        
        if (!$this->user_model->authenticate($email, $password)) {
            //authentication failed
            // array_push($this->signin_validation_errors, app_lang("authentication_failed"));
            // $this->session->setFlashdata("signin_validation_errors", $this->signin_validation_errors);
            $this->session->setFlashdata("login_error",'Wrong password!');           
            echo json_encode(['message'=>'Wrong password!','status'=>false, 'password'=> true]);
        }else{
             //authentication success
            echo json_encode(['path'=>'/dashboard','status'=>true,'message'=>'Login Successfully.']);
        }     
       
    }

    public function sign_out(){
        $session = session();
        $session->destroy();
        return redirect()->to(base_url());
    }

    //send an email to users mail with reset password OTP
    function send_reset_password_mail()
    {
        $this->validate_submitted_data(array(
            "email" => "required|valid_email"
        ));

        $email = $this->request->getPost("email");
        $saved_id =  isset($_POST['saved_id']) ? $this->request->getPost("saved_id") : false;


        $existing_user = $this->user_model->is_email_exists($email);

        //send reset password email if found account with this email
        if ($existing_user) {
            $email_template = $this->Email_templates_model->get_final_template("reset_password");
            $parser_data["ACCOUNT_HOLDER_NAME"] = $existing_user->user_first_name . " " . $existing_user->user_last_name;
            $parser_data["SIGNATURE"] = $email_template->signature;
            $parser_data["LOGO_URL"] = get_logo_url();
            $parser_data["SITE_URL"] = get_uri();

            $verification_data = array(
                "type" => "reset_password",
                "code" => make_random_string(),
                "otp" => make_random_otp(),
                "params" => serialize(array(
                    "email" => $existing_user->user_email,
                    "expire_time" => time() + (24 * 60 * 60)
                ))
            );
            if ($saved_id != false) {
                $this->Verification_model->delete_permanently($saved_id);
            }

            $save_id = $this->Verification_model->ci_save($verification_data);

            $verification_info = $this->Verification_model->get_one($save_id);

            // $parser_data['RESET_PASSWORD_URL'] = get_uri("signin/new_password/" . $verification_info->code);
            $parser_data['OTP'] = $verification_info->otp;

            $message = $this->parser->setData($parser_data)->renderString($email_template->message);

            if (send_app_mail($email, $email_template->subject, $message)) {

                echo json_encode(array('success' => true, 'message' => app_lang("reset_info_send"), 'saved_id' => $save_id));
            } else {
                echo json_encode(array('success' => false, 'message' => app_lang('error_occurred')));
            }
        } else {
            echo json_encode(array("success" => false, 'message' => app_lang("no_acount_found_with_this_email")));
            return false;
        }
    }

    //send an OTP to users mobile with reset password OTP 
    function send_reset_password_mobile_otp()
    {
        $user_data =  $this->user_model->getUserInfo($_POST['email']);
        $existing_user = "";
        if(!empty($user_data)){
            $mobile = $user_data->user_phone; 
            $existing_user = $this->user_model->is_mobile_exists($mobile);
        }
              
        
        // $saved_id =  isset($_POST['saved_id']) ? $this->request->getPost("saved_id") : false;
        // if ($saved_id != false) {
        //     $this->Verification_model->delete_permanently($saved_id);
        // }

       
        //send reset password email if found account with this email
        if ($existing_user) {       
            $verification_data = array(
                "type" => "reset_password",
                "code" => make_random_string(),
                "otp" => make_random_otp(),
                "params" => serialize(array(
                    "email" => $existing_user->user_email,
                    "expire_time" => time() + (24 * 60 * 60)
                ))
            );
            $save_id = $this->Verification_model->ci_save($verification_data);           
            $verification_info = $this->Verification_model->get_one($save_id);
            $fields = array(
                "variables_values" => $verification_info->otp,
                "route" => "otp",
                "numbers" => "$mobile",
            );
            
            $res =  sendOtpOnMobile($fields);
            $res = json_decode($res);
            $mob = $existing_user->user_phone;
            $final_mobile = substr($mob, -4);
            $final_mobile = "******".$final_mobile;

            $res->saved_id = $save_id;
            $res->id = $existing_user->id;
            $res->status = true;
            $res->mobile = $final_mobile;
            echo json_encode($res);
        } else {
            echo json_encode(array("status" => false, 'message' => 'Email id is not registered!'));
        }
    }


    public function validateOtp()
    {   
       
        $this->validate_submitted_data(array(
            "otp" => "required|min_length[6]|max_length[6]"
        ));

        $otp = $this->request->getPost("otp");   
        
        $email = $this->is_valid_reset_password_otp($otp);
        if ($email) {
            echo json_encode(array('success' => true, 'message' => "otp_verified", 'data' => $email));
        } else {
            echo json_encode(array('success' => false, 'message' => 'Please enter valid OTP.'));
        }
    }

    //when user clicks to reset password link from his/her email, redirect to this url
    function new_password($key)
    {
        $valid_key = $this->is_valid_reset_password_key($key);

        if ($valid_key) {
            $email = get_array_value($valid_key, "email");

            if ($this->user_model->is_email_exists($email)) {
                $view_data["key"] = clean_data($key);
                $view_data["form_type"] = "new_password";
                return $this->template->view('signin/index', $view_data);
                return false;
            }
        }

        //else show error
        $view_data["heading"] = "Invalid Request";
        $view_data["message"] = "The key has expaired or something went wrong!";
        return $this->template->view("errors/html/error_general", $view_data);
    }

    //finally reset the old password and save the new password
    function do_reset_password()
    {       

        $this->validate_submitted_data(array(           
            "password" => "required",
            "confirmPassword" => "required|matches[password]"
        ));

        $key = $this->request->getPost("user_email");
        $oldOtp = $this->request->getPost("oldOtp");
        $password = $this->request->getPost("password");        
        $valid_key = $this->is_valid_reset_password_email($oldOtp);    
        
        if ($valid_key) {
            $email = get_array_value($valid_key, "email");
            $user = $this->user_model->is_email_exists($email);
            $encrypt_password = password_hash($password, PASSWORD_DEFAULT);
            $user_data = array("user_password" => $encrypt_password);

            if ($user->id && $this->user_model->updatePassword($user_data, $user->id)) {
                //user can't reset password two times with the same code
                $options = array("email" => $key, "type" => "reset_password");
                $verification_info = $this->Verification_model->get_details($options)->getRow();
                if ($verification_info->id) {
                    $this->Verification_model->delete_permanently($verification_info->id);
                }

                echo json_encode(array("success" => true, 'message' => app_lang("password_reset_successfully") . " " . anchor("signin", app_lang("signin"))));
                return true;
            }
        }
        echo json_encode(array("success" => false, 'message' => app_lang("error_occurred")));
    }

    //check valid key
    private function is_valid_reset_password_key($verification_code = "")
    {

        if ($verification_code) {
            $options = array("code" => $verification_code, "type" => "reset_password");
            $verification_info = $this->Verification_model->get_details($options)->getRow();

            if ($verification_info && $verification_info->id) {
                $reset_password_info = unserialize($verification_info->params);

                $email = get_array_value($reset_password_info, "email");
                $expire_time = get_array_value($reset_password_info, "expire_time");

                if ($email && filter_var($email, FILTER_VALIDATE_EMAIL) && $expire_time && $expire_time > time()) {
                    return array("email" => $email);
                }
            }
        }
    }

    //check valid key
    private function is_valid_reset_password_email($verification_code = "")
    {   
        if ($verification_code) {
            
            $options = array("otp" => $verification_code, "type" => "reset_password");
            $verification_info = $this->Verification_model->get_details($options)->getRow();
          
            if ($verification_info && $verification_info->id) {
                $reset_password_info = unserialize($verification_info->params);

                $email = get_array_value($reset_password_info, "email");
                $expire_time = get_array_value($reset_password_info, "expire_time");

                if ($email && filter_var($email, FILTER_VALIDATE_EMAIL) && $expire_time && $expire_time > time()) {
                    return array("email" => $email);
                }
            }
        }
    }

    //check valid key
    private function is_valid_reset_password_otp($verification_code = ""){
        if ($verification_code) {
            // echo $verification_code;
            // exit;
            $options = array("otp" => $verification_code, "type" => "reset_password");
            $verification_info = $this->Verification_model->get_details($options)->getRow();
            
            if ($verification_info && $verification_info->id) {
                $reset_password_info = unserialize($verification_info->params);

                $email = get_array_value($reset_password_info, "email");
                $expire_time = get_array_value($reset_password_info, "expire_time");

                if ($email && filter_var($email, FILTER_VALIDATE_EMAIL) && $expire_time && $expire_time > time()) {
                    
                    return array("email" => $email);
                }
            }
        }
    }
    
}
