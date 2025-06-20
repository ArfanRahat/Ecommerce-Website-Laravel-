<!DOCTYPE html>
<html>
  <head> 
   @include('admin.css')

   <style type="text/css">
    .div_deg
    {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 60px;
    }
    .table_deg
    {
    border: 2px solid greenyellow;
    }
    th
    {
    background-color: skyblue;
    color: white;
    font-size: 19px;
    font-weight: bold;
    padding: 15px;
    }
    td
    {
    border: 1px solid skyblue;
    text-align: center;
    color: white;
    }
    </style>


  </head>
  <body>
    @include('admin.header')
      @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">

          <div class="div_deg">
            <table class="table_deg">
            <tr>
                <th>Product Title</th>
                <th>Description</th>
                <th>Category</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Image</th>
                <th>Delete</th>
            </tr>
            @foreach($product as $products)
            <tr>
                <td>{{$products->title}}</td>
                <td>{!!Str::limit($products->title,50)!!}</td>
                <td>{{$products->category}}</td>
                <td>{{$products->price}}</td>
                <td>{{$products->quantity}}</td>
                <td>
                    <img height="120" width="120" src="products/{{$products->image}}">
                </td>
                <td>
                   <a class="btn btn-danger" onclick="confirmation(event)" href="{{url('delete_product', $products->id)}}">Delete</a>
                </td>

            </tr>
            @endforeach
            </table>
            
          </div>
          <div class="div_deg">
              {{$product->onEachSide(1)->links()}}        
          </div>      


          </div>


      </div>
    </div>
    <!-- JavaScript files-->

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script type="text/javascript">
      function confirmation(ev) {
        ev.preventDefault();
        var urlToRedirect = ev.currentTarget.getAttribute('href');
        console.log(urlToRedirect);
        swal({ 
          title: "Are you sure you want to delete this?", 
          text: "This delete will be permanent.", 
          icon: "warning", 
          buttons: true, 
          dangerMode: true 
        })
        .then((willConfirm) => {
          if (willConfirm) {
            window.location.href = urlToRedirect;
          }
        });
      }
    </script>



    <script src="{{asset('admincss/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/popper.js/umd/popper.min.js')}}"> </script>
    <script src="{{asset('admincss/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
    <script src="{{asset('admincss/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('admincss/js/charts-home.js')}}"></script>
    <script src="{{asset('admincss/js/front.js')}}"></script>
  </body>
</html>