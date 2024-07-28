<div class="w-full">

    
    <div class="px-4 md:px-3 py-4 md:py-5 bg-white border !border-b-0 dark:bg-gray-700 rounded-tl-lg rounded-tr-lg">
        <div class="sm:flex items-center justify-between">
            <p class="text-sm font-bold leading-wide text-gray-800">
                <?php echo e(__('messages.t_permissions_related_to_role'), false); ?> <u>  <?php echo e($role->name, false); ?>  </u>
            </p>
            <div>
                <a href="<?php echo e(admin_url('admin_management/roles'), false); ?>" class="focus:ring-2 focus:ring-offset-2 focus:ring-primary-600 inline-flex sm:ml-3 mt-4 sm:mt-0 items-start justify-start px-6 py-3 bg-primary-600 hover:bg-primary-700 focus:outline-none rounded-sm">
                    <p class="text-xs font-normal tracking-wide leading-none text-white"><?php echo e(__('messages.t_back'), false); ?></p>
                </a>
            </div>
        </div>
    </div>

    
    <div class="px-4 md:px-3 py-4 md:py-5 bg-white dark:bg-zinc-800 overflow-y-auto border !border-t-0 !border-b-0 dark:border-zinc-600">
        
        <div class="mb-6" style="direction:ltr;">
            <input type="checkbox" wire:click='select_all()' />
            <span> Select All </span> 
        
        
            <input class="ml-4" type="checkbox" wire:click='unselect_all()'  />
            <span> unSelect All </span> 
        </div> 
    
    
        <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>   
            <label class="PillList-item">
            <input type="checkbox" name="permission" wire:model="ids.<?php echo e($permission->id, false); ?>" >
            <span class="PillList-label"><?php echo e($permission->name, false); ?></span>
            </label>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    

    
        <div class="py-4 px-4 flex justify-end sm:px-12 bg-gray-50 rounded-bl-lg rounded-br-lg">
            <?php if (isset($component)) { $__componentOriginal039608dc70b2e4c26356f5d84408f584 = $component; } ?>
<?php $component = App\View\Components\Forms\Button::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Button::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['action' => 'update','text' => ''.e(__('messages.t_update'), false).'','block' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(false)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal039608dc70b2e4c26356f5d84408f584)): ?>
<?php $component = $__componentOriginal039608dc70b2e4c26356f5d84408f584; ?>
<?php unset($__componentOriginal039608dc70b2e4c26356f5d84408f584); ?>
<?php endif; ?>
        </div>  


</div>

   

</div>

<?php /**PATH /home/u100719507/domains/2lancer.ma/public_html/resources/views/livewire/admin/admin_management/permissions-component.blade.php ENDPATH**/ ?>