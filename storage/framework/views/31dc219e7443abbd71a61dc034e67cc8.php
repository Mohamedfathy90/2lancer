<div class="container" x-data="window.mTUkVVaUJscRImp" x-init="init()">

    
    <?php if(count($conversations)): ?>
        <div class="app rounded-md shadow-sm border border-gray-100 dark:border-zinc-700">

            
            <div class="header py-3 px-5">
                    
                
                <div class="">
                    <span class="text-sm font-semibold tracking-wide text-gray-700 dark:text-gray-100"><?php echo e(__('messages.t_messages'), false); ?></span>
                </div>

                
                <div class="user-settings rtl:!mr-auto rtl:!ml-[unset]">
                    
                    
                    <div class="settings">
                        <a href="<?php echo e(url('account/settings'), false); ?>" target="_blank" data-tooltip-target="tooltip-account-settings">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="3" />
                                <path d="M19.4 15a1.65 1.65 0 00.33 1.82l.06.06a2 2 0 010 2.83 2 2 0 01-2.83 0l-.06-.06a1.65 1.65 0 00-1.82-.33 1.65 1.65 0 00-1 1.51V21a2 2 0 01-2 2 2 2 0 01-2-2v-.09A1.65 1.65 0 009 19.4a1.65 1.65 0 00-1.82.33l-.06.06a2 2 0 01-2.83 0 2 2 0 010-2.83l.06-.06a1.65 1.65 0 00.33-1.82 1.65 1.65 0 00-1.51-1H3a2 2 0 01-2-2 2 2 0 012-2h.09A1.65 1.65 0 004.6 9a1.65 1.65 0 00-.33-1.82l-.06-.06a2 2 0 010-2.83 2 2 0 012.83 0l.06.06a1.65 1.65 0 001.82.33H9a1.65 1.65 0 001-1.51V3a2 2 0 012-2 2 2 0 012 2v.09a1.65 1.65 0 001 1.51 1.65 1.65 0 001.82-.33l.06-.06a2 2 0 012.83 0 2 2 0 010 2.83l-.06.06a1.65 1.65 0 00-.33 1.82V9a1.65 1.65 0 001.51 1H21a2 2 0 012 2 2 2 0 01-2 2h-.09a1.65 1.65 0 00-1.51 1z" />
                            </svg>
                            <div id="tooltip-account-settings" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs font-medium text-white bg-gray-900 rounded-sm shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                <?php echo e(__('messages.t_account_settings'), false); ?>

                            </div>
                        </a>
                    </div>

                    
                    <img class="user-profile object-cover rtl:!ml-0 rtl:!mr-4 lazy" src="<?php echo e(placeholder_img(), false); ?>" data-src="<?php echo e(src(auth()->user()->avatar), false); ?>" alt="<?php echo e(auth()->user()->username, false); ?>">

                </div>

            </div>

            
            <div class="wrapper">

                
                <div class="conversation-area rtl:!border-r-0 rtl:border-l border-gray-200 dark:border-zinc-700">

                    <?php $__currentLoopData = $conversations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="<?php echo e(url('messages', $c->uid), false); ?>" class="msg <?php echo e($c->sender->isOnline() ? 'online' : 'offline', false); ?>" wire:key="conversation-id-<?php echo e($c->uid, false); ?>">
                            <img class="msg-profile rtl:!mr-0 rtl:!ml-4 lazy" src="<?php echo e(placeholder_img(), false); ?>" data-src="<?php echo e(src($c->sender->avatar), false); ?>" alt="<?php echo e($c->sender->username, false); ?>" />
                            <div class="msg-detail">
                                <div class="msg-username flex items-center">
                                    <?php echo e($c->sender->username, false); ?>

                                    <?php if($c->unreadMessages()->count() > 0): ?>
                                        <div class="flex items-center justify-center w-5 h-5 pt-[1px] bg-primary-600 text-[11px] font-medium text-white ltr:ml-2 rtl:mr-2 rounded-full">
                                            <?php echo e($c->unreadMessages()->count(), false); ?>

                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="msg-content">

                                    <?php
                                        $latest = $c->messages()->latest()->first();
                                    ?>

                                    <?php if($latest): ?>
                                        <span class="msg-message"><?php echo e($latest->message, false); ?></span>
                                        <span class="msg-date rtl:!ml-0 rtl:!mr-1"><?php echo e(format_date($latest->created_at), false); ?></span>
                                    <?php else: ?>
                                    <?php endif; ?>

                                </div>
                            </div>
                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                    <div class="overlay"></div>
                </div>

                
                <div class="chat-area items-center justify-start pt-12" id="chat-area">
                    <div class="py-14 px-6 text-center text-sm sm:px-14">
                        <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
                        <p class="mt-4 font-semibold text-gray-900 dark:text-gray-200"><?php echo e(__('messages.t_no_conversation_selected'), false); ?></p>
                        <p class="mt-2 text-gray-500 dark:text-gray-400"><?php echo e(__('messages.t_no_conversation_selected_subtitle'), false); ?></p>
                    </div>
                </div>
            </div>
        </div>
    <?php else: ?>
        
    <div class="py-14 px-6 text-center text-sm sm:px-14 max-w-xl border-2 bg-slate-50 dark:bg-zinc-800 border-gray-200 dark:border-zinc-700 m-auto border-dashed">
        <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-6 w-6 text-gray-400 dark:text-gray-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
        <p class="mt-4 font-semibold text-gray-900 dark:text-white"><?php echo e(__('messages.t_no_conversations'), false); ?></p>
        <p class="mt-2 text-gray-500 dark:text-gray-300"><?php echo e(__('messages.t_u_dont_have_any_active_conversations'), false); ?></p>
    </div>
        
    <?php endif; ?>

</div>

<?php $__env->startPush('scripts'); ?>

    
    <script>
        function mTUkVVaUJscRImp() {
            return {

                init() {
                }

            }
        }
        window.mTUkVVaUJscRImp = mTUkVVaUJscRImp();
    </script>

<?php $__env->stopPush(); ?>

<?php $__env->startPush('styles'); ?>
    
    
    <link rel="stylesheet" href="<?php echo e(url('public/css/chat.css'), false); ?>">

<?php $__env->stopPush(); ?><?php /**PATH /home/u100719507/domains/2lancer.ma/public_html/resources/views/livewire/main/messages/messages.blade.php ENDPATH**/ ?>