@extends('layouts.app')

@section('content')
    <form method="post" action="{{route('briefs.update', $brief->id)}}">
        {{csrf_field()}}
        @method('PUT')
        <input type='text' value="{{ $brief->name }}" name='name' placeholder='nom'>
        <input type='text' value="{{ $brief->lastname }}"name='lastname' placeholder='prénoms'>
        <input type='date' value="{{ $brief->date }}" name='date' placeholder='Date de naissance'>
        <button type="submit">Enregistrer</button>
    </form>
@endsection