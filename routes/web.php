<?php


Auth::routes();

Route::middleware(['auth'])->group(function() {
    Route::get('/', 'ContactController@index')->name('contact.index');
    Route::get('/home', 'ContactController@index')->name('contact.index');
    Route::get('/create', 'ContactController@create')->name('contact.create');
    Route::post('/store', 'ContactController@store')->name('contact.store');
    Route::get('/{contact}/edit', 'ContactController@edit')->name('contact.edit');
    Route::put('/{contact}', 'ContactController@update')->name('contact.update');
    Route::delete('/{contact}', 'ContactController@destroy')->name('contact.destroy');
    Route::get('/download', 'ContactController@download')->name('contact.download');
    Route::get('/export', 'ContactController@export')->name('contact.export');
    Route::get('/import', 'ContactController@import')->name('contact.import');
    Route::post('/import', 'ContactController@importFile')->name('contact.import.file');
},'');

Route::get('/phonebook.xml', 'ContactController@xml')->name('contact.xml');

Route::any('{url_param}', function() {
    abort(404, '404 Error. Page not found!');
})->where('url_param', '.*');