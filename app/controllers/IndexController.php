<?php

namespace BookNotes\Controllers;

class IndexController extends AbstractController
{
    public function index() {
        return $this->view('index');
    }
}