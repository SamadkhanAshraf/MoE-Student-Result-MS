

$('form').submit(function(){
    $(this).find(':input[type=submit]').prop('disabled', true);
});

// loding image to img tag
displayImage=(inputFile, imgTag)=>{
    if (inputFile.files && inputFile.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('.'+imgTag).attr('src', e.target.result);
        }
        reader.readAsDataURL(inputFile.files[0]);
    }
}

function previewImage(input,imageTagClass) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('.'+imageTagClass).attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

 // Modal Start
 var modal = document.querySelector('.modal')
 if (modal) {
     var animateModal = document.getElementById(modal.getAttribute('id'))
     animateModal.addEventListener('show.bs.modal', function (event) {
         var button = event.relatedTarget
         var recipient = button.getAttribute('data-pc-animate')
         var modalTitle = animateModal.querySelector('.modal-title')
         // modalTitle.textContent = 'Animate Modal : ' + recipient
         animateModal.classList.add('anim-' + recipient);
         if (recipient == "let-me-in" || recipient == "make-way" || recipient == "slip-from-top") {
             document.body.classList.add('anim-' + recipient);
         }
     });
     animateModal.addEventListener('hidden.bs.modal', function (event) {
         removeClassByPrefix(animateModal, 'anim-');
         removeClassByPrefix(document.body, 'anim-');
     });

     function removeClassByPrefix(node, prefix) {
         for (let i = 0; i < node.classList.length; i++) {
             let value = node.classList[i];
             if (value.startsWith(prefix)) {
                 node.classList.remove(value);
             }
         }
     }
 }



 $('#datatable').DataTable({
    pageLength:25,
    dom: "<'row d-print-none'<'col-md-6 mb-3' <'float-start' B>> <' col-md-6 mb-3'f>>" +
        "<'row '<'col-md-12'tr>>" +
        "<'row mt-3 d-print-none'<' col-md-5'l><' col-md-7'p>>",

    // 'Blfrtip',
    buttons: [
        {
            extend: 'print',
            exportOptions: {
                columns: ':visible'
            }
        },
        {
            extend: 'csv',
            exportOptions: {
                columns: ':visible'
            }
        },
        {
            extend: 'excel',
            exportOptions: {
                columns: ':visible'
            }
        },
        {
            extend: 'pdf',
            exportOptions: {
                columns: ':visible'
            }
        },
        {
            extend: 'copy',
            exportOptions: {
                columns: ':visible'
            }
        },
        'colvis'
    ],
    columnDefs: [ {
        // targets: -1,
        visible: false
    }]
});


 // Modal End


 //  Image preveiw
 showImage=(path)=>{
    var lightboxModal = new bootstrap.Modal(document.getElementById('lightboxModal'));
    var image = document.querySelector('.modal-image');
    image.setAttribute('src', path);
    lightboxModal.show();
}



