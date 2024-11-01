$ = jQuery.noConflict();
jQuery(document).ready(function($) {  
  $container = $('.sifs-plugins-outer-wrap');         
  
  $('.sifs-feeds-carousel').not('.slick-initialized').slick({
    fade: true,
    cssEase: 'linear',
    speed: 500,
    lazyLoad: 'progressive',
    infinite: false,
    adaptiveHeight: true,
    slidesToShow: 1,
  });

  $('.sifs-feeds-grid').slick({
    rows: 3,
    slidesPerRow: 3,
    slidesToShow: 1,
    slidesToScroll: 1
  });

  var masonary_obj = [];
  $('.sifs-masonry-layouts').each(function () {
      var $selector = $(this);
      var masonary_id = $(this).data('feed-id');
      masonary_obj[masonary_id] = $selector.imagesLoaded(function () {
          masonary_obj[masonary_id].isotope({
              itemSelector: '.sifs-individual-item',
              percentPosition: true,
              masonry: {
                  // use element for option
                  columnWidth: '.sifs-individual-item'
              }
          });
      });
  });

  $('.sifs-grid-common-class').each(function(){
      var $selector = $(this);
      var masonary_id = $(this).data('feed-id');
      masonary_obj[masonary_id] = $selector.imagesLoaded(function () {
      });
  });

  if(sifs_frontend_ajax_object.enable_links == 'on'){
      $('.sifs-image-caption').each(function(){
          var texts = $(this).html();
          texts = texts.replace(/#(\w+)/g, "<a href='https://www.instagram.com/explore/tags/$1' target='_blank' title='$1'>$&</a>").replace(/@(\w+)/g, "<a href='https://www.instagram.com/$1' target='_blank' title='$1'>$&</a>");
          $(this).html(texts);
      });
  }

  $('.sifs-slider-layouts').each( function(){
    var $this = $(this);
    nexttext = $this.data('next-text');
    prevtext = $this.data('prev-text');
    $pager = $this.data('pager');
    pagertype = $this.data('pager-type');
    $auto = $this.data('auto');
    $keyboard = $this.data('keyboard');
    $loop = $this.data('loop');
    $randomstart = $this.data('randomstart');
    $speed = $this.data('speed');
    $controls = $this.data('controls');
    $mode = $this.data('mode');

    $this.bxSlider({ 
      mode: $mode, //'horizontal', 'vertical', 'fade'
      controls: $controls,
      speed: $speed,
      randomStart: $randomstart,
      infiniteLoop: $loop,
      keyboardEnabled: $keyboard,
      auto: $auto,
      stopAutoOnClick: true,
      adaptiveHeight: true,
      nextText: nexttext,
      prevText: prevtext,
      pager: $pager,
      pagerType: pagertype,
    });
  });

});