<?php 

defined('BASEPATH') or exit('No direct script access allowed'); 
class Set_Views {


    public function home() {
       return 'pages/home';
    }
    public function playlists() {
        return 'playlists/index';
    }
    public function songs() {
        return 'songs/index';
    }
    public function mysongs() {
        return 'songs/my_songs';
    }
    public function login() {
        return 'auth/login';
    }
    public function register() {
        return 'auth/register';
    }
    public function addsong() {
        return 'songs/upload';
    }
    public function createplaylist() {
        return 'playlists/create';
    }
    public function editsong() {
        return 'songs/edit';
    }
    public function addtoplaylist() {
        return 'songs/add_song';
    }
}

?>