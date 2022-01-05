<div style="padding-bottom:20px;">
<label><?php echo $field_name; ?></label><br />
<input type="text" id="<?php echo $field_value; ?>" name="<?php echo $section_name; ?>[<?php echo $field_value; ?>]" value="<?php if (!empty($field_text)) { echo $field_text; } ?>" placeholder="<?php echo $field_name; ?>">
</div>
