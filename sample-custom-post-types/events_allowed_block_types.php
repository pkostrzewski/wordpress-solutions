<?php
function events_allowed_block_types( $allowed_block_types, $editor_context ) {
    if ( 'events' === $editor_context->post->post_type ) {
		return array(
			'core/paragraph',
            'core/heading',
            'core/image',
            'core/list',
            'core/list-item',
            'core/quote',
            'core/gallery',
            'core/table',
            'core/button',
            'core/horizontal-rule',
            'core/media-text',
            'core/video',
            'core/audio',
            'core/file',
            //'core/shortcode',
            //'core/pullquote',
            'core/verse',
            //'core/preformatted',
            // 'core/code',
            //'core/freeform',
            //'core/html',
            'core/separator',
            'core/spacer',
            'core/button',
            //'core/site-title',
            //'core/site-tagline',
            //'core/site-logo',
            //'core/site-icon',
            //'core/post-title',
            //'core/post-date',
            //'core/post-content',
            'core/post-excerpt',
            'core/post-featured-image',
            'core/post-categories',
            'core/post-tags',
            //'core/latest-posts',
            'core/embed',
		);
	}
    return $allowed_block_types;
}
add_filter( 'allowed_block_types_all', 'events_allowed_block_types', 10, 2 );
