<table class="table border">
    <thead>
        <tr>
            <th>Title</th>
            <th>Description</th> 
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $val)
        <tr>
            <td>{{$val->title}}</td>
            <td>{{$val->description}}</td>
            <td>Edit</td>
        </tr>    
        @endforeach
    </tbody>
</table>

<div class="mt-3">
    @if($data->lastPage() > 1)
        <div class="d-flex align-items-center gap-2">
            {{-- Previous Button --}}
            <button class="btn btn-sm btn-secondary pagination-btn" 
                    data-page="{{ $data->currentPage() - 1 }}"
                    {{ $data->currentPage() == 1 ? 'disabled' : '' }}>
                Previous
            </button>
            
            @php
                $currentPage = $data->currentPage();
                $lastPage = $data->lastPage();
                $range = 2; // Show 2 pages on each side of current page
                $start = max(1, $currentPage - $range);
                $end = min($lastPage, $currentPage + $range);
            @endphp
            
            @if($start > 1)
                <button class="btn btn-sm btn-secondary pagination-btn" data-page="1">1</button>
                @if($start > 2)
                    <span>...</span>
                @endif
            @endif
            
            {{-- Page range --}}
            @for($i = $start; $i <= $end; $i++)
                <button class="btn btn-sm pagination-btn {{ $currentPage == $i ? 'btn-primary' : 'btn-secondary' }}" 
                        data-page="{{ $i }}"
                        {{ $currentPage == $i ? 'disabled' : '' }}>
                    {{$i}}
                </button>
            @endfor
            
            {{-- Last page --}}
            @if($end < $lastPage)
                @if($end < $lastPage - 1)
                    <span>...</span>
                @endif
                <button class="btn btn-sm btn-secondary pagination-btn" data-page="{{ $lastPage }}">{{ $lastPage }}</button>
            @endif
            
            {{-- Next Button --}}
            <button class="btn btn-sm btn-secondary pagination-btn" 
                    data-page="{{ $data->currentPage() + 1 }}"
                    {{ $data->currentPage() == $lastPage ? 'disabled' : '' }}>
                Next
            </button>
        </div>
        
        <div class="mt-2">
            <small>Showing {{ $data->firstItem() }} to {{ $data->lastItem() }} of {{ $data->total() }} entries (Page {{ $currentPage }} of {{ $lastPage }})</small>
        </div>
    @endif
</div>
