    $('.add-to-cart-btn').click(function() {
      var productId = $(this).data('product-id');
      var productName = $(this).data('product-name');
      var productPrice = $(this).data('product-price');
      var productImage = $(this).data('product-image');
  
      var formData = {
        product_id: productId,
        quantity: 1,
        image: productImage,
        name: productName,
        price: productPrice
      };
  
      console.log(formData);
  
      $.ajax({
        url: './admin/modules/quanlysanpham/addCart.php',
        type: 'POST',
        data: formData,
        success: function(response) {
          console.log(response);
          // Hiển thị thông báo thành công hoặc cập nhật giao diện người dùng (tuỳ vào yêu cầu của bạn)
          loadCartData();
        },
        error: function(xhr, status, error) {
          console.error(error);
        }
      });
    });
  
    function loadCartData() {
      $.get('index.php', function(response) {
        // Cập nhật giao diện người dùng với dữ liệu giỏ hàng đã tải
        $('#cart-content').html(response);
      }).fail(function(xhr, status, error) {
        console.error(error);
      });
    }
    function loadCartData() {
      $.get('cart.php', function(response) {
        // Cập nhật giao diện người dùng với dữ liệu giỏ hàng đã tải
        $('#cart-total').html(response);
      }).fail(function(xhr, status, error) {
        console.error(error);
      });
    }
    
    
