<?php
// You can declare routes here
// Routes can either be post or get method
$router = new Router();
// $router->get("test", "AuthController@test");
$router->post("login", "AuthController@login");
$router->post("logout", "AuthController@logout");

$router->get("user/get", "AuthController@fetchUser", "auth");
$router->get("user/get_by_id", "AuthController@fetchUserById", "auth");
$router->get("users/all", "AuthController@getAllUsers", "auth");
$router->post("user/update_task", "AuthController@updateTask", "auth");
$router->post("employee/add", "EmployeeController@addNewEmployee", "auth");
$router->post("request/add", "RequestController@addNewRequest", "auth");
$router->post("request/process", "RequestController@processRequest", "auth");
$router->post("request/delete_by_id", "RequestController@deleteById", "auth");
$router->get("request/all_with_employee", "RequestController@fetchAllRequestsWithEmployee", "auth");
$router->get("request/logged_in_users_requests", "RequestController@fetchLoggedInUsersRequests", "auth");
?>
