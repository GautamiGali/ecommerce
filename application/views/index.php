<?php 
	require_once("header.php");
?>
	<!-- Product -->
	<section class="bg0 p-t-23 p-b-140">
		<div class="container">
			<div class="p-b-10">
				<h3 class="ltext-103 cl5">
					Product Overview
				</h3>
			</div>
			<div class="row isotope-grid">
				<?php if(!empty($products)){
					foreach($products as $data){
				?>
					<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
						<!-- Block2 -->
						<div class="block2">
							<div class="block2-pic hov-img0">
								<img src="<?php echo base_url($data->image)?>" alt="IMG-PRODUCT">

								<button class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1" onclick="quickView('<?php echo $data->id ?>')">
									Quick View
								</button>
							</div>

							<div class="block2-txt flex-w flex-t p-t-14">
								<div class="block2-txt-child1 flex-col-l ">
									<a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
										<?php echo $data->title; ?>
									</a>

									<span class="stext-105 cl3">
										<?php 
											$price = json_decode($data->price);
											$price = $price->s;
										?>
										<?php echo '₹'.$price; ?>
									</span>
								</div>

								<div class="block2-txt-child2 flex-r p-t-3">
									<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
										<img class="icon-heart1 dis-block trans-04" src="<?php echo base_url('assets/images/icons/icon-heart-01.png')?>" alt="ICON">
										<img class="icon-heart2 dis-block trans-04 ab-t-l" src="<?php echo base_url('assets/images/icons/icon-heart-02.png')?>" alt="ICON">
									</a>
								</div>
							</div>
						</div>
					</div>
				<?php } 
			} ?>
		</div>
	</section>
	
<?php 
  require_once('footer.php');
?>
<!-- Modal1 -->
	<div class="wrap-modal1 js-modal1 p-t-60 p-b-20" id="details-modal">
		<div class="overlay-modal1 js-hide-modal1"></div>

		<div class="container" style="max-width: 900px">
			<div class="bg0 p-t-60 p-b-30 p-lr-15-lg how-pos3-parent">
				<button class="how-pos3 hov3 trans-04 js-hide-modal1" onclick="hideModal()">
					<img src="<?php echo base_url('assets/images/icons/icon-close.png')?>" alt="CLOSE">
				</button>

				<div class="row">
					<div class="col-md-6 col-lg-7 p-b-30">
						<div class="p-l-25 p-r-30 p-lr-0-lg">
							<div class="wrap-slick3 flex-sb flex-w">
								<div class="wrap-slick3-dots"></div>
								<div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

								<div class="slick3 gallery-lb">
									<div class="item-slick3">
										<div class="wrap-pic-w pos-relative">
											<img src="" alt="IMG-PRODUCT" id="product-img">
											<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="">
												<i class="fa fa-expand"></i>
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<div class="col-md-6 col-lg-5 p-b-30">
						<div class="p-r-50 p-t-5 p-lr-0-lg">
							<h4 class="mtext-105 cl2 js-name-detail p-b-14" id="title"></h4>
							<span class="mtext-106 cl2" id="price"></span>
							<p class="stext-102 cl3 p-t-23" id="description"></p>
							<span class="stext-102 cl3 p-t-23" id="category"></span>

							<!--  -->
							<div class="p-t-33">
								<div class="flex-w flex-r-m p-b-10">
									<div class="size-203 flex-c-m respon6">
										Size
									</div>

									<div class="size-204 respon6-next">
										<div class="rs1-select2 bor8 bg0">
											<select class="js-select2" id="size-select">
												<option value="" selected data-size="s">Size S</option>
												<option value="" data-size="m">Size M</option>
												<option value="" data-size="l">Size L</option>
											</select>
											<div class="dropDownSelect2"></div>
										</div>
									</div>
								</div>
								<div class="flex-w flex-r-m p-b-10">
									<div class="flex-w flex-m respon6-next">
										<div class="wrap-num-product flex-w m-r-20 m-tb-10">
											<div id="minus" class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m" onclick="remove()">
												<i class="fs-16 zmdi zmdi-minus" ></i>
											</div>

											<input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product" value="1" id="quantity-input" readonly>

											<div id="add" class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m" onclick="add()">
												<i class="fs-16 zmdi zmdi-plus"></i>
											</div>
										</div>

										<button class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail" id="add-tocart" onclick="addToCart()">
											Add to cart
										</button>
									</div>
								</div>	

							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


<script type="text/javascript">

	$( document ).ready(function() {
    	$("#size-select").on('change', function(){
    		$("#price").html('₹'+$(this).val());
    	});
	});


	function hideModal(){
		$("#details-modal").removeClass("show-modal1");
	}

	function quickView (id){
		$.ajax({
	      type: "POST",
	      data: {id : id},
	      url: "<?php echo base_url();?>index.php/product/getProduct",
	      success:function(result){
	        result = JSON.parse(result);
	        let res = result.data;
	        let price = JSON.parse(res.price);
	        $("#title").html(res.title);
	        $("#price").html("₹"+price.s);
	        $("#size-select > option").each(function() {
			    let size = $(this).attr('data-size');
			    $(this).val(price[size]);
			});
	        $("#description").html(res.description);
	        let img_url = "<?php echo base_url()?>"+res.image;
	        $("#product-img").attr('src', img_url);
	        $("#product-img").next().attr('href', img_url);
	        $("#add-tocart").attr('data-id', res.id);
	        $("#category").html("Category: " +res.category);
	        if(result.quantity){
	        	$("#quantity-input").val(result.quantity);
	        }

	       
	      },
	      error: function(error){
	      	console.log(error);
	      }
	    });
	}

	function addToCart (){
		var id = $("#add-tocart").attr("data-id");
		var quantity = $("#quantity-input").val();
		var size = $("#size-select option:selected").attr('data-size');
		$.ajax({
	      type: "POST",
	      data: {id : id, quantity : quantity, size : size},
	      url: "<?php echo base_url();?>index.php/product/addProduct",
	      success:function(result){
	      	result = JSON.parse(result);
	      	console.log(result)
	      	if(result.status == "success"){
	      		//$("#total-items").attr('data-notify', data);
	      		let nameProduct =  $("#title").html();
				swal(nameProduct, "is added to cart !", "success");
	      	}
	       
	      },
	      error: function(error){
	      	console.log(error);
	      }
	    });
	}

	function add(){
	  var input = $('#quantity-input'),
	  value = input.val();
	  input.val(++value);
	  if(value > 1){
	    $('#minus').removeAttr('disabled');
	    $('#minus').css('cursor', 'pointer');
	  }

	}
	function remove(){
	   var input = $('#quantity-input'),
	   value = input.val();
	   if(value == 1){
	   	  $('#minus').attr('disabled','disabled');
	   	  $('#minus').css('cursor', 'not-allowed');
	   }else{
	      input.val(--value);
	  }

}

</script>