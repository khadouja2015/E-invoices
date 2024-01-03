<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class wael extends CI_Controller{
function safe (){
    $this->load->view('test.php');
}
function insertqrcode(){
    $this->load->helper('url','form','download');
    $this->load->database();
$this->load->model('meriem');
$data=$this->input->post('myAngularxQrCode2');
$this->meriem->insertqrcode($data);

}
} 