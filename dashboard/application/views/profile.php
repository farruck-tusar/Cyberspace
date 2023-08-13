<!DOCTYPE html>
<html lang="en">
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" >
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title><?php echo $baseurl; ?></title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!-- Extra details for Live View on GitHub Pages -->
    
    


    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700%7CRoboto+Slab:400,700%7CMaterial+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

    <!-- CSS Files -->
    <link href="../assets/css/material-dashboard.min-v=2.0.2.css" rel="stylesheet" />

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="../assets/demo/demo.css" rel="stylesheet" />

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-NKDMSK6');</script>
    <!-- End Google Tag Manager -->
    <style type="text/css">
    	.image-avatar{
		    width: 150px;
		    height: 150px;
		    -webkit-border-radius: 60px;
		    -webkit-background-clip: padding-box;
		    -moz-border-radius: 60px;
		    -moz-background-clip: padding;
		    
		    background-clip: padding-box;
		    
		    float: left;
		    background-size: cover;
		    background-position: center center;
		}
    </style>
    </head>

    <body class="">
      
    
<div class="wrapper ">
    <div class="sidebar" data-color="rose" data-background-color="black" data-image="../assets/img/sidebar-1.jpg">
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
                <img src="../assets/img/faces/rasel.png" />
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

            <li class="nav-item active ">
                <a class="nav-link" href="../index">
                    <i class="material-icons">dashboard</i>
                    <p> Dashboard </p>
                </a>
            </li>
            
            <li class="nav-item ">
                <a class="nav-link" href="../customer_list">
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
                <a class="nav-link" href="../packages">
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
                    <a class="dropdown-item" href="../logout">Logout</a>
                    
                  </div>
      			  </li>
      			</ul>   
      	    </div>
      	</div>
      </nav>
      <!-- End Navbar -->
      <div class="content">

<div class="container-fluid">
  <div class="row">
    <?php 
    $url = 'http://cyberspacebd.net/dashboard/api/v1/user/'.$user_id;;
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
    foreach ($data->user as $item) {
        $house = empty($item->house)?"":"House {$item->house}<br>";
        $flat = empty($item->flat_no)?"":"Flat {$item->flat_no}";
        $thana = empty($item->thana)?"":"Thana {$item->thana}<br>";
        $block = empty($item->block)?"":"Block {$item->block}";
        $road = empty($item->road)?"":"Road {$item->road}<br>";
        $area = empty($item->other)?"":"Area {$item->other}";
        $city = empty($item->city)?"":"{$item->city}";
        $post_code = empty($item->post_code)?"":"-{$item->post_code}";
    ?>
    <div class="col-md-6">
      <div class="card card-profile">
        <div class="card-avatar">
          <a href="#">
            
  			<div class="image-avatar" style="background-image: url(<?php echo '../'.$item->picture_path;?>)"></div>
    
          </a>
        </div>
        <div class="card-body">
       	  <h4 class="card-title"><span style="font-weight: bold;"><?php echo $item->full_name;?></span></h4><Br>
       	       <h4><b>Connection Code:</b> <?php echo $item->connection_code;?></h4>
       	       <h4><b>Registration Date :</b> <?php echo $item->registration_date;?></h4>
          <h4><b>IP Address :</b> <?php echo $item->user_ip_address;?></h4> 
          <h4><b>Old User ID :</b> <?php echo $item->old_id;?></h4> 
          
          
          <hr>
          <h4><b>Email Address :</b> <?php echo $item->email_address;?><br>
            <b>Mobile Number :</b>  <?php echo $item->mobile_number;?><br>
            <b>NID :</b> <?php echo $item->national_id_number;?><br>
            <b>DOB :</b> <?php echo $item->date_of_birth;?></h4>
            <hr>
            <h4><b>Address </b> <br>
                   <?php echo $flat?>
                   <?php echo $house;?>
                   <?php echo $road;?>
                   <?php echo $block;?>
                   <?php echo $area;?>
                   <?php echo $thana;?>
                   <?php echo $city;?>
                   <?php echo $post_code;?>
            </h4>
          <hr>
          <a href="#" class="btn btn-rose btn-round">Edit Profile</a>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card card-profile">
        
        <div class="card-body">
          <h3 style="font-weight: bold;">Billing Information</h3>
          <div class="col-md-12">
	        <div class="card" style="background-color:#e8e8e8">
	          <div class="card-header card-header-icon card-header-rose">
	            <div class="card-icon">
	              <i class="material-icons">attach_money</i>
	            </div>
	            <h4 class="card-title ">Billing History</h4>
	          </div>
	          <div class="card-body">
	            <div class="table-responsive">
	              <table class="table">
	                <thead class=" text-primary">
	                  <th>
	                    Date
	                  </th>
	                  <th>
	                    Amount
	                  </th>
	                  <th>
	                    Description
	                  </th>
	                  <th>
	                    Status
	                  </th>
	                </thead>
	                <tbody>
	                  <tr>
	                    <td> 01 October 2018</td>
	                    <td>700 BDT</td>
	                    <td>1 GB Package</td>
	                    <td>Success</td>
	                  </tr>
	                  <tr>
                      <td> 02 October 2018</td>
                      <td>700 BDT</td>
                      <td>1 GB Package</td>
                      <td>Success</td>
                    </tr>
                    <tr>
                      <td> 03 October 2018</td>
                      <td>700 BDT</td>
                      <td>1 GB Package</td>
                      <td>Success</td>
                    </tr>
                    <tr>
                      <td> 04 October 2018</td>
                      <td>700 BDT</td>
                      <td>1 GB Package</td>
                      <td>Success</td>
                    </tr>
                    <tr>
                      <td> 05 October 2018</td>
                      <td>700 BDT</td>
                      <td>1 GB Package</td>
                      <td>Success</td>
                    </tr>
                    <tr>
                      <td> 06 October 2018</td>
                      <td>700 BDT</td>
                      <td>1 GB Package</td>
                      <td>Success</td>
                    </tr>
                    <tr>
                      <td> 01 October 2018</td>
                      <td>700 BDT</td>
                      <td>1 GB Package</td>
                      <td>Success</td>
                    </tr>
	                </tbody>
	              </table>
	            </div>
	          </div>
	        </div>
	      </div>
          
        </div>
      </div>
    </div>
     <?php }?>
  </div>
</div>
</div>
<footer class="footer" style="background-color: #ffffff90">
    <div class="container">
        <nav class="float-left">
          <ul>
              <li>
                  <a href="www.cyberspacebd.net">
                      Cyberspace Bangladesh
                  </a>
              </li>
              <li>
                  <a href="#">
                      About Us
                  </a>
              </li>
              
              <li>
                  <a href="#">
                      Licenses
                  </a>
              </li>
          </ul>
        </nav>
        <div class="copyright float-right">
            &copy;
            <script>
                document.write(new Date().getFullYear())
            </script>, made with <i class="material-icons">favorite</i> by
            <a href="#" target="_blank">Fid Studio Ltd.</a> for a better life.
        </div>
    </div>
</footer>

               
</div>
  
</div>
        
            


<!--   Core JS Files   -->
<script src="../assets/js/core/jquery.min.js" type="text/javascript"></script>
<script src="../assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="../assets/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>

<script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js" ></script>


<!-- Plugin for the momentJs  -->
<script src="../assets/js/plugins/moment.min.js"></script>

<!--  Plugin for Sweet Alert -->
<script src="../assets/js/plugins/sweetalert2.js"></script>

<!-- Forms Validations Plugin -->
<script src="../assets/js/plugins/jquery.validate.min.js"></script>

<!--  Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
<script src="../assets/js/plugins/jquery.bootstrap-wizard.js"></script>

<!--  Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
<script src="../assets/js/plugins/bootstrap-selectpicker.js" ></script>

<!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
<script src="../assets/js/plugins/bootstrap-datetimepicker.min.js"></script>

<!--  DataTables.net Plugin, full documentation here: https://datatables.net/    -->
<script src="../assets/js/plugins/jquery.dataTables.min.js"></script>

<!--  Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
<script src="../assets/js/plugins/bootstrap-tagsinput.js"></script>

<!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="../assets/js/plugins/jasny-bootstrap.min.js"></script>

<!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
<script src="../assets/js/plugins/fullcalendar.min.js"></script>

<!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
<script src="../assets/js/plugins/jquery-jvectormap.js"></script>

<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="../assets/js/plugins/nouislider.min.js" ></script>

<!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>

<!-- Library for adding dinamically elements -->
<script src="../assets/js/plugins/arrive.min.js"></script>


<!--  Google Maps Plugin    -->

<script  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB2Yno10-YTnLjjn_Vtk0V8cdcY5lC4plU"></script>

<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>


<!-- Chartist JS -->
<script src="../assets/js/plugins/chartist.min.js"></script>

<!--  Notifications Plugin    -->
<script src="../assets/js/plugins/bootstrap-notify.js"></script>





<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="../assets/js/material-dashboard.min.js?v=2.0.2" type="text/javascript"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="../assets/demo/demo.js"></script>
<script>
  $(document).ready(function(){
    $().ready(function(){
      $sidebar = $('.sidebar');

      $sidebar_img_container = $sidebar.find('.sidebar-background');

      $full_page = $('.full-page');

      $sidebar_responsive = $('body > .navbar-collapse');

      window_width = $(window).width();

      fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

      if (window_width > 767 && fixed_plugin_open == 'Dashboard') {
          if ($('.fixed-plugin .dropdown').hasClass('show-dropdown')) {
              $('.fixed-plugin .dropdown').addClass('open');
          }

      }

      $('.fixed-plugin a').click(function(event) {
          // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
          if ($(this).hasClass('switch-trigger')) {
              if (event.stopPropagation) {
                  event.stopPropagation();
              } else if (window.event) {
                  window.event.cancelBubble = true;
              }
          }
      });

      $('.fixed-plugin .active-color span').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('color');

          if ($sidebar.length != 0) {
              $sidebar.attr('data-color', new_color);
          }

          if ($full_page.length != 0) {
              $full_page.attr('filter-color', new_color);
          }

          if ($sidebar_responsive.length != 0) {
              $sidebar_responsive.attr('data-color', new_color);
          }
      });

      $('.fixed-plugin .background-color .badge').click(function() {
          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('background-color');

          if ($sidebar.length != 0) {
              $sidebar.attr('data-background-color', new_color);
          }
      });

      $('.fixed-plugin .img-holder').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).parent('li').siblings().removeClass('active');
          $(this).parent('li').addClass('active');


          var new_image = $(this).find("img").attr('src');

          if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
              $sidebar_img_container.fadeOut('fast', function() {
                  $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
                  $sidebar_img_container.fadeIn('fast');
              });
          }

          if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
              var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

              $full_page_background.fadeOut('fast', function() {
                  $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
                  $full_page_background.fadeIn('fast');
              });
          }

          if ($('.switch-sidebar-image input:checked').length == 0) {
              var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
              var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

              $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
              $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
          }

          if ($sidebar_responsive.length != 0) {
              $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
          }
      });

      $('.switch-sidebar-image input').change(function() {
          $full_page_background = $('.full-page-background');

          $input = $(this);

          if ($input.is(':checked')) {
              if ($sidebar_img_container.length != 0) {
                  $sidebar_img_container.fadeIn('fast');
                  $sidebar.attr('data-image', '#');
              }

              if ($full_page_background.length != 0) {
                  $full_page_background.fadeIn('fast');
                  $full_page.attr('data-image', '#');
              }

              background_image = true;
          } else {
              if ($sidebar_img_container.length != 0) {
                  $sidebar.removeAttr('data-image');
                  $sidebar_img_container.fadeOut('fast');
              }

              if ($full_page_background.length != 0) {
                  $full_page.removeAttr('data-image', '#');
                  $full_page_background.fadeOut('fast');
              }

              background_image = false;
          }
      });

      $('.switch-sidebar-mini input').change(function() {
          $body = $('body');

          $input = $(this);

          if (md.misc.sidebar_mini_active == true) {
              $('body').removeClass('sidebar-mini');
              md.misc.sidebar_mini_active = false;

              $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

          } else {

              $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

              setTimeout(function() {
                  $('body').addClass('sidebar-mini');

                  md.misc.sidebar_mini_active = true;
              }, 300);
          }

          // we simulate the window Resize so the charts will get updated in realtime.
          var simulateWindowResize = setInterval(function() {
              window.dispatchEvent(new Event('resize'));
          }, 180);

          // we stop the simulation of Window Resize after the animations are completed
          setTimeout(function() {
              clearInterval(simulateWindowResize);
          }, 1000);

      });
    });
  });
</script>





  
<!-- Sharrre libray -->
<script src="../assets/demo/jquery.sharrre.js"></script>

<script>
  $(document).ready(function() {
    $('#datatables').DataTable({
      "pagingType": "full_numbers",
      "lengthMenu": [
        [10, 25, 50, -1],
        [10, 25, 50, "All"]
      ],
      responsive: true,
      language: {
        search: "_INPUT_",
        searchPlaceholder: "Search records",
      }
    });

    var table = $('#datatable').DataTable();

    // Edit record
    table.on('click', '.edit', function() {
      $tr = $(this).closest('tr');
      var data = table.row($tr).data();
      alert('You press on Row: ' + data[0] + ' ' + data[1] + ' ' + data[2] + '\'s row.');
    });

    // Delete a record
    table.on('click', '.remove', function(e) {
      $tr = $(this).closest('tr');
      table.row($tr).remove().draw();
      e.preventDefault();
    });

    //Like record
    table.on('click', '.like', function() {
      alert('You clicked on Like button');
    });
  });
</script>
<script>
  $(document).ready(function(){
    
    
    $('#facebook').sharrre({
  share: {
    facebook: true
  },
  enableHover: false,
  enableTracking: false,
  enableCounter: false,
  click: function(api, options){
    api.simulateClick();
    api.openPopup('facebook');
  },
  template: '<i class="fab fa-facebook-f"></i> Facebook',
  url: 'https://demos.creative-tim.com/material-dashboard-pro/examples/dashboard.html'
});

    $('#google').sharrre({
  share: {
    googlePlus: true
  },
  enableCounter: false,
  enableHover: false,
  enableTracking: true,
  click: function(api, options){
    api.simulateClick();
    api.openPopup('googlePlus');
  },
  template: '<i class="fab fa-google-plus"></i> Google',
  url: 'https://demos.creative-tim.com/material-dashboard-pro/examples/dashboard.html'
});

    $('#twitter').sharrre({
  share: {
    twitter: true
  },
  enableHover: false,
  enableTracking: false,
  enableCounter: false,
  buttons: { twitter: {via: 'CreativeTim'}},
  click: function(api, options){
    api.simulateClick();
    api.openPopup('twitter');
  },
  template: '<i class="fab fa-twitter"></i> Twitter',
  url: 'https://demos.creative-tim.com/material-dashboard-pro/examples/dashboard.html'
});

    
    var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-46172202-1']);
_gaq.push(['_trackPageview']);

(function() {
    var ga = document.createElement('script');
    ga.type = 'text/javascript';
    ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(ga, s);
})();

    // Facebook Pixel Code Don't Delete
!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
document,'script','//connect.facebook.net/en_US/fbevents.js');

try{
  fbq('init', '111649226022273');
  fbq('track', "PageView");

}catch(err) {
  console.log('Facebook Track Error:', err);
}

  });
</script>
<noscript>
  <img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=111649226022273&ev=PageView&noscript=1"
/>

</noscript>
  <script>
  $(document).ready(function(){
    demo.checkFullPageBackgroundImage();setTimeout(function(){
        // after 1000 ms we add the class animated to the login/register card
        $('.card').removeClass('card-hidden');
      }, 700);});
</script>
  <script>
    $(document).ready(function(){
      // Javascript method's body can be found in ../assets/js/demos.js
      md.initDashboardPageCharts();
      
      md.initVectorMap();
      
    });
</script>




    </body>

</html>

<!-- Localized -->