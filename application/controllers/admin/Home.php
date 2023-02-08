<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Home extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('transaction_model');
	}
	public function index()
	{
		$input = array();
		$input2 = array();
		$input['where'] = array('status' => '0');
		$total_order = $this->transaction_model->get_total($input);
		$this->db->select_sum('amount');
		$this->db->where('date(from_unixtime(created))', 'current_date()', false);
		$this->db->from('transaction');
		$query = $this->db->get();
		$result = $query->row();
		$count_order_day = $this->db->count_all_results();
		$total_money_orders_day = $result->amount;
		$transaction_in_month = $this->transanctionInMonth();
		$product_sale = $this->productsaleInMonth();
		$this->data['total_order'] = $total_order;
		$this->data['total_count_order'] = $count_order_day;
		$this->data['total_money_orders_day'] = $total_money_orders_day;
		$this->data['total_money_in_month'] = $transaction_in_month;
		$this->data['product_sale'] = $product_sale;
		$this->data['temp'] = 'admin/home/index';
		$this->load->view('admin/main', $this->data);
	}
	public function transanctionInMonth()
	{
		$this->db->select('MONTH(from_unixtime(created)) as month, YEAR(from_unixtime(created)) as year, SUM(amount) as total_amount');
		$this->db->from('transaction');
		$this->db->where('YEAR(from_unixtime(created))=year(curdate())');
		$this->db->group_by('MONTH(from_unixtime(created)), YEAR(from_unixtime(created))');
		$result = $this->db->get()->result();
		return $result;
	}
	public function productsaleInMonth()
	{
		$start_date = strtotime('first day of this month');
		$end_date = strtotime('last day of this month');

		$this->db->select('name, SUM(buyed) as total_sold');
		$this->db->from('product');
	
		$this->db->group_by('id');
		$this->db->order_by('total_sold', 'desc');
		$this->db->limit(5);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
}
