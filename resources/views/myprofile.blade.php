@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-6 border">
                <div class="row justify-content-center">
                    @livewire('my-profile-component')
                </div>
            </div>
            <div class="col-lg-6 border">
                <div class="row justify-content-center">
                    @livewire('my-training-times-component')
                </div>
            </div>
        </div>
    </div>
@endsection
