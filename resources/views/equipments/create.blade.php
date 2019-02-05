@extends('layouts.app')

@section('title', 'Create equipment')
@section('content')
<div class="row clearfix">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="header">
				<h2>{{trans('front.equipments.create')}}</h2>
			</div>

			<div class="body">
				<form class="form-horizontal" method="POST" action="{{ route('equipments.store') }}" enctype="multipart/form-data">
					{{ csrf_field() }}
					<div class="form-group{{ $errors->has('error') ? ' has-error' : '' }}">
						@if($errors->has('error'))
							<span class="help-block text-center">
								<strong>{{$errors->first()}}</strong>
							</span>
						@endif
					<div>

					<div class="form-group{{ $errors->has('identification') ? ' has-error' : '' }}">
						<label for="identification" class="col-md-4 control-label">{{trans('front.equipments.identification')}}</label>
						<div class="col-md-6">
							<div class="form-line">
								<input id="identification" type="text" class="form-control" name="identification" value="{{ old('identification') }}" autofocus>
							</div>
							@if ($errors->has('identification'))
								<span class="help-block">
									<strong>{{ $errors->first('identification') }}</strong>
								</span>
							@endif
						</div>
					</div>

					<div class="form-group{{ $errors->has('serial_number') ? ' has-error' : '' }}">
						<label for="serial_number" class="col-md-4 control-label">{{trans('front.equipments.serial_number')}}</label>
						<div class="col-md-6">
							<div class="form-line">
								<input id="serial_number" type="text" class="form-control" name="serial_number" value="{{ old('serial_number') }}">
							</div>
							@if ($errors->has('serial_number'))
								<span class="help-block">
									<strong>{{ $errors->first('serial_number') }}</strong>
								</span>
							@endif
						</div>
					</div>

					<div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
						<label for="description" class="col-md-4 control-label">{{trans('front.equipments.description')}}</label>
						<div class="col-md-6">
							<div class="form-line">
								<input id="description" type="text" class="form-control" name="description" value="{{ old('description') }}">
							</div>
							@if ($errors->has('description'))
								<span class="help-block">
									<strong>{{ $errors->first('description') }}</strong>
								</span>
							@endif
						</div>
					</div>

                    <div class="form-group{{ $errors->has('position') ? ' has-error' : '' }}">
						<label for="position" class="col-md-4 control-label">{{trans('front.equipments.position')}}</label>
						<div class="col-md-6">
							<div class="form-line">
								<input id="position" type="text" class="form-control" name="position" value="{{ old('position') }}">
							</div>
							@if ($errors->has('position'))
								<span class="help-block">
									<strong>{{ $errors->first('position') }}</strong>
								</span>
							@endif
						</div>
					</div>

                    <div class="form-group{{ $errors->has('preventive') ? ' has-error' : '' }}">
						<label for="preventive" class="col-md-4 control-label">{{trans('front.equipments.preventive')}}</label>
						<div class="col-md-6">
							<div class="form-line">
								<input id="preventive" type="number" class="form-control" name="preventive" value="{{ old('preventive') }}">
							</div>
							@if ($errors->has('preventive'))
								<span class="help-block">
									<strong>{{ $errors->first('preventive') }}</strong>
								</span>
							@endif
						</div>
					</div>

                    <div class="form-group{{ $errors->has('predictive') ? ' has-error' : '' }}">
						<label for="predictive" class="col-md-4 control-label">{{trans('front.equipments.predictive')}}</label>
						<div class="col-md-6">
							<div class="form-line">
								<input id="predictive" type="number" class="form-control" name="predictive" value="{{ old('predictive') }}">
							</div>
							@if ($errors->has('predictive'))
								<span class="help-block">
									<strong>{{ $errors->first('predictive') }}</strong>
								</span>
							@endif
						</div>
					</div>

                    <div class="form-group{{ $errors->has('active') ? ' has-error' : '' }}">
						<label for="active" class="col-md-4 control-label">{{trans('front.equipments.active')}}</label>
						<div class="col-md-6">
                        <div class="custom-control custom-checkbox form-group">
                            <input type="checkbox" class="custom-control-input" id="active" v-bind:true-value=1 v-bind:false-value=0>
                            <label class="custom-control-label" for="active"></label>
                        </div>
							@if ($errors->has('active'))
								<span class="help-block">
									<strong>{{ $errors->first('active') }}</strong>
								</span>
							@endif
						</div>
					</div>

					<div class="form-group">
						<div class="col-md-6 col-md-offset-4">
							<a href="{{ route('equipments.index') }}" type="submit" class="btn btn-info">
								{{trans('front.actions.back')}}
							</a>
							<button type="submit" class="btn btn-primary">
								{{trans('front.actions.register')}}
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
