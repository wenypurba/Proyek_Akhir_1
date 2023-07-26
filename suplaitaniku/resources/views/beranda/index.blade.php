@extends('layouts.app')
@section('content')
<!-- Slide ============================================= -->
@include('layouts.slide')
<!-- #Slide end -->
<section id="content">

    <div class="content-wrap">

        <div class="container clearfix">
            <div class="clear"></div>
            <div class="input-group w-100 mx-auto">
					<div class="input-group-prepend">
						<span class="input-group-text">
							<i class="icon-line-search"></i>
						</span>
					</div>
				<input type="text" id="inputSearch" class="form-control" value="" placeholder="Cari Produk..">
			</div><br>
            <div class="row">
            <h4 class="mr-4 ml-4">Pilih kategori</h4><i class="i-rounded i-small icon-filter"></i>
            <ul class="portfolio-filter clearfix" data-container="#portfolio">

                <li class="activeFilter"><a href="#" data-filter="*">Semua</a></li>
                <li><a href="#" data-filter=".pf-buah-buahan">Buah</a></li>
                <li><a href="#" data-filter=".pf-sayur-sayuran">Sayur</a></li>
                <li><a href="#" data-filter=".pf-umbi-umbian">Umbi</a></li>
                <li><a href="#" data-filter=".pf-biji-bijian">Biji</a></li>

            </ul><!-- #portfolio-filter end -->
            </div>
            <div class="clear"></div>
            <!-- Portfolio Items============================================= -->
            <div id="portfolio" class="portfolio grid-container clearfix search-result">
                @foreach ($products as $product)
                <article class="portfolio-item pf-media pf-{{$product->kategori}}">
                <div class="row mt-4">
                    <div class="col-md-12">
                        <div class="feature-box media-box">
                            <div class="fbox-media">
                                <div class="portfolio-image">
                                     <img src="{{asset('images/products/'.$product->gambar)}}" style="width:100%;height:250px;" class="card-img-top img-thumbnail">
                                <div class="portfolio-overlay">
                                    <a href="{{ route('beranda.detail',$product->id) }}" data-lightbox="ajax" class="center-icon"><i class="icon-line-expand"></i></a>
                                </div>
                                </div>
                            </div>
                            <div class="fbox-desc">
                                <h3><a href="{{ route('beranda.show',$product->id) }}">{{ $product->nama }}</a></h3>
                                <p><b> Rp {{ number_format($product->harga, 2) }}/{{ $product->satuan }}</b></p>
                                @can('role-create')
                                <p><b> Id Produk: {{ $product->id }}</b></p>
                                @endcan
                                <a href="{{route('beranda.show',$product->id)}}" class="float-right"><b> Lihat >></b></a>
                            </div>
                         </div>
                    </div>
                </div>
                </article>
                @endforeach
            </div><!-- #portfolio end -->
            <div class="clear bottommargin-sm"></div>

            <div class="clear"></div>
        </div>

    </div>

</section><!-- #content end -->
@endsection
@section('custom_js')
<script type="text/javascript">
    $(function() {
        load_list(1);
    });
</script>
@endsection
