<?php
  ob_start();
  session_start();
  error_reporting(1);

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>yrprey - Library Book</title>
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Bootstrap JS Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<link rel="icon" href="/assets/img/favicon.svg" title="YRprey">
<style>
  /* Estilos adicionais */
  body {
    background-color: #f8f9fa;
  }
  #page_header {
    background-color: #007bff;
    color: #fff;
    padding: 10px;
  }
  .label {
    font-weight: bold;
  }
  .reg_row {
    margin-bottom: 10px;
  }
</style>
<script src="assets/js/bootstrap-3.3.5.js"></script>
<script src="assets/js/jquery-1.5.1.js"></script>
<script src="assets/js/lodash-3.9.0.js"></script>
</head>
<body>
<?php

$user_id="";
  
if (isset($_COOKIE["user"])) {
  $cookie = $_COOKIE["user"];
  $value = explode("-",$cookie);
  $user_id = $value[2];
  
  if (stripos($_COOKIE["user"], "admin") !== false) {
    $user = "admin";
  }    
else {
  $user = "user";
}

if (!empty($_COOKIE["user"])) {
  exit(header("location: home.php?id=$user_id"));
}
}
else {
$user = "oauth";
$user_id = "";
}
?>

  <div class="container-fluid">
    <div id="page_layout" class="row">
      <div id="page_header" class="col-12 p_head1 p_head_l3"  style="background-color: #343a40!important;">
        <div class="content">
          <a id="home" href="/" onclick="return nav.go(this, event)" class="fl_l"></a>
          <div id="top_nav" class="head_nav ta_r">
            <div id="top_links">
              <img src="assets/img/logo.svg">
            </div>
          </div>
        </div>
      </div>

      <div id="side_bar" class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
      <br><br>
      <?php

include("database.php");

if (isset($_POST["login"])) {

  $username = $_POST["email"];
  $pass = $_POST["pass"];

$query  = "SELECT * FROM operators where nick='" . $username . "' AND pass='" . $pass . "'";

$result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));

$row = mysqli_num_rows($result);

if ($row > 0) {

  $rw = mysqli_fetch_assoc($result);
    
    $user_id = $rw["id"];
    $permission = $rw["permission"];

    $tempo_expiracao = time() + 3600;
    $cookie =  $tempo_expiracao."-".$permission."-".$user_id;

    setcookie("user", $cookie, $tempo_expiracao);

    exit(header("location: home.php?id=$user_id"));

}
else {
  print '<br><div class="alert alert-danger" role="alert">
  User Not found!
</div>';
} 

}
?>
        <div id="quick_login">
          <form method="POST" name="login" id="quick_login_form" action="">
            <div class="form-group">
              <label for="quick_email" class="label">Username:</label>
              <input type="text" name="email" class="form-control">
            </div>
            <div class="form-group">
              <label for="quick_pass" class="label">Password:</label>
              <input type="password" name="pass" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary mt-3" name="login">Log In</button>
          </form><br>
        </div>
      </div>

      <div id="page_body" class="col-lg-9 col-md-8 col-sm-6 col-xs-12" style="border-left: 1px solid silver;">
        <div id="header_wrap2">
          <div id="header_wrap1">
            <div id="header">
              <br>              
<?php

if (isset($_POST["register"])) {

  $username = $_POST["username"];
  $pass = $_POST["pass"];
  $sexo = $_POST["sex"];

$query  = "SELECT * FROM operators where nick='" . $username . "'";

$result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));

$row = mysqli_num_rows($result);

if ($row > 0) {
  print '<br><div class="alert alert-danger" role="alert">
  User not registred!
</div>';
} 
else {
  print "OK";
}
}
?>
              <h1 id="title">Welcome!</h1>
            </div>
          </div>
        </div>
        <div id="wrap_between"></div>
        <div id="wrap3">
          <div id="wrap2">
            <div id="wrap1">
              <div id="content">
                <div id="index">
                  <div class="content">
                    The yrprey simulates a web system with vulnerable functions for exploitation and code correction.</b>
                    <p></p>
                    <p>What you can find in the system:</p>
                    <ul class="listing">
                      <li><span>Library system functions for book loans.</span></li>
                      <li><span>Vulnerabilities based on the OWASP TOP 10 WebApps.</span></li>
                      <li><span>CSRF, Prototype Pollution, Security Misconfiguration, XSS etc</span></li>
                    </ul>
                  </div>
                  <br><br>
                  <h2>&nbsp;</h2>
                  <hr>

                    </div>
                    <br><br>
                    <div class="terms_accepted"></a>.
                    <br><br>  <br><br>
                </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
    </div>
  </div>
  <footer class="bg-dark py-4 mt-auto">
            <div class="container px-5">
                <div class="row align-items-center justify-content-between flex-column flex-sm-row">
                    <div class="col-auto"><div class="small m-0 text-white">Copyright © yrprey 2024</div></div>
                    <div class="col-auto">
                        <a class="link-light small" href="#!">Privacy</a>
                        <span class="text-white mx-1">·</span>
                        <a class="link-light small" href="#!">Terms</a>
                        <span class="text-white mx-1">·</span>
                        <a class="link-light small" href="#!">Contact</a>
                    </div>
                </div>
            </div>
        </footer>  
</body>
</html>