<div x-data="wireui_inputs_maskable({
    isLazy: <?= json_encode(filter_var($attributes->wire('model')->hasModifier('lazy'), FILTER_VALIDATE_BOOLEAN)); ?>,
    model: <?php if ((object) ($attributes->wire('model')) instanceof \Livewire\WireDirective) : ?>window.Livewire.find('<?php echo e($_instance->id, false); ?>').entangle('<?php echo e($attributes->wire('model')->value(), false); ?>')<?php echo e($attributes->wire('model')->hasModifier('defer') ? '.defer' : '', false); ?><?php else : ?>window.Livewire.find('<?php echo e($_instance->id, false); ?>').entangle('<?php echo e($attributes->wire('model'), false); ?>')<?php endif; ?>,
    emitFormatted: <?= json_encode(filter_var($emitFormatted, FILTER_VALIDATE_BOOLEAN)); ?>,
    mask: <?php echo e($mask, false); ?>,
})" <?php echo e($attributes->only('wire:key'), false); ?>>
    <?php if (isset($component)) { $__componentOriginal511d4862ff04963c3c16115c05a86a9d = $component; } ?>
<?php $component = Illuminate\View\DynamicComponent::resolve(['component' => WireUi::component('input')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('dynamic-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\DynamicComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['borderless' => $borderless,'shadowless' => $shadowless,'label' => $label,'hint' => $hint,'corner-hint' => $cornerHint,'icon' => $icon,'right-icon' => $rightIcon,'prefix' => $prefix,'suffix' => $suffix,'prepend' => $prepend,'append' => $append,'x-model' => 'input','x-on:input' => 'onInput($event.target.value)','x-on:blur' => 'emitInput','attributes' => $attributes->whereDoesntStartWith(['wire:model', 'x-model', 'wire:key'])]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal511d4862ff04963c3c16115c05a86a9d)): ?>
<?php $component = $__componentOriginal511d4862ff04963c3c16115c05a86a9d; ?>
<?php unset($__componentOriginal511d4862ff04963c3c16115c05a86a9d); ?>
<?php endif; ?>
</div>
<?php /**PATH /home/u100719507/domains/2lancer.ma/public_html/vendor/wireui/wireui/resources/views/components/inputs/maskable.blade.php ENDPATH**/ ?>