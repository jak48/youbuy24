$(document).ready(function() {
    $("#loginLink").click(function(event) {
        event.preventDefault();
        $(".overlay").fadeToggle("fast");
    });

    $(".overlayLink").click(function(event) {
        event.preventDefault();
        var action = $(this).attr('data-action');

        $.get("ajax/" + action, function(data) {
            $(".login-content").html(data);
        });

        $(".overlay").fadeToggle("fast");
    });

    $(".close").click(function() {
        $(".overlay").fadeToggle("fast");
    });

    $(document).keyup(function(e) {
        if (e.keyCode == 27 && $(".overlay").css("display") != "none") {
            event.preventDefault();
            $(".overlay").fadeToggle("fast");
        }
    });

    $(".tab").click(function()
    {
        var X = $(this).attr('id');
        if (X == 'signup')
        {
            $("#login").removeClass('select');
            $("#signup").addClass('select');
            $("#loginbox").slideUp('1');
            $("#signupbox").slideDown('1');
        }
        else
        {
            $("#signup").removeClass('select');
            $("#login").addClass('select');
            $("#signupbox").slideUp('1');
            $("#loginbox").slideDown('1');
        }

    });

//    profile page script
//    function addSubcategoryForm() {
    $("#add_subcategory_form").click(function() {
        $("#subcategory_form").slideToggle("slow");
    });
//    }

    $("#view_subcat").click(function() {
        $("#sub_category_list").slideToggle("slow");
    });


});