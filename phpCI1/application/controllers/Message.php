<?php
	/**
	 * 
	 */
	class Message extends CI_Controller {
		
		public function __construct() {
			parent::__construct();
			$this->load->model('Message_model');
		}
		public function sendMsg()
		{
			$this->load->view('sendMsg.php');
		}
		public function do_sendMsg()
		{
			$content = $this->input->post('content');
			$sender = $this->session->userdata('uid');
			$time = date('Y-m-d,H-i-s',time());
			$res = $this->Message_model->add_message($content,$sender,$time);
			if($res){
				$this->load->view('sendMsgOK.php');
			}
			else{
				echo "error";
			}
		}
		public function inbox()
		{
			$uid = $this->session->userdata('uid');
			$res = $this->Message_model->select_message($uid);
			$data = array(
				'message'=>$res
			
			);
			$this->load->view('inbox.php',$data);
		}
	}
	






?>