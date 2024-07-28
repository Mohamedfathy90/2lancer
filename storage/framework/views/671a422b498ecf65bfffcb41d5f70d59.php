<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps(['model']) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['model']); ?>
<?php foreach (array_filter((['model']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<div class="custom-number-input mx-auto w-40" x-data="window._<?php echo e($uid, false); ?>" x-init="initialize()">
    <div class="w-full items-center justify-center flex flex-row relative bg-transparent mt-1">

        
        <button x-on:click="decrement" data-action="decrement" class="h-7 w-7 flex items-center justify-center bg-gray-200 text-gray-500 hover:text-gray-600 hover:bg-gray-300 rounded-full cursor-pointer outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M18 12H6"/></svg>
        </button>

        
        <input type="text" wire:model.defer="<?php echo e($model, false); ?>" class="focus:outline-none focus:ring-0 border-0 text-center w-1/4 bg-transparent font-medium text-sm hover:text-black focus:text-black  cursor-default flex items-center text-gray-700  outline-none" readonly></input>

        
        <button x-on:click="increment" data-action="increment" class="h-7 w-7 flex items-center justify-center bg-gray-200 text-gray-500 hover:text-gray-600 hover:bg-gray-300 rounded-full cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/></svg>
        </button>

    </div>
</div>

<?php $__env->startPush('scripts'); ?>
    <script>
        function _<?php echo e($uid, false); ?>() {
            return {

                quantity: <?php if ((object) ($model) instanceof \Livewire\WireDirective) : ?>window.Livewire.find('<?php echo e($_instance->id, false); ?>').entangle('<?php echo e($model->value(), false); ?>')<?php echo e($model->hasModifier('defer') ? '.defer' : '', false); ?><?php else : ?>window.Livewire.find('<?php echo e($_instance->id, false); ?>').entangle('<?php echo e($model, false); ?>')<?php endif; ?>,

                increment() {
                    // Quantity must not be greater than 10
                    if (this.quantity < 10) {
                        this.quantity++;
                    }
                },  

                // Decrement
                decrement() {
                    // Quantity must be greater than 1
                    if (this.quantity > 1) {
                        this.quantity--;
                    }
                },

                // Initialize
                initialize() {
                }

            }
        }
        window._<?php echo e($uid, false); ?> = _<?php echo e($uid, false); ?>()
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH /home/u100719507/domains/2lancer.ma/public_html/resources/views/components/forms/quantity-input.blade.php ENDPATH**/ ?>