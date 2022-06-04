<?php
class Home_model extends CI_Model {
    public function init() {
        
        //Borrado de toda la BBDD
        R::nuke();
        
        // CREACIÓN ESTRUCTURA
        
        // PAÍS
        $pa = R::dispense('pais');
        $pa-> nombre = 'TEST';
        R::store($pa);
        
        // AFICIÓN
        $af = R::dispense('aficion');
        $af-> nombre = 'TEST';
        R::store($af);
        
        // PERSONA
        $pe = R::dispense('persona');
        $pe-> nombre = 'TEST';
        $pe-> apellido = 'TEST';
        $pe-> loginname = 'TEST';
        $pe->nace = $pa;
        $pe->vive = $pa;
        R::store($pe);
        
        // GUSTOS y ODIOS
        $gu = R::dispense('gusto');
        $od = R::dispense('odio');
        
        $gu->persona = $pe;
        $od->persona = $pe;
        $gu->aficion = $af;
        $od->aficion = $af;
        
        R::store($gu);
        R::store($od);
        
        R::store($pe);
        
        //BORRADO DATOS INICIALES
        
        R::trash($pe);
        R::trash($pa);
        R::trash($af);
        R::trash($gu);
        R::trash($od);
        
        
    }
    
    public function empty() {
        
        $tablas = R::inspect();
        return (
            !in_array('aficion',$tablas) ||
            !in_array('gusto',$tablas) ||
            !in_array('odio',$tablas) ||
            !in_array('pais',$tablas) ||
            !in_array('persona',$tablas) ||
            sizeof($tablas)>5
            );
    }
}