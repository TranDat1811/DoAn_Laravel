@extends('frontend.layouts.master')

@section('title')
    
@endsection


@section('custom-css')
    
@endsection

@section('main-content')
<div class="container" style="height: 1000px;margin-top: 100px;">
        <ul>
        @foreach($ds_xx as $xx)
            <li>
                <a href="">{{$xx->xx_ten}}</a>
            </li>
        @endforeach
        
        </ul>
</div>
@endsection
