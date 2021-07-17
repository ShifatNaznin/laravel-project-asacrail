<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class SearchController extends Controller
{
    public function search(Request $request)
    {
        $find = $request['search_box'];
        $search = Book::where('book_title', 'like', "%".$find."%")->where('status', 1)->get();
        return view('website.search-result', compact('search'));
    }
}