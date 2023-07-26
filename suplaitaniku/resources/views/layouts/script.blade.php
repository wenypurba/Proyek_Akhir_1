<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
        }
    })
    $('#inputSearch').on('keyup',function(){
        $inputSearch = $(this).val();
        if($inputSearch==''){
            $('.search-result').show();
        }else{
            $.ajax({
                method:"post",
                url:'search',
                data: JSON.stringify({
                    inputSearch:$inputSearch
                }),
                headers:{
                    'Accept':'application/json',
                    'Content-Type':'application/json'
                },
				beforeSend:function(){
                        $(".search-result").html('<li>Loading..</li>');
                },  
                success:function(data){
                    var searchResultAjax='';
                    data = JSON.parse(data);
                    console.log(data);
                    $('.search-result').show();
                    for(let i=0;i<data.length;i++){
                        searchResultAjax += `
                            <article class="portfolio-item pf-media pf-`+data[i].kategori+`" id="portfolio" >
                                <div class="row mt-4">
                                    <div class="col-md-12">
                                        <div class="feature-box media-box">
                                            <div class="fbox-media">
                                                <div class="portfolio-image">
                                                    <img src="images/products/`+data[i].gambar+`" style="width:100%;height:250px;" class="card-img-top img-thumbnail">
                                                <div class="portfolio-overlay">
												<a href="/show/`+data[i].id+`" class="center-icon"><i class="icon-line-expand"></i></a>
												</div>
                                                </div>
                                            </div>
                                            <div class="fbox-desc">
												<h3><a href="#">`+data[i].nama+`</a></h3>
                                                <p><b> Rp `+data[i].harga+`/`+data[i].satuan+`</b></p>
												<a href="/show/`+data[i].id+`" class="float-right"><b> Lihat >></b></a>
											</div>
                                        </div>
                                    </div>
                                </div>
                            </article>`
                    }
                    $('.search-result').html(searchResultAjax);
                },
            })
        }
    })
</script>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
        }
    })
    $(".search-input").on('keyup',function(){
            var _q=$(this).val();
            if(_q.length>=1){
                $.ajax({
                    url:"searchLive",
                    data:{
                        q:_q
                    },
                    dataType:'json',
                    beforeSend:function(){
                        $(".search-result").html('<li>Loading..</li>');
                    },  
                    success:function(res){
                        var _html='';
                        $.each(res.data,function(index,data){
                            _html+=`
                            <tr class="cart_item">
                            <td class="cart-product-name">`+data.id+`</td>
                            <td class="cart-product-name">`+data.nama+`</td>
                            <td class="cart-product-subtotal"><span class="amount">Rp.`+data.harga+`</span></td>
                            <td class="cart-product-thumbnail"><img class="card-img-top" src="images/products/`+data.gambar+`" alt="" width="50px"></td>
                            <td width="280px" class="cart-product-quantity">
                            <form action="/products/`+data.id+`/destroy" method="POST">
                            <a class="btn" href="/products/`+data.id+`"><i class="i-rounded i-small icon-tasks"></i></a>
                            @can('product-edit')
                            <a class="btn" href="/products/`+data.id+`/edit"><i class="i-rounded i-small icon-edit"></i></a>
                            @endcan
                            @csrf
                                @method('DELETE')
                                @can('product-delete')
                                <!-- Button trigger modal -->
                                <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal">
                                    <i class="i-rounded i-small icon-remove"></i>
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Hapus</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">
                                        Apakah anda yakin ingin menghapus produk ini?
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary">Hapus</button>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                @endcan
                            </form>
                            </td>
                            </tr>`;
                        });
                        $(".search-result").html(_html);
                    }
                })
            }
            else{
                return false;
            }
        });
</script>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
        }
    })
    $(".searchInput").on('keyup',function(){
            var _q=$(this).val();
            if(_q.length>=1){
                $.ajax({
                    url:"liveSearch",
                    data:{
                        q:_q
                    },
                    dataType:'json',
                    beforeSend:function(){
                        $(".searchResult").html('<li>Loading..</li>');
                    },  
                    success:function(res){
                        var _html='';
                        $.each(res.data,function(index,data){
                            _html+=`
                            <tr class="cart_item">
                                <td class="cart-product-name">`+data.name+`</td>
                                <td class="cart-product-name">`+data.notelp+`</td>
                                <td class="cart-product-name">`+data.email+`</td>
                                <td class="cart-product-quantity">
                                    <label class="badge badge-success">MEMBER</label>
                                </td>
                                <td>
                                    <a class="btn btn-info" href="users/`+data.id+`">Lihat</a>
                                    <a class="btn btn-primary" href="users/`+data.id+`/edit">Edit</a>
                                    <a class="btn btn-danger" href="destroy/`+data.id+`">Hapus</a>
                                </td>
                            </tr>`;
                        });
                        $(".searchResult").html(_html);
                    }
                })
            }
            else{
                return false;
            }
        });
</script>


    <script src="{{asset('js/jquery.js')}}"></script>
	<script src="{{asset('js/plugins.js')}}"></script>

	<!-- Footer Scripts
	============================================= -->

	<!-- SLIDER REVOLUTION 5.x SCRIPTS  -->

	<script src="{{asset('js/functions.js')}}"></script>
	<script src="{{asset('include/rs-plugin/js/jquery.themepunch.revolution.min.js')}}"></script>
	<script src="{{asset('include/rs-plugin/js/jquery.themepunch.tools.min.js')}}"></script>

	<script src="{{asset('include/rs-plugin/js/extensions/revolution.extension.slideanims.min.js')}}"></script>


	<script>

		var tpj=jQuery;
		tpj.noConflict();

		tpj(document).ready(function() {

			var apiRevoSlider = tpj('#rev_slider_ishop').show().revolution(
			{
				sliderType:"standard",
				jsFileLocation:"include/rs-plugin/js/",
				sliderLayout:"fullwidth",
				dottedOverlay:"none",
				delay:9000,
				navigation: {},
				responsiveLevels:[1200,992,768,480,320],
				gridwidth:1140,
				gridheight:500,
				lazyType:"none",
				shadow:0,
				spinner:"off",
				autoHeight:"off",
				disableProgressBar:"on",
				hideThumbsOnMobile:"off",
				hideSliderAtLimit:0,
				hideCaptionAtLimit:0,
				hideAllCaptionAtLilmit:0,
				debugMode:false,
				fallbacks: {
					simplifyAll:"off",
					disableFocusListener:false,
				},
				navigation: {
					keyboardNavigation:"off",
					keyboard_direction: "horizontal",
					mouseScrollNavigation:"off",
					onHoverStop:"off",
					touch:{
						touchenabled:"on",
						swipe_threshold: 75,
						swipe_min_touches: 1,
						swipe_direction: "horizontal",
						drag_block_vertical: false
					},
					arrows: {
						style: "ares",
						enable: true,
						hide_onmobile: false,
						hide_onleave: false,
						left: {
							h_align: "left",
							v_align: "center",
							h_offset: 10,
							v_offset: 0
						},
						right: {
							h_align: "right",
							v_align: "center",
							h_offset: 10,
							v_offset: 0
						}
					}
				}
			});

			apiRevoSlider.bind("revolution.slide.onloaded",function (e) {
				SEMICOLON.slider.sliderParallaxDimensions();
			});

		}); //ready

	</script>

<script src="{{asset('js/toastr.js')}}"></script>
<script src="{{asset('js/swa2.js')}}"></script>
<script src="{{asset('js/plugins.js')}}"></script>
<script src="{{asset('js/plugin.js')}}"></script>
<script src="{{asset('js/routes.js')}}"></script>
<script src="{{asset('js/alert.js')}}"></script>

