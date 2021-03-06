<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <link rel="shortcut icon" href="<?= base_url('assets/img/pamjaya-logo.png'); ?>">
    <link rel="apple-touch-icon" href="<?= base_url('assets/img/pamjaya-logo.png'); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
    <!-- penambahan assets bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/main.css">
    <link rel="stylesheet" type='text/javascript' href="<?php echo base_url(); ?>assets/js/script.js">
    <link rel="stylesheet" type='text/javascript' href="<?php echo base_url(); ?>assets/css/responsive.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

</head>

<body>

    <div class="container">
        <nav class="menu">
            <div class="menu-toggle">
                <input type="checkbox" />
                <span></span>
                <span></span>
                <span></span>
            </div>

            <div class="brand">
                <a class="icon" href="<?= base_url(); ?>home">
                    <img class="nav-logo" alt="logo" src="<?= base_url('assets/img/pamjaya-logo.png'); ?>">
                </a>
                <h2 class="judul"> PORTAL PAM JAYA</h2>
            </div>
            <ul class="menu-list right">
                <li><a class="menu-item" href="<?= base_url(); ?>home">Home</a></li>
                <li><a class="menu-item" href="<?= base_url(); ?>berita"> Berita</a></li>
                <li><a class="menu-item" href="<?= base_url(); ?>contact">Contact</a></li>
                <li><a class="menu-item" target="_blank" href="http://pamjaya.co.id/">Website</a></li>
                <!-- <li>
                    <a class="menu-item" href="<?= base_url('login'); ?>" data-toggle="tooltip" data-placement="bottom" title="admin">
                        <i class="fas fa-user-circle fa-lg"></i>
                    </a>
                </li> -->
            </ul>
        </nav>
    </div>