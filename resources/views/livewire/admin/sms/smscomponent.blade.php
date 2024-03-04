<div class="w-full">

    {{-- Section title --}}
    <div class="px-4 md:px-3 py-4 md:py-5 bg-white border !border-b-0 dark:bg-gray-700 rounded-tl-lg rounded-tr-lg">
        <div class="sm:flex items-center justify-between">
            <p class="text-sm font-bold leading-wide text-gray-800">
                {{ __('messages.t_sms_messages') }}
            </p>
        </div>
    </div>

    {{-- Content --}}
    <div class="bg-white dark:bg-zinc-800 overflow-y-auto border !border-t-0 !border-b-0 dark:border-zinc-600">
        <table class="w-full whitespace-nowrap old-tables">
            <thead class="bg-gray-200">
                    <tr tabindex="0" class="focus:outline-none h-16 w-full text-sm leading-none text-gray-800 dark:text-white">

                        {{-- receiver --}}
                        <th class="font-bold tracking-wider text-gray-600 px-5 py-4.5 text-center border-b-0 whitespace-nowrap text-xs uppercase dark:text-zinc-300 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md">@lang('messages.t_receiver_name')</th>

                        {{-- content --}}
                        <th class="font-bold tracking-wider text-gray-600 px-5 py-4.5 border-b-0 whitespace-nowrap text-xs uppercase dark:text-zinc-300 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md text-center">@lang('messages.t_message_content')</th>

                        {{-- date --}}
                        <th class="font-bold tracking-wider text-gray-600 px-5 py-4.5 text-center border-b-0 whitespace-nowrap text-xs uppercase dark:text-zinc-300 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md">@lang('messages.t_date')</th>

                    </tr>
                </thead>
                <tbody class="w-full">
                    @forelse ($messages as $message)
                    @php
                    $receiver = App\Models\User::where('id',$message->to_id)->first();
                    @endphp
                    <tr class="focus:outline-none text-sm leading-none text-gray-800 bg-white dark:bg-zinc-600 hover:bg-gray-100 dark:hover:bg-zinc-700 border-b border-t border-gray-100 dark:border-zinc-700/40" wire:key="messages-{{ $message->id }}">
                    <td class="text-center">
                        <span class="text-sm font-bold text-zinc-900 tracking-wide">{{$receiver->username}}</span>
                    </td>
                    <td class="text-center">
                        <span class="text-sm font-bold text-zinc-900 tracking-wide">{{$message->body}}</span>
                    </td>
                    <td class="text-center">
                        <span class="text-sm font-bold text-zinc-900 tracking-wide">{{$message->created_at}}</span>
                    </td>
                </tr>

                    @empty
                        <tr>
                            <td colspan="9" class="py-4.5 font-light text-sm text-gray-400 dark:text-zinc-200 text-center tracking-wide shadow-sm bg-white dark:bg-zinc-800 rounded-md">
                                @lang('messages.t_no_results_found')
                            </td>
                        </tr>
                    @endforelse
            </tbody>
            </table>
        </div>
    </div>

   

</div>


