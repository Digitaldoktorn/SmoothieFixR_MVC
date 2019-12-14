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
                'fruits' => $_POST['fruits'],
                'fruits2' => $_POST['fruits2'],
                'nuts' => $_POST['nuts'],
                'proteins' => $_POST['proteins'],
                'medium' => $_POST['medium'],
                'fats' => $_POST['fats'],
                'spices' => $_POST['spices'],
                'sweeteners' => $_POST['sweeteners'],
                'user_id' => $_SESSION['user_id'],
                'title_err' => '',
                'fruits_err' => '',
                'fruits2_err' => '',
                'nuts_err' => '',
                'proteins_err' => '',
                'medium_err' => '',
                'fats_err' => '',
                'spices_err' => '',
                'sweeteners_err' => ''
            ];

            // Validate data
            if (empty($data['title'])) {
                $data['title_err'] = 'Skriv in titel';
            }
            if (empty($data['fruits'])) {
                $data['fruits_err'] = 'Välj frukt';
            }
            if (empty($data['fruits2'])) {
                $data['fruits2_err'] = 'Välj frukt';
            }
            if (empty($data['nuts'])) {
                $data['nuts_err'] = 'Välj nöt/frön/kärnor';
            }
            if (empty($data['proteins'])) {
                $data['proteins_err'] = 'Välj protein';
            }
            if (empty($data['medium'])) {
                $data['medium_err'] = 'Välj medium';
            }
            if (empty($data['fats'])) {
                $data['fats_err'] = 'Välj fetter/oljor';
            }
            if (empty($data['spices'])) {
                $data['spices_err'] = 'Välj kryddor';
            }
            if (empty($data['sweeteners'])) {
                $data['sweeteners_err'] = 'Välj sötningsmedel';
            }


            // Make sure no errors
            if (empty($data['title_err']) && empty($data['fruits_err']) && empty($data['fruits2_err']) && empty($data['nuts_err']) && empty($data['proteins_err']) && empty($data['medium_err']) && empty($data['fats_err']) && empty($data['spices_err']) && empty($data['sweeteners_err'])) {
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
                'fruits' => '',
                'fruits2' => '',
                'nuts' => '',
                'proteins' => '',
                'medium' => '',
                'fats' => '',
                'spices' => '',
                'sweeteners' => ''
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
