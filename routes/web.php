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

// Route::get('/', function () {
//     return view('welcome');
// });

// website
Route::get('/', 'WebsiteController@index');
Route::get('/sector', 'WebsiteController@sectors');
Route::get('/sectors-view/{id}', 'WebsiteController@sectors_view');
Route::get('/top-blog-view/{id}', 'WebsiteController@top_blog');
Route::get('/middle-blog-view/{id}', 'WebsiteController@middle_blog');
Route::get('/article', 'WebsiteController@article');
Route::get('/article-view/{id}', 'WebsiteController@article_view');
Route::get('/news', 'WebsiteController@news');
Route::get('/news-view/{id}', 'WebsiteController@news_view')->name('');
Route::get('/project', 'WebsiteController@project');
Route::get('/project-view/{id}', 'WebsiteController@project_view');

Route::get('/project', 'WebsiteController@project_head');
Route::get('/aboutus', 'WebsiteNewController@about_head');
Route::get('/careerlink', 'WebsiteNewController@careerlink');

Route::get('/aboutus', 'WebsiteController@aboutus');
// Route::get('/aboutus-view/{id}', 'WebsiteController@aboutus_view');
Route::get('/aboutus-view-one', 'WebsiteController@aboutus_view_one');
Route::get('/aboutus-view-two', 'WebsiteController@aboutus_view_two');

Route::get('/', 'WebsiteNewController@index');
Route::get('/', 'WebsiteNewController@footer_left');
Route::get('/', 'WebsiteNewController@footer_middle');
Route::get('/', 'WebsiteNewController@footer_right');
// Route::get('/{id}', 'WebsiteNewController@sector_link');

Route::get('/contactus', 'WebsiteNewController@contactus');
Route::post('/contact-us-store', 'WebsiteNewController@store')->name('contact_us_store');

Route::get('/career', 'WebsiteNewController@career');
Route::post('/career-store', 'WebsiteNewController@career_store')->name('career_store');

Route::get('/ourteam', 'WebsiteNewController@ourteam')->name('ourteam');
Route::get('/opportunities', 'WebsiteNewController@opportunities')->name('opportunities');

// banner view
Route::get('/banner-one/{id}', 'BannerViewController@banner_one')->name('banner_one');
Route::get('/banner-two/{id}', 'BannerViewController@banner_two')->name('banner_two');
Route::get('/banner-three/{id}', 'BannerViewController@banner_three')->name('banner_three');
Route::get('/banner-four/{id}', 'BannerViewController@banner_four')->name('banner_four');
Route::get('/banner-five/{id}', 'BannerViewController@banner_five')->name('banner_five');
Route::get('/banner-six/{id}', 'BannerViewController@banner_six')->name('banner_six');
Route::get('/banner-seven/{id}', 'BannerViewController@banner_seven')->name('banner_seven');

Route::post('/search-sectors','WebsiteController@search_sectors')->name('search_sectors');
Route::post('/sectors-immediate','WebsiteController@sectors_immediate')->name('sectors_immediate');

Route::post('/search-news','WebsiteController@search_news')->name('search_news');
Route::post('/news-immediate','WebsiteController@news_immediate')->name('news_immediate');

Route::post('/search-article','WebsiteController@search_article')->name('search_article');
Route::post('/article-immediate','WebsiteController@article_immediate')->name('article_immediate');

Route::post('/search-project','WebsiteController@search_project')->name('search_project');
Route::post('/project-immediate','WebsiteController@project_immediate')->name('project_immediate');

Route::post('/search-aboutus','WebsiteController@search_aboutus')->name('search_aboutus');
Route::post('/aboutus-immediate','WebsiteController@aboutus_immediate')->name('aboutus_immediate');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
// admin start
Route::get('admin', 'AdminController@index')->name('');
Route::get('admin/permission', 'AdminController@permission')->name('');

Route::get('admin/user', 'UserController@index')->name('');
Route::get('admin/user/add', 'UserController@add')->name('');
Route::get('admin/user/edit/{id}', 'UserController@edit')->name('');
Route::post('admin/user/update', 'UserController@update')->name('');
Route::get('admin/user/view/{id}', 'UserController@view')->name('');
Route::post('admin/user/submit', 'UserController@insert')->name('');
// Route::post('admin/banner/store', 'BannerController@store')->name('');
Route::post('admin/user/delete', 'UserController@delete')->name('');

// banner part
Route::get('admin/banner', 'BannerController@index')->name('');
Route::get('admin/banner/add', 'BannerController@add')->name('');
Route::get('admin/banner/view/{id}', 'BannerController@view')->name('');
Route::get('admin/banner/edit/{id}', 'BannerController@edit')->name('');
Route::post('admin/banner/update', 'BannerController@update')->name('');
Route::post('admin/banner/store', 'BannerController@store')->name('');
Route::post('admin/banner/delete', 'BannerController@delete')->name('');
// news blog content part
Route::get('admin/news-blog', 'NewsBlogController@index')->name('');
Route::get('admin/news-blog/add', 'NewsBlogController@add')->name('');
Route::get('admin/news-blog/view/{id}', 'NewsBlogController@view')->name('');
Route::get('admin/news-blog/edit/{id}', 'NewsBlogController@edit')->name('');
Route::post('admin/news-blog/update', 'NewsBlogController@update')->name('');
Route::post('admin/news-blog/store', 'NewsBlogController@store')->name('');
Route::post('admin/news-blog/delete', 'NewsBlogController@delete')->name('');
// latest articles
Route::get('admin/article-blog', 'ArticleBlogController@index')->name('');
Route::get('admin/article-blog/add', 'ArticleBlogController@add')->name('');
Route::get('admin/article-blog/view/{id}', 'ArticleBlogController@view')->name('');
Route::get('admin/article-blog/edit/{id}', 'ArticleBlogController@edit')->name('');
Route::post('admin/article-blog/update', 'ArticleBlogController@update')->name('');
Route::post('admin/article-blog/store', 'ArticleBlogController@store')->name('');
Route::post('admin/article-blog/delete', 'ArticleBlogController@delete')->name('');

// project blog
Route::get('admin/project-blog', 'ProjectBlogController@index')->name('');
Route::get('admin/project-blog/add', 'ProjectBlogController@add')->name('');
Route::get('admin/project-blog/view/{id}', 'ProjectBlogController@view')->name('');
Route::get('admin/project-blog/edit/{id}', 'ProjectBlogController@edit')->name('');
Route::post('admin/project-blog/update', 'ProjectBlogController@update')->name('');
Route::post('admin/project-blog/store', 'ProjectBlogController@store')->name('');
Route::post('admin/project-blog/delete', 'ProjectBlogController@delete')->name('');

// top blog
Route::get('admin/top-blog', 'TopBlogController@index')->name('');
Route::get('admin/top-blog/add', 'TopBlogController@add')->name('');
Route::get('admin/top-blog/view/{id}', 'TopBlogController@view')->name('');
Route::get('admin/top-blog/edit/{id}', 'TopBlogController@edit')->name('');
Route::post('admin/top-blog/update', 'TopBlogController@update')->name('');
Route::post('admin/top-blog/store', 'TopBlogController@store')->name('');
Route::post('admin/top-blog/delete', 'TopBlogController@delete')->name('');

// middle blog
Route::get('admin/middle-blog', 'MiddleBlogController@index')->name('');
Route::get('admin/middle-blog/add', 'MiddleBlogController@add')->name('');
Route::get('admin/middle-blog/view/{id}', 'MiddleBlogController@view')->name('');
Route::get('admin/middle-blog/edit/{id}', 'MiddleBlogController@edit')->name('');
Route::post('admin/middle-blog/update', 'MiddleBlogController@update')->name('');
Route::post('admin/middle-blog/store', 'MiddleBlogController@store')->name('');
Route::post('admin/middle-blog/delete', 'MiddleBlogController@delete')->name('');
// middle blog banner
Route::get('admin/middle-blog-banner', 'MiddleBannerController@index')->name('');
Route::get('admin/middle-blog-banner/add', 'MiddleBannerController@add')->name('');
Route::get('admin/middle-blog-banner/view/{id}', 'MiddleBannerController@view')->name('');
Route::get('admin/middle-blog-banner/edit/{id}', 'MiddleBannerController@edit')->name('');
Route::post('admin/middle-blog-banner/update', 'MiddleBannerController@update')->name('');
Route::post('admin/middle-blog-banner/store', 'MiddleBannerController@store')->name('');
Route::post('admin/middle-blog-banner/delete', 'MiddleBannerController@delete')->name('');


// middle blog banner
Route::group(['prefix' => 'admin','middleware' => 'auth'],function () {
    Route::get('/sectors', 'SectorsController@index')->name('sectors');
    Route::get('/sectors-add', 'SectorsController@add')->name('sectors_add');
    Route::post('/sectors-store', 'SectorsController@store')->name('sectors_store');
    Route::get('/sectors-view/{id}', 'SectorsController@view')->name('sectors_view');
    Route::get('/sectors-edit/{id}', 'SectorsController@edit')->name('sectors_edit');
    Route::post('/sectors-update', 'SectorsController@update')->name('sectors_update');
    Route::post('/sectors-delete', 'SectorsController@delete')->name('sectors_delete');
});


// logo
Route::group(['prefix' => 'admin','middleware' => 'auth'],function () {
    Route::get('/logo', 'LogoController@index')->name('logo');
    Route::get('/logo-add', 'LogoController@add')->name('logo_add');
    Route::post('/logo-store', 'LogoController@store')->name('logo_store');
    Route::get('/logo-view/{id}', 'LogoController@view')->name('logo_view');
    Route::get('/logo-edit/{id}', 'LogoController@edit')->name('logo_edit');
    Route::post('/logo-update', 'LogoController@update')->name('logo_update');
    Route::post('/logo-delete', 'LogoController@delete')->name('logo_delete');
});
// footer
Route::group(['prefix' => 'admin','middleware' => 'auth'],function () {
    Route::get('/footer-left', 'FooterLeftController@index')->name('footer_left');
    Route::get('/footer-left-add', 'FooterLeftController@add')->name('footer_left_add');
    Route::post('/footer-left-store', 'FooterLeftController@store')->name('footer_left_store');
    Route::get('/footer-left-view/{id}', 'FooterLeftController@view')->name('footer_left_view');
    Route::get('/footer-left-edit/{id}', 'FooterLeftController@edit')->name('footer_left_edit');
    Route::post('/footer-left-update', 'FooterLeftController@update')->name('footer_left_update');
    Route::post('/footer-left-delete', 'FooterLeftController@delete')->name('footer_left_delete');
});

Route::group(['prefix' => 'admin','middleware' => 'auth'],function () {
    Route::get('/footer-middle', 'FooterMiddleController@index')->name('footer_middle');
    Route::get('/footer-middle-add', 'FooterMiddleController@add')->name('footer_middle_add');
    Route::post('/footer-middle-store', 'FooterMiddleController@store')->name('footer_middle_store');
    Route::get('/footer-middle-view/{id}', 'FooterMiddleController@view')->name('footer_middle_view');
    Route::get('/footer-middle-edit/{id}', 'FooterMiddleController@edit')->name('footer_middle_edit');
    Route::post('/footer-middle-update', 'FooterMiddleController@update')->name('footer_middle_update');
    Route::post('/footer-middle-delete', 'FooterMiddleController@delete')->name('footer_middle_delete');
});

Route::group(['prefix' => 'admin','middleware' => 'auth'],function () {
    Route::get('/footer-right', 'FooterRightController@index')->name('footer_right');
    Route::get('/footer-right-add', 'FooterRightController@add')->name('footer_right_add');
    Route::post('/footer-right-store', 'FooterRightController@store')->name('footer_right_store');
    Route::get('/footer-right-view/{id}', 'FooterRightController@view')->name('footer_right_view');
    Route::get('/footer-right-edit/{id}', 'FooterRightController@edit')->name('footer_right_edit');
    Route::post('/footer-right-update', 'FooterRightController@update')->name('footer_right_update');
    Route::post('/footer-right-delete', 'FooterRightController@delete')->name('footer_right_delete');
});

Route::group(['prefix' => 'admin','middleware' => 'auth'],function () {
    Route::get('/contact-us', 'ContactController@index')->name('contact_us');
    Route::get('/contact-us-view/{id}', 'ContactController@view')->name('contact_us_view');
    Route::post('/contact-us-delete', 'ContactController@delete')->name('contact_us_delete');
});
Route::group(['prefix' => 'admin','middleware' => 'auth'],function () {
    Route::get('/career', 'CareerController@index')->name('career');
    Route::get('/career-view/{id}', 'CareerController@view')->name('career_view');
    Route::post('/career-delete', 'CareerController@delete')->name('career_delete');
    
});

Route::get('/file', 'CareerController@index');
Route::get('/file/{id}', 'CareerController@file_show');
Route::get('/file/download/{file}', 'CareerController@download');

// about us
Route::group(['prefix' => 'admin','middleware' => 'auth'],function () {
    Route::get('/about-us', 'AboutUsController@index')->name('about_us');
    Route::get('/about-us-add', 'AboutUsController@add')->name('about_us_add');
    Route::post('/about-us-store', 'AboutUsController@store')->name('about_us_store');
    Route::get('/about-us-view/{id}', 'AboutUsController@view')->name('about_us_view');
    Route::get('/about-us-edit/{id}', 'AboutUsController@edit')->name('about_us_edit');
    Route::post('/about-us-update', 'AboutUsController@update')->name('about_us_update');
    Route::post('/about-us-delete', 'AboutUsController@delete')->name('about_us_delete');
});
// project heading
Route::group(['prefix' => 'admin','middleware' => 'auth'],function () {
    Route::get('/project-head', 'ProjectHeadingController@index')->name('project_head');
    Route::get('/project-head-add', 'ProjectHeadingController@add')->name('project_head_add');
    Route::post('/project-head-store', 'ProjectHeadingController@store')->name('project_head_store');
    Route::get('/project-head-view/{id}', 'ProjectHeadingController@view')->name('project_head_view');
    Route::get('/project-head-edit/{id}', 'ProjectHeadingController@edit')->name('project_head_edit');
    Route::post('/project-head-update', 'ProjectHeadingController@update')->name('project_head_update');
    Route::post('/project-head-delete', 'ProjectHeadingController@delete')->name('project_head_delete');
});
// about head
Route::group(['prefix' => 'admin','middleware' => 'auth'],function () {
    Route::get('about-head', 'AboutHeadingController@index')->name('about_head');
    Route::get('about-head-add', 'AboutHeadingController@add')->name('about_head_add');
    Route::post('about-head-store', 'AboutHeadingController@store')->name('about_head_store');
    Route::get('about-head-view/{id}', 'AboutHeadingController@view')->name('about_head_view');
    Route::get('about-head-edit/{id}', 'AboutHeadingController@edit')->name('about_head_edit');
    Route::post('about-head-update', 'AboutHeadingController@update')->name('about_head_update');
    Route::post('about-head-delete', 'AboutHeadingController@delete')->name('about_head_delete');
});

// career link
Route::group(['prefix' => 'admin','middleware' => 'auth'],function () {
    Route::get('career-link', 'CareerLinkController@index')->name('career_link');
    Route::get('career-link-add', 'CareerLinkController@add')->name('career_link_add');
    Route::post('career-link-store', 'CareerLinkController@store')->name('career_link_store');
    Route::get('career-link-view/{id}', 'CareerLinkController@view')->name('career_link_view');
    Route::get('career-link-edit/{id}', 'CareerLinkController@edit')->name('career_link_edit');
    Route::post('career-link-update', 'CareerLinkController@update')->name('career_link_update');
    Route::post('career-link-delete', 'CareerLinkController@delete')->name('career_link_delete');
});
// career link
Route::group(['prefix' => 'admin','middleware' => 'auth'],function () {
    Route::get('our-team', 'OurTeamController@index')->name('our_team');
    Route::get('our-team-add', 'OurTeamController@add')->name('our_team_add');
    Route::post('our-team-store', 'OurTeamController@store')->name('our_team_store');
    Route::get('our-team-view/{id}', 'OurTeamController@view')->name('our_team_view');
    Route::get('our-team-edit/{id}', 'OurTeamController@edit')->name('our_team_edit');
    Route::post('our-team-update', 'OurTeamController@update')->name('our_team_update');
    Route::post('our-team-delete', 'OurTeamController@delete')->name('our_team_delete');
});