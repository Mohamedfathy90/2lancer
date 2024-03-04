<?php ($name = $name ?? $attributes->wire('model')->value()); ?>

<div class="fixed inset-0 overflow-y-auto <?php echo e($spacing, false); ?> <?php echo e($zIndex, false); ?>"
    x-data="wireui_modal({
        show: <?php
    if (is_object($show) || is_array($show)) {
        echo "JSON.parse(atob('".base64_encode(json_encode($show))."'))";
    } elseif (is_string($show)) {
        echo "'".str_replace("'", "\'", $show)."'";
    } else {
        echo json_encode($show);
    }
?>,
        <?php if($attributes->wire('model')->value()): ?>
            model: <?php if ((object) ($attributes->wire('model')) instanceof \Livewire\WireDirective) : ?>window.Livewire.find('<?php echo e($_instance->id, false); ?>').entangle('<?php echo e($attributes->wire('model')->value(), false); ?>')<?php echo e($attributes->wire('model')->hasModifier('defer') ? '.defer' : '', false); ?><?php else : ?>window.Livewire.find('<?php echo e($_instance->id, false); ?>').entangle('<?php echo e($attributes->wire('model'), false); ?>')<?php endif; ?>
        <?php endif; ?>
    })"
    x-on:keydown.escape.window="handleEscape"
    x-on:keydown.tab.prevent="handleTab"
    x-on:keydown.shift.tab.prevent="handleShiftTab"
    x-on:open-wireui-modal:<?php echo e(Str::kebab($name), false); ?>.window="open"
    <?php echo e($attributes
        ->whereDoesntStartWith('wire:model')
        ->whereStartsWith(['x-on:', '@', 'wire:']), false); ?>

    style="display: none"
    x-cloak
    x-show="show"
    wireui-modal>
    <div class="<?php echo \Illuminate\Support\Arr::toCssClasses([
            'fixed inset-0 bg-secondary-400 dark:bg-secondary-700 bg-opacity-60',
            'dark:bg-opacity-60 transform transition-opacity',
            $blur => (bool) $blur
        ]); ?>"
        x-show="show"
        x-on:click="close"
        x-transition:enter="ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0">
    </div>

    <div class="w-full min-h-full transform flex items-end justify-center mx-auto <?php echo e($align, false); ?> <?php echo e($maxWidth, false); ?>"
        x-show="show"
        x-on:click.self="close"
        x-transition:enter="ease-out duration-300"
        x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
        x-transition:leave="ease-in duration-200"
        x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
        x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
        <?php echo e($slot, false); ?>

    </div>
</div>
<?php /**PATH /home/u100719507/domains/2lancer.ma/public_html/resources/views/vendor/wireui/components/modal.blade.php ENDPATH**/ ?>