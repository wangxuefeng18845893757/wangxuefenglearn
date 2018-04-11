<?php defined('BASEPATH') OR exit('No direct script access allowed');
	class Comment_model extends CI_Model{
		public function select_comment($uid)
		{
			$str = "select * from t_users,t_blogs,t_comments where t_users.USER_ID=t_blogs.WRITER and t_blogs.BLOG_ID=t_comments.BLOG_ID and t_users.USER_ID='$uid'";
			$query = $this->db->query($str);
			return $query->result();
		}
		public function add_comments($blog_id,$content,$uid,$time)
		{
			$arr = array(
				'COMMENTATOR'=>$uid,
				'BLOG_ID'=>$blog_id,
				'CONTENT'=>$content,
				'ADD_TIME'=>$time
			
			);
			$query = $this->db->insert('t_comments',$arr);
			return $query;
		}
		public function select_count_comments($blog_id)
		{
			$str = "select count(*) count from t_comments where BLOG_ID='$blog_id'";
			$query = $this->db->query($str);
			return $query->row();
		}
		public function update_comm($blog_id,$comm_rate)
		{
			$arr = array(
				'COMM_RATE'=>$comm_rate
			
			); 
			$this->db->where('BLOG_ID',$blog_id);
			$query = $this->db->update('t_blogs',$arr);
			return $query;
		}
	}

?>