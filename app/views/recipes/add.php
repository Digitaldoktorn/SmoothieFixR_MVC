<?php require APPROOT . '/views/inc/header.php'; ?>
<a href="<?php echo URLROOT; ?>/recipes" class="btn btn-light">Tillbaka</a>
<div class="card card-body bg-light mt-5">
    <h2>Skapa recept</h2>
    <form action="<?php echo URLROOT; ?>/recipes/add" method="post">
        <div class="form-group">
            <label for="title">Title: <sup>*</sup></label>
            <input type="text" name="title" class="form-control form-control-lg <?php echo (!empty($data['title_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['title']; ?>">
            <span class="invalid-feedback"><?php echo $data['title_err']; ?></span>
        </div>
        <input type="submit" class="btn btn-success" value="Submit">

    </form>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>