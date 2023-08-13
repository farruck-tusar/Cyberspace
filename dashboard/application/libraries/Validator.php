<?php
/**
 * #Author  @ Faisal Ahmed
 * #Date:   @ 9/21/18 2:46 AM
 * #Phone:  @ 01788656451
 * #Email:  @ contact@imfaisal.me
 * #Created On isp File @ Validator.php
 */



class Validator
{
	/*
     * @method $email
     */

	public static $email;

	/*
     * @method $mobile
     */

	public $mobile;

	/*
     * @method $userName
     */

	public $userName;

	protected function getEmail(){
		return self::$email;
	}

	/*
     * @param String $email
     * @return boolean
     */
	public static function email($email = null){
		if ($email != null){
			$mail = $email;
		}else{
			$mail = self::$email;
		}
		if (filter_var($mail,FILTER_VALIDATE_EMAIL)){
			return true;
		}else return false;

	}

	public static function url($url = null){
		if (filter_var($url,FILTER_VALIDATE_URL)){
			return true;
		}else return false;
	}

	public static function phoneNumber($number = null, $length = 10){

		#Allow +, - and . in phone number
		$filterNumber = filter_var($number, FILTER_SANITIZE_NUMBER_INT);

		#remove "-" form number
		$cleanNumber = str_replace("-","",$filterNumber);

		#check the length of number
		if (strlen($cleanNumber)<$length || strlen($cleanNumber)>14){
			return false;
		} else return true;
	}
}
