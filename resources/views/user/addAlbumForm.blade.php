@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Add New Album</h5>
                </div>
                <div class="ibox-content">
                    <form method="post" enctype="multipart/form-data" action="{{Route('user.store.album')}}">
                        {{csrf_field()}}
                        <fieldset class="form-horizontal">
                            <div class="form-group"><label class="col-sm-2 control-label">Head Line</label>
                                <div class="col-sm-10"><input type="text" class="form-control" placeholder="" required name="album_name"></div>
                            </div>
                            <div class="form-group"><label class="col-sm-2 control-label">Photos</label>
                                <div class="col-sm-10"><input type="file" class="form-control" placeholder="" name="photos[]" multiple required accept="image/*"></div>
                            </div>
                            <div class="form-group"><label class="col-sm-2 control-label"></label>
                                <div class="col-sm-10"><button type="submit" class="btn btn-w-m btn-primary">Submit</button></div>
                            </div>

                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection