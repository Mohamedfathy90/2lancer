<div class="w-full bg-white shadow rounded-lg">

    <div class="divide-y divide-gray-200 dark:divide-zinc-700 lg:col-span-9">
        <div class="py-10 px-12">

            {{-- Section header --}}
            <div class="mb-14">
                <h2 class="text-sm leading-6 font-bold text-gray-900">{{ __('messages.t_add_slider') }}</h2>
            </div>
            
            {{-- Section content --}}
            <div class="grid grid-cols-12 md:gap-x-8 gap-y-8 mb-6">

                {{-- Slider image --}}
                <div class="col-span-12 lg:col-span-6">
                    <x-forms.file-input :label="__('messages.t_slider_image')" model="image" />
                </div>
                
                {{-- Slider url --}}
                <div class="col-span-12">
                    <x-forms.text-input
                        :label="__('messages.t_slider_url')" 
                        :placeholder="__('messages.t_enter_slider_url')" 
                        model="url"
                        icon="link-variant" />
                </div>

            </div>

        </div>

        {{-- Actions --}}
        <div class="py-4 px-4 flex justify-end sm:px-12 bg-gray-50 rounded-bl-lg rounded-br-lg">
            <x-forms.button action="create" text="{{ __('messages.t_create') }}" :block="false"  />
        </div>                    

    </div>

</div>    
