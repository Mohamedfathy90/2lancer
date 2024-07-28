<div class="w-full">

    {{-- Loading --}}
    <x-forms.loading />

    {{-- Content --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-12">
        <div class="grid grid-cols-1 items-start gap-4 lg:grid-cols-3 lg:gap-8">
            
            {{-- Left side --}}
            <div class="grid grid-cols-1 gap-4 lg:col-span-2">
                <div class="overflow-hidden rounded-lg bg-white dark:bg-zinc-800 shadow px-10 py-12">
                    <div class="grid col-span-12 md:gap-x-6 gap-y-8">

                        {{-- Project title --}}
                        <div class="col-span-12">
                            <x-forms.text-input 
                                :label="__('messages.t_project_title')"
                                :placeholder="__('messages.t_enter_project_title')"
                                model="title"
                                maxlength="100"
                                svg_icon='<svg class="w-5 h-5 text-gray-400 dark:text-gray-300" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M19.045 7.401c.378-.378.586-.88.586-1.414s-.208-1.036-.586-1.414l-1.586-1.586c-.378-.378-.88-.586-1.414-.586s-1.036.208-1.413.585L4 13.585V18h4.413L19.045 7.401zm-3-3 1.587 1.585-1.59 1.584-1.586-1.585 1.589-1.584zM6 16v-1.585l7.04-7.018 1.586 1.586L7.587 16H6zm-2 4h16v2H4z"></path></svg>' />
                        </div>
    
                        {{-- Project description --}}
                        <div class="col-span-12">
                            <x-forms.textarea
                                :label="__('messages.t_project_description')"
                                :placeholder="__('messages.t_enter_project_description')"
                                model="description"
                                :rows="10"
                                maxlength="5000"
                                svg_icon='<svg class="w-5 h-5 text-gray-400 dark:text-gray-300" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M20 3H4c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2h16c1.103 0 2-.897 2-2V5c0-1.103-.897-2-2-2zM4 19V5h16l.002 14H4z"></path><path d="M6 7h12v2H6zm0 4h12v2H6zm0 4h6v2H6z"></path></svg>' />
                        </div>
    
                        {{-- Project link --}}
                        <div class="col-span-12">
                            <x-forms.text-input 
                                :label="__('messages.t_project_link_optional')"
                                :placeholder="__('messages.t_https_example_com')"
                                model="link"
                                maxlength="120"
                                svg_icon='<svg class="w-5 h-5 text-gray-400 dark:text-gray-300" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M8.465 11.293c1.133-1.133 3.109-1.133 4.242 0l.707.707 1.414-1.414-.707-.707c-.943-.944-2.199-1.465-3.535-1.465s-2.592.521-3.535 1.465L4.929 12a5.008 5.008 0 0 0 0 7.071 4.983 4.983 0 0 0 3.535 1.462A4.982 4.982 0 0 0 12 19.071l.707-.707-1.414-1.414-.707.707a3.007 3.007 0 0 1-4.243 0 3.005 3.005 0 0 1 0-4.243l2.122-2.121z"></path><path d="m12 4.929-.707.707 1.414 1.414.707-.707a3.007 3.007 0 0 1 4.243 0 3.005 3.005 0 0 1 0 4.243l-2.122 2.121c-1.133 1.133-3.109 1.133-4.242 0L10.586 12l-1.414 1.414.707.707c.943.944 2.199 1.465 3.535 1.465s2.592-.521 3.535-1.465L19.071 12a5.008 5.008 0 0 0 0-7.071 5.006 5.006 0 0 0-7.071 0z"></path></svg>' />
                        </div>
    
                        {{-- Project video --}}
                        <div class="col-span-12">
                            <x-forms.text-input 
                                :label="__('messages.t_project_video_optional')"
                                :placeholder="__('messages.t_youtube_placeholder')"
                                model="video"
                                maxlength="120"
                                svg_icon='<svg class="w-5 h-5 text-gray-400 dark:text-gray-300" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M18 7c0-1.103-.897-2-2-2H4c-1.103 0-2 .897-2 2v10c0 1.103.897 2 2 2h12c1.103 0 2-.897 2-2v-3.333L22 17V7l-4 3.333V7zm-1.998 10H4V7h12l.001 4.999L16 12l.001.001.001 4.999z"></path></svg>' />
                        </div>
    
                    </div>
                </div>
            </div>
  
            {{-- Right side --}}
            <div class="grid grid-cols-1 gap-4">

                {{-- Media --}}
                <div class="overflow-hidden rounded-lg bg-white dark:bg-zinc-800 shadow px-10 py-12 mb-6">
                    <div class="grid col-span-12 md:gap-x-6 gap-y-8">
                    
                        {{-- Thumbnail --}}
                        <div class="col-span-12">
                            <div wire:ignore>
                                <span class="mb-2 text-[0.8125rem] font-semibold tracking-wide flex items-center text-gray-700 dark:text-white">{{ __('messages.t_project_thumbnail') }}</span>
                                <x-forms.uploader
                                    model="thumbnail"
                                    id="uploader_thumbnail"
                                    :extensions="['jpg', 'jpeg', 'png']"
                                    accept="image/jpg, image/jpeg, image/png"
                                    size="{{ settings('media')->portfolio_max_size }}"
                                    max="1" />
                            </div>
                            @error('thumbnail')
                                <p class="mt-1 text-xs text-red-600">{{ $errors->first('thumbnail') }}</p>
                            @enderror

                            {{-- Preview image --}}
                            <div class="mt-3">
                                <img src="{{ src($project->thumbnail) }}" alt="{{ $project->title }}" class="h-32 w-32 rounded-lg cursor-pointer object-cover">
                            </div>

                        </div>

                        {{-- Divider --}}
                        <div class="col-span-12">
                            <span class="h-px w-full bg-gray-100 block mt-1.5"></span>
                        </div>

                        {{-- Gallery --}}
                        <div class="col-span-12">
                            <div wire:ignore>
                                <label class="mb-2 text-[0.8125rem] font-medium tracking-wide flex items-center {{ $errors->first('images') ? 'text-red-600' : 'text-gray-700 dark:text-white' }}">{{ __('messages.t_project_images') }}</label>

                                <x-forms.uploader
                                    model="images"
                                    id="uploader_images"
                                    :extensions="['jpg', 'jpeg', 'png']"
                                    accept="image/jpg, image/jpeg, image/png"
                                    size="{{ settings('media')->portfolio_max_size }}"
                                    max="{{ settings('media')->portfolio_max_images }}" />
                            </div>
                            @error('images')
                                <p class="mt-1 text-xs text-red-600">{{ $errors->first('images') }}</p>
                            @enderror
                        </div>

                        {{-- Old gallery images --}}
                        <div class="col-span-12">
                            <div class="grid grid-cols-12 gap-x-4 gap-y-6">
                                @foreach ($project->gallery as $img)
                                    <div class="col-span-6">
                                        <img src="{{ src($img->image) }}" alt="{{ $project->title }}" class="rounded-lg w-full h-32 object-cover intense cursor-pointer shadow-sm">
                                    </div>
                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>
                
                {{-- Submit --}}
                <x-forms.button :text="__('messages.t_update_project')" action="update" :block="true" />

            </div>

        </div>
    </div>

</div>

@push('styles')
    <style>
        .fileuploader-theme-thumbnails .fileuploader-thumbnails-input, .fileuploader-theme-thumbnails .fileuploader-items-list .fileuploader-item {
            width: calc(50% - 16px) !important;
            padding-top: 40% !important;
        }
    </style>
@endpush
