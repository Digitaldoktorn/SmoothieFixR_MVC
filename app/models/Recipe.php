<?php
class Recipe
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getRecipes()
    {
        $this->db->query('SELECT *,
                            recipes.id as recipeId,
                            users.id as userId,
                            recipes.created_at as recipeCreated,
                            users.created_at as userCreated
                            FROM recipes
                            INNER JOIN users
                            ON recipes.user_id = users.id
                            ORDER BY recipes.created_at DESC
                            ');
        // resultSet is a method that returns more than 1 row
        $results = $this->db->resultSet();

        return $results;
    }

    public function addRecipe($data)
    {
        $this->db->query('INSERT INTO recipes (title, user_id, fruits, fruits2, nuts, proteins, medium, fats, spices, sweeteners ) VALUES(:title, :user_id, :fruits, :fruits2, :nuts, :proteins, :medium, :fats, :spices, :sweeteners)');
        // Bind values
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':user_id', $data['user_id']);
        $this->db->bind(':fruits', $data['fruits']);
        $this->db->bind(':fruits2', $data['fruits2']);
        $this->db->bind(':nuts', $data['nuts']);
        $this->db->bind(':proteins', $data['proteins']);
        $this->db->bind(':medium', $data['medium']);
        $this->db->bind(':fats', $data['fats']);
        $this->db->bind(':spices', $data['spices']);
        $this->db->bind(':sweeteners', $data['sweeteners']);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getRecipeById($id)
    {
        $this->db->query('SELECT * FROM recipes WHERE id = :id');
        $this->db->bind(':id', $id);

        $row = $this->db->single();

        return $row;
    }
}
