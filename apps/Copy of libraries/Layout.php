<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Layout {
    
    var $obj;
    var $layout;
    
    function Layout($layout = "layout")
    {
        $this->obj    = & get_instance();
        $this->layout = $layout;
    }

    function setLayout($layout)
    {
      $this->layout = $layout;
    }
    
    function view($view, $data=null, $return=false)
    {
		$layout       = $this->layout;//$moduleView . $this->layout;				
		$data['content_for_layout'] = $this->obj->load->view($view, $data, true);
        
        if($return)
        {
            return $this->obj->load->view($layout, $data, true);
        }
        else
        {
            $this->obj->load->view($layout, $data, false);
        }
    }
}
