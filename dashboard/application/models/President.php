<?php
/**
 * #Author  @ Faisal Ahmed
 * #Date:   @ 9/25/18 8:59 PM
 * #Phone:  @ 01788656451
 * #Email:  @ contact@imfaisal.me
 * #Created On ISP File @ President.php
 */

class President extends CI_Model{




    public function find(){
        $this->db->select('*')
            ->from('isp_president');
        $query = $this->db->get();
        return $query->result_array();
    }


    public function findByEmail($email){
        $this->db->where('email', $email);
        $query = $this->db->get('isp_president');

        return $query->result_array();
    }
}