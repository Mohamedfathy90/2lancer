<div class="w-full">

    
    <?php if($step === 'overview'): ?>
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.gigs.options.steps.overview', ['gig' => $gig])->html();
} elseif ($_instance->childHasBeenRendered('WEw0OIa')) {
    $componentId = $_instance->getRenderedChildComponentId('WEw0OIa');
    $componentTag = $_instance->getRenderedChildComponentTagName('WEw0OIa');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('WEw0OIa');
} else {
    $response = \Livewire\Livewire::mount('admin.gigs.options.steps.overview', ['gig' => $gig]);
    $html = $response->html();
    $_instance->logRenderedChild('WEw0OIa', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    <?php endif; ?>

    
    <?php if($step === 'pricing'): ?>
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.gigs.options.steps.pricing', ['gig' => $gig])->html();
} elseif ($_instance->childHasBeenRendered('vgrh3vW')) {
    $componentId = $_instance->getRenderedChildComponentId('vgrh3vW');
    $componentTag = $_instance->getRenderedChildComponentTagName('vgrh3vW');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('vgrh3vW');
} else {
    $response = \Livewire\Livewire::mount('admin.gigs.options.steps.pricing', ['gig' => $gig]);
    $html = $response->html();
    $_instance->logRenderedChild('vgrh3vW', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    <?php endif; ?>

    
    <?php if($step === 'requirements'): ?>
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.gigs.options.steps.requirements', ['gig' => $gig])->html();
} elseif ($_instance->childHasBeenRendered('QS5dUYq')) {
    $componentId = $_instance->getRenderedChildComponentId('QS5dUYq');
    $componentTag = $_instance->getRenderedChildComponentTagName('QS5dUYq');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('QS5dUYq');
} else {
    $response = \Livewire\Livewire::mount('admin.gigs.options.steps.requirements', ['gig' => $gig]);
    $html = $response->html();
    $_instance->logRenderedChild('QS5dUYq', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    <?php endif; ?>

    
    <?php if($step === 'gallery'): ?>
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.gigs.options.steps.gallery', ['gig' => $gig])->html();
} elseif ($_instance->childHasBeenRendered('8J7LUq4')) {
    $componentId = $_instance->getRenderedChildComponentId('8J7LUq4');
    $componentTag = $_instance->getRenderedChildComponentTagName('8J7LUq4');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('8J7LUq4');
} else {
    $response = \Livewire\Livewire::mount('admin.gigs.options.steps.gallery', ['gig' => $gig]);
    $html = $response->html();
    $_instance->logRenderedChild('8J7LUq4', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    <?php endif; ?>

</div><?php /**PATH /home/u100719507/domains/2lancer.ma/public_html/resources/views/livewire/admin/gigs/options/edit.blade.php ENDPATH**/ ?>