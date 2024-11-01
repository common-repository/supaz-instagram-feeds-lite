jQuery(document).ready(function($) {
	var $container = $('.sifs-metaboxes-wrapper');

    // $container.find('.sifs-color-picker').wpColorPicker();
    
	$container.on('click', '.sifs-tab', function(){
        var $this = $(this),
        id = $this.attr('id');
        $('.sifs-tab').removeClass('sifs-active');
        $this.addClass('sifs-active');
        $('.sifs-tab-content').removeClass('sifs-tab-content-active').hide();
        $('.'+id).addClass('sifs-tab-content-active').show();
	});

	$container.on('change', '.sifs-feed-type-select', function(){
        	var $this = $(this);
            var val = $this.val();
            var parent = $this.closest('.sifs-tab-input-fields').find('.sifs-dropdown-selection-options');
            parent.find('.sifs-dropdown-selection-option').hide();
            parent.find('.sifs-'+val).show();
	});

	$container.on('change', '.sifs-feed-template-select', function(){
        var $this = $(this);
        var img_src= $this.find(':selected').data('img');
        $this.closest('.sifs-input-field-wrap').find('.sifs-image-placeholder img').attr('src', img_src);
    });

    $container.on('click', '.sifs-checkbox-enable-option', function() {
        var $this = $(this);
        if ($this.is(':checked')) {
            $this.closest('.sifs-checkbox-outer-wrap').find(".sifs-checkbox-checked-options").fadeIn();
        }else{
            $this.closest('.sifs-checkbox-outer-wrap').find(".sifs-checkbox-checked-options").fadeOut();
        }
    });

    $container.find('.slider-range-max').each(function(){
        var $this = $(this);
        var $min     = $this.closest('.sifs-column-input-wrap').find('.sifs-input-field').data('min');
        var $max     = $this.closest('.sifs-column-input-wrap').find('.sifs-input-field').data('max');
        var $value   = $this.closest('.sifs-column-input-wrap').find('.sifs-input-field').val();
        $this.slider({
            range: "max",
            min: $min,
            max: $max,
            value: $value,
            slide: function( event, ui ) {
              $this.closest('.sifs-column-input-wrap').find('.sifs-input-field').val( ui.value );
            }
        });
    });


    $container.on('change', '.sifs-radio-checkbox', function(){
        var $this = $(this);
        if( $this.is(":checked") ){ // check if the radio is checked
            var val = $this.val(); // retrieve the value
            if(val == 'custom'){
                $this.closest('.sifs-loader-outer-wrap').find('.sifs-custom-image-settings-wrap').show();
            }else{
                $this.closest('.sifs-loader-outer-wrap').find('.sifs-custom-image-settings-wrap').hide();
                
            }
        }
        
    });

});