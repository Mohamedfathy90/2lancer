<div class="w-full">

    
    <div class="px-4 md:px-3 py-4 md:py-5 bg-white border !border-b-0 dark:bg-gray-700 rounded-tl-lg rounded-tr-lg">
        <div class="sm:flex items-center justify-between">
            <p class="text-sm font-bold leading-wide text-gray-800">
                <?php echo e(__('messages.t_levels'), false); ?>

            </p>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('add_level')): ?>
            <div>
                <a href="<?php echo e(admin_url('levels/create'), false); ?>" class="focus:ring-2 focus:ring-offset-2 focus:ring-primary-600 inline-flex sm:ml-3 mt-4 sm:mt-0 items-start justify-start px-6 py-3 bg-primary-600 hover:bg-primary-700 focus:outline-none rounded-sm">
                    <p class="text-xs font-normal tracking-wide leading-none text-white"><?php echo e(__('messages.t_create'), false); ?></p>
                </a>
            </div>
            <?php endif; ?>
        </div>
    </div>

    
    <div class="bg-white dark:bg-zinc-800 overflow-y-auto border !border-t-0 !border-b-0 dark:border-zinc-600">
        <table class="w-full whitespace-nowrap old-tables">
            <thead class="bg-gray-200">
                <tr tabindex="0" class="focus:outline-none h-16 w-full text-sm leading-none text-gray-800 dark:text-white ">
                    <th class="font-bold text-[10px] text-slate-500 dark:text-gray-300 uppercase tracking-wider ltr:text-left ltr:pl-4 rtl:text-right rtl:pr-4"><?php echo e(__('messages.t_title'), false); ?></th>
                    <th class="font-bold text-[10px] text-slate-500 dark:text-gray-300 uppercase tracking-wider text-center"><?php echo e(__('messages.t_account_type'), false); ?></th>
                    <th class="font-bold text-[10px] text-slate-500 dark:text-gray-300 uppercase tracking-wider text-center"><?php echo e(__('messages.t_seller_sales'), false); ?></th>
                    <th class="font-bold text-[10px] text-slate-500 dark:text-gray-300 uppercase tracking-wider text-center"><?php echo e(__('messages.t_buyer_purchases'), false); ?></th>
                    <th class="font-bold text-[10px] text-slate-500 dark:text-gray-300 uppercase tracking-wider text-center"><?php echo e(__('messages.t_options'), false); ?></th>
                </tr>
            </thead>
            <tbody class="w-full">

                <?php $__currentLoopData = $levels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $level): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="focus:outline-none text-sm leading-none text-gray-800 bg-white dark:bg-zinc-600 hover:bg-gray-100 dark:hover:bg-zinc-700 border-b border-t border-gray-100 dark:border-zinc-700/40" wire:key="levels-<?php echo e($level->id, false); ?>">

                        
                        <td class="ltr:pl-4 rtl:pr-4">
                            <span class="text-xs font-bold tracking-wide" style="color: <?php echo e($level->level_color, false); ?>"><?php echo e($level->title, false); ?></span>
                        </td>

                        
                        <td class="text-center">
                            <?php if($level->account_type === 'seller'): ?>
                                <span class="text-xs font-bold tracking-wide text-gray-800"><?php echo e(__('messages.t_seller'), false); ?></span>
                            <?php else: ?>
                                <span class="text-xs font-bold tracking-wide text-gray-800"><?php echo e(__('messages.t_buyer'), false); ?></span>
                            <?php endif; ?>
                        </td>

                        
                        <td class="text-center">
                            <p class="text-xs font-medium text-gray-800 pb-1"><?php echo e(__('messages.t_max_seller_sales_number', ['max' => $level->seller_sales_max]), false); ?></p>
                            <p class="text-xs font-medium text-gray-800 pb-1"><?php echo e(__('messages.t_min_seller_sales_number', ['min' => $level->seller_sales_min]), false); ?></p>
                        </td>

                        
                        <td class="text-center">
                            <p class="text-xs font-medium text-gray-800 pb-1"><?php echo e(__('messages.t_max_buyer_purchases_number', ['max' => $level->buyer_purchases_max]), false); ?></p>
                            <p class="text-xs font-medium text-gray-800 pb-1"><?php echo e(__('messages.t_min_buyer_purchases_number', ['min' => $level->buyer_purchases_min]), false); ?></p>
                        </td>

                        
                        <td class="text-center">
                            <div class="relative inline-block text-left">
                                <div>
                                    <button data-dropdown-toggle="table-options-dropdown-<?php echo e($level->id, false); ?>" type="button" class="inline-flex justify-center items-center rounded-full h-8 w-8 bg-white dark:bg-zinc-700 hover:bg-gray-50 dark:hover:bg-zinc-800 focus:outline-none focus:ring-0" id="menu-button" aria-expanded="true" aria-haspopup="true">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600 dark:text-gray-400" viewBox="0 0 20 20" fill="currentColor"> <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z"/></svg>
                                    </button>
                                </div>
                                <div id="table-options-dropdown-<?php echo e($level->id, false); ?>" class="hidden z-40 origin-top-right absolute right-0 mt-2 w-44 rounded-md shadow-lg bg-white dark:bg-zinc-800 ring-1 ring-black ring-opacity-5 divide-y divide-gray-100 dark:divide-zinc-700 focus:outline-none" role="menu"  aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                                    <div class="py-1" role="none">

                                        
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit_level')): ?>
                                        <a href="<?php echo e(admin_url('levels/edit/' . $level->uid), false); ?>" class="text-gray-800 group flex items-center px-4 py-2 text-sm" role="menuitem" tabindex="-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="ltr:mr-3 rtl:ml-3 h-5 w-5 text-gray-400 group-hover:text-gray-500" viewBox="0 0 20 20" fill="currentColor"> <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"/></svg>
                                            <span class="text-xs font-medium"><?php echo e(__('messages.t_edit_level'), false); ?></span>
                                        </a>
                                        <?php endif; ?>
                                        
                                        
                                        <?php if($level->id !== 1 && $level->id !== 2): ?>
                                           <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete_level')): ?> 
                                            <button wire:key="option-delete-<?php echo e($level->id, false); ?>" x-on:click="confirm('<?php echo e(__('messages.t_are_u_sure_u_want_to_delete_this_level'), false); ?>') ? $wire.delete('<?php echo e($level->id, false); ?>') : ''" wire:loading.attr="disabled" wire:target="delete('<?php echo e($level->id, false); ?>')" type="button" class="text-gray-800 dark:text-gray-300 dark:hover:text-gray-400 group flex items-center px-4 py-2 text-sm" role="menuitem" tabindex="-1" >

                                                
                                                <div wire:loading wire:target="delete('<?php echo e($level->id, false); ?>')">
                                                    <svg role="status" class="ltr:mr-3 rtl:ml-3 inline w-5 h-5 text-gray-500 animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>
                                                        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>
                                                    </svg>
                                                </div>

                                                
                                                <div wire:loading.remove wire:target="delete('<?php echo e($level->id, false); ?>')">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="ltr:mr-3 rtl:ml-3 h-5 w-5 text-gray-400 group-hover:text-gray-500" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                                                </div>

                                                <span class="text-xs font-medium"><?php echo e(__('messages.t_delete_level'), false); ?></span>

                                            </button>
                                            <?php endif; ?>
                                        <?php endif; ?>

                                    </div>
                                </div>
                            </div>
                        </td>

                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
            </tbody>
        </table>
    </div>

    
    <?php if($levels->hasPages()): ?>
        <div class="bg-gray-100 px-4 py-5 sm:px-6 rounded-bl-lg rounded-br-lg flex justify-center border-t-0 border-r border-l border-b">
            <?php echo $levels->links('pagination::tailwind'); ?>

        </div>
    <?php endif; ?>

</div>
<?php /**PATH /home/u100719507/domains/2lancer.ma/public_html/resources/views/livewire/admin/levels/levels.blade.php ENDPATH**/ ?>