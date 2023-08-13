<?php
/**
 * #Author  @ Faisal Ahmed
 * #Date:   @ 9/21/18 12:31 AM
 * #Phone:  @ 01788656451
 * #Email:  @ contact@imfaisal.me
 * #Created On isp File @ Package.php
 */


class Package extends CI_Model{


    public $insert_id;
    public $error=array();

	public function find(){

		$this->db->select('*')
			->from('isp_package');
		$query = $this->db->get();

		return $query->result_array();

	}


	public function insert($data){

        unset($this->insert_id);

        try{
            $this->db->insert('isp_package',$data);
            $db_error = $this->db->error();
            if (empty($db_error['message'])){
                $this->insert_id = $this->db->insert_id();
                return true;
            }else{
                throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
            }
        }catch (Exception $e){
            $this->error[] = $e->getMessage();
            return false;
        }
	}


	public function updateOne($id,$data){

	    unset($this->error);
	    try{
            $this->db->where('pack_id',$id);
            $this->db->update('isp_package',$data);
            $db_error = $this->db->error();
            if (empty($db_error)){
                return true;
            }else{
                throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
            }
        }catch (Exception $e){

	        $this->error[] = $e->getMessage();
	        return false;
        }

	}
}
