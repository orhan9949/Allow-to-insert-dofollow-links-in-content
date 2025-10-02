<?php

class Links_Fields {

    /**
     * Constructor.
     */
    public function __construct() {
        add_filter( 'theme_options_fields', [ $this, 'add_dofollow_links_fields' ], 20, 1 );
    }

    /**
     * Add Dofollow Links Fields.
     *
     * @return array
     */
    public function add_dofollow_links_fields( $fields ) {

        /**
         * Dofollow Links
         */
        $fields[] = [
            'key'            => 'field_dofollow_links_tab',
            'label'          => __( 'Dofollow Links', 'base' ),
            'name'           => 'dofollow_links_tab',
            'type'           => 'tab',
            'placement'      => 'top'
        ];
        $fields[] = [
            'key'               => 'field_dofollow_links',
            'label'             => __( 'All links', 'base' ),
            'name'              => 'dofollow_links',
            'type'              => 'textarea',
            'required'          => 1,
            'instructions'   => __( 'Url need to write with new line without ",". <br> Example : <br> x.com <br> facebook.com <br> youtube.com', 'base' ),
        ];

        return $fields;

    }
}

new Links_Fields;