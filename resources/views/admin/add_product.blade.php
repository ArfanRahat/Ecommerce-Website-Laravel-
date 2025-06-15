<!DOCTYPE html>
<html>
  <head> 
   @include('admin.css')

   <style type="text/css">
    .div_deg {
      display: flex;
      justify-content: center;
      align-items: flex-start;
      margin-top: 60px;
    }
    .div_deg form {
      background: #fff;
      padding: 20px;
      border-radius: 12px;
      box-shadow: 0 4px 14px rgb(0 0 0 / 0.1);
      width: 300px;
      text-align: center;
    }
    .div_deg form div {
      margin-bottom: 15px;
    }
    .div_deg form label {
      display: block;
      margin-bottom: 5px;
      color: #555;
    }
    .div_deg form input,
    .div_deg form select,
    .div_deg form textarea {
      width: 100%;
      padding: 8px 12px;
      border-radius: 6px;
      border: 1px solid #ccc;
      box-sizing: border-box;
    }
    .add-product-title {
    text-align: center;
    color: #fff;
    background: #17a2b8;
    padding: 20px;
    border-radius: 12px;
    margin-bottom: 30px;
    box-shadow: 0 4px 14px rgb(0 0 0 / 0.1);
    font-size: 32px;
    font-weight: bold;
    width: 300px;
    margin-left: auto;
    margin-right: auto;
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
          <h1 class="add-product-title">Add Product</h1>

          <div class="div_deg">
        <form action="{{ url('upload_product') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div>
                <label>Product Title</label>
                <input type="text" name="title" required>
            </div>

            <div>
                <label>Description</label>
                <textarea name="description" required></textarea>
            </div>

            <div>
                <label>Price</label>
                <input type="text" name="price">
            </div>

            <div>
                <label>Quantity</label>
                <input type="text" name="qty">
            </div>

            <div>
                <label>Product Category</label>
                <select name="category" required>
                    <option disabled selected>Select a option</option>
                    @foreach($category as $item)
                        <option value="{{$item->category_name}}">
                            {{$item->category_name}}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label>Product Image</label>
                <input type="file" name="image">
            </div>

            <div class="input_deg">
                <button type="submit">Save Product</button>
            </div>
        </form>


          </div>

        </div>
      </div>
    </div>

    <!-- JavaScript files-->
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
