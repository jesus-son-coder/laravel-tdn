@extends('layouts/master', ['title' => 'Home'])

@section('content')
<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title m-b-md">
            Bonjour {{ $name  }} !
        </div>
    </div>
</div>
@endsection

@section('footer')
    <div class="text-center col-xs-12"
         style="text-align: center;width:100%;color:black;font-weight: 700 !important;
            padding-bottom: 20px;">
        Company Corp - copyright 2019
    </div>
@stop

@push('scripts.footer')
    <script src="https;//code.jquery.com/jquery.min.js"></script>
@endpush

