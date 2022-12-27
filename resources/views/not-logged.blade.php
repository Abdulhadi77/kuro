{{--<div class="modal fade in not-loggedin-modal" style="display: none; padding-right: 17px;">--}}
{{--    <div class="modal-dialog">--}}
{{--        <div class="modal-content">--}}
{{--            <div class="modal-header">--}}
{{--                <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                    <i class="material-icons close">close</i>--}}
{{--                </button>--}}
{{--            </div>--}}
{{--            <div class="modal-body">You must be logged in to manage your wishlist.</div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

<div style="display: none;" class="shown-event-ex not-loggedin-modal">
    <div
        class="modal fade text-start"
        id="info-sub"
        tabindex="-1"
        aria-labelledby="myModalLabel22"
        aria-hidden="true"
    >
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">

                    <h4 class="modal-title" id="myModalLabel22">Description For:<span id="blog_title"></span></h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    {{--                        <span class="la la-exclamation-circle fs-60 text-warning"></span>--}}
                    <h4 class="modal-title fs-19 font-weight-semi-bold  pb-1"
                        id="blog_desc"></h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary"
                            data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</div>
