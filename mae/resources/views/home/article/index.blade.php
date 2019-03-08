@extends('home.index.content')
@section('content')
@section('menu')
<script type="text/javascript" src="/o/js/n_nav.js"></script>
<script type="text/javascript" src="\d\lib\jquery\1.9.1\jquery.js"></script>
@endsection
@section('none')
<div class="leftNav none">
@endsection
<style type="text/css">
	
	.product-item {
    display: block;
    float: left;
    width: 564px;
    margin: 72px 36px 140px;
    text-decoration: none;
    position: relative;
    outline: none;
}
a {
    color: #737373;
    text-decoration: none;
}
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
.product-item-info__hd {
    border-left: 4px solid #777777;
    overflow: hidden;
}
.product-info-left {
    float: left;
    box-sizing: border-box;
    width: -webkit-calc(100% - 48px);
    width: calc(100% - 48px);
    height: 48px;
    overflow: hidden;
    padding-left: 12px;
    padding-top: 4px;
}
.product-info-right {
    float: right;
    box-sizing: border-box;
    width: 48px;
    height: 48px;
    overflow: hidden;
    background-color: #232323;
    color: #fff;
    text-align: center;
    padding: 4px 0;
    font-size: 0;
}
.product-item-pic img {
    width: 100%;
    vertical-align: bottom;
    border: none;
}
.product-info-price {
    font-size: 20px;
    line-height: 26px;
}
.product-item-info__desc {
    font-size: 13px;
    color: #777777;
    margin-top: 4px;
    padding: 2px 0;
}
.product-item-info {
    position: absolute;
    top: 720px;
    margin-bottom: 30px;
    top: calc(100% - 32px);
    left: 50%;
    margin-left: -230px;
    box-sizing: border-box;
    width: 460px;
    padding: 32px;
    color: #232323;
    background-color:#EAEAEA;
}
.product-info-right > p {
    font-size: 12px;
    line-height: 16px;
    letter-spacing: 2px;
}
</style>

@foreach($works as $k=>$v)
<div  style="float:left;margin-left:10%;margin-top: 10px;margin-bottom: 40px">
	<a class="product-item" href="/home/article/show/{{ $v->gid }}" target="_blank">
	    <div class="product-item-pic" style="border:1px solid #EDEDF0"><img src="{{asset('/uploads/works/'.$v->wpic)}}"></div>
	    <div class="product-item-info">
	        <div class="product-item-info__hd" >
	            <div class="product-info-left">
	                <p class="product-info-name">{{ $v->wuname }}</p>
	                <p class="product-info-tag" >{{  $v->wtitle }}</p>
	            </div>
	            <div class="product-info-right">
	                <p>RMB</p>


	                <div class="product-info-price" data-id="9012322">{{ $v->price}}</div>

 
	            </div>
	        </div>
	        <div class="product-item-info__desc" style="background-color:#EAEAEA">{!! $v->wcontent !!}</div>
	    </div>
	</a> 
</div> 
@endforeach
@endsection