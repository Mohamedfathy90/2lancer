<div class="w-full bg-white shadow rounded-lg">

    <div class="divide-y divide-gray-200 dark:divide-zinc-700 lg:col-span-9">
        <div class="py-10 px-12">

            {{-- Section header --}}
            <div class="mb-14">
                <h2 class="text-sm leading-6 font-bold text-gray-900">{{ __('messages.t_approve_files') }}</h2>
            </div>
            
            {{-- Section content --}}
            <div class="grid grid-cols-12 md:gap-x-8 gap-y-8 mb-6">

                {{-- Document ID --}}
                <div class="col-span-12">
                    <x-forms.text-input
                        label="{{ __('messages.t_verification_document_ID') }}" 
                        model="document_id"
                        icon="format-title" />
                </div>


            </div>

        </div>

        {{-- Actions --}}
        <div class="py-4 px-4 flex justify-end sm:px-12 bg-gray-50 rounded-bl-lg rounded-br-lg">
            <x-forms.button action="verify" text="{{ __('messages.t_approve') }}" :block="false"  />
        </div>                    

    </div>

</div>    
