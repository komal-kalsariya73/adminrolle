<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');
$routes->get('/admin', 'AdminController::index');
$routes->get('/admin/profile', 'AdminController::view');
$routes->get('admin/fetchUserProfile', 'AdminController::fetchUserProfile');
$routes->get('/profile', 'AdminController::display');
$routes->post('profile/update', 'AdminController::update');
$routes->get('admin/editProfile', 'AdminController::editProfile');
$routes->post('admin/update', 'AdminController::update');
$routes->post('AdminController/changepassword', 'AdminController::changePassword');

$routes->get('/', 'LoginController::view');
$routes->get('/login', 'LoginController::view');
$routes->post('/login/authenticate', 'LoginController::authenticate');
$routes->get('/logout', 'LoginController::logout');
$routes->get('/forgotPassword', 'LoginController::ForgotPass');
$routes->get('/resetPassword', 'LoginController::ResetPass');
$routes->get('forgotPassword', 'LoginController::forgotPassword');
$routes->post('sendResetLink', 'LoginController::sendResetLink');
$routes->get('resetPassword/(:any)', 'LoginController::resetPassword/$1');
$routes->post('updatePassword', 'LoginController::updatePassword');




$routes->get('/staff', 'UserInfoController::index');
$routes->get('/staff/view', 'UserInfoController::view');
$routes->post('/staff/insert', 'UserInfoController::insert');
$routes->get('/staff/fetch', 'UserInfoController::fetchAll');
$routes->get('/staff/fetchUsers/(:num)', 'UserInfoController::fetchUsers/$1');
$routes->post('/staff/update', 'UserInfoController::update');
$routes->post('/staff/delete/(:num)', 'UserInfoController::delete/$1');
$routes->get('/staff/display', 'UserInfoController::display');
$routes->get('staff/details/(:num)', 'UserInfoController::details/$1');




$routes->get('/customer', 'CustomerController::index');
$routes->get('/customer/view', 'CustomerController::view');
$routes->post('/customer/insert', 'CustomerController::insert');
$routes->get('/customer/getCustomers', 'CustomerController::getCustomers');
$routes->post('/customer/delete/(:num)', 'CustomerController::delete/$1');
$routes->get('/customer/fetchCustomer/(:num)', 'CustomerController::fetchCustomer/$1');
$routes->post('/customer/update', 'CustomerController::update');
$routes->get('/customer/display', 'CustomerController::display');
$routes->get('customer/details/(:num)', 'CustomerController::details/$1');


$routes->get('/project', 'ProjectController::index');
$routes->get('/project/view', 'ProjectController::view');
$routes->post('/project/insert', 'ProjectController::insert');
$routes->get('/project/getProject', 'ProjectController::getProject');
$routes->post('/project/delete/(:num)', 'ProjectController::delete/$1');
$routes->get('/project/fetchProject/(:num)', 'ProjectController::fetchProject/$1');
$routes->post('/project/update', 'ProjectController::update');
$routes->get('/project/display', 'ProjectController::display');
$routes->get('project/details/(:num)', 'ProjectController::details/$1');


$routes->get('/followup', 'FollowController::index');
$routes->get('/followup/view', 'FollowController::view');
$routes->post('/followup/insert', 'FollowController::insert');
$routes->get('/followup/getFollowup', 'FollowController::getFollowup');
$routes->post('/followup/delete/(:num)', 'FollowController::delete/$1');
$routes->get('/followup/fetchfollowup/(:num)', 'FollowController::fetchfollowup/$1');
$routes->post('/followup/update', 'FollowController::update');
$routes->get('/followup/display', 'FollowController::display');
$routes->get('followup/details/(:num)', 'FollowController::details/$1');

// $routes->get('/chat', 'ChatController::index');
 $routes->get('/chat', 'ChatController::view');
$routes->get('chat/getMessages/(:num)', 'ChatController::getMessages/$1');
$routes->post('chat/sendMessage', 'ChatController::sendMessage');
$routes->get('chat/getUsers', 'ChatController::getUsers');
