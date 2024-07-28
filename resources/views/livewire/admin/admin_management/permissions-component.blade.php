<div class="w-full">

    {{-- Section title --}}
    <div class="px-4 md:px-3 py-4 md:py-5 bg-white border !border-b-0 dark:bg-gray-700 rounded-tl-lg rounded-tr-lg">
        <div class="sm:flex items-center justify-between">
            <p class="text-sm font-bold leading-wide text-gray-800">
                {{ __('messages.t_permissions_related_to_role')}} <u>  {{ $role->name }}  </u>
            </p>
            <div>
                <a href="{{ admin_url('admin_management/roles') }}" class="focus:ring-2 focus:ring-offset-2 focus:ring-primary-600 inline-flex sm:ml-3 mt-4 sm:mt-0 items-start justify-start px-6 py-3 bg-primary-600 hover:bg-primary-700 focus:outline-none rounded-sm">
                    <p class="text-xs font-normal tracking-wide leading-none text-white">{{ __('messages.t_back') }}</p>
                </a>
            </div>
        </div>
    </div>

    {{-- Content --}}
    <div class="px-4 md:px-3 py-4 md:py-5 bg-white dark:bg-zinc-800 overflow-y-auto border !border-t-0 !border-b-0 dark:border-zinc-600">
        {{-- Select All --}}
        <div class="mb-6" style="direction:ltr;">
            <input type="checkbox" wire:click='select_all()' />
            <span> Select All </span> 
        
        {{-- unSelect All --}}
            <input class="ml-4" type="checkbox" wire:click='unselect_all()'  />
            <span> unSelect All </span> 
        </div> 
    
    
        @foreach($permissions as $permission)   
            <label class="PillList-item">
            <input type="checkbox" name="permission" wire:model="ids.{{$permission->id}}" >
            <span class="PillList-label">{{ $permission->name }}</span>
            </label>
        @endforeach
    </div>
    

    {{-- Actions --}}
        <div class="py-4 px-4 flex justify-end sm:px-12 bg-gray-50 rounded-bl-lg rounded-br-lg">
            <x-forms.button action="update" text="{{ __('messages.t_update') }}" :block="false"  />
        </div>  


</div>

   

</div>

