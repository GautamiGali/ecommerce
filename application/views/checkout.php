<?php 
	require_once("header.php");
?>

	<!-- breadcrumb -->
	<div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="<?php echo base_url().'product'?>" class="stext-109 cl8 hov-cl1 trans-04">
				Home
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
				Shoping Cart
			</span>
		</div>
	</div>

	<!-- Shoping Cart -->
	<form class="bg0 p-t-75 p-b-85">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
					<div class="m-l-25 m-r--38 m-lr-0-xl">
						<div class="wrap-table-shopping-cart">
							<?php if(!empty($products)) { ?>
							<table class="table-shopping-cart">
								<tr class="table_head">
									<th class="column-1">Product</th>
									<th class="column-2"></th>
									<th class="column-3">Price</th>
									<th class="column-4">Quantity</th>
									<th class="column-5">Total</th>
								</tr>
							<?php foreach($products as $key => $value) { ?>
								<tr class="table_row">
									<td class="column-1">
										<div class="how-itemcart1">
											<img src="<?php echo base_url($value->image)?>" alt="IMG">
										</div>
									</td>
									<td class="column-2"><?php echo $value->title; ?></td>
									<td class="column-3">₹<?php echo $value->price; ?></td>
									<td class="column-4">x<?php echo $value->quantity; ?></td>
									<?php
										if($key == 0){
											$sub_total = 0;
										} 
										$sub_total = $sub_total + $value->quantity * $value->price; 
										
									?>
									<td class="column-5" id="<?php echo 'sub-total'.$value->id; ?>">₹ <?php echo $value->quantity * $value->price; ?></td>
								</tr>
								<?php } ?>
							</table>
							<?php } else {  ?>
								<div class="p-t-12 p-r-85 p-r-15-lg p-r-0-md">
									<img src="<?php echo base_url('assets/images/empty-cart.jpg'); ?>" />
								<a href="<?php echo base_url().'product'?>" class="stext-109 cl8 hov-cl1 trans-04">
										Go to products
									</a>
								</div>

							<?php } ?>

						</div>

					</div>
				</div>
				<?php if(!empty($products)) { ?>
				<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
					<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
						<h4 class="mtext-109 cl2 p-b-30">
							Cart Totals
						</h4>

						<div class="flex-w flex-t bor12 p-b-13">
							<div class="size-208">
								<span class="stext-110 cl2">
									Subtotal:
								</span>
							</div>

							<div class="size-209">
								<span class="mtext-110 cl2">
									₹<?php echo $sub_total; ?>
								</span>
							</div>
						</div>

						<div class="flex-w flex-t bor12 p-t-15 p-b-30">

							<div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
								
								<div class="p-t-15">
									<span class="stext-112 cl8">
										Calculate Shipping
									</span>

									<div class="rs1-select2 rs2-select2 bor8 bg0 m-t-9">
										<select class="js-select2" name="time" id="country">
											<option>Select a country...</option>
											<option value="1">India</option>
											<option value="2">UK</option>
										</select>
										<div class="dropDownSelect2"></div>
									</div>
									<span class="error" id="country-span"></span>


									<div class="bor8 bg0 m-t-9">
										<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="state" placeholder="State /  city" id="city">
									</div>
									<span class="error"></span>

									<div class="bor8 bg0 m-t-9">
										<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="postcode" placeholder="Postcode / Zip" id="postal_code">
									</div>
									<span class="error"></span>

									<div class="bor8 bg0 m-t-9">
										<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="state" placeholder="Name" id="name">
									</div>
									<span class="error"></span>

									<div class="bor8 bg0 m-t-9">
										<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="state" placeholder="Mobile No" id="mobile_no">
									</div>
									<span class="error"></span>
										
								</div>
							</div>
						</div>

						<div class="flex-w flex-t p-t-27 p-b-33">
							<div class="size-208">
								<span class="mtext-101 cl2">
									Total:
								</span>
							</div>

							<div class="size-209 p-t-1">
								<span class="mtext-110 cl2" id="grand-total">
									₹<?php echo $sub_total; ?>
								</span>
							</div>
						</div>

						<div style="cursor: pointer;" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15" onclick="placeOrder()">
							Place the order
						</div> 
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
	</form>
<?php 
  require_once('footer.php');
?>


<script type="text/javascript">
	function placeOrder(){
		console.log('placeOrder');
		
		let is_valid = true;
		let country = $("#country :selected").val();
		console.log(country)

		let city = $("#city").val();
		let postal_code = $("#postal_code").val();
		let name = $("#name").val();
		let mobile_no = $("#mobile_no").val();
		if(country == 'Select a country...'){
			is_valid = false;
			$("#country-span").html("Select country");
		}
		if(!city){
			is_valid = false;
			$("#city").parent().next('span').html("City required");
		}
		if(!postal_code){
			is_valid = false;
			$("#postal_code").parent().next('span').html("Postal code required");
		}
		if(!name){
			is_valid = false;
			$("#name").parent().next('span').html("Name required");
		}
		if(!mobile_no){
			is_valid = false;
			$(".error").css('color' , 'red');
			$("#mobile_no").parent().next('span').html("Mobile no required");
		}
		if(!is_valid){
			return false;
		} else {
			location.href = "<?php echo base_url()?>product/success";

		}
	}
</script>