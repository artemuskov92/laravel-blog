{{-- @foreach ($categories as $categoriesItem)
    <option value="{{ $categoriesItem->id ?? '' }}"
        @isset($category->id)
        
        @if ($category->parrent_id == $categoriesItem->id)
            selected=""
        @endif

        @if ($category->id == $categoriesItem->id)
            disabled=""
        @endif
          {{ $delimiter ?? '' }}{{ $categoriesItem->title ?? '' }}
      @endisset>
    </option>
    @isset($categoriesItem->children)
        @include('admin.includes.categories', [
            'categories' => $categoriesItem->children,
            'delimeter' => '-' . $delimeter,
        ])
    @endisset
@endforeach --}}
@foreach ($categories as $categoriesItem)
    <option value="{{ $categoriesItem->id }}"
        @isset($category->id)
        
          @if ($category->parrent_id == $categoriesItem->id)
              selected
          @endif

          @if ($category->id == $categoriesItem->id)
              disabled
          @endif
        @endisset>
        {{ $delimeter ?? '' }}{{ $categoriesItem->name }}
    </option>
    
    @isset($categoriesItem->children)
        @include('admin.includes.categories', [
            'categories' => $categoriesItem->children,
            'delimeter' => '-' . $delimeter,
        ])
    @endisset
@endforeach
