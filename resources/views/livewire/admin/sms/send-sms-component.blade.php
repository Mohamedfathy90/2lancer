<div class="w-full bg-white shadow rounded-lg">

    <div class="divide-y divide-gray-200 dark:divide-zinc-700 lg:col-span-9">
        <div class="py-10 px-12">

            {{-- Section header --}}
            <div class="mb-12 sm:flex items-center justify-between">
                <h2 class="text-sm leading-6 font-bold text-gray-900">{{ __('messages.t_send_sms') }}</h2>        
            </div>
            
            {{-- Section content --}}
            <div class="grid grid-cols-12 md:gap-x-8 gap-y-8 mb-6">

                {{-- Role --}}
                <div class="col-span-4">
                    <div class="w-full" wire:ignore>
                        <x-forms.select2
                            :label="__('messages.t_select_user')"
                            :placeholder="__('messages.t_select_user')"
                            model="user"
                            :options="$options"
                            :isDefer="true"
                            :isAssociative="false"
                            :componentId="$this->id"
                            value="value"
                            text="text" />
                    </div>
                    @error($user)
                    <p class="mt-1 text-xs text-red-600 dark:text-red-500">{{ $errors->first($user) }}</p> 
                    @enderror
                </div>

                {{-- Max files --}}
                <div class="col-span-12">
                    <x-forms.textarea :rows="8"
                        :label="__('messages.t_message')"
                        :placeholder="__('messages.t_enter_your_message')"
                        model="message_body" />
                        
                </div>

            </div>

        </div>

        {{-- Actions --}}
        <div class="py-4 px-4 flex justify-end sm:px-12 bg-gray-50 rounded-bl-lg rounded-br-lg">
            <x-forms.button action="send" text="{{ __('messages.t_send') }}" :block="false"  />
        </div>                    

    </div>

</div>    


