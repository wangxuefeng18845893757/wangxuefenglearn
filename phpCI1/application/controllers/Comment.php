<?php defined('BASEPATH') OR exit('No direct script access allowed');
	class Comment extends CI_Controller{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('Comment_model');
		}
		public function blogComments()
		{
			$uid = $this->session->userdata('uid');
			$res = $this->Comment_model->select_comment($uid);
			$data = array(
				$comment=>$res
			);
			$this->load->view('blogComments.php',$data);
		}
		public function add_comment()
		{
			$blog_id = $this->input->get('blog_id');
			//echo $blog_id;
			$content = $this->input->post('content');
			$uid = $this->session->userdata('uid');
			$time =date('Y-m-d H-i-s',time());
			
			// if($res){
				// echo "success";
			// }else{
				// echo "error";
			// }
			$res = $this->Comment_model->add_comments($blog_id,$content,$uid,$time);
			$count = $this->Comment_model->select_count_comments($blog_id);
			$comm_rate = $count->count;
			$res = $this->Comment_model->update_comm($blog_id,$comm_rate);
			if($res){
				redirect("blog/viewblog/?blog_id=$blog_id");
			}else{
				echo "error";
			}
		}
		
	}



?>