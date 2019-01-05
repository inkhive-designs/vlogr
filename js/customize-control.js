
jQuery(document).ready(function() {
	"use strict";


	// Update the values for all our Featured Areas and initialise the sortable repeater


	$('.drag_and_drop_control').each(function() {
		// If there is an existing customizer value, populate our rows
		var defaultValuesArray = $(this).find('.customize-control-drag-and-drop')
										.val()
										.split(',');
		// Store all the Text values of the draggable fields in a variable
		var defaultTextArray   = $.map(defaultValuesArray, function( val, i ) {
			return $('.drag_and_drop_control').find('[data-sorter=' + defaultValuesArray[i] + ']').text();
		});
		
		var numRepeaterItems = defaultValuesArray.length;

		var i;
		
		for ( i = 0; i <= numRepeaterItems; i++ ) {
			$(this).find('.repeater:eq(' + i + ')')
				.attr('data-sorter',defaultValuesArray[i])
				.html('<div class="repeater-input">' + defaultTextArray[i] + '</div>');
		}
	});

	// Make our Repeater fields sortable

	$(this).find('.sortable').sortable({
		items: "> li:not(.disabled)",
		helper: 'clone',
		update: function(event, ui) {
			dvtGetAllInputs($(this).parent());
		}
	});
	
	$.each(sorter, function( key, value ) {
		if ( value == '' ) {
			$( '.sortable' ).find( '[data-sorter=' + key + ']' ).addClass( 'disabled' );
		}
	});
	
	$('.sortable').find('li').each(function() {
		$(this).hasClass('disabled') ? $(this).removeData('sortableItem') : false;
	});
	
	
	// Get the values from the repeater input fields and add to our hidden field

	function dvtGetAllInputs($element) {
		var inputValues = $element.find('.repeater').map(function() {
			return $(this).attr('data-sorter');
		}).toArray();
		// Add all the values from our repeater fields to the hidden field (which is the one that actually gets saved)
		$element.find('.customize-control-drag-and-drop').val(inputValues);
		// Important! Make sure to trigger change event so Customizer knows it has to save the field
		$element.find('.customize-control-drag-and-drop').trigger('change');
	}
	
	// Reset the Order on clicking on the Reset Button
	$('.sorter_reset').click(function() {
		var defaultValue	=	'slider,hero1,hero2,hero3,feat_cat,feat_area1,feat_area2';
		
		var defaultValueArray	=	defaultValue.split(',');
		
		var defaultTextArray   = $.map(defaultValueArray, function( val, i ) {
			return $('.drag_and_drop_control').find('[data-sorter=' + defaultValueArray[i] + ']').text();
		});
		
		var numRepeaterItems = defaultValueArray.length;

		var i;
		
		for ( i = 0; i <= numRepeaterItems; i++ ) {
			$('.sortable').find('.repeater:eq(' + i + ')')
				.attr('data-sorter',defaultValueArray[i])
				.html('<div class="repeater-input">' + defaultTextArray[i] + '</div>');
		}
		
		// Add the default value in the hidden field to save it
		$('.drag_and_drop_control').find('.customize-control-drag-and-drop').val(defaultValue);
		// Make sure to trigger change event to tell Customizer to save a field
		$('.drag_and_drop_control').find('.customize-control-drag-and-drop').trigger('change');
		
	});
});

