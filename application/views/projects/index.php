<h2><?= $title ?></h2>
<?php foreach($projects as $project) : ?>
    <h3><?php echo $project['title']; ?></h3>
    <small class="post-date">Tehty: <?php echo $project['created_at']; ?></small><br>
    <?php echo $project['body']; ?>

<?php endforeach    ?>