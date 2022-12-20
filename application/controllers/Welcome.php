<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		$isBackup = $this->input->post('is___backup_db');

		if ($isBackup) {
			// Load the DB utility class
			$this->load->dbutil();

			// Konfigurasi
			$prefs = array(
				'tables'        => array('user', 'lapak'),
				'ignore'        => array(),
				'format'        => 'gzip',
				'filename'      => 'db__'.mt_rand(1000, 9999).'-mybackup.gz',
				'add_drop'      => TRUE,
				'add_insert'    => TRUE,
				'newline'       => "\n"
			);
			
			// Backup your entire database and assign it to a variable
			$backup = $this->dbutil->backup($prefs);
			
			// Load the download helper and send the file to your desktop
			$this->load->helper('download');
			force_download($prefs['filename'], $backup);

			echo '<p>Berhasil</p>';
		}

		$this->load->view('home_page');
	}

	public function welcome()
	{
		$this->load->view('welcome_message');
	}
}
