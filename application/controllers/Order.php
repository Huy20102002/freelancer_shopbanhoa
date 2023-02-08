<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Order extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();



		$this->load->library('form_validation');
		$this->load->helper('form');
	}

	public function index()
	{
		$carts = $this->cart->contents();
		$total_amount = 0;
		foreach ($carts as $value) {
			$total_amount = $total_amount + $value['subtotal'];
		}
		$this->data['total_amount'] = $total_amount;
		$user_id = 0;
		if ($this->session->userdata('user')) {
			$user = $this->session->userdata('user');
			$user_id = $user->id;
		}
		if ($this->input->post()) {
			$this->form_validation->set_rules('name', 'Họ tên', 'required');
			$this->form_validation->set_rules('email', 'Email đăng nhập', 'required|valid_email');
			$this->form_validation->set_rules('address', 'Địa chỉ', 'required');
			$this->form_validation->set_rules('message', 'Message', 'required');
			$this->form_validation->set_rules('phone', 'Điện thoại', 'required');
			$this->form_validation->set_rules('payment', 'Thanh toán', 'required');
			if ($this->form_validation->run()) {
				$data = array();
				$payment = $this->input->post('payment') == 0 ? "Tiền Mặt" : "Thanh toán momo qua stk " . $this->input->post('payment');
				$data = array(
					'user_id' => $user_id,
					'user_name' => $this->input->post('name'),
					'user_email' => $this->input->post('email'),
					'user_address' => $this->input->post('address'),
					'user_phone' => $this->input->post('phone'),
					'message' => $this->input->post('message'),
					'amount' => $total_amount,
					'payment' => $payment,
					'created' => now(),
					'type_payment' => $this->input->post('payment') == 0 ? "money" : "momo"
				);
				$this->load->model('transaction_model');
				$this->transaction_model->create($data);
				$transaction_id = $this->db->insert_id();

				$this->load->model('order_model');
				foreach ($carts as $items) {
					$data = array();
					$data = array(
						'transaction_id' => $transaction_id,
						'product_id' => $items['id'],
						'qty' => $items['qty'],
						'amount' => $items['subtotal']
					);
					$this->order_model->create($data);
				}
				$this->cart->destroy();
				$this->session->set_flashdata('message', "Đặt hàng thành công, chúng tôi sẽ liên hệ với bạn để giao hàng");
				redirect(base_url('cart'));
			}
		}
		$payment =  $this->db->get('payment')->row();
		$this->data['payment'] = $payment;
		$this->data['temp'] = 'site/order/index';
		$this->data['cart'] = $carts;
		// echo "<pre>";
		// var_dump($carts);
		// die;
		$this->load->view('site/layoutsub', $this->data);
	}
}
