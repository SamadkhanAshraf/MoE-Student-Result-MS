<div class="mb-3 students">
    <label for="" class="form-label">{{ __('keyword.students-list') }} <span class="text-danger">*</span></label>
    <select class="form-select form-select-sm select-students" name="students[]" disabled>
        <option value="" selected>{{ __("keyword.search-for-students") }}</option>
    </select>
    @if ($errors->has('students'))
        <small id="helpId" class="form-text text-danger">{{ $errors->first('students') }}</small>
    @endif
</div>


<script>
    const getStudents = ()=>{
        let graduationYear =  document.querySelector('.graduation-year').value;
        let provinceId= document.querySelector('.select-province').value
        let collageId= document.querySelector('.select-collage').value
        let departmentId= document.querySelector('.select-department').value
        let stdIds = new Array();
        let isSelected=false;
        let students = <?php echo json_encode($students); ?>;
        if (students) {
            students.map((std)=>{
                stdIds.push(std.id);
            })
        }

        if (graduationYear!=='' && graduationYear.length===4) {

            if(provinceId===''){
                msgError('{{ __("keyword.please-select-province") }}')
                return
            }

            if(collageId===''){
                msgError('{{ __("keyword.please-select-collage") }}')
                return
            }

            if(departmentId===''){
                msgError('{{ __("keyword.please-select-department") }}')
                return
            }

            let students = `<label for="" class="form-label ">{{ __("keyword.students") }} <span class="text-danger">*</span></label>
            <select class="form-select form-select-sm select-students" name="students[]"  multiple="multiple">
                <option value="" >{{ __("keyword.search-for-students") }}</option>
                        </select>
                    @if ($errors->has('students[]'))
                        <small id="helpId" class="form-text text-danger">{{ $errors->first('students[]') }}</small>
                    @endif`
            document.querySelector('.students').empty
            document.querySelector('.students').innerHTML=students

            let studentsChoice= new Choices('.select-students',{
                searchPlaceholderValue: '{{ __("keyword.search-for-students") }}',
                placeholder: true,
                removeItemButton: true,
                noChoicesText: '{{ __("keyword.no-students-to-choose-from") }}',

            }).setChoices(function() {
                return fetch(`/get-students/${graduationYear}/${provinceId}/${collageId}/${departmentId}`)
                    .then((response)=>  response.json())
                    .then((data) =>{
                        return data.map(function( student) {
                            isSelected = false;
                            if (stdIds.length > 0) {
                                stdIds.map((id, i)=>{
                                    if(stdIds[i]===student.id) {
                                        isSelected = true;
                                        stdIds.splice(i, 1);
                                        // delete stdIds[i]
                                    } else {
                                        isSelected = false
                                    }
                                })
                            }
                            return {
                                value: student.id,
                                label: `${student.name} | ${student.father_name}`,
                                selected:isSelected
                            };

                        });
                    });
                })
                .then(function(instance) {
                    instance.setChoiceByValue('Fake Tales Of San Francisco');
                });
        }

    }

    document.querySelector('.graduation-year').addEventListener('input', ()=>getStudents())
    window.onload=()=>{
        getStudents()
    }
    // document.querySelector('.select-province').addEventListener('change',()=>getStudents())
    // // document.querySelector('.select-collage').addEventListener('change',()=>getStudents())
    // // document.querySelector('.select-department').addEventListener('change',()=>getStudents())


 </script>
