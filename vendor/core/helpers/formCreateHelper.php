<?php

# Set the Submitted Form Data in Session
# Here When Update Request We Set it Here
function set_form_session_data(array $data) {
	delete_form_session_data();
	$_SESSION["form_data_submit_or_update"] = $data;
}

function delete_form_session_data() {
	$_SESSION["form_data_submit_or_update"] = array();
}

# This Helper Function Help to Get Session data Form
function get_form_session_data($name) {

	if (isset($_SESSION["form_data_submit_or_update"])) {
		if (isset($_SESSION["form_data_submit_or_update"][$name])) {
			# check if it is a object
			# because it is a lazy loading object so return its it
			# The request is asking for id
			if (is_object($_SESSION["form_data_submit_or_update"][$name])) {
				return $_SESSION["form_data_submit_or_update"][$name]->id;
			}
			return $_SESSION["form_data_submit_or_update"][$name];
		}
	}

	return false;
}

function form_open($class = "", $id = "", $action = false, $method = "post", $file_upload = false, $attr = false) {
	if ($file_upload) {
		$file_upload = "enctype='multipart/form-data'";
	}
	echo <<<EOD
    <form id="$id" class="$class" action="$action" method="$method" $file_upload $attr>
EOD;
}

function form_close() {
	echo "\n</from>\n";
}

function form_hidden($name, $value)
{
    echo <<<eod
    <input type="hidden" name="$name" value="$value" id="$name">
eod;
}

function form_input($name, $required = true, $label_name = false, $type = "text", $placeholder = false, $main_div_class = "form-group row", $label_class = "col-lg-3 control-label text-lg-right pt-2", $label_wrapper = "strong", $parent_input_div_class = "col-lg-6", $input_class = "form-control") {

	$label_name_is = ucwords(str_replace("_", " ", $name));
	if ($label_name) {
		$label_name_is = ucwords($label_name);
	}

	# Adding the Wrapper
	if ($label_wrapper) {
		$label_name_is = "<$label_wrapper>" . $label_name_is . "</$label_wrapper>";
	}

	$placeholder_name_is = ucwords(str_replace("_", " ", $name));

	if ($placeholder) {
		$placeholder_name_is = ucwords($placeholder);
	}

	$required_is = NULL;
	if ($required) {
		$required_is = "required";
	}

	# Get the Value
	$value = get_form_session_data($name);

	echo <<<EOT
    <div class="$main_div_class">
    <label class="$label_class" for="$name">$label_name_is</label>
    <div class="$parent_input_div_class">
    <input type="$type" name="$name" value="$value" placeholder="$placeholder_name_is" class="$input_class" id="$name" $required_is>
    </div>
    </div>
EOT;
}

function form_input_date($name, $required = true, $label_name = false, $add_date_attr = "data-plugin-datepicker", $type = "text", $placeholder = false, $main_div_class = "form-group row", $label_class = "col-lg-3 control-label text-lg-right pt-2", $label_wrapper = "strong", $parent_input_div_class = "col-lg-6", $input_class = "form-control") {

	$label_name_is = ucwords(str_replace("_", " ", $name));
	if ($label_name) {
		$label_name_is = ucwords($label_name);
	}

	# Adding the Wrapper
	if ($label_wrapper) {
		$label_name_is = "<$label_wrapper>" . $label_name_is . "</$label_wrapper>";
	}

	$placeholder_name_is = ucwords(str_replace("_", " ", $name));

	if ($placeholder) {
		$placeholder_name_is = ucwords($placeholder);
	}

	$required_is = NULL;
	if ($required) {
		$required_is = "required";
	}

	# Get the Value
	$value = get_form_session_data($name);

	echo <<<EOT
    <div class="$main_div_class">
    <label class="$label_class" for="$name">$label_name_is</label>
    <div class="$parent_input_div_class">
    <input type="$type" name="$name" $add_date_attr value="$value" placeholder="$placeholder_name_is" class="$input_class" id="$name" $required_is>
    </div>
    </div>
EOT;
}

function form_input_file($name, $required = true, $multiple_file = false, $label_name = false, $add_date_attr = false, $main_div_class = "form-group row", $label_class = "col-lg-3 control-label text-lg-right pt-2", $label_wrapper = "strong", $parent_input_div_class = "col-lg-6", $input_class = "form-control") {

	$label_name_is = ucwords(str_replace("_", " ", $name));
	if ($label_name) {
		$label_name_is = ucwords($label_name);
	}

	# Adding the Wrapper
	if ($label_wrapper) {
		$label_name_is = "<$label_wrapper>" . $label_name_is . "</$label_wrapper>";
	}

	$required_is = NULL;
	if ($required) {
		$required_is = "required";
	}

    # if multiple file upload
    if($multiple_file){
        $multiple_file = "multiple";
        $name = $name."[]";
    }

	# Get the Value
	$value = get_form_session_data($name);

	echo <<<EOT
    <div class="$main_div_class">
    <label class="$label_class" for="$name">$label_name_is</label>
    <div class="$parent_input_div_class">

    <div class="fileupload fileupload-new" data-provides="fileupload">
        <div class="input-append">
            <div class="uneditable-input">
                <i class="fas fa-file fileupload-exists"></i>
                <span class="fileupload-preview"></span>
            </div>
            <span class="btn btn-default btn-file">
                <span class="fileupload-exists">Change</span>
                <span class="fileupload-new">Select file</span>
                <input type="file" name="$name" $add_date_attr  id="$name" $multiple_file $required_is />
                <span $input_class></span>
            </span>
            <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
        </div>
    </div>

    </div>
    </div>
EOT;
}

function form_textarea($name, $required = true, $label_name = false, $rows = 3, $placeholder = false, $main_div_class = "form-group row", $label_class = "col-lg-3 control-label text-lg-right pt-2", $label_wrapper = "strong", $parent_input_div_class = "col-lg-6", $input_class = "form-control") {

	$label_name_is = ucwords(str_replace("_", " ", $name));
    // if the name set as array remove the array sign
    $label_name_is = (str_replace("[]", "", $label_name_is));
	if ($label_name) {
		$label_name_is = ucwords($label_name);
	}

	# Adding the Wrapper
	if ($label_wrapper) {
		$label_name_is = "<$label_wrapper>" . $label_name_is . "</$label_wrapper>";
	}

    $placeholder_name_is = ucwords(str_replace("_", " ", $name));
	$placeholder_name_is = ucwords(str_replace("[]", "", $placeholder_name_is));

	if ($placeholder) {
		$placeholder_name_is = ucwords($placeholder);
	}

	$required_is = NULL;
	if ($required) {
		$required_is = "required";
	}

	# Get the Value
	$value = get_form_session_data(str_replace("[]", "", $name));

	echo <<<EOT
    <div class="$main_div_class">
    <label class="$label_class" for="$name">$label_name_is</label>
    <div class="$parent_input_div_class">
    <textarea name="$name" placeholder="$placeholder_name_is" class="$input_class" id="$name" $required_is rows="$rows">$value</textarea>
    </div>
    </div>
EOT;
}

function form_textarea_html($name, $required = true, $label_name = false, $rows = 3, $placeholder = false, $main_div_class = "form-group row", $label_class = "col-lg-3 control-label text-lg-right pt-2", $label_wrapper = "strong", $parent_input_div_class = "col-lg-6", $input_class = "form-control summernote") {

	$label_name_is = ucwords(str_replace("_", " ", $name));
	if ($label_name) {
		$label_name_is = ucwords($label_name);
	}

	# Adding the Wrapper
	if ($label_wrapper) {
		$label_name_is = "<$label_wrapper>" . $label_name_is . "</$label_wrapper>";
	}

	$placeholder_name_is = ucwords(str_replace("_", " ", $name));

	if ($placeholder) {
		$placeholder_name_is = ucwords($placeholder);
	}

	$required_is = NULL;
	if ($required) {
		$required_is = "required";
	}

	# Get the Value
	$value = get_form_session_data($name);

	echo <<<EOT
    <div class="$main_div_class">
    <label class="$label_class" for="$name">$label_name_is</label>
    <div class="$parent_input_div_class">
    <textarea name="$name" placeholder="$placeholder_name_is" class="$input_class" id="$name" data-plugin-summernote data-plugin-options='{ "height": 180, "codemirror": { "theme": "ambiance" } }' $required_is rows="$rows">$value</textarea>

    </div>
    </div>
EOT;
}

function form_select($name, array $value, $required = true, $label_name = false, $default_select = false, $main_div_class = "form-group row", $label_class = "col-lg-3 control-label text-lg-right pt-2", $label_wrapper = "strong", $parent_input_div_class = "col-lg-6", $input_class = "form-control populate") {

    $label_name_is = ucwords(str_replace("_", " ", $name));
    // if the name set as array remove the array sign
    $label_name_is = (str_replace("[]", "", $label_name_is));

	if ($label_name) {
		$label_name_is = ucwords($label_name);
	}

	# Adding the Wrapper
	if ($label_wrapper) {
		$label_name_is = "<$label_wrapper>" . $label_name_is . "</$label_wrapper>";
	}

	$required_is = NULL;
	if ($required) {
		$required_is = "required";
	}

	# Get the Value
	$select_value = get_form_session_data(str_replace("[]", "", $name));

	echo <<<EOT
        <div class="$main_div_class">
        <label class="$label_class" for="$name">$label_name_is</label>
        <div class="$parent_input_div_class">
        <select data-plugin-selectTwo name="$name" class="$input_class" id="$name" $required_is>
EOT;
	if ($value) {
		# This is the Default One
		echo "<option value>--Select One--</option>";

		foreach ($value as $k => $v) {
			if (in_array("$k", array($select_value, $default_select))) {
				echo '<option value="' . $k . '" selected>' . $v . '</option>';
			} else {
				echo '<option value="' . $k . '">' . $v . '</option>';
			}

		}

	}

	echo <<<EOT
        </select>
        </div>
        </div>
EOT;

}


function form_select_multiple($name, array $value, $required = true, $label_name = false, $default_select = false, $main_div_class = "form-group row", $label_class = "col-lg-3 control-label text-lg-right pt-2", $label_wrapper = "strong", $parent_input_div_class = "col-lg-6", $input_class = "form-control populate") {

    $label_name_is = ucwords(str_replace("_", " ", $name));
    // if the name set as array remove the array sign
    $label_name_is = (str_replace("[]", "", $label_name_is));

    if ($label_name) {
        $label_name_is = ucwords($label_name);
    }

    # Adding the Wrapper
    if ($label_wrapper) {
        $label_name_is = "<$label_wrapper>" . $label_name_is . "</$label_wrapper>";
    }

    $required_is = NULL;
    if ($required) {
        $required_is = "required";
    }

    # Get the Value
    $select_value = get_form_session_data(str_replace("[]", "", $name));
    // Make the data as array ...
    $select_value =  explode(",", $select_value);
    echo <<<EOT
        <div class="$main_div_class">
        <label class="$label_class" for="$name">$label_name_is</label>
        <div class="$parent_input_div_class">
        <select data-plugin-selectTwo name="$name" class="$input_class" id="$name" $required_is multiple>
EOT;
    if ($value) {
        # This is the Default One
        foreach ($value as $k => $v) {
            if (in_array("$k", array_merge( $select_value, [$default_select])) ) {
                echo '<option value="' . $k . '" selected>' . $v . '</option>';
            } else {
                echo '<option value="' . $k . '">' . $v . '</option>';
            }

        }

    }

    echo <<<EOT
        </select>
        </div>
        </div>
EOT;

}

function radio_checkbox_wrapper_start($name = "chekbox", $label_wrapper = "strong", $main_div_class = "form-group row", $label_class = "col-lg-3 control-label text-lg-right pt-2") {
	$label_for = str_replace(" ", "_", $name);

	if ($label_wrapper) {
		$name = "<$label_wrapper>{$name}</$label_wrapper>";
	}

	echo <<<EOD
    <div class="$main_div_class">
    <label class="$label_class" for="$label_for">$name</label>
EOD;
}

function radio_checkbox_wrapper_end() {
	echo "</div>";
}

function form_checkbox($name, $value, $label_name = false, $id = false, $required = true, $cheked = false, $main_div_class = "default", $label_wrapper = "strong") {

	$main_div_class_is = "checkbox-custom checkbox-";
	$main_div_class_is .= $main_div_class;

	$label_name_is = ucwords(str_replace("_", " ", $value));
	if ($label_name) {
		$label_name_is = ucwords($label_name);
	}

	# Id
	$id_is = str_replace(" ", "_", $value);
	if ($id) {
		$id_is = $id;
	}

	# Adding the Wrapper
	if ($label_wrapper) {
		$label_name_is = "<$label_wrapper>" . $label_name_is . "</$label_wrapper>";
	}

	$required_is = NULL;
	if ($required) {
		$required_is = "required";
	}

	# Is Checked
	$is_cheked = NULL;
	if ($cheked) {
		$is_cheked = "checked";
	}

	$value_is = get_form_session_data($name);
	if ($value == $value_is) {

		$is_cheked = "checked";
	}

	echo <<<EOD
    <div class="$main_div_class_is" style="margin-right: 20px;">
        <input type="checkbox" name="$name" value="$value" $is_cheked id="$id_is" $required_is>
        <label for="$id_is">$label_name_is</label>
    </div>
EOD;

}

function form_radio($name, $value, $label_name = false, $cheked = false, $id = false, $required = false, $main_div_class = "default", $label_wrapper = "strong") {

	$main_div_class_is = "radio-custom radio-";
	$main_div_class_is .= $main_div_class;

	$label_name_is = ucwords(str_replace("_", " ", $value));
	if ($label_name) {
		$label_name_is = ucwords($label_name);
	}

	# Id
	$id_is = str_replace(" ", "_", $value);
	if ($id) {
		$id_is = $id;
	}

	# Adding the Wrapper
	if ($label_wrapper) {
		$label_name_is = "<$label_wrapper>" . $label_name_is . "</$label_wrapper>";
	}

	$required_is = NULL;
	if ($required) {
		$required_is = "required";
	}

	# Is Checked
	$is_cheked = NULL;
	if ($cheked) {
		$is_cheked = "checked";
	}

	$value_is = get_form_session_data($name);
	if ($value == $value_is) {

		$is_cheked = "checked";
	}

	echo <<<EOD
    <div class="$main_div_class_is" style="margin-right: 20px;">
        <input type="radio" name="$name" value="$value" $is_cheked  id="$id_is" $required_is>
        <label for="$id_is">$label_name_is</label>
    </div>
EOD;

}

function form_submit($name = "submit", $value = false, $input_class = "success", $label_class = "col-md-4", $parent_input_div_class = "col-lg-6", $main_div_class = "form-group row") {
	$value_is = $name;
	if ($value) {
		$value_is = $value;
	}

	$input_class_is = "btn btn-";
	$input_class_is .= $input_class;

	echo <<<EOT
    <div class="$main_div_class">
    <div class="$parent_input_div_class">
    <input type="submit" name="$name" value="$value_is" class="$input_class_is" id="$name">
    </div>
    </div>
EOT;
}