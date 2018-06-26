<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* 
| ------------------------------------------------------------------- 
| EMAIL CONFING 
| ------------------------------------------------------------------- 
| Configuration of outgoing mail server. 
| */
$config['protocol'] = 'smtp';
$config['smtp_host'] = 'ssl://smtp.googlemail.com';  
$config['smtp_port'] = '465';  
$config['smtp_timeout'] = '30';  
$config['smtp_user'] = 'demo.narola@gmail.com';  
$config['smtp_pass'] = 'Narola21!';
$config['charset'] = 'utf-8';
$config['mailtype'] = 'html';
$config['wordwrap'] = TRUE;
$config['newline'] = "\r\n";
$config['crlf'] = "\r\n";