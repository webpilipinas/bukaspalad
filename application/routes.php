<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Simply tell Laravel the HTTP verbs and URIs it should respond to. It is a
| breeze to setup your application using Laravel's RESTful routing and it
| is perfectly suited for building large applications and simple APIs.
|
| Let's respond to a simple GET request to http://example.com/hello:
|
|		Route::get('hello', function()
|		{
|			return 'Hello World!';
|		});
|
| You can even respond to more than one URI:
|
|		Route::post(array('hello', 'world'), function()
|		{
|			return 'Hello World!';
|		});
|
| It's easy to allow URI wildcards using (:num) or (:any):
|
|		Route::put('hello/(:any)', function($name)
|		{
|			return "Welcome, $name.";
|		});
|
*/

Route::any('logout', function() {
	Auth::logout();
	Session::flush();
	return Redirect::to('/');
});

/*
|--------------------------------------------------------------------------
| Application 404 & 500 Error Handlers
|--------------------------------------------------------------------------
|
| To centralize and simplify 404 handling, Laravel uses an awesome event
| system to retrieve the response. Feel free to modify this function to
| your tastes and the needs of your application.
|
| Similarly, we use an event to handle the display of 500 level errors
| within the application. These errors are fired when there is an
| uncaught exception thrown in the application.
|
*/

Event::listen('404', function()
{
	return Response::error('404');
});

Event::listen('500', function()
{
	return Response::error('500');
});

/*
|--------------------------------------------------------------------------
| Route Filters
|--------------------------------------------------------------------------
|
| Filters provide a convenient method for attaching functionality to your
| routes. The built-in before and after filters are called before and
| after every request to your application, and you may even create
| other filters that can be attached to individual routes.
|
| Let's walk through an example...
|
| First, define a filter:
|
|		Route::filter('filter', function()
|		{
|			return 'Filtered!';
|		});
|
| Next, attach the filter to a route:
|
|		Router::register('GET /', array('before' => 'filter', function()
|		{
|			return 'Hello World!';
|		}));
|
*/

Route::controller(Controller::detect());

Route::filter('before', function()
{
	// Do stuff before every request to your application...
});

Route::filter('after', function($response)
{
	// Do stuff after every request to your application...
});

Route::filter('csrf', function()
{
	if (Request::forged()) return Response::error('500');
});

Route::filter('auth', function()
{
	if (Auth::guest()) return Redirect::to('home');
});

Route::filter('nonauth', function()
{
	if (Auth::check()) return Redirect::to('dashboard');
});

/*
 * Assets
 */
View::composer(array('layouts/main', 'layouts/main_fluid'), function($view)
{
	Asset::add('jquery', 'js/jquery.js');
	Asset::add('scripts', 'js/scripts.js', 'jquery');
	Asset::add('handlebars', 'js/handlebars.js');
    Asset::add('bootstrap-js', 'js/bootstrap.min.js', 'jquery');
    Asset::add('bootstrap-css', 'css/bootstrap.css');
    Asset::add('style', 'css/style.css');
    Asset::style('google-fonts', 'http://fonts.googleapis.com/css?family=Kreon:300,400,700');
});

View::composer('dashboard.index', function($view)
{
	Asset::add('dt', 'js/jquery.dataTables.js', 'jquery');
	Asset::add('dt-bootstrap-js', 'js/DT_bootstrap.js', 'dt');
    Asset::add('dt-bootstrap-css', 'css/DT_bootstrap.css', 'bootstrap-css');
});

Event::listen('stock_add', function($stocks, $user) {
	$color = $user->determineColor();
	$action = new Action();
	$action->fill(array(
		'user_id' => $user->id,
		'message' => "<span class=\"{$color}\">{$user->username}</span> added <span class=\"{$color}\">" . count($stocks) . "</span> new stock types."
	));
	$action->save();
});

Event::listen('donation_added', function($donation, $user) {
	$color = $user->determineColor();
	$action = new Action();
	$action->fill(array(
		'user_id' => $user->id,
		'message' => "<span class=\"{$color}\">{$user->username}</span> added a new donation from <span class=\"{$color}\">" . $donation->donator . "</span>."
	));
	$action->save();
});

Event::listen('package_added', function($package, $user) {
	$color = $user->determineColor();
	$action = new Action();
	$action->fill(array(
		'user_id' => $user->id,
		'message' => "<span class=\"{$color}\">{$user->username}</span> created a new package for <span class=\"{$color}\">" . $package->area . "</span>."
	));
	$action->save();
});

Event::listen('donation_repacked', function($donation, $user) {
	$color = $user->determineColor();
	$action = new Action();
	$action->fill(array(
		'user_id' => $user->id,
		'message' => "<span class=\"{$color}\">{$user->username}</span> marked <span class=\"{$color}\">Donation #" . $donation->id . "</span> as REPACKED."
	));
	$action->save();
});

Event::listen('transport_added', function($transport, $user) {
	$color = $user->determineColor();
	$action = new Action();
	$action->fill(array(
		'user_id' => $user->id,
		'message' => "<span class=\"{$color}\">{$user->username}</span> registered a new transport under <span class=\"{$color}\">" . $transport->name . " ({$transport->car_type})</span>."
	));
	$action->save();
});

Event::listen('transport_availability', function($transport, $user) {
	$color = $user->determineColor();
	$action = new Action();
	$action->fill(array(
		'user_id' => $user->id,
		'message' => "<span class=\"{$color}\">{$user->username}</span> marked transport <span class=\"{$color}\">" . $transport->name . " ({$transport->car_type})</span> as UNAVAILABLE."
	));
	$action->save();
});

Event::listen('packaged_marked', function($package, $user) {
	$color = $user->determineColor();
	$action = new Action();
	$action->fill(array(
		'user_id' => $user->id,
		'message' => "<span class=\"{$color}\">{$user->username}</span> marked package <span class=\"{$color}\">" . $package->area . " (Package #{$package->id})</span> as TRANSPORTED."
	));
	$action->save();
});