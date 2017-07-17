@push('styles')
<link rel="stylesheet" href="{{asset('resources/assets/css/jquery.dataTables.min.css')}}" type="text/css">
<link rel="stylesheet" href="{{asset('resources/assets/css/daterangepicker.min.css')}}" type="text/css">
@endpush

<div class="col-sm-12">
    @if(Session::has('status'))
        <div class="alert {{(session('status') == 0)? 'alert-danger' : 'alert-success'}} alert-dismissible fade show">
            <span class="right close" data-dismiss="alert">&times;</span>
            {{session('message')}}
        </div>
    @endif
    <div class="card border-purple-1">
        <h5 class="card-header">
            {{trans('admin/category.listing.categories')}}
        </h5>
        <ul class="nav nav-tabs">
            <li class="nav-item"><a href="{{url('admin/category/list')}}" class="nav-link active">{{trans('admin/category.listing.listing')}}</a></li>
            <li class="nav-item"><a href="#" class="nav-link">{!! trans('admin/category.sales.sales_timeline') !!}</a></li>
            <li class="nav-item"><a href="#" class="nav-link">{!! trans('admin/category.sales.sales_top') !!}</a></li>
            <li class="nav-item"><a href="#" class="nav-link">{!! trans('admin/category.purchases.purchases_timeline') !!}</a></li>
            <li class="nav-item"><a href="#" class="nav-link">{!! trans('admin/category.purchases.purchases_top') !!}</a></li>
            <li class="nav-item"><a href="#" class="nav-link">{{trans('admin/category.rating.rating')}}</a></li>
        </ul>
        <div class="card-block">
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group pull-right">
                        <a href="{{url('admin/category/add')}}" class="btn btn-sm btn-outline-success"><i class="material-icons">add</i> {{trans('admin/category.listing.add')}}</a>
                        <div class="btn btn-sm btn-outline-warning"><i class="material-icons">delete</i> {{trans('admin/category.listing.remove')}}</div>
                        <div class="btn btn-sm btn-outline-danger"><i class="material-icons">delete_forever</i> {{trans('admin/category.listing.remove_forever')}}</div>
                    </div>
                </div>
            </div>
            <div class="row" id="filters">
                <div class="col-sm-6 col-md-3">
                    <label for="category-name" class="control-label">{{trans('admin/category.listing.name')}}</label>
                    <input type="text" id="category-name" class="form-control" placeholder="{{trans('admin/category.listing.name')}}" @keyup="filterName">
                </div>
                <div class="col-sm-6 col-md-3">
                    <label for="for" class="control-label">{{trans('admin/common.for')}}</label>
                    <select id="for" class="form-control" @change="filterFor">
                        <option value="">{{trans('admin/common.all')}}</option>
                        <option value="0">{{trans('admin/category.listing.items')}}</option>
                        <option value="1">{{trans('admin/category.listing.products')}}</option>
                        <option value="2">{{trans('admin/common.both')}}</option>
                    </select>
                </div>
                <div class="col-sm-6 col-md-3">
                    <label for="trashed" class="control-label">{{trans('admin/common.trashed')}}</label>
                    <select id="trashed" class="form-control" @change="filterTrashed">
                        <option value="0">{{trans('admin/common.no')}}</option>
                        <option value="1">{{trans('admin/common.yes')}}</option>
                    </select>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="row">
                        <div class="col-xs-9 col-sm-9">
                            <label for="category-updated-at" class="control-label">{{trans('admin/common.updated_at')}}</label>
                            <input type="text" id="category-updated-at" class="form-control" placeholder="{{trans('admin/common.updated_at')}}">
                        </div>
                        <div class="col-xs-3 col-sm-3">
                            <label for="clear" class="control-label"><br/></label>
                            <div class="btn btn-block btn-outline-secondary table-filter-clear" id="clear" title="{{trans('general.clear_filters')}}" @click="clearFilter"><i class="material-icons">clear_all</i></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <table id="category-listing" class="table table-hover table-bordered">
            <thead>
            <tr>
                <th><input type="checkbox" class="select select-all"></th>
                <th>{{trans('admin/category.listing.name')}}</th>
                <th>{{trans('admin/common.for')}}</th>
                <th>{{trans('admin/category.listing.product_count')}}</th>
                <th>{{trans('admin/category.listing.item_count')}}</th>
                <th>{{trans('admin/common.updated_at')}}</th>
                <th></th>
            </tr>
            </thead>
        </table>
    </div>
</div>

@push('scripts')
<script type="text/javascript">
    var urls = { listing: '{{url('admin/category/list')}}'}
</script>
<script type="text/javascript" src="{{asset('resources/assets/js/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript" src="{{asset('resources/assets/js/dataTables.bootstrap4.min.js')}}"></script>
<script type="text/javascript" src="{{asset('resources/assets/js/moment.min.js')}}"></script>
<script type="text/javascript" src="{{asset('resources/assets/js/daterangepicker.min.js')}}"></script>
<script type="text/javascript" src="{{asset('resources/assets/js/admin/category_listing.min.js')}}"></script>
@endpush