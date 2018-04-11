<?php
	/**
	 * 
	 */
	class Message_model extends CI_Model {
		
		public function add_message($content,$sender,$time)
		{
			$arr = array(
				'SENDER'=>$sender,
				'CONTENT'=>$content,
				'ADD_TIME'=>$time
			
			
			); 
			$query = $this->db->insert('t_messages',$arr);
			return $query;
		}
		public function select_message($uid)
		{
			$str ="select * from t_messages,t_users where t_messages.SENDER=t_users.USER_ID and SENDER = '$uid'";
			$query = $this->db->query($str);
			return $query->result();
		}
	}
	



?>