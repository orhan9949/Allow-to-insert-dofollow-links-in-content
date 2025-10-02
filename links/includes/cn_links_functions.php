<?php

/**
 * Add and delete attributes for tag <a> in the content
 */
add_filter( 'the_content', function( $content ) {
    global $post;

    $html = new WP_HTML_Tag_Processor( $content );

    $dofollow_links_string = get_field( 'dofollow_links', 'option' );
    $dofollow_links_string = trim($dofollow_links_string);
    $dofollow_links_array  = explode("\n", $dofollow_links_string);

    array_walk($dofollow_links_array, function (&$value) {
        $value = trim($value);
    });

    while ( $html->next_tag( 'A' ) ) {
        $rel = explode( ' ', $html->get_attribute( 'rel' ) );
        $rel = array_diff( $rel, [ 'noreferrer', 'noopener' ] );
        $href = $html->get_attribute('href');
        if ( $href[0] == '#' ) continue;

        $html->remove_attribute('data-id');
        $html->remove_attribute('data-type');
        $html->remove_attribute('rel');

        if ( ! str_contains( $href, 'crypto.news' ) ) {
            if ( ! has_category( [ 'sponsored', 'partner-content' ], $post ) ) {

                $rel = [ 'nofollow' ];

                foreach ($dofollow_links_array as $dofollow_link){
                    if(strripos($href, $dofollow_link) !== false){
                        $rel = [];
                        break;
                    }
                }
            }
        }

        if ( count( $rel ) ) {
            $html->set_attribute( 'rel', implode( ' ', $rel ) );
        }
    }

    return $html->get_updated_html();
}, 1000);