<?php

namespace App\Http\Livewire\Admin\Includes;

use Livewire\Component;

class Sidebar extends Component
{

    public $links;

    /**
     * Initialize component
     *
     * @return void
     */
    public function mount()
    {
        // Set dashboard link
        $dashboard = url(config('global.dashboard_prefix'));

        // Set links
        $this->links = [

            // Home
            [
                'icon'   => '<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor"> <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"/></svg>',
                'text'   => __('messages.t_dashboard'),
                'href'   => $dashboard,
                'childs' => null
            ],

            // Users
            [
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor"> <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"/></svg>',
                'href' => null,
                'text' => __('messages.t_users'),
                'childs' => [
                    [ 'text' => auth('admin')->user()->can('browse_users') ? __('messages.t_browse_all')  :null , 'href' => "$dashboard/users"],
                    [ 'text' => auth('admin')->user()->can('add_user') ? __('messages.t_create_new')  :null , 'href' => "$dashboard/users/create" ],
                    [ 'text' => auth('admin')->user()->can('browse_levels') ? __('messages.t_levels') :null, 'href' => "$dashboard/levels" ],
                    [ 'text' => auth('admin')->user()->can('browse_verifications') ? __('messages.t_verifications') :null, 'href' => "$dashboard/verifications" ],
                    [ 'text' => auth('admin')->user()->can('browse_transactions') ? __('messages.t_transactions') :null, 'href' => "$dashboard/users/transactions" ],
                ],
            ],

            // Withdrawals
            [
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor"> <path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z"/> <path fill-rule="evenodd" d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z" clip-rule="evenodd"/></svg>',
                'href' => null,
                'text' => __('messages.t_withdrawals'),
                'childs' => [
                    [ 'text' => auth('admin')->user()->can('browse_withdrawals') ? __('messages.t_withdrawals_history') :null, 'href' => "$dashboard/withdrawals" ]
                ],
            ],

            // Portfolios
            [
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor"> <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"/></svg>',
                'href' => null,
                'text' => __('messages.t_portfolios'),
                'childs' => [
                    [ 'text' => auth('admin')->user()->can('browse_portfolios') ? __('messages.t_browse_all') : null, 'href' => "$dashboard/portfolios" ]
                ],
            ],

            // Gigs
            [
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor"> <path d="M11 17a1 1 0 001.447.894l4-2A1 1 0 0017 15V9.236a1 1 0 00-1.447-.894l-4 2a1 1 0 00-.553.894V17zM15.211 6.276a1 1 0 000-1.788l-4.764-2.382a1 1 0 00-.894 0L4.789 4.488a1 1 0 000 1.788l4.764 2.382a1 1 0 00.894 0l4.764-2.382zM4.447 8.342A1 1 0 003 9.236V15a1 1 0 00.553.894l4 2A1 1 0 009 17v-5.764a1 1 0 00-.553-.894l-4-2z"/></svg>',
                'href' => null,
                'text' => __('messages.t_gigs'),
                'childs' => [
                    [ 'text' => auth('admin')->user()->can('browse_gigs') ? __('messages.t_browse_all') : null, 'href' => "$dashboard/gigs" ]
                ],
            ],

            // Invoices
            [
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M5 2a2 2 0 00-2 2v14l3.5-2 3.5 2 3.5-2 3.5 2V4a2 2 0 00-2-2H5zm2.5 3a1.5 1.5 0 100 3 1.5 1.5 0 000-3zm6.207.293a1 1 0 00-1.414 0l-6 6a1 1 0 101.414 1.414l6-6a1 1 0 000-1.414zM12.5 10a1.5 1.5 0 100 3 1.5 1.5 0 000-3z" clip-rule="evenodd"/></svg>',
                'href' => null,
                'text' => __('messages.t_invoices'),
                'childs' => [
                    [ 'text' => auth('admin')->user()->can('browse_invoices') ? __('messages.t_browse_all') : null, 'href' => "$dashboard/invoices" ]
                ],
            ],

            // Orders
            [
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor"> <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"/></svg>',
                'href' => null,
                'text' => __('messages.t_orders'),
                'childs' => [
                    [ 'text' => auth('admin')->user()->can('browse_orders') ?__('messages.t_browse_all') :null, 'href' => "$dashboard/orders" ]
                ],
            ],

            // Refunds
            [
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M5 2a2 2 0 00-2 2v14l3.5-2 3.5 2 3.5-2 3.5 2V4a2 2 0 00-2-2H5zm4.707 3.707a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L8.414 9H10a3 3 0 013 3v1a1 1 0 102 0v-1a5 5 0 00-5-5H8.414l1.293-1.293z" clip-rule="evenodd"/></svg>',
                'href' => null,
                'text' => __('messages.t_refunds'),
                'childs' => [
                    [ 'text' => auth('admin')->user()->can('browse_refunds') ?__('messages.t_browse_all'):null, 'href' => "$dashboard/refunds" ]
                ],
            ],

            // Reviews
            [
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor"> <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>',
                'href' => null,
                'text' => __('messages.t_reviews'),
                'childs' => [
                    [ 'text' => auth('admin')->user()->can('browse_reviews') ?__('messages.t_browse_all'):null, 'href' => "$dashboard/reviews" ]
                ],
            ],

            // Projects
            [
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor"> <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z"/></svg>',
                'href' => null,
                'text' => __('messages.t_projects'),
                'childs' => [
                    [ 'text' => auth('admin')->user()->can('browse_projects') ?__('messages.t_browse_all'):null, 'href' => "$dashboard/projects" ],
                    [ 'text' => auth('admin')->user()->can('browse_bids') ?__('messages.t_bids'):null, 'href' => "$dashboard/projects/bids" ],
                    [ 'text' => auth('admin')->user()->can('browse_projects_categories') ?__('messages.t_categories'):null, 'href' => "$dashboard/projects/categories" ],
                    [ 'text' => auth('admin')->user()->can('browse_skills') ?__('messages.t_skills'):null, 'href' => "$dashboard/projects/skills" ],
                    [ 'text' => auth('admin')->user()->can('browse_projects_plans') ?__('messages.t_plans'):null, 'href' => "$dashboard/projects/plans" ],
                    [ 'text' => auth('admin')->user()->can('browse_project_subscriptions') ?__('messages.t_subscriptions'):null, 'href' => "$dashboard/projects/subscriptions" ],
                    [ 'text' => auth('admin')->user()->can('edit_projects_settings') ?__('messages.t_settings'):null, 'href' => "$dashboard/projects/settings" ],
                ],
            ],

            // Offers
            [
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor"> <path d="M4 3a2 2 0 100 4h12a2 2 0 100-4H4z"/> <path fill-rule="evenodd" d="M3 8h14v7a2 2 0 01-2 2H5a2 2 0 01-2-2V8zm5 3a1 1 0 011-1h2a1 1 0 110 2H9a1 1 0 01-1-1z" clip-rule="evenodd"/></svg>',
                'href' => null,
                'text' => __('messages.t_offers'),
                'childs' => [
                    [ 'text' => auth('admin')->user()->can('browse_offers') ?__('messages.t_browse_all'):null, 'href' => "$dashboard/offers" ]
                ],
            ],

            // Categories
            [
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor"> <path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM14 11a1 1 0 011 1v1h1a1 1 0 110 2h-1v1a1 1 0 11-2 0v-1h-1a1 1 0 110-2h1v-1a1 1 0 011-1z"/></svg>',
                'href' => null,
                'text' => __('messages.t_categories'),
                'childs' => [
                    [ 'text' => auth('admin')->user()->can('browse_categories') ?__('messages.t_categories') :null, 'href' => "$dashboard/categories" ],
                    [ 'text' => auth('admin')->user()->can('browse_subcategories') ?__('messages.t_subcategories') :null, 'href' => "$dashboard/subcategories" ]
                ],
            ],

            // Reports
            [
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>',
                'href' => null,
                'text' => __('messages.t_reports'),
                'childs' => [
                    [ 'text' => auth('admin')->user()->can('browse_users_reports')? __('messages.t_users'):null, 'href' => "$dashboard/reports/users" ],
                    [ 'text' => auth('admin')->user()->can('browse_gigs_reports')?__('messages.t_gigs'):null, 'href' => "$dashboard/reports/gigs" ],
                    [ 'text' => auth('admin')->user()->can('browse_projects_reports')?__('messages.t_projects'):null, 'href' => "$dashboard/reports/projects" ],
                    [ 'text' => auth('admin')->user()->can('browse_bids_reports')?__('messages.t_bids'):null, 'href' => "$dashboard/reports/bids" ],
                ],
            ],

            // Conversations
            [
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M18 10c0 3.866-3.582 7-8 7a8.841 8.841 0 01-4.083-.98L2 17l1.338-3.123C2.493 12.767 2 11.434 2 10c0-3.866 3.582-7 8-7s8 3.134 8 7zM7 9H5v2h2V9zm8 0h-2v2h2V9zM9 9h2v2H9V9z" clip-rule="evenodd"/></svg>',
                'href' => null,
                'text' => __('messages.t_conversations'),
                'childs' => [
                    [ 'text' => auth('admin')->user()->can('browse_conversations')? __('messages.t_browse_all'):null, 'href' => "$dashboard/conversations" ],
                    [ 'text' => auth('admin')->user()->can('browse_banned_words')? __('messages.t_banned_words'):null, 'href' => "$dashboard/conversations/banned_words" ]
                ],
            ],

            // Advertisements
            // [
            //     'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M18 3a1 1 0 00-1.447-.894L8.763 6H5a3 3 0 000 6h.28l1.771 5.316A1 1 0 008 18h1a1 1 0 001-1v-4.382l6.553 3.276A1 1 0 0018 15V3z" clip-rule="evenodd"/></svg>',
            //     'href' => null,
            //     'text' => __('messages.t_advertisements'),
            //     'childs' => [
            //         [ 'text' => __('messages.t_setup_ads'), 'href' => "$dashboard/advertisements" ]
            //     ],
            // ],

            // Blog
            [
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1H8a3 3 0 00-3 3v1.5a1.5 1.5 0 01-3 0V6z" clip-rule="evenodd"/> <path d="M6 12a2 2 0 012-2h8a2 2 0 012 2v2a2 2 0 01-2 2H2h2a2 2 0 002-2v-2z"/></svg>',
                'href' => null,
                'text' => __('messages.t_blog'),
                'childs' => [
                    [ 'text' => auth('admin')->user()->can('browse_articles')?__('messages.t_browse_articles'):null, 'href' => "$dashboard/blog" ],
                    [ 'text' => auth('admin')->user()->can('browse_comments')?__('messages.t_comments'):null, 'href' => "$dashboard/blog/comments" ],
                    [ 'text' => auth('admin')->user()->can('add_article')?__('messages.t_create_article'):null, 'href' => "$dashboard/blog/create" ],
                    [ 'text' => auth('admin')->user()->can('edit_blog_settings')?__('messages.t_blog_settings'):null, 'href' => "$dashboard/blog/settings" ],
                ],
            ],

            // Support
            [
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-2 0c0 .993-.241 1.929-.668 2.754l-1.524-1.525a3.997 3.997 0 00.078-2.183l1.562-1.562C15.802 8.249 16 9.1 16 10zm-5.165 3.913l1.58 1.58A5.98 5.98 0 0110 16a5.976 5.976 0 01-2.516-.552l1.562-1.562a4.006 4.006 0 001.789.027zm-4.677-2.796a4.002 4.002 0 01-.041-2.08l-.08.08-1.53-1.533A5.98 5.98 0 004 10c0 .954.223 1.856.619 2.657l1.54-1.54zm1.088-6.45A5.974 5.974 0 0110 4c.954 0 1.856.223 2.657.619l-1.54 1.54a4.002 4.002 0 00-2.346.033L7.246 4.668zM12 10a2 2 0 11-4 0 2 2 0 014 0z" clip-rule="evenodd"/></svg>',
                'href' => null,
                'text' => __('messages.t_support'),
                'childs' => [
                    [ 'text' => auth('admin')->user()->can('browse_support_messages')?__('messages.t_messages'):null, 'href' => "$dashboard/support" ]
                ],
            ],

            
           // SMS
            [
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="svg-icon" style="width: 1em;height: 1em;vertical-align: middle;fill: currentColor;overflow: hidden;" viewBox="0 0 1024 1024" version="1.1"><path d="M334.222222 439.466667m-42.666666 0a42.666667 42.666667 0 1 0 85.333333 0 42.666667 42.666667 0 1 0-85.333333 0Z"/><path d="M839.111111 125.155556H184.888889c-31.288889 0-56.888889 25.6-56.888889 56.888888v684.088889c0 25.6 31.288889 38.4 48.355556 19.911111l135.111111-135.111111H839.111111c31.288889 0 56.888889-25.6 56.888889-56.888889v-512c0-31.288889-25.6-56.888889-56.888889-56.888888z m0 568.888888H311.466667c-15.644444 0-29.866667 5.688889-39.822223 17.066667L184.888889 796.444444V182.044444h654.222222v512z"/><path d="M512 439.466667m-42.666667 0a42.666667 42.666667 0 1 0 85.333334 0 42.666667 42.666667 0 1 0-85.333334 0Z"/><path d="M689.777778 439.466667m-42.666667 0a42.666667 42.666667 0 1 0 85.333333 0 42.666667 42.666667 0 1 0-85.333333 0Z"/></svg>',
                'href' => null,
                'text' => __('messages.t_sms_messages'),
                'childs' => [
                    [ 'text' => auth('admin')->user()->can('browse_sms')?__('messages.t_browse_all'):null, 'href' => "$dashboard/sms" ],
                    [ 'text' => auth('admin')->user()->can('send_sms')?__('messages.t_send_sms'):null, 'href' => "$dashboard/sms/send" ],
                    [ 'text' => auth('admin')->user()->can('edit_sms_settings')?__('messages.t_settings'):null, 'href' => "$dashboard/sms/settings" ],
                ],
            ],
            
            
            
            // Newsletter
            [
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M14.243 5.757a6 6 0 10-.986 9.284 1 1 0 111.087 1.678A8 8 0 1118 10a3 3 0 01-4.8 2.401A4 4 0 1114 10a1 1 0 102 0c0-1.537-.586-3.07-1.757-4.243zM12 10a2 2 0 10-4 0 2 2 0 004 0z" clip-rule="evenodd"/></svg>',
                'href' => null,
                'text' => __('messages.t_newsletter'),
                'childs' => [
                    [ 'text' => auth('admin')->user()->can('browse_newsletter_emails')?__('messages.t_browse_all'):null, 'href' => "$dashboard/newsletter" ],
                    [ 'text' => auth('admin')->user()->can('edit_newsletter_settings')?__('messages.t_settings'):null, 'href' => "$dashboard/newsletter/settings" ],
                ],
            ],

            // Languages
            [
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M7 2a1 1 0 011 1v1h3a1 1 0 110 2H9.578a18.87 18.87 0 01-1.724 4.78c.29.354.596.696.914 1.026a1 1 0 11-1.44 1.389c-.188-.196-.373-.396-.554-.6a19.098 19.098 0 01-3.107 3.567 1 1 0 01-1.334-1.49 17.087 17.087 0 003.13-3.733 18.992 18.992 0 01-1.487-2.494 1 1 0 111.79-.89c.234.47.489.928.764 1.372.417-.934.752-1.913.997-2.927H3a1 1 0 110-2h3V3a1 1 0 011-1zm6 6a1 1 0 01.894.553l2.991 5.982a.869.869 0 01.02.037l.99 1.98a1 1 0 11-1.79.895L15.383 16h-4.764l-.724 1.447a1 1 0 11-1.788-.894l.99-1.98.019-.038 2.99-5.982A1 1 0 0113 8zm-1.382 6h2.764L13 11.236 11.618 14z" clip-rule="evenodd"/></svg>',
                'href' => null,
                'text' => __('messages.t_languages'),
                'childs' => [
                    [ 'text' => auth('admin')->user()->can('browse_languages')? __('messages.t_browse_all'):null, 'href' => "$dashboard/languages" ],
                    [ 'text' => auth('admin')->user()->can('add_language')? __('messages.t_create_new'):null, 'href' => "$dashboard/languages/create" ]
                ],
            ],

            // Pages
            [
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M2 5a2 2 0 012-2h8a2 2 0 012 2v10a2 2 0 002 2H4a2 2 0 01-2-2V5zm3 1h6v4H5V6zm6 6H5v2h6v-2z" clip-rule="evenodd"/> <path d="M15 7h1a2 2 0 012 2v5.5a1.5 1.5 0 01-3 0V7z"/></svg>',
                'href' => null,
                'text' => __('messages.t_pages'),
                'childs' => [
                    [ 'text' => auth('admin')->user()->can('browse_pages')? __('messages.t_browse_all'):null, 'href' => "$dashboard/pages" ],
                    [ 'text' => auth('admin')->user()->can('add_page')?__('messages.t_create_new'):null, 'href' => "$dashboard/pages/create" ],
                ],
            ],

            // Countries
            [
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M3 6a3 3 0 013-3h10a1 1 0 01.8 1.6L14.25 8l2.55 3.4A1 1 0 0116 13H6a1 1 0 00-1 1v3a1 1 0 11-2 0V6z" clip-rule="evenodd"/></svg>',
                'href' => null,
                'text' => __('messages.t_countries'),
                'childs' => [
                    [ 'text' => auth('admin')->user()->can('browse_countries')? __('messages.t_browse_all'):null, 'href' => "$dashboard/countries" ],
                    [ 'text' => auth('admin')->user()->can('add_country')?__('messages.t_create_new'):null, 'href' => "$dashboard/countries/create" ],
                ],
            ],

            // Services
            [
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor"> <path d="M10 3.5a1.5 1.5 0 013 0V4a1 1 0 001 1h3a1 1 0 011 1v3a1 1 0 01-1 1h-.5a1.5 1.5 0 000 3h.5a1 1 0 011 1v3a1 1 0 01-1 1h-3a1 1 0 01-1-1v-.5a1.5 1.5 0 00-3 0v.5a1 1 0 01-1 1H6a1 1 0 01-1-1v-3a1 1 0 00-1-1h-.5a1.5 1.5 0 010-3H4a1 1 0 001-1V6a1 1 0 011-1h3a1 1 0 001-1v-.5z"/></svg>',
                'href' => null,
                'text' => __('messages.t_services'),
                'childs' => [
                    [ 'text' => auth('admin')->user()->can('browse_payment_gateways')? __('messages.t_payment_gateways'):null, 'href' => "$dashboard/services/payment" ],
                    [ 'text' => auth('admin')->user()->can('edit_recaptcha_settings')?__('messages.t_recaptcha'):null, 'href' => "$dashboard/services/recaptcha" ],
                    // [ 'text' => __('messages.t_cloudinary'), 'href' => "$dashboard/services/cloudinary" ],
                ],
            ],
            
            // Settings
            [
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"/></svg>',
                'href' => null,
                'text' => __('messages.t_settings'),
                'childs' => [
                    [ 'text' => auth('admin')->user()->can('edit_general_settings')?__('messages.t_general_settings_sidebar'):null, 'href' => "$dashboard/settings/general" ],
                    [ 'text' => auth('admin')->user()->can('edit_appearance_settings')?__('messages.t_appearance_settings_sidebar'):null, 'href' => "$dashboard/settings/appearance" ],
                    [ 'text' => auth('admin')->user()->can('edit_currency_settings')?__('messages.t_currency_settings_sidebar'):null, 'href' => "$dashboard/settings/currency" ],
                    [ 'text' => auth('admin')->user()->can('edit_authentication_settings')?__('messages.t_auth_settings_sidebar'):null, 'href' => "$dashboard/settings/auth" ],
                    [ 'text' => auth('admin')->user()->can('edit_livechat_settings')?__('messages.t_live_chat_settings_sidebar'):null, 'href' => "$dashboard/settings/chat" ],
                    [ 'text' => auth('admin')->user()->can('edit_commission_settings')?__('messages.t_commission_settings_sidebar'):null, 'href' => "$dashboard/settings/commission" ],
                    [ 'text' => auth('admin')->user()->can('edit_footer_settings')?__('messages.t_footer_settings_sidebar'):null, 'href' => "$dashboard/settings/footer" ],
                    [ 'text' => auth('admin')->user()->can('edit_media_settings')?__('messages.t_media_settings_sidebar'):null, 'href' => "$dashboard/settings/media" ],
                    [ 'text' => auth('admin')->user()->can('edit_publish_settings')?__('messages.t_publish_settings_sidebar'):null, 'href' => "$dashboard/settings/publish" ],
                    [ 'text' => auth('admin')->user()->can('edit_security_settings')?__('messages.t_security_settings_sidebar'):null, 'href' => "$dashboard/settings/security" ],
                    [ 'text' => auth('admin')->user()->can('edit_seo_settings')?__('messages.t_seo_settings_sidebar'):null, 'href' => "$dashboard/settings/seo" ],
                    [ 'text' => auth('admin')->user()->can('edit_smtp_settings')?__('messages.t_smtp_settings_sidebar'):null, 'href' => "$dashboard/settings/smtp" ],
                    [ 'text' => auth('admin')->user()->can('edit_hero_settings')?__('messages.t_hero_section'):null, 'href' => "$dashboard/settings/hero" ],
                    [ 'text' => auth('admin')->user()->can('edit_withdrawal_settings')?__('messages.t_withdrawal_settings_sidebar'):null, 'href' => "$dashboard/settings/withdrawal" ],
                    [ 'text' => auth('admin')->user()->can('edit_affiliate_settings')?__('messages.t_affiliate_settings_sidebar'):null, 'href' => "$dashboard/settings/affiliate" ],
                    [ 'text' => auth('admin')->user()->can('edit_cashback_settings')?__('messages.t_cashback_settings_sidebar'):null, 'href' => "$dashboard/settings/cashback" ],
                ],
            ],

          auth('admin')->user()->can('admin_management')?
            // Admin Management
            [
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M610.5 373.3c2.6-14.1 2.6-28.5 0-42.6l25.8-14.9c3-1.7 4.3-5.2 3.3-8.5-6.7-21.6-18.2-41.2-33.2-57.4-2.3-2.5-6-3.1-9-1.4l-25.8 14.9c-10.9-9.3-23.4-16.5-36.9-21.3v-29.8c0-3.4-2.4-6.4-5.7-7.1-22.3-5-45-4.8-66.2 0-3.3 .7-5.7 3.7-5.7 7.1v29.8c-13.5 4.8-26 12-36.9 21.3l-25.8-14.9c-2.9-1.7-6.7-1.1-9 1.4-15 16.2-26.5 35.8-33.2 57.4-1 3.3 .4 6.8 3.3 8.5l25.8 14.9c-2.6 14.1-2.6 28.5 0 42.6l-25.8 14.9c-3 1.7-4.3 5.2-3.3 8.5 6.7 21.6 18.2 41.1 33.2 57.4 2.3 2.5 6 3.1 9 1.4l25.8-14.9c10.9 9.3 23.4 16.5 36.9 21.3v29.8c0 3.4 2.4 6.4 5.7 7.1 22.3 5 45 4.8 66.2 0 3.3-.7 5.7-3.7 5.7-7.1v-29.8c13.5-4.8 26-12 36.9-21.3l25.8 14.9c2.9 1.7 6.7 1.1 9-1.4 15-16.2 26.5-35.8 33.2-57.4 1-3.3-.4-6.8-3.3-8.5l-25.8-14.9zM496 400.5c-26.8 0-48.5-21.8-48.5-48.5s21.8-48.5 48.5-48.5 48.5 21.8 48.5 48.5-21.7 48.5-48.5 48.5zM224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm201.2 226.5c-2.3-1.2-4.6-2.6-6.8-3.9l-7.9 4.6c-6 3.4-12.8 5.3-19.6 5.3-10.9 0-21.4-4.6-28.9-12.6-18.3-19.8-32.3-43.9-40.2-69.6-5.5-17.7 1.9-36.4 17.9-45.7l7.9-4.6c-.1-2.6-.1-5.2 0-7.8l-7.9-4.6c-16-9.2-23.4-28-17.9-45.7 .9-2.9 2.2-5.8 3.2-8.7-3.8-.3-7.5-1.2-11.4-1.2h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c10.1 0 19.5-3.2 27.2-8.5-1.2-3.8-2-7.7-2-11.8v-9.2z"/></svg>',
                'href' => null,
                'text' => __('messages.t_admin_management'),
                'childs' => [
                    [ 'text' => auth('admin')->user()->can('admin_management')?__('messages.t_roles_permissions'):null, 'href' => "$dashboard/admin_management/roles" ],
                    [ 'text' => auth('admin')->user()->can('admin_management')?__('messages.t_registered_admins'):null, 'href' => "$dashboard/admin_management/registered_admins" ],
                ],
            ]
            :null,
            // System
            [
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor"> <path d="M13 7H7v6h6V7z"/> <path fill-rule="evenodd" d="M7 2a1 1 0 012 0v1h2V2a1 1 0 112 0v1h2a2 2 0 012 2v2h1a1 1 0 110 2h-1v2h1a1 1 0 110 2h-1v2a2 2 0 01-2 2h-2v1a1 1 0 11-2 0v-1H9v1a1 1 0 11-2 0v-1H5a2 2 0 01-2-2v-2H2a1 1 0 110-2h1V9H2a1 1 0 010-2h1V5a2 2 0 012-2h2V2zM5 5h10v10H5V5z" clip-rule="evenodd"/></svg>',
                'href' => null,
                'text' => __('messages.t_system'),
                'childs' => [
                    [ 'text' => auth('admin')->user()->can('view_cron_jobs')? __('messages.t_cron_jobs'):null, 'href' => "$dashboard/system/crontab" ],
                    [ 'text' => auth('admin')->user()->can('view_site_logs')?__('messages.t_logs'):null, 'href' => "$dashboard/system/logs" ],
                    [ 'text' => auth('admin')->user()->can('edit_cache_settings')?__('messages.t_cache'):null, 'href' => "$dashboard/system/cache" ],
                    [ 'text' => auth('admin')->user()->can('edit_site_maintenance')?__('messages.t_maintenance'):null, 'href' => "$dashboard/system/maintenance" ],
                ],
            ]

        ];

        $this->links = array_filter($this->links, fn ($value) => !is_null($value));
        
    }


    /**
     * Render component
     *
     * @return Illuminate\View\View
     */
    public function render()
    {
        return view('livewire.admin.includes.sidebar');
    }
    
}
