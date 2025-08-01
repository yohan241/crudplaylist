<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'pages/view';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


// User authentication routes
$route['register'] = 'auth/register';
$route['login'] = 'auth/login';
$route['logout'] = 'auth/logout';

// Song upload route
$route['upload_song'] = 'songs/upload';

// Song listing route
$route['songs'] = 'songs/index';
$route['song/index/(:num)'] = 'song/index/$1';

// Playlist routes
$route['playlists'] = 'playlists/index';
$route['create_playlist'] = 'playlists/create';

// Add song to playlist
$route['add_song_to_playlist/(:num)'] = 'playlists/add_song/$1';

// Delete playlist
$route['delete_playlist/(:num)'] = 'playlists/delete/$1';

// Remove song from playlist
$route['remove_song_from_playlist/(:num)/(:num)'] = 'playlists/remove_song/$1/$2';

// My Songs routes
$route['my_songs'] = 'songs/my_songs';
$route['edit_song/(:num)'] = 'songs/edit/$1';
$route['delete_song/(:num)'] = 'songs/delete/$1';
