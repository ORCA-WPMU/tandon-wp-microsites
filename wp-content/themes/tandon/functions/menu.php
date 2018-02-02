<?php

add_filter( 'timber_context', function( $context ) {

        $context['primary'] = new TimberMenu( 'primary' );

        return $context;

    }
);
