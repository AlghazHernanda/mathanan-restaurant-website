<html>
  
@foreach ($orders as $order)
@php
$order->cart = json_decode($order->cart);
@endphp

<tr>
    <td>1</td>
   
    <td>
        @foreach ($order->cart as $item)
        menu : {{ $item->model->name}}, harga :  {{ $item->model->regular_price}}, jumlah :  {{ $item->qty}} <br>
        @endforeach
    </td>
   
    <td>{{ $order->status }}</td>
    <td>{{ $order->status_antar }}</td>                                       
   
</tr>
@endforeach

</html>