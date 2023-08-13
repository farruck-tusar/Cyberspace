<?php
/**
 * #Author  @ Faisal Ahmed
 * #Date:   @ 9/20/18 8:14 PM
 * #Phone:  @ 01788656451
 * #Email:  @ contact@imfaisal.me
 * #Created On isp File @ User.php
 */

class User extends CI_Model{


	public $insert_id;
    private $user_id;

    public $error;

	public function find(){

        $this->db->select('u.*,c.*,pre.*,per.*')
            ->from('isp_user as u')
            ->join('isp_connection as c','u.user_id = c.user_id', 'left')
            ->join('present_address as pre','u.user_id = pre.user_id', 'left')
            ->join('permanent_address as per', 'u.user_id = per.user_id', 'left')
            ->order_by('u.user_id', 'DESC');
		$query = $this->db->get();

		return $query->result_array();
	}


	public function findById($id){

		$this->db->select('u.*,c.*,pre.*,per.*')
			->from('isp_user as u')
			->join('isp_connection as c','u.user_id = c.user_id', 'left')
			->join('present_address as pre','u.user_id = pre.user_id', 'left')
			->join('permanent_address as per', 'u.user_id = per.user_id', 'left')
			->where('u.user_id', $id);
		$query = $this->db->get();

		return $query->result_array();
	}


	public function findByMobile($mobile){
		$this->db->where('mobile_number', $mobile);
		$query = $this->db->get('isp_user');

		return $query->result_array();
	}


	public function findByEmail($email){
		$this->db->where('email_address', $email);
		$query = $this->db->get('isp_user');

		return $query->result_array();
	}

	public function findByOptions($options){

	}

	public function insert($data,$table_name = "isp_user"){
		$this->insert_id = "";
		try{
			$this->db->insert($table_name,$data);
			$db_error = $this->db->error();
			if (empty($db_error['message'])){
				$this->insert_id = $this->db->insert_id();
				if ($table_name==="isp_user") $this->user_id = $this->insert_id;
				return true;
			}else{
				throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
			}
		}catch (Exception $e){
			$this->error = $e->getMessage();
			return false;
		}
	}

	public function generateUserCoupon( $length){
		//Character String 0-9 A-Z
		$char = "123456789ABXWPGKSQRTVZ";
		//empty coupon variable
		$coupon = "";
		for ($i = 1; $i <= $length; $i++) {
			//Generated coupon code and append to coupon variable
			$coupon .= $char[mt_rand(0, strlen($char)-1)];

		}
		$this->db->where("connection_code",$coupon);
		$query = $this->db->get("isp_connection");
		$result = $query->result_array();
		if (!empty($result)){
			$this->generateUserCoupon($length);
		}
		//Return generated random coupon code
		return "CS-".$coupon;
	}


	public function getUserId(){
		if (!empty($this->user_id))return $this->user_id;
	}

}
