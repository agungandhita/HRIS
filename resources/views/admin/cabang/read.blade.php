@extends('admin.layouts.main')

@section('container')
    <section>
        @include('admin.dashboard._header')
        <div class="mt-24">
            @include('admin.manajer._detail')
        </div>
    </section>
@endsection
