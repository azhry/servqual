<?php

	$this->load->view('pelanggan/includes/header', array('title' => $title));
	$this->load->view('pelanggan/includes/navbar');
	$this->load->view($content);
	$this->load->view('pelanggan/includes/footer');
?>
