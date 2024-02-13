(function() {
	'use strict';

	var tinyslider = function() {
		var el = document.querySelectorAll('.testimonial-slider');

		if (el.length > 0) {
			var slider = tns({
				container: '.testimonial-slider',
				items: 1,
				axis: "horizontal",
				controlsContainer: "#testimonial-nav",
				swipeAngle: false,
				speed: 700,
				nav: true,
				controls: true,
				autoplay: true,
				autoplayHoverPause: true,
				autoplayTimeout: 3500,
				autoplayButtonOutput: false
			});
		}
	};
	tinyslider();




	// (function() {
    //     'use strict';

    //     var sitePlusMinus = function() {
    //         var value,
    //             quantityContainers = document.getElementsByClassName('quantity-container');

    //         function createBindings(quantityContainer) {
    //             var quantityAmount = quantityContainer.getElementsByClassName('quantity-amount')[0];
    //             var increase = quantityContainer.getElementsByClassName('increase')[0];
    //             var decrease = quantityContainer.getElementsByClassName('decrease')[0];

    //             increase.addEventListener('click', function (e) { updateQuantityAndPrice(e, quantityAmount, 1); });
    //             decrease.addEventListener('click', function (e) { updateQuantityAndPrice(e, quantityAmount, -1); });
    //         }

    //         function init() {
    //             for (var i = 0; i < quantityContainers.length; i++ ) {
    //                 createBindings(quantityContainers[i]);
    //             }
    //         };

    //         // function updateQuantityAndPrice(event, quantityAmount, increment) {
    //         //     value = parseInt(quantityAmount.value, 10);
    //         //     value = isNaN(value) ? 0 : value;

    //         //     // Mettez à jour la quantité
    //         //     value += increment;
    //         //     value = Math.max(0, value);

    //         //     quantityAmount.value = value;

    //         //     // Mettez à jour le prix en fonction de la quantité
    //         //     var priceElement = quantityAmount.closest('tr').querySelector('.subtotal');
    //         //     var pricePerItem = parseFloat(priceElement.dataset.price); // Récupérez le prix par article
    //         //     var totalPrice = value * pricePerItem;

    //         //     priceElement.textContent = 'FCFA' + totalPrice.toFixed(2);

    //         //     // Mettez à jour le prix total du panier
    //         //     updateTotalPrice();
    //         // }


    //         // function updateTotalPrice() {
    //         //     var total = 0;

    //         //     // Itérez sur chaque produit dans le panier
    //         //     for (var i = 0; i < quantityContainers.length; i++) {
    //         //         var quantity = parseInt(quantityContainers[i].querySelector('.quantity-amount').value, 10);
    //         //         var pricePerItem = parseFloat(quantityContainers[i].querySelector('.subtotal').dataset.price);
    //         //         total += quantity * pricePerItem;
    //         //     }

    //         //     // Mettez à jour le prix total du panier
    //         //     document.getElementById('cart-total-price').textContent = 'FCFA' + total.toFixed(2);
    //         // }

    //         init();
    //     };

    //     sitePlusMinus();
    })();




