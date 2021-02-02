( function( api ) {

	// Extends our custom "woodwork-lite" section.
	api.sectionConstructor['woodwork-lite'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );