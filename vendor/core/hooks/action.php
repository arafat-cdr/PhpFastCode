<?php
$actions = array();

function pp($data) {
	echo "<pre>";
	print_r($data);
	echo "</pre>";
}

function add_action($action, $fun, $priority = 10, $num_args = false, $dependency = false) {
	global $actions;
	$action_array = array(
		'action_name' => $action,
		'function' => $fun,
		'priority' => $priority,
		'num_args' => $num_args,
		'dependency' => $dependency,
	);
	if (!isset($actions[$action])) {
		$actions[$action] = array();
	}
	array_push($actions[$action], $action_array);

}

function do_action($action, ...$arg) {
	global $actions;
	$call_back_res = array();
	# find it in the actions array
	if (@array_key_exists($action, $actions)) {
		// pp($arg);
		// now call all the calbacks of the specific action
		foreach ($actions[$action] as $action_name) {
			if ($arg) {
				$call_back_res[] = call_user_func_array($action_name["function"], $arg);
			} else {
				$call_back_res[] = call_user_func($action_name["function"]);
			}
		}
		# My action is Executed ...
		if (did_action($action) === false) {
			$actions[$action]['action_did'] = 1;
		}

		return $call_back_res;
	}
}

function did_action($action) {
	global $actions;
	if (@array_key_exists($action, $actions)) {

		if (!isset($actions[$action]['action_did'])) {
			$actions[$action]['action_did'] = 0;
			return false;
		} else if ($actions[$action]['action_did'] == 1) {
			$actions[$action]['action_did'] += 1;
			return $actions[$action]['action_did'];
		}

	}
}

/**
* return the unique signature
* please Do not Change it .
* We need the signature to run the crm and api smoothly
* @author arafat.dml@gmail.com
*/

function crm_signature(){
	$crm_signature_is = "SAJIT_CRM_SIGNATURE_BY_CRM_AUTHOR_ARAFAT_16_AUG_2020_02_30_42_PM";
	return $crm_signature_is;
}

/**
* return the unique domain
* please Do not Change it .
* We need the domain to run the crm and api smoothly
* @author arafat.dml@gmail.com
*/
function crm_domain(){
	$crm_domain = "http://localhost/arafat-php-framework";

	return $crm_domain;
}
