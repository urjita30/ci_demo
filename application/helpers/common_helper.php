<?php

function pr($data, $param = 0) {
	echo '<pre>';
	print_r($data);
	echo '</pre>';
	if($param == 1) die;
}

function sendMail() {
    $config = Array(
	  'protocol' => 'smtp',
	  'smtp_host' => 'ssl://smtp.googlemail.com',
	  'smtp_port' => 465,
	  'smtp_user' => 'demo.narola@gmail.com', // change it to yours
	  'smtp_pass' => 'Narola21!', // change it to yours
	  'mailtype' => 'html',
	  'charset' => 'iso-8859-1',
	  'wordwrap' => TRUE
	);

	$message = '';
        $this->load->library('email', $config);
      $this->email->set_newline("\r\n");
      $this->email->from('xxx@gmail.com'); // change it to yours
      $this->email->to('xxx@gmail.com');// change it to yours
      $this->email->subject('Resume from JobsBuddy for your Job posting');
      $this->email->message($message);
      if($this->email->send())
     {
      echo 'Email sent.';
     }
     else
    {
     show_error($this->email->print_debugger());
    }
}