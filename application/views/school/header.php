<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>School</title>
    <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <style>
    .tbhead{
        color: white;
        background-color: black;
    }
    .bg-dark {
      background-color: #343a40;
      color: white; /* Optional: to make the text color white for better readability */
    }
    .image_style{
      height: 20px; 
      width: 20px;
      cursor: pointer;
    }
    .header_image_style{
      height: 40px; 
      width: 40px;
      cursor: pointer;
    }
    .thumnbnail{
      height: 100px; 
      width: 100px;
    }
    .btn-black {
      color: #fff;
      background-color: #000000;
      border-color: #000000;
    }
  </style>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <input type="hidden" name="base_url" id="base_url" value="<?php echo site_url(); ?>">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?php echo site_url('School/index'); ?>">School</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link" aria-current="page" href="<?php echo site_url('School/index'); ?>" title="Add Student">Students</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" aria-current="page" href="<?php echo site_url('School/classes'); ?>" title="Add Class">Classes</a>
                </li>
            </ul>
            </div>
        </div>
    </nav>