@extends('layouts.my-layouts.my_empty_layout')

@section('title')
    Registro del Fotógrafo
@endsection

@section('content')
    @livewire('system.registering-data', ['amount'=>$amounted])
@endsection
