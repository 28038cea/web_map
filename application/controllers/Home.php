<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function index()
    {
        $this->load->view('v_home');
    }

    public function geoJsonImport()
    {
        $json = file_get_contents(base_url('assets/geojson/map.geojson'));
        $obj  = json_decode($json);
        foreach($obj->features as $feature) {
            echo 'importing: ' . $feature->properties->id . ' ' . $feature->properties->name .'<br>';
            if($feature->geometry->type == 'Point') {
                echo 'geometry type: ' . $feature->geometry->type . '<br>';
                echo 'lng: ' . $feature->geometry->coordinates[0] . '<br>';
                echo 'lat: ' . $feature->geometry->coordinates[1] . '<br>';

                $this->db->set('id', $feature->properties->id);
                $this->db->set('lng', $feature->geometry->coordinates[0]);
                $this->db->set('lat', $feature->geometry->coordinates[1]);
                $this->db->set('title', $feature->properties->name);
                $this->db->set('body', 'isi detail di sini');
                $this->db->replace('details');
            } else {
                echo 'skip: geometry type is: ' . $feature->geometry->type . '<br>';
            }
            echo '<br>';
        }
    }

    public function getDetails()
    {
        $lng = $this->input->get('lng');
        $lat = $this->input->get('lat');

        if ($lat and $lng) {
            $this->db->select('*');
            $this->db->from('details');
            $this->db->where('lng', $lng);
            $this->db->where('lat', $lat);
            $query = $this->db->get();
            $return = $query->row();
            echo json_encode($return);
        }
    }
}
