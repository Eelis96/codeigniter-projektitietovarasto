<html>
        <head>
            <title>Projektitietovarasto</title>
            <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/bootstrap.min.css">
            <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/style.css">
        </head>
        <body>

        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="<?php echo base_url(); ?>">Projektitietovarasto</a>

        <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="nav navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url(); ?>">Etusivu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url(); ?>tietoa">Tietoa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url(); ?>projects">Projektit</a>
                </li>
                <li>
                    <a class="nav-link" href="<?php echo base_url(); ?>projects/add">Lisää Projekti</a>             
                </li>
                <li>
                    <a class="nav-link" href="<?php echo base_url(); ?>users/register">Rekisteröidy</a>             
                </li>
                <li>
                    <a class="nav-link" href="<?php echo base_url(); ?>users/login">Kirjaudu Sisään</a>             
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <?php if($this->session->flashdata('user_registered')): ?>
            <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_registered').'</p>'; ?>
        <?php endif; ?>
        <?php if($this->session->flashdata('project_added')): ?>
            <?php echo '<p class="alert alert-success">'.$this->session->flashdata('project_added').'</p>'; ?>
        <?php endif; ?>
        <?php if($this->session->flashdata('project_deleted')): ?>
            <?php echo '<p class="alert alert-warning">'.$this->session->flashdata('project_deleted').'</p>'; ?>
        <?php endif; ?>