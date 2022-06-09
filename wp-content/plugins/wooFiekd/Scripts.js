jQuery(document).ready( function( $ ){
    var data = {
        action: 'my_action',
        whatever: 1234
    };

    // с версии 2.8 'ajaxurl' всегда определен в админке
    jQuery.post( ajaxurl, data, function( response ){
        alert( 'Получено с сервера: ' + response );
    } );
} );

document.querySelectorAll(".clear-button")
    .forEach(function (elem) {
        elem.onclick = function (e) {

            let selector = this.dataset.clearSelector;
            document.querySelectorAll(selector)
                .forEach(function (item) {
                    item.value = "";

                });
        };
    });


//save-buttob
document.querySelectorAll(".save-button").
    jQuery(document).ready( function( $ ) {
        var data = {
            action: 'CallOfHook',
        };


        jQuery.post(ajaxurl, data, function () {
            alert('Все ок!');
        });
    });


document.querySelectorAll(".delete-button").
jQuery(document).ready( function( $ ) {
    var data = {
        action: 'deim',
    };


    jQuery.post(ajaxurl, data, function () {
        alert('Все ок!');
    });
});