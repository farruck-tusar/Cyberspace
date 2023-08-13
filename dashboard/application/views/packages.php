<div class="wrapper ">
    <div class="sidebar" data-color="rose" data-background-color="black" data-image="assets/img/sidebar-1.jpg">
      <!--
          Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

          Tip 2: you can also add an image using data-image tag
      -->

  		<div class="logo"><a href="#" class="simple-text logo-mini">
           CS 
      	</a>

      <a href="http://cyberspacebd.net/dashboard/" class="simple-text logo-normal">
           CyberSpace 
      </a>
      </div>

    <div class="sidebar-wrapper">
        
        <div class="user">
            <div class="photo">
                <img src="assets/img/faces/rasel.png" />
            </div>
            <div class="user-info">
                <a data-toggle="collapse" href="#collapseExample" class="username">
                    <span>
                       Md. Asaduzzaman
                      <b class="caret"></b>
                    </span>
                </a>
                <div class="collapse" id="collapseExample">
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                              <span class="sidebar-mini"> MP </span>
                              <span class="sidebar-normal"> My Profile </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                              <span class="sidebar-mini"> EP </span>
                              <span class="sidebar-normal"> Edit Profile </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                              <span class="sidebar-mini"> ST </span>
                              <span class="sidebar-normal"> Settings </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <ul class="nav">

            <li class="nav-item">
                <a class="nav-link" href="index">
                    <i class="material-icons">dashboard</i>
                    <p> Dashboard </p>
                </a>
            </li>
            
            <li class="nav-item ">
                <a class="nav-link" href="customer_list">
                    <i class="material-icons">list_alt</i>
                    <p> Customer List </p>
                </a>
            </li>
             <li class="nav-item ">
                <a class="nav-link" href="#">
                    <i class="material-icons">attach_money</i>
                    <p> Billing Statement </p>
                </a>
            </li>
             <li class="nav-item active">
                <a class="nav-link" href="packages">
                    <i class="material-icons">card_giftcard</i>
                    <p> Packages </p>
                </a>
            </li>
             <li class="nav-item ">
                <a class="nav-link" href="#">
                    <i class="material-icons">contact_support</i>
                    <p> Support </p>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="#">
                    <i class="material-icons">settings_input_antenna</i>
                    <p> Coverage </p>
                </a>
            </li>
            
        </ul>
        
    </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top " id="navigation-example">
      	<div class="container-fluid">
          <div class="navbar-wrapper">
              <div class="navbar-minimize">
                <button id="minimizeSidebar" class="btn btn-just-icon btn-white btn-fab btn-round">
                    <i class="material-icons text_align-center visible-on-sidebar-regular">more_vert</i>
                    <i class="material-icons design_bullet-list-67 visible-on-sidebar-mini">view_list</i>
                </button>
              </div>
      			<a class="navbar-brand" href="#">CyberSpace Dashboard</a>
      		</div>

      		<button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation" data-target="#navigation-example">
            <span class="sr-only">Toggle navigation</span>
      			<span class="navbar-toggler-icon icon-bar"></span>
      			<span class="navbar-toggler-icon icon-bar"></span>
      			<span class="navbar-toggler-icon icon-bar"></span>
      		</button>

      	    <div class="collapse navbar-collapse justify-content-end">
                  <!-- <form class="navbar-form">
      			    <div class="input-group no-border">
      			        <input type="text" value="" class="form-control" placeholder="Search...">
      			        <button type="submit" class="btn btn-white btn-round btn-just-icon">
      			          <i class="material-icons">search</i>
      			          <div class="ripple-container"></div>
      			        </button>
      			    </div>
      			</form> -->

      			<ul class="navbar-nav">
      			 

      			  <li class="nav-item dropdown">
      				     <a class="nav-link" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="material-icons">person</i>
      				      <p class="d-lg-none d-md-block">
      				        Account
      				      </p>
      				    </a>
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="logout">Logout</a>
                    
                  </div>
      			  </li>
      			</ul>   
      	    </div>
      	</div>
      </nav>
      <!-- End Navbar -->
      <div class="content">

<div class="container-fluid">
<?php 
if(isset($_POST['form_submit'])){
$url = 'http://cyberspacebd.net/dashboard/api/v1/package/add/new';
$data = array(
  'pack_name' =>  $_POST['pack_name'], 
  'pack_price' =>  $_POST['pack_price'], 
  'bandwidth' =>  $_POST['bandwidth'], 
  'ip_type' =>  $_POST['ip_type']);

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
  echo '<div class="alert alert-success alert-dismissible fade show">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>Success!</strong><br> New Package Added Successfully!
        </div>';
}
else{
  echo '<div class="alert alert-danger alert-dismissible fade show">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>Failed!</strong><br>
        </div>';
}
}
?>
  <div class="row">
    <div class="col-md-6">
     <div class="card card-profile">
        <div class="card-body">
          <h3 style="font-weight: bold;">Add New Package</h3><br>
          <form class="form div-col-12" method="post" >
            <div class="form-group has-default">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">card_giftcard</i>
                  </span>
                </div>
                <input type="text" name="pack_name" required="" class="form-control" placeholder="Package Name">
              </div>
            </div>
            <div class="form-group has-default">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">attach_money</i>
                  </span>
                </div>
                <input type="text" name="pack_price" class="form-control" placeholder="Package Price">
              </div>
            </div>
            <div class="form-group has-default">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">network_check</i>
                  </span>
                </div>
                <input type="text" name="bandwidth" placeholder="Bandwidth" class="form-control">
              </div>
            </div>
             <div class="form-group has-default">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">language</i>
                  </span>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12" style="padding-left:0px">
                  <select class="selectpicker" name="ip_type" data-style="btn btn-outline" title="IP Type">
                    <option>PUBLIC</option>
                    <option>REAL</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="text-center">
              <button type="submit" name="form_submit" class="btn btn-rose">Add Package</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <div class="col-md-6">
      <div class="card card-profile">
        <div class="card-body">
          <h3 style="font-weight: bold;">Available Packages</h3>
          <div class="col-md-12">
	        <div class="card" style="background-color:#e8e8e8">
	          <div class="card-header card-header-icon card-header-rose">
	            <div class="card-icon">
	              <i class="material-icons">card_giftcard</i>
	            </div>
	            <!-- <h4 class="card-title ">Billing History</h4> -->
	          </div>
	          <div class="card-body">
	            <div class="table-responsive">
	              <table class="table">
	                <thead class=" text-primary">
	                  <th>
	                    Package Name
	                  </th>
	                  <th>
	                    Price
	                  </th>
	                  <th>
	                    Bandwidth
	                  </th>
	                  <th>
	                    IP Type
	                  </th>
	                </thead>
	                <tbody>
                  <?php 
                  $url = 'http://cyberspacebd.net/dashboard/api/v1/package/all';
                  // use key 'http' even if you send the request to https://...
                  $options = array(
                      'http' => array(
                          'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                          'method'  => 'GET'
                      )
                  );
                  $context  = stream_context_create($options);
                  $rawdata = file_get_contents($url, false, $context);
                  if ($rawdata === false) {
                      echo "Unable to fetch data from: $url";
                  }
                  $data = json_decode($rawdata);
                  if (JSON_ERROR_NONE !== json_last_error()) {
                      exit("Failed to parse json: " . json_last_error_msg());
                  }
                  foreach ($data->user as $item) {?>
	                  <tr>
	                    <td><?php echo $item->pack_name;?></td>
	                    <td><?php echo $item->pack_price;?></td>
	                    <td><?php echo $item->bandwidth;?></td>
	                    <td><?php echo $item->ip_type;?></td>
	                  </tr>
                  <?php }?>
	                </tbody>
	              </table>
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
