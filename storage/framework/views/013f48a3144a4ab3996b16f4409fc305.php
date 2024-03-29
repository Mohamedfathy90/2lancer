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

    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-12 mb-16">
        <div class="mx-auto max-w-7xl">
            <div class="lg:flex lg:items-center lg:justify-between">
    
                <div class="min-w-0 flex-1">
    
                    
                    <h2 class="text-lg font-bold leading-7 text-zinc-700 dark:text-gray-50 sm:truncate sm:text-xl sm:tracking-tight">
                        <?php echo app('translator')->get('messages.t_promote_ur_proposal'); ?>
                    </h2>
    
                    
                    <div class="mt-3 flex flex-col sm:flex-row sm:flex-wrap sm:space-x-6 rtl:space-x-reverse">
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
                                    <a href="<?php echo e(url('seller/home'), false); ?>" class="ltr:ml-1 rtl:mr-1 text-sm font-medium text-gray-700 hover:text-primary-600 md:ltr:ml-2 md:rtl:mr-2 dark:text-zinc-300 dark:hover:text-white">
                                        <?php echo app('translator')->get('messages.t_my_dashboard'); ?>
                                    </a>
                                </div>
                            </li>
            
                            
                            <li aria-current="page">
                                <div class="flex items-center">
                                    <svg aria-hidden="true" class="w-4 h-4 text-gray-400 rtl:rotate-180" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                                    <span class="mx-1 text-sm font-medium text-gray-400 md:mx-2 dark:text-zinc-400">
                                        <?php echo app('translator')->get('messages.t_my_bids'); ?>
                                    </span>
                                </div>
                            </li>
            
                        </ol>
                    </div>
                    
                </div>
    
                
                <div class="mt-5 flex lg:mt-0 lg:ltr::ml-4 lg:rtl:mr-4">

                    
                    <span class="block">
                        <a href="<?php echo e(url('seller/projects/bids'), false); ?>" class="inline-flex items-center rounded-sm border border-gray-300 bg-white px-4 py-2 text-[13px] font-semibold text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-primary-600 focus:ring-offset-2 dark:bg-zinc-800 dark:border-zinc-800 dark:text-zinc-100 dark:hover:bg-zinc-900 dark:focus:ring-offset-zinc-900 dark:focus:ring-zinc-900">
                            <?php echo app('translator')->get('messages.t_back_to_proposals'); ?>
                        </a>
                    </span>
        
                </div>
    
            </div>
        </div>
    </div>

    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-12">
        <div class="grid grid-cols-1 lg:grid-cols-2 lg:gap-x-5 gap-y-6">

            
            <div class="rounded-lg bg-white shadow-sm border-gray-200 border p-5 relative mb-4 dark:bg-zinc-800 dark:border-transparent dark:shadow-none">

                
                <h4 class="text-base text-zinc-700 font-bold mb-1 dark:text-zinc-100"><?php echo app('translator')->get('messages.t_promote_bid'); ?></h4>
                <p class="leading-relaxed text-gray-500 mb-5 text-sm dark:text-zinc-400">
                    <?php echo app('translator')->get('messages.t_promote_bid_subtitle'); ?>
                </p>

                
                <h5 class="flex items-center my-8">
                    <span class="text-xs uppercase tracking-wide text-primary-600 font-semibold ltr:mr-3 rtl:ml-3">
                        <?php echo app('translator')->get('messages.t_select_payment_method'); ?>    
                    </span> 
                    <span aria-hidden="true" class="grow bg-gray-100 rounded h-0.5 dark:bg-zinc-700"></span>
                </h5>

                
                <?php if(!$selected_payment_method): ?>
                    <fieldset class="mt-4">
                        <legend class="sr-only">
                            <?php echo app('translator')->get('messages.t_select_payment_method'); ?>    
                        </legend>
                        <div class="space-y-5">

                            
                            <?php if(settings('paypal')->is_enabled): ?>
                                <div class="flex items-center">
                                    <input id="selected_payment_method_paypal" name="selected_payment_method" wire:model="selected_payment_method" value="paypal" type="radio" class="focus:ring-primary-500 h-4 w-4 text-primary-600 border-gray-300 dark:bg-zinc-600 dark:border-zinc-600 dark:focus:ring-zinc-400 dark:focus:ring-offset-zinc-800">
                                    <label for="selected_payment_method_paypal" class="flex items-center ltr:ml-3 rtl:mr-3 cursor-pointer">
                                        <span class="block text-sm font-semibold text-zinc-700 dark:text-zinc-200"> 
                                            <?php echo e(settings('paypal')->name, false); ?>    
                                        </span>
                                    </label>
                                </div>
                            <?php endif; ?>
                            
                        </div>
                    </fieldset>
                <?php endif; ?>

                
                
                <?php switch($selected_payment_method):

                    
                    case ('paypal'): ?>

                        
                        <?php
                            
                            $gateway_exchange_rate = (float)settings('paypal')->exchange_rate;
                            $exchange_total_amount = $this->calculateExchangeAmount($gateway_exchange_rate);

                        ?>
                        
                        <div class="w-full md:max-w-xs mx-auto mt-12 block">

                            
                            <div id="paypal-button-container" wire:ignore></div>

                            <script>
                                // Render the PayPal button into #paypal-button-container
                                paypal.Buttons({

                                    // Set up the transaction
                                    createOrder: function(data, actions) {
                                        return actions.order.create({
                                            purchase_units: [{
                                                amount: {
                                                    value: '<?php echo e($exchange_total_amount, false); ?>'
                                                }
                                            }]
                                        });
                                    },

                                    // Finalize the transaction
                                    onApprove: function(data, actions) {

                                        window.livewire.find('<?php echo e($_instance->id, false); ?>').checkout(data.orderID);

                                    }

                                    }).render('#paypal-button-container');
                            </script>

                        </div>

                        <?php break; ?>
                        
                    <?php default: ?>
                        
                <?php endswitch; ?>

            </div>

            
            <div class="w-full relative h-fit">
            
                
                <div class="rounded-lg bg-white shadow-sm border-gray-200 border relative mb-4 dark:bg-zinc-800 dark:shadow-none px-4 py-5 sm:px-6 <?php echo e($subscription->bid->is_highlight ? 'ltr:border-l-8 rtl:border-l-8 border-amber-300 dark:border-zinc-600' : '', false); ?>">
                
                    
                    <div class="flex items-center justify-between mb-8">
                
                        
                        <div class="flex items-center space-x-4 rtl:space-x-reverse">
                
                            
                            <a href="<?php echo e(url('profile', $subscription->bid->user->username), false); ?>" target="_blank" class="block">
                                <img class="rounded-full h-12 w-12 object-cover object-center" src="<?php echo e(src($subscription->bid->user->avatar), false); ?>" alt="<?php echo e($subscription->bid->user->username, false); ?>">
                            </a>
                
                            
                            <div class="space-y-0.5">
                
                                <div class="flex items-center">
                
                                    
                                    <?php if($subscription->bid->user->fullname): ?>
                                        <span class="font-medium text-zinc-900 text-sm hover:text-black dark:text-zinc-200 ltr:pr-1 rtl:pl-1">
                                            <?php echo e($subscription->bid->user->fullname, false); ?>

                                        </span>
                                    <?php endif; ?>
                
                                    
                                    <a href="<?php echo e(url('profile', $subscription->bid->user->username), false); ?>" class="font-medium text-gray-500 text-[13px] hover:text-primary-600 focus:text-primary-600 inline-flex items-center">
                                        <svg class="w-4 h-4" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10c1.466 0 2.961-.371 4.442-1.104l-.885-1.793C14.353 19.698 13.156 20 12 20c-4.411 0-8-3.589-8-8s3.589-8 8-8 8 3.589 8 8v1c0 .692-.313 2-1.5 2-1.396 0-1.494-1.819-1.5-2V8h-2v.025A4.954 4.954 0 0 0 12 7c-2.757 0-5 2.243-5 5s2.243 5 5 5c1.45 0 2.748-.631 3.662-1.621.524.89 1.408 1.621 2.838 1.621 2.273 0 3.5-2.061 3.5-4v-1c0-5.514-4.486-10-10-10zm0 13c-1.654 0-3-1.346-3-3s1.346-3 3-3 3 1.346 3 3-1.346 3-3 3z"></path></svg>
                                        <span><?php echo e($subscription->bid->user->username, false); ?></span>
                                    </a>
                
                                </div>
                
                                
                                <div class="flex items-center space-x-3 rtl:space-x-reverse text-[13px] dark:text-zinc-400">
                
                                    
                                    <?php if($subscription->bid->user->country): ?>
                                        <p class="flex items-center space-x-1 rtl:space-x-reverse">
                                            <img class="h-4 ltr:pr-0.5 rtl:pl-0.5 -mt-0.5 lazy" src="<?php echo e(placeholder_img(), false); ?>" data-src="<?php echo e(countryFlag($subscription->bid->user->country->code), false); ?>" alt="<?php echo e($subscription->bid->user->country->name, false); ?>">
                                        </p>
                
                                        <div class="mx-2 my-0.5 text-gray-300 dark:text-zinc-600">|</div>
                                    <?php endif; ?>
                
                                    
                                    <p class="flex shrink-0 items-center space-x-1 rtl:space-x-reverse">
                                        <svg aria-hidden="true" class="w-4 h-4 <?php echo e($subscription->bid->user->rating() == 0 ? 'text-gray-400' : 'text-amber-500', false); ?> -mt-0.5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                        <span>
                                            <?php echo e($subscription->bid->user->rating(), false); ?>

                                        </span>
                                    </p>
                
                                    
                                    <?php if($subscription->bid->user->status === 'verified'): ?>
                                        <div class="mx-2 my-0.5 text-gray-300 dark:text-zinc-600">|</div>
                                        <div class="flex shrink-0 items-center space-x-1 rtl:space-x-reverse">
                                            <svg class="w-4 h-4 text-blue-500 -mt-0.5" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                            <span><?php echo app('translator')->get('messages.t_verified'); ?></span>
                                        </div>
                                    <?php endif; ?>
                
                                </div>
                
                            </div>
                
                        </div>
                        
                        
                        <div class="shrink-0">
                            <div class="flex items-center justify-between space-x-2 rtl:space-x-reverse">
            
                                
                                <?php if($subscription->bid->amount && $subscription->bid->days): ?>
                                    <span class="flex items-center text-sm font-normal text-gray-500 dark:text-zinc-400 bg-gray-100 dark:bg-zinc-700 px-3 py-2 rounded-md">
                                        <span class="font-semibold text-zinc-800 dark:text-zinc-200"><?php echo money($subscription->bid->amount, settings('currency')->code, true); ?></span>
                                        <span class="mx-2">/</span>
                                        <div>
                                            <?php if($subscription->bid->days === 1): ?>
                                                <?php echo e($subscription->bid->days, false); ?> <?php echo e(strtolower(__('messages.t_day')), false); ?>

                                            <?php else: ?>
                                                <?php echo e($subscription->bid->days, false); ?> <?php echo e(strtolower(__('messages.t_days')), false); ?>

                                            <?php endif; ?>	
                                        </div>
                                    </span>
                                <?php endif; ?>
            
                            </div>
                        </div>
                                    
                    </div>
                    
                    
                    <?php if($subscription->bid->is_sealed): ?>
                        <div class="flex flex-col items-center justify-between rounded-lg border border-slate-200 px-4 py-3 text-gray-500 sm:flex-row sm:px-5 dark:border-zinc-700 dark:text-zinc-400">
                            
                            
                            <div class="flex items-center space-x-3 rtl:space-x-reverse">
                                <svg class="w-5 h-5 text-slate-400 flex-none ltr:-ml-2 rtl:-mr-2" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm0 18c-4.411 0-8-3.589-8-8s3.589-8 8-8 8 3.589 8 8-3.589 8-8 8z"></path><path d="M11 11h2v6h-2zm0-4h2v2h-2z"></path></svg>
                                <p class="text-sm"><?php echo app('translator')->get('messages.t_this_bid_sealed_explain'); ?></p>
                            </div>
                
                            
                            <span class="text-white bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-0 font-medium rounded-full text-xs tracking-wide px-8 py-2 text-center ltr:ml-6 rtl:mr-6">
                                <?php echo app('translator')->get('messages.t_sealed'); ?>
                            </span>
                            
                        </div>
                    <?php else: ?>
                        <p class="mb-2 font-light text-sm leading-relaxed text-gray-500 dark:text-gray-400">
                            <?php echo nl2br($subscription->bid->message); ?>

                        </p>
                    <?php endif; ?>
                
                    
                    <div class="mt-6 flex justify-between items-center">
                        <div class="space-x-2 rtl:space-x-reverse"></div>
                
                        <aside class="flex items-center mt-3 space-x-5 rtl:space-x-reverse text-xs text-gray-500 dark:text-zinc-300">
                
                            
                            <?php if($subscription->bid->is_sponsored): ?>
                                <div class="flex items-center space-x-1 rtl:space-x-reverse">
                                    <svg class="w-4 h-4 text-gray-400" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M11.219 3.375 8 7.399 4.781 3.375A1.002 1.002 0 0 0 3 4v15c0 1.103.897 2 2 2h14c1.103 0 2-.897 2-2V4a1.002 1.002 0 0 0-1.781-.625L16 7.399l-3.219-4.024c-.381-.474-1.181-.474-1.562 0zM5 19v-2h14.001v2H5zm10.219-9.375c.381.475 1.182.475 1.563 0L19 6.851 19.001 15H5V6.851l2.219 2.774c.381.475 1.182.475 1.563 0L12 5.601l3.219 4.024z"></path></svg>
                                    <span><?php echo e(__('messages.t_sponsored'), false); ?></span>
                                </div>
                            <?php endif; ?>
                
                            
                            <div class="flex items-center space-x-1 rtl:space-x-reverse">
                                <svg class="w-4 h-4 text-gray-400" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 4c-4.879 0-9 4.121-9 9s4.121 9 9 9 9-4.121 9-9-4.121-9-9-9zm0 16c-3.794 0-7-3.206-7-7s3.206-7 7-7 7 3.206 7 7-3.206 7-7 7z"></path><path d="M13 12V8h-2v6h6v-2zm4.284-8.293 1.412-1.416 3.01 3-1.413 1.417zm-10.586 0-2.99 2.999L2.29 5.294l2.99-3z"></path></svg>
                                <span><?php echo e(format_date($subscription->bid->created_at, 'ago'), false); ?></span>
                            </div>
                
                        </aside>
                
                    </div>
                
                </div>
            </div>

            
            <div class="w-full col-span-2">
                <div class="rounded-lg bg-white shadow-sm border-gray-200 border relative mb-4 dark:bg-zinc-800 dark:border-transparent dark:shadow-none py-6 px-6 lg:py-8">

                    <h1 class="font-bold text-base text-zinc-900 mb-6 dark:text-zinc-100"><?php echo app('translator')->get('messages.t_selected_upgrades'); ?></h1>

                    <div class="divide-y divide-gray-100 dark:divide-zinc-700 text-sm lg:mt-0">

                        
                        <?php if($subscription->bid?->is_sponsored): ?>
                            <?php
                                $sponsored = \App\Models\ProjectBiddingPlan::wherePlanType('sponsored')->first();
                            ?>
                            <?php if($sponsored): ?>
                                <div class="pb-4 flex items-center justify-between">
                                    <dt class="text-gray-600 dark:text-zinc-300">
                                        <span class="font-semibold px-3 py-1 rounded-sm text-[13px] tracking-wide" style="color: <?php echo e($sponsored->badge_text_color, false); ?>;background-color: <?php echo e($sponsored->badge_bg_color, false); ?>">
                                            <?php echo e(__('messages.t_' . $sponsored->plan_type), false); ?>

                                        </span>
                                        <p class="text-[13px] mt-2">
                                            <?php echo e(__('messages.t_bidding_plan_' . $sponsored->plan_type . '_subtitle'), false); ?>

                                        </p>    
                                    </dt>
                                    <dd class="font-medium text-gray-900 ltr:pl-10 rtl:pr-10 dark:text-white">
                                        <?php echo money($sponsored->price, settings('currency')->code, true); ?>
                                    </dd>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>

                        
                        <?php if($subscription->bid?->is_sealed): ?>
                            <?php
                                $sealed = \App\Models\ProjectBiddingPlan::wherePlanType('sealed')->first();
                            ?>
                            <?php if($sealed): ?>
                                <div class="py-4 flex items-center justify-between">
                                    <dt class="text-gray-600 dark:text-zinc-300">
                                        <span class="font-semibold px-3 py-1 rounded-sm text-[13px] tracking-wide" style="color: <?php echo e($sealed->badge_text_color, false); ?>;background-color: <?php echo e($sealed->badge_bg_color, false); ?>">
                                            <?php echo e(__('messages.t_' . $sealed->plan_type), false); ?>

                                        </span>
                                        <p class="text-[13px] mt-2">
                                            <?php echo e(__('messages.t_bidding_plan_' . $sealed->plan_type . '_subtitle'), false); ?>

                                        </p>    
                                    </dt>
                                    <dd class="font-medium text-gray-900 ltr:pl-10 rtl:pr-10 dark:text-white">
                                        <?php echo money($sealed->price, settings('currency')->code, true); ?>
                                    </dd>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>

                        
                        <?php if($subscription->bid?->is_highlight): ?>
                            <?php
                                $highlight = \App\Models\ProjectBiddingPlan::wherePlanType('highlight')->first();
                            ?>
                            <?php if($highlight): ?>
                                <div class="py-4 flex items-center justify-between">
                                    <dt class="text-gray-600 dark:text-zinc-300">
                                        <span class="font-semibold px-3 py-1 rounded-sm text-[13px] tracking-wide" style="color: <?php echo e($highlight->badge_text_color, false); ?>;background-color: <?php echo e($highlight->badge_bg_color, false); ?>">
                                            <?php echo e(__('messages.t_' . $highlight->plan_type), false); ?>

                                        </span>
                                        <p class="text-[13px] mt-2">
                                            <?php echo e(__('messages.t_bidding_plan_' . $highlight->plan_type . '_subtitle'), false); ?>

                                        </p>    
                                    </dt>
                                    <dd class="font-medium text-gray-900 ltr:pl-10 rtl:pr-10 dark:text-white">
                                        <?php echo money($highlight->price, settings('currency')->code, true); ?>
                                    </dd>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>

                        
                        <div class="pt-4 flex items-center justify-between">
                            <dt class="font-medium text-gray-900 dark:text-zinc-100"><?php echo app('translator')->get('messages.t_total'); ?></dt>
                            <dd class="font-medium text-primary-600">
                                <?php echo money($subscription->amount, settings('currency')->code, true); ?>
                            </dd>
                        </div>

                    </div>
                </div>
                
                
                <div class="flex items-center space-x-2 rtl:space-x-reverse justify-center mt-5 text-green-500 dark:text-green-400">
                    <svg class="w-6 h-6" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M20.995 6.9a.998.998 0 0 0-.548-.795l-8-4a1 1 0 0 0-.895 0l-8 4a1.002 1.002 0 0 0-.547.795c-.011.107-.961 10.767 8.589 15.014a.987.987 0 0 0 .812 0c9.55-4.247 8.6-14.906 8.589-15.014zM12 19.897C5.231 16.625 4.911 9.642 4.966 7.635L12 4.118l7.029 3.515c.037 1.989-.328 9.018-7.029 12.264z"></path><path d="m11 12.586-2.293-2.293-1.414 1.414L11 15.414l5.707-5.707-1.414-1.414z"></path></svg>
                    <span class="text-sm font-medium"><?php echo app('translator')->get('messages.t_ur_transaction_is_secure'); ?></span>
                </div>
            </div>

        </div>
    </div>

</div>

<?php $__env->startPush('styles'); ?>

    
    <?php if(settings('paypal')->is_enabled): ?>

        
        <?php
            $paypal_client_id = config('paypal.mode') === 'sandbox' ? config('paypal.sandbox.client_id') : config('paypal.live.client_id');
            $currency         = config('paypal.currency');
        ?>

        
        <script src="https://www.paypal.com/sdk/js?client-id=<?php echo e($paypal_client_id, false); ?>&currency=<?php echo e($currency, false); ?>"></script>

    <?php endif; ?>

<?php $__env->stopPush(); ?><?php /**PATH /home/u100719507/domains/2lancer.ma/public_html/resources/views/livewire/main/seller/projects/bids/options/checkout.blade.php ENDPATH**/ ?>