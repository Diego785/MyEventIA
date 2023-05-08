@extends('layouts.my-layouts.main-layout')

@section('title')
    El evento
@endsection

@section('content')
    @livewire('photographer.event-selected', ['event' => $event])
@endsection
