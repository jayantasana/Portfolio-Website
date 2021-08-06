<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes(['verify' => true]);

Route::get('/', 'FrontEndController@Front')->name('Front');
Route::get('/home', 'HomeController@index')->name('home');

// Setting Route
Route::get('/add/settings', 'SettingsController@AddSettings')->name('AddSettings');
Route::post('/settings/store', 'SettingsController@SettingsStore')->name('SettingsStore');
Route::get('/settings/list', 'SettingsController@SettingsList')->name('SettingsList');
Route::get('/settings/edit/{id}', 'SettingsController@SettingsEdit')->name('SettingsEdit');
Route::post('/settings/update/', 'SettingsController@SettingsUpdate')->name('SettingsUpdate');
Route::get('/settings/delete/{did}', 'SettingsController@SettingsDelete')->name('SettingsDelete');
Route::get('/settings/restore/{rid}', 'SettingsController@SettingsRestore')->name('SettingsRestore');
Route::get('/settings/parmanent/delete/{pdid}', 'SettingsController@SettingsParmanentDelete')->name('SettingsParmanentDelete');


Route::get('/add/cvcontent', 'CVExportController@AddCVContent')->name('AddCVContent');
Route::post('/post/cvcontent', 'CVExportController@PostCVContent')->name('PostCVContent');

Route::post('/sent/email', 'MessageController@SentMail')->name('SentMail');
Route::get('/table/email', 'MessageController@MailTable')->name('MailTable');

// About Route
Route::get('/add/about', 'AboutController@AboutAdd')->name('AboutAdd');
Route::post('/about/store', 'AboutController@AboutStore')->name('AboutStore');
Route::get('/about/list', 'AboutController@AboutList')->name('AboutList');
Route::get('/about/edit/{id}', 'AboutController@AboutEdit')->name('AboutEdit');
Route::post('/about/update', 'AboutController@AboutUpdate')->name('AboutUpdate');
Route::get('/about/delete/{did}', 'AboutController@AboutDelete')->name('AboutDelete');
Route::get('/about/restore/{rid}', 'AboutController@AboutRestore')->name('AboutRestore');
Route::get('/about/parmanent/delete/{rid}', 'AboutController@AboutParmanentDelete')->name('AboutParmanentDelete');
// Skill Route
Route::get('/add/skill', 'SkillController@SkillAdd')->name('SkillAdd');
Route::post('/skill/store', 'SkillController@SkillStore')->name('SkillStore');
Route::get('/skill/list', 'SkillController@SkillList')->name('SkillList');
Route::get('/skill/edit/{edid}', 'SkillController@SkillEdit')->name('SkillEdit');
Route::post('/skill/update/', 'SkillController@SkillUpdate')->name('SkillUpdate');
Route::get('/skill/delete/{sdid}', 'SkillController@SkillDelete')->name('SkillDelete');
Route::get('/skill/restore/{srid}', 'SkillController@SkillRestore')->name('SkillRestore');
Route::get('/skill/parmanent/delete/{spdid}', 'SkillController@SkillParmanentDelete')->name('SkillParmanentDelete');
// Service Route
Route::get('/add/service', 'ServiceController@ServiceAdd')->name('ServiceAdd');
Route::post('/service/store', 'ServiceController@ServiceStore')->name('ServiceStore');
Route::get('/service/list', 'ServiceController@ServiceList')->name('ServiceList');
Route::get('/service/edit/{seid}', 'ServiceController@ServiceEdit')->name('ServiceEdit');
Route::post('/service/update/', 'ServiceController@ServiceUpdate')->name('ServiceUpdate');
Route::get('/service/delete/{sdid}', 'ServiceController@ServiceDelete')->name('ServiceDelete');
Route::get('/service/restore/{srid}', 'ServiceController@ServiceRestore')->name('ServiceRestore');
Route::get('/service/parmanent/delete/{spdid}', 'ServiceController@ServiceParmanentDelete')->name('ServiceParmanentDelete');
// HappyClient Route
Route::get('/add/happyclient', 'HappyClientController@HappyClientAdd')->name('HappyClientAdd');
Route::post('/happyclient/store', 'HappyClientController@HappyClientStore')->name('HappyClientStore');
Route::get('/happyclient/list', 'HappyClientController@HappyClientList')->name('HappyClientList');
Route::get('/happyclient/edit/{heid}', 'HappyClientController@HappyClientEdit')->name('HappyClientEdit');
Route::post('/happyclient/update', 'HappyClientController@HappyClientUpdate')->name('HappyClientUpdate');
Route::get('/happyclient/delete/{hdid}', 'HappyClientController@HappyClientDelete')->name('HappyClientDelete');
Route::get('/happyclient/restore/{hrid}', 'HappyClientController@HappyClientRestore')->name('HappyClientRestore');
Route::get('/happyclient/parmanent/delete/{hpdid}', 'HappyClientController@HappyClientParmanentDelete')->name('HappyClientParmanentDelete');
// Portfolio Route
Route::get('/add/portfolio', 'PortfolioController@PortfolioAdd')->name('PortfolioAdd');
Route::post('/portfolio/store', 'PortfolioController@PortfolioStore')->name('PortfolioStore');
Route::get('/portfolio/list', 'PortfolioController@PortfolioList')->name('PortfolioList');
Route::get('/portfolio/edit/{peid}', 'PortfolioController@PortfolioEdit')->name('PortfolioEdit');
Route::post('/portfolio/update/', 'PortfolioController@PortfolioUpdate')->name('PortfolioUpdate');
Route::get('/portfolio/delete/{pdid}', 'PortfolioController@PortfolioDelete')->name('PortfolioDelete');
Route::get('/portfolio/restore/{prid}', 'PortfolioController@PortfolioRestore')->name('PortfolioRestore');
Route::get('/portfolio/parmanent/delete/{pdid}', 'PortfolioController@PortfolioParmanentDelete')->name('PortfolioParmanentDelete');
// Experience Route
Route::get('/add/experience', 'ExperienceController@ExperienceAdd')->name('ExperienceAdd');
Route::post('/experience/store', 'ExperienceController@ExperienceStore')->name('ExperienceStore');
Route::get('/experience/list', 'ExperienceController@ExperienceList')->name('ExperienceList');
Route::get('/experience/edit/{eeid}', 'ExperienceController@ExperienceEdit')->name('ExperienceEdit');
Route::post('/experience/update', 'ExperienceController@ExperienceUpdate')->name('ExperienceUpdate');
Route::get('/experience/delete/{edid}', 'ExperienceController@ExperienceDelete')->name('ExperienceDelete');
Route::get('/experience/restore/{erid}', 'ExperienceController@ExperienceRestore')->name('ExperienceRestore');
Route::get('/experience/parmanent/delete/{epdid}', 'ExperienceController@ExperienceParmanentDelete')->name('ExperienceParmanentDelete');
// Client Route
Route::get('/add/client', 'ClientController@ClientAdd')->name('ClientAdd');
Route::post('/client/store', 'ClientController@ClientStore')->name('ClientStore');
Route::get('/client/list', 'ClientController@ClientList')->name('ClientList');
Route::get('/client/edit/{ceid}', 'ClientController@ClientEdit')->name('ClientEdit');
Route::post('/client/update', 'ClientController@ClientUpdate')->name('ClientUpdate');
Route::get('/client/delete/{cdid}', 'ClientController@ClientDelete')->name('ClientDelete');
Route::get('/client/restore/{crid}', 'ClientController@ClientRestore')->name('ClientRestore');
Route::get('/client/parmanent/delete/{cpdid}', 'ClientController@ClientParmanentDelete')->name('ClientParmanentDelete');
//Social Route
Route::get('/add/social', 'SocialController@AddSocial')->name('AddSocial');
Route::post('/post/social', 'SocialController@PostSocial')->name('PostSocial');
Route::get('/social/list', 'SocialController@SocialList')->name('SocialList');
Route::get('/social/edit/{seid}', 'SocialController@SocialEdit')->name('SocialEdit');
Route::post('/social/update/', 'SocialController@SocialUpdate')->name('SocialUpdate');
Route::get('/social/delete/{sdid}', 'SocialController@SocialDelete')->name('SocialDelete');
Route::get('/social/restore/{srid}', 'SocialController@SocialRestore')->name('SocialRestore');
Route::get('/social/parmanent/delete/{pdid}', 'SocialController@SocialParmanentDelete')->name('SocialParmanentDelete');
// SocialLink Route
Route::get('/social/link/list', 'SocialController@SocialLinkList')->name('SocialLinkList');
Route::get('/social/link/edit/{sleid}', 'SocialController@SocialLinkEdit')->name('SocialLinkEdit');
Route::post('/social/link/update/', 'SocialController@SocialLinkUpdate')->name('SocialLinkUpdate');
Route::get('/social/link/delete/{sldid}', 'SocialController@SocialLinkDelete')->name('SocialLinkDelete');
Route::get('/social/link/restore/{slrid}', 'SocialController@SocialLinkRestore')->name('SocialLinkRestore');
Route::get('/social/link/parmanent/delete/{slpdid}', 'SocialController@SocialLinkParmanentDelete')->name('SocialLinkParmanentDelete');


Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::resource('blog', 'BlogController');
});
