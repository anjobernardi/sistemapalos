@extends('layouts.app')
@section('title', 'Equipments')

@section('content')


<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header title">
			</div>
			<div class="modal-body">
			{{trans('front.actions.delete_warning')}}
			</div>
			<div class="modal-footer">
				<form id="delete-form" method="POST">
				<button type="button" class="btn btn-default" data-dismiss="modal">{{trans('front.actions.cancel')}}</button>
				{{ method_field('DELETE')}} {{csrf_field()}}
				<button type="submit" id="delete-btn" class="btn btn-danger">{{trans('front.actions.cancel_ok')}}</button>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="row clearfix">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="header">
				<h2>
				{{trans('front.equipments.equipments')}}
				</h2>
			</div>

			<div class="body">
				@if (session('success'))
					<div class="alert alert-success" role="alert">
						{{ session('success') }}
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				@endif
				<div class="text-left">
					<a href="{{ route('equipments.create') }}" type="submit" class="btn btn-primary">
					{{trans('front.equipments.new')}}
					</a>
				</div>

				<hr>
				<table class="table table table-striped table-bordered" style="width:100%" id="equipments-dt">
					<thead>
						<tr>
							<th>{{trans('front.equipments.identification')}}</th>
							<th>{{trans('front.equipments.position')}}</th>
							<th>{{trans('front.equipments.active')}}</th>
							<th>{{trans('front.equipments.actions')}}</th>
						</tr>
					</thead>
					<tbody>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection

@section('scripts')
<script>

	$('#confirm-delete').on('show.bs.modal', function(e) {
		var data = $(e.relatedTarget).data();
		var route = "/equipments/"+data.recordId;

		$('.title', this).text('Confirm delete ' + data.recordTitle);
		$('#delete-form').attr('action', route);
	});

	/**
	 * Equipments DataTable
	 */
	$('#equipments-dt').DataTable({
		ajax : '/equipments?ws=getEquipments',
		columns : [
			{data: 'identification', name: 'identification'},
			{data: 'position', name: 'position'},
			{data: 'active', name: 'active'},
			{data: 'actions', render : function (data, type, row) {
				return ' <a type="submit" href="/equipments/'+row.id+'" class="btn btn-sm btn-success"> {{trans('front.actions.show')}} </a> <a type="submit" href="/equipments/'+row.id+'/edit" class="btn btn-sm btn-primary"> {{trans('front.actions.edit')}} </a> <a type="submit" href="#" class="btn btn-sm btn-danger" data-record-id="'+row.id+'" data-record-title="'+row.identification+'" data-toggle="modal" data-target="#confirm-delete"> {{trans('front.actions.delete')}} </a>'
			}},
		],
		lengthChange : true,
	});
</script>
@stop