jQuery(function($) { 
var mySwiper;    
function initSwipers(containerClass, nextButton, prevButton) {
    $(containerClass).each(function () {
        var showPagination = true;
        var showNavigation = true;

        mySwiper  = new Swiper(this, {
            slidesPerView: 1,
            spaceBetween: 20,
            loop: false,            
            autoplay: {
                delay: 7000,
            },
            breakpoints: {
                576: {
                    slidesPerView: 1,
                    slidesPerGroup: 1
                },
                768: {
                    slidesPerView: 2,
                    slidesPerGroup: 2
                },
                1024: {
                    slidesPerView: 3,
                    slidesPerGroup: 3
                },
            },
            navigation: showNavigation ? {
                nextEl: nextButton,
                prevEl: prevButton,
            } : false, // Show or hide navigation based on the showNavigation parameter
            pagination: showPagination ? {
                el: '.swiper-pagination',
                clickable: true,
            } : false, // Show or hide pagination based on the showPagination parameter
        });
    });
}

function initAllSwipers() {    
    $('.rom-slider .swiper-container').each(function() {
        var container = $(this);
        var dataId = container.data('id');
        var nextButton = '.swiper-button-next-' + dataId;
        var prevButton = '.swiper-button-prev-' + dataId;        
        initSwipers(container, nextButton, prevButton);
    });
}

// Call the function to initialize all Swipers
initAllSwipers();

function closeSearchPopup() {
    $('#searchpopup-popup').hide();
    $('#searchpopup-popup').empty();
    $('html, body').css('overflow', 'auto');
}


$('body').on("click", ".searchpopup-close", function(){  
        closeSearchPopup(); 
        setTimeout(function() {
            location.reload();
        }, 100);   
}); 

function handleSearchSubmission(e) {
      e.preventDefault();
      var searchTerm = $(this).find('input[name="s"]').val();
      var preload = '<div style="padding: 60px; text-align: center;"><div class="sbl-circ-path"></div></div>';
  
      if (searchTerm) {
          $('html, body').css('overflow', 'hidden');
          $('#searchpopup-popup').removeClass('searchpopup-mask');
          $('#searchpopup-popup').show().empty().html(preload);
  
          var ajaxData = {
              'url': searchpopup_ajax.ajax_url,
              'type': 'POST',
              'data': {
                  'action': 'expandup_searchpopup_content',
                  's': searchTerm
              },
              'dataType': 'json',
              success: function (data) {
                  if (data.status === 'success') {                      
                      $('#searchpopup-popup').empty().html(data.html);
                      initAllSwipers();
                  } else {
                      console.log(data.msg);
                  }
              }
          };
  
          $.ajax(ajaxData);
      } else {
          alert('Enter a word to search the site.');
      }
}
  
if (typeof searchPopupWhereToUse !== 'undefined') {
    $('body').on('submit', searchPopupWhereToUse.join(', '), handleSearchSubmission);
}
  
$('body').on('submit', '#searchpopupsearch-form', handleSearchSubmission);
     
});