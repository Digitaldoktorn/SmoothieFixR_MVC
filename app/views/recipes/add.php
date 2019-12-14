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
        <div class="form-group">
            <label for="fruits">Frukt 1: </label>
            <label class="radio-inline">
                <input type="radio" name="fruits" class="form-control form-control-lg <?php echo (!empty($data['fruits_err'])) ? 'is-invalid' : ''; ?>"><?php echo $data['fruits']; ?> Ananas
                <span class="invalid-feedback"><?php echo $data['fruits_err']; ?></span>
            </label>
            <label class="radio-inline">
                <input type="radio" name="fruits" class="form-control form-control-lg <?php echo (!empty($data['fruits_err'])) ? 'is-invalid' : ''; ?>"><?php echo $data['fruits']; ?> Blåbär
                <span class="invalid-feedback"><?php echo $data['fruits_err']; ?></span>
            </label>
            <label class="radio-inline">
                <input type="radio" name="fruits" class="form-control form-control-lg <?php echo (!empty($data['fruits_err'])) ? 'is-invalid' : ''; ?>"><?php echo $data['fruits']; ?> Citron
                <span class="invalid-feedback"><?php echo $data['fruits_err']; ?></span>
            </label>
        </div>
        <div class="form-group">
            <label for="fruits2">Frukt 2: </label>
            <label class="radio-inline">
                <input type="radio" name="fruits2" value="<?php echo $data['fruits2']; ?> Fikon"> Fikon
            </label>
            <label class="radio-inline">
                <input type="radio" name="fruits2" value="<?php echo $data['fruits2']; ?> Katrinplommon"> Katrinplommon
            </label>
            <label class="radio-inline">
                <input type="radio" name="fruits2" value="<?php echo $data['fruits2']; ?> Lingon"> Lingon
            </label>
        </div>
        <div class="form-group">
            <label for="nuts">Nötter/Frön/Kärnor: </label>
            <label class="radio-inline">
                <input type="radio" name="nuts" value="<?php echo $data['nuts']; ?> Cashewnötter"> Cashewnötter
            </label>
            <label class="radio-inline">
                <input type="radio" name="nuts" value="<?php echo $data['nuts']; ?> Kokos, riven"> Kokos, riven
            </label>
            <label class="radio-inline">
                <input type="radio" name="nuts" value="<?php echo $data['nuts']; ?> Mandlar"> Mandlar
            </label>
        </div>
        <div class="form-group">
            <label for="proteins">Proteiner: </label>
            <label class="radio-inline">
                <input type="radio" name="proteins" value="<?php echo $data['proteins']; ?> Feta-ostar"> Feta-ostar
            </label>
            <label class="radio-inline">
                <input type="radio" name="proteins" value="<?php echo $data['proteins']; ?> Kikärtor"> Kikärtor
            </label>
            <label class="radio-inline">
                <input type="radio" name="proteins" value="<?php echo $data['proteins']; ?> Kokta konserverade bönor"> Kokta konserverade bönor
            </label>
        </div>
        <div class="form-group">
            <label for="medium">Medium: </label>
            <label class="radio-inline">
                <input type="radio" name="medium" value="<?php echo $data['medium']; ?> Kokosmjölk"> Kokosmjölk
            </label>
            <label class="radio-inline">
                <input type="radio" name="medium" value="<?php echo $data['medium']; ?> Kornmjölk"> Kornmjölk
            </label>
            <label class="radio-inline">
                <input type="radio" name="medium" value="<?php echo $data['medium']; ?> Mandelmjölk"> Mandelmjölk
            </label>
        </div>
        <div class="form-group">
            <label for="fats">Fetter/Oljor: </label>
            <label class="radio-inline">
                <input type="radio" name="fats" value="<?php echo $data['fats']; ?> Kokosmjölk"> Kokosmjölk
            </label>
            <label class="radio-inline">
                <input type="radio" name="fats" value="<?php echo $data['fats']; ?> Kornmjölk"> Kornmjölk
            </label>
            <label class="radio-inline">
                <input type="radio" name="fats" value="<?php echo $data['fats']; ?> Mandelmjölk"> Mandelmjölk
            </label>
        </div>
        <div class="form-group">
            <label for="spices">Kryddor: </label>
            <label class="radio-inline">
                <input type="radio" name="spices" value="<?php echo $data['spices']; ?> Basilika"> Basilika
            </label>
            <label class="radio-inline">
                <input type="radio" name="spices" value="<?php echo $data['spices']; ?> Cayennepeppar"> Cayennepeppar
            </label>
            <label class="radio-inline">
                <input type="radio" name="spices" value="<?php echo $data['spices']; ?> Citronmeliss"> Citronmeliss
            </label>
        </div>
        <div class="form-group">
            <label for="sweeteners">Sötningsmedel: </label>
            <label class="radio-inline">
                <input type="radio" name="sweeteners" value="<?php echo $data['sweeteners']; ?> Honung"> Honung
            </label>
            <label class="radio-inline">
                <input type="radio" name="sweeteners" value="<?php echo $data['sweeteners']; ?> Kokossocker"> Kokossocker
            </label>
            <label class="radio-inline">
                <input type="radio" name="sweeteners" value="<?php echo $data['sweeteners']; ?> Lönnsirap"> Lönnsirap
            </label>
        </div>

        <input type="submit" class="btn btn-success" value="Submit">
    </form>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>