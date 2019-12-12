<?php
class Recipes extends Controller
{
    public function __construct()
    {
        if (!isLoggedIn()) {
            redirect('users/login');
        }

        $this->recipeModel = $this->model('Recipe');
        $this->userModel = $this->model('User');
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
                'fruits' => $_POST['fruits'][0],
                'user_id' => $_SESSION['user_id'],
                'title_err' => '',
                'fruits_err' => ''
            ];

            // Validate data
            if (empty($data['title'])) {
                $data['title_err'] = 'Skriv in titel';
            }
            if (empty($data['fruits'])) {
                $data['fruits_err'] = 'Välj frukt';
            }


            // Make sure no errors
            if (empty($data['title_err']) && empty($data['fruits_err'])) {
                // die('SUCCESS');
                if ($this->recipeModel->addRecipe($data)) {
                    flash('recipe_message', 'Recept skapat!');
                    redirect('recipes');
                } else {
                    die('Något gick snett');
                }
            } else {
                // Load view with errors
                $this->view('recipes/add', $data);
            }
        } else {
            $data = [
                'title' => '',
                'fruits' => ''
            ];

            $this->view('recipes/add', $data);
        }
    }

    public function show($id)
    {
        $recipe = $this->recipeModel->getRecipeById($id);
        $user = $this->userModel->getUserById($recipe->user_id);

        $data = [
            'recipe' => $recipe,
            'user' => $user
        ];

        $this->view('recipe/show', $data);
    }
}
