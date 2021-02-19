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
					<a href="#">New Slider</a>
				</li>
			</ul>
			
			<div class="row-fluid">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Add New Slider</h2>
						
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
						<form class="form-horizontal" action="{{ route('save.slider') }}" method="post" enctype="multipart/form-data">
							@csrf
						 
							<div class="control-group">
							  <label class="control-label" for="date01">Slider image</label>
							  <div class="controls">
								<input type="file" name="slider_image">
							  </div>
							</div>

							

							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Publication status</label>
							  <div class="controls">
								<input type="checkbox" name="publication_status" value="1">
							  </div>
							</div>

							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Add Slider</button>
							  <button type="reset" class="btn">Cancel</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->

			

@endsection

