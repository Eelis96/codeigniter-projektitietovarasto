<h2><?= $title ?></h2>

<div class="container">
    <?php foreach($projects as $project) : ?>
        <h3><?php echo $project['title']; ?></h3>
        <small class="post-date">Tehty: <?php echo $project['created_at']; ?></small><br>
        <?php echo $project['body']; ?>
        <?php echo form_open('/projects/delete'.$project['id']); ?>
        <input type="submit" value="Delete" class="btn btn-danger">
        </form>
        <hr>

    <?php endforeach ?>
</div>