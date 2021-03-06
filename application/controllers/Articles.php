<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Articles extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('articlemodel');
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

        $data["active_articles"] = "active";

        $filter_article['id_lang'] = $id_lang;
        $data['list_articles'] = $this->articlemodel->findBy($filter_article);	
        foreach ($data['list_articles'] as $key => $value) {
            $data['list_articles'][$key]['img'] = getImgLink($value['img'], 'large');
        }   
        render("articles", $data);
    }

    function detail($uri_path)
    {
        $id_lang = id_lang();
        $filter_article['id_lang'] = $id_lang;
        $filter_article['uri_path'] = $uri_path;
        $data = $this->articlemodel->findBy($filter_article, 1);
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

        $data["active_articles"] = "active";

        render("articles_detail", $data);
    }

}
