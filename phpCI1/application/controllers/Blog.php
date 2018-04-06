<?php defined('BASEPATH') OR exit('No direct script access allowed');
	class Blog extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->model('Blog_model');
			$this->load->model('Catalog_model');
			$this->load->model('User_model');
		}
		public function index()
		{
			$uid = $this->session->userdata('uid');
			$res = $this->Blog_model->select_blog($uid);
			$res1 = $this->Catalog_model->select_catalog($uid);
			$res2 = $this->User_model->select_mood($uid);
			$data = array(
			    'blog'=>$res,
			    'catalog'=>$res1,
			    'user'=>$res2
			);
			$this->load->view('index.php',$data);
		}
		public function viewblog()
		{
			$blog_id=$this->input->get('blog_id');
			$res = $this->Blog_model->select_blog_by_blog_id($blog_id);
			$data = array(
				'blog'=>$res
			);
			$this->load->view('viewPost_comment.php',$data);
		}
		public function detail()
		{
			$this->load->view('adminindex.php');
		}
		public function blogs()
		{
			$uid = $this->session->userdata('uid');
			$res = $this->Blog_model->showblogs($uid);
			$data=array(
				'blogs' =>$res
			);
			$this->load->view('blogs.php',$data);
		}
		public function newblog()
		{
			$uid = $this->session->userdata('uid');
			$res = $this->Blog_model->select_catalog($uid);
			$data=array(
				'cata'=>$res
			);
			$this->load->view('newBlog.php',$data);
		}
		public function do_newblog()
		{
			$writer = $this->session->userdata('uid');
			$title = $this->input->post('title');
			$catalog = $this->input->post('catalog');
			$res = $this->Blog_model->d_select($catalog,$writer);
			$catalog_id=$res[0]->CATALOG_ID;
			//print_r($rs);
			//echo $rs[0]->BLOG_COUNT;
			//echo $rs[0]->CATALOG_ID;
			//echo $catalog;
			//die();
			//$blog_count = $rs[0]->BLOG_COUNT;
			//$blog_count+=1;
			//$this->load->model('Catalog_model');
			//$res1 = $this->Catalog_model->update1_catalog($blog_count,$catalog_id);
			$content = $this->input->post('content');
			$type = $this->input->post('type');
			$privacy = $this->input->post('privacy');
			$deny_comment = $this->input->post('deny_comment');
			$time = date('Y-m-d H-i-s',time());
			$res2=$this->Blog_model->add_article($writer,$title,$catalog_id,$content,$type,$privacy,$deny_comment,$time);
			$res1 = $this->Blog_model->select_count($catalog_id);
			$count = $res1->count;
			$r3=$this->Blog_model->update_blog_count($count,$catalog_id);
			if($res2){
				redirect('blog/newblog');
			}else{
				echo "error";
			}
		}
		public function delete_blog()
		{
			$blog_id = $this->input->get('blog_id');
			$this->db->where('BLOG_ID',$blog_id);
			$query = $this->db->delete('t_blogs');
			if($query){
				echo "success";
			}else{
				echo"error";
			}
			//echo $blog_id;
		}
		public function Search()
		{
			$search_info = $this->input->post('q');
			$res = $this->Blog_model->select_like($search_info);
			//print_r($res);
			$data = array(
				'blog'=>$res
			
			);
			$this->load->view('index.php',$data);
		}
		
	
	}
?>