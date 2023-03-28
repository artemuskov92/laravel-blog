@foreach ($categories as $categoriesItem)
    <option value="{{ $categoriesItem->id }}"
        @isset($post->id)
        
          @if ($post->categories->contains('id',$categoriesItem->id))
              selected
          @endif

        @endisset>
        {{ $delimeter ?? '' }}{{ $categoriesItem->name }}
    </option>
    
    @isset($categoriesItem->children)
        @include('admin.includes.edit-categories', [
            'categories' => $categoriesItem->children,
            'delimeter' => '-' . $delimeter,
        ])
    @endisset
@endforeach
