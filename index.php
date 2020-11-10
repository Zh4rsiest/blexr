<?php
require("vendor/autoload.php");
require("routes/web.php");
use App\Controllers\AuthController as AuthController;
use App\Models\Auth as Auth;
// echo "<pre>";
// print_r(get_defined_constants());
// echo "</pre>";

// echo "<pre>";
// print_r(get_declared_classes());
// echo "</pre>";

// $user = new \App\Models\User();
// $_tmp = $user->create([
//   "name" => "Jack Nicholson",
//   "email" => "employee@blexr.com",
//   "role" => 2
//   // "password_length" => 8
// ]);
// print_r($_tmp);

// $auth = new AuthController();
// $auth->login([
//   "email" => "test@asd.com",
//   "password" => "asd"
// ]);
// echo "<pre>";
// print_r(json_encode(Auth::user()));
// echo "</pre>";

// $user = new \App\Models\User();
//
// echo "<pre>";
// print_r($user->all());
// echo "</pre>";

$uri = ltrim($_SERVER["REQUEST_URI"], "/");

if ($uri != "" && $router->resolve($uri, $_GET)) {
  exit;
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Blexr HR app</title>
    <link rel="stylesheet" href="/public/css/main.css"/>
    <script type="text/javascript">
      window.user = <?php Auth::user(true) ?>;
    </script>
  </head>
  <body>
    <div id="app">
      <navbar></navbar>
      <router-view></router-view>
    </div>
    <script src="/public/js/app.js"></script>
  </body>
</html>
