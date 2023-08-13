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
        </a></div>

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

            <li class="nav-item  ">
                <a class="nav-link" href="index">
                    <i class="material-icons">dashboard</i>
                    <p> Dashboard </p>
                </a>
            </li>
            
            <li class="nav-item active">
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
             <li class="nav-item ">
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

	

	    <div class="collapse navbar-collapse justify-content-end">
           

			<ul class="navbar-nav">
			  


			  <li class="nav-item">
				    <a class="nav-link" href="#pablo">
				      <i class="material-icons">person</i>
				      <p class="d-lg-none d-md-block">
				        Account
				      </p>
				    </a>
			  </li>
			</ul>   
	    </div>
	</div>
</nav>
<!-- End Navbar -->


             
                     

<div class="content">
  <div class="container-fluid">
    <?php 
    $url = 'http://cyberspacebd.net/dashboard/api/v1/user/all';
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
    ?>
    <div class="row">
    	<div class="col-md-12">
      <div class="card">
        <div class="card-header card-header-rose card-header-icon">
          <div class="card-icon">
            <i class="material-icons">assignment</i>
          </div>
          <h4 class="card-title">Customer List</h4>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table id="datatables" class="table table-striped">
                      <thead>
                        <tr>
                          <th>Sl. No</th>
                          <th>Name</th>
                          <th>Old User ID</th>
                          <th>CS Code</th>
                          <th>Mobile No</th>
                          <th class="td-actions">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                          $sl = 1;
                          foreach ($data->user as $item) {?>
                           <tr>
                              <td><?php echo $sl;?></td>
                              <?php $user_id = 'profile/'.$item->user_id;?>
                              <td><span style="font-weight: bold;"><a href="<?php echo $user_id;?>"><?php echo $item->full_name;?></a></span></td>
                              <td><?php echo $item->old_id;?></td>
                              <td><?php echo $item->connection_code;?></td>
                              <td><?php echo $item->mobile_number;?></td>
                              <td class="td-actions">
                               <!--  <button type="button" rel="tooltip" class="btn btn-info btn-round" style="margin:3px">
                                  <i class="material-icons">person</i>
                                </button> -->
                                <a href="#"><button type="button" rel="tooltip" class="btn btn-success btn-round" style="margin:3px">
                                  <i class="material-icons">edit</i>
                                </button></a>
                                 <a ><button type="button" onclick="alert('Delete User ??');" rel="tooltip" class="btn btn-danger btn-round" style="margin:3px">
                                  <i class="material-icons">close</i>
                                </button></a>
                              </td>
                            </tr>
                          <?php $sl++;}
                        ?>
                      </tbody>
                    </table>
          </div>
        </div>
      </div>
    </div>
    </div>
                
              </div>
            </div>

