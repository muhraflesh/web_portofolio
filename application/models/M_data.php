<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
    
class M_data extends CI_Model{

    function getComment(){
        return $this->db->get('comment')->result();
    }

    function saveComment(){
        $post           = $this->input->post();
        $this->name     = $post["name"];
        $this->email    = $post["email"];
        $this->comment  = $post["comment"];

        return $this->db->insert('comment', $this);
    }
}
