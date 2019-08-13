<?php

class LoginSeguro extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->helper(array('form', 'url'));


}

 public function index()
        {
                $this->load->view('loginSeguro/index');
        }

public function result()
        {
                $this->load->view('loginSeguro/result');
        }

}
?>