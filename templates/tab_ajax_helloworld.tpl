<fieldset>

    <legend>Hello World</legend>

        {jrCore_module_url module="jrHelloWorld" assign="murl"}

        <div class="block" style="width:100%;clear:both">
        
            <div style="float:left;width:25%;padding:20px;text-align:center">
                <a href="javascript:void(0);" onclick="jrHelloWorld_insert_text();" title="insert Hello World">insert Hello World
                </a>
            </div>
        </div>

        <br>

</fieldset>

<script type="text/javascript">
    function jrHelloWorld_insert_text() {
        tinyMCEPopup.execCommand('mceInsertContent', false, '[jrEmbed module="jrHelloWorld"]');
		tinyMCEPopup.close();
    }
</script>
