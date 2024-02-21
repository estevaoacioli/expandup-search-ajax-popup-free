jQuery(function($) {     
    $('.input-use-wp-color-picker').wpColorPicker();   
    $('body').on("click", "#active-key", function(e){	
		e.preventDefault();
        
        var user_name = $("#expmsap_user_name").val();
		var app_password = $("#expmsap_app_password").val();
        var license_key = $("#expmsap_license_key").val();
        if(!license_key || !app_password || !user_name){
            alert('Please fill in all fields!');
        } else {
            $('#plugin-status .card-status').hide();
            $('#plugin-status .preloader').show();
            $.ajax({
                url: 		ajaxurl,
                type:		'POST',
                dataType: 	'json',
                data: {
                    'action'		: 	'expmsap_active_plugin_domain',
                    'user_name'		: 	user_name, 
                    'app_password'	: 	app_password,
                    'license_key'	: 	license_key,											
            },
            success: function (response) {
                $('#plugin-status .card-status').show();
                $('#plugin-status .preloader').hide();
                alert(response.message)
                console.log(response); 
                location.reload();               
            }				  
        });
        return false;
        }
		
	}); 

    $('body').on("click", "#remove-active-key", function(e){	
		e.preventDefault(); 
        deletConfirm = confirm('Do you want to remove this license? This operation is irreversible!');
		if (deletConfirm == true) {

            $('#plugin-status .card-status').hide();
            $('#plugin-status .preloader').show();
            $.ajax({
                url: 		ajaxurl,
                type:		'POST',
                dataType: 	'json',
                data: {
                    'action'		: 	'expmsap_remove_active_plugin_domain',                    										
            },
            success: function (response) {
                $('#plugin-status .card-status').show();
                $('#plugin-status .preloader').hide();
                alert(response.message)
                console.log(response); 
                location.reload();               
                }				  
            });
            return false;

        } else {
            alert('Operation cancelled!');
        }	
            		
	}); 
    
});