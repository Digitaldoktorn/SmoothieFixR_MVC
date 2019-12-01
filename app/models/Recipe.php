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
}
