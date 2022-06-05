<div class="col-6">
    {{ $title }}
</div>
@if( isset($idr))
<div class="col-6 text-right" style="color: #c4c4c4">
    @currency( $value )
</div>
@else
<div class="col-6 text-right" style="color: #c4c4c4">
    {{ $value }}
</div>
@endif