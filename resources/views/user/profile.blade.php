@extends('layouts.admin')
@section('content')
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Album List</h5>
                    </div>
                    <div class="ibox-content">
                        <ul>
                            @foreach($albums as $album)
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal_{{$album->id}}">
                                        <i class="fa fa-file-photo-o fa-5x"></i>
                                        {{$album->name}}
                                    </button>
                                <div class="modal inmodal fade" id="myModal_{{$album->id}}" tabindex="-1" role="dialog"  aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                <h4 class="modal-title">{{$album->name}}</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div>
                                                    <button onclick="javascript:showCredentials('{{$album->id}}');" class="btn btn-success"> Get Credentials</button>
                                                    <div id="credential_{{$album->id}}" style="display: none;">
                                                        <div>
                                                            <label>Album URL</label>
                                                            <input class="form-control" type="text" value="{{$album->perma_link}}" readonly>
                                                        </div>
                                                        <div>
                                                            <label>Password</label>
                                                            <input class="form-control" type="text" value="{{$album->password}}" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div>
                                                    @foreach($album->photo as $item)
                                                    <div style="width: 25%; display: inline-block;">
                                                            <img alt="image" style="height: 100%;width: 100%" class="img-responsive" src="/uploads/albums/{{$album->id}}/{{$item->path}}">
                                                    </div>
                                                    @endforeach
                                                </div>
                                                <div class="width: 50% display: inline-block;">
                                                    <h5>Ratings</h5>
                                                    @foreach($album->star as $item)
                                                        @for($i =0; $i<$item->star;$i++)
                                                            <i class="fa fa-star"></i>
                                                        @endfor
                                                        <span style="float: right;">{{$item->total}}</span><br>
                                                    @endforeach
                                                </div>
                                                <div class="width: 50%">
                                                    <div class="ibox float-e-margins">

                                                        <div class="ibox-content">

                                                            <div>
                                                                <div class="chat-activity-list">

                                                                    <div class="chat-element">
                                                                        <div class="media-body" id="comment_container">
                                                                            @foreach($album->comment as $item)
                                                                                <small class="pull-right text-navy"><?php
                                                                                    date_default_timezone_set("Asia/Dhaka");

                                                                                    $then = new DateTime(date('Y-m-d H:i:s', strtotime($item->created_at)));
                                                                                    $now = new DateTime(date('Y-m-d H:i:s', time()));
                                                                                    $diff = $then->diff($now);
                                                                                    $time =  array('years' => $diff->y, 'months' => $diff->m, 'days' => $diff->d, 'hours' => $diff->h, 'minutes' => $diff->i, 'seconds' => $diff->s);
                                                                                    foreach ($time as $key=>$value){
                                                                                        if($value != '0'){
                                                                                            echo $value;
                                                                                            echo " ";
                                                                                            echo $key;
                                                                                            break;
                                                                                        }
                                                                                    }

                                                                                    ?> ago</small>
                                                                                <strong>User {{$item->ip}}</strong>
                                                                                <p class="m-b-xs">
                                                                                    {{$item->text}}
                                                                                </p>
                                                                            @endforeach
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </ul>
                    </div>
                </div>
            </div>
        </div>
@endsection
@section('script')
    <script>
        function showCredentials(id) {
            $('#credential_'+id +'').show();
        }
    </script>
@endsection