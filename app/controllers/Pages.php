<?php
class Pages extends Controller
{
    public function __construct()
    { }

    public function index()
    {

        $data = [
            'title' => 'SmoothieFixR',
            'description' => 'Skapa dina smoothierecept med utgångspunkt från vettig näringslära.'
        ];

        $this->view('pages/index', $data);
    }

    public function about()
    {
        $data = [
            'title' => 'Om SmoothieFixR',
            'description' => 'För hälsomedvetna Smoothie-älskare'
        ];

        $this->view('pages/about', $data);
    }

    public function test()
    {
        $data = [
            'title' => 'Test',
            'description' => 'testar'
        ];

        $this->view('pages/test', $data);
    }
}
