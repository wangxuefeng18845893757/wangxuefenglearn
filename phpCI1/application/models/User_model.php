<?php defined('BASEPATH') OR exit('No direct script access allowed');
	class User_model extends CI_Model{
		public function creat_user($account,$uname,$mpass,$gender,$province,$city)
		{
				//echo $mpass;
				//die();
			$arr  = array(
			'ACCOUNT'=>$account,
			'PASSWORD' =>$mpass, 
			'NAME'=>$uname,
			'GENDER'=>$gender,
			'PROVINCE'=>$province,
			'CITY'=>$city
			);
			$query = $this->db->insert('t_users',$arr);
			return $query;
		}
		public function check_user($account,$mpass)
		{
			$str ="select * from t_users where ACCOUNT ='$account' and PASSWORD= '$mpass'";
			$query=$this->db->query($str);
			return $query->row();
		}
		public function update_user($name,$gender,$str,$province,$city,$signature)
		{
			$arr  = array(
			
			
				'NAME'=>$name,
				'GENDER'=>$gender,
				'PROVINCE'=>$province,
				'CITY'=>$city,
				'SIGNATURE'=>$signature,
				'BIRTHDAY'=>$str
			);
			$this->db->where('USER_ID',$this->session->userdata('uid')); 
			$query = $this->db->update('t_users',$arr);
			return $query;
		}
		public function update_pass($newpwd)
		{
			$newpass = md5($newpwd);
			$arr = array(
			 	'PASSWORD'=>$newpass
			);
			$this->db->where('USER_ID',$this->session->userdata('uid'));
			$query = $this->db->update('t_users',$arr);
			return $query;
		}
		public function update_mood($mood,$uid)
		{
			$arr = array(
				'MOOD'=>$mood
			
			);
			$this->db->where('USER_ID',$uid);
			$query = $this->db->update('t_users',$arr);
			return $query;
		}
		public function select_mood($uid)
		{
			$str="select * from t_users where USER_ID='$uid'";
			$query = $this->db->query($str);
			return $query->result();
		}
	}


?>