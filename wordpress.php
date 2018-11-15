//Add post date to post title
function my_add_date_to_title($title, $id) {

    // Check if we're in the loop or not
    // This should exclude menu items
    if ( !is_admin() && in_the_loop() ) {

        // First get the default date format
        // Alternatively, you can specify your 
        // own date format instead
        $date_format = get_option('date_format');

        // Now get the date
        $date = get_the_date($date_format, $id); // Should return a string

        // Now put our string together and return it
        // You can of course tweak the markup here if you want
        $title .= ' (' . $date . ')';
     }

    // Now return the string
    return $title;
}

// Hook our function to the 'the_title' filter
// Note the last arg: we specify '2' because we want the filter
// to pass us both the title AND the ID to our function
add_filter('the_title','my_add_date_to_title',10,2);
