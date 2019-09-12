<script src="<?php echo base_url(); ?>public/assets/plugins/moment/moment.js"></script>
<!-- <script src="<?php //echo base_url(); ?>public/assets/plugins/wizard/jquery.steps.min.js"></script> -->
<script src="<?php echo base_url(); ?>public/assets/plugins/wizard/jquery.validate.min.js"></script>
<script src="<?php echo base_url(); ?>public/assets/plugins/wizard/messages_es.js"></script>
<!-- Sweet-Alert  -->
<script src="<?php echo base_url(); ?>public/assets/plugins/sweetalert/sweetalert.min.js"></script>
<!-- <script src="<?php //echo base_url(); ?>public/assets/plugins/wizard/steps.js"></script> -->
<script src="<?php echo base_url(); ?>public/js/validation.js"></script>
<script src="<?php echo base_url(); ?>public/assets/plugins/dropify/dist/js/dropify.min.js"></script>
<script>
	
    $(document).ready(function() {
        // Basic
        // $('.dropify').dropify();

        $('.dropify').dropify({
            messages: {
                'default': 'Arrastre un archivo o haga click',
                'replace': 'Arrastre un archivo para reemplazar',
                'remove':  'Remove',
                'error':   'Ooops, algo anda mal.',
                'imageFormat': 'CRT The image format is not allowed ({{ value }} only).'
            },
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