<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Upload extends CI_Upload
{
   function multi_upload($configs,$files)
   {
    
    if(count($configs) != count($files))
    {
       return 'array_count_wrong';
    }
    
    $errors = $successes = array();

    for($i=0, $j = count($files);$i<$j;$i++)
    {
       $this->initialize($configs[$i]);

       if( ! $this->do_upload($files[$i]))
       {
            $errors[$files[$i]] = $this->display_errors();
       }
       else
       {
           $successes[$files[$i]] = $this->data();
       }
    }

    return array($errors, $successes);
  }
} 