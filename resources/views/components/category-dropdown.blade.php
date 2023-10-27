<select id="filter_categories" class="flex-1 appearance-none bg-transparent py-2 pl-3 pr-9 text-sm font-semibold">
    <option value="" {{ request()->routeIs('home') ? 'selected' : '' }}>All categories</option>

    @foreach ($categories as $category)
        <option value="{{ $category->slug }}" {{ (request('category') == $category->slug ? 'selected' : '') }}>
            {{ ucwords($category->name) }}
        </option>
    @endforeach
</select>

<script>
    $(document).ready(function($) {
        $('#filter_categories').change(function() {
            const val = $(this).val();

            if (val != '') {
                document.location = '?category=' + val;
            }
            else {
                document.location = '/';
            }
        });
    });
</script>
