$(document).ready(function(){
    
    // collapsing widgets
	$(".toggle a").click(function(){            
		var box = $(this).parents('[class^=head]').parent('div[class^=span]').find('div[class^=block]');            
		if(box.length == 1){                
			if(box.is(':visible')){
				if(box.attr('data-cookie'))                    
					$.cookies.set(box.attr('data-cookie'),'hidden');                                        
				$(this).parent('li').addClass('active');
				box.slideUp(100);                    
			}else{                    
				if(box.attr('data-cookie'))                    
					$.cookies.set(box.attr('data-cookie'),'visible');                                        
				$(this).parent('li').removeClass('active');
				box.slideDown(200);                    
			}
		}            
		return false;
	});
     
    
    /*$(".header_menu .list_icon").click(function(){        
        var menu = $("body > .menu");        
        if(menu.is(":visible"))
            menu.fadeOut(200);
        else
            menu.fadeIn(300);
        return false;
    });*/
    
	
	$('.sidebar .openable > a').click(function() {
		$('.sidebar .openable').removeClass('active');
		$(this).closest('.openable').addClass('active');	
		var checkElement = $(this).next();
		if((checkElement.is('ul')) && (checkElement.is(':visible'))) {
			$(this).closest('.openable').removeClass('active');
			checkElement.slideUp('normal');
		}
		if((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
			$('.sidebar ul ul:visible').slideUp('normal');
			checkElement.slideDown('normal');
		}
		if($(this).closest('.openable').find('ul').children().length == 0) {
			return true;
		} else {
			return false;	
		}		
	});
	
    if($(".adminControl").hasClass('active')){
        $('.admin').fadeIn(300);
    }
    
    
    $(".adminControl").click(function(){    
        if($(this).hasClass('active')){            
            $.cookies.set('b_Admin_visibility','hidden');
            $('.admin').fadeOut(800);            
            $(this).removeClass('active');            
        }else{            
            $.cookies.set('b_Admin_visibility','visible');            
            $('.admin').fadeIn(800);            
            $(this).addClass('active');
        }        
    });
	
	/* checkbox all */
	/*$("input[name=cek]").click(function(){
      if(!$(this).is(':checked'))
        $(this).parents('table').find('.checker span').removeClass('checked').find('input[type=checkbox]').attr('checked',false);
      else
        $(this).parents('table').find('.checker span').addClass('checked').find('input[type=checkbox]').attr('checked',true);      
      });*/
	
    
});