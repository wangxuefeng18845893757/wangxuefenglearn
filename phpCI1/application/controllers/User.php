<?php defined('BASEPATH') OR exit('No direct script access allowed');
	class User extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->model('User_model');
		}
		public function reg()
		{
			$this->load->view('reg.php');
		}
		public function do_reg(){
			$account = $this->input->post('email');
			$uname = $this->input->post('name');
			$pass = $this->input->post('pwd');
			
			//$mpass = md5($pass);
			$mpass=md5($pass);
			//827ccb0eea8a706c4c34a16891f84e7b
			//827ccb0eea8a706c4c34
			//echo $mpass;
			//die();
			$gender = $this->input->post('gender');
			$province = $this->input->post('province');
			$city = $this->input->post('city');
			$res = $this->User_model->creat_user($account,$uname,$mpass,$gender,$province,$city);
			if($res){
				redirect('user/login');
			}else{
				echo "error";
			}
		}
		public function login()
		{
			$this->load->view('login.php');
		}
		public function do_login()
		{
			$account = $this->input->post('email');
			$pass = $this->input->post('pwd');
			$mpass = md5($pass);
			
			$res = $this->User_model->check_user($account,$mpass);
			if($res){
				$arr = array(
					'uid'=>$res->USER_ID,
					'uname' => $res->NAME,
				);
				$this->session->set_userdata($arr);
				redirect('blog/index');
			}else{
				echo "error";
			}
		}
		public function unlogin()
		{
			$arr = array('uid','uname');
			$this->session->unset_userdata($arr);
			redirect("blog/index");
		}
		public function profile()
		{
			$this->load->view('profile.php');
		}
		public function do_profile()
		{	
			$name = $this->input->post('name');
			$gender = $this->input->post('gender');
			$year = $this->input->post('y');
			$mouth = $this->input->post('m');
			$day = $this->input->post('d');
			$str = $year.'-'.$mouth.'-'.$day;
			$province = $this->input->post('province');
			$city = $this->input->post('city');
			$signature = $this->input->post('signature');
			$res = $this->User_model->update_user($name,$gender,$str,$province,$city,$signature);
			if($res){
				redirect('blog/detail');
			}else{
				echo "error";
			}
		}
		public function chpwd()
		{
			$this->load->view('chpwd.php');
		}
		public function do_chpwd()
		{
			$newpwd = $this->input->post('newpwd');
			$res = $this->User_model->update_pass($newpwd);
			if($res){
				redirect('blog/detail');
			}else{
				echo "error";
			}
		}
		public function userSettings()
		{
			$uid = $this->session->userdata('uid');
			$res = $this->User_model->select_mood($uid);
			$data = array(
				'user'=>$res
			);
			$this->load->view('userSettings.php',$data);	
		}
		public function do_userSettings()
		{
			$mood = $this->input->post('space_name');
			$uid = $this->session->userdata('uid');
			$res = $this->User_model->update_mood($mood,$uid);
			if($res){
				redirect('user/userSettings');
			}else{
				echo "error";
			}
		}
	}
	

?>