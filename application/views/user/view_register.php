<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$name = array(
    'type'      =>      'text',
    'class'     =>      'form-control',
    'name'		=>		'name',
    'id' 		=> 		'name',
    'value'		=>		set_value('name'),
    'autocomplete'=>	'off',
    'required'  =>      ''
);
$email = array(
    'type'      =>      'email',
    'class'     =>      'form-control',
    'name'		=>		'email',
    'id' 		=> 		'email',
    'value'		=>		set_value('email'),
    'autocomplete'=>	'off',
    'required'  =>      ''
);
$password = array(
    'type'      =>      'password',
    'class'     =>      'form-control',
    'name'		=>		'password',
    'id' 		=> 		'password',
    'required'  =>      ''
);
$password_conf = array(
    'type'      =>      'password',
    'class'     =>      'form-control',
    'name'		=>		'password_conf',
    'id' 		=> 		'password_conf',
    'required'  =>      ''
);
$phone = array(
    'type'      =>      'text',
    'class'     =>      'form-control',
    'name'		=>		'phone',
    'id' 		=> 		'phone',
    'value'		=>		set_value('phone'),
    'autocomplete'=>	'off',
    'required'  =>      ''
);
?>
<div class="container">
    <div class="row">
        <?=form_open('')?>
        <legend>Registration</legend>
        <div class="col-sm-4">
            <div class="form-group<?=form_error('name') != null?' has-error':''?>">
                <label for="name">Name</label>
                <?=form_error('name')?>
                <?=form_input($name)?>
            </div>
            <div class="form-group<?=form_error('email') != null?' has-error':''?>">
                <label for="email">Email</label>
                <?=form_error('email')?>
                <?=form_input($email)?>
            </div>
            <div class="form-group<?=form_error('password') != null?' has-error':''?>">
                <label for="password">Password</label>
                <?=form_error('password')?>
                <?=form_input($password)?>
            </div>
            <div class="form-group<?=form_error('password_conf') != null?' has-error':''?>">
                <label for="password_conf">Confirm password</label>
                <?=form_error('password_conf')?>
                <?=form_input($password_conf)?>
            </div>
            <div class="form-group<?=form_error('phone') != null?' has-error':''?>">
                <label for="phone">Phone</label>
                <?=form_error('phone')?>
                <?=form_input($phone)?>
            </div>
            <input type="submit" name="submit" id="submit" value="Register" class="btn btn-primary pull-right">
        </div>
        <?=form_close()?>
    </div>
</div>
