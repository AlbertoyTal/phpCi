<?php
class Alumno_model extends CI_Model {
    
    public function create($nombre,$apellido) {
        $alumno = R::dispense('alumno');
        $alumno->nombre= $nombre;
        $alumno->apellido= $apellido;
        R::store($alumno);
    }
    
    public function findAll() {
        return R::findAll('alumno','order by apellido,nombre');
    }
    public function findByIdAlumno($idAlumno) {
        return R::load('alumno',$idAlumno);
    }
}