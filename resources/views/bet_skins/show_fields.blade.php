<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', __('models/betSkins.fields.id').':') !!}
    <p>{{ $betSkin->id }}</p>
</div>

<!-- Bet Id Field -->
<div class="form-group">
    {!! Form::label('bet_id', __('models/betSkins.fields.bet_id').':') !!}
    <p>{{ $betSkin->bet_id }}</p>
</div>

<!-- Enabled Field -->
<div class="form-group">
    {!! Form::label('enabled', __('models/betSkins.fields.enabled').':') !!}
    <p>{{ $betSkin->enabled }}</p>
</div>

<!-- Bet Field -->
<div class="form-group">
    {!! Form::label('bet', __('models/betSkins.fields.bet').':') !!}
    <p>{{ $betSkin->bet }}</p>
</div>

<!-- Ventaja Field -->
<div class="form-group">
    {!! Form::label('ventaja', __('models/betSkins.fields.ventaja').':') !!}
    <p>{{ $betSkin->ventaja }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('models/betSkins.fields.created_at').':') !!}
    <p>{{ $betSkin->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('models/betSkins.fields.updated_at').':') !!}
    <p>{{ $betSkin->updated_at }}</p>
</div>

