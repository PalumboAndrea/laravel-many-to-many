<div>
    @if (session('success-message'))
    <div class="alert alert-{{ session('message_class') }} mb-3">
        {{ session('success-message') }}
    </div>
    @endif
    
    <div id="action-canceled" class="alert mb-3 d-none">
        
    </div>
</div>