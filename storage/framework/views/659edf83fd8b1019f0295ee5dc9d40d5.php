<sitemap>
    <?php if(! empty($tag->url)): ?>
    <loc><?php echo e(url($tag->url), false); ?></loc>
    <?php endif; ?>
    <?php if(! empty($tag->lastModificationDate)): ?>
    <lastmod><?php echo e($tag->lastModificationDate->format(DateTime::ATOM), false); ?></lastmod>
    <?php endif; ?>
</sitemap>
<?php /**PATH /home/u100719507/domains/2lancer.ma/public_html/vendor/spatie/laravel-sitemap/resources/views/sitemapIndex/sitemap.blade.php ENDPATH**/ ?>