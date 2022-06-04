<?php
class Equipo_model extends CI_Model {
    
    public function findByName($nombre) {
        return R::findOne('equipo','nombre=?',[$nombre]);
    }
    
    public function findAll() {
        return R::findAll('equipo');
    }
    
    public function save($nombre) {
        if ($this->findByName($nombre)!=null) {
            throw new Exception("El equipo $nombre ya existe");
        }
        $equipo = R::dispense('equipo');
        $equipo->nombre = $nombre;
        R::store($equipo);
    }
}