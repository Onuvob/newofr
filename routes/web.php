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

//Claim Part
Route::get('claim', 'ClaimController@getClaim');

Route::get('login/google', 'Auth\LoginController@redirectToProvider');
Route::get('login/google/callback', 'Auth\LoginController@handleProviderCallback');
//Research Grant 


// Mail

Route::post('sendmail', 'MailController@sendEmail');

// End Mail

// Reviewer

Route::resource('reviewerreports', 'Reviewer\ReviewerController');

Route::get('acceptreport/{id}', 'Reviewer\ReviewerController@acceptReport');
// End Reviewer

//User routes

Route::resource('user', 'UserController');

//End User routes


//Applicaton

//User View
Route::resource('publications/journal', 'JournalController');

Route::resource('publications/conference', 'ConferenceController');

Route::resource('publications/book', 'BookController');

Route::resource('publications/bookchapter', 'BookChapterController');

Route::resource('publications/research', 'ResearchController');

//Route::resource('publications/reward', 'RewardController');
//End user View


//Admin
//Publication View Routes
//Journal Routing
Route::resource('publication/journals', 'Admin\Publication\JournalController');

//Conference Routing
Route::resource('publication/conferences', 'Admin\Publication\ConferenceController');

//Book Routing
Route::resource('publication/books', 'Admin\Publication\BookController');

//Book Chapter Routing
Route::resource('publication/bookchapters', 'Admin\Publication\BookChapterController');

//Research Routing
Route::resource('publication/researches', 'Admin\Publication\ResearchController');


//Publication Accepted View Routes
//Accepted Journal Routing
Route::resource('acceptedjournals', 'Admin\PublicationAccepted\JournalController');

//Accepted Conference Routing
Route::resource('acceptedconferences', 'Admin\PublicationAccepted\ConferenceController');

//Accepted Book Routing
Route::resource('acceptedbooks', 'Admin\PublicationAccepted\BookController');

//Accepted Book Chapter Routing
Route::resource('acceptedbookchapters', 'Admin\PublicationAccepted\BookChapterController');

//Accpeted Research Routing
Route::resource('acceptedresearches', 'Admin\PublicationAccepted\ResearchController');



//Publication Rejected View Routes
//Rejected Journal Routing
Route::resource('rejectedjournals', 'Admin\PublicationRejected\JournalController');

//Rejected Conference Routing
Route::resource('rejectedconferences', 'Admin\PublicationRejected\ConferenceController');

//Rejected Book Routing
Route::resource('rejectedbooks', 'Admin\PublicationRejected\BookController');

//Rejected Book Chapter Routing
Route::resource('rejectedbookchapters', 'Admin\PublicationRejected\BookChapterController');

//Rejected Research Routing
Route::resource('rejectedresearches', 'Admin\PublicationRejected\ResearchController');

//End Admin


//Research Grant Routes


//End Research Grant Routes

Route::resource('researchgrantapplication', 'ResearchGrant\ApplicationController');


Route::resource('ongoingresearch', 'ResearchGrant\OngoingProjectsController');


//Authentication routes
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
