jQuery(function($){
 
    var page = 1;
    var loading = true;
    var $window = $(window);
    var $content = $(".list-posts");
    var load_posts = function(){
            $.ajax({
                type       : "GET",
                data       : {action: 'cwp_loop',numPosts : 4, pageNumber: page},
                dataType   : "html",
                url        : ajaxurl,
                beforeSend : function(data,settings){
                    $content.append('<div id="temp_load" style="text-align:center">\
                            <img src="' + $('#test').val() + '/images/ajax-loader.gif" />\
                            </div>');
  				$(".loadMoreDiv").remove();
                },
                success    : function(data){
					$("#temp_load").remove();
                    $data = $(data);
					console.log($data);
                    $content.append($data);
                },
                error     : function(jqXHR, textStatus, errorThrown) {
                    $("#temp_load").remove();
                    alert(jqXHR + " :: " + textStatus + " :: " + errorThrown);
                }
			});
    }

    $(window).scroll(function(){
//        var heightPage = $(document).height();
//        if ($(this).scrollTop() >  ) {
//            alert( $(document).height() + ' | ' + $(window).height());            
            var content_offset = $content.offset(); 
            loading = true;
            page++;
            load_posts();
//        }
    })
  
load_posts();
});

    