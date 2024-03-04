<video:video>
    <video:thumbnail_loc><?php echo e($video->thumbnailLoc, false); ?></video:thumbnail_loc>
    <video:title><?php echo e($video->title, false); ?></video:title>
    <video:description><?php echo e($video->description, false); ?></video:description>
<?php if($video->contentLoc): ?>
    <video:content_loc><?php echo e($video->contentLoc, false); ?></video:content_loc>
<?php endif; ?>
<?php if($video->playerLoc): ?>
    <video:player_loc><?php echo e($video->playerLoc, false); ?></video:player_loc>
<?php endif; ?>
<?php $__currentLoopData = $video->options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <video:<?php echo e($tag, false); ?>><?php echo e($value, false); ?></video:<?php echo e($tag, false); ?>>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__currentLoopData = $video->allow; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <video:<?php echo e($tag, false); ?> relationship="allow"><?php echo e($value, false); ?></video:<?php echo e($tag, false); ?>>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__currentLoopData = $video->deny; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <video:<?php echo e($tag, false); ?> relationship="deny"><?php echo e($value, false); ?></video:<?php echo e($tag, false); ?>>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</video:video>
<?php /**PATH /home/u100719507/domains/2lancer.ma/public_html/vendor/spatie/laravel-sitemap/resources/views/video.blade.php ENDPATH**/ ?>