{* for the jrEmbed module to add a tab to the tinymce popup *}
{jrCore_module_url module="jrHelloWorld" assign="murl"}
<script type="text/javascript">
    function jrHelloWorld_load_the_tab(page) {
        $('#jrHelloWorld_holder').load(core_system_url + '/{$murl}/tab/p='+ page);
    }
    $(document).ready(function(){
        jrHelloWorld_load_the_tab(1);
    });
</script>

<div id="jrHelloWorld_holder">
    {jrCore_lang module="jrCore" id="73" default="working..." assign="alt"}
    <div style="padding:12px;">
        {jrCore_image module="jrEmbed" image="spinner.gif" width="24" height="24" alt=$alt}
    </div>
</div>