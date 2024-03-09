<div class="mb-3 district">
    <label for="" class="form-label ">{{ __("keyword.district") }} <span class="text-danger">*</span></label>
    <select class="form-select  select-district" name="district" disabled  >
        {{-- <option selected disabled>{{ __('keyword.select-district') }}</option> --}}
    </select>
    @if ($errors->has('district'))
        <small id="helpId" class="form-text text-danger">{{ $errors->first('district') }}</small>
    @endif
</div>

<script>
    let locale= `{{ $locale }}`

    const getDistrict = (id)=>{
        district = `<label for="" class="form-label ">{{ __("keyword.district") }} <span class="text-danger">*</span></label>
                    <select class="form-select form-select-sm  select-district" name="district"  >
                        {{-- <option selected disabled>{{ __('keyword.select-district') }}</option> --}}
                    </select>
                @if ($errors->has('district'))
                    <small id="helpId" class="form-text text-danger">{{ $errors->first('district') }}</small>
                @endif`
        document.querySelector('.district').empty
        document.querySelector('.district').innerHTML=district

        var singleDistrict = new Choices('.select-district', {
                searchPlaceholderValue: '{{ __("keyword.search-for-district") }}',
                placeholder: true,
                placeholderValue: '{{ __("keyword.select-district") }}',
                noChoicesText: '{{ __("keyword.no-districts-to-choose-from") }}',
            })
            .setChoices(function() {
                return fetch(`/get-districts/${id}`)
                    .then((response)=> response.json())
                    .then((data) =>{
                        return data.map(function(district) {
                            return {
                                value: district.id,
                                label: locale==='en'? district.name_en:(locale==='pa'? district.name_pa:district.name_dr),
                                selected: district.id==="{{ $districtId }}"?true:false
                            };
                        });
                    });
            })
            .then(function(instance) {
                instance.setChoiceByValue('Fake Tales Of San Francisco');
            });

    }

    document.querySelector('.select-province').addEventListener('change', (e)=>{
        let provinceId= e.target.value
        getDistrict(provinceId)
    });

    let provinceId=document.querySelector('.select-province').value;
    if(provinceId){
        getDistrict(provinceId)
    }
</script>
