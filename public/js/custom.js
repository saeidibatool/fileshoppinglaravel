(function ($) {
    "use strict";



    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('.add-to-wish').on('click', function () {
        var id = $(this).attr('data-id');
//        console.log(id);
        $.ajax({
            url: '/favorite',
            type: 'post',
            dataType: 'json',
            data: {id: id},
          
            success: function (data) {
                if (data.favorite_create == 'success') {
            alert('محصول مورد نظر با موفقیت به علاقمندی‌های شما اضافه شده‌است');
          }else if (data.exists == 'exists') {
            alert('محصول مورد نظر از قبل در علاقمندی‌های شما موجود است');
          }
        }
      });
    });
    
    $('.add-to-cart').on('click', function (){
      var id=$(this).attr('data-id');
      $.ajax({
        url:'/basket',
        type:'post',
        dataType:'json',
        data:{id:id},
        success:function(data){
          if(data.basket_create == 'success'){
            alert('محصول مورد نظر با موفقیت به سبد خرید اضافه شد');
          }else if (data.exists == 'exists') {
            alert('محصول مورد نظر قبلا در سبد خرید شما اضافه شده‌است');
          }
        }
      });
    });

 

/*---------------------------------------------------
     Product Carousel Slider with Tab
----------------------------------------------------- */

$("#latest_category .tab_content").addClass("deactive");
$("#latest_category .tab_content:first").show();
	//Default Action
    $("#latest_category ul#sub-cat li:first").addClass("active").show(); //Activate first tab
    //On Click Event
    $("#latest_category ul#sub-cat li").on("click", function() {
      console.log('نیبتالهنفل');
        $("#latest_category ul#sub-cat li").removeClass("active"); //Remove any "active" class
        $(this).addClass("active"); //Add "active" class to selected tab
		$("#latest_category .tab_content").hide();
        var activeTab = $(this).find("a").attr("href"); //Find the rel attribute value to identify the active tab + content
        $(activeTab).fadeIn(); //Fade in the active content
        return false;
    });



})(jQuery);
