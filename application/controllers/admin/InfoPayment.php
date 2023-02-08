<?php

class InfoPayment extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->library('upload');
        $this->load->library('upload_library');
    }
    public function index()
    {
        $products = $this->db->get('payment')->result();

        $this->data['products'] = $products;
        $this->data['temp'] = 'admin/info_payment/index';
        $this->load->view('admin/main', $this->data);
    }
    public function create()
    {
        $post = $this->input->post();
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert" style="padding:5px;border-bottom:0px;">', '</div>');

        if ($post) {
            $this->form_validation->set_rules('name', 'Tên ', 'required');
            $this->form_validation->set_rules('phone', 'Số điện thoại', 'required');
            $this->form_validation->set_rules('stk', 'Số tài khoản', 'required');
            if ($this->form_validation->run()) {
                $path = './upload/momo/';
                $image_link = '';
                $image_link = $this->upload_library->upload($path, 'image');

                $data = array(
                    'name' => $this->input->post('name'),
                    'phone' => $this->input->post('phone'),
                    'stk' => $this->input->post('stk'),
                    'image' => $image_link,
                    'created' => now()
                );

                $this->db->insert('payment', $data);
                redirect(admin_url('infopayment'));
            }
        }
        $this->data['temp'] = 'admin/info_payment/add';
        $this->load->view('admin/main', $this->data);
    }
    public function store()
    {
    }
    public function edit($id)
    {
        $post = $this->input->post();

        $payment = $this->db->get_where('payment', ['id' => $id])->row();
        if ($post) {
            $this->form_validation->set_rules('name', 'Tên ', 'required');
            $this->form_validation->set_rules('phone', 'Số điện thoại', 'required');
            $this->form_validation->set_rules('stk', 'Số tài khoản', 'required');
            if ($this->form_validation->run()) {
                if (!is_null($this->input->post('thumb_image'))) {
                    $path = './upload/momo/';
                    $image_link = '';
                    $image_link = $this->upload_library->upload($path, 'image');
                } else {
                    $image_link = $payment->image;
                }


                $data = array(
                    'name' => $this->input->post('name'),
                    'phone' => $this->input->post('phone'),
                    'stk' => $this->input->post('stk'),
                    'image' => $image_link,
                    'created' => now()
                );

                $this->db->update('payment', $data, ['id' => $id]);
                redirect(admin_url('infopayment'));
            }
        }
        $this->data['item'] = $payment;

        $this->data['temp'] = 'admin/info_payment/edit';

        $this->load->view('admin/main', $this->data);
    }
    public function update()
    {
    }
    public function destroy($id)
    {
        $this->db->delete('payment', ['id' => $id]);
        redirect(admin_url('infopayment'));
    }
}
