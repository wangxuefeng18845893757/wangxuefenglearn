<?php defined('BASEPATH') OR exit('No direct script access allowed');

	class Blog_model extends CI_Model{
		public function select_blog($uid)
		{
			$str = "select * from t_blogs,t_blog_catalogs where t_blogs.CATALOG_ID=t_blog_catalogs.CATALOG_ID and t_blogs.WRITER='$uid'";
			$query = $this->db->query($str);
			return $query->result();
		}
		public function select_blog_by_blog_id($blog_id)
		{
			$str = "select * from t_blogs where BLOG_ID='$blog_id'";
			$query = $this->db->query($str);
			return $query->result();
		}
		public function add_article($writer,$title,$catalog_id,$content,$type,$privacy,$deny_comment,$time)
		{
			$arr = array(
				'WRITER'=>$writer,
				'TITLE'=>$title,
				'CONTENT'=>$content,
				'ADD_TIME'=>$time,
				'CLICK_RATE'=>$privacy,
				'IS_YOURS'=>$type,
				'COMM_RATE'=>$deny_comment,
				'CATALOG_ID'=>$catalog_id
				
			);
			$query = $this->db->insert('t_blogs',$arr);
			return $query;
		}
		public function showblogs($uid)
		{
			$str = "select * from t_blogs where WRITER = '$uid'";
			$query = $this->db->query($str);
			return $query->result();  
		}
		public function select_catalog($uid)
		{
			$str = "select * from t_blog_catalogs where USER_ID = '$uid'";
			$query = $this->db->query($str);
			return $query->result();
		}
		public function d_select($catalog,$writer)
		{
				
			$str = "select t_blog_catalogs.CATALOG_ID from t_blog_catalogs,t_blogs where t_blogs.WRITER = t_blog_catalogs.USER_ID and t_blogs.WRITER = '$writer' and t_blog_catalogs.NAME='$catalog'";
			$query = $this->db->query($str);
			return $query->result();
		}
		public function select_count($catalog_id)
		{
			$str ="select count(*) count from t_blogs where CATALOG_ID='$catalog_id'";
			$query = $this->db->query($str);
			return $query->row();
		}
		public function update_blog_count($count,$catalog_id)
		{
			$arr = array(
				'BLOG_COUNT'=>$count
			
			);
			$this->db->where('CATALOG_ID',$catalog_id);
			$query = $this->db->update('t_blog_catalogs',$arr);
		}
		public function select_like($search_info)
		{
			$str = "select * from t_blogs where TITLE like '$search_info%'";
			$query = $this->db->query($str);
			return $query->result();
		}
	}




?>