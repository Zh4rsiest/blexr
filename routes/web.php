<?php
// You can declare routes here
// Routes can either be post or get method
$router = new Router();
$router->get("test", "AuthController@test");
$router->post("login", "AuthController@login");
$router->post("logout", "AuthController@logout");
$router->get("user/get", "AuthController@fetchUser");
$router->get("user/get_by_id", "AuthController@fetchUserById");
$router->get("users/all", "AuthController@getAllUsers");
$router->post("user/update_task", "AuthController@updateTask");
$router->post("employee/add", "EmployeeController@addNewEmployee");
$router->post("request/add", "RequestController@addNewRequest");
$router->post("request/process", "RequestController@processRequest");
$router->post("request/delete_by_id", "RequestController@deleteById");
$router->get("request/all_with_employee", "RequestController@fetchAllRequestsWithEmployee");
$router->get("request/logged_in_users_requests", "RequestController@fetchLoggedInUsersRequests");
?>
