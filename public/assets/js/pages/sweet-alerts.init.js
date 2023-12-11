/*
Template Name: Minible - Admin & Dashboard Template
Author: Themesbrand
Website: https://themesbrand.com/
Contact: themesbrand@gmail.com
File: Sweetalert Js File
*/

!function ($) {
    "use strict";

    var SweetAlert = function () {
    };

    //examples
    SweetAlert.prototype.init = function () {

        //Basic
        $('#sa-basic').on('click', function () {
            Swal.fire(
                {
                    title: 'Any fool can use a computer',
                    confirmButtonColor: '#5b73e8',
                }
            )
        });

        //A title with a text under
        $('.sa-prospect-message').click(function () {
            var getId = $(this).val();
            if(getId > 0){
                var text_ = 'Tahap Prospect Lulus';
                var icon_ = "success";
            } else if(getId == 0){
                var text_ = 'Data Mahasiswa di Tahap Prospect';
                var icon_ = "info";
            }
            Swal.fire(
                {
                    title: "Prospect",
                    text: text_,
                    icon: icon_,
                    confirmButtonColor: '#5b73e8'
                }
            )
        });

        $('.sa-applicant-message').click(function () {
            var getId = $(this).val();
            if (getId==0){
                var title = 'Applicant';
            } else if (getId==1){
                var title = 'Admitted';
            } else if (getId==2){
                var title = 'Enrollee';
            }

            if(getId > 1){
                var text_ = 'Tahap Applicant Lulus';
                var icon_ = "success";
            } else if(getId == 1){
                var text_ = 'Data Mahasiswa di Tahap Applicant';
                var icon_ = "info";
            } else {
                var text_ = 'Selesaikan Tahap ' + title;
                var icon_ = "info";
            }
            Swal.fire(
                {
                    title: "Applicant",
                    text:text_,
                    icon: icon_,
                    confirmButtonColor: '#5b73e8'
                }
            )
        });

        $('.sa-admitted-message').click(function () {
            var getId = $(this).val();

            var getId = $(this).val();
            if (getId==0){
                var title = 'Applicant';
            } else if (getId==1){
                var title = 'Admitted';
            } else if (getId==2){
                var title = 'Enrollee';
            }

            if(getId > 2){
                var text_ = 'Tahap Admitted Lulus';
                var icon_ = "success";
            } else if(getId == 2){
                var text_ = 'Data Mahasiswa di Tahap Admitted';
                var icon_ = "info";
            } else {
                var text_ = 'Selesaikan Tahap ' + title;
                var icon_ = "info";
            }
            Swal.fire(
                {
                    title: "Admitted",
                    text:text_,
                    icon: icon_,
                    confirmButtonColor: '#5b73e8'
                }
            )
        });
        
        $('.sa-enrollee-message').click(function () {
            var getId = $(this).val();
            if (getId==0){
                var title = 'Applicant';
            } else if (getId==1){
                var title = 'Admitted';
            } else if (getId==2){
                var title = 'Enrollee';
            }

            if(getId > 3){
                var text_ = 'Tahap Enrollee Lulus';     
                var icon_ = "success";           
            } else if(getId == 3){
                var text_ = 'Data Mahasiswa di Tahap Enrolle';
                var icon_ = "info";
            } else {
                var text_ = 'Selesaikan Tahap ' + title;
                var icon_ = "info";
            }
            Swal.fire(
                {
                    title: "Enrollee",
                    text: text_,
                    icon: icon_,
                    confirmButtonColor: '#5b73e8'
                }
            )
        });


        //Success Message
        $('.sa-success').click(function () {
            Swal.fire(
                {
                    title: 'Hapus data!',
                    text: 'Data yang terpilih berhasil dihapus.',
                    icon: 'success',
                    showCancelButton: true,
                    confirmButtonColor: '#5b73e8',
                    cancelButtonColor: "#f46a6a"                    
                }                
            ).then(function(){
                $('.create-form').submit();
            })
        });


        //Warning Message Prospect
        $('.sa-warning-prospect').click(function () {
            var getId = $(this).val();
            Swal.fire({
                title: "Hapus Data?",
                text: "Data yang dihapus tidak dapat dipulihkan!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#34c38f",
                cancelButtonColor: "#f46a6a",
                confirmButtonText: "Hapus data",                
                cancelButtonText: "Batal"                                
              }).then(function (result) {                
                if (result.value) {
                  Swal.fire("Terhapus!", "Data sudah terhapus.", "success");                                  
                  window.location.href = '/prospect/delete/' + getId;
                }
            });
        });
        //Warning Message Applicant
        $('.sa-warning-applicant').click(function () {
            var getId = $(this).val();
            Swal.fire({
                title: "Hapus Data?",
                text: "Data yang dihapus tidak dapat dipulihkan!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#34c38f",
                cancelButtonColor: "#f46a6a",
                confirmButtonText: "Hapus data",                
                cancelButtonText: "Batal"                                
              }).then(function (result) {                
                if (result.value) {
                  Swal.fire("Terhapus!", "Data sudah terhapus.", "success");                                  
                  window.location.href = '/applicant/delete/' + getId;
                }
            });
        });
        //Warning Message Admitted
        $('.sa-warning-admitted').click(function () {
            var getId = $(this).val();
            Swal.fire({
                title: "Hapus Data?",
                text: "Data yang dihapus tidak dapat dipulihkan!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#34c38f",
                cancelButtonColor: "#f46a6a",
                confirmButtonText: "Hapus data",                
                cancelButtonText: "Batal"                                
              }).then(function (result) {                
                if (result.value) {
                  Swal.fire("Terhapus!", "Data sudah terhapus.", "success");                                  
                  window.location.href = '/admitted/delete/' + getId;                
                }
            });
        });
        //Warning Message Enrollee
        $('.sa-warning-enrollee').click(function () {
            var getId = $(this).val();
            Swal.fire({
                title: "Hapus Data?",
                text: "Data yang dihapus tidak dapat dipulihkan!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#34c38f",
                cancelButtonColor: "#f46a6a",
                confirmButtonText: "Hapus data",                
                cancelButtonText: "Batal"                                
              }).then(function (result) {                
                if (result.value) {
                  Swal.fire("Terhapus!", "Data sudah terhapus.", "success");                                  
                  window.location.href = '/enrollee/delete/' + getId;                
                }
            });
        });


        //Warning Message Exit
        $('.sa-warning2').click(function () {
            Swal.fire({
                title: "Ingin Keluar?",                
                icon: "info",
                showCancelButton: true,
                confirmButtonColor: "#34c38f",
                cancelButtonColor: "#f46a6a",
                confirmButtonText: "Keluar",                
                cancelButtonText: "Batal"                                
              }).then(function (result) {                
                if (result.value) {
                  Swal.fire("Keluar","", "success");  
                  window.location.href = '/logout';                  
                }
            });
        });

        // Create Data
        $('.sa-warning-create').click(function () {
            Swal.fire({
                title: "Tambah Data?",                
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#34c38f",
                cancelButtonColor: "#f46a6a",
                confirmButtonText: "Tambah",                
                cancelButtonText: "Batal"                                
              }).then(function (result) {                
                if (result.value) {
                  Swal.fire("Tambah Data","Berhasil tambah data.", "success");
                  window.location.href = '/prospect/save';                  
                }
            });
        });


        $('#sa-warning').click(function () {
            Swal.fire({
                title: "Hapus Semua Data?",                
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#34c38f",
                cancelButtonColor: "#f46a6a",
                confirmButtonText: "Hapus semua",                
                cancelButtonText: "Batal"                                
              }).then(function (result) {                
                if (result.value) {
                  Swal.fire("Hapus Data","Semua Data Berhasil Dihapus", "success");
                //   window.location.href = '/prospect/deleteAll';                  
                }
            });
        });
        $('#sa-warning-user').click(function () {
            Swal.fire({
                title: "Hapus Semua Data?",                
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#34c38f",
                cancelButtonColor: "#f46a6a",
                confirmButtonText: "Hapus semua",                
                cancelButtonText: "Batal"                                
              }).then(function (result) {                
                if (result.value) {
                  Swal.fire("Hapus Data","Semua Data Berhasil Dihapus", "success");
                //   window.location.href = '/prospect/deleteAll';                  
                }
            });
        });


        //Parameter
        $('#sa-params').click(function () {
			Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success mt-2',
                cancelButtonClass: 'btn btn-danger ms-2 mt-2',
                buttonsStyling: false
            }).then(function (result) {
                if (result.value) {
                    Swal.fire({
                      title: 'Deleted!',
                      text: 'Your file has been deleted.',
                      icon: 'success',
                      confirmButtonColor: "#34c38f",
                    })
                  } else if (
                    // Read more about handling dismissals
                    result.dismiss === Swal.DismissReason.cancel
                  ) {
                    Swal.fire({
                      title: 'Cancelled',
                      text: 'Your imaginary file is safe :)',
                      icon: 'error'
                    })
                  }
            });
        });

        //Custom Image
        $('#sa-image').click(function () {
            Swal.fire({
                title: 'Sweet!',
                text: 'Modal with a custom image.',
                imageUrl: 'assets/images/logo-dark.png',
                imageHeight: 20,
                confirmButtonColor: "#5b73e8",
                animation: false
            })
        });
		
        //Auto Close Timer
        $('#sa-close').click(function () {
            var timerInterval;
            Swal.fire({
            title: 'Auto close alert!',
            html: 'I will close in <strong></strong> seconds.',
            timer: 2000,
            confirmButtonColor: "#5b73e8",
            onBeforeOpen:function () {
                Swal.showLoading()
                timerInterval = setInterval(function() {
                Swal.getContent().querySelector('strong')
                    .textContent = Swal.getTimerLeft()
                }, 100)
            },
            onClose: function () {
                clearInterval(timerInterval)
            }
            }).then(function (result) {
            if (
                // Read more about handling dismissals
                result.dismiss === Swal.DismissReason.timer
            ) {
                console.log('I was closed by the timer')
            }
            })
        });



        //custom html alert
        $('#custom-html-alert').click(function () {
            Swal.fire({
                title: '<i>HTML</i> <u>example</u>',
                icon: 'info',
                html: 'You can use <b>bold text</b>, ' +
                '<a href="//Themesbrand.in/">links</a> ' +
                'and other HTML tags',
                showCloseButton: true,
                showCancelButton: true,
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger ms-1',
                confirmButtonColor: "#47bd9a",
                cancelButtonColor: "#f46a6a",
                confirmButtonText: '<i class="fas fa-thumbs-up me-1"></i> Great!',
                cancelButtonText: '<i class="fas fa-thumbs-down"></i>'
            })
        });

        //position
        $('#sa-position').click(function () {
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Your work has been saved',
                showConfirmButton: false,
                timer: 1500
            })
        });

        //Custom width padding
        $('#custom-padding-width-alert').click(function () {
            Swal.fire({
                title: 'Custom width, padding, background.',
                width: 600,
                padding: 100,
                confirmButtonColor: "#5b73e8",
                background: '#fff url(//subtlepatterns2015.subtlepatterns.netdna-cdn.com/patterns/geometry.png)'
            })
        });

        //Ajax
        $('#ajax-alert').click(function () {
            Swal.fire({
                title: 'Submit email to run ajax request',
                input: 'email',
                inputPlaceholder: "Enter your email address",
                showCancelButton: true,
                confirmButtonText: 'Submit',
                showLoaderOnConfirm: true,
                confirmButtonColor: "#5b73e8",
                cancelButtonColor: "#f46a6a",
                preConfirm: function (email) {
                    return new Promise(function (resolve, reject) {
                        setTimeout(function () {
                            if (email === 'taken@example.com') {
                                reject('This email is already taken.')
                            } else {
                                resolve()
                            }
                        }, 2000)
                    })
                },
                allowOutsideClick: false
            }).then(function (email) {
                Swal.fire({
                    icon: 'success',
                    title: 'Ajax request finished!',
                    confirmButtonColor: "#34c38f",
                    html: 'Submitted email: ' + email
                })
            })
        });

        //chaining modal alert
        $('#chaining-alert').click(function () {
            Swal.mixin({
                input: 'text',
                confirmButtonText: 'Next &rarr;',
                inputPlaceholder: "Enter your Question",
                showCancelButton: true,
                confirmButtonColor: "#5b73e8",
                cancelButtonColor: "#74788d",
                progressSteps: ['1', '2', '3']
              }).queue([
                {
                  title: 'Question 1',
                  text: 'Chaining swal2 modals is easy'
                },
                'Question 2',
                'Question 3'
              ]).then( function (result) {
                if (result.value) {
                  Swal.fire({
                    title: 'All done!',
                    html:
                      'Your answers: <pre><code>' +
                        JSON.stringify(result.value) +
                      '</code></pre>',
                    confirmButtonText: 'Lovely!',
                    confirmButtonColor: "#34c38f",
                  })
                }
              })
        });

        //Danger
        $('#dynamic-alert').click(function () {
            swal.queue([{
                title: 'Your public IP',
                confirmButtonColor: "#5b73e8",
                confirmButtonText: 'Show my public IP',
                text: 'Your public IP will be received ' +
                'via AJAX request',
                showLoaderOnConfirm: true,
                preConfirm: function () {
                    return new Promise(function (resolve) {
                        $.get('https://api.ipify.org?format=json')
                            .done(function (data) {
                                swal.insertQueueStep(data.ip)
                                resolve()
                            })
                    })
                }
            }]).catch(swal.noop)
        });


    },
        //init
        $.SweetAlert = new SweetAlert, $.SweetAlert.Constructor = SweetAlert
}(window.jQuery),

//initializing
    function ($) {
        "use strict";
        $.SweetAlert.init()
    }(window.jQuery);