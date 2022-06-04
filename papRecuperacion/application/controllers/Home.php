<?php
class Home extends CI_Controller {
    public function index() {
        error_reporting(0);
        
        $this->load->model('Home_model');
        
        if ($this->Home_model->empty()) {
            $this->Home_model->init();
            infoMsg('BBDD inicializada');
        }
        else {
            frame($this,'home/index');
        }
    }
    
}