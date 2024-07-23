@extends('layouts.main')
@section('title', 'Multiplication Result')
@section('content')
<main>

    <div class="table-container">
        @foreach ($multiplicationTable as $table)
        <table class="multiplication-table">
            <tbody>
                @foreach ($table as $row)
                <tr>
                    <td class="result-cell">{{ $row['result'] }}</td>
                </tr>
               
                @endforeach
            </tbody>
        </table>
        @endforeach
    </div>
 <button class="back-button" onclick="window.location.href='/mul-form'">Back</button>
</main>

@endsection

