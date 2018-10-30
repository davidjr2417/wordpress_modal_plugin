jQuery( document ).ready(function() {
    
    jQuery('#menu-main-menu').slimmenu( {
        resizeWidth: '767',
        collapserTitle: 'Main Menu',
        animSpeed: 'medium',
        easingEffect: null,
        indentChildren: false,
        childrenIndenter: '&nbsp;',
        expandIcon: '<i class="fa fa-angle-down"></i>',
        collapseIcon:   '<i class="fa fa-angle-up"></i>'
    });

    jQuery(".navbar-toggle").on("click", function () {
        jQuery(this).toggleClass("active");
    });

    // Home page slider
    jQuery('.flexslider').flexslider({
        animation: "slide"
    });

    jQuery('#myModal').on('shown.bs.modal', function () {
      jQuery('#myInput').focus()
    })
});


