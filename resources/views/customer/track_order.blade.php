<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    {{--  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">  --}}
    <style>
        @import url('https://fonts.googleapis.com/css?family=Open+Sans&display=swap');

        body {
            background-color: #eeeeee;
            font-family: 'Open Sans', serif
        }

        .d-flex.mt-145 {
            margin-top: 0px !important;
        }

        .container {
            margin-top: 50px;
            margin-bottom: 50px
        }

        .card {
            position: relative;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 1px solid rgba(0, 0, 0, 0.1);
            border-radius: 0.10rem
        }

        .card-header:first-child {
            border-radius: calc(0.37rem - 1px) calc(0.37rem - 1px) 0 0
        }

        .card-header {
            padding: 0.75rem 1.25rem;
            margin-bottom: 0;
            background-color: #fff;
            border-bottom: 1px solid rgba(0, 0, 0, 0.1)
        }


        .track {
            position: relative;
            background-color: #ddd;
            height: 7px;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            margin-bottom: 60px;
            margin-top: 50px
        }

        .track .step {
            -webkit-box-flex: 1;
            -ms-flex-positive: 1;
            flex-grow: 1;
            width: 25%;
            margin-top: -18px;
            text-align: center;
            position: relative
        }

        .track .step.active:before {
            background: #FF5722
        }

        .track .step::before {
            height: 7px;
            position: absolute;
            content: "";
            width: 100%;
            left: 0;
            top: 18px
        }

        .track .step.active .icon {
            background: #ee5435;
            color: #fff
        }

        .track .icon {
            display: inline-block;
            width: 40px;
            height: 40px;
            line-height: 40px;
            position: relative;
            border-radius: 100%;
            background: #ddd
        }

        .track .step.active .text {
            font-weight: 400;
            color: #000
        }

        .track .text {
            display: block;
            margin-top: 7px
        }

        .itemside {
            position: relative;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            width: 100%
        }

        .itemside .aside {
            position: relative;
            -ms-flex-negative: 0;
            flex-shrink: 0
        }

        .img-sm {
            width: 80px;
            height: 80px;
            padding: 7px
        }

        ul.row,
        ul.row-sm {
            list-style: none;
            padding: 0
        }

        .itemside .info {
            padding-left: 15px;
            padding-right: 7px
        }

        .itemside .title {
            display: block;
            margin-bottom: 5px;
            color: #212529
        }

        p {
            margin-top: 0;
            margin-bottom: 1rem
        }

        .btn-warning {
            color: #ffffff;
            background-color: #ee5435;
            border-color: #ee5435;
            border-radius: 1px
        }

        .btn-warning:hover {
            color: #ffffff;
            background-color: #ff2b00;
            border-color: #ff2b00;
            border-radius: 1px
        }

        form {
            background: snow !important;
            padding: 15px 25px !important;
        }

        .track .step.active .icon {
            background: #ee5435;
            color: #fff;
            line-height: 1 !important;
        }

        .track .icon {
            display: inline-block;
            width: 40px;
            height: 40px;
            line-height: 16px !important;
            position: relative;
            border-radius: 100%;
            background: #ddd;
        }

        div#content {
            background: snow !important;
            padding: 15px 25px 15px 25px !important;
        }

        a {
            text-decoration: none !important;
            cursor: pointer !important;
        }
    </style>
</head>

<body>

    <div class="jumbotron text-center">
        <h1>Track Order</h1>
        <p>Page To Track Order</p>
    </div>
    @php

    @endphp
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <form id="frmtrack">
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label>Order Number</label>
                            <input type="text" name="txtord" id="txtord" value=""
                                placeholder="Enter OrderId" />
                        </div>
                        <div class="col-sm-6 form-group">
                            <input type="submit" name="btnordtrack" id="btnordtrack" value="Check Status"
                                class="btn btn-success" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @php
        if (isset($orderData)) {
            $oid = $orderData[0]['id'];
            $product = $orderData[0]['product'];
            $uid = $orderData[0]['userId'];
            $weight = $orderData[0]['weight'];
            $source_address = $orderData[0]['source_address'];
            $destination_address = $orderData[0]['destination_address'];
            $status = $orderData[0]['status'];
        }
    @endphp
    <div class="container" id="divres">
        <article class="card">
            <header class="card-header"> My Orders / Tracking </header>
            <div class="card-body">
                <h6>Order ID:<span id="oid">
                        @isset($oid)
                            {{ $oid }}
                        @endisset
                    </span> </h6>
                <article class="card">
                    <div class="card-body row">
                        <div class="col"> <strong>Estimated Delivery time:</strong> <br>29 nov 2019 </div>
                        <div class="col"> <strong>Shipping BY:</strong> <br> BLUEDART, | <i class="fa fa-phone"></i>
                            +1598675986 </div>
                        <div class="col"> <strong>Status:</strong> <br> Picked by the courier </div>
                        <div class="col"> <strong>Tracking #:</strong> <br> BD045903594059 </div>
                    </div>
                </article>
                <div class="track">
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span
                            class="text">Order confirmed</span> </div>
                    <div class="step active"> <span class="icon"> <i class="fa fa-user"></i> </span> <span
                            class="text"> Picked by courier</span> </div>
                    <div class="step"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text">
                            On the way </span> </div>
                    <div class="step"> <span class="icon"> <i class="fa fa-box"></i> </span> <span
                            class="text">Ready for pickup</span> </div>
                </div>
                <hr>
                <ul class="row">
                    <li class="col-md-12">
                        <div class="aside">
                            <span id="span_oid" class="new-line">
                                @isset($oid)
                                   {!! "<strong>Order ID: </strong>" !!} {{ $oid."\n" }}
                                @endisset
                            </span>
                            {!! "<br>" !!}
                            <span id="span_prod" class="new-line">
                                @isset($product)
                                {!! "<strong>Product: </strong>" !!} {{ $product."\n" }}
                                @endisset
                            </span>
                            {!! "<br>" !!}
                            <span id="span_uid" class="new-line">
                                @isset($uid)
                                {!! "<strong>User Id: </strong>" !!}  {{ $uid ."\n"}}
                                @endisset
                            </span>
                            {!! "<br>" !!}
                            <span id="span_weight" class="new-line">
                                @isset($weight)
                                {!! "<strong>Weight: </strong>" !!}{{ $weight."\n" }}
                                @endisset
                            </span>
                            {!! "<br>" !!}
                            <span id="span_status" class="new-line">
                                @isset($status)
                                {!! "<strong>Status: </strong>" !!}{{ $status."\n" }}
                                @endisset
                            </span>
                            {!! "<br>" !!}
                            <span id="span_source" class="new-line">
                                @isset($source_address)
                                {!! "<strong>Source Address: </strong>" !!}{{ $source_address."\n" }}
                                @endisset
                            </span>
                            {!! "<br>" !!}
                            <span id="span_dest" class="new-line">
                                @isset($destination_address)
                                {!! "<strong>Destination Address: </strong>" !!}{{ $destination_address."\n" }}
                                @endisset
                            </span>
                        </div>
                    </li>

                </ul>
                <hr>
                <a href="#" class="btn btn-warning" data-abc="true"> <i class="fa fa-chevron-left"></i> Back to
                    orders</a>
            </div>
        </article>
    </div>
    <script>
        $(document).ready(function() {
            //$('#divres').addClass('hide').removeClass('show');
            $('.d-flex').removeClass('mt-145');
            $('#btnordtrack').click(function(e) {

                e.preventDefault();
                var oId = $('#txtord').val(); // Get the post ID from the button's data attribute

                // Send an AJAX request to the "show" method of the resource controller
                $.ajax({
                    url: '/orders/' + oId, // Dynamically generate the URL with the post ID
                    type: 'GET', // Use GET request to fetch the resource
                    success: function(response) {

                        $('.container').removeClass('hide').addClass('show');
                        $('#divres').html(response);

                        // Now, find the specific element
                        var element = $('#divres #divres');
                        console.log(element);

                        $('#divres').find('#divres').removeClass('hide').addClass('show');
                        $('#divres').parent('#divres').removeClass('hide').addClass('show');
                        $('.container').siblings('.container').removeClass('hide').addClass(
                            'show');
                        $('#content').html(response);
                        $('#divres').show();

                    },
                    error: function(xhr, status, error) {
                        console.error('Error: ' + xhr.responseText);
                        alert('An error occurred.');
                    }
                });



            });
        });
    </script>
</body>

</html>
