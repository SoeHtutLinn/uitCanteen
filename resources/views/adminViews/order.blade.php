@extends('adminViews.adminLayouts')

@section('admin')
    @foreach($data as $data)
        <div class="market-updates" style="background-color: #397E8A; margin:0px 15px 0px 15px;">
                    <div class="col-md-12 market-updates order_border " style="background-color: white;">
                        
                        <!-- Category -->
                        <div class="order">
                            <div class="row user_detail">
                                <!-- <div class="col-md-1 col-sm-1 user_photo">
                                    <img src="images/Lisa.jpeg" width="100%" height="100%" style=" border-radius: 50%;">
                                </div> -->
                                <div class="col-md-5 col-sm-3 order_User">
                                       <p class="order_text">Username : </p><p>{{$data->name}}</p>
                                </div>
                                <div class="col-md-5 col-sm-3 order_email">
                                    <p class="order_text">Email : </p><p>{{$data->email}}</p>
                                </div>
                                <!-- <div class="col-md-3 col-sm-3 order_total">
                                    <p class="order_text">Total Amount : </p><p>{{$data->total}}</p>
                                </div> -->
                                <div class="col-md-2 col-sm-2 order_date">
                                    <p class="order_text">Date : </p><p>{{date('d.m.Y', strtotime($data->date))}}</p>
                                </div>
                            </div>
                            @php
                
                            $name = unserialize($data->p_name);
                            $img = unserialize($data->p_img);
                            $quantity = unserialize($data->quantity);
            
                            @endphp
                            
                            <div class="row d-flex flex-wrap">
                                @for($i = 0; $i< sizeof($name); $i++)
                                <div class="card">
                                    <img class="card-img-top" src="inventory/{{$img[$i]}}" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title">{{$name[$i]}}</h5>
                                        <p class="card-text order_text">Quantity : </p><p>{{$quantity[$i]}}</p>
                                    </div> 
                                </div>
                                 @endfor
                            </div>
                           
                            <div class="row shipping">
                                <button type="button" class="btn btn-outline-success order_text button">Ship Now</button>
                            </div>
                        </div><!--order-->
                    </div>
                  <div class="clearfix"> </div>
        </div>
    @endforeach

@endsection
