jQuery(document).ready(function($) {
    
    $('#search_text').hint();
   
    var current_edit = 0;
   
    /* for create */
    $('body').on('click','#create_button',function(e){
        e.preventDefault();
        $('.popover',$('body')).hide();
        $(this).parent().addClass('popup_container');
        var _popup=$(this).next('.popover');
        _popup.show();
    });
    
	$('body').on('click','.create_button',function(e){
        $(".create_button").show();
		e.preventDefault();
        $('.popover',$('body')).hide();
        $(this).parent().addClass('popup_container');
		var _popup=$(this).next('.popover');
        _popup.show();
		var id = $(this).attr("id");
		if(id=="create_button1"){
			$("#create_button2,#create_button3").hide();
		} else if(id=="create_button2"){
			$("#create_button3,#create_button4").hide();
		} else if(id=="create_button3"){
			$("#create_button4,#create_button5").hide();
		} else if(id=="create_button4"){
			$("#create_button5,#create_button6").hide();
		}
		 else if(id=="create_button5"){
			$("#create_button6").hide();
		}
    });

	
    $('body').on('click', '#save_button', function(e) {
        e.preventDefault();
        $('#category_form').submit();
    });
    
    $('.popover').on('click','.cancel',function(e){
        $(".create_button").show();
		e.preventDefault();
        $('.popover',$('body')).hide();
    });
    
    $('#category_form').validate({
        rules: {
            subcategory_name: {
                required: true
            }
        },
        highlight: function(element) {
            $(element).closest('.control-group').removeClass('success').addClass('error');
        },
        success: function(element) {
            element.text('OK!').addClass('valid').closest('.control-group').removeClass('error').addClass('success');
        }
    });
    
    /* for edit */
    $('body').on('click', '.update_button', function(e) {
        e.preventDefault();
        if ($('#edit_subcategory_name').val() === '')
        {
            $('#edit_subcategory_name').closest('.control-group').removeClass('success').addClass('error');
            var label = $("<label>").text('This field is required.').addClass('error');
            $('#edit_subcategory_name').parent().append(label);
        }
        else
        {
            $('#category_edit_form').submit();
        }
    });
    
    $('.popover').on('click','.cancel_edit',function(e){
        e.preventDefault();
        //change form id, subcategory id/name
        $("#category_edit_form").attr("id","category_edit_form"+current_edit);

        var subcategory_name = $("#edit_subcategory_name");
        subcategory_name.attr("id","edit_subcategory_name"+current_edit);
        subcategory_name.attr("name","edit_subcategory_name"+current_edit);

        $('.popover',$('body')).hide();
    });
    
//    $('.edit_form').each(function(){
//        $(this).validate({
//            rules: {
//                edit_subcategory_name : {
//                    required: true
//                }
//            },
//            
//            highlight: function(element) {
//                $(element).closest('.control-group').removeClass('success').addClass('error');
//            },
//            success: function(element) {
//                element.text('OK!').addClass('valid').closest('.control-group').removeClass('error').addClass('success');
//            }
//        });
//    });
    
    $('body').on('click','.edit_popup',function(e){
            e.preventDefault();
            $('.popover',$('body')).hide();
            $(this).parent().addClass('popup_container');
            
            //change form id, subcategory id/name
            var count=$(this).data('edit-count');
            current_edit = count;
            $("#category_edit_form"+count).attr("id", "category_edit_form");
            
            var subcategory_name = $("#edit_subcategory_name"+count);
            subcategory_name.attr("id","edit_subcategory_name");
            subcategory_name.attr("name","edit_subcategory_name");
            
            var _popup=$(this).next('.popover');
            _popup.show();
    });
    
    /*new drop down in create lession category */
    var options = '';
    var $typeDropdown = $("#type_dropdown");
    $typeDropdown.wrapAll('<div class="tzSelectType">');
    $typeDropdown.find('option').each(function(ind){
        options = options + '<li>' + $(this).text() + '</li>';
    });
    $('.tzSelectType').append('<div class="selectBoxType">' + $typeDropdown.find('option:selected').text()+'</div>');
    $('.tzSelectType').append('<ul id="type_dd_list">' + options + '</ul>');
    $select_list_type = $("#type_dd_list");
    $select_list_type.hide();
    $typeDropdown.hide();
    $select_list_type = $("#type_dd_list");
    $select_list_type.hide();
    $selboxPType = $(".selectBoxType");

    $('li', $select_list_type)
         .filter(function()
         {
            return $(this).text() == $($selboxPType).text();
         })
         .hide();

		$selboxPType.click(function(){
			if(!$select_list_type.is(':animated')){
			   if($select_list_type.is(':visible')){
				   $select_list_type.slideUp();
				   
			   }else{
				   $select_list_type.slideDown();
			   }
		   }
		   $('li',$select_list_type).click(function(){
                       //reset
                       $('select.sel_dropdown option:selected').removeAttr('selected');
                       $typeDropdown.find('option').eq($(this).index()).attr('selected', true);
                       $($selboxPType).text($(this).text());
			   
               $('li', $select_list_type).show();
			   $('li', $select_list_type)
			     .filter(function()
			     {
                    return $(this).text() == $($selboxPType).text();
                 })
                 .hide();
			   
			   $select_list_type.slideUp();
		   });
		});
	
    
    
});