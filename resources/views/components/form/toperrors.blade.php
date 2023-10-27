@if ($errors->any())
    <div class="pb-5">
        <ul>
            @foreach ($errors->all() as $error)
                <li class="text-red-500 text-xs">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
