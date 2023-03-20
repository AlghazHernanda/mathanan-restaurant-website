@php
function convertDateDBtoIndo($string)
{
    // contoh : 2019-01-30

    $bulanIndo = ['', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

    $tanggal = explode('-', $string)[2];
    $bulan = explode('-', $string)[1];
    $tahun = explode('-', $string)[0];

    return $tanggal . ' ' . $bulanIndo[abs($bulan)] . ' ' . $tahun;
}
@endphp
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
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                               
                            </div>
                            <div class="card-body">
                                @if(Session::has('message'))
                                  <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                                @endif
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>phonenumber</th>
                                            <th>Name</th>
                                            <th>cart</th>
                                            <th>total price</th>
                                            <th>status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = ($orders->currentPage()-1)*$orders->perPage();
                                        @endphp
                                        @foreach ($orders as $order )
                                            <tr>
                                                <td>{{ ++$i }}</td>
                                                <td>{{ $order->phonenumber }}</td>
                                                {{--<td><img src="{{ asset('assets/imgs/shop/order-') }}{{ $order->id }}-1.jpg" width="60" alt="{{ $order->name }}"></td> --}}
                                                <td>{{ $order->name }}</td>
                                                <td>cart</td>
                                                <td>{{ $order->total_price }}</td>
                                                <td>{{ $order->status }}</td>
                                                <td>{{ $order->created_at->toDayDateTimeString() }}</td>                                               
                                                <td>
                                                    {{-- <a href="{{ route('admin.order.edit',['order_id'=>$order->id]) }}" class="text-info">Edit</a>
                                                    <a href="#" class="text-danger"  wire:click.prevent="deleteorder({{ $order->id}})" style="margin-left: 20px;">Delete</a> --}}
                                                </td>
                                            </tr> 
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $orders->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>

<div class="modal" id="deleteConfirmation">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body pb-30 pt-30">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h4 class="pb-30">Do you want to delete this record!</h4>
                        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#deleteConfirmation">Cancel</button>
                        <button type="button" class="btn btn-danger" onclick="deleteorder()">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        function deleteConfirmation(id)
        {
            @this.set('order_id',id);
            $('#deleteConfirmation').modal('show');
        } 
        function deleteorder()
        {
            @this.call('deleteorder');
            $('#deleteConfirmation').modal('hide');
        }
    </script>
@endpush