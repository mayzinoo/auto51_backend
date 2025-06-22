<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vehicles_model extends CI_Model {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function exceldata_insert($data) {
	$res = $this->db->insert_batch('car_details',$data);
		if($res){
			return TRUE;
		}else{
			return FALSE;
		}
	}
	public function excelvehi_id_insert($id){
		$res = $this->db->insert_batch('car_package',$id);
		if($res){
			return TRUE;
		}else{
			return FALSE;
		}
	}
	function getfueltype()
	{
		$query = $this->db->query("SELECT * FROM fuel_type");
        return $query->result();
	}
	function getbodytype()
	{
		$query = $this->db->query("SELECT * FROM body_type");
        return $query->result();
	}
	function getfeatures()
	{
		$query = $this->db->query("SELECT * FROM features");
        return $query->result();
	}
	function getcolors()
	{
		$query = $this->db->query("SELECT * FROM color");
        return $query->result();
	}
	function getbrands()
    {
    	$query = $this->db->query("SELECT * FROM brands");
        return $query->result();
    }
    public function getvehicles_by_id($id)
	{		
		$this->db->from("car_details");
		$this->db->where('id',$id);
		$query = $this->db->get();

		return $query->row();
	}
	function getbrands_list()
	{
		$query = $this->db->get("brands");
		if($query->num_rows()<=0)
		{
			$tags['']="...";
		}
		$tags['']="...";
		foreach($query->result() as $row):
			$tags[$row->brand_name]=$row->brand_name;
		endforeach;
		return $tags;
	}
	function getcolors_list()
	{		
		$query = colors_list();
		$tags['']="...";
		foreach($query as $key => $status):
			$tags[$key]=$status;
		endforeach;
		return $tags;
	}
	function getfeatures_list()
	{		
		$query = $this->db->get("features");
		if($query->num_rows()<=0)
		{
			$tags['']="...";
		}
		$tags['']="...";
		foreach($query->result() as $row):
			$tags[$row->name]=$row->name;
		endforeach;
		return $tags;
	}
	function getcategory_list()
	{		
		$query = category_list();
		$tags['']="...";
		foreach($query as $key => $status):
			$tags[$key]=$status;
		endforeach;
		return $tags;
	}
	function getfuel_list()
	{
		$query = $this->db->get("fuel_type");
		if($query->num_rows()<=0)
		{
			$tags['']="...";
		}
		$tags['']="...";
		foreach($query->result() as $row):
			$tags[$row->fuel_type]=$row->fuel_type;
		endforeach;
		return $tags;
	}
	function getbodytype_list()
	{
		$query = $this->db->get("body_type");
		if($query->num_rows()<=0)
		{
			$tags['']="...";
		}
		$tags['']="...";
		foreach($query->result() as $row):
			$tags[$row->body_type]=$row->body_type;
		endforeach;
		return $tags;
	}
	
	function getdurationlist()
	{
		$this->db->group_by("duration");
		$this->db->order_by("id","asc");
		$query = $this->db->get("duration");
		if($query->num_rows()<=0)
		{
			$tags['']="..Select..";
		}
		$tags['']="..Select..";
		foreach($query->result() as $row):
			$tags[$row->duration_id]=$row->duration;
		endforeach;
		return $tags;
	}
	public function getgalleryImage_by_id($id)
	{
		$this->db->from("vehicle_photos");
		$this->db->where('id',$id);
		$query = $this->db->get();

		return $query->row();
	}
	function allvehicleslist()
	{
		
		$config["base_url"]=base_url()."vehicles/allvehicles/";
	    $config['total_rows'] = $this->db->get('car_details')->num_rows();
	    $config['per_page'] = 10;
	    $config['uri_segment'] = 3;
	    $config['num_links'] = 3;
	    $config['full_tag_open'] = '<ul class="pagegi">';
	    $config['full_tag_close'] = '</ul>';
	    $config['num_tag_open'] = '<li>';
	    $config['num_tag_close'] = '</li>';
	    $config['cur_tag_open'] = '<li><a class="current">';
	    $config['cur_tag_close'] = '</a></li>';
	    $config['prev_tag_open'] = '<li>';
	    $config['prev_tag_close'] = '</li>';
	    $config['next_tag_open'] = '<li>';
	    $config['next_tag_close'] = '</li>';
	    $config['prev_link'] = 'Prev';
	    $config['next_link'] = 'Next';  

	    $this->pagination->initialize($config);	
		
		$this->db->order_by('car_details.id','desc');
		$this->db->group_by('car_details.id');
		$this->db->select("car_details.*,car_details.id as cid,bookings.vehicle_id as vid,bookings.available_date as avidate");
		$this->db->join("bookings","bookings.vehicle_id=car_details.id","Left");
		$query=$this->db->get('car_details',$config['per_page'],$this->uri->segment(3));
		return $query;
	}
	function vehicleslist()
	{
		$postby=$this->session->userdata('role');
		$config["base_url"]=base_url()."car_details/";
	    $config['total_rows'] = $this->db->get('car_details')->num_rows();
	    $config['per_page'] = 10;
	    $config['uri_segment'] = 3;
	    $config['num_links'] = 3;
	    $config['full_tag_open'] = '<ul class="pagegi">';
	    $config['full_tag_close'] = '</ul>';
	    $config['num_tag_open'] = '<li>';
	    $config['num_tag_close'] = '</li>';
	    $config['cur_tag_open'] = '<li><a class="current">';
	    $config['cur_tag_close'] = '</a></li>';
	    $config['prev_tag_open'] = '<li>';
	    $config['prev_tag_close'] = '</li>';
	    $config['next_tag_open'] = '<li>';
	    $config['next_tag_close'] = '</li>';
	    $config['prev_link'] = 'Prev';
	    $config['next_link'] = 'Next';  

	    $this->pagination->initialize($config);		
		
		$this->db->order_by('car_details.id','desc');
		$this->db->group_by('car_details.id');
		$this->db->select("car_details.*,car_details.id as cid,bookings.vehicle_id as vid,bookings.available_date as avidate");
		$this->db->join("bookings","bookings.vehicle_id=car_details.id","Left");
		$query=$this->db->get_where('car_details',array("post_by"=>$postby),$config['per_page'],$this->uri->segment(3));
		return $query;
	}

}