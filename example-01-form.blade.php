<!-- File: resources/views/example-01-form.blade.php -->
<!-- File: resources/views/example-01-result.blade.php -->
@extends('layouts.main')

@section('title','Example 01 Form')
@section('content')
<main>
    <form action="{{ route('example-01-result') }}" method="POST">
        @csrf
        <label for="price">Price:</label>
        <input type="number" id="price" name="price" required step="0.25">

        <br><br>

        <label for="discount">Discount (%):</label>
        <input type="number" id="discount" name="discount" required step="0.01" min="0" max="100">
        
        <br><br>
        <button type="submit">Calculate</button>
    </form>
</main>
@endsection
