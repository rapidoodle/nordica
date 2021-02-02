// Sortable sections
jQuery(document).ready(function($) {

    // Sortable sections
    jQuery( "body" ).on( 'hover', '.consultant-lite-drag-handle', function() {

        jQuery( 'ul.consultant-lite-sortable-list' ).sortable({

            handle: '.consultant-lite-drag-handle',
            axis: 'y',
            update: function( e, ui ){
                jQuery('input.consultant-lite-sortable-input').trigger( 'change' );
            }

        });

    });

    // On Change Value.
    jQuery( "body" ).on( 'change', 'input.consultant-lite-sortable-input', function() {

        // Get the value, and convert to string.
        this_checkboxes_values = jQuery( this ).parents( 'ul.consultant-lite-sortable-list' ).find( 'input.consultant-lite-sortable-input' ).map( function() {
            return this.value;
        }).get().join( ',' );

        // Add the value to hidden input.
        jQuery( this ).parents( 'ul.consultant-lite-sortable-list' ).find( 'input.consultant-lite-sortable-value' ).val( this_checkboxes_values ).trigger( 'change' );

    });

});