<form action="{{route('denuncia.typeDemand')}}" method="POST">
    @csrf
    <div class="box box-info padding-1">
        <div class="box-body">
            
            <div class="form-group">
                <h3>Tipologia de la conducta a comunicar conforme la L 2/2023</h3>

                <div class="form-check">
                    {{ Form::radio('type', 'acoso', $denuncia->type === 'acoso', ['class' => 'form-check-input' . ($errors->has('intern') ? ' is-invalid' : '')]) }}
                    {{ Form::label('intern_acoso', 'Acoso laboral o sexual', ['class' => 'form-check-label']) }}
                </div>

                <div class="form-check">
                    {{ Form::radio('type', 'industry', $denuncia->type === 'industry', ['class' => 'form-check-input' . ($errors->has('intern') ? ' is-invalid' : '')]) }}
                    {{ Form::label('industry', 'Propiedad Industrial o intelectual', ['class' => 'form-check-label']) }}
                </div>

                <div class="form-check">
                    {{ Form::radio('type', 'competence', $denuncia->type === 'competence', ['class' => 'form-check-input' . ($errors->has('intern') ? ' is-invalid' : '')]) }}
                    {{ Form::label('intern_competence', 'Libre Competencia', ['class' => 'form-check-label']) }}
                </div>

                <div class="form-check">
                    {{ Form::radio('type', 'hacienda', $denuncia->type === 'hacienda', ['class' => 'form-check-input' . ($errors->has('intern') ? ' is-invalid' : '')]) }}
                    {{ Form::label('intern_hacienda', 'Subvenciones,Hacienda Publica o Seguridad Social', ['class' => 'form-check-label']) }}
                </div>

                <div class="form-check">
                    {{ Form::radio('type', 'integrity', $denuncia->type === 'integrity', ['class' => 'form-check-input' . ($errors->has('intern') ? ' is-invalid' : '')]) }}
                    {{ Form::label('integrity', 'Integridad Moral o de los Derechos humanos', ['class' => 'form-check-label']) }}
                </div>
                
                <div class="form-check">
                    {{ Form::radio('type', 'bribery', $denuncia->type === 'bribery', ['class' => 'form-check-input' . ($errors->has('intern') ? ' is-invalid' : '')]) }}
                    {{ Form::label('bribery', 'Cohecho', ['class' => 'form-check-label']) }}
                </div>

                <div class="form-check">
                    {{ Form::radio('type', 'influence', $denuncia->type === 'influence', ['class' => 'form-check-input' . ($errors->has('intern') ? ' is-invalid' : '')]) }}
                    {{ Form::label('influence', 'Trafico de Influencias', ['class' => 'form-check-label']) }}
                </div>

                <div class="form-check">
                    {{ Form::radio('type', 'Interests', $denuncia->type === 'Interests', ['class' => 'form-check-input' . ($errors->has('intern') ? ' is-invalid' : '')]) }}
                    {{ Form::label('Interests', 'Conflicto de intereses', ['class' => 'form-check-label']) }}
                </div>

                <div class="form-check">
                    {{ Form::radio('type', 'hazards', $denuncia->type === 'hazards', ['class' => 'form-check-input' . ($errors->has('intern') ? ' is-invalid' : '')]) }}
                    {{ Form::label('hazards', 'Riesgos Laborales', ['class' => 'form-check-label']) }}
                </div>

                <div class="form-check">
                    {{ Form::radio('type', 'Criminal', $denuncia->type === 'criminal', ['class' => 'form-check-input' . ($errors->has('intern') ? ' is-invalid' : '')]) }}
                    {{ Form::label('Criminal', 'otras Infracciones Penales', ['class' => 'form-check-label']) }}
                </div>

                <div class="form-check">
                    {{ Form::radio('type', 'administrative', $denuncia->type === 'administrative', ['class' => 'form-check-input' . ($errors->has('intern') ? ' is-invalid' : '')]) }}
                    {{ Form::label('administrative', 'otras Infracciones Administrativas graves o muy graves', ['class' => 'form-check-label']) }}
                </div>


                {!! $errors->first('intern', '<div class="invalid-feedback">:message</div>') !!}
            </div>

        </div>
        <div class="box-footer mt20">
            <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
        </div>
    </div>
</form>