<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\NewsBlog;
use App\ArticleBlog;
use App\ProjectBlog;
use App\ProjectHeading;
use App\AboutUs;
use App\Banner;
use App\TopBlog;
use App\MiddleBlog;
use App\Sectors;
use Carbon\Carbon;
use Session;
use Image;
use Storage;

class WebsiteController extends Controller
{
  public function index()
  {
    return view('website.index');
  }


  // public function top_blog(Request $request, $id)
  // {  $top=TopBlog::find($id);
  //    return view('website.top-blog-view', compact('top'));
  // }
  // public function middle_blog(Request $request, $id)
  // {  $top=MiddleBlog::find($id);
  //    return view('website.middle-blog-view', compact('top'));
  // }

  public function sectors()
  {
    $value = Sectors::orderBy('id', 'ASC')->get();
    return view('website.sectors', compact('value'));
  }
  public function sectors_view(Request $request, $id)
  {
    $value = Sectors::find($id);
    return view('website.sectors-view', compact('value'));
  }
  public function article()
  {
    $article = ArticleBlog::orderBy('id', 'ASC')->take(10)->get();
    return view('website.article', compact('article'));
  }
  public function article_view(Request $request, $id)
  {
    $article = ArticleBlog::find($id);
    return view('website.article-view', compact('article'));
  }
  public function news()
  {
    $news = NewsBlog::orderBy('id', 'ASC')->take(10)->get();
    return view('website.news', compact('news'));
  }
  public function news_view(Request $request, $id)
  {
    $news = NewsBlog::find($id);
    return view('website.news-view', compact('news'));
  }

  public function project()
  {

    // $project =ProjectBlog::orderBy('id', 'ASC')->take(10)->get();

    //  return view('website.project',compact('project'));
    return view('website.project');
  }

  public function project_view(Request $request, $id)
  {
    $project = ProjectBlog::find($id);
    return view('website.project-view', compact('project'));
  }

  public function project_head()
  {

    return view('website.project');
  }

  public function search_news(Request $request)
  {
    // dd($request->request);

    $find = $request['search_box'];
    $news = NewsBlog::where('blog_title', 'like', "%" . $find . "%")
      ->where('blog_status', 1)
      ->latest()->get();
    //   dd($search);
    return view('website.news', compact('news'));
    //   dd($request);

  }
  public function news_immediate(Request $request)
  {
    // dd($request->request);

    $find = $request['search_box'];
    $news = NewsBlog::where('blog_title', 'like', "%" . $find . "%")
      ->where('blog_status', 1)
      ->latest()->get();
    //   dd($search);
    return view('website.search-news', compact('news'));
    //   dd($request);

  }
  public function search_article(Request $request)
  {
    // dd($request->request);

    $find = $request['search_box'];
    $article = ArticleBlog::where('article_title', 'like', "%" . $find . "%")
      ->where('article_status', 1)
      ->latest()->get();
    //   dd($search);
    return view('website.article', compact('article'));
    //   dd($request);

  }
  public function article_immediate(Request $request)
  {
    // dd($request->request);

    $find = $request['search_box'];
    $article = ArticleBlog::where('article_title', 'like', "%" . $find . "%")
      ->where('article_status', 1)
      ->latest()->get();
    //   dd($article);
    return view('website.search-article', compact('article'));
    //   dd($request);

  }
  public function search_project(Request $request)
  {
    // dd($request->request);

    $find = $request['search_box'];
    $project = ProjectBlog::where('project_title', 'like', "%" . $find . "%")
      ->where('project_status', 1)
      ->latest()->get();
    //   dd($search);
    return view('website.project', compact('project'));
    //   dd($request);

  }
  public function project_immediate(Request $request)
  {
    // dd($request->request);

    $find = $request['search_box'];
    $project = ProjectBlog::where('project_title', 'like', "%" . $find . "%")
      ->where('project_status', 1)
      ->latest()->get();
    //   dd($article);
    return view('website.search-project', compact('project'));
    //   dd($request);

  }
  public function search_sectors(Request $request)
  {
    // dd($request->request);

    $find = $request['search_box'];
    $value = Sectors::where('title', 'like', "%" . $find . "%")
      ->where('project_status', 1)
      ->latest()->get();
    //   dd($search);
    return view('website.sectors', compact('value'));
    //   dd($request);

  }
  public function sectors_immediate(Request $request)
  {
    // dd($request->request);

    $find = $request['search_box'];
    $value = Sectors::where('title', 'like', "%" . $find . "%")
      ->where('project_status', 1)
      ->latest()->get();
    //   dd($article);
    return view('website.search-sectors', compact('value'));
    //   dd($request);

  }

  public function aboutus()
  {

    $project = AboutUs::orderBy('id', 'ASC')->take(10)->get();

    //  return view('website.project',compact('project'));
    return view('website.aboutus', compact('project'));
  }

  // public function aboutus_view(Request $request, $id)
  // { 
  //   $data=AboutUs::find($id);
  //    return view('website.aboutus-view', compact('data'));
  // }
  public function aboutus_view_one()
  {
    return view('website.aboutus-view-one');
  }
  public function aboutus_view_two()
  {
    return view('website.aboutus-view-two');
  }

  public function search_aboutus(Request $request)
  {
    // dd($request->request);

    $find = $request['search_box'];
    $project = AboutUs::where('title', 'like', "%" . $find . "%")
      ->where('status', 1)
      ->latest()->get();
    //   dd($search);
    return view('website.aboutus', compact('project'));
    //   dd($request);

  }
  public function aboutus_immediate(Request $request)
  {
    // dd($request->request);

    $find = $request['search_box'];
    $project = AboutUs::where('title', 'like', "%" . $find . "%")
      ->where('status', 1)
      ->latest()->get();
    //   dd($article);
    return view('website.search-aboutus', compact('project'));
    //   dd($request);

  }
}
