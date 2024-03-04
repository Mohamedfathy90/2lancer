<main class="w-full">
    <div class="px-4 sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-zinc-800 rounded-lg shadow overflow-hidden">
            <div class="divide-y divide-gray-200 dark:divide-zinc-700 lg:grid lg:grid-cols-12 lg:divide-y-0 lg:divide-x rtl:divide-x-reverse">

                
                <aside class="lg:col-span-3 py-6 hidden lg:block" wire:ignore>
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

                
                <div class="divide-y divide-gray-200 dark:divide-zinc-700 lg:col-span-9">

                    
                    <div class="py-6 px-4 sm:p-6 lg:pb-8 h-[calc(100%-80px)]">

                        
                        <div class="mb-8">
                            <h2 class="text-base leading-6 font-bold text-gray-900 dark:text-gray-100"><?php echo e(__('messages.t_affiliate_settings'), false); ?></h2>
                            <!-- <p class="mt-1 text-sm text-gray-500 dark:text-gray-300"><?php echo e(__('messages.t_affiliate_settings_subtitle'), false); ?></p> -->
                        </div>
                        
                        
                        <div class="grid grid-cols-12 md:gap-x-8 gap-y-8 mb-6">

                            
                            <div class=" mt-2 col-span-12 md:col-span-6">
                            <label class="block text-sm font-medium tracking-wide text-gray-600 dark:text-white mb-2"><?php echo e(__('messages.t_referral_link'), false); ?></label>
                            <input class="disabled:cursor-not-allowed focus:!ring-1 block w-full ltr:pr-10 ltr:pl-4 rtl:pl-10 rtl:!pr-4 py-3.5 placeholder:font-normal placeholder:text-[13px] dark:placeholder-zinc-300 text-sm font-medium text-zinc-800 dark:text-white rounded-md dark:bg-transparent focus:!ring-primary-600 focus:!border-primary-600 border-gray-300 dark:border-zinc-500" type="text" value="<?php echo e(url('/auth/register/?ref='.auth()->id()), false); ?>" readonly="readonly">
                                    
                            </div>

                            
                            <?php
                            $clicks_number = App\Models\AffiliateClick::where('referral_id',auth()->id())->get()->count();
                            ?>
                            <div class=" mt-2 col-span-12 md:col-span-6">
                            <label class="block text-sm font-medium tracking-wide text-gray-600 dark:text-white mb-2"><?php echo e(__('messages.t_clicks_number'), false); ?></label>
                            <input class="disabled:cursor-not-allowed focus:!ring-1 block w-full ltr:pr-10 ltr:pl-4 rtl:pl-10 rtl:!pr-4 py-3.5 placeholder:font-normal placeholder:text-[13px] dark:placeholder-zinc-300 text-sm font-medium text-zinc-800 dark:text-white rounded-md dark:bg-transparent focus:!ring-primary-600 focus:!border-primary-600 border-gray-300 dark:border-zinc-500" type="text" value="<?php echo e($clicks_number, false); ?>" readonly="readonly">
                                    
                            </div>

                            
                            <?php
                            $registerations_number = App\Models\AffiliateRegisteration::where('referral_id',auth()->id())->get()->count();
                            ?>
                            <div class=" mt-2 col-span-12 md:col-span-6">
                            <label class="block text-sm font-medium tracking-wide text-gray-600 dark:text-white mb-2"><?php echo e(__('messages.t_registerations_number'), false); ?></label>
                            <input class="disabled:cursor-not-allowed focus:!ring-1 block w-full ltr:pr-10 ltr:pl-4 rtl:pl-10 rtl:!pr-4 py-3.5 placeholder:font-normal placeholder:text-[13px] dark:placeholder-zinc-300 text-sm font-medium text-zinc-800 dark:text-white rounded-md dark:bg-transparent focus:!ring-primary-600 focus:!border-primary-600 border-gray-300 dark:border-zinc-500" type="text" value="<?php echo e($registerations_number, false); ?>" readonly="readonly">
                                    
                            </div>
                        </div>
                        
                        <div class="mb-2 py-6 px-4 sm:p-4">
                            <h2 class="text-base leading-6 font-bold text-gray-900 dark:text-gray-100"><?php echo e(__('messages.t_affiliate_transactions'), false); ?></h2>
                        </div>
                            
                            
                            <div class="bg-white dark:bg-zinc-800 overflow-y-auto border !border-t-0 !border-b-0 dark:border-zinc-600">
                            <table class="w-full whitespace-nowrap old-tables">
                                <thead class="bg-gray-100 dark:bg-zinc-700">
                                    <tr tabindex="0" class="focus:outline-none h-16 w-full text-sm leading-none text-gray-800 dark:text-white">
                                        <th class="font-bold  text-slate-500 dark:text-gray-300 uppercase tracking-wider text-center"><?php echo e(__('messages.t_username'), false); ?></th>
                                        <th class="font-bold  text-slate-500 dark:text-gray-300 uppercase tracking-wider text-center"><?php echo e(__('messages.t_your_earning'), false); ?></th>
                                        <th class="font-bold  text-slate-500 dark:text-gray-300 uppercase tracking-wider text-center"><?php echo e(__('messages.t_transaction_date'), false); ?></th>
                                    </tr>
                                </thead>
                                <tbody class="w-full">
                                    <?php
                                    $transactions = App\Models\AffiliateTransaction::where('referral_id',auth()->id())->get();
                                    ?>
                                    <?php $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr class="focus:outline-none text-sm leading-none text-gray-800 bg-white dark:bg-zinc-600 hover:bg-gray-100 dark:hover:bg-zinc-700 border-b border-t border-gray-100 dark:border-zinc-700/40" >
                
                                            
                                            <td class="text-center">
                                               <span class="font-medium  truncate max-w-[200px] block overflow-hidden dark:text-gray-100"><?php echo e($transaction->user->fullname, false); ?></span>
                                            </td>
                    
                                            
                                            <td class="text-center ">
                                               <span style="text-align:end;" class="font-medium  truncate max-w-[200px] block overflow-hidden dark:text-gray-100"><?php echo money($transaction->referral_earning, settings('currency')->code, true); ?></span>
                                            </td>
                    
                                            
                                            <td class="text-center">
                                                <span class=" font-normal text-gray-400 dark:text-gray-200"><?php echo e(format_date($transaction->created_at, 'ago'), false); ?></span>
                                            </td>
                    
                                           
                    
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    
                                </tbody>
                            </table>
                        </div>

                     
                        </div>

                  

                                     

                </div>

            </div>
        </div>
    </div>
</main>
<?php /**PATH /home/u100719507/domains/2lancer.ma/public_html/resources/views/livewire/main/account/affiliate/affiliate-component.blade.php ENDPATH**/ ?>