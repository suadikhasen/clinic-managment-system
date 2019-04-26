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

 // Route::get('/','HomeController@home');
  Route::get('/',function(){
 	 return view('hasen');
  });

Route::match(['get','post'],'/LogIn','LoginController@LoginControl')->name('Login')->middleware('throttle:3,1');
Route::get('home','HomeController@home')->name('Home');

/* Routes Accessible By Registerar */

Route::prefix('Registerars')->name('Registerar.')->middleware('Registerar')->group(function(){

	Route::get('{id}/LogOut','Registerar\LogOutController@LOgOut')->name('LogOut');
	Route::get('{id}/Profile','Registerar\ProfileController@ShowProfile')->name('Profile');
	Route::get('/Add_Patient','Registerar\PatientController@Add')->name('Add_Patient');
	Route::get('{id}/Search_Patient','Registerar\PatientController@Search_Patient')->name('Search_Patient');
	Route::get('{id1}/Send_Patient/{id2}','Registerar\PatientController@Send_Patient')->name('Send_Patient');
	Route::get('{id}/ChangeProfile','Common\ChangeProfileController@Index')->name('ChangeProfile');
	Route::post('{id}/UpdateProfile','Common\ChangeProfileController@UpdateProfile')->name('UpdateProfile');
	Route::get('{id}/UpdateImage','Common\ChangeProfileController@Show_Update_plate')->name('UpdateImage');
	Route::post('{id}/ImageUpdated','Common\ChangeProfileController@ImageUpdated')->name('ImageUpdated');
	Route::get('{id}/Show_Password_Template','Common\ChangeProfileController@Show_Password_Template')->name('Show_Password_Template');
	Route::post('{id}/ChangePassword','Common\ChangeProfileController@ChangePassword')->name('ChangePassword');
	
});

/* Routes Accessible By Doctors */
Route::prefix('Doctors')->name('Doctors.')->middleware('Doctors')->group(function(){
	Route::get('{id}/LogOut','Doctors\LogOutController@LogOut')->name('LogOut');

	Route::get('{id}/Profile','Doctors\ProfileController@ShowProfile')->name('Profile');

	Route::get('/SelectRoom','Common\RoomController@SelectRoom')->name('SelectRoom');

	Route::get('/Show_Patient_List','Doctors\PatientTaskController@Show_Patient_List')->name('Show_Patient_List');

	Route::get('{id1}/View_Patient_Data/{id2}','Doctors\PatientTaskController@View_Patient_Data')->name('View_Patient_Data');
	Route::get('{username}/Add_Patient_result/{clinic_id}','Doctors\PatientTaskController@Add_Patient_result')->name('Add_Patient_result');
	Route::post('{username}/Submit_Result/{clinic_id}','Doctors\PatientTaskController@Submit_Result')->name('Submit_Result');

	Route::get('{username}/Send_To_Phermacy/{clinic_id}','Doctors\PatientTaskController@Send_To_Phermacy')->name('Send_To_Phermacy');
	Route::get('Show_Medicine_Paper/{clinic_id}','Doctors\PatientTaskController@Show_Medicine_Paper')->name('Show_Medicine_Paper');
	Route::get('Labratory_Paper/{clinic_id}','Doctors\PatientTaskController@Labratory_Paper')->name('Labratory_Paper');
	Route::get('{doctor_id}/Send_To_Labratory/{clinic_id}','Doctors\PatientTaskController@Send_To_Labratory')->name('Send_To_Labratory');
	Route::get('Finish_Result/{clinic_id}','Doctors\PatientTaskController@Finish_Result')->name('Finish_Result');
	




});

/* Route Accessible By Phermacy */

Route::prefix('Phermacy')->name('Phermacy.')->middleware('Phermacy')->group(function(){
	Route::get('{id}/LogOut','Phermacy\LogOutController@LogOut')->name('LogOut');
	Route::get('{id}/Profile','Phermacy\ProfileController@ShowProfile')->name('Profile');
	Route::get('/SelectRoom','Common\RoomController@SelectRoom')->name('SelectRoom');
	Route::get('Show_Patient_List','Phermacy\PatientTaskController@Show_Patient_List')->name('Show_Patient_List');
	Route::get('/Show_Medical_Instruction/{clinic_id}','Phermacy\PatientTaskController@Show_Medical_Instruction')->name('Show_Medical_Instruction');
	Route::get('Finish_Patient/{clinic_id}','Phermacy\PatientTaskController@Finish_Patient')->name('Finish_Patient');

});

/* Route Accessible By Laboatorist */
Route::prefix('Labratory')->name('Labratory.')->middleware('Labratory')->group(function(){
	Route::get('{id}/LogOut','Labratory\LogOutController@LogOut')->name('LogOut');
	Route::get('{id}/Profile','Labratory\ProfileController@ShowProfile')->name('Profile');
	Route::get('/SelectRoom','Common\RoomController@SelectRoom')->name('SelectRoom');
	Route::get('/Show_Patient_List','Labratory\PatientTaskController@Show_Patient_List')->name('Show_Patient_List');
	Route::get('{username}/Show_Patient_Data/{clinic_id}','Labratory\PatientTaskController@Show_Patient_Data')->name('Show_Patient_Data');
	Route::get('{username}/Finish/{clinic_id}','Labratory\PatientTaskController@Finish')->name('Finish');
	Route::get('{username}/Add_Patient_Result/{clinic_id}','Labratory\PatientTaskController@Add_Patient_Result')->name('Add_Patient_Result');
	Route::get('/{username}/Submit_Result/{clinic_id}','Labratory\PatientTaskController@Submit_Result')->name('Submit_Result');

});