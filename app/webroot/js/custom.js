// /public/js/custom.js

jQuery(function($) {
    $("#create").on('click', function(event){
        event.preventDefault();
        var $stickynote = $(this);
        
        jQuery.ajax({
		   type: "POST",
		   url: "/CakeSample/sticky/addnote",
		   success: function(data){
                       data = jQuery.parseJSON(data);
                       if(data.response == true){
                            var m_names = new Array("January", "February", "March", 
                            "April", "May", "June", "July", "August", "September", 
                            "October", "November", "December");

                            var d = new Date();
                            var curr_date = d.getDate();
                            var curr_month = d.getMonth();
                            var curr_year = d.getFullYear();
                            var current_date = m_names[curr_month] + " " + curr_date + ", " + curr_year;
                            $stickynote.before("<div class=\"sticky-note\"><textarea id=\"stickynote-"+data.insert_id+"\"></textarea><a href=\"#\" id=\"remove-"+data.insert_id+"\"class=\"delete-sticky\">X</a><p style='text-align: center; font-family: \"Arial Black\", Gadget, sans-serif; font-size: 14px;'>"+current_date+"</p></div>");
                        // print success message
                        } else {
                            // print error message
                            console.log('could not add');
                        }
		   }
		});
    });

    $('#sticky-notes').on('click', 'a.delete-sticky',function(event){
        event.preventDefault();
        var $stickynote = $(this);
        var remove_id = $(this).attr('id');
        remove_id = remove_id.replace("remove-","");
        
        jQuery.ajax({
		   type: "POST",
		   url: "/CakeSample/sticky/delete",
                   data : "id="+remove_id,
		   success: function(data){
                       data = jQuery.parseJSON(data);
                       if(data.response == true){
                           $stickynote.parent().remove();
                       }else{    
                            // print error message
                            console.log('could not remove');
                       }
		   }
		});
    });

    $('#sticky-notes').on('keyup', 'textarea', function(event){
        var $stickynote = $(this);
        var update_id = $stickynote.attr('id'),
        update_content = $stickynote.val();
        update_id = update_id.replace("stickynote-","");
        
        jQuery.ajax({
		   type: "POST",
		   url: "/CakeSample/sticky/update",
                   data : "id="+update_id+"&content="+update_content,
		   success: function(data){
                       data = jQuery.parseJSON(data);
                       if(data.response == false){
                            // print error message
                            console.log('could not update');
                        }
		   }
		});
    });
});