<?php
$a = \App\Helpers\ApiServiceHelper::getInstance();


?>
@extends('frontoffice/layout/master-iframe')

@section('content-center')
<br/>

<ol>
    @foreach( $files as $i => $f)
    <li>
        <a href="{{ $folder .'/'. $a->base64urlEncode($f['name']) }}">{{ $f['name'] }}</a>
        ({{ $f['size'] }})
    </li>
    @endforeach
</ol>
@endsection
