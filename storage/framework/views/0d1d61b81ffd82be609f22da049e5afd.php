<!DOCTYPE html>
<html dir="ltr">
    
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="<?php echo e(csrf_token(), false); ?>">

        
        <?php echo SEO::generate(); ?>


        
        <link rel="icon" type="image/png" href=""/>

        
        <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font@6.9.96/css/materialdesignicons.min.css">

        
        <?php echo \Livewire\Livewire::styles(); ?>


        
        <link rel="preload" href="<?php echo e(mix('css/app.css'), false); ?>" as="style">
        <link rel="stylesheet" href="<?php echo e(mix('css/app.css'), false); ?>">

        
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" type="text/css">

        
        <?php echo $__env->yieldPushContent('styles'); ?>

        <style>
            :root {
                --color-primary-h: <?php echo e(hex2hsl( '#4f46e5' )[0], false); ?>;
                --color-primary-s: <?php echo e(hex2hsl( '#4f46e5' )[1], false); ?>%;
                --color-primary-l: <?php echo e(hex2hsl( '#4f46e5' )[2], false); ?>%;
            }
            html {
                font-family: 'Heebo', sans-serif !important;
            }
        </style>

        
        <script>
            __var_app_url        = "<?php echo e(url('/'), false); ?>";
            __var_app_locale     = "<?php echo e(app()->getLocale(), false); ?>";
            __var_rtl            = <?php echo \Illuminate\Support\Js::from(config()->get('direction') === 'ltr' ? false : true)->toHtml() ?>;
            __var_primary_color  = "#4f46e5";
            __var_axios_base_url = "<?php echo e(url('/'), false); ?>/";
            __var_currency_code  = "USD";
        </script>

    </head>

    <body class="antialiased bg-[#fafafa] text-gray-600 min-h-full flex flex-col application application-ltr overflow-x-hidden">

        
        <?php if (isset($component)) { $__componentOriginal10717d162484e57a570d6d2cc4597545 = $component; } ?>
<?php $component = WireUi\View\Components\Notifications::resolve(['position' => 'top-center','zIndex' => 'z-[60]'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('notifications'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(WireUi\View\Components\Notifications::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal10717d162484e57a570d6d2cc4597545)): ?>
<?php $component = $__componentOriginal10717d162484e57a570d6d2cc4597545; ?>
<?php unset($__componentOriginal10717d162484e57a570d6d2cc4597545); ?>
<?php endif; ?>

        
        <main class="flex-grow">
            <div class="container !max-w-full py-12 px-10 lg:px-24 pt-16 pb-24 space-y-8 min-h-screen">
                <?php echo $__env->yieldContent('content'); ?>
            </div>
        </main>

        
        <?php echo \Livewire\Livewire::scripts(); ?>


        
        <script >window.Wireui = {hook(hook, callback) {window.addEventListener(`wireui:${hook}`, () => callback())},dispatchHook(hook) {window.dispatchEvent(new Event(`wireui:${hook}`))}}</script>
<script src="https://2lancer.ma/wireui/assets/scripts?id=3c15fb3b36f54e2baae1e97b6eb0015e" defer ></script>

        
        <script defer src="<?php echo e(mix('js/app.js'), false); ?>"></script>

        
        <script defer src="<?php echo e(url('public/js/utils.js'), false); ?>"></script>

        
        <?php echo $__env->yieldPushContent('scripts'); ?>

    </body>

</html><?php /**PATH /home/u100719507/domains/2lancer.ma/public_html/resources/views/livewire/installation/layout.blade.php ENDPATH**/ ?>