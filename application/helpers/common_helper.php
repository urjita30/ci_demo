<?php

function pr($data, $param = 0) {
	echo '<pre>';
	print_r($data);
	echo '</pre>';
	if($param == 1) die;
}