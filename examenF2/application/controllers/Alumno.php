<?php
class Alumno extends CI_Controller {
    public function r() {
        error_reporting(0);
        $this->load->model('Alumno_model');
        $data['alumnos'] = $this->Alumno_model->findAll();
        frame($this,'alumno/r',$data);
    }
    public function c() {
        frame($this,'alumno/c');
    }
    
    public function cPost() {
        error_reporting(0);
        $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
        $apellido = isset($_POST['apellido']) ? $_POST['apellido'] : null;
        try {
            if ($nombre == null || $nombre == '' || $apellido== null || $apellido == '') {
                throw new Exception('El nombre / apellido no pueden ser nulos/vacíos');
            }
            $this->load->model('Alumno_model');
            $this->Alumno_model->create($nombre,$apellido);
            redirect(base_url().'alumno/r');
        }
        catch (Exception $e) {
            errorMsg($e->getMessage(),'alumno/c');
        }
    }
}