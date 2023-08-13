<?php
/**
 * #Author  @ Faisal Ahmed
 * #Date:   @ 9/20/18 8:09 PM
 * #Phone:  @ 01788656451
 * #Email:  @ contact@imfaisal.me
 * #Created On isp File @ Api.php
 */
defined('BASEPATH') OR exit('No direct script access allowed');

header('Content-Type: application/json');

class Api extends CI_Controller {

	/**
	 * error validation
	 * @var array
	 */
	private $error = array() ;

	/**
	 * set user response message, success and success data
	 * @var array
	 */
	private $response = array();


	/**
	 * Api constructor.
	 */
	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->library('Validator');
	}

	public function index(){
		echo json_encode(array(
			'Status'=> 200,
			'API_Version' => '1.0.1',
			'Method' => $_SERVER["REQUEST_METHOD"],
			"Time" => Date('d M Y',$_SERVER["REQUEST_TIME"]),
			"URI"=> $_SERVER["REQUEST_URI"],
			"Device" => Detect::deviceType(),
			"Browser" => Detect::browser(),
			"OS" => Detect::os()
			));
	}

	/**
	 * User routes start
	 * @version v1
	 */

	public function findUser(){

		unset($this->response);

		$result = $this->user->find();

		if (!empty($result)){
			$this->response["success"] = true;
			$this->response["message"] = "[". count($result) ."] User data found";
			foreach ($result as $key=>$row){
				$this->response["user"][$key] = $row;
			}
		}else{
			$this->response["success"] = true;
			$this->response["message"] = 'No user Found';
			$this->response["user"] = array();
		}
		echo json_encode($this->response);
	}

	public function findUserById($userId){

		unset($this->response);

		$result = $this->user->findById($userId);

		if (!empty($result)){
			$this->response["success"] = true;
			$this->response["message"] = "[". count($result) ."] User data found";
			foreach ($result as $key=>$row){
				$this->response["user"][$key] = $row;
			}
		}else{
			$this->response["success"] = false;
			$this->response["message"] = "Invalid User Id [$userId]";
			$this->response["user"] = array();
		}
		echo json_encode($this->response);
	}

	public function registerNewUser(){

	    unset($this->error);

		$params = $this->form->request_filter($_POST);
		$this->form->method("POST")->params($params);
		$this->form->prepare();

		if (empty($this->form->full_name)) $this->error[] = "Full name can't be empty";
        if (empty($this->form->email)) $this->error[] = "Email can't be empty";
        if (empty($this->form->password)) $this->error[] = "Password can't be empty";
        if (empty($this->form->mobile)) $this->error[] = "Mobile number can't be empty";
        if (empty($this->form->nid)) $this->error[] = "NID number can't be empty";
        if (empty($this->form->date_of_birth)) $this->error[] = "Dateofbirth can't be empty";
        if (empty($this->form->package_id)) $this->error[] = "Package can't be empty";

		$user_data = array(
		    "old_id" => empty($this->form->old_id)?0:$this->form->old_id,
			"full_name" => $this->form->full_name,
			"email_address" => !empty($this->form->email)?$this->form->email:"N/A",
			"password" => md5($this->form->password),
			"mobile_number" => $this->form->mobile,
			"national_id_number" => $this->form->nid,
			"passport_no" => (!empty($this->form->passport))?$this->form->passport:"",
			"date_of_birth" => $this->form->date_of_birth,
            "picture_path" => empty($this->form->picture_path)?"assets/images/default/user-profile.png":$this->form->picture_path
        );
		if ($this->user->insert($user_data)){
			$user_id = $this->user->getUserId();
			$isp_code = $this->user->generateUserCoupon(6);
			$con_info = array(
				"user_id" => $user_id,
				"connection_code" => $isp_code,
				"package_id" => $this->form->package_id,
                "billing_address_type" => empty($this->form->billing_address_type)?"PRESENT":$this->form->billing_address_type
			);
			$pre_address = array(
				"user_id" => $user_id,
				"flat_no" => empty($this->form->flat_no)?" ":$this->form->flat_no,
				"house" => empty($this->form->house_no)?0:$this->form->house_no,
				"road" => empty($this->form->road_no)?0:$this->form->road_no,
				"block" => empty($this->form->block)?" ":$this->form->block,
                "postal_code" => empty($this->form->post_code)?0:$this->form->post_code,
				"other" => empty($this->form->other)?" ":$this->form->other,
                "thana" => empty($this->form->thana)?" ":$this->form->thana,
                "city" => empty($this->form->city)?" ":$this->form->city
			);
			$par_address = array(
				"user_id"=> $user_id,
				"village" => empty($this->form->village)?"N/A":$this->form->village,
				"thana" => empty($this->form->upazilla)?"N/A":$this->form->upazilla,
				"district" => empty($this->form->district)?"N/A":$this->form->district
			);
			if ($this->user->insert($con_info,"isp_connection")){
				if($this->user->insert($pre_address,"present_address")){

					if($this->user->insert($par_address, "permanent_address")){
						}else{
						$this->error[] = $this->user->error;
					}

				}else{
					$this->error[] = $this->user->error;
				}
			}else{
				$this->error[] = $this->user->error;
			}
		}else{
			$this->error[] = $this->user->error;
		}

		if (empty($this->error)){

            if (!empty($this->form->email)){

                $this->load->library('system');

                $email = $this->form->email;
                $subject = "User Registration - Cybespacebd.net";
                $body = "আসসালামু আলাইকুম, {$this->form->full_name},\n\n
                
                সাইবারস্পেস বাংলাদেশ এ আপনাকে স্বাগতম। আপনার রেজিস্ট্রেশন সম্পন্ন হয়েছে| \n\n
                
                আপনার কানেকশন ইনফরমেশন: \n
                Old User ID : {$this->form->old_id} \n
                Connection ID : {$isp_code}.\n
                User ID : {$this->form->mobile}.\n
                
                কানেকশন আইডি সংরক্ষণ করুন এবং পরবর্তী সার্ভিস পেতে এই কানেকশন আইডি ব্যবহার করুন| \n
                ধন্যবাদ \n
                -সাইবারস্পেস সাপোর্ট টিম \n
                www.cyberspacebd.net";

                $this->system->sendMail($email,"support@cyberspacebd.net",$subject,$body);
            }

			$this->response["success"] = true;
			$this->response["message"] = "New user create success";
			$this->response["user"] = ["id"=>$user_id,"isp_code"=>$isp_code];
		}else{
			$this->response["success"] = false;
			$this->response["message"] = $this->error;

		}

		echo json_encode($this->response);
	}

    /**
     *
     */

	public function verifyUserLogin(){

		$params = array("form_data"=>$this->form->request_filter($_POST));
		$this->form->method("POST")->params($params);
		$this->form->prepare();
		$validator = $this->validator;

		$user_name = $this->form->user_name;
		$password = md5($this->form->password);
		if (empty($user_name)) $this->error[] = "user_name field empty";
		if (empty($password)) $this->error[] = "Password field empty";
		
		if ($validator::phoneNumber($user_name)){

			$result = $this->user->findByMobile($user_name);
			if (empty($result)) $this->error[] = "No account found associated with this user name [$user_name]";
			if ($result[0]['password'] != $password) $this->error[] = "Password Don't matched";

		}elseif($validator::email($user_name)){

			$result = $this->user->findByEmail($user_name);
			if (empty($result)) $this->error[] = "No account found associated with this user name [$user_name]";
			if ($result[0]['password'] != $password) $this->error[] = "Password Don't matched";

		}

		if (empty($this->error)){

			$this->response["success"] = true;
			$this->response["message"] = "User login verification success";
			$this->response["user"] = $this->user->findById($result[0]['user_id']);

		}else{

			$this->response["success"] = false;
			$this->response["message"] = $this->error;
			$this->response["user"] = array();

		}

		echo json_encode($this->response);
	}

	/**
	 * End of user routes
	 */

	/**
	 * Start package routes
	 * @version v1
	 */
	public function findPackage(){

		unset($this->response);

		$result = $this->package->find();

		if (!empty($result)){
			$this->response["success"] = true;
			$this->response["message"] = "[". count($result) ."] Package Available";
			foreach ($result as $key=>$row){
				$this->response["user"][$key] = $row;
			}
		}else{
			$this->response["success"] = true;
			$this->response["message"] = 'No Package Available Right Now';
			$this->response["user"] = array();
		}
		echo json_encode($this->response);
	}


	public function insertPackage(){

		unset($this->response);

		unset($this->error);

		$params = array("form_data" => $this->form->request_filter($_POST));
		$this->form->method("POST")->params($params);
		$this->form->prepare();

        /**
         * Empty field validator
         * @params pack_name
         * @params pack_price
         * @params bandwidth
         * @params ip_type
         */

        if (empty($this->form->pack_name)) $this->error[] = "Package name can't be empty";
        if (empty($this->form->pack_price)) $this->error[] = "Package price can't be empty";
        if (empty($this->form->bandwidth)) $this->error[] = "Bandwidth can't be empty";
        if (empty($this->form->ip_type)) $this->error[] = "Ip type can't be empty";

        $data = array(
			'pack_name' => $this->form->pack_name,
			'pack_price' => $this->form->pack_price,
			'bandwidth' => $this->form->bandwidth,
			'ip_type' => $this->form->ip_type
		);

		foreach ($data as $key => $value){
			if (empty($data[$key])) $this->error[] = "$key field can't be empty";
		}

		if (empty($this->error)){
			if ($this->package->insert($data)){
				$this->response['success'] = true;
				$this->response["message"] = "Package create successfully";
			}else{
				$this->response['success'] = false;
				$this->response["message"] = $this->package->error;
			}
		}else{
			$this->response['success'] = false;
			$this->response["message"] = $this->error;
		}

		echo json_encode($this->response);
		
	}


	public function updateSinglePackage(){
		unset($this->response);
		unset($this->error);

		$params = array("form_data" => $this->form->request_filter($_POST));
		$this->form->method("POST")->params($params);
		$this->form->prepare();
		$id = $this->form->pack_id;
		
		/**
		 * empty field validation
		 * @params pack_name
		 * @params pack_price
		 * @params bandwidth
		 * @params it_type
		 */
		 
		if(empty($this->form->pack_name)) $this->error[] = "Package name can't be empty";
		if(empty($this->form->pack_price)) $this->error[] = "Package price can't be empty";
		if(empty($this->form->bandwidth)) $this->error[] = "Bandwith can't be empty";
		if(empty($this->form->ip_type)) $this->error[] = "Ip type can't be empty";
		
		$data = array(
			'pack_name' => $this->form->pack_name,
			'pack_price' => $this->form->pack_price,
			'bandwidth' => $this->form->bandwidth,
			'ip_type' => $this->form->ip_type
		);

		if (empty($id)) $this->error[] = "ID Can't be empty";

		if (empty($this->error)){
			if ($this->package->updateOne($id,$data)){
				$this->response['success'] = true;
				$this->response["message"] = "Package update success";
			}else{
				$this->response['success'] = false;
				$this->response["message"] = "Error updating package";
			}
		}else{
			$this->response['success'] = false;
			$this->response["message"] = $this->error;
		}

		echo json_encode($this->response);
	}


	/**
     * President api
    */

	public function presidentVerify(){
        //$this->load->model('president');
        $params = array("form_data" => $this->form->request_filter($_POST));
        $this->form->method("POST")->params($params);
        $this->form->prepare();
        $email_address = $this->form->email;
        $pass = md5($this->form->password);
        //echo "email={$email_address} pass: {$pass}";
        $result = $this->president->findByEmail($email_address);

        if(empty($result[0]['email'])) $this->error[] = "Invalid email address";
        if ($result[0]["password"] != $pass) $this->error[] = "Password Don't Match";

        if (empty($this->error)){

            $this->response["success"] = true;
            $this->response["message"] = "Login Successful";
            $this->response["data"] = ["name"=>$result[0]["name"],"email"=>$result[0]["email"],"type"=>$result[0]["type"]];
        }else{
            $this->response["success"] = false;
            $this->response["message"] = $this->error;
            $this->response["data"] = [];
        }


        echo json_encode($this->response);
    }



    public function ispUserProfileUpload(){
        echo json_encode($this->upload('users/profile','userPhoto'));

    }


    public function upload($path="",$file){
        unset($this->error);
        $dir = empty($path)?"./resource/":"./resource/{$path}";
        $config['upload_path']          = $dir;
        $config['allowed_types']        = 'jpeg|jpg|png|gif';
        $config['max_size']             = 10000;
        $config['max_width']            = 4020;
        $config['max_height']           = 3080;

        $this->load->library('upload', $config);

        $this->load->library('system');

        if(!file_exists($dir)){
            if ($this->system->mkdir($dir)){

                if ( ! $this->upload->do_upload($file)) {
                    $this->error[] = $this->upload->display_errors();
                }
            }
        }else{

            if ( ! $this->upload->do_upload($file)) {
                $this->error[] = $this->upload->display_errors();
            }
        }

        if (empty($this->error)){
            $success_data = [];

            $name = time()."-".$this->upload->data()['file_name'];
            $success_data['name'] = $name;
            $success_data['file_path'] = $dir.'/'.$name;
            rename($this->upload->data()['full_path'],$dir.'/'.$name);

            return $success_data;

        }else{
            return ["error"=> true,"message"=>$this->error];
        }
    }



}
