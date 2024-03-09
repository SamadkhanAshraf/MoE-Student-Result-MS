<div class="mb-3">
    <label for="" class="form-label">{{ __('keyword.related-departments') }} <span class="text-danger">*</span></label>
    <select class="form-select form-select-sm select-department" name="department[]"  multiple="multiple">
        <option value="" disabled>{{ __('keyword.select-departments') }}</option>
        @forelse (\App\Models\Departments::all() as $dep )
        <option value="{{ $dep->id }}"
            @if ($departments)
                @forelse ($departments as $collageDep)
                    {{ $collageDep->id===$dep->id?'selected':'' }}
                @empty
                @endforelse
            @endif
        >{{ $locale==='en'?$dep->name_en:($locale==='pa'?$dep->name_pa:$dep->name_dr) }}</option>
        @empty
        @endforelse
    </select>
    @if ($errors->has('department'))
        <small id="helpId" class="form-text text-danger">{{ $errors->first('department') }}</small>
    @endif
</div>

<script>
        var departments = new Choices('.select-department',{
             searchPlaceholderValue: '{{ __("keyword.search-for-department") }}',
             placeholder: true,
             removeItemButton: true,
             noChoicesText: '{{ __("keyword.no-department-to-choose-from") }}',
         });

 </script>
