<div>
    <?php if($paginator->hasPages()): ?>
        <?php (isset($this->numberOfPaginatorsRendered[$paginator->getPageName()]) ? $this->numberOfPaginatorsRendered[$paginator->getPageName()]++ : $this->numberOfPaginatorsRendered[$paginator->getPageName()] = 1); ?>

        <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center justify-between">
            <div class="flex justify-between flex-1 sm:hidden">
                <span>
                    <?php if($paginator->onFirstPage()): ?>
                        <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md select-none">
                            <?php echo __('pagination.previous'); ?>

                        </span>
                    <?php else: ?>
                        <button type="button" wire:click="previousPage('<?php echo e($paginator->getPageName(), false); ?>')" wire:loading.attr="disabled" dusk="previousPage<?php echo e($paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName(), false); ?>.before" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                            <?php echo __('pagination.previous'); ?>

                        </button>
                    <?php endif; ?>
                </span>

                <span>
                    <?php if($paginator->hasMorePages()): ?>
                        <button type="button" wire:click="nextPage('<?php echo e($paginator->getPageName(), false); ?>')" wire:loading.attr="disabled" dusk="nextPage<?php echo e($paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName(), false); ?>.before" class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                            <?php echo __('pagination.next'); ?>

                        </button>
                    <?php else: ?>
                        <span class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md select-none">
                            <?php echo __('pagination.next'); ?>

                        </span>
                    <?php endif; ?>
                </span>
            </div>

            <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                <div>
                    <p class="text-sm text-gray-700 leading-5">
                        <span><?php echo __('Showing'); ?></span>
                        <span class="font-medium"><?php echo e($paginator->firstItem(), false); ?></span>
                        <span><?php echo __('to'); ?></span>
                        <span class="font-medium"><?php echo e($paginator->lastItem(), false); ?></span>
                        <span><?php echo __('of'); ?></span>
                        <span class="font-medium"><?php echo e($paginator->total(), false); ?></span>
                        <span><?php echo __('results'); ?></span>
                    </p>
                </div>

                <div>
                    <span class="relative z-0 inline-flex rounded-md shadow-sm">
                        <span>
                            
                            <?php if($paginator->onFirstPage()): ?>
                                <span aria-disabled="true" aria-label="<?php echo e(__('pagination.previous'), false); ?>">
                                    <span class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default rounded-l-md leading-5" aria-hidden="true">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                                        </svg>
                                    </span>
                                </span>
                            <?php else: ?>
                                <button type="button" wire:click="previousPage('<?php echo e($paginator->getPageName(), false); ?>')" dusk="previousPage<?php echo e($paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName(), false); ?>.after" rel="prev" class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-l-md leading-5 hover:text-gray-400 focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-100 active:text-gray-500 transition ease-in-out duration-150" aria-label="<?php echo e(__('pagination.previous'), false); ?>">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            <?php endif; ?>
                        </span>

                        
                        <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            
                            <?php if(is_string($element)): ?>
                                <span aria-disabled="true">
                                    <span class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 cursor-default leading-5 select-none"><?php echo e($element, false); ?></span>
                                </span>
                            <?php endif; ?>

                            
                            <?php if(is_array($element)): ?>
                                <?php $__currentLoopData = $element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <span wire:key="paginator-<?php echo e($paginator->getPageName(), false); ?>-<?php echo e($this->numberOfPaginatorsRendered[$paginator->getPageName()], false); ?>-page<?php echo e($page, false); ?>">
                                        <?php if($page == $paginator->currentPage()): ?>
                                            <span aria-current="page">
                                                <span class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 select-none"><?php echo e($page, false); ?></span>
                                            </span>
                                        <?php else: ?>
                                            <button type="button" wire:click="gotoPage(<?php echo e($page, false); ?>, '<?php echo e($paginator->getPageName(), false); ?>')" class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 hover:text-gray-500 focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150" aria-label="<?php echo e(__('Go to page :page', ['page' => $page]), false); ?>">
                                                <?php echo e($page, false); ?>

                                            </button>
                                        <?php endif; ?>
                                    </span>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <span>
                            
                            <?php if($paginator->hasMorePages()): ?>
                                <button type="button" wire:click="nextPage('<?php echo e($paginator->getPageName(), false); ?>')" dusk="nextPage<?php echo e($paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName(), false); ?>.after" rel="next" class="relative inline-flex items-center px-2 py-2 -ml-px text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-r-md leading-5 hover:text-gray-400 focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-100 active:text-gray-500 transition ease-in-out duration-150" aria-label="<?php echo e(__('pagination.next'), false); ?>">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            <?php else: ?>
                                <span aria-disabled="true" aria-label="<?php echo e(__('pagination.next'), false); ?>">
                                    <span class="relative inline-flex items-center px-2 py-2 -ml-px text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default rounded-r-md leading-5" aria-hidden="true">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                        </svg>
                                    </span>
                                </span>
                            <?php endif; ?>
                        </span>
                    </span>
                </div>
            </div>
        </nav>
    <?php endif; ?>
</div>
<?php /**PATH /home/u100719507/domains/2lancer.ma/public_html/vendor/livewire/livewire/src/views/pagination/tailwind.blade.php ENDPATH**/ ?>