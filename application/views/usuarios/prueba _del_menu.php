<!-- Bootstrap Core CSS -->

 
    <!--nestable CSS -->
    <!-- Custom CSS -->
    <style type="text/css">
                label {
            display: block;
            padding-left: 15px;
            text-indent: -15px;
            float: right;
        }
         
        input {
            width: 13px;
            height: 13px;
            padding: 0;
            margin:0;
            vertical-align: bottom;
            position: relative;
            top: -1px;
            *overflow: hidden;
        }

        #prueba{ 
            margin-top: 5px;
            border: solid;
           

         }

        #izquierda {
           
            float: right;
        }

        .derecha{
          float: right;
          margin-top: 6px;

          /*|margin-top: 2px;*/
        }
    </style>
   


<div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
<!-- vertical wizard -->
                <div class="row">
                    <?php
                    $nivel1 = $this->db->query("SELECT *
                                                FROM menu
                                                WHERE padre = '0'
                                                AND nivel = '1'
                                                ORDER BY orden")->result();
                    
                 ?>
                <div class="col-lg-4 col-md-12">
                    <div class="card">
                        <div class="card-body">
                                <?php echo form_open('usuario/update', array('method'=>'POST')); ?>
                                    <h4 class="card-title">Men&uacute; Administrador</h4>
                          
                                            <input type="text" hidden="" value="<?php echo $credencial_id; ?>" name="credencial">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                     
                                    <div class="myadmin-dd dd" id="nestable">
                                        <?php foreach ($nivel1 as $menu1) { 
                                            $compara =  $this->db->query("SELECT *
                                                                            FROM credencial_menu
                                                                            WHERE menu_id = '$menu1->menu_id'
                                                                            AND credencial_id = '$credencial_id'
                                                                            ORDER BY credencial_menu_id")->row();
                                            if ($compara) {
                                                               $var = 'checked';
                                                          } 
                                                          else
                                                          {
                                                               $var = '';
                                                          }
                                            ?>
                                        <ol class="dd-list">
                                            <li class="dd-item" data-id="1">
                                                <div class="dd-handle"><i class="<?php echo $menu1->icono ?>"></i> <?php echo $menu1->descripcion; ?>
                                                        <label class="custom-control custom-checkbox">
                                                            <input type="checkbox" <?php echo $var; ?> value="<?php echo $menu1->menu_id ?>" name="menus[<?php echo $menu1->menu_id; ?>]" class="custom-control-input">
                                                                <span class="custom-control-label"></span>
                                                        </label>
                                                </div>
                                                 <?php
                     
                                                    $nivel2 = $this->db->query("SELECT *
                                                                                FROM menu
                                                                                WHERE padre = '$menu1->menu_id'
                                                                                AND nivel = '2'
                                                                                ORDER BY orden")->result();
                                                 ?>
                                                    <?php foreach ($nivel2 as $menu2) {

                                                            $compara2 =  $this->db->query("SELECT *
                                                                            FROM credencial_menu
                                                                            WHERE menu_id = '$menu2->menu_id'
                                                                            AND credencial_id = '$credencial_id'
                                                                            ORDER BY credencial_menu_id")->row();

                                                            if ($compara2) {
                                                                       $var2 = 'checked';
                                                                    } 
                                                                    else
                                                                    {
                                                                       $var2 = '';
                                                                    }


                                                     ?>
                                                        <ol class="dd-list">
                                                            <li id="nivel1" class="dd-item" data-id="1">
                                                                <div class="dd-handle"><i class="<?php echo $menu2->icono ?>"></i> <?php echo $menu2->descripcion; ?>
                                                                        <label class="custom-control custom-checkbox">
                                                                            <input type="checkbox" <?php echo $var2; ?> value="<?php echo $menu2->menu_id; ?>" name="menus[<?php echo $menu2->menu_id; ?>]" class="custom-control-input">
                                                                                <span class="custom-control-label"></span>
                                                                         </label>
                                                                </div>
                                                                         <?php
                                                                            $nivel3 = $this->db->query("SELECT *
                                                                                                        FROM menu
                                                                                                        WHERE padre = '$menu2->menu_id'
                                                                                                        AND nivel = '3'
                                                                                                        ORDER BY orden")->result();
                                                                         ?>
                                                                            <?php foreach ($nivel3 as $menu3) { 

                                                                                $compara3 =  $this->db->query("SELECT *
                                                                                                                FROM credencial_menu
                                                                                                                WHERE menu_id = '$menu3->menu_id'
                                                                                                                AND credencial_id = '$credencial_id'
                                                                                                                ORDER BY credencial_menu_id")->row();

                                                                                if ($compara3) {
                                                                                           $var3 = 'checked';
                                                                                        } 
                                                                                        else
                                                                                        {
                                                                                           $var3 = '';
                                                                                        }

                                                                                ?>
                                                                                <ol id="nivel1" class="dd-list">
                                                                                    <li class="dd-item" data-id="1">
                                                                                        <div class="dd-handle"><i class="<?php echo $menu3->icono ?>"></i> <?php echo $menu3->descripcion; ?>
                                                                                                <label class="custom-control custom-checkbox">
                                                                                                    <input type="checkbox" <?php echo $var3; ?> value="<?php echo $menu3->menu_id; ?>" name="menus[<?php echo $menu3->menu_id; ?>]" class="custom-control-input">
                                                                                                        <span class="custom-control-label"></span>
                                                                                                </label>
                                                                                        </div>
                                                                                        
                                                                                    </li>
                                                                                </ol>
                                                                            <?php
                                                                                }
                                                                            ?>
                                                            </li>
                                                        </ol>
                                                    <?php
                                                        }
                                                    ?>


                                            </li>
                                           
                                        </ol>
                                         <?php
                                              }
                                          ?>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
            </div>
                    <!-- desde aqui -->
<ul class="autoCheckbox">
  <li>
   <input type="checkbox" checked id="Inicio">Inicio
   <ul>
    <li>
     <input type="checkbox" id="Sub-Mail">Sub-Mail
    </li>
    <li>
     <input type="checkbox" id="test">test
     <ul>
      <li>
       <input type="checkbox" id="Sub-Mail 2">Sub-Mail 2
      </li>
      <li>
       <input type="checkbox" id="test 2">test 2
      </li>
     </ul>
    </li>
   </ul>
  </li>
  <li>
   <input type="checkbox" id="Mail">Mail
   <ul>
    <li>
     <input type="checkbox" id="Sub-Mail">Sub-Mail
    </li>
    <li>
     <input type="checkbox" id="test">test
     <ul>
      <li>
       <input type="checkbox" id="Sub-Mail 2">Sub-Mail 2
        <ul>
         <li>
          <input type="checkbox" id="Sub-Mail 3">Sub-Mail 3
         </li>
         <li>
          <input type="checkbox" id="test 3">test 3
         </li>
        </ul>
      </li>
      <li>
       <input type="checkbox" id="test 2">test 2
        <ul>
         <li>
          <input type="checkbox" id="Sub-Mail 3">Sub-Mail 3
         </li>
         <li>
          <input type="checkbox" id="test 3">test 3
         </li>
        </ul>
      </li>
     </ul>
    </li>
   </ul>
  </li>

  <li>
    <div id="prueba" class="dd-handle col-3"><a onclick="nivel1()" class="fas fa-angle-down"></a> <?php echo 'Inicio'; ?>
        <input type="checkbox" id="principal" class="derecha"><label for="option_1"></label>
    </div>
   <ul id="uno">
    <li>
        <div id="prueba" class="col-3">        
            <input type="checkbox" id="Sub-Mail" class="derecha">Sub-Mail
        </div>
    </li>
    <li>
        <div id="prueba" class="col-3"><a onclick="nivel2()" class="fas fa-angle-down"></a>
            <input type="checkbox" id="test" class="derecha">test
        </div>
     <ul id="dos">
      <li>
        <div id="prueba" class="col-3">
            <input type="checkbox" id="Sub-Mail 2" class="derecha">Sub-Mail 2
        </div>
      </li>
      <li>
        <div id="prueba" class="col-3">
            <input type="checkbox" id="test 2" class="derecha">test 2
        </div>
      </li>
     </ul>
    </li>
   </ul>
  </li>
    
 </ul>



    <!-- hasta aqui -->



        </div>
</div>
                <!-- ============================================================== -->

<!-- ============================================================== -->
    
    <!-- Bootstrap tether Core JavaScript -->
    

    <!--Nestable js -->
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
  <!--Nestable js -->
    <script type="text/javascript">
            $(function () {
         $(".autoCheckbox").on("click",function () {
          var expr="li input[type=checkbox]",$this=$(event.target);
          while ($this.length) {
           $input=$this.closest("li").find(expr);
           if ($input.length) {
            if ($this[0]==event.target) {
             checked = $this.prop("checked");
             $input.prop("checked", checked).css("opacity","1.0");
            }
            checked=$input.is(":checked");
            $this.prop("checked", checked).css("opacity",
             (checked && $input.length!= $this.closest("li").find(expr+":checked").length)
              ? "0.5" : "1.0");
           }
           $this=$this.closest("ul").closest("li").find(expr.substr(3)+":first");
          }
         });
        })

        function nivel1(){
        $('#uno').toggle('slow');
        }

        function nivel2(){
        $('#dos').toggle('slow');
        }

        function nivel3(){
        $('#tres').toggle('slow');
        }
    
    </script>




