<?php 
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Inventory extends CI_Controller {

    function __construct() {
	parent::__construct();
    }

    function index() {

	$data['title'] = "Inventory";
	$data['heading'] = "Inventory";
	
	$this->load->library('table');
	$this->table->set_heading('Code','Category','Item Description','Status','Options');

	$this->load->model('Inventory_model','inventory');
	$inventory = $this->inventory->get_inventory();

	foreach($inventory as $item) {
	    $code = $item->code;
	    $this->table->add_row(array($item->code, $item->category, $item->description, '', ''));
	}
	
	$data['table'] = $this->table->generate();

	$this->load->view('inventory', $data);
	
    }

}