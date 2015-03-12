<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="" content="">
    <link rel="icon" href="{{ URL::asset('favicon.ico') }}">

    <title>Arun Bakery</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('bootstrap/css/style.css') }}" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="{{ asset('bootstrap/js/Chart.min.js') }}"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <nav class="navbar navbar-inverse " role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Arun Bakery</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">

          @if (Auth::check())
          <ul class="nav navbar-nav navbar-right">

            @if(Auth::user()->user_type == 'admin')
            <li><a href="{{ route('products') }}">Products</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Report<span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="{{ route('report/sales') }}">Sales</a></li>
                <li><a href="{{ route('orders/print') }}">Print orders</a></li>
                <li><a href="{{ route('report/devolutions') }}">Product devolutions</a></li>

                <li><a href="{{ route('report/products') }}">Graphic Product</a></li>
                <li><a href="{{ route('report/products/compare') }}">Graphic Products</a></li>

                <li><a href="{{ route('report/generate') }}">Statement</a></li>

              </ul>
            </li>
            <li><a href="{{ route('users') }}">Users</a></li>
            @endif

            @if(Auth::user()->user_type == 'delivery' OR Auth::user()->user_type == 'admin' )
            <li><a href="{{ route('delivery') }}">Delivery</a></li>
            @endif

            @if(Auth::user()->user_type == 'seller' OR Auth::user()->user_type == 'admin' )
            <li><a href="{{ route('customers') }}">Customers</a></li>



            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Orders <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="{{ route('orders/list') }}">All</a></li>
                <li><a href="{{ route('models') }}">Standing</a></li>
              </ul>
            </li>


            @endif

            @if(Auth::user()->user_type == 'manufacturer' OR Auth::user()->user_type == 'admin' )
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Factory <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="{{ route('factory/production') }}">Production</a></li>
                <li><a href="{{ route('factoryOrders') }}">Dispatch</a></li>
              </ul>
            </li>
            @endif


            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->full_name }} <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="{{ route('profile') }}">Profile</a></li>
                <li><a href="{{ route('logout') }}">Logout</a></li>
              </ul>
            </li>
          </ul>

          @else
            <ul class="nav navbar-nav navbar-right">
              <li><a href="{{ route('login') }}">Login</a></li>
            </ul>

          @endif



        </div><!--/.navbar-collapse -->
      </div>
    </nav>


@yield('content')
<div class="container">
      <footer>
        <p class="pull-left">&copy; Arun Bakery 2014</p>
        <p class="pull-right">Developed by <a href="http://telescopica.com.ve">Telesc&oacute;pica</a>
      </footer>

</div> <!-- /container -->



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
  </body>
</html>