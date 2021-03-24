<h2><?= $title; ?></h2>
<?php echo validation_errors(); ?>

<?php echo form_open('users/register'); ?>
    <div class="form-group">
        <label>Nimi</label>
        <input type="text" class="form-control" name="username">
    </div>
    <div class="form-group">
        <label>Salasana</label>
        <input type="password" class="form-control" name="password">
    </div>
    <div class="form-group">
        <label> Varmista Salasana</label>
        <input type="password" class="form-control" name="password2">
    </div>

    <button type="submit" class="btn btn-primary">Rekisteröidy</button>
<?php echo form_close(); ?>