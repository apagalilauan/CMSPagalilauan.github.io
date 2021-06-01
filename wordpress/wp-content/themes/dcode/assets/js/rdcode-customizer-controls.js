( function( api ) {

    api.sectionConstructor['upsell'] = api.Section.extend( {

        // No events for this type of section.
        attachEvents: function () {},

        // Always make the section active.
        isContextuallyActive: function () {
            return true;
        }
    } );

    /**
     * Control: Sortable.
     */
    /* global businessexpoControlLoader */
    api.controlConstructor['beastthemes-sortable'] = api.Control.extend( {

        // When we're finished loading continue processing
        ready: function () {
            'use strict';

            var control = this;

            // Init the control.
            if (
                !_.isUndefined( window.businessexpoControlLoader ) &&
                _.isFunction( businessexpoControlLoader )
            ) {
                businessexpoControlLoader( control );
            } else {
                control.initbusinessexpoControl();
            }
        },

        initbusinessexpoControl: function () {
            'use strict';

            var control = this;
            control.container.find( '.beastthemes-controls-loading-spinner' ).hide();

            // Set the sortable container.
            control.sortableContainer = control.container.find( 'ul.sortable' ).first();

            // Init sortable.
            control.sortableContainer
                   .sortable( {

                       // Update value when we stop sorting.
                       stop: function () {
                           control.updateValue();
                       }
                   } )
                   .disableSelection()
                   .find( 'li' )
                   .each( function () {

                       // Enable/disable options when we click on the eye of Thundera.
                       jQuery( this )
                           .find( 'i.visibility' )
                           .click( function () {
                               jQuery( this )
                                   .toggleClass( 'dashicons-visibility-faint' )
                                   .parents( 'li:eq(0)' )
                                   .toggleClass( 'invisible' );
                           } );
                   } )
                   .click( function () {

                       // Update value on click.
                       control.updateValue();
                   } );
        },

        /**
         * Updates the sorting list
         */
        updateValue: function () {
            'use strict';

            var control  = this,
                newValue = [];

            this.sortableContainer.find( 'li' ).each( function () {
                if ( !jQuery( this ).is( '.invisible' ) ) {
                    newValue.push( jQuery( this ).data( 'value' ) );
                }
            } );
            control.setting.set( newValue );
        }
    } );

} )( wp.customize );

jQuery(document).ready(function($) {

    "use strict";

    /**
     * Script for switch option
     */
    $('.switch_options').each(function() {
        //This object
        var obj = $(this);

        var switchPart = obj.children('.switch_part').attr('data-switch');
        var input = obj.children('input'); //cache the element where we must set the value
        var input_val = obj.children('input').val(); //cache the element where we must set the value

        obj.children('.switch_part.'+input_val).addClass('selected');
        obj.children('.switch_part').on('click', function(){
            var switchVal = $(this).attr('data-switch');
            obj.children('.switch_part').removeClass('selected');
            $(this).addClass('selected');
            $(input).val(switchVal).change(); //Finally change the value to 1
        });

    });

    /**
     * Image button script
     */
    $(document).on( "click", ".upload_team_c",function(e){
        e.preventDefault();
        var id     = $( this ).parent().find('.team_image').attr('data-name');
        var button = this;
        var image  = wp.media({
            title: 'Upload Image',
            multiple: false
        }).open()
            .on('select', function (e) {
                var uploaded_image = image.state().get('selection').first();
                var old_image      = $( button ).parent().find('#team_image_url-'+id).val();
                var location_image = uploaded_image.toJSON().url;

                if ( old_image.lenght !== 0 ){
                  $( button ).parent().find('#team_image_url-'+id).val('');
                }
                
                $( button ).parent().find('#team_image_url-'+id).val( location_image );
            });
    });

    /**
     * Radio Image control in customizer
     */
    // Use buttonset() for radio images.
    // $( '.customize-control-rdcode-radio-image .buttonset' ).buttonset();

    // Handles setting the new value in the customizer.
    $( '.customize-control-rdcode-radio-image input:radio' ).change(
        function() {

            // Get the name of the setting.
            var setting = $( this ).attr( 'data-customize-setting-link' );

            // Get the value of the currently-checked radio input.
            var image = $( this ).val();

            // Set the new value.
            wp.customize( setting, function( obj ) {

                obj.set( image );
            } );
        }
    );

    /**
      * Function for repeater field
     */
    function rdcode_refresh_repeater_values(){
        $(".rdcode-repeater-field-control-wrap").each(function(){
            
            var values = []; 
            var $this = $(this);
            
            $this.find(".rdcode-repeater-field-control").each(function(){
            var valueToPush = {};   

            $(this).find('[data-name]').each(function(){
                var dataName = $(this).attr('data-name');
                var dataValue = $(this).val();
                valueToPush[dataName] = dataValue;
            });

            values.push(valueToPush);
            });

            $this.next('.rdcode-repeater-collector').val(JSON.stringify(values)).trigger('change');
        });
    }

    $('#customize-theme-controls').on('click','.rdcode-repeater-field-title',function(){
        $(this).next().slideToggle();
        $(this).closest('.rdcode-repeater-field-control').toggleClass('expanded');
    });

    $('#customize-theme-controls').on('click', '.rdcode-repeater-field-close', function(){
        $(this).closest('.rdcode-repeater-fields').slideUp();;
        $(this).closest('.rdcode-repeater-field-control').toggleClass('expanded');
    });

    $("body").on("click",'.rdcode-repeater-add-control-field', function(){

        var fLimit = $(this).parent().find('.field-limit').val();
        var fCount = $(this).parent().find('.field-count').val();
        if( fCount < fLimit ) {
            fCount++;
            $(this).parent().find('.field-count').val(fCount);
        } else {
            $(this).parent().find('.field-count').val(fCount);
        }

        var $this = $(this).parent();
        if(typeof $this != 'undefined') {

            var field = $this.find(".rdcode-repeater-field-control:first").clone();
            if(typeof field != 'undefined'){
                
                field.find("input[type='text'][data-name]").each(function(){
                    var defaultValue = $(this).attr('data-default');
                    $(this).val(defaultValue);
                });
                
                field.find(".rdcode-repeater-icon-list").each(function(){
                    var defaultValue = $(this).next('input[data-name]').attr('data-default');
                    $(this).next('input[data-name]').val(defaultValue);
                    $(this).prev('.rdcode-repeater-selected-icon').children('i').attr('class','').addClass(defaultValue);
                    
                    $(this).find('li').each(function(){
                        var icon_class = $(this).find('i').attr('class');
                        if(defaultValue == icon_class ){
                            $(this).addClass('icon-active');
                        }else{
                            $(this).removeClass('icon-active');
                        }
                    });
                });

                field.find('.rdcode-repeater-fields').show();

                $this.find('.rdcode-repeater-field-control-wrap').append(field);

                field.addClass('expanded').find('.rdcode-repeater-fields').show(); 
                $('.accordion-section-content').animate({ scrollTop: $this.height() }, 1000);
                rdcode_refresh_repeater_values();
            }

        }
        return false;
     });
    
    $("#customize-theme-controls").on("click", ".rdcode-repeater-field-remove",function(){
        if( typeof  $(this).parent() != 'undefined'){
            $(this).closest('.rdcode-repeater-field-control').slideUp('normal', function(){
                $(this).remove();
                rdcode_refresh_repeater_values();
            });
        }
        return false;
    });

    $("#customize-theme-controls").on('keyup change', '[data-name]',function(){
        rdcode_refresh_repeater_values();
        return false;
    });

    /*Drag and drop to change order*/
    $(".rdcode-repeater-field-control-wrap").sortable({
        orientation: "vertical",
        update: function( event, ui ) {
            rdcode_refresh_repeater_values();
        }
    });

    $('body').on('click', '.rdcode-repeater-icon-list li', function(){
        var icon_class = $(this).find('i').attr('class');
        $(this).addClass('icon-active').siblings().removeClass('icon-active');
        $(this).parent('.rdcode-repeater-icon-list').prev('.rdcode-repeater-selected-icon').children('i').attr('class','').addClass(icon_class);
        $(this).parent('.rdcode-repeater-icon-list').next('input').val(icon_class).trigger('change');
        rdcode_refresh_repeater_values();
    });

    $('body').on('click', '.rdcode-repeater-selected-icon', function(){
        $(this).next().slideToggle();
    });

    /**
     * MultiCheck box Control JS
     */
    $( 'body' ).on( 'change', '.customize-control-checkbox-multiple input[type="checkbox"]' , function() {

        var new_checkbox_values = $( this ).parents( '.customize-control-checkbox-multiple' ).find( 'input[type="checkbox"]:checked' ).map(function(){
            return $( this ).val();
        }).get().join( ',' );

        $( this ).parents( '.customize-control-checkbox-multiple' ).find( 'input[type="hidden"]' ).val( new_checkbox_values ).trigger( 'change' );
        
    });
 
});

/**
 * Radio image button Control JS
 */
jQuery( document ).ready( function() {

    "use strict";

    // Use buttonset() for radio images.
    jQuery( '.customize-control-rdcode-radio-image .buttonset' ).buttonset();

    // Handles setting the new value in the customizer.
    jQuery( '.customize-control-rdcode-radio-image input:radio' ).change(
        function() {

            // Get the name of the setting.
            var setting = jQuery( this ).attr( 'data-customize-setting-link' );

            // Get the value of the currently-checked radio input.
            var image = jQuery( this ).val();

            // Set the new value.
            wp.customize( setting, function( obj ) {

                obj.set( image );
            } );
        }
    );

}); // jQuery( document ).ready

/**
 * Customizer font selector control.
 *
 * @package Dcode
 */
(function ( $ ) {
    'use strict';
    wp.rdcodeSelect = {
        init: function () {
            var self = this;

            $( '.rdcode-fs-main-input, .rdcode-fs-input-addon' ).on(
                'click', function ( e ) {
                    $( this ).parent().toggleClass( 'active' );
                    $( '.rdcode-ss-wrap.active .rdcode-fs-search input' ).focus();
                    e.stopPropagation();
                    return false;
                }
            );

            $( '.rdcode-fs-option' ).on(
                'click', function () {
                    var value = $( this ).data( 'option' );
                    var mainInput = $( '.rdcode-ss-wrap.active input.rdcode-fs-main-input' );
                    var collector = $( '.rdcode-ss-wrap.active .rdcode-ss-collector' );
                    $( '.rdcode-ss-wrap.active' ).removeClass( 'active' );
                    mainInput.val( value );
                    if ( value === 'Default' ) {
                        value = '';
                    }
                    collector.val( value );
                    collector.trigger( 'change' );
                    return false;
                }
            );

            $( '.rdcode-fs-search input' ).on(
                'keyup', function () {
                    self.search( $( this ) );
                    return false;
                }
            );

            $( document ).mouseup(
                function ( e ) {
                    var container = $( '.rdcode-ss-wrap.active .rdcode-fs-dropdown' );
                    if ( !container.is( e.target ) && container.has( e.target ).length === 0 ) {
                        $( '.rdcode-ss-wrap.active' ).removeClass( 'active' );
                    }
                }
            );
        },

        search: function ( $searchInput ) {
            var itemsList = jQuery( '.rdcode-ss-wrap.active .rdcode-fs-options-wrapper' );
            var searchTerm = $searchInput.val().toLowerCase();
            if ( searchTerm.length > 0 ) {
                itemsList.children().children( '.rdcode-fs-option' ).each(
                    function () {
                        if ( $( this ).filter( '[data-filter*='.concat( searchTerm ).concat( ']' ) ).length > 0 || searchTerm.length < 1 ) {
                            $( this ).show();
                        } else {
                            $( this ).hide();
                        }
                    }
                );
            } else {
                itemsList.children().children().show();
            }
        }
    };

    $( document ).ready(
        function () {
            wp.rdcodeSelect.init();
        }
    );
})( jQuery );
