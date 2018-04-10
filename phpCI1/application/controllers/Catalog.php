<?php defined('BASEPATH') OR exit('No direct script access allowed');
	class Catalog extends CI_Controller{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('Catalog_model');
		}
		
		public function do_blogCatalog()
		{
			$catalog = $this->input->post('name');
			$count = 0;
			$res = $this->Catalog_model->add_catalog($catalog,$count);
			if($res){
				redirect('catalog/blogCatalogs');
			}else{
				echo "error";
			}
		}
		public function blogCatalogs()
		{
			$uid = $this->session->userdata('uid');
			$res = $this->Catalog_model->select_catalog($uid);
			$data = array(
				'cata' => $res
			);
			//print_r($data);
			//die();
			$this->load->view('blogCatalogs.php',$data);
		}
		public function editCatalog()
		{
			$catalog_id = $this->input->get('catalog_id');
			$res = $this->Catalog_model->select1_catalog($catalog_id);
			$data = array(
				'cata' =>$res
			);
			$this->load->view('editCatalog.php',$data);
		}
		public function do_editCatalog()
		{
			$name = $this->input->post('name');
			$catalog_id = $this->input->get('catalog_id');
			
			$res = $this->Catalog_model->update_catalog($name,$catalog_id);
			if($res){
				redirect('catalog/blogCatalogs');
			}else{
				echo "error";
			}
			
		}
		public function deleteCatalog()
		{
			$catalog_id = $this->input->get('catalog_id');
			$res = $this->Catalog_model->delete_catalog($catalog_id);
			if($res){
				redirect('catalog/blogCatalogs');
			};
		}
		
	}


?>