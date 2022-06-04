<?php
class Partido_model extends CI_Model {
    
    public function findByFecha($fecha) {
        return R::find('partido','fecha=?',[$fecha]);
    }
    
    /**
     * 
     * Devuelve partidos jugados en una jornada determinada
     */
    public function getByNJornada($nJornada) {
        return R::find('partido','n_jornada=? order by fecha',[$nJornada]);
    }
    
    /**
     * Devuelve un array con los números de las jornadas que se han jugado
     */
    public function getNJornadas() {
        $partidos = R::findAll('partido');
        $jornadas = [];
        foreach ($partidos as $partido) {
            $nJornada = $partido->nJornada;
            if (!in_array($nJornada, $jornadas)) {
                $jornadas[] = $nJornada;
            }
        }
        return $jornadas;
    }
    
    public function findAll() {
        return R::findAll('partido');
    }
    
    public function save($idLocal,$idVisitante,$nJornada,$fecha,$gl,$gv) {
        
        if (R::load('equipo',$idLocal)->id == 0 || R::load('equipo',$idVisitante)->id == 0 ) {
            throw new Exception('Id de equipo desconocido');
        }
        
        $partido = R::dispense('partido');
        $partido->nJornada = $nJornada;
        $partido->fecha = $fecha;
        $partido->gl = $gl;
        $partido->gv = $gv;
        $partido->local = R::load('equipo',$idLocal);
        $partido->visitante = R::load('equipo',$idVisitante);
        R::store($partido);
    }
}