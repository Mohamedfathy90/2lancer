<div <?php echo e($attributes->class($avatarClasses), false); ?>>
    <?php if($label): ?>
        <span class="font-medium text-white dark:text-gray-200">
            <?php echo e($label, false); ?>

        </span>
    <?php endif; ?>

    <?php if($src): ?>
        <img class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                'shrink-0 object-cover object-center',
                'rounded-sm'   =>  $squared,
                'rounded-full' => !$squared,
                $size,
            ]); ?>"
            src="<?php echo e($src, false); ?>"
        />
    <?php endif; ?>

    <?php if(!$src && !$label): ?>
        <svg
            class="shrink-0 text-gray-300 bg-gray-100 dark:bg-gray-600"
            fill="currentColor"
            viewBox="0 0 24 24">
            <path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
        </svg>
    <?php endif; ?>
</div>
<?php /**PATH /home/u100719507/domains/2lancer.ma/public_html/resources/views/vendor/wireui/components/avatar.blade.php ENDPATH**/ ?>