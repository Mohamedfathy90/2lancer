<url>
    <?php if(! empty($tag->url)): ?>
    <loc><?php echo e(url($tag->url), false); ?></loc>
    <?php endif; ?>
<?php if(count($tag->alternates)): ?>
<?php $__currentLoopData = $tag->alternates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $alternate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <xhtml:link rel="alternate" hreflang="<?php echo e($alternate->locale, false); ?>" href="<?php echo e(url($alternate->url), false); ?>" />
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<?php if(! empty($tag->lastModificationDate)): ?>
    <lastmod><?php echo e($tag->lastModificationDate->format(DateTime::ATOM), false); ?></lastmod>
<?php endif; ?>
    <?php if(! empty($tag->changeFrequency)): ?>
    <changefreq><?php echo e($tag->changeFrequency, false); ?></changefreq>
    <?php endif; ?>
<?php if(! empty($tag->priority)): ?>
    <priority><?php echo e(number_format($tag->priority,1), false); ?></priority>
    <?php endif; ?>
    <?php echo $__env->renderEach('sitemap::image', $tag->images, 'image'); ?>
    <?php echo $__env->renderEach('sitemap::video', $tag->videos, 'video'); ?>
</url>
<?php /**PATH C:\xampp\htdocs\2lancer\vendor\spatie\laravel-sitemap\src\/../resources/views/url.blade.php ENDPATH**/ ?>