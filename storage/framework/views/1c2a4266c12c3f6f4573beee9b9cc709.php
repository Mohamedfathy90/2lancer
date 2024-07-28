
<?php if($get == 'saved'): ?>
    <table class="messenger-list-item" data-contact="<?php echo e(Auth::user()->id, false); ?>">
        <tr data-action="0">
            
            <td>
            <div class="saved-messages avatar av-m">
                <span class="far fa-bookmark"></span>
            </div>
            </td>
            
            <td>
                <p data-id="<?php echo e(Auth::user()->id, false); ?>" data-type="user">Saved Messages <span>You</span></p>
                <span>Save messages secretly</span>
            </td>
        </tr>
    </table>
<?php endif; ?>


<?php if($get == 'users' && !!$lastMessage): ?>
<?php
$lastMessageBody = mb_convert_encoding($lastMessage->body, 'UTF-8', 'UTF-8');
$lastMessageBody = strlen($lastMessageBody) > 30 ? mb_substr($lastMessageBody, 0, 30, 'UTF-8').'..' : $lastMessageBody;
?>
<table class="messenger-list-item" data-contact="<?php echo e($user->id, false); ?>">
    <tr data-action="0">
        
        <td style="position: relative">
            <?php if($user->active_status): ?>
                <span class="activeStatus"></span>
            <?php endif; ?>
        <div class="avatar av-m"
        style="background-image: url('<?php echo e($user->avatar, false); ?>');">
        </div>
        </td>
        
        <td>
        <p data-id="<?php echo e($user->id, false); ?>" data-type="user">
            <?php echo e(strlen($user->name) > 12 ? trim(substr($user->name,0,12)).'..' : $user->name, false); ?>

            <span class="contact-item-time" data-time="<?php echo e($lastMessage->created_at, false); ?>"><?php echo e($lastMessage->timeAgo, false); ?></span></p>
        <span>
            
            <?php echo $lastMessage->from_id == Auth::user()->id
                ? '<span class="lastMessageIndicator">You :</span>'
                : ''; ?>

            
            <?php if($lastMessage->attachment == null): ?>
            <?php echo $lastMessageBody; ?>

            <?php else: ?>
            <span class="fas fa-file"></span> Attachment
            <?php endif; ?>
        </span>
        
            <?php echo $unseenCounter > 0 ? "<b>".$unseenCounter."</b>" : ''; ?>

        </td>
    </tr>
</table>
<?php endif; ?>


<?php if($get == 'search_item'): ?>
<table class="messenger-list-item" data-contact="<?php echo e($user->id, false); ?>">
    <tr data-action="0">
        
        <td>
        <div class="avatar av-m"
        style="background-image: url('<?php echo e($user->avatar, false); ?>');">
        </div>
        </td>
        
        <td>
            <p data-id="<?php echo e($user->id, false); ?>" data-type="user">
            <?php echo e(strlen($user->name) > 12 ? trim(substr($user->name,0,12)).'..' : $user->name, false); ?>

        </td>

    </tr>
</table>
<?php endif; ?>


<?php if($get == 'sharedPhoto'): ?>
<div class="shared-photo chat-image" style="background-image: url('<?php echo e($image, false); ?>')"></div>
<?php endif; ?>


<?php /**PATH /home/u100719507/domains/2lancer.ma/public_html/vendor/munafio/chatify/src/views/layouts/listItem.blade.php ENDPATH**/ ?>