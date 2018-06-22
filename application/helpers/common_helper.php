<?php

function pr($data, $param = 0) {
	echo '<pre>';
	print_r($data);
	echo '</pre>';
	if($param == 1) die;
}

function sendMail($from = 'demo.narola@gmail.com',$to,$subject,$message) {
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

    $CI = & get_instance();
    
    $CI->email->initialize($config);
    $CI->email->set_newline("\r\n");
    $CI->email->from($from); // change it to yours
    $CI->email->to($to);// change it to yours
    $CI->email->subject($subject);
    $CI->email->message($message);
    if($CI->email->send()) {
        echo 'Email sent.';
    } else {
        show_error($CI->email->print_debugger());
    }
}