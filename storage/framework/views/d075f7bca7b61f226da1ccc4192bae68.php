<div class="w-full">
    <div class="max-w-3xl mx-auto grid grid-cols-1 md:gap-x-6 gap-y-6 sm:px-6 lg:max-w-7xl lg:grid-flow-col-dense lg:grid-cols-3">
        <div class="space-y-6 lg:col-start-1 lg:col-span-2">
            <section aria-labelledby="applicant-information-title">
                <div class="bg-white shadow sm:rounded-lg">

                    
                    <div class="px-4 py-5 sm:px-6">
                        <h2 class="text-sm leading-6 font-bold tracking-wide text-gray-900">
                            <?php echo e(__('messages.t_user_details'), false); ?>

                        </h2>
                        <p class="mt-1 max-w-2xl text-xs text-gray-500">
                            <?php echo e(__('messages.t_more_details_about_this_user'), false); ?>

                        </p>
                    </div>

                    
                    <div class="border-t border-gray-200 px-4 py-5 sm:px-6">
                        <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">

                            
                            <div class="sm:col-span-1">
                                <dt class="text-sm font-bold text-gray-400">
                                    <?php echo e(__('messages.t_username'), false); ?>

                                </dt>
                                <dd class="mt-1 text-[13px] font-medium text-gray-900">
                                    <?php echo e($user->username, false); ?>

                                </dd>
                            </div>

                            
                            <div class="sm:col-span-1">
                                <dt class="text-sm font-bold text-gray-400">
                                    <?php echo e(__('messages.t_email_address'), false); ?>

                                </dt>
                                <dd class="mt-1 text-[13px] font-medium text-gray-900">
                                    <?php echo e($user->email, false); ?>

                                </dd>
                            </div>

                            
                            <div class="sm:col-span-1">
                                <dt class="text-sm font-bold text-gray-400">
                                    <?php echo e(__('messages.t_email_verified_at'), false); ?>

                                </dt>
                                <dd class="mt-1 text-[13px] font-medium text-gray-900">
                                    <?php if($user->email_verified_at): ?>
                                        <?php echo e(format_date($user->email_verified_at, 'ago'), false); ?>

                                    <?php else: ?>
                                        -
                                    <?php endif; ?>
                                </dd>
                            </div>

                            
                            <div class="sm:col-span-1">
                                <dt class="text-sm font-bold text-gray-400">
                                    <?php echo e(__('messages.t_account_type'), false); ?>

                                </dt>
                                <dd class="mt-1 text-[13px] font-medium text-gray-900">
                                    <?php if($user->account_type === 'seller'): ?>
                                        <?php echo e(__('messages.t_seller'), false); ?>

                                    <?php else: ?>
                                        <?php echo e(__('messages.t_buyer'), false); ?>

                                    <?php endif; ?>
                                </dd>
                            </div>

                            
                            <div class="sm:col-span-1">
                                <dt class="text-sm font-bold text-gray-400">
                                    <?php echo e(__('messages.t_level'), false); ?>

                                </dt>
                                <dd class="mt-1 text-[13px] font-medium text-gray-900">
                                    <?php if($user->level): ?>
                                        <?php echo e($user->level->title, false); ?>

                                    <?php else: ?>
                                        -
                                    <?php endif; ?>
                                </dd>
                            </div>

                            
                            <div class="sm:col-span-1">
                                <dt class="text-sm font-bold text-gray-400">
                                    <?php echo e(__('messages.t_registeration_method'), false); ?>

                                </dt>
                                <dd class="mt-1 text-[13px] font-medium text-gray-900">
                                    <?php if($user->provider_id && $user->provider_name): ?>
                                        <?php switch($user->provider_name):
                                            case ('facebook'): ?>
                                                <?php echo e(__('messages.t_facebook'), false); ?>

                                            <?php break; ?>

                                            <?php case ('twitter'): ?>
                                                <?php echo e(__('messages.t_twitter'), false); ?>

                                            <?php break; ?>

                                            <?php case ('google'): ?>
                                                <?php echo e(__('messages.t_google'), false); ?>

                                            <?php break; ?>

                                            <?php case ('github'): ?>
                                                <?php echo e(__('messages.t_github'), false); ?>

                                            <?php break; ?>

                                            <?php case ('linkedin'): ?>
                                                <?php echo e(__('messages.t_linkedin'), false); ?>

                                            <?php break; ?>

                                            <?php default: ?>
                                        <?php endswitch; ?>
                                    <?php else: ?>
                                        <?php echo e(__('messages.t_email_address'), false); ?>

                                    <?php endif; ?>
                                </dd>
                            </div>

                            
                            <div class="sm:col-span-1">
                                <dt class="text-sm font-bold text-gray-400">
                                    <?php echo e(__('messages.t_country'), false); ?>

                                </dt>
                                <dd class="mt-1 text-[13px] font-medium text-gray-900">
                                    <?php if($user->country): ?>
                                        <div class="flex items-center">
                                            <img src="<?php echo e(placeholder_img(), false); ?>" data-src="<?php echo e(url('public/img/flags/' . strtolower($user->country->code) . '.svg'), false); ?>"
                                                alt="<?php echo e($user->country->name, false); ?>" class="lazy h-3 ltr:mr-2 rtl:ml-2">
                                            <span><?php echo e($user->country->name, false); ?></span>
                                        </div>
                                    <?php else: ?>
                                        -
                                    <?php endif; ?>
                                </dd>
                            </div>

                            
                            <div class="sm:col-span-1">
                                <dt class="text-sm font-bold text-gray-400">
                                    <?php echo e(__('messages.t_fullname'), false); ?>

                                </dt>
                                <dd class="mt-1 text-[13px] font-medium text-gray-900">
                                    <?php if($user->fullname): ?>
                                        <?php echo e($user->fullname, false); ?>

                                    <?php else: ?>
                                        -
                                    <?php endif; ?>
                                </dd>
                            </div>

                            
                            <div class="sm:col-span-1">
                                <dt class="text-sm font-bold text-gray-400">
                                    <?php echo e(__('messages.t_headline'), false); ?>

                                </dt>
                                <dd class="mt-1 text-[13px] font-medium text-gray-900">
                                    <?php if($user->headline): ?>
                                        <?php echo e($user->headline, false); ?>

                                    <?php else: ?>
                                        -
                                    <?php endif; ?>
                                </dd>
                            </div>

                            
                            <div class="sm:col-span-1">
                                <dt class="text-sm font-bold text-gray-400">
                                    <?php echo e(__('messages.t_registeration_date'), false); ?>

                                </dt>
                                <dd class="mt-1 text-[13px] font-medium text-gray-900">
                                    <?php echo e(format_date($user->created_at, 'ago'), false); ?>

                                </dd>
                            </div>

                            
                            <div class="sm:col-span-1">
                                <dt class="text-sm font-bold text-gray-400">
                                    <?php echo e(__('messages.t_net_balance'), false); ?>

                                </dt>
                                <dd class="mt-1 text-xs font-black text-gray-900 ">
                                    <?php echo money($user->balance_net, settings('currency')->code, true); ?>
                                </dd>
                            </div>

                            
                            <div class="sm:col-span-1">
                                <dt class="text-sm font-bold text-gray-400">
                                    <?php echo e(__('messages.t_withdrawn_money'), false); ?>

                                </dt>
                                <dd class="mt-1 text-xs font-black text-gray-900 ">
                                    <?php echo money($user->balance_withdrawn, settings('currency')->code, true); ?>
                                </dd>
                            </div>

                            
                            <div class="sm:col-span-1">
                                <dt class="text-sm font-bold text-gray-400">
                                    <?php echo e(__('messages.t_used_for_purchases'), false); ?>

                                </dt>
                                <dd class="mt-1 text-xs font-black text-gray-900 ">
                                    <?php echo money($user->balance_purchases, settings('currency')->code, true); ?>
                                </dd>
                            </div>

                            
                            <div class="sm:col-span-1">
                                <dt class="text-sm font-bold text-gray-400">
                                    <?php echo e(__('messages.t_pending_clearance'), false); ?>

                                </dt>
                                <dd class="mt-1 text-xs font-black text-gray-900 ">
                                    <?php echo money($user->balance_pending, settings('currency')->code, true); ?>
                                </dd>
                            </div>

                            
                            <div class="sm:col-span-1">
                                <dt class="text-sm font-bold text-gray-400">
                                    <?php echo e(__('messages.t_available_balance'), false); ?>

                                </dt>
                                <dd class="mt-1 text-xs font-black text-gray-900 ">
                                    <?php echo money($user->balance_available, settings('currency')->code, true); ?>
                                </dd>
                            </div>

                            
                            <div class="sm:col-span-1">
                                <dt class="text-sm font-bold text-gray-400">
                                    <?php echo e(__('messages.t_last_activity'), false); ?>

                                </dt>
                                <dd class="mt-1 text-[13px] font-medium text-gray-900">
                                    <?php if($user->last_activity): ?>
                                        <?php echo e(format_date($user->last_activity, 'ago'), false); ?>

                                    <?php else: ?>
                                        -
                                    <?php endif; ?>
                                </dd>
                            </div>

                            
                            <div class="sm:col-span-2">
                                <dt class="text-sm font-bold text-gray-400">
                                    <?php echo e(__('messages.t_description'), false); ?>

                                </dt>
                                <dd class="mt-1 text-[13px] font-medium text-gray-900">
                                    <?php if($user->description): ?>
                                        <?php echo e($user->description, false); ?>

                                    <?php endif; ?>
                                </dd>
                            </div>

                        </dl>
                    </div>
                    <div>
                        <a href="<?php echo e(url('profile', $user->username), false); ?>" target="_blank"
                            class="block bg-gray-50 text-sm font-bold text-gray-400 text-center px-4 py-4 hover:text-gray-700 sm:rounded-b-lg"><?php echo e(__('messages.t_view_profile'), false); ?></a>
                    </div>
                </div>
            </section>
        </div>

        
        <section class="lg:col-start-3 lg:col-span-1">
            <div class="flex flex-col text-center bg-white rounded-lg shadow divide-y divide-gray-200">
                <div class="flex-1 flex flex-col p-8">
                    <img class="w-32 h-32 flex-shrink-0 mx-auto rounded-full object-cover lazy" src="<?php echo e(placeholder_img(), false); ?>" data-src="<?php echo e(src($user->avatar), false); ?>" alt="<?php echo e($user->username, false); ?>">
                    <h3 class="mt-6 text-gray-900 text-sm font-medium"><?php echo e($user->username, false); ?></h3>
                    <dl class="mt-1 flex-grow flex flex-col justify-between">
                        <dd class="mt-3">
                            <?php if($user->isOnline()): ?>
                                <span class="px-2 py-1 text-green-800 text-xs font-medium bg-green-100 rounded-full"><?php echo e(__('messages.t_online'), false); ?></span>
                            <?php else: ?>
                                <span class="px-2 py-1 text-red-800 text-xs font-medium bg-red-100 rounded-full"><?php echo e(__('messages.t_offline'), false); ?></span>
                            <?php endif; ?>
                        </dd>
                    </dl>
                </div>
            </div>
        </section>
    </div>
</div><?php /**PATH /home/u100719507/domains/2lancer.ma/public_html/resources/views/livewire/admin/users/options/details.blade.php ENDPATH**/ ?>