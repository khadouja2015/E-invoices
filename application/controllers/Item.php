<?php
   
require APPPATH . 'libraries/REST_Controller.php';
     
class Item extends REST_Controller {
    
	  /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function __construct() {
       parent::__construct();
       $this->load->database();
    }
       
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
	public function mohamed_get()
	{//echo memory_get_usage();
        
            $data = $this->db->get("items")->result();
        
     
       $reponse = $this->response($data, REST_Controller::HTTP_OK);
    return ($reponse);
	}
      
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function safa_post()
    {file_get_contents("php://input");
        $input = $this->input->post('name');
        $data=array(
            'name'=>$input
        );
        $this->db->insert('items',$data);
     
        $this->response(['Item created successfully.'], REST_Controller::HTTP_OK);
    } 
     
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function index_put($id)
    {
        $input = $this->put();
        $this->db->update('items', $input, array('id'=>$id));
     
        $this->response(['Item updated successfully.'], REST_Controller::HTTP_OK);
    }
     
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function index_delete($id)
    {
        $this->db->delete('items', array('id'=>$id));
       
        $this->response(['Item deleted successfully.'], REST_Controller::HTTP_OK);
    }
    	
}