import './bootstrap';
import 'flowbite';

$(function (){
    $(window).on('load', function () {
        $('#preloader').fadeOut(300, function () {
            $(this).remove();
        });

        $("#create_estate_price").hide();
        $('#is_sell').on("change", function (){
            $("#create_estate_price").show(300);
            if($(this).val()=="1"){
                $("#label_price_1").removeClass('hidden');
                $("#label_price_2").addClass('hidden');
            } else if ($(this).val()=="0"){
                $("#label_price_2").removeClass('hidden');
                $("#label_price_1").addClass('hidden');
            }
        })

        $('#street, #city, #price').on("input", function (){
            const v1 = $("#street").val().trim();
            const v2 = $("#city").val().trim();
            const v3 = $("#price").val().trim();

            if (v1 !== "" && v2 !== "" && v3 !== ""){
                $("#non_essential_data").show(300);
            }
        })
    });
})
