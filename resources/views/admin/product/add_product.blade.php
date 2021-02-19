@extends('admin_layout')

@section('dashboard_title')
<title>
	Add Product
</title>
@endsection

@section('admin_content')


<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="#">Home</a>
					<i class="icon-angle-right"></i> 
				</li>
				<li>
					<i class="icon-edit"></i>
					<a href="#">New Product</a>
				</li>
			</ul>
			
			<div class="row-fluid">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Add Product Form</h2>
						
					</div>
					<p class="alter-danger">
						<?php 
							$message = Session::get('message');
							if($message){
								echo $message;
								Session::put('message', null);
							}
							
						 ?>
					</p>
					<div class="box-content">
						<form class="form-horizontal" action="{{ route('save.product') }}" method="post" enctype="multipart/form-data">
							@csrf
						  <fieldset>
							
							<div class="control-group">
							  <label class="control-label" for="date01">Product Name</label>
							  <div class="controls">
								<input type="text" name="product_name">
							  </div>
							</div>

							 <div class="control-group">
								<label class="control-label" for="selectError3">Product Category</label>
								<div class="controls">
								  <select id="selectError3" name="category_id">
								  	<option>select category</option>
								  	<?php 
								  	$all_category_list = DB::table('tbl_category')->where('publication_status', 1)->get();
								  	foreach($all_category_list as $category){
								  	 ?>
								  	
									<option value="{{ $category->category_id }}">{{ $category->category_name }}</option>
								<?php } ?>
								  </select>
								</div>
							  </div>

							  <div class="control-group">
								<label class="control-label" for="selectError3">Brand Name</label>
								<div class="controls">
								  <select id="selectError3" name="manufacture_id">
								  	<option>select brand</option>
									<?php 
								  	$all_manufacture = DB::table('tbl_manufacture')->where('publication_status', 1)->get();
								  	foreach($all_manufacture as $manufacture){
								  	 ?>
								  	
									<option value="{{ $manufacture->manufacture_id }}">{{ $manufacture->manufacture_name }}</option>
								<?php } ?>
								  </select>
								</div>
							  </div>

							   
							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Product Short Description</label>
							  <div class="controls">
								<textarea class="cleditor" id="textarea2" name="product_short_description" rows="3"></textarea>
							  </div>
							</div>

							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Product Long Description</label>
							  <div class="controls">
								<textarea class="cleditor" id="textarea2" name="product_long_description" rows="3"></textarea>
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="date01">Product Price</label>
							  <div class="controls">
								<input type="text" name="product_price">
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="date01">Product image</label>
							  <div class="controls">
								<input type="file" name="product_image">
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="date01">Product size</label>
							  <div class="controls">
								<input type="text" name="product_size">
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="date01">Product color</label>
							  <div class="controls">
								<input type="text" name="product_color">
							  </div>
							</div>

							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Publication status</label>
							  <div class="controls">
								<input type="checkbox" name="publication_status" value="1">
							  </div>
							</div>

							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Add Product</button>
							  <button type="reset" class="btn">Cancel</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->

			

@endsection

