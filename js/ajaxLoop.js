jQuery(function($){
 
    var page = 1;
    var load = true;
    var loading = true;
    var $window = $(window);
    var $content = $(".list-posts");
	
	var catid = $("#catid").val();
	var yearvar = $("#year_id").val();
	var monthvar = $("#month_id").val();
	var authorvar = $("#author_id").val();
	var tagvar = $("#tag_id").val();
	
	if(typeof catid  !== 'undefined') {

		var load_posts = function(){
            $.ajax({
                type       : "GET",
                data       : {action: 'cwp_loop',numPosts : 4, pageNumber: page, catNumber: catid},
                dataType   : "html",
                url        : ajaxurl,
                beforeSend : function(data,settings){
				
					if ($("#temp_load").length === 0){
				
						$content.append('<div id="temp_load" style="text-align:center">\
                            <img src="' + $('#load_posts').val() + '/images/ajax-loader.gif" />\
                            </div>');
					}		
  				
                },
                success    : function(data){
					page++;
					$("#temp_load").remove();
                    $data = $(data);
		              
                     if( $data.length != 0 ){ 
                        $content.append($data); 
                     }
                    else { 
                          load = false;
                    }
                },
                error     : function(jqXHR, textStatus, errorThrown) {
                    $("#temp_load").remove();
                  
                }
			});
		}
	}
	else if((typeof yearvar  !== 'undefined') && (typeof monthvar  !== 'undefined')) {

		var load_posts = function(){
            $.ajax({
                type       : "GET",
                data       : {action: 'cwp_loop',numPosts : 4, pageNumber: page, yearPar : yearvar, monthPar : monthvar},
                dataType   : "html",
                url        : ajaxurl,
                beforeSend : function(data,settings){
				
					if ($("#temp_load").length === 0){
				
						$content.append('<div id="temp_load" style="text-align:center">\
                            <img src="' + $('#load_posts').val() + '/images/ajax-loader.gif" />\
                            </div>');
					}		
  				
                },
                success    : function(data){
					page++;
					$("#temp_load").remove();
                    $data = $(data);
		              
                     if( $data.length != 0 ){ 
                        $content.append($data); 
                     }
                    else { 
                          load = false;
                    }
                },
                error     : function(jqXHR, textStatus, errorThrown) {
                    $("#temp_load").remove();
                  
                }
			});
		}
	}
	else if(typeof yearvar  !== 'undefined') {

		var load_posts = function(){
            $.ajax({
                type       : "GET",
                data       : {action: 'cwp_loop',numPosts : 4, pageNumber: page, yearPar : yearvar},
                dataType   : "html",
                url        : ajaxurl,
                beforeSend : function(data,settings){
				
					if ($("#temp_load").length === 0){
				
						$content.append('<div id="temp_load" style="text-align:center">\
                            <img src="' + $('#load_posts').val() + '/images/ajax-loader.gif" />\
                            </div>');
					}		
  				
                },
                success    : function(data){
					page++;
					$("#temp_load").remove();
                    $data = $(data);
		              
                     if( $data.length != 0 ){ 
                        $content.append($data); 
                     }
                    else { 
                          load = false;
                    }
                },
                error     : function(jqXHR, textStatus, errorThrown) {
                    $("#temp_load").remove();
                  
                }
			});
		}
	}
	else if(typeof authorvar  !== 'undefined') {

		var load_posts = function(){
            $.ajax({
                type       : "GET",
                data       : {action: 'cwp_loop',numPosts : 4, pageNumber: page, authorPar : authorvar},
                dataType   : "html",
                url        : ajaxurl,
                beforeSend : function(data,settings){
				
					if ($("#temp_load").length === 0){
				
						$content.append('<div id="temp_load" style="text-align:center">\
                            <img src="' + $('#load_posts').val() + '/images/ajax-loader.gif" />\
                            </div>');
					}		
  				
                },
                success    : function(data){
					page++;
					$("#temp_load").remove();
                    $data = $(data);
		              
                     if( $data.length != 0 ){ 
                        $content.append($data); 
                     }
                    else { 
                          load = false;
                    }
                },
                error     : function(jqXHR, textStatus, errorThrown) {
                    $("#temp_load").remove();
                  
                }
			});
		}
	}
	else if(typeof tagvar  !== 'undefined') {

		var load_posts = function(){
            $.ajax({
                type       : "GET",
                data       : {action: 'cwp_loop',numPosts : 4, pageNumber: page, tagPar : tagvar},
                dataType   : "html",
                url        : ajaxurl,
                beforeSend : function(data,settings){
				
					if ($("#temp_load").length === 0){
				
						$content.append('<div id="temp_load" style="text-align:center">\
                            <img src="' + $('#load_posts').val() + '/images/ajax-loader.gif" />\
                            </div>');
					}		
  				
                },
                success    : function(data){
					page++;
					$("#temp_load").remove();
                    $data = $(data);
		              
                     if( $data.length != 0 ){ 
                        $content.append($data); 
                     }
                    else { 
                          load = false;
                    }
                },
                error     : function(jqXHR, textStatus, errorThrown) {
                    $("#temp_load").remove();
                  
                }
			});
		}
	}
	else {
		
		var load_posts = function(){
            $.ajax({
                type       : "GET",
                data       : {action: 'cwp_loop',numPosts : 4, pageNumber: page},
                dataType   : "html",
                url        : ajaxurl,
                beforeSend : function(data,settings){
                    
					if ($("#temp_load").length === 0){
				
						$content.append('<div id="temp_load" style="text-align:center">\
                            <img src="' + $('#load_posts').val() + '/images/ajax-loader.gif" />\
                            </div>');
					}
  				
                },
                success    : function(data){
					page++;
					$("#temp_load").remove();
                    $data = $(data);
					//console.log($data);
                     if( $data.length != 0 ){ 
                        $content.append($data); 
                     }
                    else { 
                          load = false;
                    }
                },
                error     : function(jqXHR, textStatus, errorThrown) {
                    $("#temp_load").remove();
                    
                }
			});
    }
	}
		
	
    

    $(window).scroll(function(){
          
            var content_offset = $content.offset(); 
//            loading = true;
            
            if((load == true)&&($(window).scrollTop() >= $(document).height() - $(window).height() - 100))
                load_posts();
    })
  
load_posts();
});


    