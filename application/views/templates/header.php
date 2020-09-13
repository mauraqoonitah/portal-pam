<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <link rel="shortcut icon" href="<?= base_url('assets/img/pamjaya-logo.png'); ?>">
    <link rel="apple-touch-icon" href="<?= base_url('assets/img/pamjaya-logo.png'); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/main.css">
    <link rel="stylesheet" type='text/javascript' href="<?php echo base_url(); ?>assets/js/script.js">
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
                <a href="<?= base_url(); ?>home">
                    <h1> PORTAL PAM JAYA</h1>
                </a>

            </div>
            <ul class="menu-list">
                <li><a href="<?= base_url(); ?>Home">Home</a></li>
                <li><a href="http://portal.pamjaya.co.id/">Website</a></li>
                <li><a href="<?= base_url(); ?>Berita">Berita</a></li>
                <li><a href="<?= base_url(); ?>Contact">Contact</a></li>
            </ul>
        </nav>