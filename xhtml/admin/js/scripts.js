(function($){
	$(document).ready(function(){
		var options = '';
		var $selDropdown = $(".sel_dropdown");
		$selDropdown.wrapAll('<div class="tzSelect">');
		$selDropdown.find('option').each(function(ind){
			options = options + '<li>' + $(this).text() + '</li>';
		});
		$('.tzSelect').append('<div class="selectBox">' + $selDropdown.find('option:selected').text()+'</div>');
		$('.tzSelect').append('<ul id="sel_dd_list">' + options + '</ul>');
		$select_list = $("#sel_dd_list");
		$select_list.hide();
		$selDropdown.hide();
		$select_list = $("#sel_dd_list");
		$select_list.hide();
		$selboxP = $(".selectBox");

        $('li', $select_list)
         .filter(function()
         {
            return $(this).text() == $($selboxP).text();
         })
         .hide();

		$selboxP.click(function(){
			if(!$select_list.is(':animated')){
			   if($select_list.is(':visible')){
				   $select_list.slideUp();
				   
			   }else{
				   $select_list.slideDown();
			   }
		   }
		   $('li',$select_list).click(function(){
				$selDropdown.find('option').eq($(this).index()).attr('selected', true);
			   $($selboxP).text($(this).text());
			   
               $('li', $select_list).show();
			   $('li', $select_list)
			     .filter(function()
			     {
                    return $(this).text() == $($selboxP).text();
                 })
                 .hide();
			   
			   $select_list.slideUp();
		   });
		});
	});
	

	
})(jQuery);