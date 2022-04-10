@if ($model->is_show == '0')
    <button type="button" class="btn btn-sm btn-success show-this" data-id="{{ $model->id }}"><i class="fas fa-check-circle"></i> Tampilkan</button>
@else
    <button type="button" class="btn btn-sm btn-danger hidden-this" data-id="{{ $model->id }}"><i class="fas fa-times-circle"></i> Jangan tampilkan</button>
@endif