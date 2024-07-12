### PhpFastCode a Simple Php Framework For 
	* Wriiten Small and High Performance Software
	* It is Fully Customizable Software


### Core  Features
	* You can use MVC
	* Or You can use Route By Directly Point Which View To Use
	* It has WordPress System Plugin You can use Plugin Also
	* Also Can Filter data before/After Send
	* Smtp
	* Databse Migration



### Helpers

	* It has
	* Array Helper
	* Auth Helper
	* Datetime Calculation Helper
	* content Helper
	* Encrypt/Decrypt Helper
	* Error Helper
	* Debug Helper
	* File Upload Helper
	* Form-Validation Helper
	* Database Helper
	* Password Helper (random Password Generation Helper also)
	* Pagination Helper
	* Query Helper
	* Session Helper
	* And Many More

### It Has a Config Module
	* Arafat Config Module You can use as Wp Option 

```php
	<?php

	// save data to config
	ArafatConfigModule::getInstance()->update_config(1, 'my_key', 'Hello There');
	// delete data from config
	ArafatConfigModule::getInstance()->delete_previous_must_using_id_key(1, 'my_key');

	// Retrive my saved logo list will retrive all entry
	$logo = ArafatConfigModule::getInstance()->get_config_by_data_key('footer_momo_img');

	// will retrive the first data_value from db
	$logo = ArafatConfigModule::getInstance()->get_single_val($logo);

	// Retrive my saved logo single will retrive single entry
	$logo = ArafatConfigModule::getInstance()->get_config_by_data_key_single('footer_momo_img');
	// will retrive the first data_value from db
	$logo = ArafatConfigModule::getInstance()->get_single_val($logo);

	# Lets Upload a File That we will use
	# A file can be any file .. img pdf docs any kind of files

	$path = public_path('img');
	$db_img_path = 'img';

	ArafatConfigModule::getInstance()->update_config_file($_FILES, $path, $db_img_path, 0, 'footer_momo_img');

	// Enjoy it ... 
```



### It has Support of Route

```php
<?php

Route::group(['middleware' => ['AuthMiddleware@index'],'prefix' => 'backend'], function() {
    Route::any("/", "TestController@index", "home");
    Route::get("/test", "TestController@index", "home2");
    Route::get("/test/abc/{id}/{name}", "TestController@index", "testRouteName");
});

Route::group(['middleware' => ['AuthMiddleware@index', 'AuthMiddleware@check'], 'prefix' => 'prefix-seo'], function() {

    Route::page("/", function(){
        echo "You are in prefix";
        pr(route("aaa"));
       /* pr(core_crud());
        pr(core_crud()->dbSelect("policy"));*/
        // pr($coreCrud);

        header("location:".route("journal"));
        exit();
    }, 'prefix');

    Route::get("/aaa/bbb/ccc", "TestController@index", "journal");

    Route::page("/aaa",function(){
        $data2 = array();
        view("website/home-view.php", compact('data2'));
    }, "aaa3");

    Route::page("/aaa/bbb",function(){
        view("admin/admin.php");
        // echo "I am A pGE rOUTE";
    }, "aaa");

});

Route::any("/", "TestController@index", "homesss");
Route::get("/page/abc/{id}/{action}", "TestController@index", "testRouteName2");
Route::get("/post/abc/{id}/{name}", "TestController@index", "testRouteName3");
Route::get("/api/abc/{id}/{slug}", "TestController@index", "testRouteName4");
Route::get("/call/my-page/", "TestController@index", "testRouteName5");

Route::get("/admin", "AdminController@index", "admin");

/*==================================
=            Crm Routes          =
==================================*/

# Default  Route
Route::page("/", function () {
	redirect(route("home", false));
}, 'default');


Route::page('/home', function(){
	echo 'Hello World';
}, 'home');

Route::page("/user-login", function () {
	view("crm/auth/login.php");
}, 'login');






// End Default CRM routes


/**
 ******************************************************
 * All the Routes That Is Only Acces After
 * Login is Inside The Below Middleware
 * Group .....
 * Create From Scratch
 * @author arafat.dml@gmail.com
 * @package arafat own php Framework
 * It use the Routing System that
 * Created Form Scratch
 ******************************************************
 **/

# Middleware for login user ...
Route::group(['middleware' => ['AuthMiddleware@login_user']], function () {

	Route::page("/user-logout", function () {
		// call the Logout...
		logout();
	}, 'logout');

	Route::page("/invoice-print", function () {
		view("crm/invoice/invoicePrint.php");
	}, 'invoice-print');

	/*====================================
	=            Client Panel            =
	====================================*/

	Route::page("/client-panel-profile", function () {
	    view("crm/client_panel/clientProfile.php");
	}, 'client-panel-profile');


});

# For Not Found Url
Route::notFound(function () {
	/*$obj = new TestController();
    $obj->not_found();*/
	view("site/error/404.php");
	// echo "not found msg here";
});

/*=====  End of Crm Routes  ======*/

```



### We can use Controller Like This way

```php
<?php
class TestController extends BaseController{
    public function index($one = NULL, $two = NULL){
        echo "I am form Controller my params are {$one}, {$two}";
        $data = array("hello", "here", "there");
        $data2 = array("tigher", "lion", "horse");

        // view("website/home-view.php", compact('data') );
        // or
        // view("website/home-view.php", array("name" => $data) );

        view("website/home-view.php", compact('data2') );
    }

    public function not_found(){
        echo "<br/> I think you are lost here </br/>";
    }
}

```


### We can Use Middleware 
	* 1. After Middleware
	* 2. Before Middleware

### Example of "Before" Middleware For Authcheck

```php
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

```

### We can Use Model Also


### Database Migration Example
	



### Smtp Example
