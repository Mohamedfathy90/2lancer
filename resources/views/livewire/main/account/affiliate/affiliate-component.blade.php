<main class="w-full">
    <div class="px-4 sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-zinc-800 rounded-lg shadow overflow-hidden">
            <div class="divide-y divide-gray-200 dark:divide-zinc-700 lg:grid lg:grid-cols-12 lg:divide-y-0 lg:divide-x rtl:divide-x-reverse">

                {{-- Sidebar --}}
                <aside class="lg:col-span-3 py-6 hidden lg:block" wire:ignore>
                    <x-main.account.sidebar />
                </aside>

                {{-- Section content --}}
                <div class="divide-y divide-gray-200 dark:divide-zinc-700 lg:col-span-9">

                    {{-- Form --}}
                    <div class="py-6 px-4 sm:p-6 lg:pb-8 h-[calc(100%-80px)]">

                        {{-- Section header --}}
                        <div class="mb-8">
                            <h2 class="text-base leading-6 font-bold text-gray-900 dark:text-gray-100">{{ __('messages.t_affiliate_settings') }}</h2>
                            <!-- <p class="mt-1 text-sm text-gray-500 dark:text-gray-300">{{ __('messages.t_affiliate_settings_subtitle') }}</p> -->
                        </div>
                        
                        {{-- Section content --}}
                        <div class="grid grid-cols-12 md:gap-x-8 gap-y-8 mb-6">

                            {{-- Referral Link --}}
                            <div class=" mt-2 col-span-12 md:col-span-6">
                            <label class="block text-sm font-medium tracking-wide text-gray-600 dark:text-white mb-2">{{ __('messages.t_referral_link') }}</label>
                            <input class="disabled:cursor-not-allowed focus:!ring-1 block w-full ltr:pr-10 ltr:pl-4 rtl:pl-10 rtl:!pr-4 py-3.5 placeholder:font-normal placeholder:text-[13px] dark:placeholder-zinc-300 text-sm font-medium text-zinc-800 dark:text-white rounded-md dark:bg-transparent focus:!ring-primary-600 focus:!border-primary-600 border-gray-300 dark:border-zinc-500" type="text" value="{{ url('/auth/register/?ref='.auth()->id()) }}" readonly="readonly">
                                    
                            </div>

                            {{-- Clicks Number --}}
                            @php
                            $clicks_number = App\Models\AffiliateClick::where('referral_id',auth()->id())->get()->count();
                            @endphp
                            <div class=" mt-2 col-span-12 md:col-span-6">
                            <label class="block text-sm font-medium tracking-wide text-gray-600 dark:text-white mb-2">{{ __('messages.t_clicks_number') }}</label>
                            <input class="disabled:cursor-not-allowed focus:!ring-1 block w-full ltr:pr-10 ltr:pl-4 rtl:pl-10 rtl:!pr-4 py-3.5 placeholder:font-normal placeholder:text-[13px] dark:placeholder-zinc-300 text-sm font-medium text-zinc-800 dark:text-white rounded-md dark:bg-transparent focus:!ring-primary-600 focus:!border-primary-600 border-gray-300 dark:border-zinc-500" type="text" value="{{ $clicks_number }}" readonly="readonly">
                                    
                            </div>

                            {{-- Registerations Number --}}
                            @php
                            $registerations_number = App\Models\AffiliateRegisteration::where('referral_id',auth()->id())->get()->count();
                            @endphp
                            <div class=" mt-2 col-span-12 md:col-span-6">
                            <label class="block text-sm font-medium tracking-wide text-gray-600 dark:text-white mb-2">{{ __('messages.t_registerations_number') }}</label>
                            <input class="disabled:cursor-not-allowed focus:!ring-1 block w-full ltr:pr-10 ltr:pl-4 rtl:pl-10 rtl:!pr-4 py-3.5 placeholder:font-normal placeholder:text-[13px] dark:placeholder-zinc-300 text-sm font-medium text-zinc-800 dark:text-white rounded-md dark:bg-transparent focus:!ring-primary-600 focus:!border-primary-600 border-gray-300 dark:border-zinc-500" type="text" value="{{  $registerations_number }}" readonly="readonly">
                                    
                            </div>
                        </div>
                        {{-- Section header --}}
                        <div class="mb-2 py-6 px-4 sm:p-4">
                            <h2 class="text-base leading-6 font-bold text-gray-900 dark:text-gray-100">{{ __('messages.t_affiliate_transactions') }}</h2>
                        </div>
                            
                            
                            <div class="bg-white dark:bg-zinc-800 overflow-y-auto border !border-t-0 !border-b-0 dark:border-zinc-600">
                            <table class="w-full whitespace-nowrap old-tables">
                                <thead class="bg-gray-100 dark:bg-zinc-700">
                                    <tr tabindex="0" class="focus:outline-none h-16 w-full text-sm leading-none text-gray-800 dark:text-white">
                                        <th class="font-bold  text-slate-500 dark:text-gray-300 uppercase tracking-wider text-center">{{ __('messages.t_username') }}</th>
                                        <th class="font-bold  text-slate-500 dark:text-gray-300 uppercase tracking-wider text-center">{{ __('messages.t_your_earning') }}</th>
                                        <th class="font-bold  text-slate-500 dark:text-gray-300 uppercase tracking-wider text-center">{{ __('messages.t_transaction_date') }}</th>
                                    </tr>
                                </thead>
                                <tbody class="w-full">
                                    @php
                                    $transactions = App\Models\AffiliateTransaction::where('referral_id',auth()->id())->get();
                                    @endphp
                                    @foreach ($transactions as $transaction)
                                        <tr class="focus:outline-none text-sm leading-none text-gray-800 bg-white dark:bg-zinc-600 hover:bg-gray-100 dark:hover:bg-zinc-700 border-b border-t border-gray-100 dark:border-zinc-700/40" >
                
                                            {{--username --}}
                                            <td class="text-center">
                                               <span class="font-medium  truncate max-w-[200px] block overflow-hidden dark:text-gray-100">{{ $transaction->user->fullname }}</span>
                                            </td>
                    
                                            {{--earning --}}
                                            <td class="text-center ">
                                               <span style="text-align:end;" class="font-medium  truncate max-w-[200px] block overflow-hidden dark:text-gray-100">@money($transaction->referral_earning, settings('currency')->code, true)</span>
                                            </td>
                    
                                            {{-- Date --}}
                                            <td class="text-center">
                                                <span class=" font-normal text-gray-400 dark:text-gray-200">{{ format_date($transaction->created_at, 'ago') }}</span>
                                            </td>
                    
                                           
                    
                                        </tr>
                                    @endforeach
                                    
                                </tbody>
                            </table>
                        </div>

                     
                        </div>

                  

                                     

                </div>

            </div>
        </div>
    </div>
</main>
