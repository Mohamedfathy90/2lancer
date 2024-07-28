<div class="w-full">

    
    <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.forms.loading','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.loading'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>

    
    <div class="lg:grid lg:grid-cols-12">

        
        <aside class="lg:col-span-3 py-6 hidden lg:block bg-white shadow-sm border border-gray-200 rounded-lg dark:bg-zinc-800 dark:border-transparent" wire:ignore>
            <?php if (isset($component)) { $__componentOriginal897c321ee9b9bb967400e80c55835c23 = $component; } ?>
<?php $component = App\View\Components\Main\Account\Sidebar::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('main.account.sidebar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Main\Account\Sidebar::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal897c321ee9b9bb967400e80c55835c23)): ?>
<?php $component = $__componentOriginal897c321ee9b9bb967400e80c55835c23; ?>
<?php unset($__componentOriginal897c321ee9b9bb967400e80c55835c23); ?>
<?php endif; ?>
        </aside>

        
        <div class="lg:col-span-9 lg:ltr:ml-8 lg:rtl:mr-8">

            
            <div class="w-full mb-16">
                <div class="mx-auto max-w-7xl">
                    <div class="lg:flex lg:items-center lg:justify-between">
            
                        <div class="min-w-0 flex-1">
            
                            
                            <div class="mb-3 flex flex-col sm:flex-row sm:flex-wrap sm:space-x-6 rtl:space-x-reverse">
                                <ol class="inline-flex items-center mb-3 space-x-1 md:space-x-3 md:rtl:space-x-reverse sm:mb-0">

                                    
                                    <li>
                                        <div class="flex items-center">
                                            <a href="<?php echo e(url('/'), false); ?>" class="text-sm font-medium text-gray-700 hover:text-primary-600 dark:text-zinc-300 dark:hover:text-white">
                                                <?php echo app('translator')->get('messages.t_home'); ?>
                                            </a>
                                        </div>
                                    </li>
                    
                                    
                                    <li aria-current="page">
                                        <div class="flex items-center">
                                            <svg aria-hidden="true" class="w-4 h-4 text-gray-400 rtl:rotate-180" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                                            <span class="mx-1 text-sm font-medium text-gray-400 md:mx-2 dark:text-zinc-400">
                                                <?php echo app('translator')->get('messages.t_my_projects'); ?>
                                            </span>
                                        </div>
                                    </li>
                    
                                </ol>
                            </div>
            
                            
                            <h2 class="text-lg font-bold leading-7 text-zinc-700 dark:text-gray-50 sm:truncate sm:text-xl sm:tracking-tight">
                                <?php echo app('translator')->get('messages.t_milestone_payments'); ?>
                            </h2>

                            
                            <p class="leading-relaxed text-gray-400 mt-1 text-sm">
                                <?php echo app('translator')->get('messages.t_employer_milestone_payments_subtitle'); ?>
                            </p>
                            
                        </div>
            
                        
                        <div class="mt-5 flex justify-between lg:mt-0 lg:ltr::ml-4 lg:rtl:mr-4">

                            
                            <span class="block">
                                <a href="<?php echo e(url('project/' . $project->pid . '/' . $project->slug), false); ?>" target="_blank" class="inline-flex items-center px-4 py-2 border border-gray-300 dark:border-zinc-500 rounded-sm shadow-sm text-[13px] font-medium text-gray-700 dark:text-zinc-200 bg-white dark:bg-zinc-600 hover:bg-gray-50 dark:hover:bg-zinc-500 focus:outline-none focus:ring-primary-600">
                                    <svg class="h-5 w-5 text-gray-500 ltr:mr-2 rtl:ml-2 dark:text-zinc-200" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path fill="none" d="M0 0h24v24H0z"></path><path d="M19 19H5V5h7V3H5a2 2 0 00-2 2v14a2 2 0 002 2h14c1.1 0 2-.9 2-2v-7h-2v7zM14 3v2h3.59l-9.83 9.83 1.41 1.41L19 6.41V10h2V3h-7z"></path></svg>
                                    <?php echo e(__('messages.t_view_project'), false); ?>

                                </a>
                            </span>
                
                        </div>
            
                    </div>
                </div>
            </div>

            
            <div class="w-full">

                
                <div class="w-full mb-6">
                    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 gap-y-6 gap-x-3 h-full">

                        
                        <div>
                            <div class="flex flex-col h-full justify-center items-center text-center space-y-3 dark:bg-zinc-800 dark:border-transparent py-4 px-2 border rounded-lg bg-slate-50 border-slate-200 shadow-sm-light dark:shadow-none">
                                <div class="w-10 h-10 rounded-full flex items-center justify-center border border-slate-200 bg-slate-100 dark:bg-zinc-700 dark:border-transparent">
                                    <svg class="h-5 w-5 text-slate-400 dark:text-zinc-400" stroke="currentColor" fill="currentColor" stroke-width="0" version="1.2" baseProfile="tiny" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M13.839 17.525c-.006.002-.559.186-1.039.186-.265 0-.372-.055-.406-.079-.168-.117-.48-.336.054-1.4l1-1.994c.593-1.184.681-2.329.245-3.225-.356-.733-1.039-1.236-1.92-1.416-.317-.065-.639-.097-.958-.097-1.849 0-3.094 1.08-3.146 1.126-.179.158-.221.42-.102.626.12.206.367.3.595.222.005-.002.559-.187 1.039-.187.263 0 .369.055.402.078.169.118.482.34-.051 1.402l-1 1.995c-.594 1.185-.681 2.33-.245 3.225.356.733 1.038 1.236 1.921 1.416.314.063.636.097.954.097 1.85 0 3.096-1.08 3.148-1.126.179-.157.221-.42.102-.626-.12-.205-.369-.297-.593-.223z"></path><circle cx="13" cy="6.001" r="2.5"></circle></svg>
                                </div>
                                <span class="font-medium text-slate-400 text-[11px] uppercase dark:text-zinc-300 tracking-[2px] whitespace-nowrap"><?php echo app('translator')->get('messages.t_status'); ?></span>
                                <div class="text-sm font-semibold tracking-wide dark:text-white text-zinc-700">
                                    <?php switch($project->status):

                                        
                                        case ('active'): ?>
                                            <span class="text-emerald-600">
                                                <?php echo app('translator')->get('messages.t_active'); ?>
                                            </span>
                                            <?php break; ?>

                                        
                                        <?php case ('completed'): ?>
                                            <span class="text-green-600">
                                                <?php echo app('translator')->get('messages.t_completed'); ?>
                                            </span>
                                            <?php break; ?>

                                        
                                        <?php case ('under_development'): ?>
                                            <span class="text-blue-600">
                                                <?php echo app('translator')->get('messages.t_under_development'); ?>
                                            </span>
                                            <?php break; ?>

                                        
                                        <?php case ('pending_final_review'): ?>
                                            <span class="text-amber-600">
                                                <?php echo app('translator')->get('messages.t_pending_final_review'); ?>
                                            </span>
                                            <?php break; ?>

                                        
                                        <?php case ('incomplete'): ?>
                                            <span class="text-red-600">
                                                <?php echo app('translator')->get('messages.t_incomplete'); ?>
                                            </span>
                                            <?php break; ?>

                                        
                                        <?php case ('closed'): ?>
                                            <span class="text-slate-600 dark:text-slate-200">
                                                <?php echo app('translator')->get('messages.t_closed'); ?>
                                            </span>
                                            <?php break; ?>

                                        <?php default: ?>
                                            
                                    <?php endswitch; ?>
                                </div>
                            </div>
                        </div>

                        
                        <div>
                            <div class="flex flex-col h-full justify-center items-center text-center space-y-3 dark:bg-zinc-800 dark:border-transparent py-4 px-2 border rounded-lg bg-slate-50 border-slate-200 shadow-sm-light dark:shadow-none">
                                <div class="w-10 h-10 rounded-full flex items-center justify-center border border-slate-200 bg-slate-100 dark:bg-zinc-700 dark:border-transparent">
                                    <svg class="h-5 w-5 text-slate-400 dark:text-zinc-400" stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M11.795 21h-6.795a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v4"></path><path d="M18 18m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"></path><path d="M15 3v4"></path><path d="M7 3v4"></path><path d="M3 11h16"></path><path d="M18 16.496v1.504l1 1"></path></svg>
                                </div>
                                <span class="font-medium text-slate-400 text-[11px] uppercase dark:text-zinc-300 tracking-[2px] whitespace-nowrap"><?php echo app('translator')->get('messages.t_delivery_time'); ?></span>
                                <div class="text-sm font-semibold tracking-wide dark:text-white text-zinc-700">
                                    <?php if($expected_delivery_date): ?>
                                        <?php echo e(format_date($expected_delivery_date, config('carbon-formats.F_j_Y')), false); ?>

                                    <?php else: ?>
                                        <?php echo app('translator')->get('messages.t_n_a'); ?>
                                    <?php endif; ?>  
                                </div>
                            </div>
                        </div>

                        
                        <div>
                            <div class="flex flex-col h-full justify-center items-center text-center space-y-3 dark:bg-zinc-800 dark:border-transparent py-4 px-2 border rounded-lg bg-slate-50 border-slate-200 shadow-sm-light dark:shadow-none">
                                <div class="w-10 h-10 rounded-full flex items-center justify-center border border-slate-200 bg-slate-100 dark:bg-zinc-700 dark:border-transparent">
                                    <svg class="h-5 w-5 text-slate-400 dark:text-zinc-400" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M20.92 2.38A15.72 15.72 0 0 0 17.5 2a8.26 8.26 0 0 0-6 2.06Q9.89 5.67 8.31 7.27c-1.21-.13-4.08-.2-6 1.74a1 1 0 0 0 0 1.41l11.3 11.32a1 1 0 0 0 1.41 0c1.95-2 1.89-4.82 1.77-6l3.21-3.2c3.19-3.19 1.74-9.18 1.68-9.43a1 1 0 0 0-.76-.73zm-2.36 8.75L15 14.67a1 1 0 0 0-.27.9 6.81 6.81 0 0 1-.54 3.94L4.52 9.82a6.67 6.67 0 0 1 4-.5A1 1 0 0 0 9.39 9s1.4-1.45 3.51-3.56A6.61 6.61 0 0 1 17.5 4a14.51 14.51 0 0 1 2.33.2c.24 1.43.62 5.04-1.27 6.93z"></path><circle cx="15.73" cy="8.3" r="2"></circle><path d="M5 16c-2 1-2 5-2 5a7.81 7.81 0 0 0 5-2z"></path></svg>
                                </div>
                                <span class="font-medium text-slate-400 text-[11px] uppercase dark:text-zinc-300 tracking-[2px] whitespace-nowrap"><?php echo app('translator')->get('messages.t_in_progress'); ?></span>
                                <div class="text-sm font-semibold tracking-wide dark:text-white text-zinc-700">
                                    <?php echo money($payments_in_progress, settings('currency')->code, true); ?>  
                                </div>
                            </div>
                        </div>

                        
                        <div>
                            <div class="flex flex-col h-full justify-center items-center text-center space-y-3 dark:bg-zinc-800 dark:border-transparent py-4 px-2 border rounded-lg bg-slate-50 border-slate-200 shadow-sm-light dark:shadow-none">
                                <div class="w-10 h-10 rounded-full flex items-center justify-center border border-slate-200 bg-slate-100 dark:bg-zinc-700 dark:border-transparent">
                                    <svg class="h-5 w-5 text-slate-400 dark:text-zinc-400" stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M9 12l2 2l4 -4"></path><path d="M12 3a12 12 0 0 0 8.5 3a12 12 0 0 1 -8.5 15a12 12 0 0 1 -8.5 -15a12 12 0 0 0 8.5 -3"></path></svg>
                                </div>
                                <span class="font-medium text-slate-400 text-[11px] uppercase dark:text-zinc-300 tracking-[2px] whitespace-nowrap"><?php echo app('translator')->get('messages.t_paid_amount'); ?></span>
                                <div class="text-sm font-semibold tracking-wide dark:text-white text-zinc-700">
                                    <?php echo money($paid_amount, settings('currency')->code, true); ?>
                                </div>
                            </div>
                        </div>

                        
                        <div>
                            <div class="flex flex-col h-full justify-center items-center text-center space-y-3 dark:bg-zinc-800 dark:border-transparent py-4 px-2 border rounded-lg bg-slate-50 border-slate-200 shadow-sm-light dark:shadow-none">
                                <div class="w-10 h-10 rounded-full flex items-center justify-center border border-slate-200 bg-slate-100 dark:bg-zinc-700 dark:border-transparent">
                                    <svg class="h-5 w-5 text-slate-400 dark:text-zinc-400" stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2"></path><path d="M9 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z"></path><path d="M14 11h-2.5a1.5 1.5 0 0 0 0 3h1a1.5 1.5 0 0 1 0 3h-2.5"></path><path d="M12 17v1m0 -8v1"></path></svg>
                                </div>
                                <span class="font-medium text-slate-400 text-[11px] uppercase dark:text-zinc-300 tracking-[2px] whitespace-nowrap"><?php echo app('translator')->get('messages.t_project_budget'); ?></span>
                                <div class="text-sm font-semibold tracking-wide dark:text-white text-zinc-700">
                                    <?php echo money($project->awarded_bid->amount, settings('currency')->code, true); ?>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                
                <div class="w-full">

                    
                    <div class="flex justify-end items-center mt-12">
                        <div class="flex items-center space-x-3 rtl:space-x-reverse">
                            
                            
                            <button type="button" class="inline-flex justify-center items-center space-x-2 rtl:space-x-reverse rounded border font-medium focus:outline-none px-3 py-2 tracking-wide text-[13px] border-gray-300 bg-white text-gray-800 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none dark:bg-zinc-700 dark:border-transparent dark:text-zinc-200 dark:hover:bg-zinc-600" id="modal-awarded-bid-button-<?php echo e($project->uid, false); ?>">
                                <?php echo app('translator')->get('messages.t_awarded_bid'); ?>
                            </button>

                            
                            <?php if(in_array($project->status, ['active', 'under_development', 'pending_final_review'])): ?>
                                <button type="button" class="inline-flex justify-center items-center space-x-2 rtl:space-x-reverse rounded border font-medium focus:outline-none px-3 py-2 tracking-wide text-[13px] border-primary-600 bg-primary-600 text-white hover:text-white hover:bg-primary-700 hover:border-primary-700 focus:ring focus:ring-primary-500 focus:ring-opacity-50 active:bg-primary-700 active:border-primary-700" id="modal-create-milestone-button-<?php echo e($project->uid, false); ?>">
                                    <?php echo app('translator')->get('messages.t_create_milestone'); ?>
                                </button>
                            <?php endif; ?>

                        </div>
                    </div>

                    
                    <div class="mt-8 overflow-x-auto overflow-y-hidden scrollbar-thin scrollbar-thumb-gray-300 scrollbar-track-gray-100 dark:scrollbar-thumb-zinc-800 dark:scrollbar-track-zinc-600">
                        <table class="w-full text-left border-spacing-y-[10px] border-separate -mt-2">
                            <thead class="">
                                <tr class="bg-slate-200 dark:bg-zinc-600">
            
                                    
                                    <th class="font-bold tracking-wider text-gray-600 px-5 py-4.5 border-b-0 whitespace-nowrap text-xs uppercase dark:text-zinc-300 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md rtl:text-right"><?php echo app('translator')->get('messages.t_date'); ?></th>
            
                                    
                                    <th class="font-bold tracking-wider text-gray-600 px-5 py-4.5 border-b-0 whitespace-nowrap text-xs uppercase dark:text-zinc-300 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md rtl:text-right"><?php echo app('translator')->get('messages.t_description'); ?></th>
            
                                    
                                    <th class="font-bold tracking-wider text-gray-600 px-5 py-4.5 text-center border-b-0 whitespace-nowrap text-xs uppercase dark:text-zinc-300 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md"><?php echo app('translator')->get('messages.t_status'); ?></th>
            
                                    
                                    <th class="font-bold tracking-wider text-gray-600 px-5 py-4.5 text-center border-b-0 whitespace-nowrap text-xs uppercase dark:text-zinc-300 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md"><?php echo app('translator')->get('messages.t_paid_to_freelancer'); ?></th>
                                    
                                    
                                    <th class="font-bold tracking-wider text-gray-600 px-5 py-4.5 text-center border-b-0 whitespace-nowrap text-xs uppercase dark:text-zinc-300 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md"><?php echo app('translator')->get('messages.t_total'); ?></th>

                                    
                                    <th class="font-bold tracking-wider text-gray-600 px-5 py-4.5 text-center border-b-0 whitespace-nowrap text-xs uppercase dark:text-zinc-300 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md"><?php echo app('translator')->get('messages.t_options'); ?></th>
                                    
                                </tr>
                            </thead>
                            <thead>
                                <?php $__empty_1 = true; $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr class="intro-x shadow-sm bg-white dark:bg-zinc-800 rounded-md h-16" wire:key="employer-dashboard-project-milestones-<?php echo e($p->uid, false); ?>">
            
                                        
                                        <td class="px-5 py-3 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md rtl:text-right">
                                            <div class="text-gray-600 dark:text-gray-100 text-[13px] font-normal whitespace-nowrap">
                                                <?php echo e(format_date($p->created_at), false); ?>    
                                            </div>
                                        </td>
            
                                        
                                        <td class="px-5 py-3 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md w-48 rtl:text-right">
                                            <div class="text-gray-500 leading-relaxed dark:text-gray-100 text-[13px] font-normal break-words flex-none truncate w-48 overflow-hidden block">
                                                <?php echo e($p->description, false); ?> 
                                            </div>
                                        </td>
            
                                        
                                        <td class="px-5 py-3 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md text-center">
                                            <?php switch($p->status):
            
                                                
                                                case ('request'): ?>
                                                    <span class="inline-flex items-center px-3 py-2 rounded-3xl text-xs tracking-wide font-medium bg-yellow-100 text-yellow-800 dark:bg-transparent dark:text-amber-400">
                                                        <?php echo e(__('messages.t_requested'), false); ?>

                                                    </span>
                                                    <?php break; ?>
                                                
                                                
                                                <?php case ('paid'): ?>
                                                    <span class="inline-flex items-center px-4 py-2 rounded-3xl text-xs tracking-wide font-medium bg-green-100 text-green-800 dark:bg-transparent dark:text-green-400">
                                                        <?php echo e(__('messages.t_paid'), false); ?>

                                                    </span>
                                                    <?php break; ?>
            
                                                
                                                <?php case ('funded'): ?>
                                                    <span class="inline-flex items-center px-3 py-2 rounded-3xl text-xs tracking-wide font-medium bg-purple-100 text-purple-800 dark:bg-transparent dark:text-purple-400">
                                                        <?php echo e(__('messages.t_funded'), false); ?>

                                                    </span>
                                                    <?php break; ?>
            
                                                <?php default: ?>
                                                    
                                            <?php endswitch; ?>
                                        </td>
            
                                        
                                        <td class="px-5 py-3 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md text-center">
                                            <div class="text-gray-700 dark:text-gray-100 text-sm font-medium">
                                                <?php echo money(convertToNumber($p->amount), settings('currency')->code, true); ?>
                                            </div>
                                        </td>
            
                                        
                                        <td class="px-5 py-3 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md text-center">
                                            <div class="text-gray-700 dark:text-gray-100 text-sm font-medium">
                                                <?php echo money(convertToNumber($p->amount) + convertToNumber($p->employer_commission), settings('currency')->code, true); ?>
                                            </div>
                                        </td>

                                        
                                        <td class="px-5 py-3 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md text-center">
                                            <div class="flex items-center justify-center space-x-2 rtl:space-x-reverse">

                                                
                                                <button wire:click="details('<?php echo e($p->uid, false); ?>')" type="button" class="inline-flex justify-center items-center border font-semibold focus:outline-none w-8 h-8 text-sm rounded border-gray-300 bg-white text-gray-600 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none dark:bg-zinc-700 dark:border-transparent dark:text-zinc-200 dark:hover:bg-zinc-600" data-tooltip-target="tooltip-actions-details-<?php echo e($p->uid, false); ?>">
                                                    <svg class="h-4.5 w-4.5 mt-px" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M20 2H4c-1.103 0-2 .897-2 2v12c0 1.103.897 2 2 2h3v3.767L13.277 18H20c1.103 0 2-.897 2-2V4c0-1.103-.897-2-2-2zm0 14h-7.277L9 18.233V16H4V4h16v12z"></path><path d="M7 7h10v2H7zm0 4h7v2H7z"></path></svg>
                                                </button>
                                                <?php if (isset($component)) { $__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265 = $component; } ?>
<?php $component = App\View\Components\Forms\Tooltip::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.tooltip'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Tooltip::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'tooltip-actions-details-'.e($p->uid, false).'','text' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_details'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265)): ?>
<?php $component = $__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265; ?>
<?php unset($__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265); ?>
<?php endif; ?>
        
                                                
                                                <?php if($p->status === 'request'): ?>
                                                    <button wire:click="confirmPay('<?php echo e($p->uid, false); ?>')" type="button" class="inline-flex justify-center items-center border font-semibold focus:outline-none w-8 h-8 text-sm rounded border-gray-300 bg-white text-gray-600 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none dark:bg-zinc-700 dark:border-transparent dark:text-zinc-200 dark:hover:bg-zinc-600" data-tooltip-target="tooltip-actions-pay-<?php echo e($p->uid, false); ?>">
                                                        <svg class="h-4.5 w-4.5 mt-px" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 15c-1.84 0-2-.86-2-1H8c0 .92.66 2.55 3 2.92V18h2v-1.08c2-.34 3-1.63 3-2.92 0-1.12-.52-3-4-3-2 0-2-.63-2-1s.7-1 2-1 1.39.64 1.4 1h2A3 3 0 0 0 13 7.12V6h-2v1.09C9 7.42 8 8.71 8 10c0 1.12.52 3 4 3 2 0 2 .68 2 1s-.62 1-2 1z"></path><path d="M5 2H2v2h2v17a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1V4h2V2H5zm13 18H6V4h12z"></path></svg>
                                                    </button>
                                                    <?php if (isset($component)) { $__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265 = $component; } ?>
<?php $component = App\View\Components\Forms\Tooltip::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.tooltip'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Tooltip::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'tooltip-actions-pay-'.e($p->uid, false).'','text' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_deposit_funds'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265)): ?>
<?php $component = $__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265; ?>
<?php unset($__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265); ?>
<?php endif; ?>
                                                <?php endif; ?>

                                                
                                                <?php if($p->status === 'funded'): ?>
                                                    <button wire:click="confirmRelease('<?php echo e($p->uid, false); ?>')" type="button" class="inline-flex justify-center items-center border font-semibold focus:outline-none w-8 h-8 text-sm rounded border-gray-300 bg-white text-gray-600 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none" data-tooltip-target="tooltip-actions-release-<?php echo e($p->uid, false); ?>">
                                                        <svg class="h-5 w-5" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="m10 15.586-3.293-3.293-1.414 1.414L10 18.414l9.707-9.707-1.414-1.414z"></path></svg>
                                                    </button>
                                                    <?php if (isset($component)) { $__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265 = $component; } ?>
<?php $component = App\View\Components\Forms\Tooltip::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.tooltip'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Tooltip::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'tooltip-actions-release-'.e($p->uid, false).'','text' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_release'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265)): ?>
<?php $component = $__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265; ?>
<?php unset($__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265); ?>
<?php endif; ?>
                                                <?php endif; ?>
                                                
                                            </div>
                                        </td>
            
                                    </tr>
            
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="6" class="py-4.5 font-light text-sm text-gray-400 dark:text-zinc-200 text-center tracking-wide shadow-sm bg-white dark:bg-zinc-800 rounded-md">
                                            <?php echo app('translator')->get('messages.t_no_milestone_payments_created_yet'); ?>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </thead>
                            <?php if($payments->count()): ?>
                                <tfoot>
                                    <tr class="bg-slate-200 dark:bg-zinc-600 intro-x rounded-md h-16">
                                        <th colspan="3" class="text-center py-3 px-5 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md"></th>
                                        <td class="text-center py-3 px-5 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md text-sm font-bold text-slate-600 dark:text-zinc-300">
                                            <?php echo money(convertToNumber($paid_amount) + convertToNumber($payments_in_progress), settings('currency')->code, true); ?>
                                        </td>
                                        <td class="text-center py-3 px-5 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md text-sm font-bold text-slate-600 dark:text-zinc-300">
                                            <?php echo money((convertToNumber($paid_amount) + convertToNumber($payments_in_progress)) + ((convertToNumber(settings('projects')->commission_from_publisher) / 100) * (convertToNumber($paid_amount) + convertToNumber($payments_in_progress))), settings('currency')->code, true); ?>
                                        </td>
                                        <td class="text-center py-3 px-5 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md text-sm font-bold text-slate-600 dark:text-zinc-300">
                                        </td>
                                    </tr>
                                </tfoot>
                            <?php endif; ?>
                        </table>
                    </div>

                </div>

            </div>

        </div>

    </div>

    
    <?php if (isset($component)) { $__componentOriginal626cd0ad8c496eb8a190505b15f0d732 = $component; } ?>
<?php $component = App\View\Components\Forms\Modal::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Modal::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'modal-awarded-bid-container-'.e($project->uid, false).'','target' => 'modal-awarded-bid-button-'.e($project->uid, false).'','uid' => 'modal_awarded_bid_'.e($project->uid, false).'','placement' => 'center-center','size' => 'max-w-2xl']); ?>

        
         <?php $__env->slot('title', null, []); ?> <?php echo e(__('messages.t_awarded_bid'), false); ?> <?php $__env->endSlot(); ?>

        
         <?php $__env->slot('content', null, []); ?> 

            
            <div class="w-full relative">
                <div class="relative">
                
                    
                    <div class="mb-8">
                
                        
                        <div class="flex items-center space-x-4 rtl:space-x-reverse">
                
                            
                              <a href="<?php echo e(url('profile', $project->awarded_bid->user->username), false); ?>" class="block">
                                <img class="rounded-full h-12 w-12 object-cover object-center lazy" src="<?php echo e(placeholder_img(), false); ?>" data-src="<?php echo e(src($project->awarded_bid->user->avatar), false); ?>" alt="<?php echo e($project->awarded_bid->user->username, false); ?>">
                            </a>
                
                            
                            <div class="space-y-0.5">
                
                                <div class="flex items-center">
                
                                    
                                    <?php if($project->awarded_bid->user->fullname): ?>
                                        <span class="font-medium text-zinc-900 text-sm hover:text-black dark:text-zinc-200 dark:hover:text-white ltr:pr-1 rtl:pl-1">
                                            <?php echo e($project->awarded_bid->user->fullname, false); ?>

                                        </span>
                                    <?php endif; ?>
                
                                    
                                    <a href="<?php echo e(url('profile', $project->awarded_bid->user->username), false); ?>" class="font-medium text-gray-500 text-[13px] hover:text-primary-600 focus:text-primary-600 inline-flex items-center dark:text-zinc-400">
                                        <svg class="w-4 h-4" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10c1.466 0 2.961-.371 4.442-1.104l-.885-1.793C14.353 19.698 13.156 20 12 20c-4.411 0-8-3.589-8-8s3.589-8 8-8 8 3.589 8 8v1c0 .692-.313 2-1.5 2-1.396 0-1.494-1.819-1.5-2V8h-2v.025A4.954 4.954 0 0 0 12 7c-2.757 0-5 2.243-5 5s2.243 5 5 5c1.45 0 2.748-.631 3.662-1.621.524.89 1.408 1.621 2.838 1.621 2.273 0 3.5-2.061 3.5-4v-1c0-5.514-4.486-10-10-10zm0 13c-1.654 0-3-1.346-3-3s1.346-3 3-3 3 1.346 3 3-1.346 3-3 3z"></path></svg>
                                        <span><?php echo e($project->awarded_bid->user->username, false); ?></span>
                                    </a>
                
                                </div>
                
                                
                                <div class="flex items-center space-x-3 rtl:space-x-reverse text-[13px] dark:text-zinc-400">
                
                                    
                                    <?php if($project->awarded_bid->user->country): ?>
                                        <p class="flex items-center space-x-1 rtl:space-x-reverse">
                                            <img class="h-4 ltr:pr-0.5 rtl:pl-0.5 -mt-0.5 lazy" src="<?php echo e(placeholder_img(), false); ?>" data-src="<?php echo e(countryFlag($project->awarded_bid->user->country->code), false); ?>" alt="<?php echo e($project->awarded_bid->user->country->name, false); ?>">
                                            <span><?php echo e($project->awarded_bid->user->country->name, false); ?></span>
                                        </p>
                
                                        <div class="mx-2 my-0.5 text-gray-300 dark:text-zinc-400">|</div>
                                    <?php endif; ?>
                
                                    
                                    <p class="flex shrink-0 items-center space-x-1 rtl:space-x-reverse">
                                        <svg aria-hidden="true" class="w-4 h-4 <?php echo e($project->awarded_bid->user->rating() == 0 ? 'text-gray-400' : 'text-amber-500', false); ?> -mt-0.5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                        <span>
                                            <?php echo e($project->awarded_bid->user->rating(), false); ?>

                                        </span>
                                    </p>
                
                                    
                                    <?php if($project->awarded_bid->user->status === 'verified'): ?>
                                        <div class="mx-2 my-0.5 text-gray-300 dark:text-zinc-400">|</div>
                                        <div class="flex shrink-0 items-center space-x-1 rtl:space-x-reverse">
                                            <svg class="w-4 h-4 text-blue-500 -mt-0.5" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                            <span><?php echo app('translator')->get('messages.t_verified_account'); ?></span>
                                        </div>
                                    <?php endif; ?>
                
                                </div>
                
                            </div>
                
                        </div>
                                    
                    </div>
                    
                    
                    <p class="mb-2 font-light text-sm leading-relaxed text-gray-500 dark:text-gray-300">
                        <?php echo nl2br($project->awarded_bid->message); ?>

                    </p>
                
                </div>
            </div>

         <?php $__env->endSlot(); ?>

        
         <?php $__env->slot('footer', null, []); ?> 
            <div class="flex justify-between items-center w-full">
                <div></div>
                
                <button x-on:click="close" type="button" class="inline-flex justify-center items-center space-x-2 rounded border font-semibold focus:outline-none px-3 py-2 leading-5 text-xs tracking-wide border-gray-300 bg-white text-gray-800 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none dark:bg-zinc-800 dark:border-transparent dark:text-zinc-300 dark:hover:bg-zinc-700 dark:hover:text-gray-100">
                    <?php echo app('translator')->get('messages.t_close'); ?>
                </button>
            </div>
         <?php $__env->endSlot(); ?>

     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal626cd0ad8c496eb8a190505b15f0d732)): ?>
<?php $component = $__componentOriginal626cd0ad8c496eb8a190505b15f0d732; ?>
<?php unset($__componentOriginal626cd0ad8c496eb8a190505b15f0d732); ?>
<?php endif; ?>
    
    
    <?php if(in_array($project->status, ['active', 'under_development', 'pending_final_review'])): ?>
        <?php if (isset($component)) { $__componentOriginal626cd0ad8c496eb8a190505b15f0d732 = $component; } ?>
<?php $component = App\View\Components\Forms\Modal::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Modal::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'modal-create-milestone-container-'.e($project->uid, false).'','target' => 'modal-create-milestone-button-'.e($project->uid, false).'','uid' => 'modal_create_milestone_'.e($project->uid, false).'','placement' => 'center-center','size' => 'max-w-md']); ?>

            
             <?php $__env->slot('title', null, []); ?> <?php echo e(__('messages.t_create_milestone_payment'), false); ?> <?php $__env->endSlot(); ?>

            
             <?php $__env->slot('content', null, []); ?> 
                <div class="grid grid-cols-1 gap-y-6">

                    
                    <div>
                        <?php if (isset($component)) { $__componentOriginal0241d3f51813223308810020791c4a83 = $component; } ?>
<?php $component = App\View\Components\Forms\TextInput::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.text-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\TextInput::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_amount')),'placeholder' => '0.00','model' => 'milestone_amount','suffix' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(settings('currency')->code),'hint' => ''.e(__('messages.t_available_balance'), false).' '.e(money(convertToNumber(auth()->user()->balance_available), settings('currency')->code, true), false).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0241d3f51813223308810020791c4a83)): ?>
<?php $component = $__componentOriginal0241d3f51813223308810020791c4a83; ?>
<?php unset($__componentOriginal0241d3f51813223308810020791c4a83); ?>
<?php endif; ?>
                    </div>

                    
                    <div>
                        <?php if (isset($component)) { $__componentOriginal2f60389a9e230471cd863683376c182f = $component; } ?>
<?php $component = App\View\Components\Forms\Textarea::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.textarea'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Textarea::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_description')),'placeholder' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_enter_milestone_payment_description')),'model' => 'milestone_description','rows' => 6,'svg_icon' => '<svg class="w-5 h-5 text-gray-400 dark:text-gray-300" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M19.045 7.401c.378-.378.586-.88.586-1.414s-.208-1.036-.586-1.414l-1.586-1.586c-.378-.378-.88-.586-1.414-.586s-1.036.208-1.413.585L4 13.585V18h4.413L19.045 7.401zm-3-3 1.587 1.585-1.59 1.584-1.586-1.585 1.589-1.584zM6 16v-1.585l7.04-7.018 1.586 1.586L7.587 16H6zm-2 4h16v2H4z"></path></svg>']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2f60389a9e230471cd863683376c182f)): ?>
<?php $component = $__componentOriginal2f60389a9e230471cd863683376c182f; ?>
<?php unset($__componentOriginal2f60389a9e230471cd863683376c182f); ?>
<?php endif; ?>
                    </div>

                </div>
             <?php $__env->endSlot(); ?>

            
             <?php $__env->slot('footer', null, []); ?> 
                <div class="flex justify-between items-center w-full">

                    
                    <button x-on:click="close" type="button" class="inline-flex justify-center items-center space-x-2 rounded border font-semibold focus:outline-none px-3 py-2 leading-5 text-xs tracking-wide border-gray-300 bg-white text-gray-800 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none">
                        <?php echo app('translator')->get('messages.t_cancel'); ?>
                    </button>

                    
                    <button
                        type="button" 
                        wire:click="confirmCreate"
                        wire:loading.attr="disabled"
                        class="inline-flex justify-center items-center rounded border font-semibold focus:outline-none px-3 py-2 leading-5 text-xs tracking-wide border-transparent bg-primary-500 text-white hover:bg-primary-600 focus:ring focus:ring-primary-500 focus:ring-opacity-25 disabled:bg-gray-200 disabled:hover:bg-gray-200 disabled:text-gray-500 disabled:cursor-not-allowed">
                        
                        
                        <div wire:loading wire:target="confirmCreate">
                            <svg role="status" class="inline w-4 h-4 text-gray-700 animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>
                                <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>
                            </svg>
                        </div>

                        
                        <div wire:loading.remove wire:target="confirmCreate">
                            <?php echo app('translator')->get('messages.t_create'); ?>
                        </div>

                    </button>

                </div>
             <?php $__env->endSlot(); ?>

         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal626cd0ad8c496eb8a190505b15f0d732)): ?>
<?php $component = $__componentOriginal626cd0ad8c496eb8a190505b15f0d732; ?>
<?php unset($__componentOriginal626cd0ad8c496eb8a190505b15f0d732); ?>
<?php endif; ?>
    <?php endif; ?>

</div><?php /**PATH /home/u100719507/domains/2lancer.ma/public_html/resources/views/livewire/main/account/projects/options/milestones.blade.php ENDPATH**/ ?>