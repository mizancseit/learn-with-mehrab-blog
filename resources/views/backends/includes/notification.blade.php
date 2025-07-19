@if(session()->has('success'))
    <div class="alert alert-success left-icon-big alert-dismissible fade show">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"><span><i class="fa-solid fa-xmark"></i></span>
        </button>
        <div class="media">
            <div class="alert-left-icon-big">
                <span><i class="mdi mdi-check-circle-outline"></i></span>
            </div>
            <div class="media-body">
                <h5 class="mt-1 mb-2">Congratulations!</h5>
                <p class="mb-0">{{session()->get('success')}}</p>
            </div>
        </div>
    </div>
@endif


@if(session()->has('error'))
    <div class="alert alert-danger left-icon-big alert-dismissible fade show">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"><span><i class="fa-solid fa-xmark"></i></span>
        </button>
        <div class="media">
            <div class="alert-left-icon-big">
                <span><i class="mdi mdi-alert"></i></span>
            </div>
            <div class="media-body">
                <h5 class="mt-1 mb-2">Error!</h5>
                <p class="mb-0">{{session()->get('error')}}</p>
            </div>
        </div>
    </div>
@endif
