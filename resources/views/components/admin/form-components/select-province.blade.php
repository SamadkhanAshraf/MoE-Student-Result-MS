<div class="mb-3">
    <label for="" class="form-label ">{{ __("keyword.province") }} <span class="text-danger">*</span></label>
    <select class="form-select form-select-sm select-province" name="province" >
        <option value="" selected disabled>{{ __('keyword.select-province') }}</option>
        @forelse (\App\Models\Province\Province::all() as $province)
            <option value="{{ $province->id }}" {{ $provinceId===$province->id?'selected':(old('province')===$province->id?'selected':'')}} >{{ $locale==='en'?$province->name_en:($locale==='pa'?$province->name_pa:$province->name_dr) }}</option>
        @empty
        @endforelse
    </select>
</select>
    @if ($errors->has('province'))
        <small id="helpId" class="form-text text-danger">{{ $errors->first('province') }}</small>
    @endif
</div>

<script>
   const  loadProvince = ()=>{
        var singleProvince = new Choices('.select-province',{
            searchPlaceholderValue: '{{ __("keyword.search-for-province") }}',
            placeholder: true,
            noChoicesText: '{{ __("keyword.no-province-to-choose-from") }}',
        });
    }
    loadProvince();

</script>

