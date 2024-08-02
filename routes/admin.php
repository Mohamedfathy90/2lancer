<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Admin\Conversations\BannedWords\BannedWordsComponent;

// Dashboard routes
Route::middleware(['web', 'banned.ip','auth:admin'])->group(function() {

    // Home
    Route::namespace('Home')->group(function() {
    
        // Index
        Route::get('/', HomeComponent::class);
    
    });

    // Profile
    Route::namespace('Profile')->group(function() {

        // Edit
        Route::get('profile', ProfileComponent::class);

    });

    // Logout
    Route::namespace('Auth')->group(function() {

        // Logout
        Route::get('logout', LogoutComponent::class);

    });

    // Invoices
    Route::namespace('Invoices')->prefix('invoices')->group(function() {

        // Index
        Route::get('/', InvoicesComponent::class);

    });

    // Users
    Route::namespace('Users')->prefix('users')->group(function() {

        // Users
        Route::get('/', UsersComponent::class)->middleware('can:browse_users');

        // Options
        Route::namespace('Options')->group(function() {

            // Create
            Route::get('create', CreateComponent::class)->middleware('can:add_user');

            // Edit
            Route::get('edit/{id}', EditComponent::class)->middleware('can:edit_user');

            // Details
            Route::get('details/{id}', DetailsComponent::class)->middleware('can:view_user_details');

            // Balance
            Route::get('balance/{id}', BalanceComponent::class)->middleware('can:view_user_balance');

        });

        // Transactions
        Route::namespace('Transactions')->prefix('transactions')->group(function() {

            // All
            Route::get('/', TransactionsComponent::class)->middleware('can:browse_transactions');

        });

        // Trashed users
        Route::namespace('Trash')->prefix('trash')->group(function() {

            // Get trashed users
            Route::get('/', TrashComponent::class)->middleware('can:view_deleted_users');

        });

    });

    // Levels
    Route::namespace('Levels')->prefix('levels')->group(function() {

        // Levels
        Route::get('/', LevelsComponent::class)->middleware('can:browse_levels');

        // Options
        Route::namespace('Options')->group(function() {

            // Create
            Route::get('create', CreateComponent::class)->middleware('can:add_level');

            // Edit
            Route::get('edit/{id}', EditComponent::class)->middleware('can:edit_level');

        });

    });

    // Withdrawals
    Route::namespace('Withdrawals')->prefix('withdrawals')->group(function() {

        // History
        Route::get('/', WithdrawalsComponent::class)->middleware('can:browse_withdrawals');

    });


    // admin_management
    Route::namespace('admin_management')->prefix('admin_management')->group(function() {
        Route::get('/roles', RolesComponent::class);
        Route::get('/role/{id}/permissions', PermissionsComponent::class);
        Route::get('/role/create', AddRoleComponent::class);
        Route::get('/permission/create', AddPermissionComponent::class);
        Route::get('/role/{id}/edit', EditRoleComponent::class);
        Route::get('/registered_admins', RegisteredAdminsComponent::class);
        Route::get('/admin/create', AddAdminComponent::class);
        Route::get('/admin/{id}/edit', EditAdminComponent::class);
    });



    // Gigs
    Route::namespace('Gigs')->prefix('gigs')->group(function() {

        // Gigs
        Route::get('/', GigsComponent::class)->middleware('can:browse_gigs');

        // Options
        Route::namespace('Options')->group(function() {

            // Edit
            Route::get('edit/{id}', EditComponent::class)->middleware('can:edit_gig');

            // Analytics
            Route::get('analytics/{id}', AnalyticsComponent::class)->middleware('can:view_gig_analytics');

        });

        // Trash
        Route::namespace('Trash')->prefix('trash')->group(function() {

            // Get trashed gigs
            Route::get('/', TrashComponent::class)->middleware('can:view_deleted_gigs');

        });

        // Pending
        Route::prefix('pending')->group(function() {
            // Get pending gigs
            Route::get('/', PendingComponent::class)->middleware('can:browse_gigs');
        });
            
        // active
        Route::prefix('active')->group(function() {
            // Get active gigs
            Route::get('/', ActiveComponent::class)->middleware('can:browse_gigs');
        });   

        // active
        Route::prefix('rejected')->group(function() {
        // Get rejected gigs
        Route::get('/', RejectedComponent::class)->middleware('can:browse_gigs');
        });   



         // Pending
         Route::prefix('pending')->group(function() {
            // Get pending gigs
            Route::get('/', PendingComponent::class)->middleware('can:browse_gigs');
        });
            
         // active
         Route::prefix('active')->group(function() {
            // Get active gigs
            Route::get('/', ActiveComponent::class)->middleware('can:browse_gigs');
        });   
        
        // active
        Route::prefix('rejected')->group(function() {
        // Get rejected gigs
        Route::get('/', RejectedComponent::class)->middleware('can:browse_gigs');
        });   
        

      

    });

    // Orders
    Route::namespace('Orders')->prefix('orders')->group(function() {

        // Orders
        Route::get('/', OrdersComponent::class)->middleware('can:browse_orders');

        // Options
        Route::namespace('Options')->group(function() {

            // Details
            Route::get('details/{id}', DetailsComponent::class)->middleware('can:view_order_details');

        });

    });

    // Portfolios
    Route::namespace('Portfolios')->prefix('portfolios')->group(function() {

        // Portfolios
        Route::get('/', PortfoliosComponent::class)->middleware('can:browse_portfolios');
        
        // Options
        Route::namespace('Options')->group(function() {

        // Edit
        Route::get('edit/{id}', EditComponent::class)->middleware('can:edit_portfolio');

        });

    });

    // Refunds
    Route::namespace('Refunds')->prefix('refunds')->group(function() {

        // Refunds
        Route::get('/', RefundsComponent::class)->middleware('can:browse_refunds');

        // Options
        Route::namespace('Options')->group(function() {

            // Details
            Route::get('details/{id}', DetailsComponent::class)->middleware('can:view_refund_details');

        });

    });

    // Projects
    Route::namespace('Projects')->prefix('projects')->group(function() {

        // Get projects
        Route::get('/', ProjectsComponent::class)->middleware('can:browse_projects');

        // Settings
        Route::get('settings', SettingsComponent::class)->middleware('can:edit_projects_settings');

        // Milestones
        Route::namespace('Milestones')->prefix('milestones')->group(function() {

            // Index
            Route::get('{id}', MilestonesComponent::class)->middleware('can:view_project_milestone');

        });

        // Plans
        Route::namespace('Plans')->prefix('plans')->group(function() {

            // Index
            Route::get('/', PlansComponent::class)->middleware('can:browse_projects_plans');

            // Edit
            Route::get('edit/{id}', EditComponent::class)->middleware('can:edit_projects_plans');

            // Bidding
            Route::namespace('Bidding')->prefix('bidding')->group(function() {

            // Edit
            Route::get('edit/{id}', EditComponent::class)->middleware('can:edit_bids_plans');

            });

        });

        // Categories
        Route::namespace('Categories')->prefix('categories')->group(function() {

            // Categories
            Route::get('/', CategoriesComponent::class)->middleware('can:browse_projects_categories');

            // Options
            Route::namespace('Options')->group(function() {

                // Create
                Route::get('create', CreateComponent::class)->middleware('can:add_project_category');

                // Edit
                Route::get('edit/{id}', EditComponent::class)->middleware('can:edit_project_category');

            });

        });

        // Skills
        Route::namespace('Skills')->prefix('skills')->group(function() {

            // Skills
            Route::get('/', SkillsComponent::class)->middleware('can:browse_skills');

            // Options
            Route::namespace('Options')->group(function() {

                // Create
                Route::get('create', CreateComponent::class)->middleware('can:add_skill');

                // Edit
                Route::get('edit/{id}', EditComponent::class)->middleware('can:edit_skill');

            });

        });

        // Subscriptions
        Route::namespace('Subscriptions')->prefix('subscriptions')->group(function() {

            // Get subscriptions
            Route::get('/', SubscriptionsComponent::class)->middleware('can:browse_project_subscriptions');

        });

        // Bids
        Route::namespace('Bids')->prefix('bids')->group(function() {

            // Bids
            Route::get('/', BidsComponent::class)->middleware('can:browse_bids');

            // Subscriptions
            Route::namespace('Subscriptions')->prefix('subscriptions')->group(function() {

                // Subscriptions
                Route::get('/', SubscriptionsComponent::class)->middleware('can:browse_bid_subscriptions');

            });

        });

    });

    // Offers
    Route::namespace('Offers')->prefix('offers')->group(function() {

        // All
        Route::get('/', OffersComponent::class)->middleware('can:browse_offers');

    });
    
    // Categories
    Route::namespace('Categories')->prefix('categories')->group(function() {
    
        // All
        Route::get('/', CategoriesComponent::class)->middleware('can:browse_categories');
    
        // Options
        Route::namespace('Options')->group(function() {
    
            // Create
            Route::get('create', CreateComponent::class)->middleware('can:add_category');
    
            // Edit
            Route::get('edit/{id}', EditComponent::class)->middleware('can:edit_category');
    
        });
    
    });
    
    // Subcategories
    Route::namespace('Subcategories')->prefix('subcategories')->group(function() {
    
        // All
        Route::get('/', SubcategoriesComponent::class)->middleware('can:browse_subcategories');
    
        // Options
        Route::namespace('Options')->group(function() {
    
            // Create
            Route::get('create', CreateComponent::class)->middleware('can:add_subcategory');
    
            // Edit
            Route::get('edit/{id}', EditComponent::class)->middleware('can:edit_subcategory');
    
        });
    
    });

    // Reviews
    Route::namespace('Reviews')->prefix('reviews')->group(function() {

        // Reviews
        Route::get('/', ReviewsComponent::class)->middleware('can:browse_reviews');

    });

    // Reports
    Route::namespace('Reports')->prefix('reports')->group(function() {

        // Users
        Route::get('users', UsersComponent::class)->middleware('can:browse_users_reports');

        // Gigs
        Route::get('gigs', GigsComponent::class)->middleware('can:browse_gigs_reports');

        // Projects
        Route::get('projects', ProjectsComponent::class)->middleware('can:browse_projects_reports');
        
        // Bids
        Route::get('bids', BidsComponent::class)->middleware('can:browse_bids_reports');

    });

    // Conversations
    Route::namespace('Conversations')->prefix('conversations')->group(function() {

        // browse_Conversations
        Route::get('/', ConversationsComponent::class)->middleware('can:browse_conversations');

        // banned_words
        Route::namespace('BannedWords')->prefix('banned_words')->group(function() { 

           // browse_banned_words
           Route::get('/', BannedWordsComponent::class)->middleware('can:browse_banned_words');
            
           // Options
           Route::namespace('Options')->group(function() {

            // Create
            Route::get('create', CreateComponent::class)->middleware('can:add_banned_word');

            // Edit
           Route::get('edit/{id}', EditComponent::class)->middleware('can:edit_banned_word');

          });
        
        
        });
         
        // view_Conversations
        Route::get('/view/{user1_id}/{user2_id}', ViewConversationComponent::class)->middleware('can:browse_conversations');

    });

    
    
    // Advertisements
    Route::namespace('Advertisements')->prefix('advertisements')->group(function() {

        // Ads
        Route::get('/', AdvertisementsComponent::class);

    });

    // Support
    Route::namespace('Support')->prefix('support')->group(function() {

        // Messages
        Route::get('/', SupportComponent::class)->middleware('can:browse_support_messages');

    });

    
   // SMS
    Route::namespace('sms')->prefix('sms')->group(function() {

        // SMS Messages
        Route::get('/', Smscomponent::class)->middleware('can:browse_sms');
        
        // send sms
        Route::get('send', SendSMSComponent::class)->middleware('can:send_sms');

        // Settings
        Route::get('settings', Settingscomponent::class)->middleware('can:edit_sms_settings');

    });
    
    
    // Newsletter
    Route::namespace('Newsletter')->prefix('newsletter')->group(function() {

        // Newsletter
        Route::get('/', NewsletterComponent::class)->middleware('can:browse_newsletter_emails');

        // Settings
        Route::get('settings', SettingsComponent::class)->middleware('can:edit_newsletter_settings');

    });

    // Languages
    Route::namespace('Languages')->prefix('languages')->group(function() {

        // Languages
        Route::get('/', LanguagesComponent::class)->middleware('can:browse_languages');

        // Options
        Route::namespace('Options')->group(function() {

            // Create
            Route::get('create', CreateComponent::class)->middleware('can:add_language');

            // Edit
            Route::get('edit/{id}', EditComponent::class)->middleware('can:edit_language');

            // Translate
            Route::get('translate/{id}', TranslateComponent::class)->middleware('can:edit_language_translation');

        });

    });

    // Pages
    Route::namespace('Pages')->prefix('pages')->group(function() {

        // Pages
        Route::get('/', PagesComponent::class)->middleware('can:browse_pages');

        // Options
        Route::namespace('Options')->group(function() {

            // create
            Route::get('create', CreateComponent::class)->middleware('can:add_page');

            // Edit
            Route::get('edit/{id}', EditComponent::class)->middleware('can:edit_page');

        });

    });

    // Countries
    Route::namespace('Countries')->prefix('countries')->group(function() {

        // Countries
        Route::get('/', CountriesComponent::class)->middleware('can:browse_countries');

        // Options
        Route::namespace('Options')->group(function() {

            // Create
            Route::get('create', CreateComponent::class)->middleware('can:add_country');

            // Edit
            Route::get('edit/{id}', EditComponent::class)->middleware('can:edit_country');

        });

    });

    // Services
    Route::namespace('Services')->prefix('services')->group(function() {

        // Payment gateways
        Route::namespace('Payment')->prefix('payment')->group(function() {

            // All
            Route::get('/', PaymentComponent::class)->middleware('can:browse_payment_gateways');

            // Gateways
            Route::namespace('Gateways')->group(function() {

                // Iyzico
                Route::get('edit/iyzico', IyzicoComponent::class);

                // Duitku
                Route::get('edit/duitku', DuitkuComponent::class);

                // Genie Business
                Route::get('edit/genie-business', GenieComponent::class);

                // Asaas
                Route::get('edit/asaas', AsaasComponent::class);

                // Ecpay
                Route::get('edit/ecpay', EcpayComponent::class);

                // Fastpay
                Route::get('edit/fastpay', FastpayComponent::class);

                // Freekassa
                Route::get('edit/freekassa', FreekassaComponent::class);

                // Paymob Pakistan
                Route::get('edit/paymob-pk', PaymobPkComponent::class);

                // cPay
                Route::get('edit/cpay', CpayComponent::class);

                // Nowpayments
                Route::get('edit/nowpayments', NowpaymentsComponent::class);

                // PayPal
                Route::get('edit/paypal', PaypalComponent::class);

                // Stripe
                Route::get('edit/stripe', StripeComponent::class);

                // Paystack
                Route::get('edit/paystack', PaystackComponent::class);

                // Cashfree
                Route::get('edit/cashfree', CashfreeComponent::class);

                // Xendit
                Route::get('edit/xendit', XenditComponent::class);

                // Flutterwave
                Route::get('edit/flutterwave', FlutterwaveComponent::class);

                // Vnpay
                Route::get('edit/vnpay', VnpayComponent::class);

                // Paymob
                Route::get('edit/paymob', PaymobComponent::class);

                // Mercadopago
                Route::get('edit/mercadopago', MercadopagoComponent::class);

                // Paytabs
                Route::get('edit/paytabs', PaytabsComponent::class);

                // Razorpay
                Route::get('edit/razorpay', RazorpayComponent::class);

                // Mollie
                Route::get('edit/mollie', MollieComponent::class);

                // Paytr
                Route::get('edit/paytr', PaytrComponent::class);

                // Jazzcash
                Route::get('edit/jazzcash', JazzcashComponent::class);

                // Youcanpay
                Route::get('edit/youcanpay', YoucanpayComponent::class);

                // Epoint
                Route::get('edit/epoint', EpointComponent::class);

                // Campay
                Route::get('edit/campay', CampayComponent::class);

                // Robokassa
                Route::get('edit/robokassa', RobokassaComponent::class);

                // CMI
                Route::get('edit/cmi', CmiComponent::class);

                // Offline
                Route::get('edit/offline', OfflineComponent::class);

            });

        });

        // PayPal
        Route::get('paypal', PaypalComponent::class);

        // Stripe
        Route::get('stripe', StripeComponent::class);

        // Paystack
        Route::get('paystack', PaystackComponent::class);

        // Cashfree
        Route::get('cashfree', CashfreeComponent::class);

        // Xendit
        Route::get('xendit', XenditComponent::class);
        
        // Offline payment
        Route::get('offline', OfflineComponent::class);

        // Flutterwave
        Route::get('flutterwave', FlutterwaveComponent::class);

        // VNPay
        Route::get('vnpay', VNPayComponent::class);

        // Paymob
        Route::get('paymob', PaymobComponent::class);

        // Mercadopago
        Route::get('mercadopago', MercadopagoComponent::class);

        // Paytabs
        Route::get('paytabs', PaytabsComponent::class);

        // Razorpay
        Route::get('razorpay', RazorpayComponent::class);

        // Mollie
        Route::get('mollie', MollieComponent::class);

        // PayTR
        Route::get('paytr', PaytrComponent::class);

        // Jazzcash
        Route::get('jazzcash', JazzcashComponent::class);

        // reCaptcha
        Route::get('recaptcha', RecaptchaComponent::class);

        // Cloudinary
        Route::get('cloudinary', CloudinaryComponent::class);

        // YouCanPay
        Route::get('youcanpay', YoucanpayComponent::class);

        // Nowpayments
        Route::get('nowpayments', NowpaymentsComponent::class);

        // Epoint
        Route::get('epoint', EpointComponent::class);

    });
    
    
    // Sliders 
    Route::namespace('Sliders')->prefix('sliders')->group(function() {
    
        Route::get('/', SliderComponent::class);
      
    // Options
      Route::namespace('Options')->group(function() {

        // Create
        Route::get('create', CreateComponent::class)->middleware('can:edit_slider_settings');

        // Edit
        Route::get('edit/{id}', EditComponent::class)->middleware('can:edit_slider_settings');

    });
    });
    
    
    // Settings
    Route::namespace('Settings')->prefix('settings')->group(function() {

        // General
        Route::get('general', GeneralComponent::class)->middleware('can:edit_general_settings');
    
        // Currency
        Route::get('currency', CurrencyComponent::class)->middleware('can:edit_currency_settings');

        // Authentication
        Route::get('auth', AuthComponent::class)->middleware('can:edit_authentication_settings');

        // Commission
        Route::get('commission', CommissionComponent::class)->middleware('can:edit_commission_settings');

        // Footer
        Route::get('footer', FooterComponent::class)->middleware('can:edit_footer_settings');

        // Media
        Route::get('media', MediaComponent::class)->middleware('can:edit_media_settings');

        // Publish
        Route::get('publish', PublishComponent::class)->middleware('can:edit_publish_settings');

        // Security
        Route::get('security', SecurityComponent::class)->middleware('can:edit_security_settings');

        // Seo
        Route::get('seo', SeoComponent::class)->middleware('can:edit_seo_settings');

        // Smtp 
        Route::get('smtp', SmtpComponent::class)->middleware('can:edit_smtp_settings');

        // Withdrawal
        Route::get('withdrawal', WithdrawalComponent::class)->middleware('can:edit_withdrawal_settings');

        // Appearance
        Route::get('appearance', AppearanceComponent::class)->middleware('can:edit_appearance_settings');

        // Hero
        Route::get('hero', HeroComponent::class)->middleware('can:edit_hero_settings');

        // Chat
        Route::get('chat', ChatComponent::class)->middleware('can:edit_livechat_settings');

        // affiliate
        Route::get('affiliate', AffiliateComponent::class)->middleware('can:edit_affiliate_settings');

        // cashback
        Route::get('cashback', CashbackComponent::class)->middleware('can:edit_cashback_settings');
        
        // First Discount
        Route::get('first-discount', FirstDiscountComponent::class)->middleware('can:edit_first_discount_settings');
        
        // Fee Exemption
        Route::get('fee-exemption', FeeExemptionComponent::class)->middleware('can:edit_fee_exemption_settings');
    
    });

    // Verifications
    Route::namespace('Verifications')->prefix('verifications')->group(function() {

        // verifications
        Route::get('/', VerificationsComponent::class)->middleware('can:browse_verifications');
        
        // approve verification
        Route::get('approve/{id}', ApproveVerificationComponent::class)->middleware('can:approve_verification');

    });

    // Blog
    Route::namespace('Blog')->prefix('blog')->group(function() {

        // Articles
        Route::get('/', ArticlesComponent::class)->middleware('can:browse_articles');

        // Settings
        Route::get('settings', SettingsComponent::class)->middleware('can:edit_blog_settings');

        // Comments
        Route::namespace('Comments')->prefix('comments')->group(function() {

            // Index
            Route::get('/', CommentsComponent::class)->middleware('can:browse_comments');

            // Options
            Route::namespace('Options')->group(function() {

                // Edit
                Route::get('edit/{id}', EditComponent::class)->middleware('can:edit_comment');

            });

        });

        // Options
        Route::namespace('Options')->group(function() {

            // Create
            Route::get('create', CreateComponent::class)->middleware('can:add_article');

            // Edit
            Route::get('edit/{slug}', EditComponent::class)->middleware('can:edit_article');

        });

    });

    // System
    Route::namespace('System')->prefix('system')->group(function() {

        // Crontab
        Route::get('crontab', CrontabComponent::class)->middleware('can:view_cron_jobs');

        // Cache
        Route::get('cache', CacheComponent::class)->middleware('can:edit_cache_settings');

        // Maintenance
        Route::get('maintenance', MaintenanceComponent::class)->middleware('can:edit_site_maintenance');

    });
    
});

// Dashboard login
Route::namespace('Auth')->middleware(['web', 'banned.ip', 'guest:admin'])->group(function() {

    // Login
    Route::get('/raja+ahly=worldwar', LoginComponent::class);

});