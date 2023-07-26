@extends('layouts.app')
@section('content')
<!-- Slide ============================================= -->
<!-- #Slide end -->

<section id="content">

			<div class="content-wrap">

				<div class="container clearfix">

                @foreach($products as $product)
					<!-- Portfolio Single Image
					============================================= -->
					<div class="col_two_third portfolio-single-image nobottommargin">
                        <div class="slide" data-thumb="{{asset('images/products/'.$product->gambar)}}"><a href="{{asset('images/products/'.$product->gambar)}}" data-lightbox="gallery-item"><img src="{{asset('images/products/'.$product->gambar)}}" alt="{{$product->gambar}}" style="width:100%;height:500px;" class="card-img-top img-thumbnail"></a></div>
					</div><!-- .portfolio-single-image end -->

					<!-- Portfolio Single Content
					============================================= -->
					<div class="col_one_third portfolio-single-content col_last nobottommargin">

						<!-- Portfolio Single - Description
						============================================= -->
						<div class="fancy-title title-bottom-border">
							<h2>{{ $product->nama }}</h2>
						</div>


						<!-- Portfolio Single - Meta
						============================================= -->
						<ul class="portfolio-meta bottommargin">
							<li><span><i class="icon-lightbulb"></i>Nama Produk:</span> {{ $product->nama }}</li>
							<li><span><i class="icon-calendar3"></i>Harga:</span> IDR {{ number_format($product->harga, 2) }}/{{ $product->satuan }}</li>
							<li><span><i class="icon-user"></i>Supplier:</span> {{$product->name}}</li>
							<li><a class="btn btn-success" target="_blank" href="https://api.whatsapp.com/send?phone=+62{{$product->notelp}}" class="text-white"><i class="icon-call"></i>  Hubungi via Whatsapp</a></li>

                        </ul>

						<hr style="background-color:#37b87c;">
						<div class="fancy-title">
                            <h5>Deskripsi:</h5>
                            <p>{{ $product->deskripsi }}</p>
						</div>
                        <a href="{{route('beranda.index')}}" class="btn btn-danger float-right">Kembali</a>                            </>
                        <!-- Portfolio Single - Meta End -->

					</div><!-- .portfolio-single-content end -->
                @endforeach
                </div>
            </div>
        </section>


@endsection
