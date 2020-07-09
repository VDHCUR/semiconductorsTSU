<?php


Route::get('/', 'NewsController@mainpage');

Route::get('/about', function (){
    return view('about');
});

Route::get('/student', function (){
    return view('student');
});

Route::get('/science', function (){
    return view('science');
});

Route::get('/admin', function (){
    return view('admin.index');
})->middleware('auth', 'admin');

Route::get('/admin/news', 'NewsController@admin')->middleware('auth', 'admin');
Route::get('/admin/employees', 'EmployeesController@admin')->middleware('auth', 'admin');
Route::get('/admin/profiles', 'ProfilesController@admin')->middleware('auth', 'admin');
Route::get('/admin/projects', 'ProjectsController@admin')->middleware('auth', 'admin');
Route::get('/admin/publications', 'PublicationsController@admin')->middleware('auth', 'admin');
Route::get('/admin/coop', 'CoopsController@admin')->middleware('auth', 'admin');
Route::get('/admin/aspirant', 'AspirantInfosController@admin')->middleware('auth', 'admin');
Route::get('/admin/history', 'NewsController@history_admin')->middleware('auth', 'admin');


Route::get('/news', 'NewsController@index');
Route::post('/news', 'NewsController@store')->middleware('auth', 'admin');
Route::get('/news/create', 'NewsController@create')->middleware('auth', 'admin');
Route::get('/news/{new}/edit', 'NewsController@edit')->middleware('auth', 'admin');
Route::get('/news/{new}', 'NewsController@show');
Route::patch('/news/{new}', 'NewsController@update')->middleware('auth', 'admin');
Route::delete('/news/{new}', "NewsController@destroy")->middleware('auth', 'admin');
Route::get('/gallery', 'NewImagesController@gallery');

Route::get('/register/success', 'Auth\RegisterController@success')->middleware('auth', 'admin');
Route::get('/profile', 'EmployeesController@self')->middleware('auth');
Route::post('/profile/avatar', 'EmployeesController@avatar_update')->middleware('auth');
Route::get('/profile/edit', 'EmployeesController@self_edit')->middleware('auth');
Route::post('/profile/upload', 'EmployeesController@upload_doc')->middleware('auth');
Route::delete('/profile/docs/{doc}', 'EmployeesController@delete_doc')->middleware('auth');
Route::get('/employees', 'EmployeesController@index');
Route::get('/employees/{employee}', 'EmployeesController@show');
Route::delete('employees/{employee}', 'EmployeesController@destroy')->middleware('auth', 'admin');
Route::get('/employees/{employee}/edit', 'EmployeesController@edit')->middleware('auth', 'admin');
Route::patch('/employees/{employee}', 'EmployeesController@update')->middleware('auth', 'admin');

Auth::routes();

Route::get('/profiles', 'ProfilesController@index');
Route::post('/profiles', 'ProfilesController@store')->middleware('auth', 'admin');
Route::get('/profiles/create', 'ProfilesController@create')->middleware('auth', 'admin');
Route::get('/profiles/{profile}/edit', 'ProfilesController@edit')->middleware('auth', 'admin');
Route::patch('/profiles/{profile}', 'ProfilesController@update')->middleware('auth', 'admin');
Route::delete('/profiles/{profile}', 'ProfilesController@destroy')->middleware('auth', 'admin');
Route::get('/student/bachelor', 'ProfilesController@bachelor');
Route::get('/student/magistr', 'ProfilesController@magistr');


Route::get('/profiles/{profile}/subjects/create', 'SubjectsController@create')->middleware('auth', 'admin');
Route::get('/profiles/{profile}/subjects/{subject}/edit', 'SubjectsController@edit')->middleware('auth', 'admin');
Route::patch('/profiles/{profile}/subjects/{subject}', 'SubjectsController@update')->middleware('auth', 'admin');
Route::post('/profiles/{profile}', 'SubjectsController@store')->middleware('auth', 'admin');
Route::delete('/subjects/{subject}', 'SubjectsController@destroy')->middleware('auth', 'admin');

Route::get('/science/projects', 'ProjectsController@index');
Route::get('/science/projects/archive', 'ProjectsController@archive');
Route::post('/projects', "ProjectsController@store")->middleware('auth', 'admin');
Route::get('/projects/create', 'ProjectsController@create')->middleware('auth', 'admin');
Route::get('/projects/{project}/edit', 'ProjectsController@edit')->middleware('auth', 'admin');
Route::patch('projects/{project}/archive', 'ProjectsController@zip')->middleware('auth', 'admin');
Route::patch('/projects/{project}', 'ProjectsController@update')->middleware('auth', 'admin');
Route::delete('/projects/{project}', 'ProjectsController@destroy')->middleware('auth', 'admin');

Route::get('/science/coop', 'CoopsController@index');
Route::get('/coop/create', 'CoopsController@create')->middleware('auth', 'admin');
Route::post('/coop', 'CoopsController@store')->middleware('auth', 'admin');
Route::get('/coop/{coop}/edit', 'CoopsController@edit')->middleware('auth', 'admin');
Route::patch('/coop/{coop}', 'CoopsController@update')->middleware('auth', 'admin');
Route::delete('/coop/{coop}', 'CoopsController@destroy')->middleware('auth', 'admin');

Route::get('/science/publications', 'PublicationsController@index');
Route::get('/science/publications/archive', 'PublicationsController@archive');
Route::post('/publications', "PublicationsController@store")->middleware('auth', 'admin');
Route::get('/publications/create', 'PublicationsController@create')->middleware('auth', 'admin');
Route::get('/publications/{publication}/edit', 'PublicationsController@edit')->middleware('auth', 'admin');
Route::patch('publications/{publication}/archive', 'PublicationsController@zip')->middleware('auth', 'admin');
Route::patch('/publications/{publication}', 'PublicationsController@update')->middleware('auth', 'admin');
Route::delete('/publications/{publication}', 'PublicationsController@destroy')->middleware('auth', 'admin');


Route::get('/student/contacts', 'EmployeesController@contacts');

Route::get('/student/aspirant', 'AspirantInfosController@index');
Route::get('/aspirant/create', 'AspirantInfosController@create')->middleware('auth', 'admin');
Route::post('/aspirant', 'AspirantInfosController@store')->middleware('auth', 'admin');
Route::get('/aspirant/edit', 'AspirantInfosController@edit')->middleware('auth', 'admin');
Route::patch('/aspirant', 'AspirantInfosController@update')->middleware('auth', 'admin');

Route::get('/history', 'NewsController@history');
Route::get('/history/edit', 'NewsController@history_edit')->middleware('auth', 'admin');
Route::patch('/history', 'NewsController@history_update')->middleware('auth', 'admin');