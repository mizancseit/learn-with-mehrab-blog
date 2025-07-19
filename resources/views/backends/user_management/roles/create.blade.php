@extends('backends.layouts.master_layout')
@section('title','Create Staff Groups')
@section('page_heading','Staff Groups')

@section('content')
    <div class="container-fluid">
        @include('backends.includes.notification')

        <form action="{{route('staff-groups.store')}}" method="POST">
            @method('post')
            @csrf
            <div class="card">
                <div class="card-header" style="padding: 12px 20px;">
                    <h4 class="card-title">Add Staff Group</h4>
                </div>
                <div class="card-body">
                    <div class="basic-form">
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Group Name <span class="mandatory">*</span></label>
                                <input type="text" class="form-control form-control-sm @if($errors->has('name')) error-border-for-validation @endif" placeholder="Enter Group Name" name="name" value="{{old('name')}}">
                                @if($errors->has('name'))
                                    <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                                @endif
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Flag <span class="mandatory">*</span></label>
                                <select class="form-control form-control-sm @if($errors->has('flag')) error-border-for-validation @endif" name="flag">
                                    <option value="admin" selected>Admin</option>
                                </select>
                                @if($errors->has('flag'))
                                    <div class="invalid-feedback">{{ $errors->first('flag') }}</div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>



         @foreach($modules as $k => $module)
                <div class="card">
                    <div class="card-header" style="padding: 12px 20px;">
                        <label class="card-title"><input type="checkbox" name="select_module_id[]" onchange="selectModule(this,value)" style="height: 15px;width: 20px;" value="{{$module->id}}"/> {{$module->title}} Module</label>
                    </div>

                    <div class="card-body">
                        <div class="basic-form">

                            @forelse($module->components as $submodule)

                                <label  class="text-d-none"><input type="checkbox" class="module_selected_{{$module->id}}" name="select_submodule_id[]" value="{{$submodule->id}}" onchange="selectComponent(this,{{$submodule->id}})"> {{$submodule->title}} </label>
                                <hr style="margin: 2px;margin-bottom: 10px;border-style: dashed">
                                <div class="row">
                                    @foreach($module->getPermission($submodule->id) as $permission)
                                        <div class="col-md-3">
                                            <div style="border: 1px solid rgba(192,192,192,0.2);margin-bottom: 10px">
                                            <label style="margin: 0;font-weight: normal;padding: 7px;" >
                                                <input  class="module_selected_{{$module->id}} submodule_selected_{{$submodule->id}}" type="checkbox" name="permission_id[]" value="{{$permission->id}}">
                                                {{$permission->professional_name}}</label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @empty
                                <span class="text-danger">This Module has no permission</span>
                            @endforelse
                        </div>
                    </div>
                </div>
         @endforeach

            @auth_access('create_group')
            <button type="submit" class="btn btn-primary">Create Group</button>
            @end_auth_access

        </form>

        <script>
            function selectModule(obj,module_id){
                var ele = document.getElementsByClassName('module_selected_'+module_id);
                if(obj.checked){
                    for(var i=0; i<ele.length; i++){
                        if(ele[i].type == 'checkbox'){
                            ele[i].checked=true;
                        }
                    }
                }else{
                    for(var i=0; i<ele.length; i++){
                        if(ele[i].type == 'checkbox'){
                            ele[i].checked=false;
                        }
                    }
                }
            }

            function selectComponent(obj,submodule_id){
                var ele = document.getElementsByClassName('submodule_selected_'+submodule_id);
                if(obj.checked){
                    for(var i=0; i<ele.length; i++){
                        if(ele[i].type == 'checkbox'){
                            ele[i].checked=true;
                        }
                    }
                }else{
                    for(var i=0; i<ele.length; i++){
                        if(ele[i].type == 'checkbox'){
                            ele[i].checked=false;
                        }
                    }
                }
            }


            // In your Javascript (external .js resource or <script> tag)
            $(document).ready(function() {
                $('.js-example-basic-single').select2();
            });

            $('#icon').change(function () {
                $("#changeImageDesktop").attr('src',window.URL.createObjectURL(this.files[0]))
            });
        </script>
@endsection
