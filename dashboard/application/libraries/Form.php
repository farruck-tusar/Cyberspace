<?php
/**
 * #Author  @ Faisal Ahmed
 * #Date:   @ 9/21/18 4:39 AM
 * #Phone:  @ 01788656451
 * #Email:  @ contact@imfaisal.me
 * #Created On isp File @ Form.php
 */

class Form
{
	private static $REQUEST_METHOD;
	/**
	 * @var array $params
	 */
	private static $params = array(
		"form_data" => array(),
		"form_file" => array()
	);
	/**
	 * From Request method Default value is GET
	 * @var string $method
	 */
	private static $method = "GET";
	/**
	 * Set Form Accept Multipart form data
	 * @var bool $hasFile
	 */
	private static $hasFile = false;
	/**
	 * Set form error message
	 * @var array $error
	 */
	public static $error = array();
	public $next = false;

	function __construct()
	{
		self::$REQUEST_METHOD = $_SERVER["REQUEST_METHOD"];
	}

	/**
	 * Set your request method (GET|POST|PUT|UPDATE|DELETE)
	 * default request method is GET
	 * @param string $method
	 * @return object
	 */
	public function method($method)
	{
		// TODO: Implement method() method.
		if (isset($method)){
			self::$method = strtoupper($method);
		}
		return $this;
	}

	/**
	 * if you want to upload single/multiple file first need to set hasFile true
	 * default value is false
	 * @param bool $option
	 * @return object
	 */
	public function hasFile(bool $option)
	{
		// TODO: Implement hasFile() method.
		if ($option === true){
			self::$hasFile = true;
			return $this;
		}
	}

	/**
	 * Passed your all of request array example ($_POST|$_GET)
	 * @param array $request_array
	 * @return array
	 */
	public function request_filter(array $request_array)
	{
		// TODO: Implement request_filter() method.
		$final_params = [];
		foreach ($request_array as $key=>$value){
			array_push($final_params,$key);
		}
		if (!empty($final_params)){
			return $final_params;
		}
	}

	/**
	 * get all parameters for api request
	 * @param array $params
	 * @return object
	 */
	public function params(array $params)
	{
		// TODO: Implement params() method.
		if (self::$hasFile === false){
			if (array_key_exists("form_data",$params)){
				self::$params["form_data"] = $params["form_data"];
			}else if (!array_key_exists("form_file",$params) && !array_key_exists("form_data",$params)){
				self::$params["form_data"] = $params;
			}
		}else{
			if (array_key_exists("form_file",$params)){
				self::$params["form_file"] = $params["form_file"];
			}elseif (!array_key_exists("form_data",$params) && self::$hasFile === true ){
				self::$params["form_file"] = $params;
			}
		}

		if (!empty(self::$params["form_data"]) || !empty(self::$params["form_file"])){
			return $this;
		}

	}

	/**
	 * @param $data
	 * @return mixed
	 */
	private static function parse_data($data)
	{

		switch (self::$REQUEST_METHOD){
			case "GET":
				$parse_data = htmlspecialchars(trim($_GET[$data]));
				break;
			case "POST":
				$parse_data = htmlspecialchars(trim($_POST[$data]));
				break;
			default:
				$parse_data = htmlspecialchars(trim($_GET[$data]));
				break;
		}
		return $parse_data;
	}

	/**
	 * prepare initialize your form data
	 * @return mixed
	 */
	public function prepare()
	{
		if (!empty(self::$params["form_data"]) && empty(self::$params["form_file"])){
			foreach (self::$params["form_data"] as $property){
				$this->setProperty($property,self::parse_data($property));
			}
		}elseif (empty(self::$params["form_data"]) && !empty(self::$params["form_file"])){
			foreach (self::$params["form_file"] as $property){
				$this->setProperty($property,self::parse_data($property));
			}
		}elseif(self::$hasFile === true && !empty(self::$params["form_file"]) && !empty(self::$params["form_data"])){
			foreach (self::$params as $key=>$value){
				foreach ($value as $property){
					$this->setProperty($property,self::parse_data($property));
				}
			}
		}else{
			foreach (self::$params as $property){
				$this->setProperty($property,self::parse_data($property));
			}
		}

		return $this;
	}


	/**
	 * pass your form required field
	 * @param array $require_field
	 * @return mixed
	 */
	public function require_params(array $require_field)
	{
		// TODO: Implement require() method.

		foreach ($require_field as $property){
			if (!property_exists($this,$property)){
				self::$error[] = "{$property} required field are missing";
			}
		}
	}


	private function setProperty($property ,$value){
		$this->{$property} = $value;

	}
}
