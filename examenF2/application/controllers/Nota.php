<?php
class Nota extends CI_Controller {
    public function r() {
        error_reporting(0);
        
        $idAlumno = isset($_GET['idAlumno']) ? $_GET['idAlumno'] : null;
        $idAsignatura = isset($_GET['idAsignatura']) ? $_GET['idAsignatura'] : null;
        $this->load->model('Nota_model');
        if ($idAlumno == null && $idAsignatura == null ) {
            $data['notas'] = $this->Nota_model->findAll();
        }
        elseif ($idAlumno != null ){
            $data['notas'] = $this->Nota_model->findByIdAlumno($idAlumno);
            $this->load->model('Alumno_model');
            $data['alumno'] = $this->Alumno_model->findByIdAlumno($idAlumno);
        }
        elseif ($idAsignatura != null ) {
            $data['notas'] = $this->Nota_model->findByIdAsignatura($idAsignatura);
            $this->load->model('Asignatura_model');
            $data['asignatura'] = $this->Asignatura_model->findByIdAsignatura($idAsignatura);
        }
        frame($this,'nota/r',$data);
    }
    public function c() {
        error_reporting(0);

        $this->load->model('Alumno_model');
        $data['alumnos'] = $this->Alumno_model->findAll();
        
        $this->load->model('Asignatura_model');
        $data['asignaturas'] = $this->Asignatura_model->findAll();
        
        frame($this,'nota/c',$data);
    }
    
    public function cPost() {
        error_reporting(0);
        $numero = isset($_POST['numero']) ? $_POST['numero'] : null;
        $idAsignatura = isset($_POST['idAsignatura']) ? $_POST['idAsignatura'] : null;
        $idAlumno = isset($_POST['idAlumno']) ? $_POST['idAlumno'] : null;
        
        try {
            if ($numero == null || $numero == '') {
                throw new Exception('La nota no puede ser vacía');
            }
            
            if ($numero<0 || $numero>10) {
                throw new Exception('La nota debe estar entre 0..10');
            }
            
            if ($idAlumno==null || $idAsignatura == null) {
                throw new Exception('El id del alumno o de la asignatura no pueden ser nulos');
            }
            
            $this->load->model('Nota_model');
            $this->Nota_model->create($numero,$idAlumno,$idAsignatura);
            redirect(base_url().'nota/r');
        }
        catch (Exception $e) {
            errorMsg($e->getMessage(),'nota/c');
        }
    }
}