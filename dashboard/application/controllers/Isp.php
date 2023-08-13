<?php
/**
 * #Author  @ Faisal Ahmed
 * #Date:   @ 9/24/18 6:12 PM
 * #Phone:  @ 01788656451
 * #Email:  @ contact@imfaisal.me
 * #Created On ISP File @ Isp.php
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Isp extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct() {
        parent::__construct();
        session_start();
    }
	public function index()
	{
		//echo ">>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>".$_SESSION['username'];
		if(!empty($_SESSION['username'])) {
      		$data['header'] = $this->load->view('header', $data, TRUE);
			$data['body'] = $this->load->view('home', $data, TRUE);
	        $data['footer'] = $this->load->view('footer', $data, TRUE);
	        $this->load->view('page', $data);
	   	}
		else{
      		$data['header'] = $this->load->view('header', $data, TRUE);
			$data['body'] = $this->load->view('login', $data, TRUE);
	        $data['footer'] = $this->load->view('footer', $data, TRUE);
	        $this->load->view('page', $data);
		}
	}

	public function customer_list(){
		$data['header'] = $this->load->view('header', $data, TRUE);
		$data['body'] = $this->load->view('customer_list', $data, TRUE);
        $data['footer'] = $this->load->view('footer', $data, TRUE);
        $this->load->view('page', $data);
	}
	public function packages(){
		$data['header'] = $this->load->view('header', $data, TRUE);
		$data['body'] = $this->load->view('packages', $data, TRUE);
        $data['footer'] = $this->load->view('footer', $data, TRUE);
        $this->load->view('page', $data);
	}
	public function login(){
		$data['header'] = $this->load->view('header', $data, TRUE);
		$data['body'] = $this->load->view('login', $data, TRUE);
        $data['footer'] = $this->load->view('footer', $data, TRUE);
        $this->load->view('page', $data);
	}
	public function logout(){
		//setcookie("username", "", time()-3600);
		unset($_SESSION['username']);
		session_destroy(); 
		header('Location: login');
	}
	public function profile($user_id){
		$data['user_id'] = $user_id;
		//$data['header'] = $this->load->view('header', $data, TRUE);
		$data['body'] = $this->load->view('profile', $data, TRUE);
        //$data['footer'] = $this->load->view('footer', $data, TRUE);
        $this->load->view('page', $data);
	}
}
