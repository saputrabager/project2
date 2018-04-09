@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-8">
        <div class="body">
            {!! Form::open([ 'class'=>'form-inline hidden', 'id'=>'fdata']) !!}
            {!! csrf_field() !!}
                <input type="text" name="p_title" value="{{$data['p_title']}}">
                <input type="text" name="p_desc" value="{{$data['p_desc']}}">
                <input type="text" name="location" value="{{$data['location']}}">
                <input type="text" name="address" value="{{$data['address']}}">
                <input type="text" name="room" value="{{$data['room']}}">
                <input type="text" name="bathroom" value="{{$data['bathroom']}}">
                <input type="text" name="kitchen" value="{{$data['kitchen']}}">
                <input type="text" name="garage" value="{{$data['garage']}}">
                <input type="text" name="payment" value="{{$data['payment']}}">
                <input type="text" name="type" value="{{$data['type']}}">
                <input type="text" name="cost" value="{{$data['cost']}}">
                <input type="text" name="user_id" value="{{$data['user_id']}}">
            {!! Form::close()!!}
            <div class="title">{{$data['p_title']}}</div>
            <div class="p-info">
                <span class="info"><i class="fa fa-map-marker" aria-hidden="true"></i> {{$data['location']}}</span> |
                <span class="info"><i class="fa fa-money" aria-hidden="true"></i> 
                    @if ($data['payment']=='monthly')
                        Bulanan
                    @else
                        Tahunan
                    @endif
                </span> |
                <span class="info important">Rp {{ number_format($data['cost']) }}/ {{$data['payment']=='monthly' ? 'Bulan' : 'Tahun'}}</span>
            </div>
            <div class="divider"></div>
            <div class="f_display"></div>
            <div>
                <span class="f_label"> Fasilitas</span><br>
                <div class="f_info">
                    <span><i class="fa fa-bed" aria-hidden="true"></i> Kamar <span class="marig">: {{ $data['room'] }}</span></span>
                    <span><i class="fa fa-bath" aria-hidden="true"></i> WC <span class="marig">: {{ $data['bathroom'] }}</span></span>
                </div>
                <div class="f_info">
                    <span><i class="fa fa-cutlery" aria-hidden="true"></i> Dapur <span class="marig">: {{ $data['kitchen'] }}</span></span>
                    <span><i class="fa fa-car" aria-hidden="true"></i> Garasi <span class="marig">: {{ $data['garage'] }}</span></span>
                </div>
            </div>
            <div class="divider"></div>
            <div>
                <span class="f_label"> Lokasi</span><br>
                <div class="f_info">
                    <span>Alamat : {{ $data['address'] }}</span>
                    <span>Kota &nbsp;&nbsp;&nbsp;&nbsp;: {{ $data['location'] }}</span>
                </div>
            </div>
            <div class="divider"></div>
            <div class="content">{{$data['p_desc']}}</div>
            <div>
                <div class="right">
                    <a id="edit" class="button" onclick="submitSplit()">Edit</a>
                    <a id="send" class="button">Selesai</a>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>

@endsection
