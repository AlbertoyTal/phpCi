<?php

class Persona_model extends CI_Model
{
    
    public function limpiarGyO() {
        $gustos = R::findAll('gusto');
        foreach ($gustos as $g) {
            if ($g->persona == null || $g->aficion == null) {
                R::trash($g);
            }
        }
        $odios = R::findAll('odio');
        foreach ($odios as $o) {
            if ($o->persona == null || $o->aficion == null) {
                R::trash($o);
            }
        }
    }

    public function create($loginname, $nombre, $apellido, $idPaisNace, $idPaisVive, $idsAficionGusta, $idsAficionOdia)
    {
        if (R::findOne('persona', 'loginname=?', [
            $loginname
        ]) != null) {
            throw new Exception('El loginname ' . $loginname . ' ya existe');
        }

        $persona = R::dispense('persona');

        $persona->loginname = $loginname;
        $persona->nombre = $nombre;
        $persona->apellido = $apellido;

        // PAIS de NACIMIENTO
        $pais = ($idPaisNace != null && R::load('pais', $idPaisNace)->id != 0) ? R::load('pais', $idPaisNace) : null;
        if ($pais != null) {
            $persona->nace = $pais;
        }

        // PAIS de RESIDENCIA
        $pais = ($idPaisVive != null && R::load('pais', $idPaisVive)->id != 0) ? R::load('pais', $idPaisVive) : null;
        if ($pais != null) {
            $persona->vive = $pais;
        }
        // AFICIONES QUE LE GUSTAN
        foreach ($idsAficionGusta as $idAficionGusta) {
            $gusto = R::dispense('gusto');
            $gusto->persona = $persona;
            $gusto->aficion = R::load('aficion', $idAficionGusta);
            R::store($gusto);
        }

        // AFICIONES QUE ODIA
        foreach ($idsAficionOdia as $idAficionOdia) {
            $odio = R::dispense('odio');
            $odio->persona = $persona;
            $odio->aficion = R::load('aficion', $idAficionOdia);
            R::store($odio);
        }

        R::store($persona);
        
        $this->limpiarGyO();
    }

    public function findAll()
    {
        return R::findAll('persona');
    }

    public function existeId($id)
    {
        $bean = R::load('persona', $id);
        return ($bean->id != 0);
    }

    public function getPersonabyId($idPersona)
    {
        return $this->existeId($idPersona) ? R::load('persona', $idPersona) : null;
    }

    public function update($idPersona, $loginname, $nombre, $apellido, $idPaisNace, $idPaisVive, $idsAficionGusta, $idsAficionOdia)
    {
        $persona = R::load('persona', $idPersona);
        if ($persona->loginname != $loginname && R::findOne('persona', 'loginname=?', [
            $loginname
        ]) != null) {
            throw new Exception("El loginanme $loginname ya existe");
        }

        if ($persona->loginname != $loginname) {
            $persona->loginname = $loginname;
        }

        $persona->nombre = $nombre;
        $persona->apellido = $apellido;

        $paisNace = ($idPaisNace == null || $idPaisNace < 0) ? null : R::load('pais', $idPaisNace);
        $persona->nace = $paisNace;

        $paisVive = ($idPaisVive == null || $idPaisVive < 0) ? null : R::load('pais', $idPaisVive);
        $persona->vive = $paisVive;

        R::store($persona);

        foreach ($persona->ownGustoList as $gusto) {
            R::trash($gusto);
            R::store($persona);
        }

        $persona->ownGustoList = [];
        R::store($persona);

        foreach ($persona->ownOdioList as $odio) {
            R::trash($odio);
            R::store($persona);
        }
        $persona->ownOdioList = [];
        R::store($persona);

        foreach ($idsAficionGusta as $idAficionGusta) {
            $gusto = R::dispense('gusto');
            $gusto->aficion = R::load('aficion', $idAficionGusta);
            $gusto->persona = $persona;
            R::store($gusto);
        }

        foreach ($idsAficionOdia as $idAficionOdia) {
            $odio = R::dispense('odio');
            $odio->aficion = R::load('aficion', $idAficionOdia);
            $odio->persona = $persona;
            R::store($odio);
        }
    
        $this->limpiarGyO();
        
    }

    public function delete($idPersona)
    {
        $persona = R::load('persona', $idPersona);
        if ($persona->id == 0) {
            throw new Exception("La persona de id $idPersona no existe");
        }
        foreach ($persona->ownGustoList as $gusto) {
            R::trash($gusto);
        }
        foreach ($persona->ownOdioList as $odio) {
            R::trash($odio);
        }
        R::trash($persona);
        $this->limpiarGyO();
    }
    
}
?>