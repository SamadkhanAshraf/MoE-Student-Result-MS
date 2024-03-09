<div class="mb-3 department">
    <label for="" class="form-label ">{{ __("keyword.departments") }} <span class="text-danger">*</span></label>
    <select class="form-select  select-department" name="department" disabled  >
    </select>

    @if ($errors->has('department'))
        <small id="helpId" class="form-text text-danger">{{ $errors->first('department') }}</small>
    @endif
</div>

<script>
    let language= `{{ $locale }}`
    const getdepartment = (id)=>{
        department =
        `<label for="" class="form-label ">{{ __("keyword.departments") }} <span class="text-danger">*</span></label>
            <select class="form-select form-select-sm  select-department" name="department"  >
                {{-- <option selected disabled>{{ __('keyword.select-department') }}</option> --}}
            </select>
        @if ($errors->has('department'))
            <small id="helpId" class="form-text text-danger">{{ $errors->first('department') }}</small>
        @endif`

        document.querySelector('.department').empty
        document.querySelector('.department').innerHTML=department

        var singledepartment = new Choices('.select-department', {
                searchPlaceholderValue: '{{ __("keyword.search-for-department") }}',
                placeholder: true,
                placeholderValue: '{{ __("keyword.select-department") }}',
                noChoicesText: '{{ __("keyword.no-departments-to-choose-from") }}',
            }).setChoices(function() {
                return fetch(`/get-departments/${id}`)
                    .then((response)=> response.json())
                    .then((data) =>{
                        return data.departments.map(function(department) {
                            return {
                                value: department.id,
                                label: language==='en'? department.name_en:(language==='pa'? department.name_pa:department.name_dr),
                                selected: department.id==="{{ $departmentId }}"?true:false

                            };
                        });
                    });
            })
            .then(function(instance) {
                instance.setChoiceByValue('Fake Tales Of San Francisco');
            });

    }

    document.addEventListener("change", function(e){
        const target = e.target.closest(".select-collage"); // Or any other selector.
        if(target){
           let collageId= e.target.value
             getdepartment(collageId)
        }
    });

    setTimeout(function(){
        let collageId= document.querySelector('.select-collage').value;
        if(collageId){
            getdepartment(collageId)
        }
    }, 1000)

</script>
