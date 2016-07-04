<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$title = array(
    'name'		=>		'title',
    'id' 		=> 		'title',
    'value'		=>		set_value('title'),
    'class'     =>      'form-control',
    'autocomplete'=>	'off',
    'required'  =>      ''
);
$description = array(
    'name'		=>		'description',
    'id' 		=> 		'description',
    'value'		=>		set_value('description'),
    'class'     =>      'form-control',
    'autocomplete'=>	'off',
    'required'  =>      ''
);
$create_adv = array(
    'name'      =>      'create_adv',
    'class'     =>      'btn btn-primary pull-right',
    'value'     =>      'Post advertisement'
);
?>
<div class="container">
    <div class="row">
        <legend><h2>Post new advertisement</h2></legend>
        <?=form_open('','class="create_advertisement"')?>
        <div class="col-sm-5">
            <div class="form-group<?=form_error('title') != null?' has-error':''?>">
                <label for="title">Title</label>
                <?=form_error('title')?>
                <?=form_input($title)?>
            </div>

            <div class="form-group<?=form_error('description') != null?' has-error':''?>">
                <label for="description">Description</label>
                <?=form_error('description')?>
                <?=form_textarea($description)?>
            </div>
            <?=form_submit($create_adv)?>
            <?=form_close()?>
        </div>
        <br class="clear">
    </div>
</div>