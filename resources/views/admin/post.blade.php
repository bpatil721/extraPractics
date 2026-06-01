<x-backend>
    <div class="container-fluid">
        <div class="row">
            <h1>Post Page</h1>
        </div>
        <div class="row">
            <div class="data-show" id="post-table" data-url="{{ route('get-post') }}">
            </div>
        </div>
    </div>
</x-backend>