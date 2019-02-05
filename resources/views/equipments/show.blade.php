@extends('layouts.app')
@section('title', 'Show equipment')

@section('content')
<div class="row clreafix">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="header">
				<h2> {{ $equipment->identification }} </h2>
			</div>

			<div class="body">
				<form class="form-horizontal">
					<div class="form-group{{ $errors->has('identification') ? ' has-error' : '' }}">
						<label for="identification" class="col-md-4 control-label">{{trans('front.equipments.identification')}}</label>
						<div class="col-md-6">
							<div class="form-line">
								<input readonly id="identification" type="text" class="form-control" name="identification" value="{{ $equipment['identification'] }}" autofocus>
							</div>
							@if ($errors->has('identification'))
								<span class="help-block">
									<strong>{{ $errors->first('identification') }}</strong>
								</span>
							@endif
						</div>
					</div>
					<div class="form-group{{ $errors->has('position') ? ' has-error' : '' }}">
						<label for="position" class="col-md-4 control-label">{{trans('front.equipments.position')}}</label>
						<div class="col-md-6">
							<div class="form-line">
								<input  readonly id="position" type="text" class="form-control" name="position" value="{{ $equipment['position'] }}">
							</div>
							@if ($errors->has('position'))
								<span class="help-block">
									<strong>{{ $errors->first('position') }}</strong>
								</span>
							@endif
						</div>
					</div>
                    <div class="form-group{{ $errors->has('active') ? ' has-error' : '' }}">
						<label for="active" class="col-md-4 control-label">{{trans('front.equipments.active')}}</label>
						<div class="col-md-6">
							<div class="form-line">
								<input  readonly id="active" type="text" class="form-control" name="active" value="{{ $equipment['active'] }}">
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
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
