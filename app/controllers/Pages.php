<?php

class Pages
{
    public function __construct()
    {
        echo 'Pages loaded <br>';
    }

    public function index()
    {
        echo 'Index method <br>';
    }

    public function about($id)
    {
        echo 'This is about ' . $id;
    }
}