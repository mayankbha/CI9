<?php

class Banner extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		if ($this->session->userdata('admin_id')=='')
			redirect('admin/login');

		$this->load->model('banner_model');

		$this->data = array();

		$this->data['sel']='users';

		$this->data['display_menu']='yes';
	}

	function index($fields='')
	{
		if($fields!='')
		{
			if($this->session->userdata('sorttype')=='')
				$this->session->set_userdata(array('sorttype'=>'asc'));
			else{

				if($this->session->userdata('sorttype')=='asc') {

					$this->session->unset_userdata(array('sorttype'=>''));

					$this->session->set_userdata(array('sorttype'=>'desc'));
				} else 	{

					$this->session->unset_userdata(array('sorttype'=>''));

					$this->session->set_userdata(array('sorttype'=>'asc'));
				}
			}
		}

		$this->data['banners'] = $this->banner_model->Get_Banners_list($fields);

		$this->data['body']= 'admin/banners/banner_list';

		$this->load->view('admin/structure',$this->data);
	}

	function edit($banner_id = 0)
	{
		if ($banner_id == 0)
			$this->data['edit']='new';
		else
		{
			$this->data['edit']='edit';

			$this->data['banner'] = $this->banner_model->Get_Banner_by_id($banner_id);

		}

		$this->data['banner_id'] = $banner_id;

		$this->data['body']= 'admin/banners/banner_edit';

		$this->load->view('admin/structure',$this->data);
	}

	function view($banner_id)
	{
		$banner = $this->db->where('banner_id', $banner_id)->get('banners')->row();
		$banner->date_from = date('M d, Y', strtotime($banner->date_from));
		$banner->date_to = date('M d, Y', strtotime($banner->date_to));

		$this->data['banner'] = $banner;

		$this->data['view'] = $this->load->view('admin/details/banner_view', $this->data, TRUE);
		$this->load->view('admin/index', $this->data);
	}

	function save($banner_id=0)
	{
		$this->form_validation->set_rules('name', 'Name', 'trim|xss_clean|required');
		$this->form_validation->set_rules('location', 'Location', 'trim|xss_clean|required');
		$this->form_validation->set_rules('date_from', 'Display From', 'trim|xss_clean|required');
		$this->form_validation->set_rules('date_to', 'Display To', 'trim|xss_clean|required');
		$this->form_validation->set_rules('max_clicks', 'Maximum Clicks', 'trim|xss_clean|required');
		$this->form_validation->set_rules('max_impressions', 'Maximum impressions', 'trim|xss_clean|required');
		$this->form_validation->set_rules('link', 'Link', 'trim|xss_clean');
		$this->form_validation->set_rules('code', 'Code', 'trim|xss_clean');
		$this->form_validation->set_rules('userfile', 'Image', 'trim|xss_clean|callback_image');
		$this->form_validation->set_error_delimiters('<div class="error" style="color:red;">', '</div>');

	  	if ($this->form_validation->run() != FALSE)
		{
			$image = '';
			$error = '';
			if($_FILES['userfile']['error']==0) {

			$config['upload_path'] = FCPATH.'/data/banners/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['encrypt_name'] = TRUE;
			$this->load->library('upload', $config);

				if ($this->upload->do_upload())
				{
					$upload_data = $this->upload->data();
					$image =  $upload_data['file_name'];
				} else {
					$error = $this->upload->display_errors();
					$this->form_validation->set_message('userfile',$error);
				}
			}
			if($error=='')	{
				$this->banner_model->Save_Banner($this->input->post('name',TRUE),$this->input->post('location',TRUE),$this->input->post('code',TRUE),$image,$this->input->post('link',TRUE),$this->input->post('date_from',TRUE),$this->input->post('date_to',TRUE),$this->input->post('max_clicks',TRUE),$this->input->post('max_impressions',TRUE),1,$banner_id);
				$this->session->set_flashdata('message', 'Banner saved.');
				redirect ('admin/banner');
			} else
				$this->edit($banner_id);
		} else {
			$this->edit($banner_id);
		}
	}

	function image()
	{
		if($_FILES['userfile']['error']==0) {
			$size = getimagesize($_FILES['userfile']['tmp_name']); die;
			if($this->input->post('name')=='home')
			{
				if($size[0]!=342 && $size[1]!=257) {
					$this->form_validation->set_message('userfile','image size not accorging to define site');
					return false;
				}
			}
		} else
			return true;
	}

	function delete($banner_id)
	{
		$this->db->where('banner_id', $banner_id)->delete('banners');

		$this->session->set_flashdata('message', 'Banner has been deleted.');
		admin_redirect('banner');
	}
}
