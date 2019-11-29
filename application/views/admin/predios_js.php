<script src="<?php echo base_url(); ?>public/assets/plugins/moment/moment.js"></script>
<!-- <script src="<?php //echo base_url(); ?>public/assets/plugins/wizard/jquery.steps.min.js"></script> -->
<script src="<?php echo base_url(); ?>public/assets/plugins/wizard/jquery.validate.min.js"></script>
<script src="<?php echo base_url(); ?>public/assets/plugins/wizard/messages_es.js"></script>
<!-- Sweet-Alert  -->
<script src="<?php echo base_url(); ?>public/assets/plugins/sweetalert/sweetalert.min.js"></script>
<!-- <script src="<?php //echo base_url(); ?>public/assets/plugins/wizard/steps.js"></script> -->
<script src="<?php echo base_url(); ?>public/js/validation.js"></script>
<script src="<?php echo base_url(); ?>public/assets/plugins/dropify/dist/js/dropify.min.js"></script>
<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBw8R4L-CtMu9XuQBiymIEs6UEc715P2eA&callback=initMap" -->
    <!-- async defer></script> -->
<script src="<?php echo base_url(); ?>public/assets/plugins/sweetalert/sweetalert.min.js"></script>
<script src="<?php echo base_url(); ?>public/assets/plugins/sweetalert/jquery.sweet-alert.custom.js"></script>
<script>
	function(window, document, $) {
		"use strict";
		$("input,select,textarea").not("[type=submit]").jqBootstrapValidation()
	}(window, document, jQuery);
	
    $(document).ready(function() {
        // Basic
        $('.dropify').dropify();

        // Translated
        $('.dropify-fr').dropify({
            messages: {
                default: 'Glissez-déposez un fichier ici ou cliquez',
                replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                remove: 'Supprimer',
                error: 'Désolé, le fichier trop volumineux'
            }
        });

        // Used events
        var drEvent = $('#input-file-events').dropify();

        drEvent.on('dropify.beforeClear', function(event, element) {
            return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
        });

        drEvent.on('dropify.afterClear', function(event, element) {
            alert('File deleted');
        });

        drEvent.on('dropify.errors', function(event, element) {
            console.log('Has Errors');
        });

        var drDestroy = $('#input-file-to-destroy').dropify();
        drDestroy = drDestroy.data('dropify')
        $('#toggleDropify').on('click', function(e) {
            e.preventDefault();
            if (drDestroy.isDropified()) {
                drDestroy.destroy();
            } else {
                drDestroy.init();
            }
        })
        
        // acciones para el mapa
        // $("#google_maps").click(function(){
        //     alert('demo');
        // });      

    });
</script>