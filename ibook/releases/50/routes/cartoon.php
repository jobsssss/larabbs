<?php



Route::get('/','IndexController@index');
Route::get('cartoons/get_section','CartoonController@getSection');
Route::get('cartoons','CartoonController@index');
Route::get('cartoons/{id}','CartoonController@detail')->where(['id' => '[0-9]+'])->name('cartoon.detail');
Route::get('search','CartoonController@searchPage')->name('search');
Route::post('search','CartoonController@search')->name('search');

Route::get('chapters/{cartoon_id}/{chapter_id}','ChapterController@index')->where(['id' => '[0-9]+'])->name('chapter.index');
Route::get('mine','MineController@index')->name('mine');

Route::get('login',"Auth\LoginController@showLoginForm")->name('login');
Route::get('logout',"Auth\LoginController@logout")->name('logout');
Route::post('do-login',"Auth\LoginController@doLogin")->name('do_login');
Route::post('register',"Auth\RegisterController@register")->name('register');

Route::get('charge','ChargeController@index')->name('charge');
Route::get('consume-record','ConsumeController@record')->name('consume.record');

Route::get('issue','IssueController@showForm')->name('issue');

Route::get('history','HistoryController@history')->name('history');

Route::get('collect','CollectController@index')->name('collect');
Route::post('collect/create','CollectController@create')->name('collect.create');
Route::post('collect/delete','CollectController@delete')->name('collect.delete');
