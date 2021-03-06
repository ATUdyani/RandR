<?php

class Main_model extends CI_Model
{
	function get_items()
	{
		$query = $this->db->get("item");
		return $query;
	}

	function get_item_details($id)
	{
		//$this->get->where("itemID",$id);
		//$query = $this->db->get("item");

		$this->db->select('*');
		$this->db->from('item');
		$this->db->where('itemID',$id);
		$query = $this->db->get();

		/*$this->db->select('*');
		$query = $this->db->get_where('item','itemID',$id);*/
		return $query;
	}

	function get_item_reviews($id)
	{
		$this->db->select('*');
		$this->db->from('item_review');
		$this->db->where('itemID',$id);
		$query = $this->db->get();
		return $query;
	}

	function get_item_byname($name)
	{
		/*$query = "";


		if($name = "")
		{
			$query = $this->db->get("item");
		}
		else
		{
			$this->db->select('*');
			$this->db->from('item');
			$this->db->where('itemID',$id);
			$query = $this->db->get();
		}

		return $query->result();*/

		$this->db->select("*");
		$whereCondition = array('name' => $name);
		$this->db->where($whereCondition);
		$this->db->from('item');
		$query = $this->db->get();
		return $query->result();
	}

	function insert_item($data)
	{
		$this->db->insert('item', $data);
	}

	function insert_item_review($data)
	{
		$this->db->insert('item_review', $data);
	}
}
?>