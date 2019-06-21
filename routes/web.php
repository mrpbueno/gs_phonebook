<?php


Auth::routes();

Route::middleware(['auth'])->group(function() {
    Route::get('/', 'ContactController@index')->name('contact.index');
    Route::get('/create', 'ContactController@create')->name('contact.create');
    Route::post('/', 'ContactController@store')->name('contact.store');
    Route::get('/{contact}/edit', 'ContactController@edit')->name('contact.edit');
    Route::put('/{contact}', 'ContactController@update')->name('contact.update');
    Route::delete('/{contact}', 'ContactController@destroy')->name('contact.destroy');
    Route::get('/phonebook', 'ContactController@phonebook')->name('contact.phonebook');
    Route::get('/import', 'ContactController@import')->name('contact.import');
},'');

Route::get('/phonebook.xml', 'ContactController@xml')->name('contact.xml');

