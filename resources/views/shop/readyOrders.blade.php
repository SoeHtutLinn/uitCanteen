<!DOCTYPE html>
<html>
<head>
   <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="css/shopStyle.css">

  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="{{ asset('js/shop.js') }}"></script>
  <title></title>
</head>
<body>

    <div class="row">

        <div class="col-12 col-lg-12">
            <form>
                <select onChange="window.document.location.href=this.options[this.selectedIndex].value;" class="head">
                    <option value="/newOrder">New Order</option>
                    <option value="/acceptedOrder">Accepted Order</option>
                    <option value="/readyOrder">Ready Order</option>
                    <option value="/ownerMenu">Menu</option>
                </select>
            </form>
        </div>
               
        @if($orders == 0)

        There is no order yet! 

        @else
            @foreach($orders as $order)
                <div class="col-6 col-lg-6 name">
                    <h4>{{$order->user[0]->name}}</h4>
                    <h6>{{$order->id}}</h6>
                </div>
                <div class="col-6 col-lg-6 name">
                    <h5>{{$order->time}}</h5>
                </div>
               
                @foreach($order->menus as $key =>  $menuDetail)
                    <div class="col-6 col-lg-6 item">
                        <h6>{{$menuDetail[0]->name}}</h6>
                    </div>
                    <div class="col-6 col-lg-6 item right">
                        <h6>{{$order->quantity[$key]}}</h6>
                        
                    </div>
                @endforeach


                <div class="col-12 col-lg-12 check right">
                    <h4>Taken <input type="radio" name="myCheck"  onclick="location.href='{{ url('/taken/'.$order->id) }}'"></h4>
                </div>

            @endforeach
        
        @endif

    </div>

    


</body>

<script type="text/javascript">
    jQuery(function($) {
    $('select').on('change', function() {
        var url = $(this).val();
        if (url) {
            window.location = url;
        }
        return false;
    });
});
</script>
</html>