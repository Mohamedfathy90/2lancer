<div class="w-full">

{{-- Heading --}}
    <div class="mb-8">
        <div class="mx-auto max-w-7xl">
            <div class="lg:flex lg:items-center lg:justify-between">
    
                <div class="min-w-0 flex-1">
    
                    {{-- Section heading --}}
                    <h2 class="text-lg font-bold leading-7 text-zinc-700 dark:text-gray-50 sm:truncate sm:text-xl sm:tracking-tight">
                        @lang('messages.t_conversation_messages')
                    </h2>
    
                    {{-- Breadcrumbs --}}
                    <div class="mt-3 flex flex-col sm:flex-row sm:flex-wrap sm:space-x-6 rtl:space-x-reverse">
                        <ol class="inline-flex items-center mb-3 space-x-1 md:space-x-3 md:rtl:space-x-reverse sm:mb-0">

                            {{-- dashboard --}}
                            <li aria-current="page">
                                <div class="flex items-center">
                                    <svg aria-hidden="true" class="w-4 h-4 text-gray-400 rtl:rotate-180" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                                    <a href="{{ admin_url('/') }}" class="ltr:ml-1 rtl:mr-1 text-sm font-medium text-gray-700 hover:text-primary-600 md:ltr:ml-2 md:rtl:mr-2 dark:text-zinc-300 dark:hover:text-white">
                                        @lang('messages.t_dashboard')
                                    </a>
                                </div>
                            </li>
            
                            {{-- conversations --}}
                            <li aria-current="page">
                                <div class="flex items-center">
                                    <svg aria-hidden="true" class="w-4 h-4 text-gray-400 rtl:rotate-180" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                                    <a href="{{ admin_url('conversations') }}" class="ltr:ml-1 rtl:mr-1 text-sm font-medium text-gray-700 hover:text-primary-600 md:ltr:ml-2 md:rtl:mr-2 dark:text-zinc-300 dark:hover:text-white">
                                        @lang('messages.t_conversations')
                                    </a>
                                </div>
                            </li>
            
                            {{-- Messages --}}
                            <li aria-current="page">
                                <div class="flex items-center">
                                    <svg aria-hidden="true" class="w-4 h-4 text-gray-400 rtl:rotate-180" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                                    <span class="mx-1 text-sm font-medium text-gray-400 md:mx-2 dark:text-zinc-400">
                                        @lang('messages.t_messages')
                                    </span>
                                </div>
                            </li>
            
                        </ol>
                    </div>
                    
                </div>
    
            </div>
        </div>
    </div>


    {{-- Content --}}
    <div class="w-full bg-white border !border-b-0 dark:bg-gray-700 rounded-tl-lg rounded-tr-lg ">
                                    
    {{-- Message --}}
    
    @foreach($messages as $message)
        
    <span class="ltr:ml-2 rtl:mr-2 mt-4 block text-sm font-bold tracking-wide text-zinc-700">{{  $message->from->username }} --> {{  $message->to->username }}</span>

        @if ($message->body) 
        <div class="w-full mb-4 ltr:ml-4 rtl:mr-4">
        
            <div class="flex  items-center space-x-2 rtl:space-x-reverse">
            
            <span class="text-gray-400 text-sm leading-relaxed dark:text-zinc-300">
               
                {{ $message->body }}
            </span>
            
            {{-- Status --}}
            <span  class="px-5 py-3 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md text-center">
                @if ($message->seen)
                    <svg class="mx-auto h-6 w-6 text-blue-500" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="m2.394 13.742 4.743 3.62 7.616-8.704-1.506-1.316-6.384 7.296-3.257-2.486zm19.359-5.084-1.506-1.316-6.369 7.279-.753-.602-1.25 1.562 2.247 1.798z"></path></svg>
                @else
                    <svg class="mx-auto h-6 w-6 text-slate-400" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="m2.394 13.742 4.743 3.62 7.616-8.704-1.506-1.316-6.384 7.296-3.257-2.486zm19.359-5.084-1.506-1.316-6.369 7.279-.753-.602-1.25 1.562 2.247 1.798z"></path></svg>
                @endif
            </span>

            {{-- Date --}}
            <span  class="px-5 py-3 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md text-center">
                <div class="text-gray-600 dark:text-gray-100 text-sm font-medium whitespace-nowrap">
                    {{ format_date($message->created_at) }}
                </div>
            </span>
        
            {{-- Delete message --}}
            @can('delete_conversation')
            <div class="">
                <button type="button" wire:click="confirmDelete('{{ $message->id }}')" data-tooltip-target="tooltip-actions-delete-{{ $message->id }}" class="inline-flex justify-center items-center border font-semibold focus:outline-none w-8 h-8 leading-5 text-sm rounded border-gray-300 bg-white text-red-600 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none dark:bg-zinc-700 dark:border-zinc-700 dark:hover:bg-zinc-900 dark:hover:border-zinc-900 dark:text-zinc-400 dark:hover:text-zinc-100">
                    <svg class="w-4 h-4" stroke="currentColor" fill="none" stroke-width="1" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                </button>
                <x-forms.tooltip id="tooltip-actions-delete-{{ $message->id }}" :text="__('messages.t_delete_message')" />
            </div>
            @endcan
        </div>
        
        </div>
            
        
    @endif
    
    {{-- Attachment --}}
    @if ($message->attachment)
        <div class="w-full mb-4 flex">
                
            {{-- Label --}}
            <span class="{{ $message->body ? 'mt-4' : '' }} mb-2 block text-sm font-bold tracking-wide text-zinc-700">@lang('messages.t_attachment')</span>

            {{-- File --}}
            @php
                $attachment = json_decode($message->attachment)
            @endphp
            <div class="mt-4 flex">

                {{-- File extension preview --}}
                <div class="w-10 flex flex-col items-center">
                    <div class="fiv-sqo fiv-icon-{{ $attachment->extension }} text-4xl"></div>
                </div>

                {{-- File details --}}
                <div class="ltr:pl-3 rtl:pr-3">

                    {{-- File name --}}
                    <p class="focus:outline-none text-sm font-semibold leading-normal text-gray-800 pb-1 -mt-1 dark:text-zinc-200">
                        {{ $attachment->old_name }}
                    </p>

                    {{-- Date / Download --}}
                    <div class="focus:outline-none text-xs leading-3 text-gray-500 pt-1 space-x-2 rtl:space-x-reverse dark:text-zinc-400">
                        
                        {{-- Download --}}
                        <a href="{{ url('inbox/download', $attachment->new_name) }}" class="text-primary-600 hover:underline">@lang('messages.t_download')</a>

                        {{-- Divider --}}
                        <span class="text-gray-300 dark:text-zinc-600" aria-hidden="true">|</span>

                        {{-- Size --}}
                        <span>{{ human_filesize($attachment->size) }}</span>

                    </div>
                </div>

            </div>

            {{-- Status --}}
            <span  class="px-5 py-3 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md text-center">
                @if ($message->seen)
                    <svg class="mx-auto h-6 w-6 text-blue-500" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="m2.394 13.742 4.743 3.62 7.616-8.704-1.506-1.316-6.384 7.296-3.257-2.486zm19.359-5.084-1.506-1.316-6.369 7.279-.753-.602-1.25 1.562 2.247 1.798z"></path></svg>
                @else
                    <svg class="mx-auto h-6 w-6 text-slate-400" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="m2.394 13.742 4.743 3.62 7.616-8.704-1.506-1.316-6.384 7.296-3.257-2.486zm19.359-5.084-1.506-1.316-6.369 7.279-.753-.602-1.25 1.562 2.247 1.798z"></path></svg>
                @endif
            </span>

            {{-- Date --}}
            <span  class="px-5 py-3 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md text-center">
                <div class="text-gray-600 dark:text-gray-100 text-sm font-medium whitespace-nowrap">
                    {{ format_date($message->created_at) }}
                </div>
            </span>
        
            {{-- Delete message --}}
            @can('delete_conversation')
            <div>
                <button type="button" wire:click="confirmDelete('{{ $message->id }}')" data-tooltip-target="tooltip-actions-delete-{{ $message->id }}" class="inline-flex justify-center items-center border font-semibold focus:outline-none w-8 h-8 leading-5 text-sm rounded border-gray-300 bg-white text-red-600 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none dark:bg-zinc-700 dark:border-zinc-700 dark:hover:bg-zinc-900 dark:hover:border-zinc-900 dark:text-zinc-400 dark:hover:text-zinc-100">
                    <svg class="w-4 h-4" stroke="currentColor" fill="none" stroke-width="1" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                </button>
                <x-forms.tooltip id="tooltip-actions-delete-{{ $message->id }}" :text="__('messages.t_delete')" />
            </div>
            @endcan

        </div>
    @endif
    @endforeach
</div>
</div>


