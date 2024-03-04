<div class="favorite-list-item">
    <div data-contact="<?php echo e(strtolower($user->uid), false); ?>" data-contact-id="<?php echo e($user->id, false); ?>" data-action="0" class="avatar av-m" style="background-image: url('<?php echo e(src($user->avatar), false); ?>');">
    </div>
    <p><?php echo e(strlen($user->username) > 5 ? substr($user->username,0,6).'..' : $user->username, false); ?></p>
</div>
<?php /**PATH /home/u100719507/domains/2lancer.ma/public_html/resources/views/vendor/Chatify/layouts/favorite.blade.php ENDPATH**/ ?>