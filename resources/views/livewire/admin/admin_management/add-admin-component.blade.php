<div class="w-full bg-white shadow rounded-lg">

    <div class="divide-y divide-gray-200 dark:divide-zinc-700 lg:col-span-9">
        <div class="py-10 px-12">

            {{-- Section header --}}
            <div class="mb-12 sm:flex items-center justify-between">
                <h2 class="text-sm leading-6 font-bold text-gray-900">{{ __('messages.t_add_admin') }}</h2>
                <div>
                <a href="{{ admin_url('admin_management/registered_admins') }}" class="focus:ring-2 focus:ring-offset-2 focus:ring-primary-600 inline-flex sm:ml-3 mt-4 sm:mt-0 items-start justify-start px-6 py-3 bg-primary-600 hover:bg-primary-700 focus:outline-none rounded-sm">
                    <p class="text-xs font-normal tracking-wide leading-none text-white">{{ __('messages.t_back') }}</p>
                </a>
                </div>
            </div>
            
            {{-- Section content --}}
            <div class="grid grid-cols-12 md:gap-x-8 gap-y-8 mb-6">

                {{-- Username --}}
                <div class="col-span-6">
                    <x-forms.text-input
                        :label="__('messages.t_username')"
                        :placeholder="__('messages.t_enter_username')"
                        model="username"
                        icon="account" />
                </div>

                {{-- Email address --}}
                <div class="col-span-6">
                    <x-forms.text-input
                        :label="__('messages.t_email_address')"
                        :placeholder="__('messages.t_enter_email_address')"
                        model="email"
                        type="email"
                        icon="at" />
                </div>

                {{-- Password --}}
                <div class="col-span-12">
                    <x-forms.text-input
                        :label="__('messages.t_password')"
                        :placeholder="__('messages.t_enter_password')"
                        model="password"
                        type="password"
                        icon="lock" />
                </div>

                {{-- Role --}}
                <div class="col-span-4">
                    <div class="w-full" wire:ignore>
                        <x-forms.select2
                            :label="__('messages.t_select_role')"
                            :placeholder="__('messages.t_choose_admin_role')"
                            model="role"
                            :options="$options"
                            :isDefer="true"
                            :isAssociative="false"
                            :componentId="$this->id"
                            value="value"
                            text="text" />
                    </div>
                    @error($role)
                    <p class="mt-1 text-xs text-red-600 dark:text-red-500">{{ $errors->first($role) }}</p> 
                    @enderror
                </div>

            </div>

        </div>

        {{-- Actions --}}
        <div class="py-4 px-4 flex justify-end sm:px-12 bg-gray-50 rounded-bl-lg rounded-br-lg">
            <x-forms.button action="create" text="{{ __('messages.t_create') }}" :block="false"  />
        </div>                    

    </div>

</div>    
