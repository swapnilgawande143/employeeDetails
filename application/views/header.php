<!DOCTYPE html>
<html lang="en">
    <head>
        <title> Employee Details</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="<?php echo base_url(); ?>/resources/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>/resources/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>/resources/css/datatables.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>/resources/css/sweetalert.css">
    </head>
    <body>

        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#CIMSNavBar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo base_url(); ?>">Home</a>
                </div>
                <div class="collapse navbar-collapse" id="CIMSNavBar">
                    <ul class="nav navbar-nav">
                        <li id="addEmployee"><a href="<?php echo site_url('Main_Controller/addEmployee'); ?>"> Add Employee </button></a></li>
                        <li id="viewEmployee"><a href="<?php echo site_url('Main_Controller/index'); ?>">View Employee</a></li>

                    </ul>

                </div>
            </div>
        </nav>



