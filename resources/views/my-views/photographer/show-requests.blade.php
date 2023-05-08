@extends('layouts.my-layouts.main-layout')

@section('title')
    Mis solicitudes
@endsection

@section('content')
    @livewire('photographer.show-requests', ['quantity_requests' => $quantity_requests])
@endsection
