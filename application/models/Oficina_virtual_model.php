<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Oficina_virtual_model extends CI_Model {
    public function __construct()
	{
		parent::__construct();
	}
    public function verificar_usuario($clave){
        $lista = $this->db->query("SELECT pe.nombres, pe.paterno, pe.materno, pe.ci, pe.fec_nacimiento, c.usuario, c.contrasenia, pf.perfil, r.rol, c.activo, c.credencial_id, c.persona_perfil_id
        FROM credencial c, persona_perfil p, rol r, persona pe, perfil pf 
        WHERE c.persona_perfil_id = p.persona_perfil_id
        AND p.persona_id = pe.persona_id
        AND p.perfil_id = pf.perfil_id
        AND c.rol_id = r.rol_id
        ORDER BY c.credencial_id DESC")->result();

        if ($lista > 0) {
        return $lista;
        }
        else{
        return false;
        }
    }
    public function coordenadas_predio($id_usuario){
        $query = $this->db->query ("SELECT pd.predio_id
                                    FROM catastro.predio_ddrr pd, catastro.predio_titular pt, public.persona pe
                                    WHERE pe.ci = '$id_usuario' AND pd.ddrr_id = pt.ddrr_id AND pt.persona_id = pe.persona_id");
        return $query->result_array();
    }
    public function listar_tramites(){
        $query = $this->db->query ("SELECT * FROM tramite.tipo_tramite WHERE activo=1 ORDER BY tramite");
        return $query->result_array();
    }
    public function listar_requisitos(){
        $query = $this->db->query ("SELECT descripcion, tipo_tramite_id FROM tramite.requisito");
        return $query->result_array();
    }
    public function flujo_tramite(){
        $query = $this->db->query ("select tramite.flujo.tipo_tramite_id as tipo_tramite_id, tramite,flujo,orden from tramite.flujo join tramite.tipo_tramite on tramite.flujo.tipo_tramite_id = tramite.tipo_tramite.tipo_tramite_id");
        return $query->result_array();
    }
    //consulta que extrae los procesos del tramite segun el orden acendente
    public function  numero_flujo($id_tramite){
        $query = $this->db->query("	select orden from tramite.flujo where tipo_tramite_id = '$id_tramite'   GROUP BY orden  ORDER BY orden ASC;");
        return $query->result_array();
    }

    //consulta que extrae solo un resultado de la busqueda de proceso esto me permite generar el flujo sin repetir el mismo proceso  
    public function  proceso_flujo($id_tramite, $orden){
        $query = $this->db->query("select tipo_tramite_id, orden, flujo from tramite.flujo where tipo_tramite_id = '$id_tramite' and orden='$orden' FETCH FIRST ROW ONLY");
        return $query->result_array();
    }

    public function noticias_oficina_virtual(){
        $this->db->select('noticias_id, titulo, contenido, adjunto, activo, fec_creacion');
        $this->db->from('noticias');
        $query=$this->db->get(); 
		return $query->result();
    }

    public function buscar_noticia($id){
        $this->db->select('noticias_id, titulo, contenido, adjunto, activo, fec_creacion');
        $this->db->from('noticias');
        $this->db->where('noticias_id', $id);
        $query=$this->db->get(); 
		return $query->result();
    }

    public function actualizar_noticia($noticia_id, $data){    
        $this->db->where('noticias_id', $noticia_id);
        $this->db->update('noticias', $data);
    }
   
    public function numero_noticias(){    
        $query=$this->db->get("noticias");
        $numero_filas=$query->num_rows();
        return $numero_filas;
    }

    public function almacenar_noticias($data){
        $this->db->insert('noticias', $data);
    }

    public function estado_noticia($tramite_id, $data){
        $this->db->update('noticias', $data, array('noticias_id' => $tramite_id));
    }
}
