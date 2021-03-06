<h2><?= $title ?></h2>

<div class="container">
    <?php foreach($projects as $project) : ?>
        <h3><?php echo $project['title']; ?></h3>
        <small class="post-date">Tehty: <?php echo $project['created_at']; ?></small><br>
        <?php echo $project['body']; ?>

    <?php if($this->session->userdata('user_id') == $project['user_id'] || $this->session->userdata('is_admin') == 1): ?>
        <hr>
        <?php echo form_open('/projects/delete/'.$project['id']); ?>
        <input type="submit" value="Delete" class="btn btn-danger">
        </form>
    <?php endif; ?>
    <hr>
    <?php endforeach ?>
</div>