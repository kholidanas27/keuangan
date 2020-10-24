<style>
    .menu-sidebar-area {
        color: #000000;
        font-size: 20px;
        line-height: 1.8;
    }
    </style>


    <div class="card">
        <div class="card-body">
            <h3> <br></h3>
            <ul class="menu-sidebar-area">
                <h3>Menu</h3>
                <li class="icon-dashboard"><a href="{{URL('inkubator/berita')}}">Berita</a></li>
                {{-- @if(Auth::user()->admin == '1') --}}
                <li class="icon-customers"><a href="{{URL('inkubator/berita/kategori')}}">Kategori</a></li>
                <li class="icon-users"><a href="{{URL('inkubator/berita/komentar')}}">Komentar</a></li>
                {{-- @endif --}}
            </ul>
        </div>
    </div>

