<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
<head>
    <base href="http://127.0.0.1/mediapark/"/>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link href="public/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="public/css/custom.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<nav class="navbar navbar navbar-static-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="">Advertiser</a>
        </div>
        <div class="collapse navbar-collapse" id="navigation"><?php
            if($this->session->userdata('logged_in')){?>

            <ul class="nav navbar-nav">
                <li<?=$this->uri->segment(2) == 'new'?' class="active"':''?>>
                    <a href="<?='new'?>">
                        <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>
                        Post new advertisement
                    </a>
                </li>
                <li<?=$this->uri->segment(2) == 'my-advertisements'?' class="active"':''?>>
                    <a href="<?='my-advertisements'?>">
                        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                        My advertisements
                    </a>
                </li>
            </ul><?php
            } ?>

            <ul class="nav navbar-nav navbar-right"><?php
                if($this->session->userdata('logged_in')): ?>

                <li>
                <a href="<?='logout'?>">
                    <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                    Logout
                    [<?=$this->session->userdata('email')?>]
                </a>
                </li><?php
                else: ?>

                <li<?=$this->uri->segment(2) == 'login'?' class="active"':''?>>
                    <a href="<?='login'?>">
                        <span class="glyphicon glyphicon-lock" aria-hidden="true"></span>
                        Log in
                    </a>
                </li>
                <li<?=$this->uri->segment(2) == 'register'?' class="active"':''?>>
                    <a href="<?='register'?>">
                        <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                        New user registration
                    </a>
                </li><?php
                endif; ?>

            </ul>
        </div>
    </div>
</nav>