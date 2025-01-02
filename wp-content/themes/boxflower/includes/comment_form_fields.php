<?php 


function mo_comment_fields_custom_order( $fields ) {
    $comment_field = $fields['comment'];
    $author_field = $fields['author'];
    $email_field = $fields['email'];
    $url_field = isset($fields['url']) ? $fields['url'] : '';
    $cookies_field = $fields['cookies'];
    unset( $fields['comment'] );
    unset( $fields['author'] );
    unset( $fields['email'] );
    unset( $fields['url'] );
    unset( $fields['cookies'] );
    // the order of fields is the order below, change it as needed:
    $fields['comment'] = $comment_field;
    $fields['author']   = $author_field;
    $fields['email']    = $email_field;
    $fields['url']      = $url_field;
    
    $fields['cookies']  = $cookies_field;
    // done ordering, now return the fields:
    //var_dump($fields);
    return $fields;
}
add_filter( 'comment_form_fields', 'mo_comment_fields_custom_order' );