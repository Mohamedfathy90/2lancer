<image:image>
<?php if(! empty($image->url)): ?>
    <image:loc><?php echo e(url($image->url), false); ?></image:loc>
<?php endif; ?>
<?php if(! empty($image->caption)): ?>
    <image:caption><?php echo e($image->caption, false); ?></image:caption>
<?php endif; ?>
<?php if(! empty($image->geo_location)): ?>
    <image:geo_location><?php echo e($image->geo_location, false); ?></image:geo_location>
<?php endif; ?>
<?php if(! empty($image->title)): ?>
    <image:title><?php echo e($image->title, false); ?></image:title>
<?php endif; ?>
<?php if(! empty($image->license)): ?>
    <image:license><?php echo e($image->license, false); ?></image:license>
<?php endif; ?>
</image:image>
<?php /**PATH /home/u100719507/domains/2lancer.ma/public_html/vendor/spatie/laravel-sitemap/resources/views/image.blade.php ENDPATH**/ ?>