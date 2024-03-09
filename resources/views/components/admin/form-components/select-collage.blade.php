<div class="mb-3 collage">
    <label for="" class="form-label ">{{ __("keyword.collage") }} <span class="text-danger">*</span></label>
    <select class="form-select  select-collage" name="collage" disabled  >
        {{-- <option selected disabled>{{ __('keyword.select-collage') }}</option> --}}
    </select>
    @if ($errors->has('collage'))
        <small id="helpId" class="form-text text-danger">{{ $errors->first('collage') }}</small>
    @endif
</div>

<script>
    let locale= `{{ $locale }}`

    const getCollage = (id)=>{
        collage = `<label for="" class="form-label ">{{ __("keyword.collage") }} <span class="text-danger">*</span></label>
                    <select class="form-select form-select-sm  select-collage" name="collage"  >
                        {{-- <option selected disabled>{{ __('keyword.select-collage') }}</option> --}}
                    </select>
                @if ($errors->has('collage'))
                    <small id="helpId" class="form-text text-danger">{{ $errors->first('collage') }}</small>
                @endif`
        document.querySelector('.collage').empty
        document.querySelector('.collage').innerHTML=collage

        var singlecollage = new Choices('.select-collage', {
                searchPlaceholderValue: '{{ __("keyword.search-for-collage") }}',
                placeholder: true,
                placeholderValue: '{{ __("keyword.select-collage") }}',
                noChoicesText: '{{ __("keyword.no-collages-to-choose-from") }}',
            })
            .setChoices(function() {
                return fetch(`/get-collages/${id}`)
                    .then((response)=> response.json())
                    .then((data) =>{
                        return data.map(function(collage) {
                            return {
                                value: collage.id,
                                label: locale==='en'? collage.name_en:(locale==='pa'? collage.name_pa:collage.name_dr),
                                selected: collage.id==="{{ $collageId }}"?true:false
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
        getCollage(provinceId)
        
    });

    let provinceId=document.querySelector('.select-province').value;
    if(provinceId){
        getCollage(provinceId)
    }
</script>
