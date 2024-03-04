<div class="<?php echo e($cardClasses, false); ?>">
    <?php if($header): ?>
        <?php echo e($header, false); ?>

    <?php elseif($title || $action): ?>
        <div class="<?php echo e($headerClasses, false); ?>">
            <h3 class="font-medium whitespace-normal text-md text-secondary-700 dark:text-secondary-400"><?php echo e($title, false); ?></h3>

            <?php if($action): ?>
                <?php echo e($action, false); ?>

            <?php endif; ?>
        </div>
    <?php endif; ?>

    <div <?php echo e($attributes->merge(['class' => "{$padding} text-secondary-700 rounded-b-xl grow dark:text-secondary-400"]), false); ?>>
        <?php echo e($slot, false); ?>

    </div>

    <?php if($footer): ?>
        <div class="<?php echo e($footerClasses, false); ?>">
            <?php echo e($footer, false); ?>

        </div>
    <?php endif; ?>
</div>
<?php /**PATH /home/u100719507/domains/2lancer.ma/public_html/vendor/wireui/wireui/resources/views/components/card.blade.php ENDPATH**/ ?>