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
                    <span></span> All menu                
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-6">                                    
                                    Add New Categories                
                                    </div>
                                    <div class="col-md-6">
                                        <a href="{{ route('admin.menu.add') }}" class="btn btn-success float-end">Add New menu</a>
                                    </div>
                                </div> 
                            </div>
                            <div class="card-body">
                                @if(Session::has('message'))
                                  <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                                @endif
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Image</th>
                                            <th>Name</th>
                                            {{-- <th>Stock</th> --}}
                                            <th>Price</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = ($menus->currentPage()-1)*$menus->perPage();
                                        @endphp
                                        @foreach ($menus as $menu )
                                            <tr>
                                                <td>{{ ++$i }}</td>
                                                <td><img src="{{ asset('assets/imgs/menu') }}/{{ $menu->image }}" width="60" alt="{{ $menu->name }}"></td>
                                                {{--<td><img src="{{ asset('assets/imgs/shop/menu-') }}{{ $menu->id }}-1.jpg" width="60" alt="{{ $menu->name }}"></td> --}}
                                                <td>{{ $menu->name }}</td>
                                                <td>{{ $menu->regular_price }}</td>
                                                <td>{{ $menu->created_at }}</td>                                               
                                                <td>
                                                    <a href="{{ route('admin.menu.edit',['menu_id'=>$menu->id]) }}" class="text-info">Edit</a>
                                                    <a href="#" class="text-danger"  wire:click.prevent="deleteMenu({{ $menu->id}})" style="margin-left: 20px;">Delete</a>
                                                </td>
                                            </tr> 
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $menus->links() }}
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
                        <button type="button" class="btn btn-danger" onclick="deletemenu()">Delete</button>
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
            @this.set('menu_id',id);
            $('#deleteConfirmation').modal('show');
        } 
        function deletemenu()
        {
            @this.call('deletemenu');
            $('#deleteConfirmation').modal('hide');
        }
    </script>
@endpush