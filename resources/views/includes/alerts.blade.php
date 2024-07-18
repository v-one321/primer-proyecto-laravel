{{-- for success  --}}
@if (session()->has('success'))
    <div class="alert alert-success">
        <span><i class="icon fas fa-check mr-2"></i>{{ session('success') }}</span>
    </div>
@endif

{{-- for error  --}}
@if (session()->has('error')) 
    <div class="alert alert-danger">
        <span><i class="icon fas fa-times mr-2"></i>{{ session('error') }}</span>
    </div>
@endif

{{-- for warning  --}}
@if (session()->has('warning'))
    <div class="alert alert-warning ">
        <span><i class="icon fas fa-exclamation-triangle mr-2"></i>{{ session('warning') }}</span>
    </div>
@endif

{{-- for info  --}}
@if (session()->has('info'))  
    <div class="alert alert-info">
        <span><i class="icon fas fa-info mr-2"></i>{{ session('info') }}</span>
    </div>
@endif
