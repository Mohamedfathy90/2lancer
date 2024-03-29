<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps(['items']) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['items']); ?>
<?php foreach (array_filter((['items']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<div x-data="window._<?php echo e($id, false); ?>" x-init="initialize()" @keydown.escape.stop="open = false; focusButton()" @click.away="onClickAway($event)" class="relative inline-block text-left">
    <div>
      <button type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-primary-600" id="menu-button" x-ref="button" @click="onButtonClick()" @keyup.space.prevent="onButtonEnter()" @keydown.enter.prevent="onButtonEnter()" aria-expanded="true" aria-haspopup="true" x-bind:aria-expanded="open.toString()" @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()">
        Options
        <svg class="-mr-1 ml-2 h-5 w-5" x-description="Heroicon name: solid/chevron-down" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
  <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
</svg>
      </button>
    </div>

    
      <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 divide-y divide-gray-100 focus:outline-none" x-ref="menu-items" x-description="Dropdown menu, show/hide based on menu state." x-bind:aria-activedescendant="activeDescendant" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1" @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()" @keydown.tab="open = false" @keydown.enter.prevent="open = false; focusButton()" @keyup.space.prevent="open = false; focusButton()">
        <div class="py-1" role="none">
          <a href="#" class="group flex items-center px-4 py-2 text-sm text-gray-700" x-state:on="Active" x-state:off="Not Active" :class="{ 'bg-gray-100 text-gray-900': activeIndex === 0, 'text-gray-700': !(activeIndex === 0) }" role="menuitem" tabindex="-1" id="menu-item-0" @mouseenter="activeIndex = 0" @mouseleave="activeIndex = -1" @click="open = false; focusButton()">
              <svg class="ltr:mr-3 rtl:ml-3 h-5 w-5 text-gray-400 group-hover:text-gray-500" x-description="Heroicon name: solid/pencil-alt" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
  <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path>
  <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path>
</svg>
              Edit
            </a>
          <a href="#" class="group flex items-center px-4 py-2 text-sm text-gray-700" :class="{ 'bg-gray-100 text-gray-900': activeIndex === 1, 'text-gray-700': !(activeIndex === 1) }" role="menuitem" tabindex="-1" id="menu-item-1" @mouseenter="activeIndex = 1" @mouseleave="activeIndex = -1" @click="open = false; focusButton()">
              <svg class="ltr:mr-3 rtl:ml-3 h-5 w-5 text-gray-400 group-hover:text-gray-500" x-description="Heroicon name: solid/duplicate" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
  <path d="M7 9a2 2 0 012-2h6a2 2 0 012 2v6a2 2 0 01-2 2H9a2 2 0 01-2-2V9z"></path>
  <path d="M5 3a2 2 0 00-2 2v6a2 2 0 002 2V5h8a2 2 0 00-2-2H5z"></path>
</svg>
              Duplicate
            </a>
        </div>
        <div class="py-1" role="none">
          <a href="#" class="text-gray-700 group flex items-center px-4 py-2 text-sm" :class="{ 'bg-gray-100 text-gray-900': activeIndex === 2, 'text-gray-700': !(activeIndex === 2) }" role="menuitem" tabindex="-1" id="menu-item-2" @mouseenter="activeIndex = 2" @mouseleave="activeIndex = -1" @click="open = false; focusButton()">
              <svg class="ltr:mr-3 rtl:ml-3 h-5 w-5 text-gray-400 group-hover:text-gray-500" x-description="Heroicon name: solid/archive" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
  <path d="M4 3a2 2 0 100 4h12a2 2 0 100-4H4z"></path>
  <path fill-rule="evenodd" d="M3 8h14v7a2 2 0 01-2 2H5a2 2 0 01-2-2V8zm5 3a1 1 0 011-1h2a1 1 0 110 2H9a1 1 0 01-1-1z" clip-rule="evenodd"></path>
</svg>
              Archive
            </a>
          <a href="#" class="text-gray-700 group flex items-center px-4 py-2 text-sm" :class="{ 'bg-gray-100 text-gray-900': activeIndex === 3, 'text-gray-700': !(activeIndex === 3) }" role="menuitem" tabindex="-1" id="menu-item-3" @mouseenter="activeIndex = 3" @mouseleave="activeIndex = -1" @click="open = false; focusButton()">
              <svg class="ltr:mr-3 rtl:ml-3 h-5 w-5 text-gray-400 group-hover:text-gray-500" x-description="Heroicon name: solid/arrow-circle-right" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
  <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.707l-3-3a1 1 0 00-1.414 1.414L10.586 9H7a1 1 0 100 2h3.586l-1.293 1.293a1 1 0 101.414 1.414l3-3a1 1 0 000-1.414z" clip-rule="evenodd"></path>
</svg>
              Move
            </a>
        </div>
        <div class="py-1" role="none">
          <a href="#" class="text-gray-700 group flex items-center px-4 py-2 text-sm" :class="{ 'bg-gray-100 text-gray-900': activeIndex === 4, 'text-gray-700': !(activeIndex === 4) }" role="menuitem" tabindex="-1" id="menu-item-4" @mouseenter="activeIndex = 4" @mouseleave="activeIndex = -1" @click="open = false; focusButton()">
              <svg class="ltr:mr-3 rtl:ml-3 h-5 w-5 text-gray-400 group-hover:text-gray-500" x-description="Heroicon name: solid/user-add" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
  <path d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z"></path>
</svg>
              Share
            </a>
          <a href="#" class="text-gray-700 group flex items-center px-4 py-2 text-sm" :class="{ 'bg-gray-100 text-gray-900': activeIndex === 5, 'text-gray-700': !(activeIndex === 5) }" role="menuitem" tabindex="-1" id="menu-item-5" @mouseenter="activeIndex = 5" @mouseleave="activeIndex = -1" @click="open = false; focusButton()">
              <svg class="ltr:mr-3 rtl:ml-3 h-5 w-5 text-gray-400 group-hover:text-gray-500" x-description="Heroicon name: solid/heart" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
  <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"></path>
</svg>
              Add to favorites
            </a>
        </div>
        <div class="py-1" role="none">
          <a href="#" class="text-gray-700 group flex items-center px-4 py-2 text-sm" :class="{ 'bg-gray-100 text-gray-900': activeIndex === 6, 'text-gray-700': !(activeIndex === 6) }" role="menuitem" tabindex="-1"  @mouseenter="activeIndex = 6" @mouseleave="activeIndex = -1" @click="open = false; focusButton()">
              <svg class="ltr:mr-3 rtl:ml-3 h-5 w-5 text-gray-400 group-hover:text-gray-500" x-description="Heroicon name: solid/trash" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
  <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
</svg>
              Delete
            </a>
        </div>
      </div>
    
  </div>

<?php $__env->startPush('scripts'); ?>
    <script>
        function _<?php echo e($id, false); ?>() {
            return {

                activeDescendant: null,
                optionCount     : null,
                open            : !1,
                activeIndex     : null,
                selectedIndex   : 0,

                initialize() {

                },

                onButtonClick() {
                    this.open ||
                        ((this.activeIndex = this.selectedIndex),
                        (this.open = !0),
                        this.$nextTick(() => {
                            this.$refs.listbox.focus(), this.$refs.listbox.children[this.activeIndex].scrollIntoView({ block: "nearest" });
                        }));
                },

                focusButton() {
                    this.$refs.button.focus();
                },

                onButtonEnter() {
                    (this.open = !this.open),
                        this.open &&
                            ((this.activeIndex = 0),
                            (this.activeDescendant = this.items[this.activeIndex].id),
                            this.$nextTick(() => {
                                this.$refs["menu-items"].focus();
                            }));
                },
                onArrowUp() {
                    if (!this.open) return (this.open = !0), (this.activeIndex = this.items.length - 1), void (this.activeDescendant = this.items[this.activeIndex].id);
                    0 !== this.activeIndex && ((this.activeIndex = -1 === this.activeIndex ? this.items.length - 1 : this.activeIndex - 1), (this.activeDescendant = this.items[this.activeIndex].id));
                },
                onArrowDown() {
                    if (!this.open) return (this.open = !0), (this.activeIndex = 0), void (this.activeDescendant = this.items[this.activeIndex].id);
                    this.activeIndex !== this.items.length - 1 && ((this.activeIndex = this.activeIndex + 1), (this.activeDescendant = this.items[this.activeIndex].id));
                },
                onClickAway(e) {
                    if (this.open) {
                        const t = ["[contentEditable=true]", "[tabindex]", "a[href]", "area[href]", "button:not([disabled])", "iframe", "input:not([disabled])", "select:not([disabled])", "textarea:not([disabled])"]
                            .map((e) => `${e}:not([tabindex='-1'])`)
                            .join(",");
                        (this.open = !1), e.target.closest(t) || this.focusButton();
                    }
                },

            }
        }
        window._<?php echo e($id, false); ?> = _<?php echo e($id, false); ?>();
    </script>
<?php $__env->stopPush(); ?><?php /**PATH /home/u100719507/domains/2lancer.ma/public_html/resources/views/components/forms/options.blade.php ENDPATH**/ ?>