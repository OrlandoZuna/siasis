$(document).ready(function(){
	
	

	

	$('#pills').bootstrapWizard({
        'tabClass': 'nav nav-pills',
        'debug': false,
        onShow: function(tab, navigation, index) {
        },
        onNext: function(tab, navigation, index) {
        	
        	if(index==1){
        		cambiar();
        	}
        },
        onPrevious: function(tab, navigation, index) {
        },
        onLast: function(tab, navigation, index) {
        },
        onTabClick: function(tab, navigation, index) {
            return false;
        },
        onTabShow: function(tab, navigation, index) {
            var $total = navigation.find('li').length;
            var $current = index + 1;
            var $percent = ($current / $total) * 100;
            $('#pills .progress-bar').css({
                width: $percent + '%'
            });
        }
    });

    $('#pills .finish').click(function() {
        alert('Finished!, Starting over!');
        $('#pills').find("a[href*='tab1']").trigger('click');
    });

    
});

