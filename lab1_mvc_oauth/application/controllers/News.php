<?php
class News extends CI_Controller {
 
    public function __construct()
    {
        parent::__construct();
        $this->load->model('news_model');
        $this->load->helper('url_helper');
    }
 
    public function index()
    {
        $data['news'] = $this->news_model->get_news();
        $data['title'] = 'Noticias';
        $data['upload_data']['file_name'] = null;
 
        $this->load->view('templates/header', $data);
        $this->load->view('news/index', $data);
        $this->load->view('templates/footer');
    }
 
    public function view($id = NULL)
    {
        $data['news_item'] = $this->news_model->get_news($id);
        
        if (empty($data['news_item']))
        {
            show_404();
        }
 
        $data['title'] = $data['news_item']['title'];
 
        $this->load->view('templates/header', $data);
        $this->load->view('news/view', $data);
        $this->load->view('templates/footer');
    }
    
    public function create()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
 
        $data['title'] = 'Create a news item';
 
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('text', 'Text', 'required');
        
        $data['imgs'] = $this->fileUpLoad();
      

        if ($this->form_validation->run() === FALSE)
        {
            $error = $data;
            $this->load->view('templates/header',$data);
            $this->load->view('news/create');
            $this->load->view('templates/footer');
 
        }
        else
        {
            $this->news_model->set_news($data['imgs']['file_name']);
            $this->load->view('templates/header', $data);
            $this->load->view('news/success');
            $this->load->view('templates/footer');
        }
    }
    
    public function edit($id = NULL)
    {
        $data['news_item'] = $this->news_model->get_news($id);
        
        if (empty($id))
        {
            show_404();
        }
        
        $this->load->helper('form');
        $this->load->library('form_validation');
        
        $data['title'] = 'Edit a news item';        
        
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('text', 'Text', 'required');
        $data['imgs'] = $this->fileUpLoad();
        
 
        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('news/edit', $data);
            $this->load->view('templates/footer');
 
        }
        else
        {
            echo $data['imgs']['file_name'];
            $this->news_model->edit_news($id,$data['imgs']['file_name']);
            $this->load->view('news/success');
            redirect( base_url() . 'index.php/news');
        }
    }
    
    public function delete($id = NULL)
    {
        
        if (empty($id))
        {
            show_404();
        }
                
        
        $this->news_model->delete_news($id);        
        $this->index();     
    }

    function fileUpLoad() {

        $imgFile = 'img';
        $config['upload_path'] = "../lab1_mvc_oauth/uploads/";
        $config['allowed_types'] = "jpg|png";
        $config['max_size'] = "100000";
        $config['max_width'] = "2000";
        $config['max_height'] = "2000";

        $this->load->library('upload', $config);
        
        if (!$this->upload->do_upload($imgFile)) {
            $data['uploadError'] = $this->upload->display_errors();
            return $data['uploadError'];
        }

        return $this->upload->data();
    }

}