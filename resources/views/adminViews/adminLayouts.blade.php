<!DOCTYPE html>
<head>
<title>Admin Panel</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- bootstrap-css -->
<link rel="stylesheet" href="css/admin/bootstrap.min.css" >
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<!-- //bootstrap-css -->
<!-- font awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
<!-- Custom CSS -->
<link href="css/admin/style.css" rel='stylesheet' type='text/css' />
<link href="css/admin/style-responsive.css" rel="stylesheet"/>
<!-- font-awesome icons -->
<link rel="stylesheet" href="css/admin/font.css" type="text/css"/>
<link href="css/admin/font-awesome.css" rel="stylesheet"> 
<link rel="stylesheet" href="css/admin/morris.css" type="text/css"/>
<!-- //font-awesome icons -->
<script src="js/admin/jquery2.0.3.min.js"></script>
<script src="js/admin/raphael-min.js"></script>
<script src="js/admin/morris.js"></script>
</head>
<body>
<section id="container">
<!--header start-->
<header class="header fixed-top clearfix">
<!--logo start-->
<div class="brand">
    <a href="index.html" class="logo"> 
        ADMIN VIEW
    </a>
</div>

<div class="top-nav clearfix">
    <!--search & user info start-->
    <ul class="nav pull-right top-menu">
        
        <!-- user login dropdown start-->
        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <img alt="" src="images/KZaw.jpg">
                <span class="username">Kyaw Zaww</span>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
                <li><a href="login.html"><i class="fa fa-key"></i> Log Out</a></li>
            </ul>
        </li>
        <!-- user login dropdown end -->
       
    </ul>`
    <!--search & user info end-->
</div>
</header>
<!--header end-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <!-- //market-->
        <div class="market-updates">
            <a href="/order">

            <div class="col-md-4 market-update-gd">
                <div class="market-update-block clr-block-4">
                    <div class="col-md-4 market-update-right">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    </div>
                    <div class="col-md-12 market-update-left">
                        
                        <h3>Orders</h3>
                        
                    </div>
                  <div class="clearfix"> </div>
                </div>
            </div>
            </a>

            <a href="/inbox">
            <div class="col-md-4 market-update-gd">
                <div class="market-update-block clr-block-2">
                    <div class="col-md-4 market-update-right">
                        <i class="fa fa-eye"> </i>
                    </div>
                     <div class="col-md-12 market-update-left">
                     
                    <h3>Inventory</h3>
                  </div>
                  <div class="clearfix"> </div>
                </div>
            </div>
            </a>
            <a href="/edit">
            <div class="col-md-4 market-update-gd">
                <div class="market-update-block clr-block-1">
                    <div class="col-md-4 market-update-right">
                        <i class="fa fa-edit" ></i>
                    </div>
                    <div class="col-md-12 market-update-left">
                    
                        <h3>Edit Pages</h3>
                        
                    </div>
                  <div class="clearfix"> </div>
                </div>
            </div>
            </a>

           
            <!-- </div> -->
            
           <div class="clearfix"> </div>
        </div> 

         @yield('admin')


        </section>
<script src="js/admin/bootstrap.js"></script>
<script src="js/admin/jquery.dcjqaccordion.2.7.js"></script>
<script src="js/admin/scripts.js"></script>
<script src="js/admin/jquery.slimscroll.js"></script>
<script src="js/admin/jquery.nicescroll.js"></script>
<script src="js/admin/jquery.scrollTo.js"></script>
<!-- morris JavaScript -->  
<script>
    function edit(id,fact,divId,formId)
                {

                 document.getElementById(divId).innerHTML = '<div><i onclick="cancel(\''+divId+'\',\''+formId+'\')" style="color: black; float:right; padding-right:10px;" class="formIcon fas fa-times fa-2x"></i>  </div><!-- <div style="padding: 10px; float: left;">Product Name:</div> --><div style="padding: 10px;"> <textarea name="fact" style="width:100%; height: 80px;">'+fact+'</textarea></div><div style="padding: 10px;"><input type="hidden" name="id" value='+ id +'><input type="submit" value="Upload" style="display: block; margin-left: auto; margin-right: auto; width: 10%; height: 30px;"></div>';
                 var form = document.getElementById(formId);
                 form.style.visibility = 'visible';
             }
             function Add(divId,formId)
             {
                 document.getElementById(divId).innerHTML = '<div><i onclick="cancel(\''+divId+'\',\''+formId+'\')" style="color: black; float:right; padding-right:10px;" class="formIcon fas fa-times fa-2x"></i>  </div><!-- <div style="padding: 10px; float: left;">Product Name:</div> --><div style="padding: 10px;"> <textarea name="fact" style="width:100%; height: 80px;"></textarea></div><div style="padding: 10px;"><input type="hidden" name="id"><input type="submit" value="Upload" style="display: block; margin-left: auto; margin-right: auto; width: 10%; height: 30px;"></div>';
                                   var form = document.getElementById(formId);
                                    form.style.visibility = 'visible';
                                }
                                function cancel(divId,formId){
                                    if (confirm("Sure to cancel?")) {
                                        var txt;
                                        document.getElementById(divId).innerHTML = '';
                                        document.getElementById(formId).style.visibility = 'hidden';
                                      } else {
                                        
                                      }

                                }
                                function Delete(id)
                                {
                                    if (confirm("Are you sure to delete this item?")) {
                                        var txt;
                                        window.location.href = '/hairDelete/'+id+'';
                                      } 
                                      else {
                                        
                                      }

                                }
    $(document).ready(function() {
        //BOX BUTTON SHOW AND CLOSE
       jQuery('.small-graph-box').hover(function() {
          jQuery(this).find('.box-button').fadeIn('fast');
       }, function() {
          jQuery(this).find('.box-button').fadeOut('fast');
       });
       jQuery('.small-graph-box .box-close').click(function() {
          jQuery(this).closest('.small-graph-box').fadeOut(200);
          return false;
       });
       
        //CHARTS
        function gd(year, day, month) {
            return new Date(year, month - 1, day).getTime();
        }
        
        graphArea2 = Morris.Area({
            element: 'hero-area',
            padding: 10,
        behaveLikeLine: true,
        gridEnabled: false,
        gridLineColor: '#dddddd',
        axes: true,
        resize: true,
        smooth:true,
        pointSize: 0,
        lineWidth: 0,
        fillOpacity:0.85,
            data: [
                {period: '2015 Q1', iphone: 2668, ipad: null, itouch: 2649},
                {period: '2015 Q2', iphone: 15780, ipad: 13799, itouch: 12051},
                {period: '2015 Q3', iphone: 12920, ipad: 10975, itouch: 9910},
                {period: '2015 Q4', iphone: 8770, ipad: 6600, itouch: 6695},
                {period: '2016 Q1', iphone: 10820, ipad: 10924, itouch: 12300},
                {period: '2016 Q2', iphone: 9680, ipad: 9010, itouch: 7891},
                {period: '2016 Q3', iphone: 4830, ipad: 3805, itouch: 1598},
                {period: '2016 Q4', iphone: 15083, ipad: 8977, itouch: 5185},
                {period: '2017 Q1', iphone: 10697, ipad: 4470, itouch: 2038},
            
            ],
            lineColors:['#eb6f6f','#926383','#eb6f6f'],
            xkey: 'period',
            redraw: true,
            ykeys: ['iphone', 'ipad', 'itouch'],
            labels: ['All Visitors', 'Returning Visitors', 'Unique Visitors'],
            pointSize: 2,
            hideHover: 'auto',
            resize: true
        });
        
       
    });
    </script>
</body>
</html>
 
