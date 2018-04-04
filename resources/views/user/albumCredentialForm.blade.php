@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Album Credentials</h5>
                </div>
                <div class="ibox-content">
                    <form method="post" enctype="multipart/form-data" action="{{Route('user.album.credentials.validate')}}">
                        {{csrf_field()}}
                        <fieldset class="form-horizontal">
                            <div class="form-group"><label class="col-sm-2 control-label">Album URL</label>
                                <div class="col-sm-10"><input type="text" class="form-control" placeholder="" required name="perma_link"></div>
                            </div>
                            <div class="form-group"><label class="col-sm-2 control-label">Password</label>
                                <div class="col-sm-10"><input type="text" class="form-control" placeholder="" required name="password"></div>
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