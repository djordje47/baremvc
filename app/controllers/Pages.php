<?php

class Pages extends Controller
{
    public function __construct()
    {
        echo 'Pages loaded <br>';
    }

    public function index()
    {
        $this->view('hello', ['asd']);
    }

    public function about($id)
    {
        echo 'This is about ' . $id;
    }
}