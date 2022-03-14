<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Careers extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
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

        $data["active_careers"] = "active";

        render("careers", $data);
    }

    function detail()
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

        $data["active_careers"] = "active";

        render("careers_detail", $data);
    }

}
