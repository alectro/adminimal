jQuery( function() {
  // Click: hide/show
  jQuery( '#adminimal-toggle' ).on( 'click', function() {
    // Hide #adminimal toolbar
    jQuery( '#adminimal' ).toggleClass( 'hide', 1000 );
    // Change icon to closed
    jQuery( '#adminimal-icon' ).toggleClass( 'closed', 1000 );
  });
});
