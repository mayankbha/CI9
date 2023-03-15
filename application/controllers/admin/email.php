<?php

/*
 * @author WebSiteDesignz Team
 * @package controller.email
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * The Email Controller is used to handle All Email Requests.
 * @class Email
 */

class Email extends CI_Controller
{

    /**
     * The Constructor is used to Load All Libraries, Helpers and Models
     * used by Email Methods.
     * @constructor
     */
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('admin_id') == FALSE)
            redirect('admin/login');
        $this->header_data = array('system_message' => $this->session->flashdata('message'));

        $this->load->model('outbound_email_model');

        $this->data = array();

        $this->data['sel']='email';
        $this->data['display_menu']='yes';

        $this->load->library('email');

    }

    /**
     * This method is used to List all Outbound Emails for Admin
     * @method index
     * @param fields {String=''} order by field
     * @param order_type {String=asc} order asc
     * @example
     *       site_url/admin/email
     * 
     */
    function index($fields='' , $order_type='asc')
    {
        $this->data['emails'] = $this->outbound_email_model->getEmailList($fields, $order_type);

        $this->data['order_type'] = ($order_type=='asc') ? 'desc' : 'asc';

        $this->data['body']='admin/email/list';

        $this->data['message']=$this->session->flashdata('message');

        $this->load->view('admin/structure',$this->data);
    }


    /**
     * This method is used to view Outbound Email data
     * @method view
     * @example
     *       site_url/email/view/{id}
     * 
     */
    function view()
    {
        $email_id = $this->uri->segment(4, 0);

        $this->data['email'] = $this->outbound_email_model->getEmailById($email_id);

        $this->data['body'] = 'admin/email/view';

        $this->data['message'] = $this->session->flashdata('message');

        $this->load->view('admin/structure', $this->data);
    }

    /**
     * This method is used to edit Outbound Email data
     * @method edit
     * @param email_id {Number} email id
     * @example
     *       site_url/admin/email/edit/{id}
     * 
     */
    function edit($email_id)
    {
        $this->data['email'] = $this->outbound_email_model->getEmailById($email_id);

        $this->data['email_id'] = $email_id;

        $this->data['body'] = 'admin/email/edit';

        $this->data['message'] = $this->session->flashdata('message');

        $this->load->view('admin/structure', $this->data);
    }

    /**
     * This method is used to save Outbound Email data
     * @method save
     * @param email_id {Number} email id
     * @example
     *       site_url/admin/email/save
     * 
     */
    function save($email_id)
    {
        $this->form_validation->set_rules('subject', 'Subject', 'trim|required|xss_clean');
        $this->form_validation->set_rules('content', 'Message', 'trim|required|xss_clean');
        $this->form_validation->set_error_delimiters('<div class="error" style="color:red;">', '</div>');
        if ($this->form_validation->run() == FALSE) {
            $this->edit($email_id);
        } else {
            if ($this->outbound_email_model->save_email($email_id)) {
                $this->session->set_flashdata('message', 'Email saved.');
                redirect('admin/email');
            } else
                redirect('admin/email/edit/' . $email_id);
        }
    }

    /**
     * This method is used to send Outbound Email data
     * @method send
     * @example
     *       site_url/admin/email/send
     * 
     * [Function Not Completed]
     */
    function send()
    {

        $this->data['body'] = 'admin/email/send';
        $this->load->view('admin/structure', $this->data);
    }

    /**
     * This method is used to Send Outbound Email data
     * @method SendMail
     * @example
     *       site_url/admin/email/SendMail
     * 
     */
    function SendMail()
    {
        $this->form_validation->set_rules('from', 'From', 'trim|xss_clean|required|valid_email');
        $this->form_validation->set_rules('subject', 'Subject', 'trim|required|xss_clean');
        $this->form_validation->set_rules('content', 'Message', 'trim|required|xss_clean');
        if ($this->form_validation->run() == FALSE) {
            $this->email->set_mailtype('html');

            if ($this->input->post('to_email') == 1) {

                $members = $this->members_model->GetAllMembers();

                $this->data['emails'] = array();
                $email = '';
                ;
                foreach ($members as $row)
                    $email .= $row['email'] . ",";

                $this->email->from($this->input->post('from'));

                $this->email->to(trim($email, ","));

                $this->email->subject($this->input->post('subject'));

                $this->email->message($this->input->post('content'));

                $this->email->send();
                redirect('admin/email');

            } else {

                $this->email->from($this->input->post('from'));

                $this->email->to($this->input->post('emailId'));

                $this->email->subject($this->input->post('subject'));

                $this->email->message($this->input->post('content'));

                $this->email->send();
                redirect('admin/email');
            }
        } else
            $this->send();

    }

    /**
     * This method is used to view List all Outbound Emails for Admin
     * @method page
     * @param page {Number=1} number of pages
     * @param orderBy {String=''} order by column
     * @param order {String=asc} order asc
     * @example
     *       site_url/admin/email/page
     *
     * [Function Not USED]
     */
    function page($page = 1, $orderBy = "name", $order = "asc")
    {
        $page = max(1, $page);
        if (!in_array($order, $this->orders)) {
            $order = $this->orders[0];
        }
        $this->data['order'] = $order;
        if (!in_array($orderBy, $this->orderFields)) {
            $orderBy = $this->orderFields[0];
        }
        $this->data['page'] = $page;
        $this->data['orderBy'] = $orderBy;
        $this->data['contents'] = $this->Email_templates_model->get(array(), $this->data['orderBy'], $this->data['order'], $this->perPage, ($page - 1) * $this->perPage);
        $this->data['total'] = $this->Email_templates_model->getTotal();
        $this->my_pagination->Items($this->data['total']);
        $this->my_pagination->limit($this->perPage);
        $this->my_pagination->urlFriendly();
        $this->my_pagination->target(site_url('admin/email/list') . '/%/' . $this->data['orderBy'] . "/" . $this->data['order']);
        $this->my_pagination->currentPage($this->data['page']);
        $this->my_pagination->className = "pagination pagination-centered ";
        $this->my_pagination->adjacents(1);
        $this->pageTitle[] = "Page " . $page;
        $this->pageTitle[] = "Resource List";
        $this->data['body'] = 'admin/email/list';
        $this->load->view('admin/structure', $this->data);
    }

    /**
     * This method is used to broadcast Outbound Emails for some/all users
     * @method broadcast
     * @example
     *       site_url/admin/email/broadcast
     * 
     */
    function broadcast()
    {
        $this->data['body']='admin/email/broadcast';

        $this->load->view('admin/structure',$this->data);
    }

    /**
     * This method is used to send automatic Outbound Emails for users
     * @method auto
     * @example
     *       site_url/admin/email/auto
     * 
     */
    function auto()
    {
        $this->data['body']='admin/email/auto';

        $this->load->view('admin/structure',$this->data);
    }

}
?>
