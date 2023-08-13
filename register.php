<!DOCTYPE html>
<html>
<head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    
	<link rel="icon" type="image/png" href="images/favicon.png">
    <title>Cyberspace BD Registration</title>
    <link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<?php 
     $API = "http://localhost/cyberspace_codigniter/dashboard/";
    # $API = "http://cyberspacebd.net/dashboard/";
?>
<body style="background: linear-gradient(to bottom, rgba(0, 0, 0, 0.0), rgba(0, 0, 0, 0.0)),url('images/back10.jpg') top center !important; background-size: cover !important;">
   
	<section class="testimonial py-5" id="testimonial">
    <div class="container">
        <div class="row border">
            <div class="col-md-4 py-5 text-white text-center border-right" style="background: linear-gradient(to right, rgba(0, 0, 0, 0.5), rgba(101, 0, 0, 0.5)),url('images/banner_bg.jpeg') top center !important;
    background-size: cover !important;">
                <div>
                    <div class="card-body pb-5">
                        <img src="images/logo.png" style="width:70%">
                    </div>
                    <div style="padding :10px; background: linear-gradient(to bottom, rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.9)) top center !important; background-size: cover !important; color:#fff;">
                    <h6 style="line-height: 25px;">সাইবারস্পেস বাংলাদেশ এ আপনাকে স্বাগতম ।
আমরা সব সময়ের মতো গ্রাহকদের উন্নত সেবা প্রদান করার পাশাপাশি সকলকে একটি উন্নত নেটওয়ার্ক এর মধ্যে নিয়ে আসার চেষ্টা করছি। এর ধারাবাহিকতায় সকল পুরাতন এবং নতুন ব্যবহারকারীদের জন্য নিয়ে আসছি আধুনিক ওয়েবসাইট এবং মোবাইল এপ্লিকেশন। এখন মোবাইলের মাধ্যমে অনলাইনে বিল দেয়া থেকে শুরু করে নিজের একাউন্ট এর আপডেট এবং ২৪/৭ কাস্টমার সেবা প্রদান করা হবে। আমাদের পুরানো ব্যবহারকারী দের সিস্টেমে অন্তুর্ভুক্ত করতে তাদের রেজিস্ট্রেশন প্রক্রিয়া চলছে।</h6>
                    </div>

                    <div style="margin-top:50px;">
                        <a href="https://play.google.com/store/apps/details?id=com.fidstudio.cyberspace"><img src="images/googleplay.png" style="width:80%"></a>
                    </div>
                </div>
            </div>
            <div class="col-md-8 py-3 text-center" style="background:rgba(0, 0, 0, 0.5); color: #fff">
                <h3 class="pb-1">Sign Up Now</h3>
                <h6>(*) Indicates Mandatory Field</h6><hr>
                <?php 
                if(isset($_POST['form_submit'])){
                    $old_id = $_POST['old_id'];
                    $pack_id = $_POST['pack_id'];
                	$full_name = $_POST['full_name'];
                	$email = $_POST['email'];
                	$password = $_POST['password'];
                	$mobile = $_POST['mobile'];
                	$nid = $_POST['nid'];
                	$passport = $_POST['passport'];
                	$date_of_birth = $_POST['date_of_birth'];
                	$flat_no = $_POST['flat_no'];
                	$house_no = $_POST['house_no'];
                	$road_no = $_POST['road_no'];
                	$block = $_POST['block'];
                	$other = $_POST['other'];
                	$thana = $_POST['thana'];
                	$city = $_POST['city'];
                	$village = $_POST['village'];
                	$upazilla = $_POST['upazilla'];
                    $district = $_POST['district'];
                	$pack_id = $_POST['pack_id'];

                    $image1 = "";
                    $file = $_FILES['img_file'];
                    $name = $file['name'];
                    $destination = 'dashboard/resource/users/profile/';

                    $exploded_name = explode('.', $name); 
                    $extension = end($exploded_name); // jpg
                    $images_extensions = ['jpg', 'png', 'jpeg', 'gif', 'JPG', 'PNG', 'JPEG', 'GIF']; 
                    $uniqueimagename ='web-'.uniqid().'-';
                    $imageDestFile = $destination . $uniqueimagename . $name;
                    $imageDestFile1 = './resource/users/profile/' . $uniqueimagename . $name;

                    $tmp_name = $file['tmp_name'];
                    if (in_array($extension, $images_extensions)) 
                    {
                        $image_size = $_FILES['img_file']['size'] / 1024;
                
                        if($image_size > 1000){
                            $image1 = "Error";
                            echo '<p id="error3" style="color:#FFF000; font-size:16px;">* Uploaded Image Size is '.round($image_size, 0).' Kb '.'<br> 
                            Maximum File Size Limit is 1 MB</p>';
                        }
                        else{
                            move_uploaded_file($tmp_name, $imageDestFile);
                        }
                    }
                    else { 
                        $image1 = "Error";
                        echo '<p id="error3" style="color:#FFF000; font-size:16px;">
                        * Invalid Image Format!<br>Image Format Must Be JPG, JPEG, PNG or GIF.</p>';
                    }

                    if(empty($image1)){
                        $url = $API.'api/v1/user/register/new';
                        $data = array(
                            'old_id' =>  $old_id, 
                            'package_id' =>  $pack_id,
                            'full_name' =>  $full_name,
                            'email' =>  $email,
                            'password' =>  $password,
                            'mobile' =>  $mobile,
                            'nid' =>  $nid,
                            'passport' =>  $passport,
                            'date_of_birth' =>  $date_of_birth,
                            'flat_no' =>  $flat_no,
                            'house_no' =>  $house_no,
                            'road_no' =>  $road_no,
                            'block' =>  $block,
                            'other' =>  $other,
                            'thana' =>  $thana,
                            'city' =>  $city,
                            'village' =>  $village,
                            'upazilla' =>  $upazilla,
                            'district' =>  $district,
                            'picture_path' =>  $imageDestFile1
                            );
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
                            echo "Failed to parse json: " . json_last_error_msg();
                        }
                        
                        if($data['success']){
                            ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
              							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              							    <span aria-hidden="true">&times;</span>
              							  </button>
              							  <strong>Thanks!</strong> New user created successfully.
              							</div>
                            <?php
                        }
                        else{
                            ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              							    <span aria-hidden="true">&times;</span>
              							  </button>
              							  <strong>Error! </strong><?php print_r($data['message']) ;?>
              							</div>
                            <?php
                        }

                    }
                }
                ?>
                <form method="POST" enctype="multipart/form-data">
                    <div class="form-row pb-4">
                        <div class="col-md-6">
                            <div class="pb-3">
                                <input name="old_id" placeholder="Enter your current user id *" class="form-control " type="text" required="required">
                            </div>
                            <select class="form-control" name="pack_id" required="required">
                                <option disabled="">-Select Packages1-</option>
                                <?php 
                                  $url = $API.'api/v1/package/all';
                                  // use key 'http' even if you send the request to https://...
                                  $options = array(
                                      'http' => array(
                                          'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                                          'method'  => 'GET'
                                      )
                                  );
                                  $context  = stream_context_create($options);
                                  $rawdata = file_get_contents($url, false, $context);
                                  // if ($rawdata === false) {
                                  //     echo "Unable to fetch data from: $url";
                                  // }
                                  $data = json_decode($rawdata);
                                  // if (JSON_ERROR_NONE !== json_last_error()) {
                                  //     exit("Failed to parse json: " . json_last_error_msg());
                                  // }
                                  foreach ($data->user as $item) {?>
                                
                                    <option value="<?php echo $item->pack_id;?>"><?php echo $item->pack_name; ?></option>
                                    <?php }?>
                            </select>
                        </div>
                        <div class="col-md-6 picture-container">
                            <div class="picture">
                                <img src="images/avater.png" class="picture-src" id="wizardPicturePreview" title="">
                                <input name="img_file" type="file" id="wizard-picture" required >
                                
                            </div>
                            <p id="error1" style="display:none; color:#FFF; font-size:16px;">
                                Invalid Image Format!
                            </p>
                            <p id="error2" style="display:none; color:#FFF; font-size:16px;">
                                Maximum File Size Limit is 1MB.
                            </p>
                            <h6 class="">Choose Picture</h6>

                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                          <input name="full_name" placeholder="Full Name *" class="form-control" type="text" required="required">
                        </div>

                        <div class="form-group col-md-6">
                          <input name="nid" placeholder="NID No. *" class="form-control" type="text" required="required">
                        </div>

                        <div class="form-group col-md-6">
                          <input name="email" class="form-control" placeholder="Email *" type="email" required="required">
                        </div>

                        <div class="form-group col-md-6">
                          <input name="passport" placeholder="Passport No." class="form-control" type="text">
                        </div>

                        <div class="form-group col-md-6">
                          <input name="mobile" placeholder="Mobile No. *" minlength="11" maxlength="11" class="form-control" required="required" type="text" required="required">
                        </div>

                        <div class="form-group col-md-6">
                            <input name="date_of_birth" placeholder="Date of Birth *" class="form-control" required="required" type="text" onfocus = "(this.type = 'date')" required="required">
                        </div>
                        
                        <div class="form-group col-md-6">
                          <input name="password" placeholder="Password *" id="new_pass" class="form-control" type="text" required="required" autocomplete="off">
                        </div>

                        <div class="form-group col-md-6">
                          <input name="reffered" placeholder="Referred User" class="form-control" type="text">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6" style="color: #fff;">
                          <label>Present Address</label>
                          <div class="form-inline pb-3">
                              <div class="address col-md-4"><input name="flat_no" type="text" class="form-control col-md-12" placeholder="Flat No"></div>
                              <div class="address col-md-4"><input name="house_no" type="text" class="form-control col-md-12" placeholder="House No"></div>
                              <div class="address col-md-4"><input name="road_no" type="text" class="form-control col-md-12" placeholder="Road No"></div>
                          </div>
                          <div class="form-inline pb-3">
                               <div class="address col-md-6"><input name="block" type="text" class="form-control col-md-12" placeholder="Block"></div>
                               <div class="address col-md-6"><input name="other" type="text" class="form-control col-md-12" placeholder="Area"></div>
                          </div>
                          <div class="form-inline pb-3">
                               <div class="address col-md-6"><input name="thana" type="text" class="form-control col-md-12" placeholder="Thana"></div>
                               <div class="address col-md-6"><input name="city" type="text" class="form-control col-md-12" placeholder="City"></div>
                          </div>
                        </div>
                        <div class="form-group col-md-6" style="color: #fff;">
                          <label>Permanent Address</label>
                          <div class="pb-3"><input name="village" type="text" class="form-control " placeholder="Village"></div>
                          <div class="pb-3"><input name="upazilla" type="text" class="form-control " placeholder="Upazilla"></div>
                          <div class="pb-3"><input name="district" type="text" class="form-control " placeholder="District"></div>
                        </div>
                       <!--  <div class="form-group">
                            <div class="form-group">
                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
                                  <label class="form-check-label" for="invalidCheck2">
                                    <small>By clicking Submit, you agree to our Terms & Conditions, Visitor Agreement and Privacy Policy.</small>
                                  </label>
                                </div>
                            </div>
                        </div> -->
                    </div>
                    
                    <div align="center">
                        <button name="form_submit" type="submit" class="btn btn-md col-md-4 border" style="background: linear-gradient(to right, #f5b1aa, #eac1c1);">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

</body>
<script type="text/javascript">
$(document).ready(function(){
        // Prepare the preview for profile picture
        $("#wizard-picture").change(function(){
            readURL(this);
        });
        $('#new_pass').attr('type', 'password');
    });
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#wizardPicturePreview').attr('src', e.target.result).fadeIn('slow');
            }
            reader.readAsDataURL(input.files[0]);
        }
        
        var ext = $('#wizard-picture').val().split('.').pop().toLowerCase();
        //check image extensions
        if ($.inArray(ext, ['GIF','gif','PNG','png','JPG','jpg','JPEG','jpeg']) == -1){
            $('#error1').slideDown("slow");
            $('#error2').slideUp("slow");
        }
        else{
            var picsize1 = (input.files[0].size);
            if (picsize1 > 1000000){
                $('#error2').slideDown("slow");
            }
            else{
                $('#error2').slideUp("slow");
            }
            $('#error1').slideUp("slow");
        }
    }
</script>
</html>