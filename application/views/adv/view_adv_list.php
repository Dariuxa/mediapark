<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container">
    <?php if(isset($ads_list) && !empty($ads_list)): ?>
        <div class="row"><?php
            foreach($ads_list as $ad): ?>

            <div class="col-sm-12 list-container">
                <h2><?=$ad['title']?></h2>
                <p><?=nl2br($ad['description'])?></p>
                <p><small>Created: <?=$ad['created']?></small></p>
                <p><small>Author: <?=$ad['name']?></small></p>
            </div><?php   endforeach; ?>

        </div><?php
        if(isset($pagination)): ?>

            <div class="row">
                <div class="col-md-12 text-center"><?=$pagination; ?></div>
            </div>
        <?php endif; ?>
    <?php else: ?>
        <div class="alert alert-danger col-md-12 text-center">
            No advertisements...
        </div>
    <?php endif; ?>
</div>