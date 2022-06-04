<?php

class Aficion extends CI_Controller
{

    public function index() {
        $this->r();    
    }
    
    public function c()
    {
        error_reporting(0);
        frame($this, 'aficion/c');
    }

    public function cPost()
    {
        error_reporting(0);
        $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;

        try {
            if ($nombre == null) {
                throw new Exception('El nombre de la afición no puede ser null');
            }
            $this->load->model('Aficion_model');
            $this->Aficion_model->create($nombre);
            redirect(base_url() . 'aficion/r');
        } catch (Exception $e) {
            errorMsg($e->getMessage(), 'aficion/c');
        }
    }

    public function r()
    {
        error_reporting(0);
        $this->load->model('Aficion_model');
        $data['aficiones'] = $this->Aficion_model->findAll();
        frame($this, 'aficion/r', $data);
    }

    public function u() {
        error_reporting(0);
        $idAficion = isset($_GET['idAficion'])?$_GET['idAficion']:null;
        $this->load->model('Aficion_model');
        try {
            if ($idAficion==null) {
                throw new Exception('El id de la afición a editar no puede ser nulo');
            }
            if (!$this->Aficion_model->existeId($idAficion)) {
                throw new Exception('El id de la afición a editar no existe');
            }
            $data['aficion'] = $this->Aficion_model->getAficionById($idAficion);
            frame($this,'aficion/u',$data);
        }
        catch (Exception $e) {
            errorMsg($e->getMessage(),'aficion/r');
        }
    }

    public function uPost() {
        error_reporting(0);
        
        $idAficion = isset($_POST['idAficion'])?$_POST['idAficion']:null;
        $nombre = isset($_POST['nombre'])?$_POST['nombre']:null;
     
        if ($idAficion==null || $nombre==null ) {
            errorMsg("El id de la afición a editar o el nombre no pueden ser nulos");
        }
        
        $this->load->model('Aficion_model');
        try {
            $this->Aficion_model->update($idAficion,$nombre);
            redirect(base_url().'aficion/r');
        }
        catch (Exception $e){
            errorMsg($e->getMessage(),'aficion/r');
        }
        
    }

    public function dPost() {
        error_reporting(0);
        $idAficion = isset($_GET['idAficion'])?$_GET['idAficion']:null;
        if ($idAficion==null ) {
            errorMsg('El id de la afición a borrar no puede ser nulo','aficion/r');
        }
        $this->load->model('Aficion_model');
        try {
            $this->Aficion_model->delete($idAficion);
            redirect(base_url().'aficion/r');
        }
        catch (Exception $e) {
            errorMsg($e->getMessage(),'aficion/r');
        }
    }
}
?>