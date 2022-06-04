<?php
class Asignatura extends CI_Controller {
    public function r() {
        error_reporting(0);
        $this->load->model('Asignatura_model');
        $data['asignaturas'] = $this->Asignatura_model->findAll();
        frame($this,'asignatura/r',$data);
    }
    public function c() {
        frame($this,'asignatura/c');
    }
    
    public function cPost() {
        error_reporting(0);
        $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
        try {
            if ($nombre == null || $nombre == '') {
                throw new Exception('El nombre no puede ser vacío');
            }
            $this->load->model('Asignatura_model');
            $this->Asignatura_model->create($nombre);
            redirect(base_url().'asignatura/r');
        }
        catch (Exception $e) {
            errorMsg($e->getMessage(),'asignatura/c');
        }
    }
}