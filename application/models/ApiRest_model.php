<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ApiRest_model extends CI_Model {

	public function __construct() {
        $this->load->database();
    } 
      
    function getData() {//obtiene los datos de la tabla tipo_predio en array result
         $this->db->select('inicio as texto, persona_id as fecha, asignacion_id as icon, tramite_id as ruta');
        $query = $this->db->get_where('inspeccion.asignacion',array('activo' => 1));
        return $query->result_array();
    }

    function getGrupos() {//obtiene los datos de la tabla tipo_predio en array result
        
        $this->db->select('grupo_mat_id as id_g,descripcion as texto');
        $query = $this->db->get_where('catastro.bloque_grupo_mat',array('activo' => 1 ));
        
        return $query->result_array();
    }

    function getSubgrupos($id) {//obtiene los datos de la tabla tipo_predio en array result
        $this->db->select('grupo_mat_id, descripcion as texto');
    	$query= $this->db->get_where('catastro.bloque_mat_item',array('activo' =>1 ,'grupo_mat_id' => $id));
       
        return $query->result_array();
    }
    function getlistadotramite() {//obtiene los datos de la tabla tipo_predio en array result
        $query = $this->db->query('SELECT tipo_tramite_id as id,tramite as texto  FROM tramite.tipo_tramite where activo=1 ORDER BY id ');
        return $query->result_array();
    }
     function getRequisitos($id) {//obtiene los datos de la tabla tipo_predio en array result
        $this->db->select('descripcion');
        $query = $this->db->get_where('tramite.requisito', array('activo' =>1 ,'tipo_tramite_id'=>$id ));        
        return $query->result_array();
    }
       function getReq($id) {//obtiene los datos de la tabla tipo_predio en array result
        
        $this->db->select('descripcion');
        //$this->db->select('descripcion as desc');
        $query = $this->db->get_where('tramite.requisito',array('activo' => 1, 'tipo_tramite_id'=>$id));
        return $query->result_array();
    }

    function get_asign_list($id) {//asignacion de inspecciones
       
        $query = $this->db->query("SELECT i.*,a.*,t.*,p.* FROM inspeccion.asignacion i LEFT JOIN inspeccion.tipo_asignacion a on i.tipo_asignacion_id=a.tipo_asignacion_id
            LEFT JOIN
            tramite.tramite t on i.tramite_id=t.tramite_id
            LEFT JOIN
            persona p on t.solicitante_id=p.persona_id where i.persona_id=$id and i.activo=1");
        return $query->result_array();
    }

    function get_asign_list_test($id) {//asignacion de inspecciones
         $this->db->select('inicio as fecha, persona_id, asignacion_id as id_a, tramite_id');
        $query = $this->db->get_where('inspeccion.asignacion',array('activo' => 1,'persona_id'=>$id));
        return $query->result_array();
    }

    function derivacion($id) {//asignacion de inspecciones
       
        $query = $this->db->query("SELECT d.fuente,d.destino,EXTRACT(DAY from d.fecha) as dia,EXTRACT(month from d.fecha) as mes,EXTRACT(year from d.fecha) as anio,p.persona_id as p_f,o.persona_id as p_d,concat(SPLIT_PART(k.nombres, ' ', 1),' ',k.paterno) as per_fuente,concat(SPLIT_PART(j.nombres, ' ', 1),' ' ,j.paterno) as per_destino,c.descripcion as cargo_fuente,e.descripcion as cargo_destino
FROM
tramite.derivacion d
LEFT JOIN tramite.organigrama_persona p
on p.organigrama_persona_id=d.fuente
LEFT JOIN tramite.organigrama_persona o
on o.organigrama_persona_id=d.destino
LEFT JOIN tramite.cargo c
on p.cargo_id=c.cargo_id
LEFT JOIN tramite.cargo e
on o.cargo_id=e.cargo_id
LEFT JOIN persona k
on p.persona_id=k.persona_id
LEFT JOIN persona j
on o.persona_id=j.persona_id
LEFT JOIN tramite.tramite t
on d.tramite_id=t.tramite_id
WHERE t.cite='$id' order by d.orden ASC");
        return $query->result_array();
    }

     function verify_token($token) {//asignacion de inspecciones
         $this->db->select('token');
        $query = $this->db->get_where('credencial',array('token' => $token));
        return $query->row();
    }

     function get_datos_tramite($id) {//asignacion de inspecciones
         $this->db->select("remitente, concat(EXTRACT(DAY from fecha),'-' ,EXTRACT(month from fecha),'-' ,EXTRACT(year from fecha)  )as fecha ");
        $query = $this->db->get_where('tramite.tramite',array('activo' => 1,'tramite_id'=>$id));
        return $query->result_array();
    }





    function data_login($usuario, $contrasenia)
    {         
        $resultado = $this->db->query("SELECT c.usuario,s.* FROM credencial c
LEFT JOIN persona_perfil p
on c.persona_perfil_id=p.persona_perfil_id
LEFT JOIN persona s
on p.persona_id=s.persona_id
WHERE c.usuario='$usuario' and c.contrasenia='$contrasenia' and c.activo=1");
        return $resultado->result_array();
    }

    function verify_token_get($key) {//asignacion de inspecciones
         $valida = TRUE;
         $token = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiJhcGxpY2F0aXZvIG1vdmlsIEMmUSIsIm5hbWUiOiJwbWdtIiwiaWF0IjoxNTE2MjM5MDIyfQ.AYW_ytVmok75p3zIjWTtMkBQkOq3okx0bHTTdYMI13w';

         if($key!=$token){
            $valida=FALSE;
         }
         return $valida;       
    }

    ///datos del certificado
    function data_prop_cert($id)
    {         
        $resultado = $this->db->query("SELECT o.ci,concat(o.nombres,' ',o.paterno,' ',o.materno) as nombre FROM documento.certificado c
            LEFT JOIN catastro.predio_ddrr p
            on c.predio_id=p.predio_id
            LEFT JOIN catastro.predio_titular e
            on p.ddrr_id=e.ddrr_id
            LEFT JOIN persona o
            on o.persona_id=e.persona_id
            WHERE c.codigo_seguridad='$id' LIMIT 1");
        
        return $resultado->result_array();

    }

    function data_cert($id)
    {         
        $resultado = $this->db->query("SELECT c.vigencia_final,c.vigencia_inicial,t.descripcion FROM documento.certificado c
LEFT JOIN documento.tipo_certificado t
on c.tipo_certificado_id=t.tipo_certificado_id

WHERE c.codigo_seguridad='$id' and c.activo=1");
        return $resultado->result_array();
    }
     function valido_cert($id)
    {         
        $resultado = $this->db->query("SELECT count(certificado_id) as valido FROM documento.certificado
WHERE vigencia_final>=now() and codigo_seguridad='$id' and activo=1");
        return $resultado->result_array();

    }
    
    function insertar_tokens($token)
    {         
        $data = array(
        'token' => $token        
        );
        $this->db->insert('movil', $data);

    }

    function prueba()
    {         
        $resultado = $this->db->query("SELECT * FROM productos");
        return $resultado->result_array();
    }


    function insertar_predio($propietario,$frente,$fondo,$fotoUrl,$luz,$agua,$pluvial,$sanitario,$alumbrado,$gas,$basura,$telefono,$transporte,$estado,$forma,$calle,$zona,$numero)
    {         
        $data = array(        
        
        'propietario'     => $propietario,
        'frente'      => $frente,
        'fondo' => $fondo,
        'luz' => $luz,
        'agua' => $agua,
        'pluvial' => $pluvial,
        'sanitario' => $sanitario,
        'alumbrado' => $alumbrado,
        'gas' => $gas,
        'basura' => $basura,
        'telefono' => $telefono,
        'transporte' => $transporte,
        'estado' => $estado,
        'forma' => $forma,
        'calle' => $calle,
        'zona' => $zona,
        'numero' => $numero,
        'fotoUrl'    => $fotoUrl,
        );
        $this->db->insert('productos', $data);

    }

    function borrar_predio($id)
    {         
        
        
        $this->db->where('id', $id);
        $this->db->delete('productos');

    }
       function actualiza_predio($id,$propietario,$frente,$fondo,$fotoUrl,$luz,$agua,$pluvial,$sanitario,$alumbrado,$gas,$basura,$telefono,$transporte,$estado,$forma,$calle,$zona,$numero)
    {      
        $data = array(        
        
        'propietario'     => $propietario,
        'frente'      => $frente,
        'fondo' => $fondo,
        'luz' => $luz,
        'agua' => $agua,
        'pluvial' => $pluvial,
        'sanitario' => $sanitario,
        'alumbrado' => $alumbrado,
        'gas' => $gas,
        'basura' => $basura,
        'telefono' => $telefono,
        'transporte' => $transporte,
        'estado' => $estado,
        'forma' => $forma,
        'calle' => $calle,
        'zona' => $zona,
        'numero' => $numero,
        'fotoUrl'    => $fotoUrl,
        );

        $this->db->where('id', $id);
        $this->db->update('productos', $data);

    }


}