<?php 


function mo_comment_fields_custom_order( $fields ) {
    $comment_field = $fields['comment'];
    $author_field = $fields['author'];
    $email_field = $fields['email'];
    $url_field = $fields['url'];
    $cookies_field = $fields['cookies'];
    unset( $fields['comment'] );
    unset( $fields['author'] );
    unset( $fields['email'] );
    unset( $fields['url'] );
    unset( $fields['cookies'] );
    // the order of fields is the order below, change it as needed:
    $fields['author']   = $author_field;
    $fields['email']    = $email_field;
    $fields['url']      = $url_field;
    $fields['comment'] = $comment_field;
    $fields['cookies']  = $cookies_field;
    // done ordering, now return the fields:
    return $fields;
}
add_filter( 'comment_form_fields', 'mo_comment_fields_custom_order' );