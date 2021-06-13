<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
    }

    public function index()
    {
        $data['pageTitle'] = 'User';
        $data['users'] = $this->User_model->getUser();
        $this->load->view('user/index', $data);
    }

    public function add()
    {
        $data['pageTitle'] = 'Add User';
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $this->form_validation->set_rules('first_name', 'First Name', 'required|min_length[2]|max_length[200]');
            $this->form_validation->set_rules('last_name', 'Last Name', 'required|min_length[2]|max_length[200]');
            $this->form_validation->set_rules('phone', 'Phone', 'required|is_natural|min_length[10]|max_length[10]');
            $this->form_validation->set_rules('email', 'Email', 'required');
            $this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');
            if ($this->form_validation->run() == TRUE) {
                $user = [
                    'first_name' => $this->input->post('first_name'),
                    'last_name' => $this->input->post('last_name'),
                    'phone' => $this->input->post('phone'),
                    'email' => $this->input->post('email')
                ];
                $this->User_model->addUser($user);
                $this->session->set_flashdata('success', 'User added successfully.');
                redirect('user');
            } else {
                $this->load->view('user/add', $data);
            }
        } else {
            $this->load->view('user/add', $data);
        }
    }

    public function edit($id)
    {
        $data['pageTitle'] = 'Edit User';
        $user = $this->User_model->getUserById($id);
        $data['user'] = $user;
        if ($user) {
            if ($this->input->server('REQUEST_METHOD') == 'POST') {
                $this->form_validation->set_rules('first_name', 'First Name', 'required|min_length[2]|max_length[200]');
                $this->form_validation->set_rules('last_name', 'Last Name', 'required|min_length[2]|max_length[200]');
                $this->form_validation->set_rules('phone', 'Phone', 'required|is_natural|min_length[10]|max_length[10]');
                $this->form_validation->set_rules('email', 'Email', 'required');
                $this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');
                if ($this->form_validation->run() == TRUE) {
                    $userArray = [
                        'first_name' => $this->input->post('first_name'),
                        'last_name' => $this->input->post('last_name'),
                        'phone' => $this->input->post('phone'),
                        'email' => $this->input->post('email')
                    ];
                    $this->User_model->updateUser($id, $userArray);
                    $this->session->set_flashdata('success', 'User update successfully');
                    redirect('user');
                } else {
                    $this->load->view('user/edit', $data);
                }
            } else {
                $this->load->view('user/edit', $data);
            }
        } else {
            $this->session->set_flashdata('error', 'User not found');
            redirect('user');
        }
    }

    public function delete($id = null)
    {
        if ($id) {
            $user = $this->User_model->getUserById($id);
            if ($user) {
                $this->User_model->deleteUserById($id);
                $this->session->set_flashdata('success', 'User deleted successfully');
                redirect('user');
            } else {
                $this->session->set_flashdata('error', 'User not found!');
                redirect('user');
            }
        } else {
            redirect('user');
        }
    }
}
