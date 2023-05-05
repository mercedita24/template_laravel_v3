@extends('layouts.admin.index')

@section('title')
    {{ $title = 'Dashboard' }}
@endsection

@section('content')
<div class="container">

    <div class="row">

        <div class="col-xxl-6 col-md-6">
            <div class="card info-card sales-card">
                <div class="card-body">
                    <h5 class="card-title">CARD DE EJEMPLO 1</h5>
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <div class="text-center" style="height: 50px; width: 50px; border-radius: 50%; background: #fdb721;">
                                <i class="fa fa-building" style="color: white; font-size: 25px; margin-top: 12px;"></i>
                            </div>
                            <div class="px-3 mt-1">
                                <h3 data-purecounter-start="0" data-purecounter-end="1000" data-purecounter-duration="1" class="purecounter"></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xxl-6 col-md-6">
            <div class="card info-card sales-card">
                <div class="card-body">
                    <h5 class="card-title">CARD DE EJEMPLO 2</h5>
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <div class="text-center" style="height: 50px; width: 50px; border-radius: 50%; background: #21d1fd;">
                                <i class="fa fa-users" style="color: white; font-size: 25px; margin-top: 12px;"></i>
                            </div>
                            <div class="px-3 mt-1">
                                <h3 data-purecounter-start="0" data-purecounter-end="2000" data-purecounter-duration="1" class="purecounter"></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection
