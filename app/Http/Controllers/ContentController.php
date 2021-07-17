<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;



class ContentController extends Controller {
    public function index() {
        // $allUser = User::orderBy('id', 'DESC')->get();
        return view('admin.content.index');
    }

    public function add() {
        return view('admin.content.add');
    }

    public function view() {
        return view('admin.content.view');
    }

    public function update() {
        return view('admin.content.update');
    }
}