<?php
class Recipes extends Controller
{
    public function __construct()
    {
        if (!isLoggedIn()) {
            redirect('users/login');
        }

        $this->recipeModel = $this->model('Recipe');
    }

    public function index()
    {
        // Get recipes
        $recipes = $this->recipeModel->getRecipes();

        $data = [
            'recipes' => $recipes
        ];

        $this->view('recipes/index', $data);
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'title' => trim($_POST['title']),
                'user_id' => $_SESSION['user_id'],
                'title_err' => ''
            ];

            // Validate data
            if (empty($data['title'])) {
                $data['title_err'] = 'Please enter title';
            }


            // Make sure no errors
            if (empty($data['title_err'])) {
                // Validated
                if ($this->recipeModel->addRecipe($data)) {
                    flash('recipe_message', 'Recept skapat!');
                    redirect('recipes');
                } else {
                    die('Something went wrong');
                }
            } else {
                // Load view with errors
                $this->view('recipes/add', $data);
            }
        } else {
            $data = [
                'title' => ''
            ];

            $this->view('recipes/add', $data);
        }
    }
}
