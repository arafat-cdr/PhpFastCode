<?php
class AuthMiddleware {
	public static function index() {
		# checking the Login ...
		# Only login users are Allowed Here
		# If a Client Login then Redirect
		is_logout();

		# It is Gret haaa ? Lot of task We did in one Place .....
		# Code is poetry is not it ??? Yes bro It Coll I know ...
		# arafat.dml@gmail.com

		if(Auth("user_type") == "client"){
		    // redirect(route("client-panel-profile", false));
		    redirect(route("client-order-place2", false));
		}

	}

	public static function login_user(){
		# checking the Login ...
		# Only login users are Allowed Here
		# If a Client Login then Redirect
		is_logout();
	}
}