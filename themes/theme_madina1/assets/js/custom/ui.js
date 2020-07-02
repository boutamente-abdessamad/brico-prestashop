$(document).ready(() => {


    // trigger add to cart button 

    $('.cui-add-to-cart').on('click', function(e) {

        $(this).closest('article').find('button.add-to-cart').trigger('click');

    })

})