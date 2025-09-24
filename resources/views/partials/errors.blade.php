@if (session('status'))
    <p style="color:green; font-size:14px; margin-bottom:10px;">
        {{ session('status') }}
    </p>
@endif

@if ($errors->any())
    <div style="color:red; font-size:13px; text-align:left; margin-bottom:10px;">
        <ul style="padding-left:20px; margin:0;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
