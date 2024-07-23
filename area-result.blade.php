@extends('layouts.main')

@section('title','Area Result')
@section('content')
<main>
    <dl>
        <dt>Type ::
        {{ $option }}</dt> <br>
    
        <dt>Width ::
        {{number_format((float) $width,2 )}}</dt><br>

        <dt>Height :: 
        {{ number_format((float) $height,2 )}}</dt><br>

        <dt>Area ::
        {{ number_format((float) $area,2 )}} </dt><br>
        <button class="back-button" onclick="window.location.href='/area-form'">Back</button>
        
    </dl>
</form>
</main>
@endsection