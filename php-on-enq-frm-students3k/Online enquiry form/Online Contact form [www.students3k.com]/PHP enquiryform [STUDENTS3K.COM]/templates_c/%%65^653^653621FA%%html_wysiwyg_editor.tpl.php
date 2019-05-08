<?php if (! $this->_tpl_vars['Editor']->GetReadOnly()): ?>
<?php if ($this->_tpl_vars['RenderText']): ?>
<textarea class="html_wysiwyg"
  id="<?php echo $this->_tpl_vars['Editor']->GetName(); ?>
"
  name="<?php echo $this->_tpl_vars['Editor']->GetName(); ?>
"
  <?php echo $this->_tpl_vars['Validators']['InputAttributes']; ?>
>
<?php echo $this->_tpl_vars['Editor']->GetValue(); ?>

</textarea>
<?php endif; ?>
<?php if ($this->_tpl_vars['RenderScripts']): ?>
<?php if ($this->_tpl_vars['RenderText']): ?>
<script type="text/javascript">
<?php endif; ?>
$('#<?php echo $this->_tpl_vars['Editor']->GetName(); ?>
').tinymce({
    script_url : 'libs/jquery/tiny_mce/tiny_mce.js',
    theme : "advanced",

    theme_advanced_buttons1 : 
        "bold,italic,underline,strikethrough" + ",|," + 
        "justifyleft,justifycenter,justifyright,justifyfull" + ",|," + 
        "styleselect,formatselect,fontselect,fontsizeselect",

    theme_advanced_buttons2 : 
        "bullist,numlist" + ",|," + 
        "outdent,indent,blockquote" + ",|," + 
        "undo,redo" + ",|," + 
        "link,unlink,anchor,image,cleanup,help,code",

    theme_advanced_buttons3 : 
        <?php if ($this->_tpl_vars['Editor']->GetAllowColorControls()): ?>
        "forecolor,backcolor" + ",|," + 
        <?php endif; ?>
        "hr,removeformat,visualaid" +  ",|," + 
        "sub,sup" + ",|," + 
        "charmap",

    theme_advanced_toolbar_location : "top",
    theme_advanced_toolbar_align : "left",
    theme_advanced_statusbar_location : "bottom",
    theme_advanced_resizing : true
   });
<?php if ($this->_tpl_vars['RenderText']): ?>
</script>
<?php endif; ?>
<?php endif; ?>
<?php else: ?>
<?php if ($this->_tpl_vars['RenderText']): ?>
<?php echo $this->_tpl_vars['Editor']->GetValue(); ?>

<?php endif; ?>
<?php endif; ?>