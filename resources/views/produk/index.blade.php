@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-3">
            @role('tenant')
                <div class="card">
                    <div class="card-header">
                        <h3>Produk</h3>
                    </div>
                    <div class="card-body">
                        <a href="{{route('tenant.formProduk')}}" class="btn btn-outline-primary btn-block" >
                            + Tambah Produk
                        </a>
                    </div>
                </div>
            @endrole
            <div class="card mt-3">
                <div class="card-header">
                    <h3>Filter</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="search">Pencarian</label>
                        <div class="input-group">
                            <input type="text" name="titles" id="title" class="form-control" placeholder="search" value="{{ $title != null ? $title : null }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="priority">Priority</label>
                        @foreach ($priority as $item)
                            <label class="checkbox checkbox-success">
                                <input type="checkbox" name="filterByPriority" value="{{ $item->id }}"
                                    @if (in_array($item->id, explode(',', request()->input('filter.priority'))))
                                        checked
                                    @endif
                                />
                                <span>{{ $item->name }}</span><span class="checkmark"></span>
                        </label>
                    @endforeach
                    </div>
                    <div class="form-group">
                        <button id="filter" class="btn btn-primary">Filter</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <section class="product-cart">
                <div class="row list-grid">
                    @forelse ($produk as $row)
                        <div class="list-item col-md-3">
                            <div class="card o-hidden mb-4 d-flex flex-column">
                                <div class="list-thumb d-flex"><img alt="" src="{{ asset('img/produk/' . $row->produk_image->image) }}" /></div>
                                <div class="flex-grow-1 d-bock">
                                    <div class="card-body align-self-center d-flex flex-column justify-content-between align-items-lg-center">
                                        @role('inkubator')
                                        <a class="w-40 w-sm-100" href="{{ route('inkubator.detailProduk', $row->id) }}">
                                            <div class="item-title">
                                                {{ $row->title }}
                                            </div>
                                        </a>
                                        @endrole
                                        @role('mentor')
                                        <a class="w-40 w-sm-100" href="{{ route('mentor.detailProduk', $row->id) }}">
                                            <div class="item-title">
                                                {{ $row->title }}
                                            </div>
                                        </a>
                                        @endrole
                                        @role('tenant')
                                        <a class="w-40 w-sm-100" href="{{ route('tenant.detailProduk', $row->id) }}">
                                            <div class="item-title">
                                                {{ $row->title }}
                                            </div>
                                        </a>
                                        @endrole
                                        <p class="m-0 text-muted text-small w-15 w-sm-100">Harga Rp. {{ number_format($row->harga_jual,0,',','.') }}</p>
                                        <p class="m-0 text-muted text-small w-15 w-sm-100">{{ $row->tenant->title }}</p>
                                        <p class="m-0 text-muted text-small w-15 w-sm-100 d-none d-lg-block item-badges">
                                            <span class="badge badge-info">{{ $row->priority->name }}</span>
                                        </p>
                                    </div>
                                    <div class="card-footer p-0">
                                        @role('tenant')
                                            <div class="dropup">
                                                <button type="button" class="btn btn-primary btn-sm dropdown-toggle w-100" data-toggle="dropdown">
                                                    Option
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a href="#" class="dropdown-item btn-warning w-100">UPDATE</a>
                                                    <a href="{{ route('tenant.destroyProduk', $row->id) }}" class="dropdown-item btn-danger w-100">HAPUS</a>
                                                </div>
                                            </div>
                                        @endrole
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <h5>Belum ada produk</h5>
                    @endforelse
                    <div class="col-md-12 mt-3 ">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center">
                                {{ $produk->links() }}
                            </ul>
                        </nav>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('theme/css/plugins/datatables.min.css')}}" />
@endsection
@section('js')
    <script src="{{asset('theme/js/plugins/datatables.min.js')}}"></script>
    <script src="{{asset('theme/js/scripts/contact-list-table.min.js')}}"></script>
    <script src="{{asset('theme/js/scripts/datatables.script.min.js')}}"></script>
    <script src="{{asset('theme/js/plugins/datatables.min.js')}}"></script>
    <script src="{{asset('theme/js/scripts/tooltip.script.min.js')}}"></script>
    <script>
        $('#ul-contact-list').DataTable({
            responsive:true
        });
        $(function() {
            function getIds(checkboxName) {
                let checkBoxes = document.getElementsByName(checkboxName);
                let ids = Array.prototype.slice.call(checkBoxes)
                                .filter(ch => ch.checked==true)
                                .map(ch => ch.value);
                return ids;
            }
            function filterResults () {
                let priorityIds = getIds("filterByPriority");
                let title = $('input[name="titles"]').val();
                let href = 'produk?';
                if(priorityIds.length) {
                    href += 'filter[priority]=' + priorityIds;
                }
                if(title !== ""){
                    href += '&filter[title]=' + title;
                }
                console.log(href);
                document.location.href=href;
            }
        document.getElementById("filter").addEventListener("click", filterResults);
        });
    </script>
@endsection
