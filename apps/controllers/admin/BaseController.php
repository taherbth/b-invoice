<?php 
/**
 * Base Controller
 * Common tasks of all controllers are done here
 * Must be inherited, no direct instance allowed (abstract)   
*/

abstract class BaseController extends Controller
{	
	protected $data     = array();

	function __construct()
	{
		parent::Controller();
        
        
        $lang=array();	
        if(isset($_REQUEST['site_language'])){
            $lang['lang_file']=$_REQUEST['site_language'];
        }
        if(empty($lang) && ($this->session->userdata('lang_file')=="")){
             $lang['lang_file'] = "sv";
             $this->session->set_userdata($lang);
            //$_SESSION['site_language']= "sw";
        }
        elseif((!empty($lang) && ($this->session->userdata('lang_file')!="")) && ($this->session->userdata('lang_file')!=$lang['lang_file'])){
            $this->session->set_userdata($lang);
        }

        $this->lang->load('common', $this->session->userdata('lang_file'));
        $this->lang->load('language', $this->session->userdata('lang_file'));
        
		$this->load->library('layout');
		$this->layout->setLayout('frontend');
		$this->p_config['base_url'] = base_url();
		$this->siteTitle = 'Admin Control Panel - ';
		//$this->userId    = $this->dx_auth->get_user_id ();
        $this->load->model('admin/users', 'uAccount');        
        $this->load->model('admin/users', 'uAccount');
        //$this->data['userPreviliges'] = $this->uAccount->getUserInfo($this->userId);
		//$this->data['uid'] = $this->dx_auth->get_user_id ();
		//$this->data['emp_name'] =$this->dx_auth->get_emp_id();
		//$ab =$this->dx_auth->get_username();
		header("cache-Control: no-store, no-cache, must-revalidate");
		header("cache-Control: post-check=0, pre-check=0", false);
		header("Pragma: no-cache");
		header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
        //$this->data['forwardPrevs'] = $this->Shows->getThisValue("forward_work_order.emp_name = '$emp_name' && forward_work_order.forward_dept_name = '11'", 'forward_work_order');   
	}
	
    protected function _setupFirePHP()
    {
        $this->load->config('fireignition');
        if ($this->config->item('fireignition_enabled'))
        {
            if (floor(phpversion()) < 5)
            {
                log_message('error', 'PHP 5 is required to run fireignition');
            } else {
                $this->load->library('firephp');
            }
        }
        else 
        {
            $this->load->library('firephp_fake');
            $this->firephp =& $this->firephp_fake;
        }
}


//password encryption
//$text=PlainText password
//$salt=vaccitvassit

    function encrypt($text,$salt) 
    { 
        return trim(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256,$salt, $text, MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND)))); 
    } 
//password decryption
//$text=Encrypted password
//$salt=vaccitvassit
    function decrypt($text,$salt) 
    { 
        return trim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256,$salt, base64_decode($text), MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND))); 
    } 
    

}