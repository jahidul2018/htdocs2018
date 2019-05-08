<?php if (! $this->_tpl_vars['Uploader']->GetReadOnly()): ?>
<?php if ($this->_tpl_vars['RenderText']): ?>
<?php if ($this->_tpl_vars['Uploader']->GetShowImage() && ! $this->_tpl_vars['HideImage']): ?>
<img src="<?php echo $this->_tpl_vars['Uploader']->GetLink(); ?>
"><br/>
<?php endif; ?>
<input checked="checked" type="radio" value="Keep" name="<?php echo $this->_tpl_vars['Uploader']->GetName(); ?>
_action"><?php echo $this->_tpl_vars['Captions']->GetMessageString('KeepImage'); ?>

<input type="radio" value="Remove" name="<?php echo $this->_tpl_vars['Uploader']->GetName(); ?>
_action"><?php echo $this->_tpl_vars['Captions']->GetMessageString('RemoveImage'); ?>

<input type="radio" value="Replace" name="<?php echo $this->_tpl_vars['Uploader']->GetName(); ?>
_action"><?php echo $this->_tpl_vars['Captions']->GetMessageString('ReplaceImage'); ?>
<br>
<input type="file" name="<?php echo $this->_tpl_vars['Uploader']->GetName(); ?>
_filename"
    onchange="if (this.form.<?php echo $this->_tpl_vars['Uploader']->GetName(); ?>
_action[2]) this.form.<?php echo $this->_tpl_vars['Uploader']->GetName(); ?>
_action[2].checked=true;">
<?php endif; ?>
<?php else: ?>
<?php if ($this->_tpl_vars['RenderText']): ?>
<?php if ($this->_tpl_vars['Uploader']->GetShowImage() && ! $this->_tpl_vars['HideImage']): ?>
<img src="<?php echo $this->_tpl_vars['Uploader']->GetLink(); ?>
"><br/>
<?php else: ?>
<a class="image" target="_blank" title="download" href="<?php echo $this->_tpl_vars['Uploader']->GetLink(); ?>
">Download file</a>
<?php endif; ?>
<?php endif; ?>
<?php endif; ?>