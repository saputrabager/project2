@extends('layouts.master')

@section('content')
<div class="container">
    
    <div class="row">
        <div class="col-md-12">
            <div class="searchpanel">
                <form method="POST" action="{{ route('result') }}">
                    {{ csrf_field() }}
                    <input class="form-search" type="text" name="req-city" placeholder="Pilih kota ...">
                    <input class="form-search" type="text" name="req-type" placeholder="Pilih type ...">
                    <select class="form-search" id="sel1" name="req-pay" style="height: 26px">
                        <option value="none">Pilih cara bayar ...</option>
                        <option value="month">Bulanan</option>
                        <option value="year">Tahunan</option>
                    </select>
                    <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Cari</button>
                </form>
            </div>
        </div>
        <!-- <div class="col-md-2">
            <div class="user-info">
                <img src="">
            </div>
        </div> -->
        <div class="col-md-9">
            <table id="table_id" class="display" border="1">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>NO ASSETS</th>
                        <th>DESCRIPTION</th>
                        <th>MIC</th>
                        <th>CATEGORY</th>
                        <th>PARENT</th>
                        <th>LOCATION</th>
                        <th>CONDITION</th>
                        <th>FIGURE</th>
                    </tr>
                </thead>
            </table>
        @foreach ($val as $data)
            <div class="buble">
                <div class="buble-header">{{$data['p_title']}}</div>
                <div class="buble-body">
                    {{$data['p_desc']}}
                </div>
                <div class="buble-info">
                    <span class="info"><i class="fa fa-bed" aria-hidden="true"></i><span> : {{ $data['room'] }}</span></span>
                    <span class="info"><i class="fa fa-bath" aria-hidden="true"></i><span> : {{ $data['bathroom'] }}</span></span>
                    <span class="info"><i class="fa fa-cutlery" aria-hidden="true"></i><span> : {{ $data['kitchen'] }}</span></span>
                    <span class="info"><i class="fa fa-car" aria-hidden="true"></i><span> : {{ $data['garage'] }}</span></span>
                </div>
            </div>
            @endforeach
        </div>
        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    You are logged in!
                </div>
            </div>
        </div>
    </div>

    <div class="newpost">
        <a href="{{ route('newpost') }}" title="create new post"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span></a>
    </div>
</div>

<script type="text/javascript">
    $(document).ready( function () {
        // alert('khe');
        $('#table_id').DataTable();
        // ajax();
    } );
</script>
@endsection
