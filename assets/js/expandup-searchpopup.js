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

// Add to Cart button click event
$('body').on('click', '.content-add-to-cart-button .popup_ajax_add_to_cart', function(e) {
    e.preventDefault();
   
    var btnAddToCart = $(this);
    var product_id = $(this).data('product_id');

    btnAddToCart.addClass('loading');

    // Stop the Swiper
    if (mySwiper) {
        mySwiper.autoplay.stop();
    }
        
    $.ajax({
        type: 'POST',
        url: searchpopup_ajax.ajax_url,
        data: {
            action: 'searchpopup_add_product_to_cart',
            nonce: searchpopup_add_to_cart_vars.nonce,
            product_id: product_id,
        },
        success: function(response) {
            var data = JSON.parse(response);            
            if (data.status === 'success') {                
                
                $('#alert-' + product_id).html(data.message);
                $('#alert-' + product_id).addClass('show-alert');
                $(btnAddToCart).hide();
                $('#view_cart-' + product_id).addClass('show-alert');
                
                // Use a função setTimeout para atrasar a ação em cada caso
                switch (data.actions) {
                    case 'null':                        
                        // Ação imediata, sem atraso
                        break;
                    case 'close':
                        setTimeout(function() {
                            closeSearchPopup();
                        }, 3000); // Ação após um atraso de 3 segundos (3000 milissegundos)
                        break;
                    case 'close-reload':
                        setTimeout(function() {
                            closeSearchPopup();
                        }, 5000); // Ação após um atraso de 3 segundos (3000 milissegundos)
                        setTimeout(function() {
                            location.reload();
                        }, 5000); // Ação após um atraso de 7 segundos (7000 milissegundos)
                        break;
                    case 'redirect':
                        setTimeout(function() {
                            window.location.href = data.page;
                        }, 5000); // Ação após um atraso de 7 segundos (7000 milissegundos)
                        break;
                }

                if (mySwiper) {
                    // Reinicie o Swiper após um atraso de 20 segundos (20000 milissegundos)
                    setTimeout(function() {
                        mySwiper.autoplay.start();
                    }, 20000); 
                }
            } else {
                // Handle error
                alert(data.message);
            }
        },
    });
});
     
});