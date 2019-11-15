<?php

class Pages extends Controller
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = $this->model('User');
    }

    public function index()
    {
        $users = $this->userModel->getUsers();
        $data = ['title' => 'Welcome', 'users' => $users];
        $this->view('pages/index', $data);
    }

    public function about()
    {
        $data = ['title' => 'About'];
        $this->view('pages/about', $data);
    }
}