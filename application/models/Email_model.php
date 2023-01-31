<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Email_model extends CI_Model{

    public function __construct(){
        parent::__construct();

        $this->load->database('default');
    }

    public function send($to, $subject, $template = 1){
    	$config = Array(
		    'protocol' => 'smtp',
		    'smtp_host' => 'ssl://smtp.googlemail.com',
		    'smtp_port' => 465,
		    'smtp_user' => 'tommyanggoroyunar@gmail.com',
		    'smtp_pass' => 'kstxzngaaokrgwla',
		    'mailtype'  => 'html', 
		    'charset'   => 'iso-8859-1'
		);
		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");

		$this->email->from('no-reply@gmail.com', 'No Reply | Email Registration');
        $this->email->to($to); 

        $this->email->subject($subject);
		$message = $this->_template($template);
        $this->email->message($message);  

		$result = $this->email->send();
		if(!$result){
			// var_dump($this->email->print_debugger());exit;
		}
		// var_dump($result);exit;
		return $result;
    }

	private function _template($id){
		switch ($id) {
			case 1:
				$message = 'Selamat, anda telah terdaftar pada website PPDB SMP Harapan Massa. :) <br/> Selanjutnya silahkan menunggu proses administrasi selesai. <br/> Terima Kasih.';
				break;
			case 2:
				$message = 'Selamat, anda <strong>LOLOS</strong> sebagai peserta didik SMP Harapan Massa. :) <br/> Selanjutnya silahkan melakukan pendaftaran ulang. <br/> Terima Kasih.';
				break;
			case 3:
				$message = 'Mohon maaf, anda <strong>TIDAK LOLOS</strong> sebagai peserta didik SMP Harapan Massa. :( <br/> Silahkan mencoba pada kesempatan berikutnya. <br/> Terima Kasih.';
				break;
			default:
				# code...
				$message = 'Selamat, anda telah terdaftar pada website PPDB SMP Harapan Massa. :) <br/> Selanjutnya silahkan menunggu proses administrasi selesai. <br/> Terima Kasih.';
				break;
		}

		return $message;
	}
}