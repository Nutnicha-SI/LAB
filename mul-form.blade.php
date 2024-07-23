@extends('layouts.main')
@section('title', 'Multiplication-Form')
@section('content')
<main>
    <form method="POST" action="{{ route('mul-result') }}">
        @csrf
        <label for="number">Select a number (2-12):</label>
        <select align="center" id="number" name="number" required>
            @for ($i = 2; $i <= 12; $i++)
                <option value="{{ $i }}">{{ $i }}</option>
            @endfor
        </select><br>
        <br></br>
        <button type="submit">Generate Multiplication Table</button>
    </form>
</main>
@endsection