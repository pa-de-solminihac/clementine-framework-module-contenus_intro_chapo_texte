<script type="text/javascript">
    jQuery('textarea.editor').ckeditor(
        function () {}, 
        {
            language: 'fr',
            contentsCss: ['<?php echo __WWW_ROOT_SITE__; ?>/skin/css/style.css', '<?php echo __WWW_ROOT_SITE__; ?>/skin/css/style_surcharges.css'],
            contentsLanguage: '<?php echo $request->LANG; ?>',
            scayt_autoStartup: false
        }
    ); 
</script>
