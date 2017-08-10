<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.1.6 or newer
 *
 * @package		CodeIgniter
 * @author		EllisLab Dev Team
 * @copyright		Copyright (c) 2008 - 2014, EllisLab, Inc.
 * @copyright		Copyright (c) 2014 - 2015, British Columbia Institute of Technology (http://bcit.ca/)
 * @license		http://codeigniter.com/user_guide/license.html
 * @link		http://codeigniter.com
 * @since		Version 1.0
 * @filesource
 */
// ------------------------------------------------------------------------

/**
 * CodeIgniter Array Helpers
 *
 * @package		CodeIgniter
 * @subpackage	Helpers
 * @category	Helpers
 * @author		EllisLab Dev Team
 * @link		http://codeigniter.com/user_guide/helpers/array_helper.html
 */
// ------------------------------------------------------------------------

/**
 * Element
 *
 * Lets you determine whether an array index is set and whether it has a value.
 * If the element is empty it returns FALSE (or whatever you specify as the default value.)
 *
 * @access	public
 * @param	string
 * @param	array
 * @param	string
 * @param	string
 * @param	mixed
 * @param	array
 * @return	mixed	depends on what the array contains
 */
if (!function_exists('element')) {

    function mail($to, $cc=null, $from, $subject, $content, $file=null) {
        
        $this->load->library('phpmailer');
        $email = new PHPMailer();

        $email->From = $from;
//        $email->FromName = 'Synergistics AE';
        $email->Subject = $subject;
        $email->MsgHTML($content);
        $email->AddAddress($to);
        if($file){
            foreach($file as $f){
                $email->AddAttachment($f['path'], $f['name']);
            }
        }

        return $email->Send();
    }

}

/* End of file array_helper.php */
/* Location: ./system/helpers/array_helper.php */