<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once FCPATH . '/vendor/autoload.php';

class MY_Controller extends CI_Controller
{
  	public $title = ' | E-Commerce';
	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set("Asia/Jakarta");
	}

	public function template($data, $template = 'admin')
	{
		if($template == "user"){
			return $this->load->view('user/includes/layout', $data);
		}
		else{
			return $this->load->view($template . '/includes/layout', $data);
		}
	}

	public function POST($name)
	{
		return $this->input->post($name);
	}

	public function flashmsg($msg, $type = 'success',$name='msg')
	{
		return $this->session->set_flashdata($name, '<div class="alert alert-'.$type.' alert-dismissable"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'.$msg.'</div>');
	}

	public function upload($id, $directory, $tag_name = 'userfile')
	{
		if ($_FILES[$tag_name])
		{
			$upload_path = realpath(APPPATH . '../assets/' . $directory . '/');
			@unlink($upload_path . '/' . $id . '.JPG');
			$config = [
				'file_name' 		=> $id . '.JPG',
				'allowed_types'		=> 'jpg|png|bmp|jpeg',
				'upload_path'		=> $upload_path
			];
			$this->load->library('upload');
			$this->upload->initialize($config);
			return $this->upload->do_upload($tag_name);
		}
		return FALSE;
	}

	public function upload_any_type($id,$directory, $tag_name = 'userfile')
	{
		if ($_FILES[$tag_name])
		{
			// ini_set('upload_max_filesize', '300M');
			$upload_path = realpath(APPPATH . '../assets/' . $directory . '/');
			@unlink($upload_path . '/' . $id);
			$config = [
				'file_name'			=> $id,
				'allowed_types'		=> 'doc|docx|xls|xlsx|ppt|pptx|pdf|txt',
				'upload_path'		=> $upload_path
			];
			$this->load->library('upload');
			$this->upload->initialize($config);
			return $this->upload->do_upload($tag_name);
		}
		return FALSE;
	}

	public function uploadPDF($id, $directory, $tag_name = 'userfile')
	{
		if ($_FILES[$tag_name])
		{
			$upload_path = realpath(APPPATH . '../assets/' . $directory . '/');
			@unlink($upload_path . '/' . $id . '.pdf');
			$config = [
				'file_name'			=> $id . '.pdf',
				'allowed_types'		=> 'pdf',
				'upload_path'		=> $upload_path
			];
			$this->load->library('upload');
			$this->upload->initialize($config);
			return $this->upload->do_upload($tag_name);
		}
		return FALSE;
	}

	public function dump($var)
	{
		echo '<pre>';
		var_dump($var);
		echo '</pre>';
	}

	protected function go_back( $index ) 
	{
		echo '<script type="text/javascript">window.history.go(' . $index . ');</script>'; 
	}

	protected function check_allowance( $condition, $message = [ 'Required parameter is missing', 'danger' ], $redirect_index = -1 )
	{
		if ( $condition ) 
		{

			$this->flashmsg( $message[0], $message[1] );
			$this->go_back( $redirect_index );
			exit;

		}
	}

	protected function __generateRandomString($length = 8, $options = [ 'uppercase', 'lowercase', 'number', 'symbol' ])
    {
        $chars = '';
        if (in_array('uppercase', $options)) {
            $chars .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
        }
        if (in_array('lowercase', $options)) {
            $chars .= 'abcdefghijklmnopqrstuvwxys';
        }
        if (in_array('number', $options)) {
            $chars .= '0123456789';
        }
        if (in_array('symbol', $options)) {
            $chars .= '!@#$%^&*';
        }

        $chars = str_split($chars);
        $charsLength = count($chars);
        $result = '';
        for ($i = 0; $i < $length; $i++)
        {
            $result .= $chars[mt_rand() % $charsLength];
        }

        return $result;
    }
}
