<?php

if(isset($_GET['id']) && $_GET['id'] > 0){
    $qry = $conn->query("SELECT cr.*, c.name as `court` FROM court_rentals cr inner join court_list c on cr.court_id = c.id where cr.id = '{$_GET['id']}'");
    if($qry->num_rows > 0){
        foreach($qry->fetch_assoc() as $k => $v){
            $$k=$v;
        }
    }else{
        echo '<script> alert("ID de alquiler invalidos."); location.replace("./?page=court_rentals");</script>';
    }
}else{
    echo '<script> alert("ID de alquiler requerido."); location.replace("./?page=court_rentals");</script>';
}
$gtotal = 0;
?>
<div class="mx-0 py-5 px-3 mx-ns-4 bg-gradient-dark">
	<h3><b>Detalles de alquiler</b></h3>
</div>
<div class="row justify-content-center" style="margin-top:-2em;">
	<div class="col-lg-11 col-md-11 col-sm-12 col-xs-12">
		<div class="card rounded-0 shadow">
			<div class="card-body">
				<div class="container-fluid">
					<div class="text-right">
						<span><small class="text-muted mr-2"><em>Status</em></small></span>
						<?php $status = isset($status) ? $status : ''; ?>
						<?php 
							switch($status){
								case 0:
									echo '<span class="badge badge-light bg-gradient-light py-1 border rounded-pill px-3"><i class="fa fa-circle text-secondary"></i> En Proceso</span>';
									break;
								case 1:
									echo '<span class="badge badge-light bg-gradient-light py-1 border rounded-pill px-3"><i class="fa fa-circle text-success"></i> Finalizado</span>';
									break;
							}
						?>
					</div>
					<div class="clear-fix mt-2"></div>
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-12 col-sm-12">
							<label for="control-label">Nombre de Cliente</label>
							<div class="pl-4"><?= isset($client_name) ? $client_name : '' ?></div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12 col-sm-12">
							<label for="control-label"># Contacto</label>
							<div class="pl-4"><?= isset($contact) ? $contact : '' ?></div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-12 col-sm-12">
							<label for="control-label">Canchas</label>
							<div class="pl-4"><?= isset($court) ? $court : '' ?></div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12 col-sm-12">
							<label for="control-label">Precio de Cancha</label>
							<div class="pl-4"><?= isset($court_price) ? format_num($court_price) : '' ?></div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-12 col-sm-12">
							<label for="control-label">Fecha/Hora Inicio</label>
							<div class="pl-4"><?= isset($datetime_start) ? date("M d, Y h:i A", strtotime($datetime_start)) : '' ?></div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12 col-sm-12">
							<label for="control-label">Duracion de alquiler</label>
							<div class="pl-4"><?= isset($hours) ? format_num($hours)." Hr/s." : '' ?></div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-12 col-sm-12">
							<label for="control-label">Fecha/Hora Final</label>
							<div class="pl-4"><?= isset($datetime_end) ? date("M d, Y h:i A", strtotime($datetime_end)) : '' ?></div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12 col-sm-12">
							<label for="control-label">Total Tarifa de Cancha</label>
							<div class="pl-4"><?= isset($total) ? format_num($total) : '' ?></div>
							<?php $gtotal += (isset($total) ? ($total) : 0) ?>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<fieldset>
								<legend>Productos</legend>
								<table class="table table-bordered">
									<colgroup>
										<col width="20%">
										<col width="40%">
										<col width="20%">
										<col width="20%">
									</colgroup>
									<thead>
										<tr class="bg-gradient-dark">
											<th class="p-1 text-center">Cantidad</th>
											<th class="p-1 text-center">Productos</th>
											<th class="p-1 text-center">Precio</th>
											<th class="p-1 text-center">Total</th>
										</tr>
									</thead>
									<tbody>
										<?php 
										$total = 0; 
										if(isset($id)):
											$sales = $conn->query("SELECT s.*, p.name as product FROM `sales_transaction_items` s inner join `product_list` p on s.product_id = p.id where s.sales_transaction_id in (SELECT id FROM `sales_transaction` where court_rental_id = '{$id}')");
											while($row = $sales->fetch_assoc()):
												$total += $row['quantity'] * $row['price'];
										?>
										<tr>
											<td class="p-1 align-middle text-center"><?= format_num($row['quantity']) ?></td>
											<td class="p-1 align-middle"><?=$row['product'] ?></td>
											<td class="p-1 align-middle text-right"><?= format_num($row['price']) ?></td>
											<td class="p-1 align-middle text-right"><?= format_num($row['price'] * $row['quantity']) ?></td>
										</tr>
										<?php endwhile; ?>
										<?php endif; ?>
									</tbody>
									<tfoot>
										<tr class="bg-gradient-secondary">
											<th class="p-1 text-center align-middle" colspan="3">Total</th>
											<th class="p-1 text-right align-middle"><?= format_num($total,2) ?></th>
											<?php $gtotal += (isset($total) ? ($total) : 0) ?>
										</tr>
									</tfoot>
								</table>
							</fieldset>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<fieldset>
								<?php 
								if(isset($id)):
									$sqry = $conn->query("SELECT * from `service_transaction` where court_rental_id = '{$id}'");
									if($sqry->num_rows > 0){
										$res  = $sqry->fetch_assoc();
										$sid = $res['id'];
									}
								endif;
								?>
								<legend>Services 
									<?php if(isset($sid)): ?>
										<a href="./?page=service_transactions/view_details&id=<?= $sid ?> p-1" class="text-muted text-decoration-none ml-3" target="_blank" style="font-size:.7em !important"><i class="fa fa-external-link-alt"></i></a>
									<?php endif; ?>
								</legend>
								<table class="table table-bordered">
									<colgroup>
										<col width="20%">
										<col width="40%">
										<col width="20%">
										<col width="20%">
									</colgroup>
									<thead>
										<tr class="bg-gradient-dark">
											<th class="p-1 text-center">Cantidad</th>
											<th class="p-1 text-center">Servicio</th>
											<th class="p-1 text-center">Precio</th>
											<th class="p-1 text-center">Total</th>
										</tr>
									</thead>
									<tbody>
										<?php 
										$total = 0; 
										if(isset($id)):
											$services = $conn->query("SELECT st.*, s.name as `service` FROM `service_transaction_items` st inner join `service_list` s on st.service_id = s.id where st.service_transaction_id in (SELECT id FROM `service_transaction` where court_rental_id = '{$id}')");
											while($row = $services->fetch_assoc()):
												$total += $row['quantity'] * $row['price'];
										?>
										<tr>
											<td class="p-1 align-middle text-center"><?= format_num($row['quantity']) ?></td>
											<td class="p-1 align-middle"><?=$row['service'] ?></td>
											<td class="p-1 align-middle text-right"><?= format_num($row['price']) ?></td>
											<td class="p-1 align-middle text-right"><?= format_num($row['price'] * $row['quantity']) ?></td>
										</tr>
										<?php endwhile; ?>
										<?php endif; ?>
									</tbody>
									<tfoot>
										<tr class="bg-gradient-secondary">
											<th class="p-1 text-center align-middle" colspan="3">Total</th>
											<th class="p-1 text-right align-middle"><?= format_num($total,2) ?></th>
											<?php $gtotal += (isset($total) ? ($total) : 0) ?>
										</tr>
									</tfoot>
								</table>
							</fieldset>
						</div>
					</div>
					<div class="clear-fix mt-1"></div>
					<div class="text-right">
						<h4 class="text-right font-weight-bolder">Grand Total: <?= format_num($gtotal, 2) ?></h4>
					</div>
				</div>
			</div>
			<div class="card-footer py-1 text-center">
				<a class="btn btn-info btn-sm bg-gradient-info rounded-0" href="javascript:void(0)" id="update_status"> Actualizar Estado</a>
				<a class="btn btn-dark btn-sm bg-gradient-dark rounded-0" href="./?page=court_rentals/manage_court_rental&id=<?= isset($id) ? $id : '' ?>"><i class="fa fa-edit"></i> Editar</a>
				<button class="btn btn-danger btn-sm bg-gradient-danger rounded-0" type="button" id="delete-data"><i class="fa fa-trash"></i> Delete</button>
				<a class="btn btn-light btn-sm bg-gradient-light border rounded-0" href="./?page=court_rentals"><i class="fa fa-angle-left"></i> Regresar a la lista</a>
			</div>
		</div>
	</div>
</div>
<script>
	$(document).ready(function(){
		$('#update_status').click(function(){
            uni_modal("<i class='fa fa-edit'></i> Update Status","court_rentals/update_status.php?id=<?= isset($id) ? $id : '' ?>")
        })
        $('#delete-data').click(function(){
			_conf("Are you sure to delete this court_rental permanently?","delete_court_rental",['<?= isset($id) ? $id : '' ?>'])
		})
	})
    function delete_court_rental($id){
		start_loader();
		$.ajax({
			url:_base_url_+"classes/Master.php?f=delete_court_rental",
			method:"POST",
			data:{id: $id},
			dataType:"json",
			error:err=>{
				console.log(err)
				alert_toast("An error occured.",'error');
				end_loader();
			},
			success:function(resp){
				if(typeof resp== 'object' && resp.status == 'success'){
					location.replace("./?page=court_rentals");
				}else{
					alert_toast("An error occured.",'error');
					end_loader();
				}
			}
		})
	}
</script>