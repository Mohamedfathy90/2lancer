<title><?php echo e(config('chatify.name'), false); ?></title>


<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="id" content="<?php echo e($id, false); ?>">
<meta name="messenger-color" content="<?php echo e($messengerColor, false); ?>">
<meta name="messenger-theme" content="<?php echo e($dark_mode, false); ?>">
<meta name="csrf-token" content="<?php echo e(csrf_token(), false); ?>">
<meta name="url" content="<?php echo e(url('').'/'.config('chatify.routes.prefix'), false); ?>" data-user="<?php echo e(Auth::user()->id, false); ?>">


<script
  src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="<?php echo e(asset('js/chatify/font.awesome.min.js'), false); ?>"></script>
<script src="<?php echo e(asset('js/chatify/autosize.js'), false); ?>"></script>
<script src="<?php echo e(asset('js/app.js'), false); ?>"></script>
<script src='https://unpkg.com/nprogress@0.2.0/nprogress.js'></script>


<link rel='stylesheet' href='https://unpkg.com/nprogress@0.2.0/nprogress.css'/>
<link href="<?php echo e(asset('css/chatify/style.css'), false); ?>" rel="stylesheet" />
<link href="<?php echo e(asset('css/chatify/'.$dark_mode.'.mode.css'), false); ?>" rel="stylesheet" />
<link href="<?php echo e(asset('css/app.css'), false); ?>" rel="stylesheet" />


<style>
    :root {
        --primary-color: <?php echo e($messengerColor, false); ?>;
    }
</style>
<?php /**PATH /home/u100719507/domains/2lancer.ma/public_html/vendor/munafio/chatify/src/views/layouts/headLinks.blade.php ENDPATH**/ ?>