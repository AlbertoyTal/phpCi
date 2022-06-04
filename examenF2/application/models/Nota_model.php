<?php
class Nota_model extends CI_Model {
    
    public function create($numero,$idAlumno,$idAsignatura) {
        
        $nota = R::dispense('nota');
        $nota->numero = $numero;
        $nota->alumno = R::load('alumno',$idAlumno);
        $nota->asignatura  = R::load('asignatura',$idAsignatura);
        R::store($nota);
    }
    
    public function findAll() {
        return R::findAll('nota');
    }
    
    public function findByIdAlumno($idAlumno) {
        return R::find('nota','alumno_id=?',[$idAlumno]);
    }
    
    public function findByIdAsignatura($idAsignatura) {
        return R::find('nota','asignatura_id=?',[$idAsignatura]);
    }
}