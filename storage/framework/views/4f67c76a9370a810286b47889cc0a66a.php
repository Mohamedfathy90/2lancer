<?php $__env->startComponent('mail::message'); ?>

<p><?php echo $msg; ?></p>
 
<?php echo app('translator')->get('messages.t_regards'); ?>,<br>
<?php echo e(config('app.name'), false); ?><br>
<?php echo $__env->renderComponent(); ?><?php /**PATH /home/u100719507/domains/2lancer.ma/public_html/resources/views/mail/admin/support/reply.blade.php ENDPATH**/ ?>