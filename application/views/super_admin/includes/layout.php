<?php

	$this->load->view('super_admin/includes/header', array('title' => $title));
	$this->load->view('super_admin/includes/sidebar');
	$this->load->view('super_admin/includes/navbar');
	$this->load->view($content);
	$this->load->view('super_admin/includes/footer');
?>
