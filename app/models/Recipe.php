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

        $results = $this->db->resultSet();

        return $results;
    }

    public function addRecipe($data)
    {
        $this->db->query('INSERT INTO recipes (title, user_id, fruits) VALUES(:title, :user_id, :fruits)');
        // Bind values
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':user_id', $data['user_id']);
        $this->db->bind(':fruits', $data['fruits']);

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
