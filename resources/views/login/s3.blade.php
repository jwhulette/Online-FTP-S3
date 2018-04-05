@include('helpers/input', [
    'id'    => 'key',
    'label' => 'S3 Key',
    'type'  => 'text',
    'value' => env('AWS_KEY')
])
@include('helpers/input', [
    'id'    => 'secret',
    'label' => 'S3 Secret',
    'type'  => 'text',
    'value' => env('AWS_SECRET')
])
@include('helpers/input', [
    'id'    => 'region',
    'label' => 'S3 Region',
    'type'  => 'text',
    'value' => 'us-east-1'
])
@include('helpers/input', [
    'id'    => 'bucket',
    'label' => 'S3 Bucket name',
    'type'  => 'string',
    'value' => env('AWS_BUCKET')
])
<div class="form-group">

    <button type="submit" class="btn btn-primary btn-login">Login</button>
</div>
