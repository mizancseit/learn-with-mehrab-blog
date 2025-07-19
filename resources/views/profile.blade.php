@extends('backends.layouts.master_layout')
@section('title',' Profile')
@section('page_heading','Profile')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-md-3">
                <div class="profile card card-body px-3 pt-3 pb-0">
                    <div class="profile-head">
                        <div class="photo-content">
                            <div class="cover-photo rounded"></div>
                        </div>
                        <div class="profile-info">

                            <div class="profile-photo">
                                <img src="images/profile/profile.png" class="img-fluid rounded-circle" alt="">
                            </div>

                            <div class="profile-name px-3 pt-2">
                                <h4 class="text-primary mb-0">{{auth()->user()->name}}</h4>
                                <p>Role: {{ucwords(auth()->user()->flag)}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card card-body">
                    <table class="table table-striped">
                        <tr>
                            <th>Company Name</th>
                            <td>:</td>
                            <td>{{auth()->user()->company_name == "" ? 'N/A': auth()->user()->company_name}}</td>
                        </tr>
                        <tr>
                            <th>Contact Person</th>
                            <td>:</td>
                            <td>{{auth()->user()->contact_person == "" ? "N/A" : auth()->user()->contact_person}}</td>
                        </tr>
                        <tr>
                            <th>Mobile Number</th>
                            <td>:</td>
                            <td>{{auth()->user()->mobile}}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>:</td>
                            <td>{{auth()->user()->email}}</td>
                        </tr>
                        <tr>
                            <th>Notes</th>
                            <td>:</td>
                            <td>{{auth()->user()->notes}}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>




        <div class="row">
            <div class="col-xl-12">
                <div class="card h-auto">
                    <div class="card-body">
                        <div class="profile-tab">
                            <div class="custom-tab-1">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item" role="presentation"><a href="#my-posts" data-bs-toggle="tab" class="nav-link active show" aria-selected="true" role="tab">Change Password</a>
                                    </li>
{{--                                    <li class="nav-item" role="presentation"><a href="#about-me" data-bs-toggle="tab" class="nav-link" aria-selected="false" tabindex="-1" role="tab">Change Password</a>--}}
{{--                                    </li>--}}
{{--                                    <li class="nav-item" role="presentation"><a href="#profile-settings" data-bs-toggle="tab" class="nav-link" aria-selected="false" tabindex="-1" role="tab">Notifications</a>--}}
{{--                                    </li>--}}
                                </ul>
                                <div class="tab-content">
                                    <div id="my-posts" class="tab-pane fade active show" role="tabpanel">
                                        <div class="pt-3">
                                            <div class="settings-form">
                                                <form>
                                                    <div class="mb-3">
                                                        <label class="form-label">Old Password</label>
                                                        <input type="password" name="old_password" placeholder="Enter Old Password" class="form-control">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label">New Password</label>
                                                        <input type="password" name="password" placeholder="Enter New Password" class="form-control">
                                                    </div>


                                                    <div class="mb-3">
                                                        <label class="form-label">Confirm Password</label>
                                                        <input type="password" name="password_confirmation" placeholder="Enter Confirm Password" class="form-control">
                                                    </div>

                                                    <button class="btn btn-primary" type="submit">Change Password</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
{{--                                    <div id="about-me" class="tab-pane fade" role="tabpanel">--}}


{{--                                    </div>--}}
                                    <div id="profile-settings" class="tab-pane fade" role="tabpanel"></div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
