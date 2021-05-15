<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function index()
    {
        $this->db->select('*');
        $this->db->from('details');
        $query = $this->db->get();
        $data['details'] = $query->result();

        $data['viewPath'] = 'admin/index';
        $this->load->view('admin/template', $data);
    }

    public function edit($id = 0)
    {
        $this->db->select('*');
        $this->db->from('details');
        $this->db->where('id', $id);
        $query = $this->db->get();
        $data['detail'] = $query->row();

        $data['viewPath'] = 'admin/edit';
        $this->load->view('admin/template', $data);
    }

    public function update($id = 0)
    {
        $this->db->set('title', $this->input->post('title'));
        $this->db->set('body', $this->input->post('body'));
        $this->db->where('id', $id);
        $this->db->update('details');

        $this->session->set_flashdata('alert', 'success cuk');
        redirect('admin/edit/' . $id);
    }
    
    public function tinymce_upload()
    {
        $path = './uploads/';
        if (!is_dir('uploads')) {
            mkdir('./uploads', 0777, true);
        }
        $config['upload_path']		= $path; 
        $config['allowed_types']	= 'jpg|png|jpeg';
        $config['overwrite']		= TRUE;
        $config['max_size']			= 0;
        $config['max_width']		= 0;
        $config['max_height']		= 0;
        $config['file_ext_tolower']	= TRUE;
        $config['remove_spaces']    = TRUE;
        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('file')) {
            $this->output->set_header('HTTP/1.0 500 Server Error');
            exit;
        } else {
            $file = $this->upload->data();
            $this->output
                ->set_content_type('application/json', 'utf-8')
                ->set_output(json_encode(['location' => base_url('uploads/' . $file['file_name'])]))
                ->_display();
            exit;
        }
    }
}
