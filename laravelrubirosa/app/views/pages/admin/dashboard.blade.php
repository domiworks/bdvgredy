@extends('layouts.adminlayout')
@section('content')


<div class="container">
	<div class="row">
		<div class="g-lg-12">
			
			<div class="panel panel-default">
								<div class="panel-heading">
									<h3 class="panel-title">General</h3>
								</div>
								<div class="panel-body">
								
									<div class="g-lg-12">
			
			<table class="table table-striped table-hover ">
									<thead>
										<tr>
											<th></th>
											<th>ID</th>
											<th>Nama</th>
											<th>Tipe</th>
											<th>Attribute Set</th>
											<th>Edit</th>
										</tr>
									</thead>
									<tbody>
										<?php 
										for ($i=0; $i<=30; $i++) {
										  ?>
										<tr> 
											<td><input type="checkbox"></td>
											<td><?php echo($i); ?></td>
											<td>Barang bagus</td>
											<td>Pakaian</td>
											<td>Set atribut pakaian</td>
											<td><a class="btn btn-warning btn-xs">Edit</a></td>
										</tr> 
										  <?php
										} 
										?>
										
									</tbody>
								</table>
			
			
		</div>
		</div>
		</div>
		</div>
	</div>
</div>
@stop