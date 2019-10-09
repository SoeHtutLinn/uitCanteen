<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>UIT Canteen</title>

  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/shopStyle.css">
  <link rel="stylesheet" href="css/shopView.css">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <!-- font awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

  <link rel="stylesheet" href="css/responsive.css">

  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  <!--My own js-->
  <!-- <script src="js/oasis.js"></script> -->
   <script src="js/cookies.js"></script>

</head>
<body>
 


        <div class="d-flex justify-content-center mt-3">
            <form>
                <select onChange="window.document.location.href=this.options[this.selectedIndex].value;" class="btn-group">
                    <option value="/newOrder" class="btn btn-menu">New Order</option>
                    <option value="/acceptedOrder" class="btn btn-menu">Accepted Order</option>
                    <option value="/readyOrder" class="btn btn-menu">Ready Order</option>
                    <option value="/menu" class="btn btn-menu">Menu</option>
                  <option>Logout</option>
                </select>
            </form>
        </div>
        <a href="{{ route('logout') }}"onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
      <button type="button" class="btn btn-logout btn-lg btn-block">Log Out</button>
       </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
        </form>
<form method="post" action="/flag" style="width: 100%">
        {{ csrf_field() }}
        
            <!--food-container-->
              <div id="food-container" class="mt-3">
                <div class="food row">
                  
                  @if (!empty($menu))
                     @foreach($menu as $food)


                  <div class="col-5 col-lg-2 food-img">
                    <img src="uploads/menu/{{$food->img}}" alt="{{$food->img}}">
                  </div><!--food-img-->
                  <div class="col-7 col-lg-4 food-title">
                    <h6>{{$food->name}}</h6>
                    <div class="form-group form-check">
                      <input type="checkbox" class="form-check-input" name="ids[]" value="{{$food->id}}">
                      <label class="form-check-label" for="exampleCheck1">Unavailable</label>
                    </div>
                  </div><!--food-title-->
                  <input type="hidden" name="shop" value="{{$menu[0]->shopId}}"></input>
                  @endforeach
               @endif

                </div><!--food-->
              </div>
              <!--food-container-->
            
            
       

          <!--food&drink-->
      <div id="fnd" class="d-flex justify-content-center">
      
      <input type="submit" value="Okay"></input>

</form>
    </div>
  <!--food&drink-->

        


        <!-- Modal -->
          <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content p-2">
                <form action="{{ URL::to('newMenu') }}" method="post" enctype="multipart/form-data">
                  @csrf
                <div class="voc-itemlist">
                  
                    Food Name <input type="text" name="name">   <br>
                    Food Price <input type="number" name="price"><br>
                    Food Image <input type="file" name="img" id="file"><br>
                    <select name="type" class="form-control">
                        <option value="food">Food</option>
                        <option value="drink">Drink</option>
                    </select>
                    <input type="hidden" name="shop" value="{{ Auth::user()->id }}">
                  
                </div>
                <div class="modal-footer">
                  <input type="submit" value="Okay">
                </div>
                </form>
              </div>
            </div>
          </div>
    
      </div>
    </div>
    

    <!--food&drink-->
  
    
        <div class="plus-item d-flex align-items-center justify-content-center" data-target="#exampleModalLong" data-toggle="modal">
            <i class="fas fa-plus-circle fa-3x"></i>
        </div>
    
  <!--food&drink-->

    
</body>
</html>