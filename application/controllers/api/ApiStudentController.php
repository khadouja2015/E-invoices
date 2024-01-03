<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

use chriskacerguis\RestServer\RestController;

class ApiStudentController extends REST_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('StudentModel');
    }

    public function indexStudent_get()
    {
        $item = new index;
        $item = $item->get_items();
        $this->response($item, 200);
    }

    public function storeStudent_post()
    {
        $students = new StudentModel;
        $data = [
            'name' =>  $this->input->post('name'),
            'class' => $this->input->post('class'),
            'email' => $this->input->post('email')
        ];
        $result = $students->get_id($data);
        if($result > 0)
        {
            $this->response([
                'status' => true,
                'message' => 'NEW STUDENT CREATED'
            ], REST_Controller::HTTP_OK); 
        }
        else
        {
            $this->response([
                'status' => false,
                'message' => 'FAILED TO CREATE NEW STUDENT'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function editStudent_get($id)
    {
        $students = new StudentModel;
        $students = $students->edit_description($id);
        $this->response($students, 200);
    }

    public function updateStudent_put($id)
    {
        $students = new StudentModel;
        $data = [
            'name' =>  $this->put('name'),
            'class' => $this->put('class'),
            'email' => $this->put('email')
        ];
        $result = $students->created_at($id, $data);
        if($result > 0)
        {
            $this->response([
                'status' => true,
                'message' => 'STUDENT UPDATED'
            ], REST_Controller::HTTP_OK); 
        }
        else
        {
            $this->response([
                'status' => false,
                'message' => 'FAILED TO UPDATE STUDENT'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    
}

?>