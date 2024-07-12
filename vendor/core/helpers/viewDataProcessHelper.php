<?php
function remove_data($view_data, array $remove_form_view = []) {
	# Remove the Data form details Obj..
	if ($remove_form_view) {
		foreach ($remove_form_view as $k => $v) {
			if (property_exists($view_data, $v)) {
				unset($view_data->$v);
			}
		}
	}

	return $view_data;
}