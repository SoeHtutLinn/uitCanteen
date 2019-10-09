@extends('adminViews.adminLayouts')

@section('admin')
<div class="market-updates" style="background-color: #397E8A; margin:0px 15px 0px 15px;">
    <!-- <div class="market-update-block clr-block-3"> -->
    <div class="col-md-12 market-updates edit_border" style="background-color: white;">
            <!-- Category -->
        <div class="category" style="padding: 1em 1em;">
            <div class="row">
                <div style="float: left; width: 25%; text-align: center;">
                    <a href="edit"><h2>Hair</h2></a>
                </div>

                <div style="float: left; width: 25%; text-align: center;">
                    <a href="facialEdit"><h2>Facial</h2></a>
                </div>
                <div style="float: left; width: 25%; text-align: center;">
                    <a href="bodyEdit"><h2>Body</h2></a>
                </div>
                <div style="float: left; width: 25%; text-align: center;">
                    <a href="legEdit"><h2>Legs</h2></a>
                </div>
            </div>
        </div>

        <form action='{{ URL::to("/hairUpdate") }}' method='post' class='formContainer' enctype='multipart/form-data' style="visibility: hidden; width: 70%;" id="hairEditForm">

            @csrf
            <div id="hairEdit">  </div>
        </form>

        <form action='{{ URL::to("/hairAdd") }}' method='post' class='formContainer' enctype='multipart/form-data' style="visibility: hidden; width: 70%;" id="hairAddForm">
            @csrf
            <div id="hairAdd">  </div>
        </form>

        <div class="care">
            <h2>Hair Care</h2>

            @foreach($hairCare as $fact)

            <div class="row">
                <div class="col-md-1 col-1 col-lg-1 col-sm-1">
                    <i class="fa fa-pencil-square-o" style="font-size:24px; float: left;padding-top: 32px" onclick="edit('{{$fact->id}}','{{$fact->fact}}','hairEdit','hairEditForm')">
                    </i>
                </div>
                <div class="col-md-10 col-10 col-lg-10 col-sm-10" style="float: left;">

                    <p> {{$fact->fact}} </p>
                </div>
                <dir class="col-md-1 col-1 col-lg-1 col-sm-1">
                    <p onclick="Delete('{{$fact->id}}')">Delete</p>
                </dir>
            </div>

            @endforeach
            <div class="row">
                <div class="col-md-1 col-1 col-lg-1 col-sm-1">
                    <div  style="font-size:24px; float: left;padding: 0px 32px 32px 23px">
                        <i class="fas fa-plus" style="border-color: black; border-style: solid; padding: 5px;" onclick="Add('hairAdd','hairAddForm')">
                        </i>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"> </div>
</div>
        

@endsection

