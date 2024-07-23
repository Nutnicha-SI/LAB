@extends('layouts.main')

@section('title','Area Form')
@section('content')
<main>
    <form action="{{ route('area-result') }}" method="POST">
        @csrf
        Type: 
        <input type="radio" id="Rectangular" name="option" value="Rectangular" required>
        <label for="Rectangular">Rectangular</label>
        
        <input type="radio" id="Triangle" name="option" value="Triangle" required>
        <label for="Triangle">Triangle</label><br><br>
        
        <label for="width">Width:</label>
        <input type="number" id="width" name="width" required>
        
        <label for="height">Height:</label>
        <input type="number" id="height" name="height" required>
        
        <br><br>
        <button type="submit">Calculate</button>
    </form>
</main>
@endsection
