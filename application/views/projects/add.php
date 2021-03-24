<h2><?= $title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('projects/add'); ?>
  <div class="form-group">
    <label>Otsikko</label>
    <input type="text" class="form-control" name="title">
  </div>
  <div class="form-group">
    <label>Projektin Kuvaus</label>
    <textarea class="form-control" name="description" cols="10" rows="3"></textarea>
  </div>
  <div class="form-group">
    <label>Projektin valmistumispäivä</label>
    <input type="date" name="date">
  </div>
  <button type="submit" class="btn btn-primary">Lisää</button>
</form>