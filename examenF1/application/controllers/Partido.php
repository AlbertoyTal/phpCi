<?php

class Partido extends CI_Controller
{

    public function r()
    {
        error_reporting(0);
        $this->load->model('Partido_model');
        if (isset($_GET['fecha']) && $_GET['fecha']!='') {
            $data['partidos'] = $this->Partido_model->findByFecha($_GET['fecha']);
        }
        else {
            $data['partidos'] = $this->Partido_model->findAll();
        }
        frame($this, 'partido/r', $data);
    }

    public function c()
    {
        error_reporting(0);
        $this->load->model('Equipo_model');
        $data['equipos'] = $this->Equipo_model->findAll();
        frame($this, 'partido/c', $data);
    }

    public function cPost()
    {
        error_reporting(0);
        $idLocal = isset($_POST['idLocal']) ? $_POST['idLocal'] : null;
        $idVisitante = isset($_POST['idVisitante']) ? $_POST['idVisitante'] : null;
        $gl = isset($_POST['gl']) ? $_POST['gl'] : null;
        $gv = isset($_POST['gv']) ? $_POST['gv'] : null;
        $nJornada = isset($_POST['nJornada']) ? $_POST['nJornada'] : null;
        $fecha = isset($_POST['fecha']) ? $_POST['fecha'] : null;

        try {
            if ($gl == null || $gv == null || $idLocal == null || $idVisitante == null || $nJornada == null || $fecha == null) {
                throw new Exception('No puede haber datos nulos');
            }

            if ($gv < 0 || $gl < 0) {
                throw new Exception('Los goles no pueden ser menores que cero');
            }

            if ($nJornada < 1 || $nJornada > 50) {
                throw new Exception('El número de jornada debe estar en el rango 1..50');
            }

            if ($idLocal == $idVisitante) {
                throw new Exception('Un equipo no puede jugar contra sí mismo');
            }

            $this->load->model('Partido_model');
            $this->Partido_model->save($idLocal,$idVisitante,$nJornada,$fecha,$gl,$gv);
            redirect(base_url().'partido/r');
        } catch (Exception $e) {
            errorMsg($e->getMessage(), 'partido/c');
        }
    }
}