<?php
class Asignatura_model extends CI_Model {
    
    public function create($nombre) {
        
        if (R::findOne('asignatura','nombre=?',[$nombre]) != null ) {
            throw new Exception ("Ya existe la asignatura $nombre");
        }
        
        $asignatura = R::dispense('asignatura');
        $asignatura->nombre= $nombre;
        R::store($asignatura);
    }
    
    public function findAll() {
        return R::findAll('asignatura','order by nombre');
    }
    
    public function findByIdAsignatura($idAsignatura) {
        return R::load('asignatura',$idAsignatura);
    }
}