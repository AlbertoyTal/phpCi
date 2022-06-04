<?php

class Pais_model extends CI_Model
{

    public function create($nombre)
    {
        if (R::findOne('pais', 'nombre=?', [
            $nombre
        ]) != null) {
            throw new Exception("El país $loginname ya existe");
        }
        $pais = R::dispense('pais');
        $pais->nombre = $nombre;
        R::store($pais);
    }

    public function findAll()
    {
        return R::findAll('pais');
    }
    
    public function existeId($id) {
        $bean = R::load('pais',$id);
        return ($bean->id != 0);
    }

    public function getPaisbyId($idPais) {
        return $this->existeId($idPais) ? R::load('pais',$idPais) : null;
    }

    public function update($idPais,$nombre) {
        
        $pais = R::load('pais',$idPais);
        
        
        if  (strtolower($pais->nombre) != strtolower($nombre) && R::findOne('pais','nombre=?',[$nombre]) != null ) {
            throw new Exception("El país $nombre ya existe");
        }
        
        if  ($pais->nombre != $nombre ) {
            $pais->nombre = $nombre;
        }
        R::store($pais);
    }

    public function delete($idPais) {
        $pais = R::load('pais',$idPais);
        if ($pais->id == 0) {
            throw new Exception("El país de id $idPais no existe");
        }
        foreach ( $pais->alias('nace')->ownPersonaList as $persona) {
            $persona->nace = null;
            R::store($persona);
        }
        $pais->alias('nace')->ownPersonaList = [];
        R::store($pais);
        R::trash($pais);
    }
}
?>