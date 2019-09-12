  <!--nestable CSS -->
    <link href="<?php echo base_url(); ?>public/assets/plugins/nestable/nestable.css" rel="stylesheet" type="text/css"/>  

  <style type="text/css">
 body {
          color: #555;
          font-size: 1.25em;
          font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
        }

        hr {
          margin: 50px 0;
        }

        ul {
          list-style: none;
        }

        .container {
          margin: 40px auto;
          max-width: 700px;
        }

        li {
          margin-top: 1em;
        }

        label {
          font-weight: bold;
        }

        #derecha{
          float: right;
        }

        .derecha{
          float: right;
        }


    </style>




<div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
<!-- vertical wizard -->
                <div class="row">
                                       
                <div class="col-lg-4 col-md-12">
                    <div class="card">
                        <div class="card-body">
                                <?php
                                      $id = $this->session->userdata("persona_perfil_id");
                                      $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id))->row();
                                      $persona = $resi->persona_id;
                                      $perfil = $resi->perfil_id; 

                                      $res = $this->db->get_where('persona', array('persona_id' => $persona))->row();
                                      $res1 = $this->db->get_where('perfil', array('perfil_id' => $perfil))->row();

                                      $credencial = $this->db->get_where('credencial', array('persona_perfil_id' => $id))->row();
                                      $id_credencial = $credencial->credencial_id;
                               

                 
                                      $nivel1 = $this->db->query("SELECT m.*
                                                                  FROM credencial_menu cm, menu m
                                                                  WHERE credencial_id = '$id_credencial'
                                                                  AND cm.menu_id = m.menu_id
                                                                  AND m.padre = '0'
                                                                  AND m.nivel = '1'
                                                                  AND m.activo = '1'
                                                                  ORDER BY m.orden")->result();
                                  ?>


                                <?php echo form_open('usuario/update', array('method'=>'POST', 'name'=>'f1')); ?>
                                    <h4 class="card-title">Men&uacute; Administrador</h4>

                                        
                                        <div class="form-group" id="f1">
                                            <!--<input type="text" hidden="" value="<?php echo $credencial_id; ?>" name="credencial">-->
                                        </div>
                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                              <li  ></li>
                                                  <br>
                                                  <input type="checkbox" name="ch1"> Opcion 1 
                                                  <br> 
                                                  <input type="checkbox" name="ch2"> Opcion 2 
                                                  <br> 
                                                  <input type="checkbox" name="ch3"> Opcion 3 
                                                  <br> 
                                                  <input type="checkbox" name="ch4"> Opcion 4 
                                                 
                                                  <br> 
                                                  <input type="submit"> 
                                                  <br> 
                                                  <br> 
                                                  <a href="javascript:seleccionar_todo()">Marcar todos</a>
                                                  <a href="javascript:deseleccionar_todo()">Marcar ninguno</a> 
                                              </div>





                                            <!-- CABECERA DEL PRIMER MENU 

                                            <li class="dd-item" >
                                                <div class="dd-handle"><a onclick="nivel2()" class="<?php echo 'fas fa-clipboard-list' ?>"></a> <?php echo 'Inicio'; ?>
                                                    <input type="checkbox" id="option_1" class="derecha"><label for="option_1"></label>
                                                </div>
                                                    <ul id="nivel2">
                                                        <li class="dd-item" data-id="1">
                                                            <div class="dd-handle"><i class="<?php echo 'fas fa-clipboard-list' ?>"></i> <?php echo 'Principal'; ?><input id="derecha" type="checkbox" class="subOption_1">  
                                                            </div>
                                                        </li>
                                                        <li class="dd-item" data-id="1">
                                                            <div class="dd-handle"><i class="<?php echo 'fas fa-clipboard-list' ?>"></i> <?php echo 'Teclados'; ?><input id="derecha" type="checkbox" class="subOption_1">  
                                                            </div>
                                                        </li>
                                                        <li class="dd-item" data-id="1">
                                                            <div class="dd-handle"><i class="<?php echo 'fas fa-clipboard-list' ?>"></i> <?php echo 'Teclados'; ?><input id="derecha" type="checkbox" class="subOption_1">  
                                                            </div>
                                                        </li>
                                                        <li class="dd-item" data-id="1">
                                                            <div class="dd-handle"><i onclick="nivel3()" class="<?php echo 'fas fa-clipboard-list' ?>"></i> <?php echo 'Mantenimiento'; ?><input id="derecha" type="checkbox" class="subOption_1">  
                                                            </div>
                                                                  <ul id="nivel3">
                                                                      <li class="dd-item" data-id="1">
                                                                          <div class="dd-handle"><i class="<?php echo 'fas fa-clipboard-list' ?>"></i> <?php echo '3er Menu'; ?><input id="derecha" type="checkbox" class="subOption_1">  
                                                                          </div>
                                                                      </li>
                                                                  </ul>
                                                        </li>
                                                    </ul>
                                            </li>   -->

                                            <!-- CABECERA DEL SEGUNDO MENU -->

                                            <?php foreach ($nivel1 as $menu1) { ?>
                                  <!--
                                            <li class="dd-item" >
                                                <div class="dd-handle"><a onclick="nivel2_2()" class="<?php echo $menu1->icono ?>"></a> <?php echo $menu1->descripcion ?>  
                                                    <input type="checkbox" id="option_2" class="derecha"><label for="option_2"></label>
                                                </div>

                                                     <?php   
                                                          $nivel2 = $this->db->query("SELECT m.*
                                                                                      FROM credencial_menu cm, menu m
                                                                                      WHERE credencial_id = '$id_credencial'
                                                                                      AND cm.menu_id = m.menu_id
                                                                                      AND m.nivel = '2'
                                                                                      AND m.padre = '$menu1->menu_id'
                                                                                      AND m.activo = '1'
                                                                                      ORDER BY m.orden")->result();
                                                          foreach ($nivel2 as $menu2) 
                                                     { ?>
                                                      
                                                    <ul id="nivel2_2">
                                                        <li class="dd-item" data-id="1">
                                                            <div class="dd-handle"><i onclick="nivel3_2()" class="<?php echo $menu2->icono ?>"></i> <?php echo $menu2->descripcion ?><input id="derecha" type="checkbox" class="subOption_2">  
                                                            </div>

                                                                  <?php   
                                                                    $nivel3 = $this->db->query("SELECT m.*
                                                                                                FROM credencial_menu cm, menu m
                                                                                                WHERE credencial_id = '$id_credencial'
                                                                                                AND cm.menu_id = m.menu_id
                                                                                                AND m.nivel = '3'
                                                                                                AND m.padre = '$menu2->menu_id'
                                                                                                AND m.activo = '1'
                                                                                                ORDER BY m.orden")->result();

                                                                   foreach ($nivel3 as $menu3) 
                                                                  { ?>

                                                                  <ul id="nivel3_2">
                                                                      <li class="dd-item" data-id="1">
                                                                          <div class="dd-handle"><i class="<?php echo $menu3->icono ?>"></i> <?php echo $menu3->descripcion ?><input id="derecha" type="checkbox" class="subOption_2">  
                                                                          </div>
                                                                      </li>
                                                                  </ul>

                                                                <?php } ?>
                                                        </li>
                                                    </ul>
                                                    <?php } ?> 
                                            </li>

                                      -->
                                            <?php } ?>  
                                              
                                   </form>
                              </div>
                               
                        </div>
                    </div>
                </div>
                </div>
        </div>
</div>
 <!--Nestable js -->
<script src="<?php echo base_url(); ?>public/assets/plugins/nestable/jquery.nestable.js"></script>

<script type="text/javascript">
        var checkboxes_1 = document.querySelectorAll('input.subOption_1'),
              checkall_1 = document.getElementById('option_1');


        for(var i=0; i<checkboxes_1.length; i++) {
                checkboxes_1[i].onclick = function() {
                var checkedCount_1 = document.querySelectorAll('input.subOption_1:checked').length;

                checkall_1.checked = checkedCount_1 > 0;
                checkall_1.indeterminate = checkedCount_1 > 0 && checkedCount_1 < checkboxes_1.length;
              }
            }

        checkall_1.onclick = function() {
          for(var i=0; i<checkboxes_1.length; i++) {
            checkboxes_1[i].checked = this.checked;
          }
        }

        function nivel2(){
        $('#nivel2').toggle('slow');
        }

        function nivel3(){
        $('#nivel3').toggle('slow');
        }
</script>

<script type="text/javascript">
        var checkboxes_2 = document.querySelectorAll('input.subOption_2'),
              checkall_2 = document.getElementById('option_2');


        for(var i=0; i<checkboxes_2.length; i++) {
                checkboxes_2[i].onclick = function() {
                var checkedCount_2 = document.querySelectorAll('input.subOption_2:checked').length;

                checkall_2.checked = checkedCount_2 > 0;
                checkall_2.indeterminate = checkedCount_2 > 0 && checkedCount_2 < checkboxes_2.length;
              }
            }

        checkall_2.onclick = function() {
          for(var i=0; i<checkboxes_2.length; i++) {
            checkboxes_2[i].checked = this.checked;
          }
        }

        function nivel2_2(){
        $('#nivel2_2').toggle('slow');
        }

        function nivel3_2(){
        $('#nivel3_2').toggle('slow');
        }
</script>

<script type="text/javascript">
       function seleccionar_todo(){ 
   for (i=0;i<document.f1.elements.length;i++) 
      if(document.f1.elements[i].type == "checkbox")  
         document.f1.elements[i].checked=1 
} 

function deseleccionar_todo(){ 
   for (i=0;i<document.f1.elements.length;i++) 
      if(document.f1.elements[i].type == "checkbox")  
         document.f1.elements[i].checked=0 
}
</script>

