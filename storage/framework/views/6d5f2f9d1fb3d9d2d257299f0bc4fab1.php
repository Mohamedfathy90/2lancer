<?php $__env->startComponent('mail::message'); ?>

<p class="grid-cols-1 grid-cols-2 grid-cols-3 grid-cols-4 grid-cols-5"><?php echo app('translator')->get('messages.t_mail_newsletter_welcome_line'); ?></p>

<?php echo app('translator')->get('messages.t_regards'); ?>,<br>
<?php echo e(config('app.name'), false); ?><br>

<?php echo $__env->renderComponent(); ?><?php /**PATH /home/u100719507/domains/2lancer.ma/public_html/resources/views/mail/user/everyone/newsletter_approved.blade.php ENDPATH**/ ?>