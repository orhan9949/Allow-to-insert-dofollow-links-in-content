<?php

/**
 * Theme Options.
 */

namespace Base\Options;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class Theme_Options {
    /**
     * Constructor.
     */
    public function __construct() {
        add_action( 'acf/init', [ $this, 'add_options_page' ] );
        add_action( 'acf/init', [ $this, 'register_custom_fields' ] );
    }

    /**
     * Add options page.
     */
    public function add_options_page() {
        acf_add_options_page( [
            'page_title' => __( 'Theme Options', 'base' ),
            'menu_title' => __( 'Theme Options', 'base' ),
            'menu_slug'  => 'theme-options',
            'capability' => 'manage_options',
            'redirect'   => false
        ] );
    }

    /**
     * Register custom fields.
     */
    public function register_custom_fields() {
        $fields = apply_filters( 'theme_options_fields', [
            /**
             * Social
             */
            [
                'key'            => 'field_theme_options_social_tab',
                'label'          => __( 'Social', 'base' ),
                'name'           => 'theme_options_social_tab',
                'type'           => 'tab',
                'placement'      => 'top'
            ],
            [
                'key'          => 'field_social_facebook_link',
                'label'        => __( 'Facebook Link', 'base' ),
                'name'         => 'social_facebook_link',
                'type'         => 'link',
                'required'     => 0
            ],
            [
                'key'          => 'field_social_twitter_link',
                'label'        => __( 'Twitter Link', 'base' ),
                'name'         => 'social_twitter_link',
                'type'         => 'link',
                'required'     => 0
            ],
            [
                'key'          => 'field_social_linkedin_link',
                'label'        => __( 'LinkedIn Link', 'base' ),
                'name'         => 'social_linkedin_link',
                'type'         => 'link',
                'required'     => 0
            ],
            [
                'key'          => 'field_social_telegram_link',
                'label'        => __( 'Telegram Link', 'base' ),
                'name'         => 'social_telegram_link',
                'type'         => 'link',
                'required'     => 0
            ],
            [
                'key'          => 'field_social_instagram_link',
                'label'        => __( 'Instagram Link', 'base' ),
                'name'         => 'social_instagram_link',
                'type'         => 'link',
                'required'     => 0
            ],
            [
                'key'          => 'field_google_news_link',
                'label'        => __( 'Google News Link', 'base' ),
                'name'         => 'google_news_link',
                'type'         => 'link',
                'required'     => 0
            ],

            /**
             * Pages
             */
            [
                'key'            => 'field_theme_options_pages_tab',
                'label'          => __( 'Pages', 'base' ),
                'name'           => 'theme_options_pages_tab',
                'type'           => 'tab',
                'placement'      => 'top'
            ],
            [
                'key'          => 'field_advertise_page',
                'label'        => __( 'Advertise Page', 'base' ),
                'name'         => 'advertise_page',
                'type'         => 'page_link',
                'post_type'    => 'page',
                'required'     => 0,
                'allow_null'   => 1,
            ],
            [
                'key'          => 'field_cookie_policy_page',
                'label'        => __( 'Cookie Policy Page', 'base' ),
                'name'         => 'cookie_policy_page',
                'type'         => 'page_link',
                'post_type'    => 'page',
                'required'     => 0,
                'allow_null'   => 1,
            ],
            [
                'key'          => 'field_free_bitcoins_page',
                'label'        => __( 'Free Bitcoins Page', 'base' ),
                'name'         => 'free_bitcoins_page',
                'type'         => 'page_link',
                'post_type'    => 'page',
                'required'     => 0,
                'allow_null'   => 1,
            ],
            [
                'key'          => 'field_buy_crypto_page',
                'label'        => __( 'Buy Crypto Page', 'base' ),
                'name'         => 'buy_crypto_page',
                'type'         => 'page_link',
                'post_type'    => 'page',
                'required'     => 0,
                'allow_null'   => 1,
            ],
            [
                'key'          => 'field_market_cap_page',
                'label'        => __( 'Market Cap Page', 'base' ),
                'name'         => 'market_cap_page',
                'type'         => 'page_link',
                'post_type'    => 'page',
                'required'     => 0,
                'allow_null'   => 1,
            ],
            [
                'key'          => 'field_careers_page',
                'label'        => __( 'Careers Page', 'base' ),
                'name'         => 'careers_page',
                'type'         => 'page_link',
                'post_type'    => 'page',
                'required'     => 0,
                'allow_null'   => 1,
            ],
            [
                'key'          => 'field_sponsored_category',
                'label'        => __( 'Sponsored Category', 'base' ),
                'name'         => 'sponsored_category',
                'type'         => 'taxonomy',
                'taxonomy'     => 'category',
                'field_type'   => 'select',
                'allow_null'   => 1,
            ],
            [
                'key'          => 'field_press_releases_category',
                'label'        => __( 'Press Releases Category', 'base' ),
                'name'         => 'press_releases_category',
                'type'         => 'taxonomy',
                'taxonomy'     => 'category',
                'field_type'   => 'select',
                'allow_null'   => 1,
            ],
            [
                'key'          => 'field_partner_content_category',
                'label'        => __( 'Partner Content Category', 'base' ),
                'name'         => 'partner_content_category',
                'type'         => 'taxonomy',
                'taxonomy'     => 'category',
                'field_type'   => 'select',
                'allow_null'   => 1,
            ],
            [
                'key'          => 'field_markets_category',
                'label'        => __( 'Markets Category', 'base' ),
                'name'         => 'markets_category',
                'type'         => 'taxonomy',
                'taxonomy'     => 'category',
                'field_type'   => 'select',
                'allow_null'   => 1,
            ],
            [
                'key'          => 'field_editors_choice_category',
                'label'        => __( 'Editor\'s Choice Category', 'base' ),
                'name'         => 'editors_choice_category',
                'type'         => 'taxonomy',
                'taxonomy'     => 'category',
                'field_type'   => 'select',
                'allow_null'   => 1,
            ],

            /**
             * Global
             */
            [
                'key'            => 'field_theme_options_global_tab',
                'label'          => __( 'Global', 'base' ),
                'name'           => 'theme_options_global_tab',
                'type'           => 'tab',
                'placement'      => 'top'
            ],
            [
                'key'            => 'field_copyright',
                'label'          => __( 'Copyright', 'base' ),
                'name'           => 'copyright',
                'type'           => 'text',
                'instructions'   => __( '%year% - current year', 'base' )
            ],
            [
                'key'            => 'field_user_sponsored',
                'label'          => __( 'Sponsored User', 'base' ),
                'name'           => 'user_sponsored',
                'type'           => 'user',
                'return_format'  => 'id',
                'allow_null'     => true,
                'instructions'   => __( 'Select a User used for sponsored content', 'base' )
            ],
            [
                'key'            => 'field_ticker_tape_items',
                'label'          => __( 'Ticker Tape Items', 'base' ),
                'name'           => 'ticker_tape_items',
                'type'           => 'text',
                'instructions'   => __( 'Comma separated Coingecko Ids: bitcoin,etherium,solana', 'base' )
            ],

            /**
             * Home
             */
            [
                'key'            => 'field_theme_options_home_tab',
                'label'          => __( 'Home', 'base' ),
                'name'           => 'theme_options_home_tab',
                'type'           => 'tab',
                'placement'      => 'top'
            ],
            [
                'key'            => 'field_home_description',
                'label'          => __( 'Description', 'base' ),
                'name'           => 'home_description',
                'type'           => 'wysiwyg',
                'toolbar'        => 'basic',
                'media_upload'   => 0,
            ],
            [
                'key'            => 'field_home_deep_dives_category',
                'label'          => __( 'Deep Dives Category', 'base' ),
                'name'           => 'home_deep_dives_category',
                'type'           => 'taxonomy',
                'taxonomy'       => 'category',
                'field_type'     => 'multi_select'
            ],
            [
                'key'            => 'field_home_exclude_category',
                'label'          => __( 'Exclude Category', 'base' ),
                'name'           => 'home_exclude_category',
                'type'           => 'taxonomy',
                'taxonomy'       => 'category',
                'field_type'     => 'multi_select'
            ],

            /**
             * Newsletter
             */
            [
                'key'            => 'field_theme_options_newsletter_tab',
                'label'          => __( 'Newsletter', 'base' ),
                'name'           => 'theme_options_newsletter_tab',
                'type'           => 'tab',
                'placement'      => 'top'
            ],
            [
                'key'            => 'field_show_newsletter_popup',
                'label'          => __( 'Show Newsletter Popup', 'base' ),
                'name'           => 'show_newsletter_popup',
                'type'           => 'true_false',
                'default_value'  => 0,
                'ui'             => 1,
            ],
            [
                'key'               => 'field_newsletter_popup_id',
                'label'             => __( 'Newsletter Popup ID', 'base' ),
                'name'              => 'newsletter_popup_id',
                'type'              => 'text',
                'required'          => 1,
                'conditional_logic' => [
                    [
                        [
                            'field'    => 'field_show_newsletter_popup',
                            'operator' => '==',
                            'value'    => '1',
                        ],
                    ],
                ],
            ],

        ]);
        acf_add_local_field_group( [
            'key'                    => 'group_theme_options',
            'title'                  => __( 'Theme Options', 'base' ),
            'fields'                 => $fields,
            'menu_order'            => 500,
            'label_placement'       => 'left',
            'instruction_placement' => 'field',
            'location'              => [
                [
                    [
                        'param'     => 'options_page',
                        'operator'  => '==',
                        'value'     => 'theme-options',
                    ]
                ]
            ],
        ] );
    }
}

new Theme_Options;