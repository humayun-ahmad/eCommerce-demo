@extends('admin_layout')

@section('admin_content')

<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Tables</a></li>
			</ul>

			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>Members</h2>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Product Id</th>
								  <th>Product Name</th>
								  <th>Category Id</th>
								  <th>Manufacture Id</th>
								  
								  <th>Product Price</th>
								  <th>Product Image</th>
								  <th>Product Size</th>
								  <th>product Color</th>
								  <th>Publication Status</th>
								  <th>Actions</th>
							  </tr>
						  </thead>   
						  <tbody>
							@foreach($all_product as $product)
								<tr>
									<td class="center">{{ $product->product_id }}</td>
									<td class="center">{{ $product->product_name }}</td>
									<td class="center">{{ $product->category_name }}</td>
									<td class="center">{{ $product->manufacture_name }}</td>
									
									<td class="center">{{ $product->product_price }}</td>
									<td class="center">
										<img src="{{ url($product->product_image) }}" style="height: 80px; width: 80px;" alt="">
									</td>
									<td class="center">{{ $product->product_size }}</td>
									<td class="center">{{ $product->product_color }}</td>
									<td class="center">
										@if($product->publication_status == 1)
										<span class="label label-success">
											Active
										</span>
										@else
										<span class="label label-info">
											Inactive
										</span>
										@endif
									</td>
									<td class="center">
										@if($product->publication_status == 1)
										<a class="btn btn-secondary" href="{{ url('/inactive_product/'.$product->product_id) }}">
											 <i class="halflings-icon white thumbs-down"></i> 
										</a>
										@else
										<a class="btn btn-success" href="{{ url('/active_product/'.$product->product_id) }}">
											 <i class="halflings-icon white thumbs-up"></i> 
										</a>
										@endif
										<a class="btn btn-info" href="{{ url('/edit/product/'.$product->product_id) }}">
											<i class="halflings-icon white edit"></i>  
										</a>
										<a class="btn btn-danger" href="{{ url('delete/product/'.$product->product_id) }}">
											<i class="halflings-icon white trash"></i> 
										</a>
									</td>
								</tr>
							@endforeach
						  </tbody>
					  </table>            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->

			
			
@endsection