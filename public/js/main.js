(function ($) {
    //=====================================
    //=====================================
    //      Shopping Cart Interaction
    //=====================================
    //=====================================

	var cartWrapper = $('.cart-container');
	//product id - you don't need a counter in your real project but you can use your real product id
	

	if( cartWrapper.length > 0 ) {
		//store jQuery objects
		var cartBody = cartWrapper.find('.body');
		var cartList = cartBody.find('ul').eq(0);
		var cartTotal = cartWrapper.find('.checkout').find('span');
		var cartTrigger = cartWrapper.children('.cart-trigger');
		var cartCount = cartTrigger.children('.count');
		var addToCartBtn = $('.add-to-cart');
		var undo = cartWrapper.find('.undo');
		var undoTimeoutId;

		//add product to cart
		addToCartBtn.on('click', function(event){
			event.preventDefault();
			addToCart($(this));
		});

		//open/close cart
		cartTrigger.on('click', function(event){
			event.preventDefault();
			toggleCart();
		});

		//close cart when clicking on the .cart-container::before (bg layer)
		cartWrapper.on('click', function(event){
			if( $(event.target).is($(this)) ) toggleCart(true);
		});

		//delete an item from the cart
		cartList.on('click', '.delete-item', function(event){
			event.preventDefault();
			removeProduct($(event.target).parents('.product'),$(this).data('productid'));
		});

		//update item quantity
		cartList.on('change', 'select', function(event){
			quickUpdateCart($(this).data('productid'));
		});

		//reinsert item deleted from the cart
		undo.on('click', 'a', function(event){
			clearInterval(undoTimeoutId);
			event.preventDefault();
			cartList.find('.deleted').addClass('undo-deleted').one('webkitAnimationEnd oanimationend msAnimationEnd animationend', function(){
				$(this).off('webkitAnimationEnd oanimationend msAnimationEnd animationend').removeClass('deleted undo-deleted').removeAttr('style');
				quickUpdateCart();
			});
			undo.removeClass('visible');
		});
	}

	function toggleCart(bool) {
		var cartIsOpen = ( typeof bool === 'undefined' ) ? cartWrapper.hasClass('cart-open') : bool;

		if( cartIsOpen ) {
			cartWrapper.removeClass('cart-open');
			//reset undo
			clearInterval(undoTimeoutId);
			undo.removeClass('visible');
			cartList.find('.deleted').remove();

			setTimeout(function(){
				cartBody.scrollTop(0);
				//check if cart empty to hide it
				if( Number(cartCount.find('li').eq(0).text()) === 0) cartWrapper.addClass('empty');
			}, 500);
		} else {
			cartWrapper.addClass('cart-open');
		}
	}

	
	//cookies start
		var a = getCookie("productName");
        var productName = a.split(',');
         a = getCookie("productPrice");
        var productPrice = a.split(',');
        a = getCookie("inventoryId");
        var inventoryId = a.split(',');
         a = getCookie('productId');
        var productId = parseInt(a);
        var totalPrice = Number(getCookie('totalPrice'));
        a = getCookie("cookieQuantity");
        var cookieQuantity= a.split(',');

        if(productName != "" && productPrice != "" ) 
            {
            	cartCount.find('li').eq(0).text(productId);
            	cartTotal.text(totalPrice.toFixed(2));
                document.getElementById('cartEmpty').classList.remove('empty');
                for (var j = 0; j<productId; j++) 
		        {
		            var productAdded = $('<li class="product"><div class="product-details"><h3><a href="#1">' + productName[j] + '</a></h3><span class="price">$' + productPrice[j] + '</span><div class="actions"><a href="#0" class="delete-item" data-productId='+j+'>Delete</a><div class="quantity"><label for="product-'+ j +'" data-productId="'+ j +'">Qty</label><span class="select"><select data-productId='+j+' id="product-'+ j +'" name="quantity"><option value=" '+ cookieQuantity[j]+' ">'+ cookieQuantity[j]+'</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option></select></span></div></div></div></li>');
		            cartList.append(productAdded);
		        }
            } 

        else 
            {
                productName = new Array();
                productPrice = new Array();
                inventoryId = new Array();
                productId = 0;
                totalPrice = 0;
                cookieQuantity = new Array(); 
            }

		

       function addToCart(trigger) {
		var cartIsEmpty = cartWrapper.hasClass('empty');
		//update cart product list
		addProduct(trigger.data('name'),trigger.data('price'),trigger.data('id'));
		//update number of items
		updateCartCount(productId);
		//update total price
		updateCartTotal(trigger.data('price'), true);
		//show cart
		cartWrapper.removeClass('empty');
		}

	function addProduct(name,price,id) {
		
		productName[productId] = name;
		productPrice[productId] = price;
		inventoryId[productId] = id;
		cookieQuantity[productId] = 1;
		var productAdded = $('<li class="product"><div class="product-details"><h3><a href="#1">' + name + '</a></h3><span class="price">$' + price + '</span><div class="actions"><a href="#0" class="delete-item" data-productId='+productId+'>Delete</a><div class="quantity"><label for="product-'+ productId +'">Qty</label><span class="select"><select id="product-'+ productId +'" name="quantity" data-productId='+productId+'><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option></select></span></div></div></div></li>');
		cartList.append(productAdded);
		setCookie("productName", productName, 1);
		setCookie("productPrice", productPrice, 1);
		setCookie("cookieQuantity", cookieQuantity, 1);
		setCookie("inventoryId", inventoryId, 1);
		productId++;
		setCookie("productId", productId, 1);

	}
	function removeProduct(product,id) {
		
		clearInterval(undoTimeoutId);
		for (var i = productId.length - 1; i >= 0; i--) 
		{
			cartList.remove(i);
		}

		var topPosition = product.offset().top - cartBody.children('ul').offset().top ,
			productQuantity = Number(product.find('.quantity').find('select').val()),
			productTotPrice = Number(product.find('.price').text().replace('$', '')) * productQuantity;

		product.css('top', topPosition+'px').addClass('deleted');

		//update items count + total price
		updateCartTotal(productTotPrice, false);
		
		undo.addClass('visible');

		//wait 8sec before completely remove the item
		undoTimeoutId = setTimeout(function(){
			undo.removeClass('visible');
			cartList.find('.deleted').remove();
		}, 8000);

		productId = productId-1;
		productName.splice(id,1);
		productPrice.splice(id,1);
		cookieQuantity.splice(id,1);
		inventoryId.splice(id,1);
		setCookie("productId",productId,1)
		setCookie("productName", productName, 1);
		setCookie("productPrice", productPrice, 1);
		setCookie("cookieQuantity", cookieQuantity, 1);
		setCookie("inventoryId", inventoryId, 1);
		updateCartCount(productId);
		
		for (j = 0; j<productId; j++) 
        {
            var productAdded = $('<li class="product"><div class="product-details"><h3><a href="#1">' + productName[j] + '</a></h3><span class="price">$' + productPrice[j] + '</span><div class="actions"><a href="#0" class="delete-item" data-productId='+j+'>Delete</a><div class="quantity"><label for="product-'+ j +'" data-productId="'+ j +'">Qty</label><span class="select"><select data-productId='+j+' id="product-'+ j +'" name="quantity"><option value=" '+ cookieQuantity[j]+' ">'+ cookieQuantity[j]+'</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option></select></span></div></div></div></li>');
            cartList.append(productAdded);
        }

		

		
	}

	function quickUpdateCart(productId) {
		var quantity = 0;
		var looper = 0;
		var price = 0;

		cartList.children('li:not(.deleted)').each(function(){

			var singleQuantity = Number($(this).find('select').val());
			cookieQuantity[looper] = singleQuantity;
			looper++;
			quantity = quantity + singleQuantity;
			price = price + singleQuantity*Number($(this).find('.price').text().replace('$', ''));
		});
		
		cartTotal.text(price.toFixed(2));
		cartCount.find('li').eq(0).text(quantity);
		cartCount.find('li').eq(1).text(quantity+1);
		setCookie("cookieQuantity", cookieQuantity, 1);
		setCookie("totalPrice", price, 1);
	}

	function updateCartCount(quantity) {
        var actual = quantity;
        var next = quantity+1;

			cartCount.find('li').eq(0).text(actual);
			cartCount.find('li').eq(1).text(next);
	}

	function updateCartTotal(price, bool) {
		bool ? cartTotal.text( (Number(cartTotal.text()) + price).toFixed(2) )  : cartTotal.text( (Number(cartTotal.text()) - price).toFixed(2) );
		setCookie("totalPrice",cartTotal.text(),1)
	}

    //=========================================
    //=========================================
    //      End Shopping Cart Interaction
    //=========================================
    //=========================================

    //===========================
    //===========================
    //      Gallery Preview
    //===========================
    //===========================

	var galleryItems = $('.gallery').children('li');

	galleryItems.each(function(){
		var container = $(this),
		// create slider dots
			sliderDots = createSliderDots(container);
		//check if item is on sale
		updatePrice(container, 0);

		// update slider when user clicks one of the dots
		sliderDots.on('click', function(){
			var selectedDot = $(this);
			if(!selectedDot.hasClass('selected')) {
				var selectedPosition = selectedDot.index(),
					activePosition = container.find('.item-wrapper .selected').index();
				if( activePosition < selectedPosition) {
					nextSlide(container, sliderDots, selectedPosition);
				} else {
					prevSlide(container, sliderDots, selectedPosition);
				}

				updatePrice(container, selectedPosition);
			}
		});

		// update slider on swipeleft
		container.find('.item-wrapper').on('swipeleft', function(){
			var wrapper = $(this);
			if( !wrapper.find('.selected').is(':last-child') ) {
				var selectedPosition = container.find('.item-wrapper .selected').index() + 1;
				nextSlide(container, sliderDots);
				updatePrice(container, selectedPosition);
			}
		});

		// update slider on swiperight
		container.find('.item-wrapper').on('swiperight', function(){
			var wrapper = $(this);
			if( !wrapper.find('.selected').is(':first-child') ) {
				var selectedPosition = container.find('.item-wrapper .selected').index() - 1;
				prevSlide(container, sliderDots);
				updatePrice(container, selectedPosition);
			}
		});

		// preview image hover effect - desktop only
		container.on('mouseover', '.move-right, .move-left', function(event){
			hoverItem($(this), true);
		});
		container.on('mouseleave', '.move-right, .move-left', function(event){
			hoverItem($(this), false);
		});

		// update slider when user clicks on the preview images
		container.on('click', '.move-right, .move-left', function(event){
			event.preventDefault();
			if ( $(this).hasClass('move-right') ) {
				var selectedPosition = container.find('.item-wrapper .selected').index() + 1;
				nextSlide(container, sliderDots);
			} else {
				var selectedPosition = container.find('.item-wrapper .selected').index() - 1;
				prevSlide(container, sliderDots);
			}
			updatePrice(container, selectedPosition);
		});
	});

	function createSliderDots(container){
		var dotsWrapper = $('<ol class="dots"></ol>').insertAfter(container.children('a'));
		container.find('.item-wrapper li').each(function(index){
			var dotWrapper = (index == 0) ? $('<li class="selected"></li>') : $('<li></li>'),
				dot = $('<a href="#0"></a>').appendTo(dotWrapper);
			dotWrapper.appendTo(dotsWrapper);
			dot.text(index+1);
		});
		return dotsWrapper.children('li');
	}

	function hoverItem(item, bool) {
		( item.hasClass('move-right') )
			? item.toggleClass('hover', bool).siblings('.selected, .move-left').toggleClass('focus-on-right', bool)
			: item.toggleClass('hover', bool).siblings('.selected, .move-right').toggleClass('focus-on-left', bool);
	}

	function nextSlide(container, dots, n){
		var visibleSlide = container.find('.item-wrapper .selected'),
			navigationDot = container.find('.dots .selected');
		if(typeof n === 'undefined') n = visibleSlide.index() + 1;
		visibleSlide.removeClass('selected');
		container.find('.item-wrapper li').eq(n).addClass('selected').removeClass('move-right hover').prevAll().removeClass('move-right move-left focus-on-right').addClass('hide-left').end().prev().removeClass('hide-left').addClass('move-left').end().next().addClass('move-right');
		navigationDot.removeClass('selected')
		dots.eq(n).addClass('selected');
	}

	function prevSlide(container, dots, n){
		var visibleSlide = container.find('.item-wrapper .selected'),
			navigationDot = container.find('.dots .selected');
		if(typeof n === 'undefined') n = visibleSlide.index() - 1;
		visibleSlide.removeClass('selected focus-on-left');
		container.find('.item-wrapper li').eq(n).addClass('selected').removeClass('move-left hide-left hover').nextAll().removeClass('hide-left move-right move-left focus-on-left').end().next().addClass('move-right').end().prev().removeClass('hide-left').addClass('move-left');
		navigationDot.removeClass('selected');
		dots.eq(n).addClass('selected');
	}

	function updatePrice(container, n) {
		var priceTag = container.find('.price'),
			selectedItem = container.find('.item-wrapper li').eq(n);
		if( selectedItem.data('sale') ) {
			// if item is on sale - cross old price and add new one
			priceTag.addClass('on-sale');
			var newPriceTag = ( priceTag.next('.new-price').length > 0 ) ? priceTag.next('.new-price') : $('<em class="new-price"></em>').insertAfter(priceTag);
			newPriceTag.text(selectedItem.data('price'));
			setTimeout(function(){ newPriceTag.addClass('is-visible'); }, 100);
		} else {
			// if item is not on sale - remove cross on old price and sale price
			priceTag.removeClass('on-sale').next('.new-price').removeClass('is-visible').on('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function(){
				priceTag.next('.new-price').remove();
			});
		}
	}

    //===============================
    //===============================
    //      End Gallery Preview
    //===============================
    //===============================

	//========================
	//========================
	//      jQuery Fixes
	//========================
	//========================

	$(document).on('modileinit', function () {
		$.mobile.loader.prototype.options.disabled = true;
	});

	//============================
	//============================
	//      End jQuery Fixes
	//============================
	//============================
})(jQuery);