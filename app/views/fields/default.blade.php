
<div class="form-group">
	{{ Form::label($name, $label) }}
	{{ $control }}
	@if ($error)

	<p class="text-danger">{{ $error }}</p>

	@endif
</div>