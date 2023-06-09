<div>
   <style>
       nav svg{
           height: 20px;
       }
       nav .hidden{
           display:block !important;
       }
   </style>
   <main class="main">
       <div class="page-header breadcrumb-wrap">
           <div class="container">
               <div class="breadcrumb">
                   <a href="/" rel="nofollow">Home</a>
                   <span></span> Dashboard             
               </div>
           </div>
       </div>
       <section class="mt-50 mb-50">
           <div class="container">

            <div class="row align-items-center">
               <div class="col-md-6 col-lg-4">
                   <div class="hero-card box-shadow-outer-6 wow fadeIn animated mb-30 hover-up d-flex">
                       <div class="pl-30">
                           <h4 class="mb-5 fw-500">
                               Total Transaksi = Rp{{ format_uang($total_all_price) }}
                           </h4>
       
                       </div>
                   </div>
               </div>
               <div class="col-md-6 col-lg-4">
                   <div class="hero-card box-shadow-outer-6 wow fadeIn animated mb-30 hover-up d-flex">
                       
                       <div class="pl-30">
                           <h4 class="mb-5 fw-500">
                               Total Pesanan = {{ $orders->count() }}
                           </h4>
                       </div>
                   </div>
               </div>
               <div class="col-md-6 col-lg-4">
                   {{-- <div class="hero-card box-shadow-outer-6 wow fadeIn animated mb-30 hover-up d-flex">
                       
                       <div class="pl-30">
                           <h4 class="mb-5 fw-500">
                               total revenue = Rp.{{ $total_all_price }}
                           </h4>
                       </div>
                   </div> --}}
               </div>
             
           </div>

               <div class="row">
                   <div class="col-12">
                       <div class="card">
                           <div class="card-header">
                              <h2>History Pesanan</h2>
                           </div>
                           <div class="card-body">
                               @if(Session::has('message'))
                                 <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                               @endif
                               <table class="table table-striped">
                                   <thead>
                                       <tr>
                                        <th>No</th>
                                        <th>Nomor Telepon</th>
                                        <th>Nama</th>
                                        <th>Pesanan</th>
                                        <th>Total Harga</th>
                                        <th>Status Bayar</th>
                                        <th>Status Antar</th>
                                        <th>Tanggal</th>
                                        {{-- <th>Action</th> --}}
                                       </tr>
                                   </thead>
                                   <tbody>
                                       {{-- @php
                                           $i = ($orders->currentPage()-1)*$orders->perPage();
                                       @endphp --}}
                                       @foreach ($orders as $order)
                                       @php
                                            $order->cart = json_decode($order->cart);
                                       @endphp
                                       @if ($order->status_antar === 'SUDAH')
                                           <tr>
                                               <td> 1 </td>
                                               <td>{{ $order->phonenumber }}</td>
                                               {{--<td><img src="{{ asset('assets/imgs/shop/order-') }}{{ $order->id }}-1.jpg" width="60" alt="{{ $order->name }}"></td> --}}
                                               <td>{{ $order->name }}</td>
                                               <td>
                                                @foreach ($order->cart as $item)
                                                menu : {{ $item->model->name}}, harga :  {{ $item->model->regular_price}}, jumlah :  {{ $item->qty}} <br>
                                                @endforeach
                                               </td>
                                               <td>Rp{{ format_uang($order->total_price) }}</td>
                                               <td>{{ $order->status }}</td>
                                               <td>{{ $order->status_antar }}</td>
                                               <td>{{ $order->created_at->toDayDateTimeString() }}</td>                                               
                                               <td>
                                                   {{-- <a href="#"   wire:click.prevent="accept({{ $order->id}})" class="button">Sudah di antar</a> --}}
                                                   {{-- <a href="#" class="text-danger"  wire:click.prevent="deleteorder({{ $order->id}})" style="margin-left: 20px;">Delete</a> --}}
                                               </td>
                                           </tr>
                                           @endif 
                                       @endforeach
                                   </tbody>
                               </table>
                               {{-- {{ $orders->links() }} --}}
                           </div>
                       </div>
                   </div>
               </div>


               <div class="row mt-30 mb-30">    
                   <div class="col-12">
                       <div class="card">
                           <div class="card-header">
                              <h2>Pesanan Belum di antar</h2>
                           </div>
                           <div class="card-body">
                               @if(Session::has('message'))
                                 <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                               @endif
                               <table class="table table-striped">
                                   <thead>
                                       <tr>
                                           <th>No</th>
                                           <th>Nomor Telepon</th>
                                           <th>Nama</th>
                                           <th>Pesanan</th>
                                           <th>Total Harga</th>
                                           <th>Status Bayar</th>
                                           <th>Status Antar</th>
                                           <th>Tanggal</th>
                                           {{-- <th>Action</th> --}}
                                       </tr>
                                   </thead>
                                   <tbody>
                                       {{-- @php
                                           $i = ($orders->currentPage()-1)*$orders->perPage();
                                       @endphp --}}
                                       @foreach ($orders as $order)
                                       {{-- @php
                                            $order->cart = json_decode($order->cart);
                                       @endphp --}}
                                       @if ($order->status_antar === 'BELUM')
                                           <tr>
                                               <td> 1 </td>
                                               <td>{{ $order->phonenumber }}</td>
                                               {{--<td><img src="{{ asset('assets/imgs/shop/order-') }}{{ $order->id }}-1.jpg" width="60" alt="{{ $order->name }}"></td> --}}
                                               <td>{{ $order->name }}</td>
                                               <td>
                                                @foreach ($order->cart as $item)
                                                menu : {{ $item->model->name}}, harga :  {{ $item->model->regular_price}}, jumlah :  {{ $item->qty}} <br>
                                                @endforeach
                                               </td>
                                               <td>Rp{{ format_uang($order->total_price) }}</td>
                                               <td>{{ $order->status }}</td>
                                               <td>{{ $order->status_antar }}</td>
                                               <td>{{ $order->created_at->toDayDateTimeString() }}</td>                                               
                                              
                                           </tr>
                                           @endif 
                                       @endforeach
                                   </tbody>
                               </table>
                               {{-- {{ $orders->links() }} --}}
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </section>
   </main>
</div>

