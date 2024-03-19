<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('intern') }}
            {{ Form::text('intern', $denuncia->intern, ['class' => 'form-control' . ($errors->has('intern') ? ' is-invalid' : ''), 'placeholder' => 'Intern']) }}
            {!! $errors->first('intern', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('estado') }}
            {{ Form::select('estado', $status->pluck('name', 'id'), $denuncia->estado, ['class' => 'form-control' . ($errors->has('estado') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona un estado']) }}
            {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('observaciones') }}
            {{ Form::text('observaciones', $denuncia->observaciones, ['class' => 'form-control' . ($errors->has('observaciones') ? ' is-invalid' : ''), 'placeholder' => 'Observaciones']) }}
            {!! $errors->first('observaciones', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('type') }}
            {{ Form::text('type', $denuncia->type, ['class' => 'form-control' . ($errors->has('type') ? ' is-invalid' : ''), 'placeholder' => 'Type']) }}
            {!! $errors->first('type', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('descripcio') }}
            {{ Form::text('descripcio', $denuncia->descripcio, ['class' => 'form-control' . ($errors->has('descripcio') ? ' is-invalid' : ''), 'placeholder' => 'Descripcio']) }}
            {!! $errors->first('descripcio', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('testigos') }}
            {{ Form::text('testigos', $denuncia->testigos, ['class' => 'form-control' . ($errors->has('testigos') ? ' is-invalid' : ''), 'placeholder' => 'Testigos']) }}
            {!! $errors->first('testigos', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('updated') }}
            {{ Form::hidden('updated', now()->toDateString(), ['class' => 'form-control' . ($errors->has('updated') ? ' is-invalid' : ''), 'placeholder' => 'Updated']) }}
            {!! $errors->first('updated', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>