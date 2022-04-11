<?php 

namespace App\Controllers;



use App\Controllers\BaseController;
use App\Models\Plugin_model;
use App\Models\Enquiry_model;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use \Firebase\JWT\JWT;
use App\Models\DBAccessModel;


class ClientsController extends BaseController
{ 
    use ResponseTrait;
    protected $request;
    protected $db_access;
    public function __construct(){
        $this->model = new Enquiry_model();
        $this->db_access = new DBAccessModel();
        $this->session = session();
        helper("general");
        $this->request = service('request');
         
    }

    public function index(){       
        
        $data['title'] ="Abc";
        if($this->session->has('login_user')){
            $user_data = $this->session->get('login_user');
        }
        $data['color'] =  getThemeColor($user_data["user_id"]); 
        $data['data'] = $this->model->get_allEnquiry();
        
        return view('clients/index', $data);
    }

    public function getclients(){
        
        $data['data'] = $this->model->get_allEnquiry();

        // $key = getenv('JWT_SECRET_KEY');
        // $iat = time(); // current timestamp value
        // $exp = $iat + getenv('JWT_TIME_TO_LIVE');
        
        // $payload = array(
        //     "status" => true,
        //     "aud" => "Audience that the JWT",
        //     "access" => "Access allow",
        //     "iat" => $iat, 
        //     "exp" => $exp, 
        // );

        // $token = JWT::encode($payload, $key,'HS256');
        // $data['token'] = $token;

        echo json_encode($data);
    }

    public function getanthorclients(){
        $data = $this->model->get_allEnquiry();
        $response = [
            'status'   => true,
            'error'    => false,
            'data' => $data
        ];
        return $this->respond($response,200);
    }

    public function insert_anther_client(){
        
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'email'   => ['label' => 'email', 'rules' => 'required'],
            'phone'   => ['label' => 'phone', 'rules' => 'required|min_length[10]'],
            'source'  => ['label' => 'source', 'rules' => 'required'],
            'message' => ['label' => 'message', 'rules' => 'required'],
        ]);

        if($validation->withRequest($this->request)->run()){
            $data = [
                'email'   => $this->request->getPost('email'),
                'phone'   => $this->request->getPost('phone'),
                'source'  => $this->request->getPost('source'),
                'message' => $this->request->getPost('message'),
                'status'  => '1',
            ];
            $this->model->insert($data);
            $response = [
                'status'   => true,
                'error'    => false,
                'message'  => 'Record inserted successfully.'
            ];
            return $this->respond($response,200);

        }else{
            $response = $validation->getErrors();
            return $this->fail($response,400);
        }
    }

    public function update_anther_client($id = null){
        if(!empty($id)){
            $validation =  \Config\Services::validation();
            $validation->setRules([
                'email'   => ['label' => 'email', 'rules' => 'required'],
                'phone'   => ['label' => 'phone', 'rules' => 'required|min_length[10]'],
                'source'  => ['label' => 'source', 'rules' => 'required'],
                'message' => ['label' => 'message', 'rules' => 'required'],
            ]);
            
            if($validation->withRequest($this->request)->run()){
                $find = $this->model->find($id);
                if($find){
                    $data = [
                        'email'   => $this->request->getPost('email'),
                        'phone'   => $this->request->getPost('phone'),
                        'source'  => $this->request->getPost('source'),
                        'message' => $this->request->getPost('message'),
                        'status'  => '1',
                    ];
                    $this->model->update($id, $data);
                    $response = [
                        'status'   => true,
                        'error'    => false,
                        'message'  => 'Record updated successfully.'
                    ];
                    return $this->respond($response,200);
                }else{
                    $response = "No record found.";
                    return $this->fail($response,400);
                }

            }else{
                $response = $validation->getErrors();
                return $this->fail($response,400);
            }
        }else{
            $response = 'Update id not found.';
            return $this->fail($response,400);
        }  
    }



}
