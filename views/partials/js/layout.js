/* global $*/
$(document).ready(function(){
    $('.open-modal').on({
        click: function() {
           openModal();
        }
    });
});

function openModal(){
    $('.mod').addClass('active');
    $('.overlay').addClass('active');
    
}