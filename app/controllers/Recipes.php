<?php
class Recipes extends Controller
{

    // To have the redirect in the constuctor will redirect user no matter which method you use, even the index. If you want guests to be able to access index, don't put this redirect in the constructor. Then you only need to put it in the methods that need to be protected.
    public function __construct()
    {
        if (!isLoggedIn()) {
            redirect('users/login');
        }
    }

    public function index()
    {
        $data = [];

        $this->view('recipes/index', $data);
    }
}
