@extends('backends.layouts.master_layout')
@section('title','Clients')
@section('page_heading','Clients')

@section('content')
 <div class="container-fluid">
     @include('backends.includes.notification')

     <div class="card" style="margin-bottom: 15px">
         <div class="card-body">
             <form action="{{route('clients.index')}}" method="get">
                 <div class="row">
                     <div class="col-3">
                         <input type="text" class="form-control form-control-sm" placeholder="Search" name="search" value="{{$search}}">
                     </div>

                     <div class="col-2">
                         <button type="submit" class="btn btn-primary btn-sm" style="padding: 9px 15px"><i class="fa-solid fa-filter"></i> Filter</button>
                     </div>

                     <div class="col-4 offset-3" style="text-align: right">
                         <a  href="{{route('clients.create')}}" class="btn btn-outline-primary" style="padding: 0.5rem 1rem;"><i class="fa-solid fa-plus"></i> Add</a>
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
                         <th>Company Name</th>
                         <th>Contact Person</th>
                         <th>Mobile</th>
                         <th>email</th>
                         <th>Username</th>
                         <th>Note</th>
                         <th>Status</th>
                         <th>Action</th>
                         <th>Last Login</th>
                     </tr>
                     </thead>
                     <tbody>
                     @foreach($clients as $k => $client)
                         <tr>
                             <td>{{$k+1}}</td>
                             <td>{{$client->company_name}}</td>
                             <td>{{$client->contact_person}}</td>
                             <td>{{$client->mobile}}</td>
                             <td>{{$client->email}}</td>
                             <td>{{$client->user_name}}</td>
                             <td>
                                 @if($client->notes != "")
                                     {{$client->notes}}
                                 @else
                                     N/A
                                 @endif
                             </td>
                             <td>
                                 @if($client->is_active == 0)
                                     <span class="badge badge-sm light badge-danger">Disabled</span>
                                 @else
                                     <span class="badge badge-sm light badge-primary">Enabled</span>
                                 @endif
                             </td>
                             <td>
                                 <a href="{{url('admin/addPayment/'.$client->id)}}"><span class="badge badge-outline-primary"><i class="fa-solid fa-credit-card"></i> Payment</span></a>
                                 <a href="{{url('admin/payment-history/'.$client->id)}}"><span class="badge badge-outline-info"><i class="fa-solid fa-credit-card"></i> History</span></a>
                                 <a href="{{route('clients.edit',$client->id)}}"><span class="badge badge-info"><i class="fa-solid fa-pen-to-square"></i></span></a>
                                 <button type="button" class="badge badge-danger" data-bs-toggle="modal" data-bs-target="#destroyModal" data-id="{{$client->id}}" data-action="{{route('clients.destroy',$client->id)}}"><i class="fa-solid fa-trash"></i></button>
                             </td>
                             <td>
                                 @if(!is_null($client->lastLoginActivity))
                                     {{date('d/m/y h:i A',strtotime($client->lastLoginActivity?->created_at))}}
                                 @else
                                     N/A
                                 @endif
                             </td>
                         </tr>
                     @endforeach


                     </tbody>
                 </table>

                 {{$clients->links()}}

             </div>
         </div>
     </div>
</div>

    @include('.backends.includes.delete-modal')
@endsection
