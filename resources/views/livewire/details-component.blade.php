<div>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="{{ route('home.index') }}" rel="nofollow">Home</a>
                    <span></span> Menu
                    <span></span> Menu Image Detail
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
        
            <img class="tengah" src="{{ asset('assets/imgs/menu') }}/{{ $menu->image }}" alt="{{ $menu->name}}">
                                
        </section>
    </main>
</div>
