<?php

class News extends CI_Controller
{
    public function index()
    {
        $this->accueil();
//        $this->load->helper('url');
    }

    public function accueil()
    {
        $data = array();
        $data['pseudo'] = 'Arthur';
        $data['email'] = 'email@ndd.fr';
        $data['en_ligne'] = true;



        $this->load->view('news/vue', $data, false);
    }
}