<?php $__errorArgs = [$name];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
    <p <?php echo e($attributes->merge(['class' => 'mt-2 text-sm text-negative-600']), false); ?>>
        <?php echo e($message, false); ?>

    </p>
<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
<?php /**PATH /home/u100719507/domains/2lancer.ma/public_html/resources/views/vendor/wireui/components/error.blade.php ENDPATH**/ ?>