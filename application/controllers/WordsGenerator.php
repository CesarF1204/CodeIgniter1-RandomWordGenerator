<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class WordsGenerator extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{	
		if($this->input->post('action') == 'generate') {
			$generate = $this->session->userdata('generate');
			$generate++;
			$this->session->set_userdata('generate', $generate);
			echo '<p class="text-center">Random Word (attempt #'.$generate.')</p>';

			$words_length = 14;
			$words = array_merge(range('0', '9'), range('A', 'Z'));
	    	shuffle($words);
	   	 	echo '<div class="generated-word">'.substr(implode($words), 0, $words_length).'<div>';
		}
		$this->load->view('random_word_generator/index.php');
	}
}
