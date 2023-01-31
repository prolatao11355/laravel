<?php
$check=false;
if(isset($items[$id])===true){
    $check=true;
}
?>
@extends('layouts.practice7_layout')
@section('title',$title)
@section('content')
@if ($check===true)
<dl>
    <dt>商品名</dt>
    <dd>{{$items[$id]['name']}}</dd>
    <dt>価格</dt>
    <dd>{{$items[$id]['price']}}</dd>
</dl>
@else
該当の商品は存在しません。
@endif

@endsection