@extends('admin_layout')

@section('dashboard_title')
<title>
	Add Category
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
					<a href="#">Update Category</a>
				</li>
			</ul>
			
			<div class="row-fluid">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Update Category info</h2>
						
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
						<form class="form-horizontal" action="{{ url('update/category/'.$category->category_id)}}" method="post">
							@csrf
						  <fieldset>
							
							<div class="control-group">
							  <label class="control-label" for="date01">Category Name</label>
							  <div class="controls">
								<input type="text" name="category_name" value="{{ $category->category_name }}">
							  </div>
							</div>

							          
							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Category Description</label>
							  <div class="controls">
								<textarea class="cleditor" id="textarea2" name="category_description" rows="3">
									{{ $category->category_description }}"
								</textarea>
							  </div>
							</div>

						

							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Update Category</button>
							  <button type="reset" class="btn">Cancel</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->

			

@endsection

