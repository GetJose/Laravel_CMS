@extends('adminlte::page')
@section('plugins.Chartjs', true)
@section('title', 'Painel')
@section('content_header')
<div class="row">
    <div class="col-md-6">
        <h1>Dashboard </h1>
    </div>
    <div class="col-md-6">
        <form action="" method="get">
            <select onchange="this.form.submit()" name="interval" id="" class="float-md-right">
                <option {{$dateInterval == 30? 'selected = "selected"':''}} value="30">Ultimos 30 dias</option>
                <option {{$dateInterval == 60? 'selected = "selected"':''}} value="60">Ultimos 2 meses</option>
                <option {{$dateInterval == 90? 'selected = "selected"':''}} value="90">Ultimos 3 meses</option>
                <option {{$dateInterval == 120? 'selected = "selected"':''}}value="120">Ultimos 4 meses</option>
            </select>
        </form>
     
    </div>
</div>

@endsection

@section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{$visitsCount}}</h3>
                    <p>Visitantes</p>
                </div>
                <div class="icon">
                    <i class="far fa-fw fa-eye"></i>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{$onlineCount}}</h3>
                    <p>Usuarios Online</p>
                </div>
                <div class="icon">
                    <i class="far fa-fw fa-heart"></i>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{$pageCount}}</h3>
                    <p>Paginas Criadas</p>
                </div>
                <div class="icon">
                    <i class="far fa-fw fa-sticky-note"></i>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{$userCount}}</h3>
                    <p>usuarios</p>
                </div>
                <div class="icon">
                    <i class="far fa-fw fa-user"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Paginas mais visitadas</h3>
                </div>
                <div class="card-body"><canvas id="pagePie"></canvas></div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Sobre o Sistema</h3>
                </div>
                <div class="card-body">. . .</div>
            </div>
        </div>
    </div>
    <script>
        window.onload = function(){
            let ctx = document.getElementById('pagePie').getContext('2d');
            window.pagePie = new Chart(ctx,{
                type:'pie',
                data:{
                    datasets:[{
                        data:{{$pageValues}},
                        backgroundColor:'#00FF00'
                    }],
                    labels:{!! $pageLabels!!}
                },
                options:{
                    responsive:true,
                    legende:{
                        display:false
                    }
                }
            })
        }
    </script>
@endsection