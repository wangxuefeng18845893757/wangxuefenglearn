<?php
	/**
	 * 
	 */
	class Catalog_model extends CI_Model {
		
		public function add_catalog($catalog,$count)
		{
			$str = "select * from t_blog_catalogs where NAME = '$catalog'";
			$query = $this->db->query($str);
			if($query->row()){
				return false;
			}else{
				$arr = array(
			   'NAME'=>$catalog,
			   'USER_ID'=>$this->session->userdata('uid'),
			   'BLOG_COUNT'=>$count
				);
				$this->db->insert('t_blog_catalogs',$arr);
				return true;
			}
		}
		public function select_catalog($uid)
		{
			$str = "select * from t_blog_catalogs where USER_ID = '$uid'";
			$query = $this->db->query($str);
			return $query->result();
		}
		public function select1_catalog($catalog_id)
		{
			$str = "select * from t_blog_catalogs where CATALOG_ID = '$catalog_id'";
			$query = $this->db->query($str);
			return $query->result();
		}
		public function update_catalog($name,$catalog_id)
		{
			$arr = array(
				'NAME'=>$name		
			);
			$this->db->where('CATALOG_ID',$catalog_id); 
			$query = $this->db->update('t_blog_catalogs',$arr);
			return $query;
		}
		public function update1_catalog($blog_count,$catalog_id)
		{
			$arr = array(
				'BLOG_COUNT'=>$blog_count		
			);
			$this->db->where('CATALOG_ID',$catalog_id); 
			$query = $this->db->update('t_blog_catalogs',$arr);
			return $query;
		}
		public function delete_catalog($catalog_id)
		{
			$this->db->where('CATALOG_ID',$catalog_id);
			$query = $this->db->delete('t_blog_catalogs');
			return $query;
		}
	}
		






?>