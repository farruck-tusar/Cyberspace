<div class="wrapper wrapper-full-page">
          

<div class="page-header login-page "  style="background-image: url('assets/img/back10.jpg')">
  <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
  <div class="container">
    <div class="col-lg-4 col-md-6 col-sm-6 ml-auto mr-auto">
      <div class="card card-login card-hidden">
        <div class="card-header card-header-rose text-center" style="background: #4f4f4f">
          <h4 class="card-title">CyberSpace BD Admin</h4>
        </div>
        <?php 
        if(isset($_POST['form_submit'])){
          $url = 'http://cyberspacebd.net/dashboard/api/v1/president/verify/login';
          $data = array('email' =>  $_POST['username'], 'password' =>  $_POST['password']);

          // use key 'http' even if you send the request to https://...
          $options = array(
              'http' => array(
                  'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                  'method'  => 'POST',
                  'content' => http_build_query($data)
              )
          );
          $context  = stream_context_create($options);
          $rawdata = file_get_contents($url, false, $context);
          if ($rawdata === false) {
              echo "Unable to fetch data from: $url";
          }
          $data = json_decode($rawdata, true);
          if (JSON_ERROR_NONE !== json_last_error()) {
              exit("Failed to parse json: " . json_last_error_msg());
          }
          if($data['success']){
            //date_default_timezone_set('Asia/Dhaka');
            if (isset($_POST['rememberme'])) {
                // setcookie("username", $_POST['username'], time() + (86400 * 1), "/"); // 86400 = 1 day
                // setcookie("password", $_POST['password'], time() + (86400 * 1), "/"); // 86400 = 1 day
                $_SESSION['username'] = $_POST['username'];
            } else {
                // setcookie("username", $_POST['username'], false, "/"); // 86400 = 1 day
                // setcookie("password", $_POST['password'], false, "/"); // 86400 = 1 day
                $_SESSION['username'] = $_POST['username'];
            }
            header('Location: index');
          }
          else{
            echo '<div class="container"><div class="alert alert-danger alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Failed!</strong><br> Email or Password does not match.
                  </div></div>';
          }
        }
        ?> 
        <form class="form" method="post">
          <div class="card-body">
            <span class="bmd-form-group">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">face</i>
                  </span>
                </div>
                <input type="text" class="form-control" name="username" placeholder="User Name" style="padding-left: 10px">
              </div>
            </span>
            <span class="bmd-form-group">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">lock_outline</i>
                  </span>
                </div>
                <input type="password" class="form-control" name="password" placeholder="Password" style="padding-left: 10px">
              </div>
            </span>
            <div style="padding-top:20px; margin-left:55px;" >
                <input type="checkbox" name="rememberme" id="remember" <?php if(isset($_COOKIE["member_login"])) { ?> checked <?php } ?> />
                <label for="remember-me">Remember me</label>
            </div>
          </div>
          <div class="card-footer justify-content-center">
            <button class="btn btn-md" name="form_submit" style="background-color: #999">Login</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  