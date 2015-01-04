@foreach($category_list as $cat)
    <ul class="category_list">
            <li>                                            
                <a id="view_subcat" style="cursor: pointer;">
                 <span style="margin-right: 5px;width:10px;" title="View Sub-category" class="fa fa-angle-right">
                 </span>{{$cat->category_name}}
                </a>
                @if($store_id == Session::get('store_id'))
                 <span id="{{ $cat->id }}" title="Delete Category" class="cat_delete cat_icons glyphicon glyphicon-minus"></span> 
                 <span style="cursor: pointer;" id="add_subcategory_form" title="Add Sub-category" class="glyphicon glyphicon-plus"></span>
                 <span class="glyphicon glyphicon-edit cat_edit_op" title="Edit category"></span>
                 
                 <div style="display: none;" id="category_edit_form" class="edit_cat_form">
                    <form class="editing_category" >
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="{{$cat->category_name}}" value="{{ $cat->category_name }}">
                        </div>
                        <button type="submit" class="btn btn-default">Edit</button>
                        <button  class="btn btn-default sub_cat_cancel">Cancel</button>
                    </form>
                    <div class="clear"></div>
                </div>

                 <div style="display: none;" id="subcategory_form" class="add_subcat_form">
                    <form class="" >
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Add SubCategory">
                        </div>
                        <button type="submit" class="btn btn-default">Add</button>
                        <button  class="btn btn-default sub_cat_cancel">Cancel</button>
                    </form>
                    <div class="clear"></div>
                </div>
                @endif
            <?php //print_r($sub_cat_list[$cat->category_name]);?> 
            <ul id="sub_category_list" class="sub_category" style="display: none;">
                @foreach($sub_cat_list[$cat->category_name] as $sub_cat)
                    <li>
                        <a id="{{ $sub_cat->id }}" title="View Products" href="#">{{ $sub_cat->category_name }}</a>
                        @if($store_id == Session::get('store_id'))
                        <span title="Delete Sub-Category" class="sub_cat_delete cat_icons glyphicon glyphicon-minus"></span><span class="glyphicon glyphicon-edit subcat_edit_op" title="Edit Subcategory"></span>
                        @endif
                    </li>
                    @if($store_id == Session::get('store_id'))
                        <div style="display: none;" class="edit_subcat_form">
                            <form class="editing_subcategory" >
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="{{$sub_cat->category_name}}" value="{{ $sub_cat->category_name }}">
                                </div>
                                <button type="submit" class="btn btn-default">Edit</button>
                                <button  class="btn btn-default sub_cat_cancel">Cancel</button>
                            </form>
                            <div class="clear"></div>
                        </div>
                    @endif
                @endforeach
                <!-- <li><a title="View Products" href="#">Lancome</a><span title="Delete Sub-Category" class="cat_icons glyphicon glyphicon-minus"></span></li> -->
            </ul>
        </li>

    </ul>
@endforeach