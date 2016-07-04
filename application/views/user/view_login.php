<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
?>
<div class="container">
    <?=form_open()?>
    <legend>Login</legend>
    <div class="col-sm-4">
        <div class="form-group<?=form_error('email') != null?' has-error':''?>">
            <label for="email">Email</label>
            <?=form_error('email') != null?form_error('email'):''?>
            <?=form_input($email)?>
        </div>
        <div class="form-group<?=form_error('password') != null?' has-error':''?>">
            <label for="password">Password</label>
            <?=form_error('password') != null?form_error('password'):''?>
            <?=form_input($password)?>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary btn-block" name="login" value="Login"/>
        </div>
    </div>
    <?=form_close()?>
</div>
