@extends('layouts.master')

@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
      <hr>
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>{{ $orders }}</h3>

              <p>New Orders</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="{{ url('/admin/order') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>{{ $sales }}<sup style="font-size: 20px">%</sup></h3>

              <p>Sales Increament</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="{{ url('/admin/order') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3>{{ $users }}</h3>

              <p>User Registrations</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="{{ url('/admin/user') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3>{{ $coupons }}</h3>

              <p>Coupons Used</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="{{ url('/admin/coupon') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-7 connectedSortable">
          <!-- Custom tabs (Charts with tabs)-->
          <div class="card">
            <div class="card-header bg-success">
              <h3 class="card-title">
                <i class="fas fa-user-plus"></i>
                Users Registered
              </h3>
            </div><!-- /.card-header -->
            <div class="card-body bg-faded" style="height:300px;">
              <div class="tab-content p-0">
                <!-- Morris chart - Sales -->
                <div class="chart tab-pane active" id="revenue-chart"
                     style="position: relative; height: 250px;">
                    {!! $userChart->container() !!}
                  </div>
              </div>
            </div><!-- /.card-body -->
          </div>
          <!-- /.card -->

          <div class="card">
            <div class="card-header bg-primary">
              <h3 class="card-title">
                <i class="fas fa-shopping-cart"></i>
                Orders
              </h3>
            </div><!-- /.card-header -->
            <div class="card-body" style="height:300px;">
              <div class="tab-content p-0">
                <!-- Morris chart - Sales -->
                <div class="chart tab-pane active" id="revenue-chart"
                     style="position: relative; height: 250px;">
                  {!! $orderChart->container() !!}
                </div>
              </div>
            </div><!-- /.card-body -->
          </div>
          <!-- /.card -->

        </section>
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="col-lg-5 connectedSortable">

          <!-- solid sales graph -->
          <div class="card bg-gradient-info">
            <div class="card-header border-0">
              <h3 class="card-title text-dark">
                <i class="fas fa-th mr-1"></i>
                Sales Graph
              </h3>

            </div>
            <div class="card-body" style="height:300px;">
              {!! $saleChart->container() !!}
            </div>
            <!-- /.card-body -->
            
          </div>
          <!-- /.card -->

          <!-- Map card -->
          <div class="card">
            <div class="card-header border-0 bg-secondary">
              <h3 class="card-title">
                <i class="fas fa-gift mr-1"></i>
                Coupons
              </h3>
            </div>
            <div class="card-body" style="height:300px;">
              {!! $couponChart->container() !!}
            </div>
            <!-- /.card-body-->
          </div>
          <!-- /.card -->
          </div>
          <!-- /.card -->
        </section>
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->

  </section>
  <!-- /.content -->
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
{!! $userChart->script() !!}
{!! $orderChart->script() !!}
{!! $saleChart->script() !!}
{!! $couponChart->script() !!}

@endsection