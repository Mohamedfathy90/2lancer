<div>
    <?php if($paginator->hasPages()): ?>
        <nav>
            <ul class="pagination">
                
                <?php if($paginator->onFirstPage()): ?>
                    <li class="page-item disabled" aria-disabled="true">
                        <span class="page-link"><?php echo app('translator')->get('pagination.previous'); ?></span>
                    </li>
                <?php else: ?>
                    <?php if(method_exists($paginator,'getCursorName')): ?>
                        <li class="page-item">
                            <button dusk="previousPage" type="button" class="page-link" wire:click="setPage('<?php echo e($paginator->previousCursor()->encode(), false); ?>','<?php echo e($paginator->getCursorName(), false); ?>')" wire:loading.attr="disabled" rel="prev"><?php echo app('translator')->get('pagination.previous'); ?></button>
                        </li>
                    <?php else: ?>
                        <li class="page-item">
                            <button type="button" dusk="previousPage<?php echo e($paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName(), false); ?>" class="page-link" wire:click="previousPage('<?php echo e($paginator->getPageName(), false); ?>')" wire:loading.attr="disabled" rel="prev"><?php echo app('translator')->get('pagination.previous'); ?></button>
                        </li>
                    <?php endif; ?>
                <?php endif; ?>

                
                <?php if($paginator->hasMorePages()): ?>
                    <?php if(method_exists($paginator,'getCursorName')): ?>
                        <li class="page-item">
                            <button dusk="nextPage" type="button" class="page-link" wire:click="setPage('<?php echo e($paginator->nextCursor()->encode(), false); ?>','<?php echo e($paginator->getCursorName(), false); ?>')" wire:loading.attr="disabled" rel="next"><?php echo app('translator')->get('pagination.next'); ?></button>
                        </li>
                    <?php else: ?>
                        <li class="page-item">
                            <button type="button" dusk="nextPage<?php echo e($paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName(), false); ?>" class="page-link" wire:click="nextPage('<?php echo e($paginator->getPageName(), false); ?>')" wire:loading.attr="disabled" rel="next"><?php echo app('translator')->get('pagination.next'); ?></button>
                        </li>
                    <?php endif; ?>
                <?php else: ?>
                    <li class="page-item disabled" aria-disabled="true">
                        <span class="page-link"><?php echo app('translator')->get('pagination.next'); ?></span>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>
    <?php endif; ?>
</div>
<?php /**PATH /home/u100719507/domains/2lancer.ma/public_html/resources/views/vendor/livewire/simple-bootstrap.blade.php ENDPATH**/ ?>