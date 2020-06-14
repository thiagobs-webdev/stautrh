/*!
    * Start Bootstrap - SB Admin v6.0.0 (https://startbootstrap.com/templates/sb-admin)
    * Copyright 2013-2020 Start Bootstrap
    * Licensed under MIT (https://github.com/BlackrockDigital/startbootstrap-sb-admin/blob/master/LICENSE)
    */
    (function($) {
    "use strict";

    // Add active state to sidbar nav links
    var path = window.location.href; // because the 'href' property of the DOM element is the absolute path
        $("#layoutSidenav_nav .sb-sidenav a.nav-link").each(function() {
            if (this.href === path) {
                $(this).addClass("active");
            }
        });

    // Toggle the side navigation
    $("#sidebarToggle").on("click", function(e) {
        e.preventDefault();
        $("body").toggleClass("sb-sidenav-toggled");
    });

    // LOGIN
    $('form[name="login"]').submit(function (e) {
        e.preventDefault();

        var form = $(this);
        var action = form.attr("action");
        var data = form.serialize();

        $.ajax({
            url: action,
            data: data,
            type: "post",
            dataType: "json",
            beforeSend: function (load) {
                ajax_load("open");
            },
            success: function (response) {
                ajax_load("close");

                 //redirect
                 if (response.redirect) {
                    window.location.href = response.redirect;
                } 
                
                //Error
                if (response.message) {
                    $(".ajax_response").html(response.message).effect("bounce");
                }
            }
        });
    });

    // Form Submit
    $(".ajax_form").submit(function (e) {
        e.preventDefault();

        var form = $(this);
        var action = form.attr("action");
        var data = form.serialize();

        $.ajax({
            url: action,
            data: data,
            type: "post",
            dataType: "json",
            beforeSend: function (load) {
                ajax_load("open");
            },
            success: function (response) {
                ajax_load("close");

                 //redirect
                 if (response.redirect) {
                    window.location.href = response.redirect;
                } 
                
                //Error
                if (response.message) {
                    $(".ajax_response").html(response.message).effect("bounce");
                }
            }
        });
        
    });

    // Delete Modal
    $('.js_modal_btn').click(function(){
        var registerId = $(this).data('registerid');
        var confirm = $(this).data('confirm');
        var action = $(this).data('action');

        $('.js_param_text').text(confirm);
        $("#js_delete_post").data("action", action);
        $("#js_delete_post").data("register_id", registerId);
        $('#deleteModal').modal();
    });

    // Generic
    // DELETE ACTION
    $(".js_delete_post").click(function (e) {
        e.preventDefault();

        var clicked = $(this);
        var data = clicked.data();
        
        $('#deleteModal').modal('hide');
        $.ajax({
            url: data.action,
            type: "DELETE",
            data: data,
            dataType: "json",
            beforeSend: function (load) {
                ajax_load("open");
            },
            success: function (response) {

                ajax_load("close");

                //redirect
                if (response.redirect) {
                    window.location.href = response.redirect;
                } 
                
                //Error
                if (response.message) {
                    $(".ajax_response").html(response.message).effect("bounce");
                }
                
            }
        });
    });

    // AJAX LOADING
    function ajax_load(action) {
        var ajax_load_div = $(".ajax_load");

        if (action === "open") {
            ajax_load_div.fadeIn(200).css("display", "flex");
        }

        if (action === "close") {
            ajax_load_div.fadeOut(200);
        }
    }
})(jQuery);
