<?php

// Route::group(['middleware' => ['AuthMiddleware@index'],'prefix' => 'backend'], function() {
//     Route::any("/", "TestController@index", "home");
//     Route::get("/test", "TestController@index", "home2");
//     Route::get("/test/abc/{id}/{name}", "TestController@index", "testRouteName");
// });

// Route::group(['middleware' => ['AuthMiddleware@index', 'AuthMiddleware@check'], 'prefix' => 'prefix-seo'], function() {

//     Route::page("/", function(){
//         echo "You are in prefix";
//         pr(route("aaa"));
//        /* pr(core_crud());
//         pr(core_crud()->dbSelect("policy"));*/
//         // pr($coreCrud);

//         header("location:".route("journal"));
//         exit();
//     }, 'prefix');

//     Route::get("/aaa/bbb/ccc", "TestController@index", "journal");

//     Route::page("/aaa",function(){
//         $data2 = array();
//         view("website/home-view.php", compact('data2'));
//     }, "aaa3");

//     Route::page("/aaa/bbb",function(){
//         view("admin/admin.php");
//         // echo "I am A pGE rOUTE";
//     }, "aaa");

// });

// Route::any("/", "TestController@index", "homesss");
// Route::get("/page/abc/{id}/{action}", "TestController@index", "testRouteName2");
// Route::get("/post/abc/{id}/{name}", "TestController@index", "testRouteName3");
// Route::get("/api/abc/{id}/{slug}", "TestController@index", "testRouteName4");
// Route::get("/call/my-page/", "TestController@index", "testRouteName5");

// Route::get("/admin", "AdminController@index", "admin");

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

Route::page("/forget-password", function () {
	view("crm/auth/resetPassword.php");
}, 'forget-password');

Route::page("/client-registration", function () {
	view("crm/auth/clientRegistration.php");
}, "client-registration");

Route::page("/faq", function () {
	view("crm/pages/faq.php");
}, 'faq');


/*=======================================
=            CRM AJAX routes            =
=======================================*/

Route::page("/get-auth-data-ajax", function () {
	view("crm/ajax/getAuthDataAjax.php");
}, 'get-auth-data-ajax');

Route::page("/send-data-form-website", function () {
	view("crm/ajax/sendDataFormWebsiteAjax.php");
}, 'send-data-form-website');

Route::page("/feed-quote-form-website", function () {
	view("crm/ajax/feedQuoteFormWebsiteAjax.php");
}, 'feed-quote-form-website');

Route::page("/get-quote-id", function () {
	view("crm/ajax/getQuoteIdAjax.php");
}, "get-quote-id");

Route::page("/feed-crm-domains", function () {
	view("crm/ajax/feedCrmDomainAjax.php");
}, "feed-crm-domains");

/*=====  End of CRM AJAX routes  ======*/


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

	Route::page("/client-panel-client-details", function () {
	    view("crm/client_panel/clientDetails.php");
	}, 'client-panel-client-details');

	Route::page("/client-panel-jobs", function () {
	    view("crm/client_panel/clientJobs.php");
	}, 'client-panel-jobs');

	Route::page("/client-panel-invoices", function () {
	    view("crm/client_panel/clientInvoices.php");
	}, 'client-panel-invoices');

	/*=====  End of Client Panel  ======*/

	# Client Order Submit Route
	Route::page("/client-order-place", function () {
	    view("crm/order/order.php");
	}, 'client-order-place');

	Route::page("/client-order-place2", function () {
	    view("crm/order/order2.php");
	}, 'client-order-place2');
	# End Client Order Submit Route..

	# order download route
	Route::page("/client-order-download", function () {
	    view("crm/order/orderDownload.php");
	}, 'client-order-download');
	# end order download route
});

# Middleware for Admins and users ....
Route::group(['middleware' => ['AuthMiddleware@index']], function () {

	Route::page("/dashboard", function () {
		view("crm/dashboard/dashboard.php");
	}, 'dashboard');

	Route::page("/page", function () {
		view("crm/test.php");
	}, 'page');


	Route::page("/user-create", function () {
		view("crm/user/userCreate.php");
	}, 'user-create');

	Route::page("/user-list", function () {
		view("crm/user/userList.php");
	}, 'user-list');

	Route::page("/user-view", function () {
		view("crm/user/userView.php");
	}, 'user-view');

	Route::page("/user-profile", function () {
		view("crm/user/userProfile.php");
	}, 'user-profile');

	Route::page("/user-edit", function () {
		view("crm/user/userEdit.php");
	}, 'user-edit');

	# Client Routes
	Route::page("/client-create", function () {
		view("crm/client/clientCreate.php");
	}, 'client-create');

	Route::page("/client-list", function () {
		view("crm/client/clientList.php");
	}, 'client-list');

	Route::page("/client-view", function () {
		view("crm/client/clientView.php");
	}, 'client-view');

	Route::page("/client-edit", function () {
		view("crm/client/clientEdit.php");
	}, 'client-edit');
	# End client Routes

	Route::page("/group-add", function () {
		view("crm/group/groupAdd.php");
	}, 'group-add');

	Route::page("/group-list", function () {
		view("crm/group/groupList.php");
	}, 'group-list');

	Route::page("/group-edit", function () {
		view("crm/group/groupEdit.php");
	}, 'group-edit');

	/*Route::page("/job-status-add", function () {
		view("crm/job_status/jobStatusAdd.php");
	}, 'job-status-add');

	Route::page("/job-status-list", function () {
		view("crm/job_status/jobStatusList.php");
	}, 'job-status-list');

	Route::page("/job-status-edit", function () {
		view("crm/job_status/jobStatusEdit.php");
	}, 'job-status-edit');*/

	Route::page("/crm-config-add", function () {
		view("crm/crm_config/crmConfigAdd.php");
	}, 'crm-config-add');

	Route::page("/crm-config-edit", function () {
		view("crm/crm_config/crmConfigEdit.php");
	}, 'crm-config-edit');

	Route::page("/crm-config-list", function () {
		view("crm/crm_config/crmConfigList.php");
	}, 'crm-config-list');

	# mail template
	Route::page("/mail-template-list", function () {
		view("crm/mail_template/mailTemplateList.php");
	}, 'mail-template-list');
	Route::page("/mail-template-add", function () {
		view("crm/mail_template/mailTemplateAdd.php");
	}, 'mail-template-add');
	Route::page("/mail-template-edit", function () {
		view("crm/mail_template/mailTemplateEdit.php");
	}, 'mail-template-edit');
	# end mail template

	Route::page("/job-create", function () {
		view("crm/job/jobCreate.php");
	}, 'job-create');

	Route::page("/job-list", function () {
		view("crm/job/jobList.php");
	}, 'job-list');

	Route::page("/job-view", function () {
		view("crm/job/jobView.php");
	}, 'job-view');

	Route::page("/job-edit", function () {
		view("crm/job/jobEdit.php");
	}, 'job-edit');

	# send mail form mail template
	Route::page("/job-send-mail-from-template", function () {
		view("crm/job/sendMailFromTemplate.php");
	}, 'job-send-mail-from-template');

	/*======================================
	=            Invoice module            =
	======================================*/

	Route::page("/invoice-create", function () {
		view("crm/invoice/invoiceCreate.php");
	}, 'invoice-create');
	Route::page("/invoice-list", function () {
		view("crm/invoice/invoiceList.php");
	}, 'invoice-list');
	Route::page("/invoice-view", function () {
		view("crm/invoice/invoiceView.php");
	}, 'invoice-view');
	Route::page("/invoice-edit", function () {
		view("crm/invoice/invoiceEdit.php");
	}, 'invoice-edit');
	Route::page("/invoice-quick-edit", function () {
		view("crm/invoice/invoiceQuickEdit.php");
	}, 'invoice-quick-edit');

	/*=====  End of Invoice module  ======*/


	/*====================================
	=            Quote Module            =
	====================================*/

	Route::page("/quote-list", function () {
		view("crm/quote/quoteList.php");
	}, 'quote-list');

	Route::page("/quote-edit", function () {
		view("crm/quote/quoteEdit.php");
	}, 'quote-edit');

	Route::page("/quote-view", function () {
		view("crm/quote/quoteView.php");
	}, 'quote-view');

	// internal use...
	Route::page("/domain-list", function () {
		view("crm/crm_domain/domainList.php");
	}, "domain-list");

	/*=====  End of Quote Module  ======*/



	/*======================================
	=            All Ajax Route            =
	======================================*/

	Route::page("/job-send-mail-from-template-ajax", function () {
		view("crm/ajax/sendMailFormTemplateAjax.php");
	}, 'job-send-mail-from-template-ajax');

	Route::page("/invoice-client-data-ajax", function () {
		view("crm/ajax/invoiceClientDataAjax.php");
	}, 'invoice-client-data-ajax');

	Route::page("/invoice-job-code-description-ajax", function () {
		view("crm/ajax/getDescriptionOnJobCodeInvoiceAjax.php");
	}, 'invoice-job-code-description-ajax');

	Route::page("/change-status-from-job-list-ajax", function () {
		view("crm/ajax/changeStatusFormJobList.php");
	}, 'change-status-from-job-list-ajax');

	/*=====  End of All Ajax Route  ======*/


});

# For Not Found Url
Route::notFound(function () {
	/*$obj = new TestController();
    $obj->not_found();*/
	view("site/error/404.php");
	// echo "not found msg here";
});

/*=====  End of Crm Routes  ======*/