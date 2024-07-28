<div class="w-full bg-white shadow rounded-lg">

    <div class="divide-y divide-gray-200 dark:divide-zinc-700 lg:col-span-9">
        <div class="py-10 px-12">

            
            <div class="mb-14">
                <h2 class="text-sm leading-6 font-bold text-gray-900"><?php echo e(__('messages.t_sms_settings'), false); ?></h2>
            </div>
            
            
            <div class="grid grid-cols-12 md:gap-x-8 gap-y-8 mb-6">

                
                
                <div class="col-span-12">
                    <?php if (isset($component)) { $__componentOriginal0241d3f51813223308810020791c4a83 = $component; } ?>
<?php $component = App\View\Components\Forms\TextInput::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.text-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\TextInput::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_api_key')),'placeholder' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_enter_api_key')),'model' => 'api_key']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0241d3f51813223308810020791c4a83)): ?>
<?php $component = $__componentOriginal0241d3f51813223308810020791c4a83; ?>
<?php unset($__componentOriginal0241d3f51813223308810020791c4a83); ?>
<?php endif; ?>
                </div>

                
                <div class="col-span-12">
                    <?php if (isset($component)) { $__componentOriginal0241d3f51813223308810020791c4a83 = $component; } ?>
<?php $component = App\View\Components\Forms\TextInput::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.text-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\TextInput::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_base_url')),'placeholder' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_base_url')),'model' => 'base_url']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0241d3f51813223308810020791c4a83)): ?>
<?php $component = $__componentOriginal0241d3f51813223308810020791c4a83; ?>
<?php unset($__componentOriginal0241d3f51813223308810020791c4a83); ?>
<?php endif; ?>
                </div>


            </div>

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

<?php /**PATH /home/u100719507/domains/2lancer.ma/public_html/resources/views/livewire/admin/sms/settingscomponent.blade.php ENDPATH**/ ?>