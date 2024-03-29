<div class="max-w-5xl mx-auto">

    
    <nav class="flex mt-6" aria-label="Breadcrumb">
        <ol role="list" class="flex items-center space-x-4">

            
            <li>
                <div>
                    <a href="<?php echo e(url('/'), false); ?>" class="text-gray-400 dark:text-gray-200 hover:text-gray-500 dark:hover:text-gray-100">
                        <svg class="flex-shrink-0 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"/> </svg>
                    </a>
                </div>
            </li>

            
            <li>
                <div class="flex items-center">                    
                    <svg class="flex-shrink-0 h-5 w-5 text-gray-300 dark:text-gray-200" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true"> <path d="M5.555 17.776l8-16 .894.448-8 16-.894-.448z"/> </svg>
                    <a href="<?php echo e(url('blog'), false); ?>" class="ltr:ml-4 rtl:mr-4 text-sm font-medium text-gray-500 hover:text-gray-700 dark:text-gray-200 dark:hover:text-gray-100"><?php echo e(__('messages.t_blog'), false); ?></a>
                </div>
            </li>

            <li>
                <div class="flex items-center">
                    <svg class="flex-shrink-0 h-5 w-5 text-gray-300 dark:text-gray-200" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                        <path d="M5.555 17.776l8-16 .894.448-8 16-.894-.448z" />
                    </svg>
                    <span class="ltr:ml-4 rtl:mr-4 text-sm font-medium text-gray-500 hover:text-gray-700 dark:text-gray-200 dark:hover:text-gray-100" aria-current="page">
                        <?php echo e($article->title, false); ?>

                    </span>
                </div>
            </li>
        </ol>
    </nav>

    
    <div class="relative py-16 mt-6 bg-white dark:bg-zinc-800 overflow-hidden rounded-lg shadow">

        
        <div class="hidden lg:block lg:absolute lg:inset-y-0 lg:h-full lg:w-full">
            <div class="relative h-full text-lg max-w-prose mx-auto" aria-hidden="true">
                <svg class="absolute top-12 left-full transform translate-x-32" width="404" height="384" fill="none" viewBox="0 0 404 384">
                    <defs>
                        <pattern id="74b3fd99-0a6f-4271-bef2-e80eeafdf357" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                            <rect x="0" y="0" width="4" height="4" class="text-gray-200 dark:text-zinc-700" fill="currentColor" />
                        </pattern>
                    </defs>
                    <rect width="404" height="384" fill="url(#74b3fd99-0a6f-4271-bef2-e80eeafdf357)" />
                </svg>
                <svg class="absolute top-1/2 right-full transform -translate-y-1/2 -translate-x-32" width="404" height="384" fill="none" viewBox="0 0 404 384">
                    <defs>
                        <pattern id="f210dbf6-a58d-4871-961e-36d5016a0f49" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                            <rect x="0" y="0" width="4" height="4" class="text-gray-200 dark:text-zinc-700" fill="currentColor" />
                        </pattern>
                    </defs>
                    <rect width="404" height="384" fill="url(#f210dbf6-a58d-4871-961e-36d5016a0f49)" />
                </svg>
                <svg class="absolute bottom-12 left-full transform translate-x-32" width="404" height="384" fill="none" viewBox="0 0 404 384">
                    <defs>
                        <pattern id="d3eb07ae-5182-43e6-857d-35c643af9034" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                            <rect x="0" y="0" width="4" height="4" class="text-gray-200 dark:text-zinc-700" fill="currentColor" />
                        </pattern>
                    </defs>
                    <rect width="404" height="384" fill="url(#d3eb07ae-5182-43e6-857d-35c643af9034)" />
                </svg>
            </div>
        </div>

        
        <div class="relative px-4 sm:px-6 lg:px-8 ql-snow">
            <div class="text-lg max-w-prose mx-auto ql-editor">

                
                <h1 class="mb-6">
                    <span class="block text-xs text-center text-primary-600 font-semibold tracking-wide uppercase"><?php echo e(__('messages.t_x_min_read', ['x' => $article->reading_time]), false); ?></span>
                    <span class="mt-2 block text-xl text-center leading-8 font-extrabold tracking-tight text-gray-900 dark:text-gray-100 sm:text-2xl"><?php echo e($article->title, false); ?></span>
                </h1>

                
                <figure>
                    <img class="w-full rounded-lg lazy" src="<?php echo e(placeholder_img(), false); ?>" data-src="<?php echo e(src($article->image), false); ?>" alt="<?php echo e($article->title, false); ?>">
                </figure>

                
                <div class="mt-8 dark:text-gray-400 quill-container text-base">
                    <?php echo $article->content; ?>

                </div>

                
                <span class="text-center font-medium text-gray-800 dark:text-gray-300 text-sm mb-4 mt-24 flex items-center justify-center"><?php echo e(__('messages.t_share'), false); ?></span>
                <div class="flex items-center justify-center pb-6">

                    
                    <a href="https://www.facebook.com/sharer.php?t=<?php echo e($article->title, false); ?>&u=<?php echo e(url('blog', $article->slug), false); ?>" target="_blank" data-tooltip-target="project-share-facebook" class="text-white bg-[#4267B2] hover:bg-[#4267B2]/80 focus:ring-0 focus:outline-none rounded-full flex items-center justify-center h-12 w-12 mr-2">
                        <i class="si si-facebook text-xl"></i>
                    </a>
                    <div id="project-share-facebook" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs font-medium text-white bg-gray-900 rounded-sm shadow-sm opacity-0 tooltip">
                        <?php echo e(__('messages.t_share_on_facebook'), false); ?>

                    </div>

                    
                    <a href="https://twitter.com/intent/tweet?text=<?php echo e($article->title, false); ?>&url=<?php echo e(url('blog', $article->slug), false); ?>" target="_blank" data-tooltip-target="project-share-twitter" class="text-white bg-[#00acee] hover:bg-[#00acee]/80 focus:ring-0 focus:outline-none rounded-full flex items-center justify-center h-12 w-12 mr-2">
                        <i class="si si-twitter text-xl"></i>
                    </a>
                    <div id="project-share-twitter" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs font-medium text-white bg-gray-900 rounded-sm shadow-sm opacity-0 tooltip">
                        <?php echo e(__('messages.t_share_on_twitter'), false); ?>

                    </div>

                    
                    <a href="https://www.linkedin.com/shareArticle?title=<?php echo e($article->title, false); ?>&url=<?php echo e(url('blog', $article->slug), false); ?>" target="_blank" data-tooltip-target="project-share-linkedin" class="text-white bg-[#0072b1] hover:bg-[#0072b1]/80 focus:ring-0 focus:outline-none rounded-full flex items-center justify-center h-12 w-12 mr-2">
                        <i class="si si-linkedin text-xl"></i>
                    </a>
                    <div id="project-share-linkedin" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs font-medium text-white bg-gray-900 rounded-sm shadow-sm opacity-0 tooltip">
                        <?php echo e(__('messages.t_share_on_linkedin'), false); ?>

                    </div>

                    
                    <a href="https://snapchat.com/scan?attachmentUrl=<?php echo e(url('blog', $article->slug), false); ?>" target="_blank" data-tooltip-target="project-share-snapchat" class="text-gray-700 bg-[#FFFC00] hover:bg-[#FFFC00]/80 focus:ring-0 focus:outline-none rounded-full flex items-center justify-center h-12 w-12 mr-2">
                        <i class="si si-snapchat text-xl"></i>
                    </a>
                    <div id="project-share-snapchat" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs font-medium text-white bg-gray-900 rounded-sm shadow-sm opacity-0 tooltip">
                        <?php echo e(__('messages.t_share_on_snapchat'), false); ?>

                    </div>

                    
                    <a href="https://www.pinterest.com/pin/create/button/?description=<?php echo e($article->title, false); ?>&media=&url=<?php echo e(url('blog', $article->slug), false); ?>" target="_blank" data-tooltip-target="project-share-pinterest" class="text-white bg-[#E60023] hover:bg-[#E60023]/80 focus:ring-0 focus:outline-none rounded-full flex items-center justify-center h-12 w-12 mr-2">
                        <i class="si si-pinterest text-xl"></i>
                    </a>
                    <div id="project-share-pinterest" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs font-medium text-white bg-gray-900 rounded-sm shadow-sm opacity-0 tooltip">
                        <?php echo e(__('messages.t_share_on_pinterest'), false); ?>

                    </div>

                    
                    <a href="https://web.whatsapp.com/send?text=<?php echo e(url('blog', $article->slug), false); ?>" target="_blank" data-tooltip-target="project-share-whatsapp" class="text-white bg-[#25D366] hover:bg-[#25D366]/80 focus:ring-0 focus:outline-none rounded-full flex items-center justify-center h-12 w-12 mr-2">
                        <i class="si si-whatsapp text-xl"></i>
                    </a>
                    <div id="project-share-whatsapp" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs font-medium text-white bg-gray-900 rounded-sm shadow-sm opacity-0 tooltip">
                        <?php echo e(__('messages.t_share_on_whatsapp'), false); ?>

                    </div>

                </div>

            </div>
        </div>

    </div>

    
    <?php if(settings('blog')->enable_comments): ?>
        <div class="bg-white dark:bg-zinc-800 shadow rounded-lg sm:overflow-hidden mt-10">
            <div class="divide-y divide-gray-200 dark:divide-zinc-700">
                <div class="px-4 py-5 sm:px-6">
                    <h2 class="text-base font-bold tracking-wide text-gray-900 dark:text-gray-100"><?php echo e(__('messages.t_comments'), false); ?></h2>
                </div>
                <div class="px-4 py-6 sm:px-6">
                    <ul role="list" class="space-y-8">

                        <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li>
                                <div class="flex space-x-3">
                                    <div class="flex-shrink-0">
                                        <span class="inline-flex items-center justify-center h-10 w-10 rounded-full bg-gray-500 dark:bg-zinc-700">
                                            <span class="font-medium leading-none text-white">
                                                <?php echo e(mb_substr($cm->name, 0, 1), false); ?>

                                            </span>
                                        </span>
                                    </div>
                                    <div>
                                        <div class="text-sm">
                                            <span class="font-bold text-gray-900 dark:text-gray-100"><?php echo e($cm->name, false); ?></span>
                                        </div>
                                        <div class="mt-1 text-sm text-gray-700 dark:text-gray-300">
                                            <p>
                                                <?php echo e($cm->comment, false); ?>

                                            </p>
                                        </div>
                                        <div class="mt-2 text-xs">
                                            <span class="text-gray-400 font-medium"><?php echo e(format_date($cm->created_at, 'ago'), false); ?></span>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </ul>

                    
                    <?php if($comments->hasPages()): ?>
                        <div class="bg-gray-100 dark:bg-zinc-800 px-4 py-5 sm:px-6 rounded-bl-lg rounded-br-lg flex justify-center border-t-0 border-r border-l border-b">
                            <?php echo $comments->links('pagination::tailwind'); ?>

                        </div>
                    <?php endif; ?>

                </div>
            </div>

            
            <div class="border-t-2 border-gray-100 bg-gray-50 dark:bg-zinc-800 dark:border-zinc-700 px-4 py-6 sm:px-6 mt-10">
                <div class="flex">
                    <div class="min-w-0 flex-1">
                        <form wire:submit.prevent="addComment">
                            <div class="grid grid-cols-12 sm:gap-x-5 gap-y-6">

                                
                                <div class="col-span-12 md:col-span-6">
                                    <?php if (isset($component)) { $__componentOriginal0241d3f51813223308810020791c4a83 = $component; } ?>
<?php $component = App\View\Components\Forms\TextInput::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.text-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\TextInput::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_fullname')),'placeholder' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_enter_fullname')),'model' => 'name','icon' => 'account']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0241d3f51813223308810020791c4a83)): ?>
<?php $component = $__componentOriginal0241d3f51813223308810020791c4a83; ?>
<?php unset($__componentOriginal0241d3f51813223308810020791c4a83); ?>
<?php endif; ?>
                                </div>

                                
                                <div class="col-span-12 md:col-span-6">
                                    <?php if (isset($component)) { $__componentOriginal0241d3f51813223308810020791c4a83 = $component; } ?>
<?php $component = App\View\Components\Forms\TextInput::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.text-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\TextInput::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_email_address')),'placeholder' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_enter_email_address')),'model' => 'email','type' => 'email','icon' => 'at']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0241d3f51813223308810020791c4a83)): ?>
<?php $component = $__componentOriginal0241d3f51813223308810020791c4a83; ?>
<?php unset($__componentOriginal0241d3f51813223308810020791c4a83); ?>
<?php endif; ?>
                                </div>

                                
                                <div class="col-span-12">
                                    <?php if (isset($component)) { $__componentOriginal2f60389a9e230471cd863683376c182f = $component; } ?>
<?php $component = App\View\Components\Forms\Textarea::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.textarea'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Textarea::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_comment')),'placeholder' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_enter_ur_comment')),'model' => 'comment','rows' => '6','icon' => 'message']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2f60389a9e230471cd863683376c182f)): ?>
<?php $component = $__componentOriginal2f60389a9e230471cd863683376c182f; ?>
<?php unset($__componentOriginal2f60389a9e230471cd863683376c182f); ?>
<?php endif; ?>
                                </div>

                            </div>
                            
                            <div class="mt-6 flex items-center justify-between">
                                <p class="text-xs leading-5 text-gray-500 dark:text-gray-300">
                                    <?php echo __('messages.t_by_add_comment_agree_terms_privacy', [
                                        'privacy_link' => settings('footer')->privacy ? url('page', settings('footer')->privacy->slug) : "#",
                                        'privacy_text' => settings('footer')->privacy ? settings('footer')->privacy->title : __('messages.t_privacy_policy'),
                                        'terms_link'   => settings('footer')->terms ? url('page', settings('footer')->terms->slug) : "#",
                                        'terms_text'   => settings('footer')->terms ? settings('footer')->terms->title : __('messages.t_terms_of_service'),
                                    ]); ?>

                                </p>
                                
                                
                                <button 
                                    wire:loading.class="bg-gray-200 hover:bg-gray-300 text-gray-500 dark:bg-zinc-600 dark:text-zinc-400 cursor-not-allowed "
                                    wire:loading.class.remove="bg-primary-600 hover:bg-primary-700 text-white cursor-pointer"
                                    wire:loading.attr="disabled"
                                    class="text-xs font-medium flex justify-center bg-primary-600 hover:bg-primary-600 text-white py-4 px-8 rounded tracking-wide focus:outline-none focus:shadow-outline cursor-pointer"
                                    style="max-height:48px">

                                    
                                    <div wire:loading wire:target="addComment">
                                        <svg role="status" class="inline w-4 h-4 text-gray-700 animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>
                                            <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>
                                        </svg>
                                    </div>

                                    
                                    <div wire:loading.remove wire:target="addComment">
                                        <?php echo e(__('messages.t_add_comment'), false); ?>

                                    </div>
                                </button>

                            </div>

                        </form>
                    </div>
                </div>
            </div>

        </div>
    <?php endif; ?>

</div>

<?php $__env->startPush('styles'); ?>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simple-icons-font@v5/font/simple-icons.min.css" type="text/css">
<?php $__env->stopPush(); ?><?php /**PATH /home/u100719507/domains/2lancer.ma/public_html/resources/views/livewire/main/blog/article.blade.php ENDPATH**/ ?>