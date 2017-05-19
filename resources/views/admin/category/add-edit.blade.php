<div class="col-sm-12">
    <div class="card border-purple-1">
        <h5 class="card-header">
            {{($form == 'add')? trans('admin/category.add_edit.add') : trans('admin/category.add_edit.add')}}
        </h5>
        <div class="row">
            <div class="col-sm-12">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="card-block">
                        <button class="btn btn-success pull-right" type="submit"><i class="material-icons">save</i> {{trans('admin/category.add_edit.save')}}</button>
                    </div><br/>
                    <div class="card-block">
                        <div class="row form-group">
                            <label for="type" class="col-sm-2 control-label">{{trans('admin/category.add_edit.type')}}</label>
                            <div class="col-sm-10">
                                <select name="type" id="type" class="form-control">
                                    <option value="2">{{trans('admin/category.add_edit.all_types')}}</option>
                                    <option value="0">{{trans('admin/category.listing.items')}}</option>
                                    <option value="1">{{trans('admin/category.listing.products')}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="input-parent" class="col-sm-2 control-label">{{trans('admin/category.add_edit.parent')}}</label>
                            <div class="col-sm-10 show" id="input-parent-container">
                                <input type="text" id="input-parent" class="form-control" placeholder="{{trans('admin/category.add_edit.parent')}}" v-model="query" @keyup="processSearch">
                                <input type="hidden" name="parent_id" id="parent-id">
                                <ul id="category-autocomplete" class="dropdown-menu autocomplete" v-if="results.length > 0">
                                    <template v-for="category in results">
                                        <li class="dropdown-item" :data-id="category.id">@{{category.name}}</li>
                                    </template>
                                </ul>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="position" class="col-sm-2 control-label">{{trans('admin/category.add_edit.position')}}</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="position" name="position" value="{{$category['position'] or null}}" placeholder="{{trans('admin/category.add_edit.position')}}"></div>
                        </div>
                        <div class="row">
                            <label for="image" class="col-sm-2 control-label">{{trans('admin/category.add_edit.image')}}</label>
                            <div class="col-sm-10">
                                <div class="image" id="image">
                                    <input type="hidden" name="no_image" value="{{(strpos($image, 'resources/assets/img/placeholder.png') !== false)? 1 : 0}}">
                                    <input type="file" class="hidden-xs-up hidden-xs-down" name="image" id="image-input">
                                    <img class="img-fluid" src="{{$image}}" alt="Category Image">
                                    <div class="btns">
                                        <div class="btn btn-sm btn-success"><i class="material-icons">add</i></div>
                                        <div class="btn btn-sm btn-danger"><i class="material-icons">close</i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <ul class="nav nav-tabs col-sm-12">
                        @foreach(config('locales.available') as $locale)
                            <li class="nav-item"><a href="#{{$locale['code']}}" data-toggle="tab" class="nav-link @if(config('locales.default') == $locale['code']) active @endif"><img src="{{asset("storage/app/locales/$locale[code].png")}}" alt="locale flag">{{$locale['native_name']}}</a></li>
                        @endforeach
                    </ul>
                    <div class="card-block">
                        <div class="tab-content">
                            @foreach(config('locales.available') as $locale)
                                <div id="{{$locale['code']}}" class="tab-pane @if(config('locales.default') == $locale['code']) active @endif">
                                    <div class="row form-group">
                                        <label for="name-{{$locale['code']}}" class="col-sm-2 control-label">{{trans('admin/category.add_edit.name')}}</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="name-{{$locale['code']}}" name="name[{{$locale['code']}}]" value="{{$category[$locale['code']]['name'] or null}}" placeholder="{{trans('admin/category.add_edit.name')}}">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label for="description-{{$locale['code']}}" class="col-sm-2 control-label">{{trans('admin/category.add_edit.description')}}</label>
                                        <div class="col-sm-10">
                                            <textarea name="description[{{$locale['code']}}]" id="description-{{$locale['code']}}" rows="4" class="form-control" placeholder="{{trans('admin/category.add_edit.description')}}">{{$category[$locale['code']]['description'] or null}}</textarea></div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    {{csrf_field()}}
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script type="text/javascript" src="{{asset('resources/assets/js/imageInput.min.js')}}"></script>
<script type="text/javascript" src="{{asset('resources/assets/js/autocomplete.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function(){
        initMenu('{{url('admin/category/list')}}');
        imageInput('.image', '{{$image}}');
        autocomplete('#input-parent', '#category-autocomplete', '{{url('admin/category/autocomplete')}}', '#parent-id');
        @if($form == 'edit')
            setInputValue('{{$category['parent_full_name']}}');
        @endif
    });
</script>
@endpush