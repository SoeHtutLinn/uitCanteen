@extends('adminViews.adminLayouts')

@section('admin')
         <div class="market-updates" style="background-color: #3E7E8C; margin: 0 15px 0 15px;">
                <!-- <div class="market-update-block clr-block-3"> -->
                    <div class="col-md-12 market-update-left">
                        <form action='{{ URL::to("/update") }}' method='post' class='formContainer col-md-3' enctype='multipart/form-data' style="visibility: hidden;" id="editForm">
                            @csrf
                            <div id="form">  </div>
                        </form>

                        <form action='{{ URL::to("/inventoryAdd") }}' method='post' enctype='multipart/form-data' class='formContainer col-md-3' style="visibility: hidden;" id="addForm">
                            @csrf
                            <div id="form1"> </div>
                        </form>
                            

                        @foreach($inbox as $product)

                            <div class="col-md-3 inventoryRes">
                                <div class="inventory" >
                     
                                    <img src="inventory/{{$product->p_img}}">
                                    <ul style="font-size: 10px;">
                                            <li>{{$product->p_name}}</li>
                                            <li>
                                                <div style="width: 40%; float: left;">Price</div>
                                                <div style="width: 10%; float: left;">:</div>
                                                <div>{{$product->p_price}} $</div> 
                                            </li>
                                            <li>
                                                <div style="width: 40%; float: left;">Quantity</div>
                                                <div style="width: 10%; float: left;">:</div>
                                                <div>{{$product->p_quantity}}</div> 
                                            </li>
                                            <li>
                                                <div style="width: 40%; float: left;">Type</div>
                                                <div style="width: 10%; float: left;">:</div>
                                                <div>{{$product->p_type}}</div> 
                                            </li>
                                            <li>
                                                <div style="width: 40%; float: left;">Type</div>
                                                <div style="width: 10%; float: left;">:</div>
                                                <div>{{$product->p_cosmetic}}</div> 
                                            </li>
                                        <li class="edit" onclick="myFunction('{{$product->p_Id}}','{{$product->p_img}}','{{$product->p_name}}','{{$product->p_price}}','{{$product->p_quantity}}','{{$product->p_type}}')"><div style="padding: 10px; background-color: black;">Edit</div> </li>
                                        <li class="edit" onclick="deleteInventory('{{$product->p_Id}}')"><div style="padding: 10px; background-color: black;">Delete</div> </li>
                                    </ul>
                                </div>
                            </div>
                        @endforeach
                        <div class="addInventory">
                        <i class="fas fa-plus fa-3x" onclick="addInventory()"></i>
                        </div>
                    </div>
                    
                  <div class="clearfix"> </div>
                </div>
        <!-- //market-->
        <script type="text/javascript">
            function addInventory()
            {
                document.getElementById("form1").innerHTML = "<div><i onclick='addcancel()' style='color: black; right: 10px' class='formIcon fas fa-times fa-2x'></i></div><div class='formText col-md-3'>image</div><input class='formText' style='float: none; width: 70%' type='file' name='Img' id='file'></br><div class='formText col-md-3'>Name</div><input class='formText' style='float: none; width: 70%' type='text' name='name'> <br><div class='formText col-md-3'>Price</div><input class='formText' style='float: none; width: 70%'  type='text' name='price'><br><div class='formText col-md-3'>Quantity</div><input class='formText' style='float: none; width: 70%' type='text' name='quantity'><br><select style='margin: 10px;' name='type' class='form-control'><option value='Normal Skin Care'>Normal Skin Care</option><option value='Hair Care'>Hair Care</option><option value='Eye Care'>Eye Care</option><option value='Dry Skin Care'>Dry Skin Care</option><option value='Oily Skin Care'>Oily Skin Care</option><option value='Normal Skin Care'>Normal Skin Care</option><option value='Combination Skin Care'>Combination Skin Care</option><option value='Hand Care'>Hand Care</option><option value='Brest Care'>Brest Care</option><option value='Back Care'>Back Care</option><option value='Privete Area Care'>Privete Area Care</option><option value='Leg Care'>Leg Care</option></select><select style='margin: 10px;' name='cosmetic'  id='selectValue' class='form-control'></select><div class='edit' style='margin-top: 10px; margin-bottom:10px;'><input style='background-color: white; display: block; margin-left: auto; margin-right: auto; width:60%;' type='submit' value='Save'></div>";
                var form = document.getElementById("addForm");
              form.style.visibility = 'visible';
            }
            function myFunction(id,img,name,price,quantity,type) {
              document.getElementById("form").innerHTML = "<div><i onclick='cancel()' style='color: black; right: 10px' class='formIcon fas fa-times fa-2x'></i></div><div class='formText col-md-3'>image</div><input class='formText' style='float: none; width: 70%' type='file' name='productImg' id='file'><input type='hidden' name='id' value="+id+"><input type='hidden' name='oldImg' value="+img+"> </br><div class='formText col-md-3'>Name</div><input class='formText' style='float: none; width: 70%' type='text' name='name' value= " + name +"> <br><div class='formText col-md-3'>Price</div><input class='formText' style='float: none; width: 70%'  type='text' name='price' value="+price+"><br><div class='formText col-md-3'>Quantity</div><input class='formText' style='float: none; width: 70%' type='text' name='quantity' value=" + quantity +"><br><select style='margin: 10px;' name='type' class='form-control'><option value="+type+">"+type+"</option><option value='Hair Care'>Hair Care</option><option value='Eye Care'>Eye Care</option><option value='Dry Skin Care'>Dry Skin Care</option><option value='Oily Skin Care'>Oily Skin Care</option><option value='Normal Skin Care'>Normal Skin Care</option><option value='Combination Skin Care'>Combination Skin Care</option><option value='Hand Care'>Hand Care</option><option value='Brest Care'>Brest Care</option><option value='Back Care'>Back Care</option><option value='Privete Area Care'>Privete Area Care</option><option value='Leg Care'>Leg Care</option></select><select style='margin: 10px;' name='cosmetic' class='form-control' id='selectValue'></select><div class='edit' style='margin-top: 10px; margin-bottom:10px;'><input style='background-color: white; display: block; margin-left: auto; margin-right: auto; width:60%;' type='submit' value='Save'></div>";
              var form = document.getElementById("editForm");
              form.style.visibility = 'visible';
            }
            var cartList = $('.formContainer');
            cartList.on('change', 'select', function(event){
                var selectValue = document.getElementById("selectValue");
                var value = cartList.find('select').val();
                
                if (value == 'Hair Care') {
                    selectValue.innerHTML = "<option value='Shampoo'>Shampoo</option><option value='Conditioner'>Conditioner</option><option value='Hair Serum '>Hair Serum </option>";
                }
                else if (value == 'Eye Care') {
                    selectValue.innerHTML = "<option value='Eye Cream'>Eye Cream</option><option value='Conditioner'>Conditioner</option><option value='Hair Serum '>Hair Serum </option>";


                }
                else if (value == 'Dry Skin Care') {
                    selectValue.innerHTML = "<option value='Makeup Remover'>Makeup Remover</option><option value='Facial Wash'>Facial Wash</option><option value='Toner'>Toner</option><option value='Moisturizer'>Moisturizer</option><option value='Sunscreen'>Sunscreen</option>";

                }
                else if (value == 'Oily Skin Care') {
                    selectValue.innerHTML = "<option value='Makeup Remover'>Makeup Remover</option><option value='Facial Wash'>Facial Wash</option><option value='Toner'>Toner</option><option value='Moisturizer'>Moisturizer</option><option value='Sunscreen'>Sunscreen</option>";

                }
                else if (value == 'Normal Skin Care') {
                    selectValue.innerHTML = "<option value='Makeup Remover'>Makeup Remover</option><option value='Facial Wash'>Facial Wash</option><option value='Toner'>Toner</option><option value='Moisturizer'>Moisturizer</option><option value='Sunscreen'>Sunscreen</option>";

                }
                else if (value == 'Combination Skin Care') {
                    selectValue.innerHTML = "<option value='Makeup Remover'>Makeup Remover</option><option value='Facial Wash'>Facial Wash</option><option value='Toner'>Toner</option><option value='Moisturizer'>Moisturizer</option><option value='Sunscreen'>Sunscreen</option>";

                }
                else if (value == 'Neck Care') {
                    selectValue.innerHTML = "<option value='Shampoo'>Shampoo</option><option value='Conditioner'>Conditioner</option><option value='Hair Serum '>Hair Serum </option>";

                }
                else if (value == 'Hand Care') {
                    selectValue.innerHTML = "<option value='Shampoo'>Shampoo</option><option value='Conditioner'>Conditioner</option><option value='Hair Serum '>Hair Serum </option>";

                }
                else if (value == 'Brest Care') {
                    selectValue.innerHTML = "<option value='Shampoo'>Shampoo</option><option value='Conditioner'>Conditioner</option><option value='Hair Serum '>Hair Serum </option>";

                }
                else if (value == 'Back Care') {
                    selectValue.innerHTML = "<option value='Shampoo'>Shampoo</option><option value='Conditioner'>Conditioner</option><option value='Hair Serum '>Hair Serum </option>";

                }
                else if (value == 'Private Area Care') {
                    selectValue.innerHTML = "<option value='Shampoo'>Shampoo</option><option value='Conditioner'>Conditioner</option><option value='Hair Serum '>Hair Serum </option>";

                }
                else if (value == 'Leg Care') {
                    selectValue.innerHTML = "<option value='Shampoo'>Shampoo</option><option value='Conditioner'>Conditioner</option><option value='Hair Serum '>Hair Serum </option>";

                }
                else{}

            });
            function deleteInventory(deleteInventory)
            {
                if (confirm("Are you sure to delete this item?")) {
                    var txt;
                    window.location.href = '/delete/'+deleteInventory+'';
                  } 
                  else {
                    
                  }

            }
            function cancel()
            {
                if (confirm("Sure to cancel?")) {
                    var txt;
                    document.getElementById("form").innerHTML = '';
                  } else {
                    
                  }
                
            }
            
             function addcancel()
            {
                if (confirm("Sure to cancel?")) {
                    document.getElementById("form1").innerHTML = '';
                    document.getElementById("addForm").style.visibility = 'hidden';
                  } else {
                    
                  }
                
            }
        </script>


        
    


@endsection