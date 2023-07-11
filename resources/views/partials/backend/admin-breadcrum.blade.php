<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-4">
                <h4 class="m-0 text-dark">
                    @if (!request()->segment(2))
                        {{ ucfirst( 'dashboard' ) }}
                    @else
                        {{ ucfirst( request()->segment(2) ) }}
                    @endif
                </h4>
            </div>
            <div class="col-sm-8">
               
            </div>
        </div>
    </div>
</div>
