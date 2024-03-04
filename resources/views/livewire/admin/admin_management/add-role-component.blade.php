<div class="w-full bg-white shadow rounded-lg">

    <div class="divide-y divide-gray-200 dark:divide-zinc-700 lg:col-span-9">
        <div class="py-10 px-12">

            {{-- Section header --}}
            <div class="mb-12 sm:flex items-center justify-between">
                <h2 class="text-sm leading-6 font-bold text-gray-900">{{ __('messages.t_create_role') }}</h2>
                <div>
                <a href="{{ admin_url('admin_management/roles') }}" class="focus:ring-2 focus:ring-offset-2 focus:ring-primary-600 inline-flex sm:ml-3 mt-4 sm:mt-0 items-start justify-start px-6 py-3 bg-primary-600 hover:bg-primary-700 focus:outline-none rounded-sm">
                    <p class="text-xs font-normal tracking-wide leading-none text-white">{{ __('messages.t_back') }}</p>
                </a>
                </div>
            </div>
            
            {{-- Section content --}}
            <div class="grid grid-cols-12 md:gap-x-8 gap-y-8 mb-6">

                {{-- Role name --}}
                <div class="col-span-6">
                    <x-forms.text-input
                        label="{{ __('messages.t_role_name') }}" 
                        placeholder="{{ __('messages.t_enter_role_name') }}" 
                        model="name"
                        icon="format-title" />
                </div>

            </div>

        </div>

        {{-- Actions --}}
        <div class="py-4 px-4 flex justify-end sm:px-12 bg-gray-50 rounded-bl-lg rounded-br-lg">
            <x-forms.button action="create" text="{{ __('messages.t_create') }}" :block="false"  />
        </div>                    

    </div>

</div>    
