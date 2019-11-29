<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Predio_model extends CI_Model {

    public function __construct(){
		parent::__construct();
        $this->load->database();
        $this->load->helper('vayes_helper');
        // $this->load->model("persona_model");
    }

    public function guarda_predio($datos_predio = null, $fotos = null, $servicios = null, $calles = null, $material_via = null){

        // vdebug($calles, true, false, true);   
        $this->db->insert('catastro.predio', $datos_predio);
        $id_cod_catastral = $this->db->insert_id();

        $direccion_archivos = './public/assets/files/predios/';
        $fotos_predio = array(
            'predio_id'=>$id_cod_catastral,
        );

        // guardamos la imagen del plano
        $target_file_plano = $fotos["foto_plano"]["name"];
        $ruta_temporal_plano = $fotos["foto_plano"]["tmp_name"];
        $tipo_archivo_plano = strtolower(pathinfo($target_file_plano,PATHINFO_EXTENSION));
        $nombre_archivo_plano = date("dmYHis") . md5($target_file_plano) . '.' . $tipo_archivo_plano;
        $nueva_ruta_plano = $direccion_archivos.$nombre_archivo_plano;
        if (move_uploaded_file($ruta_temporal_plano, $nueva_ruta_plano)) {
            // array_push($fotos_predio, 'foto_plano_ubi', $nueva_ruta_plano);        
            $fotos_predio['foto_plano_ubi'] = $nombre_archivo_plano;
        }else{
            $fotos_predio['foto_plano_ubi'] = 'N/T';
            // array_push($fotos_predio, array('foto_plano_ubi' => 'N/T'));        
        }
        // fin guardamos la imagen del plano

        // guardamos la imagen del plano
        $target_file_fachada = $fotos["foto_fachada"]["name"];
        $ruta_temporal_fachada = $fotos["foto_fachada"]["tmp_name"];
        $tipo_archivo_fachada = strtolower(pathinfo($target_file_fachada, PATHINFO_EXTENSION));
        $nombre_archivo_fachada = date("dmYHis") . md5($target_file_fachada) . '.' . $tipo_archivo_fachada;
        $nueva_ruta_fachada = $direccion_archivos . $nombre_archivo_fachada;
        if (move_uploaded_file($ruta_temporal_fachada, $nueva_ruta_fachada)) {
            $fotos_predio['foto_fachada'] = $nombre_archivo_fachada;
        } else {
            $fotos_predio['foto_fachada'] = 'N/T';
        }
        $fotos_predio['activo'] = 1;
        $this->db->insert('catastro.predio_foto', $fotos_predio);
        // fin guardamos la imagen del plano

        // guardamos los servicios
        foreach ($servicios as $key => $s) {
            $data_servicios = array(
                'predio_id'=>$id_cod_catastral,
                'servicio_id' => $s,
                'activo' => 1
            );

            $this->db->insert('catastro.predio_servicios', $data_servicios);
        }
        // fin guardamos los servicios

        // guardamos las calles
        if ($calles) {
            $calles_array = explode(",", $calles);
            foreach ($calles_array as $ca) {
                if ($ca == $this->input->post('calle_principal')) {
                    $tipo_calle = 1;
                    $m_via = $material_via;
                } else {
                    $tipo_calle = 0;
                    $m_via = 8;
                }
                $data_calles = array(
                    'predio_id' => $id_cod_catastral,
                    'objectid_via' => 1,
                    'matvia_id' => $m_via,
                    'activo' => 1,
                    'gvia_id' => $ca,
                    'gvia_tipo' => $tipo_calle,
                );
                $this->db->insert('catastro.predio_via', $data_calles);
            }
        } 

        return $id_cod_catastral;
        // vdebug($calles_array);
        // fin guardamos las calles

        // guarda las observaciones
/*        $data_obs = array(
            'codcatas'=>$this->input->post('codigo_catastral'),
            'observacion'=>$this->input->post('observaciones'),
            'activo'=>1
        );
        
        $this->db->insert('catastro.predio_observac', $data_obs);
        redirect(base_url().'Edificacion/nuevo/'.$this->input->post('codigo_catastral'));
*/        // fin guarda las observaciones


        // vdebug($calles, true, false, true);   

    }

}