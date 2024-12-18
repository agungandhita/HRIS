@extends('admin.layouts.main')

@section('container')
<section>
    @include('admin.dashboard._header')
        <div class="mt-24">
            @include('admin.stock._breadcum')
        </div>
</section>
@endsection
