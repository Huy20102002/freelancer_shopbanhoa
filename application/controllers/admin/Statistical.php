<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Statistical extends MY_Controller{
    public function __construct()
    {
        parent::__construct();

    }
    public function index(){
        $this->data['temp']='admin/Statistical/index.php';
		$this->load->view('admin/chart',$this->data);
    }
}