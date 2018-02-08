<?php

	$this->load->view('user/includes/header', array('title' => $title));
	$this->load->view('user/includes/navbar');
	$this->load->view($content);
	$this->load->view('user/includes/footer');
?>
