@extends('layouts.app')

@section('content')

<div class="container">

    <div id="main"></div>

    <div class="services">
        <div data-driver="ftp" data-offset="0" class="@if(old('driver') !== 's3') active @endif">FTP</div>
        <div data-driver="s3" data-offset="50" class="@if(old('driver') === 's3') active @endif">S3</div>
    </div>

    <div class="container__inner">

        <form action="/login" method="POST" id="form">

            @if($errors->has('connection'))

            <div class="alert alert-danger text-center">
                {{ $errors->get('connection')[0] }}
            </div>

            @endif

            <div class="forms" @if(old( 'driver')==='s3' ) style="transform: translateX(-308px)" @endif>

                <div class="ftp">
                    @include('login/ftp')
                </div>
                
                <div class="s3">
                    @include('login/s3')
                </div>
            </div>

            <input type="hidden" id="driver" value="{{ old('driver') ?? 'ftp' }}" name="driver">
        </form>

    </div>

</div>
@endsection

@push('js')
    <script>
        [].forEach.call(document.querySelectorAll('[data-offset]'), function (el) {
            el.addEventListener('click', function () {
                document.getElementsByClassName('forms')[0].style.transform = 'translateX(-' + this.dataset
                    .offset + '%)';

                [].forEach.call(document.getElementsByClassName('active'), function (el) {
                    el.classList.remove('active');
                });

                document.getElementById('driver').value = this.dataset.driver;

                this.classList.add('active');
            });
        });
    </script>
@endpush