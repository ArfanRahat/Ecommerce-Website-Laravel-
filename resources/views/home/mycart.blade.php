<!DOCTYPE html>
<html>

<head>
  @include('home.css')
  <style type="text/css">
    .div_deg {
      display: flex;
      justify-content: center;
      align-items: center;
      margin: 60px;
      width: 100%;
    }

    table {
      width: 60%;
      border: 2px solid black;
      border-collapse: collapse;
      text-align: center;
    }

    th {
      border: 2px solid black;
      text-align: center;
      color: white;
      font-size: 20px;
      font-weight: bold;
      background-color: black;
      padding: 12px;
    }

    td {
      border: 1px solid skyblue;
      padding: 12px;
    }
    .order_deg
    {
      padding-right:100px;
      margin-top: -20px:
    }
    label
    {
    display:
    inline-block;
    width: 150px;
    }
    .div_gap
    {
    padding: 20px;
    }
  </style>
</head>

<body>
  <div class="hero_area">
    <!-- header section starts -->
    @include('home.header')
    <!-- end header section -->
  </div>

  <div class="div_deg">
    
  <div>
    <form>    
      <div class="div_gap">
        <lebel >Receiver Name</lebel>

        <input type="text" name="name">
      </div>
      <div  class="div_gap">
      <lebel>Receiver Address</lebel>

      <textarea name="address"></textarea>
      </div>
      <div  class="div_gap">
      <lebel>Receiver Phone</lebel>

      <input type="text" name="phone">
    </div>
    <div  class="div_gap">
  

      <input class="btn btn-primary" type="submit" value="Place Order">
    </div>
  </form>
  
  
  
  </div>
  
  <table>
      <tr>
        <th>Product Title</th>
        <th>Price</th>
        <th>Image</th>
        <th>Remove</th>
      </tr>

      @php
        $total = 0;
      @endphp

      @foreach($cart as $item)
      <tr>
        <td>{{ $item->product->title }}</td>
        <td>{{ $item->product->price }}</td>
        <td>
          <img width="150" src="/products/{{ $item->product->image }}"> 
        </td>
        <td>
          <form action="{{ route('cart.remove',$item->id) }}" method="POST">
              @csrf
              @method('DELETE')
              <button type="submit" 
                      onclick="return confirm('Are you sure you want to remove this product?')">
                 Remove
              </button>
          </form>
        </td>
      </tr>

      @php
        $total += $item->product->price;
      @endphp

      @endforeach
      <tr>
        <td><strong>Total</strong></td>
        <td>{{ $total }}</td>
        <td></td>
        <td></td>
      </tr>

    </table>
  </div>

  <script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
  <script src="{{asset('js/bootstrap.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <script src="{{asset('js/custom.js')}}"></script>

</body>

</html>
