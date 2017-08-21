<?php
class LangSwitch extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
		$this->load->library('user_agent');
    }

    function switchLanguage($language = "") {
        $language = ($language != "") ? $language : "english";
		//echo $language;
        $this->session->set_userdata('site_lang', $language);

		/***** change language ****/
		#$CI =& get_instance();
		#$CI->config->set_item('language',$language);
        #$loaded = $this->is_loaded;
        #$this->is_loaded = array();
		#print_r($loaded);
		#die;
		/***** change language ****/
		//echo $this->session->userdata('site_lang') ;
		$this->config->set_item('language', $this->session->userdata('site_lang') );	
		//echo $this->config->item('language');
        redirect($this->agent->referrer());
    }
}