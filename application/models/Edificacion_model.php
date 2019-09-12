<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edificacion_model extends CI_Model {

	public function __construct() {
        $this->load->database();
    }   
    function getAllData() {//obtiene los datos de la tabla tipo_predio en array result
        $query = $this->db->query('SELECT * FROM catastro.tipo_predio where activo=1 ');
        return $query->result_array();
    }
    function get_Destino_bloque() {//obtiene los datos de la tabla destino_bloque en array result
        $query = $this->db->query('SELECT * FROM catastro.destino_bloque where activo=1');
        return $query->result();
    }

    function get_Uso_bloque() {//obtiene los datos de la tabla uso_bloque en array result
        $query = $this->db->query('SELECT * FROM catastro.uso_bloque where activo=1');
        return $query->result();
    }
    function get_tipo_planta() {//obtiene los datos de la tabla uso_bloque en array result
        $query = $this->db->query('SELECT * FROM catastro.tipo_planta WHERE activo=1');
        return $query->result();
    }

    function get_grupos_subgrupos() {//obtiene los datos de la tabla uso_bloque en array result
        $query = $this->db->query('SELECT x.grupo_mat_id,x.descripcion as desc_grupo,y.mat_item_id,y.descripcion as desc_item FROM (SELECT grupo_mat_id,descripcion from catastro.bloque_grupo_mat WHERE activo=1) as x INNER JOIN (SELECT grupo_mat_id,mat_item_id,descripcion FROM catastro.bloque_mat_item WHERE activo=1) as y on x.grupo_mat_id=y.grupo_mat_id ORDER BY x.grupo_mat_id ASC');
        return $query->result_array();
    }

    function get_grupos() {//obtiene los datos de la tabla grupo_mat en array result
        $query = $this->db->query('SELECT grupo_mat_id,descripcion from catastro.bloque_grupo_mat WHERE activo=1 ORDER BY grupo_mat_id ASC');
        return $query->result_array();
    }

    function get_Bloque($predio_id) {//obtiene los datos de la tabla bloque en array result
        $query = $this->db->query("SELECT y.bloque_id,y.predio_id,y.nro_bloque,y.nom_bloque,y.estado_fisico,y.altura,y.anio_cons,y.anio_remo,y.porcentaje_remo,y.destino_bloque_id,z.descripcion as desc_bloque_dest,y.uso_bloque_id,x.descripcion as desc_bloque_uso FROM catastro.bloque as y LEFT JOIN catastro.uso_bloque as x on x.uso_bloque_id=y.uso_bloque_id LEFT JOIN catastro.destino_bloque as z on z.destino_bloque_id=y.destino_bloque_id WHERE y.activo=1 and x.activo=1 and z.activo=1 and y.predio_id='$predio_id'");
        return $query->result();
    }

    function get_cant_bloque($predio_id) {//obtiene la cantidad de bloques
        $query = $this->db->query("SELECT count(nro_bloque) as total FROM catastro.bloque where activo=1 and predio_id='$predio_id'");
        return $query->result();
    }

    function get_datos_bloque($id) {//obtiene los datos del bloque por id
        $query = $this->db->query("SELECT y.bloque_id,y.predio_id,y.nro_bloque,y.nom_bloque,y.estado_fisico,y.altura,y.anio_cons,y.anio_remo,y.porcentaje_remo,y.destino_bloque_id,z.descripcion as desc_bloque_dest,y.uso_bloque_id,x.descripcion as desc_bloque_uso FROM catastro.bloque as y LEFT JOIN catastro.uso_bloque as x on x.uso_bloque_id=y.uso_bloque_id LEFT JOIN catastro.destino_bloque as z on z.destino_bloque_id=y.destino_bloque_id WHERE y.activo=1 and x.activo=1 and z.activo=1 and bloque_id='$id'");
        return $query->result();
    }
    function get_datos_bloque_piso($id) {//obtiene los datos del bloque por id
        $query = $this->db->query("SELECT x.bloque_piso_id,x.nro_bloque,x.nivel,x.tipo_planta_id,y.descripcion,x.superficie,x.altura,x.bloque_id FROM catastro.bloque_piso x LEFT JOIN catastro.tipo_planta y on x.tipo_planta_id=y.tipo_planta_id WHERE x.bloque_id='$id' and x.activo=1 and y.activo=1");
        return $query->result();
    }

    function get_grupos_subgrupos_byid($id) {//obtiene los datos de la tabla bloque_elementos por el id en array result
        $query = $this->db->query("SELECT x.elemento_id,x.bloque_id,x.nro_bloque,x.grupo_mat_id,y.descripcion as desc_grupo,x.mat_item_id,z.descripcion as desc_item,x.cantidad from catastro.bloque_elemento_cons x LEFT JOIN catastro.bloque_grupo_mat y on x.grupo_mat_id=y.grupo_mat_id LEFT JOIN catastro.bloque_mat_item z on x.mat_item_id=z.mat_item_id WHERE x.bloque_id='$id' and x.activo=1 and y.activo=1 and z.activo=1 ORDER BY grupo_mat_id ASC");
        return $query->result_array();
    }

    function get_bloque_elemnt_grupo_count($id) {//obtiene el total de nro de grupos de elementos del bloque por id
        $query = $this->db->query("SELECT DISTINCT grupo_mat_id FROM catastro.bloque_elemento_cons WHERE bloque_id='$id'");
        return $query->result_array();
    }

    function get_cod_catastral($predio_id) {//obtiene la cantidad de bloques
        $query = $this->db->query("SELECT * FROM catastro.predio
        WHERE predio_id='$predio_id'");   
        if ($query->num_rows() > 0)
        {
            $row = $query->row(); 
            return $row->codcatas;
        }
        return null;
    }


}
