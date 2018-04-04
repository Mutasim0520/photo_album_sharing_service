@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-lg-6">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>{{$album->name}}</h5>
                </div>
                <div class="ibox-content">
                    <div class="carousel slide" id="carousel1">
                        <div class="carousel-inner">
                            <?php $i=0; ?>
                            @foreach($album->photo as $item)
                                @if($i==0)
                                <div class="item active">
                                    <img alt="image" class="img-responsive" src="/uploads/albums/{{$album->id}}/{{$item->path}}">
                                </div>
                                    @else
                                <div class="item">
                                    <img alt="image"  class="img-responsive" src="/uploads/albums/{{$album->id}}/{{$item->path}}">
                                </div>
                                    @endif
                                <?php $i++; ?>
                            @endforeach
                        </div>
                        <a data-slide="prev" href="#carousel1" class="left carousel-control">
                            <span class="icon-prev"></span>
                        </a>
                        <a data-slide="next" href="#carousel1" class="right carousel-control">
                            <span class="icon-next"></span>
                        </a>
                    </div>
                </div>

                @if(sizeof($rate_casting_ability->star)==0)
                    <div class="ibox-content" id="rate_container">
                        <h5>Cast Your Ratings</h5>
                        @for($i =1; $i<6;$i++)
                            <a href="javascript:castRating({{$i}});"><i class="fa fa-star"></i></a>
                        @endfor
                    </div>
                    @endif
                <div class="ibox-content">
                    <h5>Ratings</h5>
                    @foreach($stars as $item)
                        @for($i =0; $i<$item->star;$i++)
                            <i class="fa fa-star"></i>
                        @endfor
                        <span style="float: right;">{{$item->total}}</span><br>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-lg-6">
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
                    <div class="chat-form">
                        <form role="form" method="post" id="comments_form">
                            {{csrf_field()}}
                            <div class="form-group">
                                <textarea class="form-control" placeholder="Message" required name="text"></textarea>
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-sm btn-primary m-t-n-xs"><strong>Comment</strong></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="/js/admin/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="/js/admin/plugins/metisMenu/jquery.metisMenu.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="/js/admin//plugins/pace/pace.min.js"></script>
    <script>
        $('#comments_form').submit(function(event) {
            event.preventDefault();
            var text = $('[name = text]').val();
            var id = '{{$album->id}}';
            var ip;
            $.getJSON("http://jsonip.com/?callback=?", function (data) {
                ip = data.ip;
            });
            $.ajax({
                url:"/store/comment",
                type:"post",
                data:{ _token: "{{ csrf_token() }}",text:text,id:id},
                success: function(msg){
                    $('#comment_container').append('<small class="pull-right text-navy">1m ago</small>'
                    +'<strong>User '+ip+'</strong>'+ '<p class="m-b-xs">'+text +'</p>');
                    $('[name = text]').val("");
                }
            });
        });

        function castRating(rate){
            console.log(rate);
            var id = '{{$album->id}}';
            $.ajax({
                url:"/store/rate",
                type:"post",
                data:{ _token: "{{ csrf_token() }}",rate:rate,id:id},
                success: function(msg){
                   $('#rate_container').hide();
                   location.reload();
                }
            });
        }
    </script>
@endsection