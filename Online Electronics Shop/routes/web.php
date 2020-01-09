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

/** Users routes */

Route :: get('/admin/users','AdminController@get_all_users');
Route :: get('/admin/delete-user/{user_id}','AdminController@delete_user');

/** Home routes */
Route :: get('/','HomeController@index');
Route :: get('/admin','HomeController@admin');
Route :: get('/all-announcements','HomeController@all_announcements');

/** Account routes */
Route :: get('/signup','AccountController@signup');
Route :: post('/register','AccountController@register');
Route :: get('/login','AccountController@login');
Route :: post('/check_auth','AccountController@check_auth');
Route :: get('/logout','AccountController@logout');
Route :: get('/edit-profile','AccountController@edit_profile');
Route :: post('/update-account','AccountController@update_profile');

/** Announcement routes */
Route :: get('/admin/add-announcement','AnnouncementController@add_announcement');
Route :: post('/admin/save-announcement','AnnouncementController@save_announcement');
Route :: get('/admin/all-announcement','AnnouncementController@all_announcement');
Route :: get('/admin/delete-announcement/{announce_id}','AnnouncementController@delete_announcement');

/** Categories routes */
Route :: get('/admin/add-category','CategoryController@add_category');
Route :: post('/admin/save-category','CategoryController@save_category');
Route :: get('/admin/all-category','CategoryController@all_category');
Route :: get('/admin/edit-category/{category_id}','CategoryController@edit_category');
Route :: post('/admin/update-category/{category_id}','CategoryController@update_category');
Route :: get('/admin/delete-category/{category_id}','CategoryController@delete_category');

/** products routes */
Route :: get('/admin/add-product','ProductController@add_product');
Route :: post('/admin/save-product','ProductController@save_product');
Route :: get('/admin/all-products','ProductController@all_products');
Route :: get('/admin/delete-product/{book_id}','ProductController@delete_product');
Route :: get('/admin/edit-product/{book_id}','ProductController@edit_product');
Route :: post('/admin/update-product/{book_id}','ProductController@update_product');
Route :: get('/products','ProductController@get_products');
Route :: get('/products-by-name-asc','ProductController@asce_order_by_name');
Route :: get('/products-by-price-asc','ProductController@asce_order_by_price');
Route :: get('/products-by-name-desc','ProductController@desc_order_by_name');
Route :: get('/products-by-price-desc','ProductController@desc_order_by_price');
Route :: post('/get-product-by-keyword','ProductController@get_product_by_keyword');
Route :: get('/show-product/{product_id}','ProductController@get_single_product');
Route :: get('/products-by-keyword','ProductController@helper_function');



Route :: get('/contact','MailSend@index');
Route :: post('/send-email','MailSend@send_mail');