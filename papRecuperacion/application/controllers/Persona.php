<?php

class Persona extends CI_Controller
{

    public function index() {
        $this->r();    
    }
    
    public function c()
    {
        error_reporting(0);
        $this->load->model('Pais_model');
        $this->load->model('Aficion_model');
        $data['paises'] = $this->Pais_model->findAll();
        $data['aficiones'] = $this->Aficion_model->findAll();
        frame($this, 'persona/c', $data);
    }

    public function cPost()
    {
        error_reporting(0);
        $loginname = isset($_POST['loginname']) ? $_POST['loginname'] : null;
        $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : 'John';
        $apellido = isset($_POST['apellido']) ? $_POST['apellido'] : 'Doe';
        $idPaisNace= isset($_POST['idPaisNace']) ? $_POST['idPaisNace'] : null;
        $idPaisVive= isset($_POST['idPaisVive']) ? $_POST['idPaisVive'] : null;
        $idsAficionGusta = isset($_POST['idAficionGusta']) ? $_POST['idAficionGusta'] : [] ;
        $idsAficionOdia = isset($_POST['idAficionOdia']) ? $_POST['idAficionOdia'] : [] ;
        
        try {
            if ($loginname == null) {
                throw new Exception('El loginname no puede ser null');
            }
            $this->load->model('Persona_model');
            $this->Persona_model->create($loginname, $nombre, $apellido,$idPaisNace,$idPaisVive,$idsAficionGusta,$idsAficionOdia);
            redirect(base_url() . 'persona/r');
        } catch (Exception $e) {
            errorMsg($e->getMessage(), 'persona/c');
        }
    }

    public function r()
    {
        error_reporting(0);
        $this->load->model('Persona_model');
        $data['personas'] = $this->Persona_model->findAll();
        frame($this, 'persona/r', $data);
    }

    public function u() {
        error_reporting(0);
        $idPersona = isset($_GET['idPersona'])?$_GET['idPersona']:null;
        $this->load->model('Persona_model');
        $this->load->model('Pais_model');
        $this->load->model('Aficion_model');
        try {
            if ($idPersona==null) {
                throw new Exception('El id de la persona a editar no puede ser nulo');
            }
            if (!$this->Persona_model->existeId($idPersona)) {
                throw new Exception('El id de la persona a editar no existe');
            }
            $data['persona'] = $this->Persona_model->getPersonabyId($idPersona);
            $data['paises'] = $this->Pais_model->findAll();
            $data['aficiones'] = $this->Aficion_model->findAll();
            frame($this,'persona/u',$data);
        }
        catch (Exception $e) {
            errorMsg($e->getMessage(),'persona/r');
        }
    }

    public function uPost() {
        error_reporting(0);
        $idPersona = isset($_POST['idPersona'])?$_POST['idPersona']:null;
        $loginname = isset($_POST['loginname'])?$_POST['loginname']:null;
        $nombre = isset($_POST['nombre'])?$_POST['nombre']:null;
        $apellido = isset($_POST['apellido'])?$_POST['apellido']:null;
        $idPaisNace = isset($_POST['idPaisNace'])?$_POST['idPaisNace']:null;
        $idPaisVive = isset($_POST['idPaisVive'])?$_POST['idPaisVive']:null;
        $idsAficionGusta = isset($_POST['idsAficionGusta'])?$_POST['idsAficionGusta']:[];
        $idsAficionOdia = isset($_POST['idsAficionOdia'])?$_POST['idsAficionOdia']:[];
        
        $this->load->model('Persona_model');
        try {
            $this->Persona_model->update($idPersona,$loginname,$nombre,$apellido,$idPaisNace,$idPaisVive,$idsAficionGusta,$idsAficionOdia);
            redirect(base_url().'persona/r');
        }
        catch (Exception $e){
            errorMsg($e->getMessage(),'/persona/r');
        }
        
    }

    public function dPost() {
        error_reporting(0);
        $idPersona = isset($_GET['idPersona'])?$_GET['idPersona']:null;
        if ($idPersona==null ) {
            errorMsg('El id de la persona a borrar no puede ser nulo','persona/r');
        }
        $this->load->model('Persona_model');
        try {
            $this->Persona_model->delete($idPersona);
            redirect(base_url().'persona/r');
        }
        catch (Exception $e) {
            errorMsg($e->getMessage(),'persona/r');
        }
    }
}
?>