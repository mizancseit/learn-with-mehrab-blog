@extends('backends.layouts.master_layout')
@section('title',"Display Slider")
@section('page_heading','Sliders')
@section('content')
    <div class="container-fluid">
        @include('backends.includes.notification')

        <div class="card" style="margin-bottom: 15px">
            <div class="card-body">
                <form action="#" method="get">
                    <div class="row">
                        <div class="col-3">
                            <input type="text" class="form-control form-control-sm" placeholder="Search" name="search" value="{{$search}}">
                        </div>

                        <div class="col-2">
                            <button type="submit" class="btn btn-primary btn-sm" style="padding: 9px 15px"><i class="fa-solid fa-filter"></i> Filter</button>
                        </div>

                        <div class="col-4 offset-3" style="text-align: right">
                            <a  href="#" class="btn btn-outline-primary" style="padding: 0.5rem 1rem;"><i class="fa-solid fa-plus"></i> Add</a>
                            <ul class="nav nav-tabs dzm-tabs" id="myTab-4" role="tablist" style="width: 180px;float: right;margin-left: 10px;padding: 0px !important;">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="home-tab-4" data-bs-toggle="tab" data-bs-target="#VerticalVariation" type="button" role="tab" aria-selected="true"><i class="fa-solid fa-file-excel"></i> Excel</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link " id="profile-tab-4" data-bs-toggle="tab" data-bs-target="#VerticalVariation-html" type="button" role="tab" aria-selected="false" tabindex="-1"><i class="fa-solid fa-file-pdf"></i> PDF</button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </form>
            </div>
        </div>


        <div class="card">
            <div class="card-body">



                <div class="table-responsive">
                    <table class="table header-border table-responsive-sm">
                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>Title</th>
                            <th>Sub Title</th>
                            <th>Image</th>
                            <th>Is Active</th>
                            <th>Order By</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($sliders as $k => $slider)
                            <tr>
                                <td>{{$k+1}}</td>
                                <td>{{$slider->title}}</td>
                                <td>{{$slider->sub_title}}</td>
                                <td>{{$slider->mobile}}</td>
                                <td>
                                    @if($slider->is_active == 0)
                                        <span class="badge badge-sm light badge-danger">Disabled</span>
                                    @else
                                        <span class="badge badge-sm light badge-primary">Enabled</span>
                                    @endif
                                </td>
                                <td>{{$slider->sort_by}}</td>
                                <td>
                                    <a href=""><span class="badge badge-info"><i class="fa-solid fa-pen-to-square"></i></span></a>
                                    <button type="button" class="badge badge-danger" data-bs-toggle="modal" data-bs-target="#destroyModal" data-id="{{$slider->id}}" data-action=""><i class="fa-solid fa-trash"></i></button>
                                </td>
                            </tr>
                        @endforeach


                        </tbody>
                    </table>

                    {{$sliders->links()}}

                </div>
            </div>
        </div>
    </div>

    @include('.backends.includes.delete-modal')

@endsection
