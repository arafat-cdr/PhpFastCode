<?php

/**
 * This is a
 * helper function
 * @param None
 * @return none
 **/

/**
 ******************************************
 * We write it as a function because
 * if we wanna hook any condition or
 * logic we wanna do it Here
 * @param None
 * @return login page
 *****************************************
 */
function login_form() {
	return route("login", false);
}
/**
 ******************************************
 * We write it as a function because
 * if we wanna hook any condition or
 * logic we wanna do it Here
 * @param None
 * @return dashboard Page
 *****************************************
 */
function login_success_redirect() {
	return route("dashboard", false);
}

function set_auth($data) {
	$_SESSION['Auth'] = $data;
	# check if the login success ...
	is_login();
}

function get_auth() {
	if (isset($_SESSION['Auth'])) {
		return $_SESSION['Auth'];
	}
	return false;
}

function is_logout() {

	if (empty($_SESSION['Auth'])) {

		header("location:" . login_form());
		exit();
	}
}

function is_login() {

	if (!empty($_SESSION['Auth'])) {
		header("location:" . login_success_redirect());
		exit();
	}

}

function has_login() {
	if (!empty($_SESSION['Auth'])) {
		return true;
	}
	return false;
}

function logout() {
	unset($_SESSION['Auth']);
	set_flush(TRUE, "info", " :) ", "Logout Successfull");
	is_logout();
}

# This Function Will logout Not allowed Role user
function not_allowed_to_dashboard($role) {
	if ($role == Auth('user_type')) {
		unset($_SESSION['Auth']);

		set_flush(TRUE, "danger", "Sorry! ", "You are Not Allowed That page");
		is_login();
	}
}

function Auth($field) {
	if (empty($_SESSION['Auth'])) {
		return false;
	}

	if (isset($_SESSION['Auth']->$field)) {
		return $_SESSION['Auth']->$field;
	}
	return false;
}
function refresh_auth($data) {
	$_SESSION['Auth'] = $data;
}