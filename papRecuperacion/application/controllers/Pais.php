<?php

class Pais extends CI_Controller
{

    public function index() {
        $this->r();    
    }
    
    public function c()
    {
        error_reporting(0);
        frame($this, 'pais/c');
    }

    public function cPost()
    {
        error_reporting(0);
        $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;

        try {
            if ($nombre == null) {
                throw new Exception('El nombre del país no puede ser null');
            }
            $this->load->model('Pais_model');
            $this->Pais_model->create($nombre);
            redirect(base_url() . 'pais/r');
        } catch (Exception $e) {
            errorMsg($e->getMessage(), 'pais/c');
        }
    }

    public function r()
    {
        error_reporting(0);
        $this->load->model('Pais_model');
        $data['paises'] = $this->Pais_model->findAll();
        frame($this, 'pais/r', $data);
    }

    public function u() {
        error_reporting(0);
        $idPais = isset($_GET['idPais'])?$_GET['idPais']:null;
        $this->load->model('Pais_model');
        try {
            if ($idPais==null) {
                throw new Exception('El id del país a editar no puede ser nulo');
            }
            if (!$this->Pais_model->existeId($idPais)) {
                throw new Exception('El id del país a editar no existe');
            }
            $data['pais'] = $this->Pais_model->getPaisbyId($idPais);
            frame($this,'pais/u',$data);
        }
        catch (Exception $e) {
            errorMsg($e->getMessage(),'pais/r');
        }
    }

    public function uPost() {
        error_reporting(0);
        
        $idPais = isset($_POST['idPais'])?$_POST['idPais']:null;
        $nombre = isset($_POST['nombre'])?$_POST['nombre']:null;
     
        if ($idPais==null || $nombre==null ) {
            errorMsg("El id del país a editar o el nombre no pueden ser nulos");
        }
        
        $this->load->model('Pais_model');
        try {
            $this->Pais_model->update($idPais,$nombre);
            redirect(base_url().'pais/r');
        }
        catch (Exception $e){
            errorMsg($e->getMessage(),'pais/r');
        }
        
    }

    public function dPost() {
        error_reporting(0);
        $idPais = isset($_GET['idPais'])?$_GET['idPais']:null;
        if ($idPais==null ) {
            errorMsg('El id del país a borrar no puede ser nulo','pais/r');
        }
        $this->load->model('Pais_model');
        try {
            $this->Pais_model->delete($idPais);
            redirect(base_url().'pais/r');
        }
        catch (Exception $e) {
            errorMsg($e->getMessage(),'pais/r');
        }
    }
}
?>