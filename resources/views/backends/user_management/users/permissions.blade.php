@extends('backends.layouts.master_layout')
@section('title','Staff permission')
@section('page_heading','Permissions')

@section('content')
    <div class="container-fluid">
        @include('backends.includes.notification')

        <form action="{{route('permission.edit.submit',$user_id)}}" method="POST">
            @method('post')
            @csrf
            <div class="card">
                <div class="card-header" style="padding: 12px 20px;">
                    <h4 class="card-title">Generale Information</h4>
                </div>
                <div class="card-body">

                    <div class="basic-form">
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Staff Name <span class="mandatory">*</span></label>
                                <input type="text" class="form-control form-control-sm" name="name" value="{{$user->name}}" readonly>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Group</label>
                                <input type="text" class="form-control form-control-sm" name="role" value="{{$role_name}}" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            @foreach($modules as $k => $module)
                <div class="card">
                    <div class="card-header" style="padding: 12px 20px;">
                        <label class="card-title"><input type="checkbox" @if(in_array($module->id,$moduleIds)) checked @endif name="select_module_id[]" onchange="selectModule(this,value)" style="height: 15px;width: 20px;" value="{{$module->id}}"/> {{$module->title}} Module</label>
                    </div>

                    <div class="card-body">
                        <div class="basic-form">

                            @forelse($module->components as $submodule)
                                <label  class="text-d-none"><input type="checkbox" @checked(in_array($submodule->id,$submodulesIds)) class="module_selected_{{$module->id}}" name="select_submodule_id[]" value="{{$submodule->id}}" onchange="selectComponent(this,{{$submodule->id}})"> {{$submodule->title}} </label>
                                <hr style="margin: 2px;margin-bottom: 10px;border-style: dashed">
                                <div class="row">
                                    @foreach($module->getPermission($submodule->id) as $permission)
                                        <div class="col-md-3">
                                            <div style="border: 1px solid rgba(192,192,192,0.2);margin-bottom: 10px">
                                                <label style="margin: 0;font-weight: normal;padding: 7px;" >
                                                    <input @checked(in_array($permission->id,$permissionIds))  class="module_selected_{{$module->id}} submodule_selected_{{$submodule->id}}" type="checkbox" name="permission_id[]" value="{{$permission->id}}">
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

            <button type="submit" class="btn btn-primary">Update Permission</button>
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
