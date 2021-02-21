@extends('layout')
@section('content')

<section id="cart_items">
	<div class="container col-sm-12">
		<div class="breadcrumbs">
			<ol class="breadcrumb">
			  <li><a href="#">Home</a></li>
			  <li class="active">Shopping Cart</li>
			</ol>
		</div>
		<div class="table-responsive cart_info">
			<table class="table table-condensed">
				<thead>
					<tr class="cart_menu">
						<td class="image">Image</td>
						<td class="description">Name</td>
						<td class="price">Price</td>
						<td class="quantity">Quantity</td>
						<td class="total">Total</td>
						<td>Action</td>
					</tr>
				</thead>
				<tbody>
					@foreach($all_data as $data)
					<tr>
						<td class="cart_product">

							<a href=""><img src="#" alt=""></a>
						</td>
						<td class="cart_description">
							<h4><a href="">{{ $data->name }}</a></h4>
							
						</td>
						<td class="cart_price">
							<p>{{($data->price)}}</p>
						</td>
						<td class="cart_quantity">
							<div class="cart_quantity_button">
								<a class="cart_quantity_up" href=""> + </a>
								<input class="cart_quantity_input" type="text" name="quantity" value="{{$data->quantity}}" autocomplete="off" size="2">
								<a class="cart_quantity_down" href=""> - </a>
							</div>
						</td>
						<td class="cart_total">
							<p class="cart_total_price">{{ $data->total }}</p>
						</td>
						<td class="cart_delete">
							<a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
						</td>
					</tr>

					@endforeach
					
				</tbody>
			</table>
		</div>
	</div>
</section> <!--/#cart_items-->

@endsection