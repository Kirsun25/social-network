<?php
/**
 * Created by PhpStorm.
 * User: max
 * Date: 23.04.18
 * Time: 21:22
 */
    foreach ($latestMessagesDates as $dialogs){ ?>
        <div class="mess"><a href=messages?d="<?=$dialogs['dialog_id']?>"><?=$dialogs['message']?></a></div>

<?php } ?>
