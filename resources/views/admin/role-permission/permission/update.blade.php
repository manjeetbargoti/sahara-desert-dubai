@extends("admin.layouts.main")
@section("content")


<style>
    ul.servicecat_list {
        display: flex;
        flex-wrap: wrap;
        padding: 15px 0 0;
        list-style: none;
    }
    
    .servicecat_list>li {
        flex: 1 0 25%;
        border-left: 3px dotted #ddd;
        margin-bottom: 26px;
        padding-left: 10px;
    }

    .controlDiv {
        padding-top: 0.5em;
    }
    
    .servicecat_list>li label {
        cursor: pointer;
        font-size: 16px !important;
    }
    
    .servicecat_list li ul {
        list-style: none;
        padding: 0 0 0 10px;
    }
    
    .servicecat_list li ul li {
        position: relative;
        padding: 0px 20px 5px 0px;
    }
    
    .servicecat_list li ul li label {
        cursor: pointer;
        font-weight: 500;
    }
    
    .servicecat_list li ul li:before {
        border-top: 3px dotted #ddd;
        width: 15px;
        position: absolute;
        content: "";
        left: -19px;
        top: 9px;
    }
    </style>

    <div class="components-preview wide-lg mx-auto">
        <div class="nk-block nk-block-lg">
            <div class="nk-block-head">
                <div class="nk-block-between">
                    <div class="nk-block-head-content">
                        <h4 class="nk-block-title">{{ __('Update Permissions') }}</h4>
                    </div>
                </div>
            </div>
            <div class="card card-preview">
                <form role="form" id="user-form" method="POST" action="{{ route('admin.permissions.update', $teamId) }}">
                @csrf
                    <div class="card-inner">
                        @if(count($controllers) > 0)
                        <div id="accordion" class="accordion">
                            @php $count = 0; @endphp
                            @foreach($controllers as $key => $controller)
                            <div class="accordion-item">
                                @php
                                    $namespace1 = explode('||', $key);
                                    $namespace2 = $namespace1;
                                    $namespace = count($namespace1) > 0 ? $namespace1[1] : $key;
                                    $label = count($namespace1) > 0 ? $namespace1[0] : $key;
                                @endphp
                                <a href="#" class="accordion-head" data-toggle="collapse" data-target="#accordion-item-{{ $label }}">
                                    <h6 class="title">{{ $label }}</h6>
                                    <span class="accordion-icon"></span>
                                </a>
                                <div class="accordion-body collapse {{ @$label == 'Admin' ? 'show' : '' }}" id="accordion-item-{{ $label }}" data-parent="#accordion">
                                    <div class="accordion-inner">
                                        <ul class="servicecat_list">
                                            @if(count($controller) > 0)
                                            @foreach($controller as $control => $action)
                                            <li>
                                            @php
                                            $control1 = preg_split('/(?=[A-Z])/', substr($control, 0, -10));
                                            $control1 = ucfirst(implode(' ', $control1));
        
                                            $namespace = explode('||', $key);
                                            $namespace = count($namespace) > 0 ? $namespace[1] : $key;
                                            @endphp
                                                <label class="text-primary fw-medium">
                                                    {{ $control1 }}
                                                </label>
                                                <ul>
                                                    @php
                                                    $checkPerAction = [];
                                                    $checkPer = \App\Models\Permission::havePermission($teamId, $namespace, $control);
                                                    if($checkPer){
                                                    $checkPerAction = explode(',',$checkPer->actions);
                                                    }
                                                    @endphp
                                                    <div id="disabled-{{ $count }}">
                                                        <input type="hidden" name="routes[{{ $count }}][namespace]" value="{{ $namespace }}" {{ $checkPer == null ? 'disabled' : '' }}>
                                                        <input type="hidden" name="routes[{{ $count }}][controller]" value="{{ $control }}" {{ $checkPer == null ? 'disabled' : '' }}>
                                                    </div>
                                                    
                                                    <div class="custom-control custom-control-sm custom-radio">
                                                        <input type="radio" class="custom-control-input type-{{ $count }}" name="routes[{{ $count }}][type]"
                                                            onchange='checkVal("{{ $count }}", "{{$control}}","all")' value="all" @if($checkPer
                                                            !=null && $checkPer->permission_type=='all') checked @endif id="typeAll{{ $count }}">
                                                            <label class="custom-control-label fw-light" for="typeAll{{ $count }}">All</label>
                                                    </div>
                                                    <div class="custom-control custom-control-sm custom-radio">
                                                        <input type="radio" class="custom-control-input type-{{ $count }}" name="routes[{{ $count }}][type]"
                                                            onchange='checkVal("{{ $count }}", "{{$control}}","custom")' value="custom"
                                                            @if($checkPer !=null && $checkPer->permission_type=='custom') checked
                                                        @endif id="typeCustom{{ $count }}">
                                                        <label class="custom-control-label fw-light" for="typeCustom{{ $count }}">Custom</label>
                                                    </div>
                                                    <span id="cancel-selection-{{ $count }}" class="badge badge-dim badge-outline-danger" onclick="cancelSelection('{{ $count }}')" style="cursor: pointer; display:{{ $checkPer == null ? 'none' : 'compact' }}">Cancel Selection</span>
                                                    <div id="actions-{{ $count }}" class="controlDiv"
                                                        style="@if($checkPer != null && $checkPer->permission_type=='custom') display: block @else display: none @endif">
                                                        @if(count($action) > 0)
                                                        @foreach($action as $actionName)
                                                        <li>
                                                            <div class="custom-control custom-control-sm custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" id="{{ @$actionName.'_'.trim(@$control1).'_'.@$count }}" name="routes[{{ $count }}][actions][]"
                                                                    value="{{$actionName}}"
                                                                    @if(in_array($actionName,$checkPerAction)) checked @endif>
                                                            <label class="custom-control-label fs-14px fw-light" for="{{ @$actionName.'_'.trim(@$control1).'_'.@$count }}">
                                                                    @php
                                                                    $comment_string = '';
                                                                    try{
                                                                        $namespace3 = count($namespace2) > 0 ? ($namespace2[1]) : '';
                                                                        if($namespace3 != ''){
                                                                            $ref = new \ReflectionMethod($namespace3.'\\'.$control, $actionName);
                                                                            $comment_string = $ref->getDocComment();
                                                                            $comment_string = trim(str_replace(array('/*', '*/', '*'), array('', '', ''), $comment_string));
                                                                        }
                                                                    }catch(\Exception $e){
                                                                        
                                                                    }
                                                                    
                                                                    @endphp
                                                                    @if($comment_string != '')
                                                                    {{ $comment_string }}
                                                                    @else
                                                                    {{$actionName}}
                                                                    @endif
                                                            </label>
                                                            </div>
                                                        </li>
                                                        @endforeach
                                                        @endif
                                                    </div>
        
                                                </ul>
                                            </li>
                                            @php $count++; @endphp
                                            @endforeach
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @endif
                    </div>
                    <div class="box-footer mb-3 ml-4">
                        <button class="btn btn-dim btn-lg btn-outline-success btn-action" type="submit">{{__('Update')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
    // $().ready(function() {
    //     $('.select2').select2();
    // });
    
    
    function checkVal(count, Id, val) {
        if (val == 'custom') {
            $('#actions' + '-' + count).show('fast');
        } else {
            $('#actions'+ '-' + count).hide('fast');
        }
    
        $("#disabled-"+count).find('input').prop('disabled', false);
        $("#cancel-selection-"+count).show();
    }
    
    function cancelSelection(count){
        $("#disabled-"+count).find('input').prop('disabled', true);
        $(".type-"+count).prop('checked', false);
        $("#actions-"+count).find('input').prop('checked', false);
        $("#actions-"+count).hide();
        $("#cancel-selection-"+count).hide();
    }
    </script>

@endsection