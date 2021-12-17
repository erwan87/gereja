<?php
defined('BASEPATH') or exit('No direct script access allowed');
;?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $titles ;?></title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?= base_url('assets');?>/plugins/fontawesome-free/css/all.min.css">
    <script src="<?= base_url('assets');?>/js/jquery-2.1.4.min.js"></script>
    <!-- plugin css for this page -->

    <link rel="stylesheet" href="<?=base_url('assets');?>/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css">

    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?= base_url('assets');?>/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">

    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url('assets');?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
        href="<?= base_url('assets');?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url('assets');?>/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

    <!-- Summernote CSS-->
    <link href="<?= base_url('assets'); ?>/plugins/summernote-master/summernote.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('assets');?>/css/adminlte.min.css">
</head>

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">