<div class="w-full" >

    
    <div class="px-4 md:px-3 py-4 md:py-5 bg-white border !border-b-0 dark:bg-gray-700 rounded-tl-lg rounded-tr-lg">
        <div class="sm:flex items-center justify-between">
            <p class="text-sm font-bold leading-wide text-gray-800">
                <?php echo e(__('messages.t_users'), false); ?>

            </p>
            <div class="space-x-3 rtl:space-x-reverse">

                
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_deleted_users')): ?>
                <a href="<?php echo e(admin_url('users/trash'), false); ?>" class="inline-flex justify-center items-center space-x-2 rtl:space-x-reverse rounded border font-semibold focus:outline-none px-2 py-3 leading-5 text-[13px] border-gray-300 bg-white text-gray-800 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none">
                    <svg class="w-4.5 h-4.5 -mt-0.5" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M5 20a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V8h2V6h-4V4a2 2 0 0 0-2-2H9a2 2 0 0 0-2 2v2H3v2h2zM9 4h6v2H9zM8 8h9v12H7V8z"></path><path d="M9 10h2v8H9zm4 0h2v8h-2z"></path></svg>
                    <span><?php echo app('translator')->get('messages.t_deleted_users'); ?></span>
                </a>
                <?php endif; ?>
                
                
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('add_user')): ?>
                <a href="<?php echo e(admin_url('users/create'), false); ?>" class="inline-flex justify-center items-center space-x-2 rtl:space-x-reverse rounded border font-semibold focus:outline-none px-3 py-3 leading-5 text-[13px] border-primary-600 bg-primary-600 text-white hover:text-white hover:bg-primary-700 hover:border-primary-700 focus:ring focus:ring-primary-500 focus:ring-opacity-50 active:bg-primary-700 active:border-primary-700">
                    <svg class="w-5 h-5 -mt-0.5" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M19 11h-6V5h-2v6H5v2h6v6h2v-6h6z"></path></svg>
                    <span><?php echo e(__('messages.t_create_user'), false); ?></span>
                </a>
                <?php endif; ?>
            </div>
        </div>
    </div>

    
    <div class="bg-white dark:bg-zinc-800 overflow-y-auto border !border-t-0 !border-b-0 dark:border-zinc-600">
            
            
            <div class="ltr:ml-2 rtl:mr-2 w-full hidden lg:block mb-4">   
                <div class="relative max-w-md" x-data="{ open: false }">
                    
                    
                    <input wire:model.debounce.500ms="q" wire:keydown.enter="enter" x-ref="search" x-on:click="open = true" type="search" class="block p-2.5 w-full z-20 text-sm text-gray-900 dark:text-white bg-white dark:bg-[#181818] rounded border border-gray-300 dark:border-[#181818] focus:ring-0 focus:border-gray-500 h-10" placeholder="<?php echo e(__('messages.t_search_for_user'), false); ?>" >
            
                </div>
            </div>
    
        <table class="w-full whitespace-nowrap old-tables">
            <thead class="bg-gray-200">
                <tr tabindex="0" class="focus:outline-none h-16 w-full text-sm leading-none text-gray-800 dark:text-white ">
                    <th class="font-bold text-[10px] text-slate-500 dark:text-gray-300 uppercase tracking-wider ltr:text-left ltr:pl-4 rtl:text-right rtl:pr-4"><?php echo e(__('messages.t_user'), false); ?></th>
                    <th class="font-bold text-[10px] text-slate-500 dark:text-gray-300 uppercase tracking-wider text-center"><?php echo e(__('messages.t_account_type'), false); ?></th>
                    <th class="font-bold text-[10px] text-slate-500 dark:text-gray-300 uppercase tracking-wider text-center"><?php echo e(__('messages.t_earnings'), false); ?></th>
                    <th class="font-bold text-[10px] text-slate-500 dark:text-gray-300 uppercase tracking-wider text-center"><?php echo e(__('messages.t_registeration_date'), false); ?></th>
                    <th class="font-bold text-[10px] text-slate-500 dark:text-gray-300 uppercase tracking-wider text-center"><?php echo e(__('messages.t_status'), false); ?></th>
                    <th class="font-bold text-[10px] text-slate-500 dark:text-gray-300 uppercase tracking-wider text-center"><?php echo e(__('messages.t_options'), false); ?></th>
                </tr>
            </thead>
            <tbody class="w-full">

                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="focus:outline-none text-sm leading-none text-gray-800 bg-white dark:bg-zinc-600 hover:bg-gray-100 dark:hover:bg-zinc-700 border-b border-t border-gray-100 dark:border-zinc-700/40" wire:key="users-<?php echo e($user->id, false); ?>">

                        
                        <td class="ltr:pl-4 rtl:pr-4">
                            <a href="<?php echo e(url('profile', $user->username), false); ?>" target="_blank" class="flex items-center">
                                <div class="w-8 h-8">
                                    <img class="w-full h-full rounded object-cover lazy" src="<?php echo e(placeholder_img(), false); ?>" data-src="<?php echo e(src($user->avatar), false); ?>" alt="<?php echo e($user->username, false); ?>" />
                                </div>
                                <div class="ltr:pl-4 rtl:pr-4">
                                    <p class="font-medium text-xs flex items-center">
                                        <?php echo e($user->username, false); ?>

                                        <?php if($user->status === 'verified'): ?>
                                            <img data-tooltip-target="tooltip-account-verified-<?php echo e($user->id, false); ?>" class="ltr:ml-0.5 rtl:mr-0.5 h-4 w-4 -mt-0.5" src="<?php echo e(url('public/img/auth/verified-badge.svg'), false); ?>" alt="<?php echo e(__('messages.t_account_verified'), false); ?>">
                                            <div id="tooltip-account-verified-<?php echo e($user->id, false); ?>" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs font-medium text-white bg-gray-900 rounded-sm shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                                <?php echo e(__('messages.t_account_verified'), false); ?>

                                            </div>
                                        <?php endif; ?>
                                    </p>
                                    <p class="text-[11px] leading-3 text-gray-600 pt-2"><?php echo e($user->email, false); ?></p>
                                </div>
                            </a>
                        </td>

                        
                        <td class="text-center">
                            <?php if($user->account_type === 'seller'): ?>
                                <span class="text-xs font-bold tracking-wide text-primary-600"><?php echo e(__('messages.t_seller'), false); ?></span>
                            <?php else: ?>
                                <span class="text-xs font-bold tracking-wide text-red-500"><?php echo e(__('messages.t_buyer'), false); ?></span>
                            <?php endif; ?>
                        </td>

                        
                        <td class="text-center">
                            <span class="text-xs font-bold "><?php echo money($user->balance_available, settings('currency')->code, true); ?></span>
                        </td>

                        
                        <td class="text-center">
                            <span class="text-xs font-medium text-gray-500"><?php echo e(format_date($user->created_at, 'ago'), false); ?></span>
                        </td>

                        
                        <td class="text-center">
                            <?php switch($user->status):
                                case ('active'): ?>
                                    <span class="px-4 py-1 text-xs rounded-2xl font-semibold text-green-500 bg-green-50">
                                        <?php echo e(__('messages.t_active'), false); ?>

                                    </span>
                                    <?php break; ?>
                                <?php case ('pending'): ?>
                                    <span class="px-4 py-1 text-xs rounded-2xl font-semibold text-amber-500 bg-amber-50">
                                        <?php echo e(__('messages.t_pending'), false); ?>

                                    </span>
                                    <?php break; ?>
                                <?php case ('banned'): ?>
                                    <span class="px-4 py-1 text-xs rounded-2xl font-semibold text-gray-500 bg-gray-50">
                                        <?php echo e(__('messages.t_banned'), false); ?>

                                    </span>
                                    <?php break; ?>
                                <?php case ('verified'): ?>
                                    <span class="px-4 py-1 text-xs rounded-2xl font-semibold text-blue-500 bg-blue-50">
                                        <?php echo e(__('messages.t_verified'), false); ?>

                                    </span>
                                    <?php break; ?>
                                <?php default: ?>
                                    
                            <?php endswitch; ?>
                        </td>

                        
                        
                        <td class="px-5 py-3 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md text-center">
                                <div class="flex justify-center items-center space-x-2 rtl:space-x-reverse">

                                    
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit_user')): ?>
                                    <div>
                                        <a href="<?php echo e(admin_url('users/edit/' . $user->uid), false); ?>" data-tooltip-target="tooltip-actions-edit-<?php echo e($user->uid, false); ?>" class="inline-flex justify-center items-center border font-semibold focus:outline-none w-8 h-8 leading-5 text-sm rounded border-gray-300 bg-white text-gray-800 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none dark:bg-zinc-700 dark:border-zinc-700 dark:hover:bg-zinc-900 dark:hover:border-zinc-900 dark:text-zinc-400 dark:hover:text-zinc-100">
                                            <svg class="w-4 h-4" stroke="currentColor" fill="none" stroke-width="1" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg>
                                        </a>
                                        <?php if (isset($component)) { $__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265 = $component; } ?>
<?php $component = App\View\Components\Forms\Tooltip::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.tooltip'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Tooltip::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'tooltip-actions-edit-'.e($user->uid, false).'','text' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_edit_user'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265)): ?>
<?php $component = $__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265; ?>
<?php unset($__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265); ?>
<?php endif; ?>
                                    </div>
                                    <?php endif; ?>

                                    
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_user_balance')): ?>
                                    
                                    <?php endif; ?>

                                    
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_user_details')): ?>
                                    <div>
                                    <a href="<?php echo e(admin_url('users/details/' . $user->uid), false); ?>" data-tooltip-target="tooltip-actions-view-user-details<?php echo e($user->uid, false); ?>" class="inline-flex justify-center items-center border font-semibold focus:outline-none w-8 h-8 leading-5 text-sm rounded border-gray-300 bg-white text-gray-800 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none dark:bg-zinc-700 dark:border-zinc-700 dark:hover:bg-zinc-900 dark:hover:border-zinc-900 dark:text-zinc-400 dark:hover:text-zinc-100">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 20 20" fill="currentColor"> <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/> <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"/></svg>
                                    </a>
                                    <?php if (isset($component)) { $__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265 = $component; } ?>
<?php $component = App\View\Components\Forms\Tooltip::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.tooltip'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Tooltip::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'tooltip-actions-view-user-details'.e($user->uid, false).'','text' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_user_details'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265)): ?>
<?php $component = $__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265; ?>
<?php unset($__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265); ?>
<?php endif; ?>
                                    </div>
                                    <?php endif; ?>
                                    
                                  
                                    
                                    <?php if($user->status === 'pending'): ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('activate_user')): ?>
                                    <button wire:key="option-activate-<?php echo e($user->id, false); ?>" wire:click="activate('<?php echo e($user->id, false); ?>')" data-tooltip-target="tooltip-option-activate-<?php echo e($user->id, false); ?>" class="inline-flex justify-center items-center border font-semibold focus:outline-none w-8 h-8 leading-5 text-sm rounded border-gray-300 bg-white text-red-600 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none dark:bg-zinc-700 dark:border-zinc-700 dark:hover:bg-zinc-900 dark:hover:border-zinc-900 dark:text-zinc-400 dark:hover:text-zinc-100" >

                                    
                                    <div wire:loading wire:target="activate('<?php echo e($user->id, false); ?>')">
                                        <svg role="status" class="w-4 h-4" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>
                                            <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>
                                        </svg>
                                    </div>

                                    
                                    <div wire:loading.remove wire:target="activate('<?php echo e($user->id, false); ?>')">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-500" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                                    </div>

                                    <?php if (isset($component)) { $__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265 = $component; } ?>
<?php $component = App\View\Components\Forms\Tooltip::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.tooltip'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Tooltip::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'tooltip-option-activate-'.e($user->id, false).'','text' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute( __('messages.t_activate_user'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265)): ?>
<?php $component = $__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265; ?>
<?php unset($__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265); ?>
<?php endif; ?>

                                    </button>
                                    <?php endif; ?>
                                    <?php endif; ?>

                                    
                                        <?php if($user->status !== 'banned'): ?>
                                           <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('ban_user')): ?> 
                                            <button wire:key="option-ban-<?php echo e($user->id, false); ?>" type="button" x-on:click="confirm('<?php echo e(__('messages.t_are_u_sure_u_want_to_ban_this_user'), false); ?>') ? $wire.ban('<?php echo e($user->id, false); ?>') : ''" data-tooltip-target="tooltip-option-ban-<?php echo e($user->uid, false); ?>" class="inline-flex justify-center items-center border font-semibold focus:outline-none w-8 h-8 leading-5 text-sm rounded border-gray-300 bg-white text-red-600 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none dark:bg-zinc-700 dark:border-zinc-700 dark:hover:bg-zinc-900 dark:hover:border-zinc-900 dark:text-zinc-400 dark:hover:text-zinc-100">

                                                
                                                <div wire:loading wire:target="ban('<?php echo e($user->id, false); ?>')">
                                                    <svg role="status" class="w-4 h-4 " viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>
                                                        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>
                                                    </svg>
                                                </div>

                                                
                                                <div wire:loading.remove wire:target="ban('<?php echo e($user->id, false); ?>')">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-500" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M13.477 14.89A6 6 0 015.11 6.524l8.367 8.368zm1.414-1.414L6.524 5.11a6 6 0 018.367 8.367zM18 10a8 8 0 11-16 0 8 8 0 0116 0z" clip-rule="evenodd"/></svg>
                                                </div>

                                                <?php if (isset($component)) { $__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265 = $component; } ?>
<?php $component = App\View\Components\Forms\Tooltip::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.tooltip'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Tooltip::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'tooltip-option-ban-'.e($user->uid, false).'','text' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute( __('messages.t_ban_user'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265)): ?>
<?php $component = $__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265; ?>
<?php unset($__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265); ?>
<?php endif; ?>
                                            
                                            </button>
                                           <?php endif; ?> 
                                        <?php endif; ?>
                                    
                                    
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete_user')): ?>
                                    <div>
                                        <button wire:key="option-delete-<?php echo e($user->id, false); ?>" type="button" x-on:click="confirm('<?php echo e(__('messages.t_are_u_sure_u_want_to_delete_this_user'), false); ?>') ? $wire.delete('<?php echo e($user->id, false); ?>') : ''"  data-tooltip-target="tooltip-option-delete-<?php echo e($user->uid, false); ?>" class="inline-flex justify-center items-center border font-semibold focus:outline-none w-8 h-8 leading-5 text-sm rounded border-gray-300 bg-white text-red-600 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none dark:bg-zinc-700 dark:border-zinc-700 dark:hover:bg-zinc-900 dark:hover:border-zinc-900 dark:text-zinc-400 dark:hover:text-zinc-100">
                                            <svg class="w-4 h-4" stroke="currentColor" fill="none" stroke-width="1" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                        </button>
                                        <?php if (isset($component)) { $__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265 = $component; } ?>
<?php $component = App\View\Components\Forms\Tooltip::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.tooltip'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Tooltip::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'tooltip-option-delete-'.e($user->uid, false).'','text' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_delete_user'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265)): ?>
<?php $component = $__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265; ?>
<?php unset($__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265); ?>
<?php endif; ?>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
            </tbody>
        </table>
    </div>

    
    <?php if($users->hasPages()): ?>
        <div class="bg-gray-100 px-4 py-5 sm:px-6 rounded-bl-lg rounded-br-lg flex justify-center border-t-0 border-r border-l border-b">
        <?php echo e($users->links(), false); ?>

        </div>
    <?php endif; ?>

</div>
<?php /**PATH C:\xampp\htdocs\2lancer\resources\views/livewire/admin/users/users.blade.php ENDPATH**/ ?>