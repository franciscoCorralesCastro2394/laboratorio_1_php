<?php
class News_model extends CI_Model {
 
    public function __construct()
    {
        $this->load->database();
    }
    
    public function get_news($id = FALSE)
    {
        if ($id === FALSE)
        {
            $query = $this->db->get('news');
            return $query->result_array();
        }
 
        $query = $this->db->get_where('news', array('id' => $id));
        return $query->row_array();
    }
   
    

    
    public function delete_news($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('news');
    }


      public function edit_news($id = null,$img = null)
    {
        $this->load->helper('url');
 
        $slug = url_title($this->input->post('title'), 'dash', TRUE);
 
       
         $data = array(
            'title' => $this->input->post('title'),
            'slug' => $slug,
            'text' => $this->input->post('text'),
            'img' => $img
        );

          $where_ = array('id' => $id);

            $this->db->where('id', $id);
            return $this->db->update('news', $data , $where_);
        
    }


    public function set_news($img = null)
    {
        $this->load->helper('url');
 
        $slug = url_title($this->input->post('title'), 'dash', TRUE);
 
        $data = array(
            'title' => $this->input->post('title'),
            'slug' => $slug,
            'text' => $this->input->post('text'),
            'img' => $img
        );
        
            return $this->db->insert('news', $data);
        
    }
}
