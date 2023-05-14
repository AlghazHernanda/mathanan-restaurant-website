<div>
    <style>
        nav svg{
            height: 20px;
        }
        nav .hidden{
            display: block;
        }
      
    </style>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow">Home</a>
                   
                    <span></span> Add New menu
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        @if (Session::has('message'))
                        <div class="alert alert-success text-lg" role="alert">
                           {{ Session::get('message') }}
                        </div>        
                        @endif
                        <div class="card">
                            <div class="card-header">
                               <div class="row">
                                <div class="col-md-6"><h2>Add New menus</h2></div>
                                <div class="col-md-6"><a href="{{ route('admin.menus') }}" class="btn btn-success float-end">View All menus</a></div>
                               </div>
                            </div>
                            <div class="card-body">
                               
                               <form wire:submit.prevent="addMenu" enctype="multipart/form-data">
                                <div class="mb-3 mt-3">
                                    <label for="name" class="form-label">menu Name</label>
                                    <input type="text" id="name" name="name" class="form-control" placeholder="Enter menu Name.." wire:model="name" wire:keyup="generateSlug">
                                    @error('name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3 mt-3">
                                    <label for="slug" class="form-label">menu Slug</label>
                                    <input type="text" id="slug" name="slug" class="form-control" placeholder="Enter Slug.." wire:model="slug">
                                    @error('slug')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                    
                                <div class="mb-3 mt-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea name="description" id="" cols="30" rows="10" class="form-control" placeholder="Enter desctiption" wire:model="description"></textarea>
                                    @error('description')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-3 mt-3">
                                    <label for="regular_price" class="form-label">Regular Price</label>
                                    <input type="number" id="regular_price" name="regular_price" class="form-control" placeholder="Regular Price" wire:model="regular_price">
                                    @error('regular_price')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                              

                                <div class="mb-3 mt-3">
                                    <label for="featured" class="form-label"  wire:model='featured'>Featured</label>
                                    <select name="featured" id="featured" class="form-control">
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                    @error('featured')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-3 mt-3">
                                    <label for="quantity" class="form-label">Quantity</label>
                                    <input type="text" id="quantity" name="quantity" class="form-control" placeholder="quantity" wire:model="quantity">
                                    @error('quantity')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-3 mt-3">
                                    <label for="image" class="form-label">menu Image</label>
                                    <input type="file" id="image" name="image" class="form-control" wire:model="image">
                                    {{-- @if ($image)
                                    <img src="{{ $image->temporaryUrl() }}" width="120">
                                  
                                    @endif --}}

                                     {{-- @else
                                        {{-- <img src="{{ $image }}" width="120"> --}}
                                    {{-- @error('image')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror --}}
                                </div>

                                <button type="submit" class="btn btn-primary float-end">Submit</button>
                               </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
</div>