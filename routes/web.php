<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
// Route::resource('company', 'CompanyController');

Route::get('/registered', function () {
    return view('RegisteredUser');
});

/********* routes for reports ***********/ 

Route::get('/reportshomepage', [
    'uses' => 'ReportsController@allreports',
    'as' => 'reports.inbox'
]);

Route::get('reports/show/{id}', [
    'uses' => 'ReportsController@showReport',
    'as' => 'report.show'
]);

Route::get('reports/upload', [
    'uses' => 'ReportsController@reportCreate',
    'as' => 'report.upload'
]);


/********* routes for files that are uploaded with reports ***********/

Route::get('/download/{file}', [
    'uses' => 'FileController@download',
    'as' => 'download'
]);

Route::post('file/upload/store', 'FileController@fileStore');

Route::post('file/delete', 'FileController@fileDestroy');


/********* Company Manager ***********/


Route::get('/createcompany', function () {
    return view('CreateCompany');
});

Route::post('/createdcompany', [
    'uses' => 'CompanyController@store',
    'as' => 'company.store'
]);

Route::get('/joincompany', function () {
    return view('JoinCompany');
});

Route::get('/companytojoin', [
    'uses' => 'CompanyController@join',
    'as' => 'company.join'
]);


/********* routes for requests ***********/

Route::post('/requestscreate', [                               
    'uses' => 'RequestsController@create',
    'as' => 'request.create'
]);

Route::get('/submit_requests', [
    'uses' => 'CompanyController@findAdmin',
    'as' => 'request.submit'
]);

Route::get('requests/show/user/{id}', [
    'uses' => 'RequestsController@showRequser',
    'as' => 'request.showUser'
]);

Route::get('/requestsinbox', [
    'uses' => 'RequestsController@allrequests',
    'as' => 'requests.inbox'
]);

/********* routes for requests (Admin side) ***********/

Route::get('requests/show/admin/{id}', [
    'uses' => 'RequestsController@showReqadmin',
    'as' => 'request.showAdmin'
]);

Route::post('/requests/create/respond/{id}', [
    'uses' => 'RequestsController@createrespond',
    'as' => 'admin.respond'
]);

Route::get('/requests/reject/{id}', [
    'uses' => 'RequestsController@rejectreq',
    'as' => 'request.reject'
]);

Route::get('/requests/accept/{id}', [
    'uses' => 'RequestsController@acceptreq',
    'as' => 'request.accept'
]); 


/********* User Profile ***********/

Route::get('profile/{id}', 'UsersController@create');

Route::post('profile/{id}', 'UsersController@store');

});

/********* User's Additional Info ***********/

Route::post('/userinfo/{id}', [
    'uses' => 'UsersInfoController@storeinfo',
    'as' => 'store.info'
]);

Route::get('/userprofile/{id}', [
    'uses' => 'UsersController@findprofile',
    'as' => 'profile.find'
]);


/********* Admin Dashboard ***********/

Route::get('/userslist',[
    'uses'=>'UsersController@userslist',
    'as'=>'users.list'
]);

/********* User Invitation ***********/

Route::post('invite', 'InviteController@process')->name('process');

Route::get('accept/{token}', 'InviteController@accept')->name('accept');

Route::get('/inviteaccepted', function () {
    return view('inviteaccepted');
});

/********* Change Password ***********/

Route::get('/changepassword','HomeController@showChangePasswordForm');

Route::post('/changePassword','HomeController@changePassword')->name('changePassword');


/********* Leave Requests ***********/

Route::post('/leavereqcreate', [                               
    'uses' => 'LeavereqController@create',
    'as' => 'leavereq.create'
]);

Route::get('/submit_leavereq', [
    'uses' => 'CompanyController@findAdmin2',
    'as' => 'leavereq.submit'
]);

Route::get('leavereqs/show/user/{id}', [
    'uses' => 'LeavereqController@showRequser',
    'as' => 'leavereq.showUser'
]);

Route::get('/leavereqsinbox', [
    'uses' => 'LeavereqController@allrequests',
    'as' => 'leavereq.inbox'
]);

Route::get('leavereq/show/admin/{id}', [
    'uses' => 'LeavereqController@showReqadmin',
    'as' => 'leavereq.showAdmin'
]);

Route::post('/leavereq/create/respond/{id}', [
    'uses' => 'LeavereqController@createrespond',
    'as' => 'admin.respondleave'
]);

Route::get('/leavereq/reject/{id}', [
    'uses' => 'LeavereqController@rejectreq',
    'as' => 'leavereq.reject'
]);

Route::get('/leavereq/accept/{id}', [
    'uses' => 'LeavereqController@acceptreq',
    'as' => 'leavereq.accept'
]); 