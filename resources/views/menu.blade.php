@extends('layouts.layout')

@section('content')

	<div class="shop">
		<div class="shop-hov">
			<div class="image-shop">
				<img src="/uploads/shop/{{ $name[0]->img }}" alt="oasis" class="mx-auto d-block">
			</div>
			<div class="overlay_sp mx-auto d-block">
				<div class="sp-name row">
					<div class="col-2 left-arrow"><i class="fas fa-caret-left fa-2x"></i></div>

					<div class="col-8"><h1 class="shop-name">{{ $name[0]->name }}</h1></div>

					<div class="col-2 right-arrow"><i class="fas fa-caret-right fa-2x"></i></div>
				</div>
			</div>
		</div>
	</div><!--shop-->

	<!--food-container-->
	<div id="food-container">
		<div class="food row">
			@foreach($menu as $menu)
				<div class="col-5 col-lg-2 food-img">

					<img src="/uploads/menu/{{$menu->img}}" alt="salmon">
				</div><!--food-img-->
				<div class="col-5 col-lg-3 food-title">
					<h6>{{ $menu->name }}</h6>
					<h6>{{ $menu->price }}</h6>
				</div><!--food-title-->
				<div class="col-2 col-lg-1 inc-dec">
					<div class="order-btn">
						<div class="value-button" id="increase" onclick="increaseValue('{{ $menu->id}}')" value="Increase Value"><i class="fas fa-plus"></i></div>
						<input type="number" class="num{{$menu->id}}" id="number" value="0" />
						<div class="value-button" id="decrease" onclick="decreaseValue('{{ $menu->id}}')" value="Decrease Value"><i class="fas fa-minus"></i></div>
					</div>
				</div><!--inc-dec-->
			@endforeach
			
		</div><!--food-->
	</div>

	

	<script type="text/javascript">

		var menu = getCookie('menu'+'{{ $name[0]->id }}').split(',');
		var quantity = getCookie('quantity'+'{{ $name[0]->id }}').split(',');
        var amount = getCookie('amount'+'{{ $name[0]->id }}');

        var menuDetail;
        var quantityDetail;
        

		if(menu != "" && quantity != "" ) 
        {
      
        } 

        else{

    	 	
            quantity = new Array();
            menu = new Array();
            amount = 0;

        }
        
        for (var j = 0; j<menu.length; j++) 
            {
                $('.num'+menu[j]).attr("value",quantity[j]);
            }

        
        


		function increaseValue(mId)
		{
			if (amount < 5) 
			{

					if(menu.includes(mId))
					{
						quantity[menu.indexOf(mId)] = parseInt(quantity[menu.indexOf(mId)])+1;
					}
					else
					{
						menu[menu.length] = mId;
						quantity[quantity.length] = 1;

					}

					amount = parseInt(amount)+1;

			}	
			else{
				alert('Order is full for '+'{{ $name[0]->name }}');
			}
			$('.num'+mId).attr("value",quantity[menu.indexOf(mId)]);
			
			
			setCookie('menu'+'{{ $name[0]->id }}', menu, 1);
            setCookie('quantity'+'{{ $name[0]->id }}', quantity, 1);
            setCookie('amount'+'{{ $name[0]->id }}', amount, 1);
		}

		function decreaseValue(m_id)
        {
          var index = menu.indexOf(m_id);
          if(quantity[index]>0)
          {
            quantity[index]-=1;
            $('.num'+m_id).attr("value",quantity[index]);

            if(quantity[index]==0)
            {
              quantity.splice(index,1);
              menu.splice(index,1);
            }
          
            amount--;
          }
          else
          {
            $('.num'+m_id).attr("value",'0');
          }


        setCookie('{{ $name[0]->name }}'+'menu', menu, 1);
        setCookie('{{ $name[0]->name }}'+'quantity', quantity, 1);
        setCookie('{{ $name[0]->name }}'+'amount', amount, 1);
 
        }


	</script>
	<!--food-container-->

	<!--food&drink-->
	<!-- <div id="fnd" class="d-flex justify-content-center">
		<div class="fndcolor active rounded">
			<a href="#">Food</a>
		</div>
		<div class="fndcolor rounded">
			<a href="#">Drink</a>
		</div>
	</div> -->
	<!--food&drink-->
	@endsection

	
