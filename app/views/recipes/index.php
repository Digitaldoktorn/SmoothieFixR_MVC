<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="row">
    <div class="col-md-6">
        <h1>Recept</h1>
    </div>
    <div class="col-md-6">
        <a href="<?php echo URLROOT; ?>/recipes/add" class="btn btn-primary float-right">Skapa recept</a>
    </div>
</div>
<?php foreach ($data['recipes'] as $recipe) : ?>
    <div class="card card-body mb-3">
        <h4 class="card-title"><?php echo $recipe->title; ?></h4>
        <div class="bg-light p-2 mb-3">Written by <?php echo $recipe->name; ?> on <?php echo $recipe->recipeCreated; ?></div>
        <p class="card-text"><?php echo $recipe->fruits; ?></p>
        <p class="card-text"><?php echo $recipe->nuts; ?></p>
        <a href="<?php echo URLROOT; ?>/recipes/show/<?php echo $recipe->recipeId; ?>" class="btn btn-dark">More</a>

    </div>
<?php endforeach; ?>

<?php require APPROOT . '/views/inc/footer.php'; ?>