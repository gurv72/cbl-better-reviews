<div id="<?php echo $type; ?>_field_div">

	<input type="button" value="Add Subtype" onclick="<?php echo $type; ?>_add_field();">

	<?php if (!empty($subtypes)) { ?>
		<?php $counter = 0; ?>

		<?php foreach ($subtypes as $subtype => $subtype_value) { ?>

			<p id='<?php echo $type; ?>_input_text<?php echo $counter; ?>_wrapper' class="<?php echo $type; ?>_input_text">

			<?php //print_r($subtype_value); ?>

			<?php foreach ($subtype_value as $key => $value) { ?>

				<input type='text' name='<?php echo $section_name; ?>[subtype][<?php echo $counter; ?>][<?php echo $key; ?>]' value='<?php echo $value; ?>'>

			<?php } ?>

			<input type='button' value='Remove' onclick=remove_field('<?php echo $type; ?>_input_text<?php echo $counter; ?>');>

			</p>

			<?php $counter++; ?>

		<?php } ?>

	<?php } ?>

</div>

<script>

function <?php echo $type; ?>_add_field() {
	var total_text=document.getElementsByClassName("<?php echo $type; ?>_input_text");
	total_text=total_text.length+1;

	var parent = document.getElementById("<?php echo $type; ?>_field_div");

	console.log(parent);

	const p = document.createElement('p');
	p.setAttribute("id", "<?php echo $type; ?>_input_text"+total_text+"_wrapper");
	p.setAttribute("class", "<?php echo $type; ?>_input_text");
	parent.appendChild(p);

	const text1 = document.createElement('input');
	text1.setAttribute("type", "text");
	text1.setAttribute("name", "<?php echo $section_name; ?>[subtype]["+total_text+"][<?php echo $type; ?>_subtype]");
	//text1.setAttribute("class", "<?php echo $type; ?>_input_text");
	text1.setAttribute("placeholder", "Subtype");

	const text2 = document.createElement('input');
	text2.setAttribute("type", "text");
	text2.setAttribute("name", "<?php echo $section_name; ?>[subtype]["+total_text+"][<?php echo $type; ?>_subtype_name]");
	//text2.setAttribute("class", "<?php echo $type; ?>_input_text");
	text2.setAttribute("placeholder", "Label");

	const text3 = document.createElement('input');
	text3.setAttribute("type", "text");
	text3.setAttribute("name", "<?php echo $section_name; ?>[subtype]["+total_text+"][<?php echo $type; ?>_subtype_text]");
	//text3.setAttribute("class", "<?php echo $type; ?>_input_text");
	text3.setAttribute("placeholder", "Description");

	const button = document.createElement('BUTTON');
	var button_text = document.createTextNode("Remove");
  	button.appendChild(button_text);
	button.setAttribute("onclick", "remove_field('<?php echo $type; ?>_input_text"+total_text+"');");

	p.appendChild(text1);
	p.appendChild(text2);
	p.appendChild(text3);
	p.appendChild(button);
}

function remove_field(id) {

	document.getElementById(id+"_wrapper").outerHTML="";
}

</script>
