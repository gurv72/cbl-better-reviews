
<div id="<?php echo $type; ?>_field_div">
	<input type="button" value="Add Subtype" onclick="<?php echo $type; ?>_add_field();">
</div>

<?php if (!empty($subtypes)) { ?>
<?php $counter = 0; ?>

<?php foreach ($subtypes as $subtype => $subtype_value) { ?>

	<p id='<?php echo $type; ?>_input_text<?php echo $counter; ?>_wrapper'>

	<?php //print_r($subtype_value); ?>

	<?php foreach ($subtype_value as $key => $value) { ?>

		<input type='text' name='<?php echo $section_name; ?>[subtype][<?php echo $counter; ?>][<?php echo $key; ?>]' value='<?php echo $value; ?>'>

	<?php } ?>

	</p>

	<input type='button' value='Remove' onclick=remove_field('<?php echo $type; ?>_input_text<?php echo $counter; ?>');>

<?php } ?>


<?php } ?>

<script>

function <?php echo $type; ?>_add_field() {
	var total_text=document.getElementsByClassName("<?php echo $type; ?>_input_text");
	total_text=total_text.length+1;
	document.getElementById("<?php echo $type; ?>_field_div").innerHTML=document.getElementById("<?php echo $type; ?>_field_div").innerHTML+"<p id='<?php echo $type; ?>_input_text"+total_text+"_wrapper'><input type='text' name='<?php echo $section_name; ?>[subtype]["+total_text+"][<?php echo $type; ?>_subtype]' class='<?php echo $type; ?>_input_text' id='<?php echo $type; ?>_input_text_subtype"+total_text+"' placeholder='Subtype' value=''><input type='text' name='<?php echo $section_name; ?>[subtype]["+total_text+"][<?php echo $type; ?>_subtype_name]' class='<?php echo $type; ?>_input_text' id='<?php echo $type; ?>input_text_name"+total_text+"' placeholder='Subtype Name'><input type='text' name='<?php echo $section_name; ?>[subtype]["+total_text+"][<?php echo $type; ?>_subtype_text]' class='<?php echo $type; ?>_input_text' id='<?php echo $type; ?>_input_text_description"+total_text+"_description' placeholder='Subtype Description'><input type='button' value='Remove' onclick=remove_field('<?php echo $type; ?>_input_text"+total_text+"');></p>";
}

function remove_field(id) {
	document.getElementById(id+"_wrapper").outerHTML="";
}

</script>
