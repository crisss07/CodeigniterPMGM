            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer">
                © 2019 Monster Admin by wrappixel.com
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->


    <script src="<?php echo base_url(); ?>public/assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo base_url(); ?>public/assets/plugins/bootstrap/js/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>public/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?php echo base_url(); ?>public/js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="<?php echo base_url(); ?>public/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="<?php echo base_url(); ?>public/js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="<?php echo base_url(); ?>public/assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <!--Custom JavaScript -->
    <script src="<?php echo base_url(); ?>public/js/custom.js"></script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="<?php echo base_url(); ?>public/assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>

    <script>
    $(document).ready(function() {
       


    $(document).on("change", ".sumcontrol", function() {
        var sum = 0;
        $(".sumcontrol").each(function(){
            sum += +$(this).val();
        });
        var valor="el total es mayor a 100%";       
        if(sum <= 100){
            $(".total").val(sum);
            var valortrue=""; 
            $("#validsuma").html(valortrue);
        }else{
            $("#validsuma").html(valor);
        }
    });

    $(document).on("change", ".sumcontrol0", function() {
        var sum = 0;
        $(".sumcontrol0").each(function(){
            sum += +$(this).val();
        });
        var valor="el total es mayor a 100%";       
        if(sum <= 100){
            $(".total0").val(sum);
            var valortrue=""; 
            $("#validsuma0").html(valortrue);
        }else{
            $("#validsuma0").html(valor);
        }
    });

    $(document).on("change", ".sumcontrol1", function() {
        var sum = 0;
        $(".sumcontrol1").each(function(){
            sum += +$(this).val();
        });
        var valor="el total es mayor a 100%";       
        if(sum <= 100){
            $(".total1").val(sum);
            var valortrue=""; 
            $("#validsuma1").html(valortrue);
        }else{
            $("#validsuma1").html(valor);
        }
    });
    $(document).on("change", ".sumcontrol2", function() {
        var sum = 0;
        $(".sumcontrol2").each(function(){
            sum += +$(this).val();
        });
        var valor="el total es mayor a 100%";       
        if(sum <= 100){
            $(".total2").val(sum);
            var valortrue=""; 
            $("#validsuma2").html(valortrue);
        }else{
            $("#validsuma2").html(valor);
        }
    });

      $(document).on("change", ".sumcontrol3", function() {
        var sum = 0;
        $(".sumcontrol3").each(function(){
            sum += +$(this).val();
        });
        var valor="el total es mayor a 100%";       
        if(sum <= 100){
            $(".total3").val(sum);
            var valortrue=""; 
            $("#validsuma3").html(valortrue);
        }else{
            $("#validsuma3").html(valor);
        }
    });
        $(document).on("change", ".sumcontrol4", function() {
        var sum = 0;
        $(".sumcontrol4").each(function(){
            sum += +$(this).val();
        });
        var valor="el total es mayor a 100%";       
        if(sum <= 100){
            $(".total4").val(sum);
            var valortrue=""; 
            $("#validsuma4").html(valortrue);
        }else{
            $("#validsuma4").html(valor);
        }
    });
          $(document).on("change", ".sumcontrol5", function() {
        var sum = 0;
        $(".sumcontrol5").each(function(){
            sum += +$(this).val();
        });
        var valor="el total es mayor a 100%";       
        if(sum <= 100){
            $(".total5").val(sum);
            var valortrue=""; 
            $("#validsuma5").html(valortrue);
        }else{
            $("#validsuma5").html(valor);
        }
    });
            $(document).on("change", ".sumcontrol6", function() {
        var sum = 0;
        $(".sumcontrol6").each(function(){
            sum += +$(this).val();
        });
        var valor="el total es mayor a 100%";       
        if(sum <= 100){
            $(".total6").val(sum);
            var valortrue=""; 
            $("#validsuma6").html(valortrue);
        }else{
            $("#validsuma6").html(valor);
        }
    });

              $(document).on("change", ".sumcontrol7", function() {
        var sum = 0;
        $(".sumcontrol7").each(function(){
            sum += +$(this).val();
        });
        var valor="el total es mayor a 100%";       
        if(sum <= 100){
            $(".total7").val(sum);
            var valortrue=""; 
            $("#validsuma7").html(valortrue);
        }else{
            $("#validsuma7").html(valor);
        }
    });

                $(document).on("change", ".sumcontrol8", function() {
        var sum = 0;
        $(".sumcontrol8").each(function(){
            sum += +$(this).val();
        });
        var valor="el total es mayor a 100%";       
        if(sum <= 100){
            $(".total8").val(sum);
            var valortrue=""; 
            $("#validsuma8").html(valortrue);
        }else{
            $("#validsuma8").html(valor);
        }
    });
                  $(document).on("change", ".sumcontrol9", function() {
        var sum = 0;
        $(".sumcontrol9").each(function(){
            sum += +$(this).val();
        });
        var valor="el total es mayor a 100%";       
        if(sum <= 100){
            $(".total9").val(sum);
            var valortrue=""; 
            $("#validsuma9").html(valortrue);
        }else{
            $("#validsuma9").html(valor);
        }
    });
                    $(document).on("change", ".sumcontrol10", function() {
        var sum = 0;
        $(".sumcontrol10").each(function(){
            sum += +$(this).val();
        });
        var valor="el total es mayor a 100%";       
        if(sum <= 100){
            $(".total10").val(sum);
            var valortrue=""; 
            $("#validsuma10").html(valortrue);
        }else{
            $("#validsuma10").html(valor);
        }
    });
                      $(document).on("change", ".sumcontrol11", function() {
        var sum = 0;
        $(".sumcontrol11").each(function(){
            sum += +$(this).val();
        });
        var valor="el total es mayor a 100%";       
        if(sum <= 100){
            $(".total11").val(sum);
            var valortrue=""; 
            $("#validsuma11").html(valortrue);
        }else{
            $("#validsuma11").html(valor);
        }
    });

                        $(document).on("change", ".sumcontrol12", function() {
        var sum = 0;
        $(".sumcontrol12").each(function(){
            sum += +$(this).val();
        });
        var valor="el total es mayor a 100%";       
        if(sum <= 100){
            $(".total12").val(sum);
            var valortrue=""; 
            $("#validsuma12").html(valortrue);
        }else{
            $("#validsuma12").html(valor);
        }
    });
                          $(document).on("change", ".sumcontrol13", function() {
        var sum = 0;
        $(".sumcontrol13").each(function(){
            sum += +$(this).val();
        });
        var valor="el total es mayor a 100%";       
        if(sum <= 100){
            $(".total13").val(sum);
            var valortrue=""; 
            $("#validsuma13").html(valortrue);
        }else{
            $("#validsuma13").html(valor);
        }
    });

                          $(document).on("change", ".sumcontrol14", function() {
        var sum = 0;
        $(".sumcontrol14").each(function(){
            sum += +$(this).val();
        });
        var valor="el total es mayor a 100%";       
        if(sum <= 100){
            $(".total14").val(sum);
            var valortrue=""; 
            $("#validsuma14").html(valortrue);
        }else{
            $("#validsuma14").html(valor);
        }
    });

                          $(document).on("change", ".sumcontrol15", function() {
        var sum = 0;
        $(".sumcontrol15").each(function(){
            sum += +$(this).val();
        });
        var valor="el total es mayor a 100%";       
        if(sum <= 100){
            $(".total15").val(sum);
            var valortrue=""; 
            $("#validsuma15").html(valortrue);
        }else{
            $("#validsuma15").html(valor);
        }
    });

                          $(document).on("change", ".sumcontrol16", function() {
        var sum = 0;
        $(".sumcontrol16").each(function(){
            sum += +$(this).val();
        });
        var valor="el total es mayor a 100%";       
        if(sum <= 100){
            $(".total16").val(sum);
            var valortrue=""; 
            $("#validsuma16").html(valortrue);
        }else{
            $("#validsuma16").html(valor);
        }
    });

                          $(document).on("change", ".sumcontrol17", function() {
        var sum = 0;
        $(".sumcontrol17").each(function(){
            sum += +$(this).val();
        });
        var valor="el total es mayor a 100%";       
        if(sum <= 100){
            $(".total17").val(sum);
            var valortrue=""; 
            $("#validsuma17").html(valortrue);
        }else{
            $("#validsuma17").html(valor);
        }
    });

                          $(document).on("change", ".sumcontrol18", function() {
        var sum = 0;
        $(".sumcontrol18").each(function(){
            sum += +$(this).val();
        });
        var valor="el total es mayor a 100%";       
        if(sum <= 100){
            $(".total18").val(sum);
            var valortrue=""; 
            $("#validsuma18").html(valortrue);
        }else{
            $("#validsuma18").html(valor);
        }
    });

                          $(document).on("change", ".sumcontrol19", function() {
        var sum = 0;
        $(".sumcontrol19").each(function(){
            sum += +$(this).val();
        });
        var valor="el total es mayor a 100%";       
        if(sum <= 100){
            $(".total19").val(sum);
            var valortrue=""; 
            $("#validsuma19").html(valortrue);
        }else{
            $("#validsuma19").html(valor);
        }
    });

                          $(document).on("change", ".sumcontrol20", function() {
        var sum = 0;
        $(".sumcontrol20").each(function(){
            sum += +$(this).val();
        });
        var valor="el total es mayor a 100%";       
        if(sum <= 100){
            $(".total20").val(sum);
            var valortrue=""; 
            $("#validsuma20").html(valortrue);
        }else{
            $("#validsuma20").html(valor);
        }
    });

                          $(document).on("change", ".sumcontrol21", function() {
        var sum = 0;
        $(".sumcontrol21").each(function(){
            sum += +$(this).val();
        });
        var valor="el total es mayor a 100%";       
        if(sum <= 100){
            $(".total21").val(sum);
            var valortrue=""; 
            $("#validsuma21").html(valortrue);
        }else{
            $("#validsuma21").html(valor);
        }
    });







});




</script>
</body>

</html>