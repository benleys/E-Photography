$(document).ready(function (){
     
    //BUG -- NEEDS TO BE FIXED (IN WISHLIST)
    $('.addToCartBtn').click(function (e) { 
        e.preventDefault();
        
        var image_id = $(this).closest('.image_data').find('.image_id').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        $.ajax({
            method: "POST",
            url: "add-to-cart",
            data: {
                'image_id': image_id
            },
            success: function (response) {
                alert(response.status);
            }
        });
    });

    //BUG -- NEEDS TO BE FIXED
    $('.removeFromCartBtn').click(function (e) { 
        e.preventDefault();
        
        var image_id = $(this).closest('.image_data').find('.image_id').val();
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        $.ajax({
            method: "POST",
            url: "remove-from-cart",
            data: {
                'image_id': image_id
            },
            success: function (response) {
                alert(response.status);
                location.reload();
            }
        });
    });

    $('.addToWishlistBtn').click(function (e) { 
        e.preventDefault();
        
        var image_id = $(this).closest('.image_data').find('.image_id').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        $.ajax({
            method: "POST",
            url: "add-to-wishlist",
            data: {
                'image_id': image_id
            },
            success: function (response) {
                alert(response.status);
            }
        });
    });

    //BUG -- NEEDS TO BE FIXED
    $('.removeFromWishlistBtn').click(function (e) { 
        e.preventDefault();
        
        var image_id = $(this).closest('.image_data').find('.image_id').val();
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        $.ajax({
            method: "POST",
            url: "remove-from-wishlist",
            data: {
                'image_id': image_id
            },
            success: function (response) {
                alert(response.status);
                location.reload();
            }
        });
    });
})