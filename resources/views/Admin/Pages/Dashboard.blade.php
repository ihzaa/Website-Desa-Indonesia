@extends('Admin.Template.all')

@section('page_title','Dashboard')

@section('breadcumb')
<li class="breadcrumb-item">Dashboard</li>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">nah ini dashboard</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                title="Collapse">
                <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fas fa-times"></i></button>
        </div>
    </div>
    <div class="card-body">
        hehe
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
        Footer
    </div>
    <!-- /.card-footer-->
</div>
@endsection
