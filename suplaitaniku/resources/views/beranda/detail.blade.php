<div class="portfolio-ajax-modal">

    <div class="ajax-modal-title">
        <h2>Detail Produk</h2>
    </div>

    <div class="modal-padding clear-bottommargin clearfix">

        <div class="row">
            @foreach($products as $product)
            <!-- Portfolio Single Image
            ============================================= -->
            <div class="col-lg-7 portfolio-single-image bottommargin">
                <div class="slide" data-thumb="{{asset('images/products/'.$product->gambar)}}"><a href="{{asset('images/products/'.$product->gambar)}}" title="Pink Printed Dress - Front View" data-lightbox="gallery-item"><img src="{{asset('images/products/'.$product->gambar)}}" alt="{{$product->gambar}}" style="width:100%;height:400px;" class="card-img-top img-thumbnail"></a></div>
            </div><!-- .portfolio-single-image end -->

            <!-- Portfolio Single Content
            ============================================= -->
            <div class="col-lg-5 portfolio-single-content col_last bottommargin">

                <!-- Portfolio Single - Description
                ============================================= -->
                <div class="fancy-title title-bottom-border">
					<h2>{{ $product->nama }}</h2>
				</div>
                <div class="fancy-title title-bottom-border">
                    <p>Deskripsi : {{ $product->deskripsi }}</p>
				</div>

					<ul class="portfolio-meta bottommargin">
						<li><span><i class="icon-lightbulb"></i>Nama Produk:</span> {{ $product->nama }}</li>
						<li><span><i class="icon-calendar3"></i>Harga:</span> IDR {{ number_format($product->harga, 2) }}/{{ $product->satuan }}</li>
						<li><span><i class="icon-user"></i>Supplier:</span> {{$product->name}}</li>
                        <li><a class="btn btn-success" target="_blank" href="https://api.whatsapp.com/send?phone=+62{{$product->notelp}}" class="text-white"><i class="icon-call"></i>  Hubungi via Whatsapp</a></li>
					</ul>
					<!-- Portfolio Single - Meta End -->

            </div><!-- .portfolio-single-content end -->
            @endforeach
        </div>

    </div>
</div>
