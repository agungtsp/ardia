<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Event extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('eventmodel');
    }


    function index()
    {
        $id_lang = id_lang();
        if ($data["seo_title"] == "") {
            $data["seo_title"] = "ARDIA PERDANA";
        }

        $data["meta_description"] = preg_replace(
            "/<[^>]*>/",
            "",
            $data["meta_description"]
        );

        $data["active_event"] = "active";

        $filter_event['id_lang'] = $id_lang;
        $data['list_event'] = $this->eventmodel->findBy($filter_event);	
        foreach ($data['list_event'] as $key => $value) {
            $data['list_event'][$key]['img'] = getImgLink($value['img'], 'large');
        }   
        render("event", $data);
    }

    function detail($uri_path)
    {
        $id_lang = id_lang();
        $filter_event['id_lang'] = $id_lang;
        $filter_event['uri_path'] = $uri_path;
        $data = $this->eventmodel->findBy($filter_event, 1);
        $data['img'] = getImgLink($data['img'], 'large');
        if(!$data){
            redirect(base_url().'tidakditemukan');
        }
        if ($data["seo_title"] == "") {
            $data["seo_title"] = "ARDIA PERDANA";
        }

        $data["meta_description"] = preg_replace(
            "/<[^>]*>/",
            "",
            $data["meta_description"]
        );

        $data["active_event"] = "active";

        render("event_detail", $data);
    }

}
