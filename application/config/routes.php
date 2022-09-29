<?php
defined('BASEPATH') or exit('No direct script access allowed');


$route['default_controller'] = 'Adminlogin';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['dashboard'] = 'AdminDashboard';
// $route['Adminlogin'] = 'login';
// $route['empAutoLogin'] = 'Adminlogin/empAutoLogin';




$route['employee_list'] = 'AdminDashboard/employee_list';
$route['new_employee'] = 'AdminDashboard/new_employee';
$route['update_employee/(:any)'] = 'AdminDashboard/update_employee/$1';
$route['status-update'] = 'AdminDashboard/updatestatus';
$route['category'] = 'AdminDashboard/category';
$route['add-task'] = 'AdminDashboard/new_task';

$route['task-list'] = 'AdminDashboard/task_list';
$route['update-task/(:any)'] = 'AdminDashboard/update_task/$1';
$route['my-list'] = 'AdminDashboard/my_task';
$route['comment/(:any)'] = 'AdminDashboard/comment/$1';

$route['update-category/(:any)'] = 'AdminDashboard/update_category/$1';
$route['logout'] = 'AdminDashboard/logout';
