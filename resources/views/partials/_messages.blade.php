@if(Session::has('album_unauthorized'))
    <div class="modal inmodal fade" id="album_unauthorized" tabindex="-1" role="dialog"  aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <small class="font-bold">Un Authorized</small>
                </div>
                <div class="modal-body">
                    <p>{{Session::get('album_unauthorized')}}</p>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endif
@if(Session::has('album_credentials_missmatch'))
    <div class="modal inmodal fade" id="album_credentials_missmatch" tabindex="-1" role="dialog"  aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <small class="font-bold">Credentials Missmatched</small>
                </div>
                <div class="modal-body">
                    <p>{{Session::get('album_credentials_missmatch')}}</p>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endif