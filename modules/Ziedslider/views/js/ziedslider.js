$(window).load(function() {
    if (autoplay_slider == "1") {
      autoplay_slider = true;
    } else if (autoplay_slider == "0") {
      autoplay_slider = false;
    }

    if (show_arrows == "1") {
      show_arrows = true;
    } else if (show_arrows == "0") {
      show_arrows = false;
    }

    if (mouse_hover == "1") {
      mouse_hover = true;
    } else if (mouse_hover == "0") {
      mouse_hover = false;
    }

    $("#logo-slider").flexisel({
        visibleItems: visible_items,
        itemsToScroll: scroll_items,
        animationSpeed: animation_speed,
        infinite: true,        
        navigationTargetSelector: null,
        autoPlay: {
            enable: autoplay_slider,
            interval: 5000,
            pauseOnHover: mouse_hover
        },
        responsiveBreakpoints: { 
            portrait: { 
                changePoint:480,
                visibleItems: 1,
                itemsToScroll: 1
            }, 
            landscape: { 
                changePoint:640,
                visibleItems: 2,
                itemsToScroll: 2
            },
            tablet: { 
                changePoint:768,
                visibleItems: 3,
                itemsToScroll: 3
            }
        },
        loaded: function(object) {
            console.log('Slider loaded...');
        },
        before: function(object){
            console.log('Before transition...');
        },
        after: function(object) {
            console.log('After transition...');
        },
        resize: function(object){
            console.log('After resize...');
        }
    });

    $("#brand-slider").flexisel({
        visibleItems: 2,
        itemsToScroll: 1,         
        autoPlay: {
            enable: true,
            interval: 5000,
            pauseOnHover: true
        } 
    });
    
    
});