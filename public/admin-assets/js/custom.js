
/*DELETE ROLE*/
$(document).on('click','.delRole', function(e){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var id = $(this).attr('data-id');
    var url = $(this).attr('data-href');
    //var url = e.target;
    var csrf_token=$('meta[name="csrf_token"]').attr('content');
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-info',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
    })

    swalWithBootstrapButtons.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, Delete it!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
    }).then((result) => {
        if (result.value) {
        swalWithBootstrapButtons.fire(
            'Deleted!',
            'Your file has been Deleted.',
            'success',
            $.ajax({
                url: url,
                type: 'POST',
                method: 'POST',
                data: {
                    "id": id,
                    "_token": csrf_token,
                },
                success:function(data)
                {
                    location.reload();
                }
            })
        )
    } else if (
        /* Read more about handling dismissals below */
    result.dismiss === Swal.DismissReason.cancel
    ) {
        swalWithBootstrapButtons.fire(
            'Cancelled',
            'Your imaginary file is safe :)',
            'error'
        )
    }
})
});

/*DELETE USER*/
$(document).on('click','.delUser', function(e){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var id = $(this).attr('data-id');
    var url = $(this).attr('data-href');
    //var url = e.target;
    var csrf_token=$('meta[name="csrf_token"]').attr('content');
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-info',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
    })

    swalWithBootstrapButtons.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, Delete it!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
    }).then((result) => {
        if (result.value) {
        swalWithBootstrapButtons.fire(
            'Deleted!',
            'Your file has been Deleted.',
            'success',
            $.ajax({
                url: url,
                type: 'POST',
                method: 'POST',
                data: {
                    "id": id,
                    "_token": csrf_token,
                },
                success:function(data)
                {
                    location.reload();
                }
            })
        )
    } else if (
        /* Read more about handling dismissals below */
    result.dismiss === Swal.DismissReason.cancel
    ) {
        swalWithBootstrapButtons.fire(
            'Cancelled',
            'Your imaginary file is safe :)',
            'error'
        )
    }
})
});

/*APPROVE USER*/
$(document).on('click','.approveUsers', function(e){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var id = $(this).attr('data-id');
    var url = $(this).attr('data-href');
    //var url = e.target;
    var csrf_token=$('meta[name="csrf_token"]').attr('content');
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-info',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
    })

    swalWithBootstrapButtons.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, Approve it!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
    }).then((result) => {
        if (result.value) {
        swalWithBootstrapButtons.fire(
            'Approved!',
            'Your file has been Approved.',
            'success',
            $.ajax({
                url: url,
                type: 'POST',
                method: 'POST',
                data: {
                    "id": id,
                    "_token": csrf_token,
                },
                success:function(data)
                {
                    location.reload();
                }
            })
        )
    } else if (
        /* Read more about handling dismissals below */
    result.dismiss === Swal.DismissReason.cancel
    ) {
        swalWithBootstrapButtons.fire(
            'Cancelled',
            'Your imaginary file is safe :)',
            'error'
        )
    }
})
});

/*SUSPEND USER*/
$(document).on('click','.suspendUsers', function(e){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var id = $(this).attr('data-id');
    var url = $(this).attr('data-href');
    //var url = e.target;
    var csrf_token=$('meta[name="csrf_token"]').attr('content');
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-info',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
    })

    swalWithBootstrapButtons.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, Suspend it!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
    }).then((result) => {
        if (result.value) {
        swalWithBootstrapButtons.fire(
            'Suspended!',
            'Your file has been Suspended.',
            'success',
            $.ajax({
                url: url,
                type: 'POST',
                method: 'POST',
                data: {
                    "id": id,
                    "_token": csrf_token,
                },
                success:function(data)
                {
                    location.reload();
                }
            })
        )
    } else if (
        /* Read more about handling dismissals below */
    result.dismiss === Swal.DismissReason.cancel
    ) {
        swalWithBootstrapButtons.fire(
            'Cancelled',
            'Your imaginary file is safe :)',
            'error'
        )
    }
})
});

/*DELETE REFERRAL PACKAGE*/
$(document).on('click','.delRefPack', function(e){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var id = $(this).attr('data-id');
    var url = $(this).attr('data-href');
    //var url = e.target;
    var csrf_token=$('meta[name="csrf_token"]').attr('content');
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-info',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
    })

    swalWithBootstrapButtons.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, Delete it!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
    }).then((result) => {
        if (result.value) {
        swalWithBootstrapButtons.fire(
            'Deleted!',
            'Your file has been Deleted.',
            'success',
            $.ajax({
                url: url,
                type: 'POST',
                method: 'POST',
                data: {
                    "id": id,
                    "_token": csrf_token,
                },
                success:function(data)
                {
                    location.reload();
                }
            })
        )
    } else if (
        /* Read more about handling dismissals below */
    result.dismiss === Swal.DismissReason.cancel
    ) {
        swalWithBootstrapButtons.fire(
            'Cancelled',
            'Your imaginary file is safe :)',
            'error'
        )
    }
})
});

/*CLOSE NOTIFICATION*/
$(document).on('click','.closeNotification', function(e){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var id = $(this).attr('data-id');
    var url = $(this).attr('data-href');
    //var url = e.target;
    var csrf_token=$('meta[name="csrf_token"]').attr('content');
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-info',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
    })

    swalWithBootstrapButtons.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, Close it!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
    }).then((result) => {
        if (result.value) {
        swalWithBootstrapButtons.fire(
            'Closed!',
            'Your file has been Closed.',
            'success',
            $.ajax({
                url: url,
                type: 'POST',
                method: 'POST',
                data: {
                    "id": id,
                    "_token": csrf_token,
                },
                success:function(data)
                {
                    location.reload();
                }
            })
        )
    } else if (
        /* Read more about handling dismissals below */
    result.dismiss === Swal.DismissReason.cancel
    ) {
        swalWithBootstrapButtons.fire(
            'Cancelled',
            'Your imaginary file is safe :)',
            'error'
        )
    }
})
});

/*APPROVE COURSE*/
$(document).on('click','.approveCourse', function(e){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var id = $(this).attr('data-id');
    var url = $(this).attr('data-href');
    //var url = e.target;
    var csrf_token=$('meta[name="csrf_token"]').attr('content');
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-info',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
    })

    swalWithBootstrapButtons.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, Approve it!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
    }).then((result) => {
        if (result.value) {
        swalWithBootstrapButtons.fire(
            'Approved!',
            'Your file has been Approved.',
            'success',
            $.ajax({
                url: url,
                type: 'POST',
                method: 'POST',
                data: {
                    "id": id,
                    "_token": csrf_token,
                },
                success:function(data)
                {
                    location.reload();
                }
            })
        )
    } else if (
        /* Read more about handling dismissals below */
    result.dismiss === Swal.DismissReason.cancel
    ) {
        swalWithBootstrapButtons.fire(
            'Cancelled',
            'Your imaginary file is safe :)',
            'error'
        )
    }
})
});

/*REJECT COURSE*/
$(document).on('click','.rejectCourse', function(e){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var id = $(this).attr('data-id');
    var url = $(this).attr('data-href');
    //var url = e.target;
    var csrf_token=$('meta[name="csrf_token"]').attr('content');
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-info',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
    })

    swalWithBootstrapButtons.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, Reject it!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
    }).then((result) => {
        if (result.value) {
        swalWithBootstrapButtons.fire(
            'Rejected!',
            'Your file has been Rejected.',
            'success',
            $.ajax({
                url: url,
                type: 'POST',
                method: 'POST',
                data: {
                    "id": id,
                    "_token": csrf_token,
                },
                success:function(data)
                {
                    location.reload();
                }
            })
        )
    } else if (
        /* Read more about handling dismissals below */
    result.dismiss === Swal.DismissReason.cancel
    ) {
        swalWithBootstrapButtons.fire(
            'Cancelled',
            'Your imaginary file is safe :)',
            'error'
        )
    }
})
});

/*INACTIVATED COURSE*/
$(document).on('click','.inactivateCourse', function(e){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var id = $(this).attr('data-id');
    var url = $(this).attr('data-href');
    //var url = e.target;
    var csrf_token=$('meta[name="csrf_token"]').attr('content');
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-info',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
    })

    swalWithBootstrapButtons.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, Inactive it!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
    }).then((result) => {
        if (result.value) {
        swalWithBootstrapButtons.fire(
            'Inactivated!',
            'Your file has been Inactivated.',
            'success',
            $.ajax({
                url: url,
                type: 'POST',
                method: 'POST',
                data: {
                    "id": id,
                    "_token": csrf_token,
                },
                success:function(data)
                {
                    location.reload();
                }
            })
        )
    } else if (
        /* Read more about handling dismissals below */
    result.dismiss === Swal.DismissReason.cancel
    ) {
        swalWithBootstrapButtons.fire(
            'Cancelled',
            'Your imaginary file is safe :)',
            'error'
        )
    }
})
});


/*ACTIVATED COURSE*/
$(document).on('click','.activateCourse', function(e){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var id = $(this).attr('data-id');
    var url = $(this).attr('data-href');
    //var url = e.target;
    var csrf_token=$('meta[name="csrf_token"]').attr('content');
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-info',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
    })

    swalWithBootstrapButtons.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, Active it!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
    }).then((result) => {
        if (result.value) {
        swalWithBootstrapButtons.fire(
            'Activated!',
            'Your file has been Activated.',
            'success',
            $.ajax({
                url: url,
                type: 'POST',
                method: 'POST',
                data: {
                    "id": id,
                    "_token": csrf_token,
                },
                success:function(data)
                {
                    location.reload();
                }
            })
        )
    } else if (
        /* Read more about handling dismissals below */
    result.dismiss === Swal.DismissReason.cancel
    ) {
        swalWithBootstrapButtons.fire(
            'Cancelled',
            'Your imaginary file is safe :)',
            'error'
        )
    }
})
});

/*APPROVE COURSE PACKAGE*/
$(document).on('click','.approveCoursePackage', function(e){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var id = $(this).attr('data-id');
    var url = $(this).attr('data-href');
    //var url = e.target;
    var csrf_token=$('meta[name="csrf_token"]').attr('content');
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-info',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
    })

    swalWithBootstrapButtons.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, Approve it!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
    }).then((result) => {
        if (result.value) {
        swalWithBootstrapButtons.fire(
            'Approved!',
            'Your file has been Approved.',
            'success',
            $.ajax({
                url: url,
                type: 'POST',
                method: 'POST',
                data: {
                    "id": id,
                    "_token": csrf_token,
                },
                success:function(data)
                {
                    location.reload();
                }
            })
        )
    } else if (
        /* Read more about handling dismissals below */
    result.dismiss === Swal.DismissReason.cancel
    ) {
        swalWithBootstrapButtons.fire(
            'Cancelled',
            'Your imaginary file is safe :)',
            'error'
        )
    }
})
});

/*REJECT COURSE PACKAGE*/
$(document).on('click','.rejectCoursePackage', function(e){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var id = $(this).attr('data-id');
    var url = $(this).attr('data-href');
    //var url = e.target;
    var csrf_token=$('meta[name="csrf_token"]').attr('content');
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-info',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
    })

    swalWithBootstrapButtons.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, Reject it!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
    }).then((result) => {
        if (result.value) {
        swalWithBootstrapButtons.fire(
            'Rejected!',
            'Your file has been Rejected.',
            'success',
            $.ajax({
                url: url,
                type: 'POST',
                method: 'POST',
                data: {
                    "id": id,
                    "_token": csrf_token,
                },
                success:function(data)
                {
                    location.reload();
                }
            })
        )
    } else if (
        /* Read more about handling dismissals below */
    result.dismiss === Swal.DismissReason.cancel
    ) {
        swalWithBootstrapButtons.fire(
            'Cancelled',
            'Your imaginary file is safe :)',
            'error'
        )
    }
})
});

/*INACTIVATED COURSE PACKAGE*/
$(document).on('click','.inactivateCoursePackage', function(e){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var id = $(this).attr('data-id');
    var url = $(this).attr('data-href');
    //var url = e.target;
    var csrf_token=$('meta[name="csrf_token"]').attr('content');
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-info',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
    })

    swalWithBootstrapButtons.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, Inactive it!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
    }).then((result) => {
        if (result.value) {
        swalWithBootstrapButtons.fire(
            'Inactivated!',
            'Your file has been Inactivated.',
            'success',
            $.ajax({
                url: url,
                type: 'POST',
                method: 'POST',
                data: {
                    "id": id,
                    "_token": csrf_token,
                },
                success:function(data)
                {
                    location.reload();
                }
            })
        )
    } else if (
        /* Read more about handling dismissals below */
    result.dismiss === Swal.DismissReason.cancel
    ) {
        swalWithBootstrapButtons.fire(
            'Cancelled',
            'Your imaginary file is safe :)',
            'error'
        )
    }
})
});


/*ACTIVATED COURSE PACKAGE*/
$(document).on('click','.activateCoursePackage', function(e){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var id = $(this).attr('data-id');
    var url = $(this).attr('data-href');
    //var url = e.target;
    var csrf_token=$('meta[name="csrf_token"]').attr('content');
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-info',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
    })

    swalWithBootstrapButtons.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, Active it!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
    }).then((result) => {
        if (result.value) {
        swalWithBootstrapButtons.fire(
            'Activated!',
            'Your file has been Activated.',
            'success',
            $.ajax({
                url: url,
                type: 'POST',
                method: 'POST',
                data: {
                    "id": id,
                    "_token": csrf_token,
                },
                success:function(data)
                {
                    location.reload();
                }
            })
        )
    } else if (
        /* Read more about handling dismissals below */
    result.dismiss === Swal.DismissReason.cancel
    ) {
        swalWithBootstrapButtons.fire(
            'Cancelled',
            'Your imaginary file is safe :)',
            'error'
        )
    }
})
});

/*CLOSE COURSE BATCH*/
$(document).on('click','.closeCourseBatch', function(e){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var id = $(this).attr('data-id');
    var url = $(this).attr('data-href');
    //var url = e.target;
    var csrf_token=$('meta[name="csrf_token"]').attr('content');
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-info',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
    })

    swalWithBootstrapButtons.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, Close it!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
    }).then((result) => {
        if (result.value) {
        swalWithBootstrapButtons.fire(
            'Closed!',
            'Your file has been Closed.',
            'success',
            $.ajax({
                url: url,
                type: 'POST',
                method: 'POST',
                data: {
                    "id": id,
                    "_token": csrf_token,
                },
                success:function(data)
                {
                    location.reload();
                }
            })
        )
    } else if (
        /* Read more about handling dismissals below */
    result.dismiss === Swal.DismissReason.cancel
    ) {
        swalWithBootstrapButtons.fire(
            'Cancelled',
            'Your imaginary file is safe :)',
            'error'
        )
    }
})
});

/*CLOSE COURSE PACKAGE BATCH*/
$(document).on('click','.closePackageBatch', function(e){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var id = $(this).attr('data-id');
    var url = $(this).attr('data-href');
    //var url = e.target;
    var csrf_token=$('meta[name="csrf_token"]').attr('content');
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-info',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
    })

    swalWithBootstrapButtons.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, Close it!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
    }).then((result) => {
        if (result.value) {
        swalWithBootstrapButtons.fire(
            'Closed!',
            'Your file has been Closed.',
            'success',
            $.ajax({
                url: url,
                type: 'POST',
                method: 'POST',
                data: {
                    "id": id,
                    "_token": csrf_token,
                },
                success:function(data)
                {
                    location.reload();
                }
            })
        )
    } else if (
        /* Read more about handling dismissals below */
    result.dismiss === Swal.DismissReason.cancel
    ) {
        swalWithBootstrapButtons.fire(
            'Cancelled',
            'Your imaginary file is safe :)',
            'error'
        )
    }
})
});

/*REMOVE STUDENT FROM BATCH*/
$(document).on('click','.removeStudentBatch', function(e){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var id = $(this).attr('data-id');
    var url = $(this).attr('data-href');
    //var url = e.target;
    var csrf_token=$('meta[name="csrf_token"]').attr('content');
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-info',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
    })

    swalWithBootstrapButtons.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, Remove Student!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
    }).then((result) => {
        if (result.value) {
        swalWithBootstrapButtons.fire(
            'Removed!',
            'Your student has been Removed.',
            'success',
            $.ajax({
                url: url,
                type: 'POST',
                method: 'POST',
                data: {
                    "id": id,
                    "_token": csrf_token,
                },
                success:function(data)
                {
                    location.reload();
                }
            })
        )
    } else if (
        /* Read more about handling dismissals below */
    result.dismiss === Swal.DismissReason.cancel
    ) {
        swalWithBootstrapButtons.fire(
            'Cancelled',
            'Your imaginary file is safe :)',
            'error'
        )
    }
})
});

/*DELETE PDF LIBRARY*/
$(document).on('click','.deletePdf', function(e){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var id = $(this).attr('data-id');
    var url = $(this).attr('data-href');
    //var url = e.target;
    var csrf_token=$('meta[name="csrf_token"]').attr('content');
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-info',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
    })

    swalWithBootstrapButtons.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, Delete it!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
    }).then((result) => {
        if (result.value) {
        swalWithBootstrapButtons.fire(
            'Deleted!',
            'Your file has been Deleted.',
            'success',
            $.ajax({
                url: url,
                type: 'POST',
                method: 'POST',
                data: {
                    "id": id,
                    "_token": csrf_token,
                },
                success:function(data)
                {
                    location.reload();
                }
            })
        )
    } else if (
        /* Read more about handling dismissals below */
    result.dismiss === Swal.DismissReason.cancel
    ) {
        swalWithBootstrapButtons.fire(
            'Cancelled',
            'Your imaginary file is safe :)',
            'error'
        )
    }
})
});

/*DELETE VIDEO LIBRARY*/
$(document).on('click','.deleteVideo', function(e){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var id = $(this).attr('data-id');
    var url = $(this).attr('data-href');
    //var url = e.target;
    var csrf_token=$('meta[name="csrf_token"]').attr('content');
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-info',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
    })

    swalWithBootstrapButtons.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, Delete it!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
    }).then((result) => {
        if (result.value) {
        swalWithBootstrapButtons.fire(
            'Deleted!',
            'Your file has been Deleted.',
            'success',
            $.ajax({
                url: url,
                type: 'POST',
                method: 'POST',
                data: {
                    "id": id,
                    "_token": csrf_token,
                },
                success:function(data)
                {
                    location.reload();
                }
            })
        )
    } else if (
        /* Read more about handling dismissals below */
    result.dismiss === Swal.DismissReason.cancel
    ) {
        swalWithBootstrapButtons.fire(
            'Cancelled',
            'Your imaginary file is safe :)',
            'error'
        )
    }
})
});

/*DELETE COURSE ENROLLMENT PAYMENT*/
$(document).on('click','.deleteEnrollment', function(e){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var id = $(this).attr('data-id');
    var url = $(this).attr('data-href');
    //var url = e.target;
    var csrf_token=$('meta[name="csrf_token"]').attr('content');
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-info',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
    })

    swalWithBootstrapButtons.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, Canceled it!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
    }).then((result) => {
        if (result.value) {
        swalWithBootstrapButtons.fire(
            'Canceled!',
            'Your file has been Canceled.',
            'success',
            $.ajax({
                url: url,
                type: 'POST',
                method: 'POST',
                data: {
                    "id": id,
                    "_token": csrf_token,
                },
                success:function(data)
                {
                    location.reload();
                }
            })
        )
    } else if (
        /* Read more about handling dismissals below */
    result.dismiss === Swal.DismissReason.cancel
    ) {
        swalWithBootstrapButtons.fire(
            'Cancelled',
            'Your imaginary file is safe :)',
            'error'
        )
    }
})
});

/*APPROVE COURSE COMPLETE*/
$(document).on('click','.approveCompleteCourse', function(e){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var id = $(this).attr('data-id');
    var url = $(this).attr('data-href');
    //var url = e.target;
    var csrf_token=$('meta[name="csrf_token"]').attr('content');
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-info',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
    })

    swalWithBootstrapButtons.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, Approved it!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
    }).then((result) => {
        if (result.value) {
        swalWithBootstrapButtons.fire(
            'Approved!',
            'Your file has been Approved.',
            'success',
            $.ajax({
                url: url,
                type: 'POST',
                method: 'POST',
                data: {
                    "id": id,
                    "_token": csrf_token,
                },
                success:function(data)
                {
                    location.reload();
                }
            })
        )
    } else if (
        /* Read more about handling dismissals below */
    result.dismiss === Swal.DismissReason.cancel
    ) {
        swalWithBootstrapButtons.fire(
            'Cancelled',
            'Your imaginary file is safe :)',
            'error'
        )
    }
})
});

/*APPROVE COURSE PACKAGE COMPLETE*/
$(document).on('click','.approveCompletePackage', function(e){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var id = $(this).attr('data-id');
    var url = $(this).attr('data-href');
    //var url = e.target;
    var csrf_token=$('meta[name="csrf_token"]').attr('content');
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-info',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
    })

    swalWithBootstrapButtons.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, Approved it!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
    }).then((result) => {
        if (result.value) {
        swalWithBootstrapButtons.fire(
            'Approved!',
            'Your file has been Approved.',
            'success',
            $.ajax({
                url: url,
                type: 'POST',
                method: 'POST',
                data: {
                    "id": id,
                    "_token": csrf_token,
                },
                success:function(data)
                {
                    location.reload();
                }
            })
        )
    } else if (
        /* Read more about handling dismissals below */
    result.dismiss === Swal.DismissReason.cancel
    ) {
        swalWithBootstrapButtons.fire(
            'Cancelled',
            'Your imaginary file is safe :)',
            'error'
        )
    }
})
});

/*APPROVE PAYMENT REQUEST*/
$(document).on('click','.approvePaymentRequest', function(e){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var id = $(this).attr('data-id');
    var url = $(this).attr('data-href');
    var request_amount = $(this).attr('data-request');
    //var url = e.target;
    var csrf_token=$('meta[name="csrf_token"]').attr('content');
    $.ajax({
        url: url,
        type: 'POST',
        method: 'POST',
        data: {
            "id": id,
            "request_amount": request_amount,
            "_token": csrf_token,
        },
        success:function(data)
        {
            $('#payment-request').modal('show')
            $('#payment-request-body').html(data);
        }
    })
});

/*PAID PARTIAL PAYMENT*/
$(document).on('click','.paidPartialPayment', function(e){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var id = $(this).attr('data-id');
    var url = $(this).attr('data-href');
    var partial_amount = $('#paid_amount').val();
    //var url = e.target;
    var csrf_token=$('meta[name="csrf_token"]').attr('content');
    $.ajax({
        url: url,
        type: 'POST',
        method: 'POST',
        data: {
            "id": id,
            "partial_amount": partial_amount,
            "_token": csrf_token,
        },
        success:function(data)
        {
            location.reload();
        }
    })
});

/*ONCLICK ADD EDUCATION QUALIFICATION FORM*/
$(document).on('click','#btnAdd_aca', function(e){
    $('#noData_aca').hide();
    $('#aca-qua-add-form').show();
});

/*ONCLICK ADD TRAINING SUMMERY FORM*/
$(document).on('click','#btnAdd_tra', function(e){
    $('#noData_tra').hide();
    $('#tra-qua-add-form').show();
});

/*ONCLICK ADD SPECIAL QUALIFICATION FORM*/
$(document).on('click','#btnAdd_spe', function(e){
    $('#noData_spe').hide();
    $('#spe-qua-add-form').show();
});

/*ONCLICK ADD EMPLOYMENT HISTORY FORM*/
$(document).on('click','#btnAdd_emp', function(e){
    $('#noData_emp').hide();
    $('#emp-qua-add-form').show();
});

/*ONCLICK ADD PROFESSIONAL QUALIFICATION FORM*/
$(document).on('click','#btnAdd_pro', function(e){
    $('#noData_pro').hide();
    $('#pro-qua-add-form').show();
});

/*ONCLICK EDIT EDUCATION QUALIFICATION FORM*/
$(document).on('click','.btnEditAca', function(e){
    var finder = $(this).parents('.row').find('.aca_box');
    finder.removeClass('form-input');
    finder.find('span').hide();
    finder.find('.aca-update').show();
    $(this).hide();
});

/*DEPENDENCY DROPDOWN LIST FOR SECONDARY CATEGORY*/
$(document).on('change','#primaryCat', function(e){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var priCat_id = e.target.value;
    var url = $(this).attr('data-href');
    //var url = e.target;
    var csrf_token=$('meta[name="csrf_token"]').attr('content');
    $.ajax({
        url:url,
        type:"POST",
        dataType: 'json',
        data: {
            "priCat_id": priCat_id,
            "_token": csrf_token,
        },
        success:function(data) {
            jQuery('select[name="secondaryCategory"]').empty();
            $('select[name="secondaryCategory"]').append('<option>Select Secondary Category</option>');
            jQuery.each(data, function(key,value){
                $('select[name="secondaryCategory"]').append('<option value="'+ key +'">'+ value +'</option>');
            });
        }
    })
});

/*DEPENDENCY DROPDOWN LIST FOR SUB CATEGORY*/
$(document).on('change','#subCat', function(e){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var secCat_id = e.target.value;



    var url = $(this).attr('data-href');
    //var url = e.target;
    var csrf_token=$('meta[name="csrf_token"]').attr('content');
    $.ajax({
        url:url,
        type:"POST",
        dataType: 'json',
        data: {
            "secCat_id": secCat_id,
            "_token": csrf_token,
        },
        success:function(data) {
            jQuery('select[name="course_sub_category_id"]').empty();
            jQuery.each(data, function(key,value){
                $('select[name="course_sub_category_id"]').append('<option value="'+ key +'">'+ value +'</option>');
            });
        }
    })
});

/*ONCLICK VIEW COURSE COST LIST MODAL*/
$(document).on('click','.courseCost', function(e){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var id = $(this).attr('data-id');
    var url = $(this).attr('data-href');
    //var url = e.target;
    var csrf_token=$('meta[name="csrf_token"]').attr('content');
    $.ajax({
        url:url,
        type:"POST",
        data: {
            "id": id,
            "_token": csrf_token,
        },
        success:function(data) {
            $('#course_cost_modal').modal('show');
            $('#course-cost').html(data);
        }
    })
});


/*ONCLICK OPEN COURSE COST ADD FORM MODAL*/
$(document).on('click','.addCourseCost', function(e){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var id = $(this).attr('data-id');
    var url = $(this).attr('data-href');
    //var url = e.target;
    var csrf_token=$('meta[name="csrf_token"]').attr('content');
    $.ajax({
        url:url,
        type:"POST",
        data: {
            "id": id,
            "_token": csrf_token,
        },
        success:function(data) {
            $('#course_cost_modal').modal('show');
            $('#course-cost').html(data);
        }
    })
});


/*ONCLICK OPEN COURSE COST EDIT FORM MODAL*/
$(document).on('click','.editCourseCost', function(e){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var id = $(this).attr('data-id');
    var url = $(this).attr('data-href');
    //var url = e.target;
    var csrf_token=$('meta[name="csrf_token"]').attr('content');
    $.ajax({
        url:url,
        type:"POST",
        data: {
            "id": id,
            "_token": csrf_token,
        },
        success:function(data) {
            $('#course_cost_modal').modal('show');
            $('#course-cost').html(data);
        }
    })
});

/*ONCLICK VIEW COURSE LESSON LIST MODAL*/
$(document).on('click','.courseLesson', function(e){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var id = $(this).attr('data-id');
    var url = $(this).attr('data-href');
    //var url = e.target;
    var csrf_token=$('meta[name="csrf_token"]').attr('content');
    $.ajax({
        url:url,
        type:"POST",
        data: {
            "id": id,
            "_token": csrf_token,
        },
        success:function(data) {
            $('#course_cost_modal').modal('show');
            $('#course-cost').html(data);
        }
    })
});

/*ONCLICK OPEN COURSE LESSON ADD FORM MODAL*/
$(document).on('click','.addCourseLesson', function(e){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var id = $(this).attr('data-id');
    var url = $(this).attr('data-href');
    //var url = e.target;
    var csrf_token=$('meta[name="csrf_token"]').attr('content');
    $.ajax({
        url:url,
        type:"POST",
        data: {
            "id": id,
            "_token": csrf_token,
        },
        success:function(data) {
            $('#course_cost_modal').modal('show');
            $('#course-cost').html(data);
            CKEDITOR.replace( 'editor');
        }
    })
});


/*ONCLICK OPEN COURSE LESSON EDIT FORM MODAL*/
$(document).on('click','.editCourseLesson', function(e){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var id = $(this).attr('data-id');
    var url = $(this).attr('data-href');
    //var url = e.target;
    var csrf_token=$('meta[name="csrf_token"]').attr('content');
    $.ajax({
        url:url,
        type:"POST",
        data: {
            "id": id,
            "_token": csrf_token,
        },
        success:function(data) {
            $('#course_cost_modal').modal('show');
            $('#course-cost').html(data);
            CKEDITOR.replace( 'editor');
        }
    })
});

/*ONCLICK OPEN COURSE BATCH LIST MODAL*/
$(document).on('click','.courseBatch', function(e){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var id = $(this).attr('data-id');
    var url = $(this).attr('data-href');
    //var url = e.target;
    var csrf_token=$('meta[name="csrf_token"]').attr('content');
    $.ajax({
        url:url,
        type:"POST",
        data: {
            "id": id,
            "_token": csrf_token,
        },
        success:function(data) {
            $('#course_cost_modal').modal('show');
            $('#course-cost').html(data);
        }
    })
});

/*ONCLICK OPEN COURSE BATCH ADD FORM MODAL*/
$(document).on('click','.addCourseBatch', function(e){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var id = $(this).attr('data-id');
    var url = $(this).attr('data-href');
    //var url = e.target;
    var csrf_token=$('meta[name="csrf_token"]').attr('content');
    $.ajax({
        url:url,
        type:"POST",
        data: {
            "id": id,
            "_token": csrf_token,
        },
        success:function(data) {
            $('#course_cost_modal').modal('show');
            $('#course-cost').html(data);
        }
    })
});

/*ONCLICK OPEN COURSE BATCH WISE STUDENT LIST MODAL*/
$(document).on('click','.courseBatchStudentMapping', function(e){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var id = $(this).attr('data-id');
    var url = $(this).attr('data-href');
    //var url = e.target;
    var csrf_token=$('meta[name="csrf_token"]').attr('content');
    $.ajax({
        url:url,
        type:"POST",
        data: {
            "id": id,
            "_token": csrf_token,
        },
        success:function(data) {
            $('#course_cost_modal').modal('show');
            $('#course-cost').html(data);
        }
    })
});

/*ONCLICK OPEN COURSE BATCH WISE STUDENT ADD FORM MODAL*/
$(document).on('click','.addCourseBatchStudent', function(e){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var id = $(this).attr('data-id');
    var url = $(this).attr('data-href');
    //var url = e.target;
    var csrf_token=$('meta[name="csrf_token"]').attr('content');
    $.ajax({
        url:url,
        type:"POST",
        data: {
            "id": id,
            "_token": csrf_token,
        },
        success:function(data) {
            $('#course_cost_modal').modal('show');
            $('#course-cost').html(data);
        }
    })
});

/*ONCLICK OPEN COURSE BATCH EDIT FORM MODAL*/
$(document).on('click','.editCourseBatch', function(e){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var id = $(this).attr('data-id');
    var url = $(this).attr('data-href');
    //var url = e.target;
    var csrf_token=$('meta[name="csrf_token"]').attr('content');
    $.ajax({
        url:url,
        type:"POST",
        data: {
            "id": id,
            "_token": csrf_token,
        },
        success:function(data) {
            $('#course_cost_modal').modal('show');
            $('#course-cost').html(data);
        }
    })
});

/*ONCLICK OPEN COURSE QUIZ LIST MODAL*/
$(document).on('click','.courseQuiz', function(e){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var id = $(this).attr('data-id');
    var url = $(this).attr('data-href');
    //var url = e.target;
    var csrf_token=$('meta[name="csrf_token"]').attr('content');
    $.ajax({
        url:url,
        type:"POST",
        data: {
            "id": id,
            "_token": csrf_token,
        },
        success:function(data) {
            $('#course_cost_modal').modal('show');
            $('#course-cost').html(data);
        }
    })
});

/*ONCLICK OPEN COURSE QUIZ ADD FORM MODAL*/
$(document).on('click','.addCourseQuiz', function(e){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var id = $(this).attr('data-id');
    var url = $(this).attr('data-href');
    //var url = e.target;
    var csrf_token=$('meta[name="csrf_token"]').attr('content');
    $.ajax({
        url:url,
        type:"POST",
        data: {
            "id": id,
            "_token": csrf_token,
        },
        success:function(data) {
            $('#course_cost_modal').modal('show');
            $('#course-cost').html(data);
        }
    })
});

/*ONCLICK OPEN COURSE QUIZ EDIT FORM MODAL*/
$(document).on('click','.editCourseQuiz', function(e){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var id = $(this).attr('data-id');
    var url = $(this).attr('data-href');
    //var url = e.target;
    var csrf_token=$('meta[name="csrf_token"]').attr('content');
    $.ajax({
        url:url,
        type:"POST",
        data: {
            "id": id,
            "_token": csrf_token,
        },
        success:function(data) {
            $('#course_cost_modal').modal('show');
            $('#course-cost').html(data);
        }
    })
});

/*ONCLICK OPEN COURSE QUIZ QUESTION LIST MODAL*/
$(document).on('click','.courseQuizQuestions', function(e){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var id = $(this).attr('data-id');
    var url = $(this).attr('data-href');
    //var url = e.target;
    var csrf_token=$('meta[name="csrf_token"]').attr('content');
    $.ajax({
        url:url,
        type:"POST",
        data: {
            "id": id,
            "_token": csrf_token,
        },
        success:function(data) {
            $('#course_cost_modal').modal('show');
            $('#course-cost').html(data);
        }
    })
});


/*ONCLICK OPEN COURSE QUIZ QUESTION ADD FORM MODAL*/
$(document).on('click','.addCourseQuizQuestion', function(e){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var id = $(this).attr('data-id');
    var url = $(this).attr('data-href');
    //var url = e.target;
    var csrf_token=$('meta[name="csrf_token"]').attr('content');
    $.ajax({
        url:url,
        type:"POST",
        data: {
            "id": id,
            "_token": csrf_token,
        },
        success:function(data) {
            $('#course_cost_modal').modal('show');
            $('#course-cost').html(data);
        }
    })
});

/*ONCLICK OPEN COURSE QUIZ QUESTION EDIT FORM MODAL*/
$(document).on('click','.editCourseQuizQuestion', function(e){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var id = $(this).attr('data-id');
    var url = $(this).attr('data-href');
    //var url = e.target;
    var csrf_token=$('meta[name="csrf_token"]').attr('content');
    $.ajax({
        url:url,
        type:"POST",
        data: {
            "id": id,
            "_token": csrf_token,
        },
        success:function(data) {
            $('#course_cost_modal').modal('show');
            $('#course-cost').html(data);
        }
    })
});

/*ONCLICK OPEN COURSE ASSIGNMENT LIST MODAL*/
$(document).on('click','.courseAssignment', function(e){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var id = $(this).attr('data-id');
    var url = $(this).attr('data-href');
    //var url = e.target;
    var csrf_token=$('meta[name="csrf_token"]').attr('content');
    $.ajax({
        url:url,
        type:"POST",
        data: {
            "id": id,
            "_token": csrf_token,
        },
        success:function(data) {
            $('#course_cost_modal').modal('show');
            $('#course-cost').html(data);
        }
    })
});

/*ONCLICK OPEN COURSE ASSIGNMENT ADD FORM MODAL*/
$(document).on('click','.addCourseAssignment', function(e){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var id = $(this).attr('data-id');
    var url = $(this).attr('data-href');
    //var url = e.target;
    var csrf_token=$('meta[name="csrf_token"]').attr('content');
    $.ajax({
        url:url,
        type:"POST",
        data: {
            "id": id,
            "_token": csrf_token,
        },
        success:function(data) {
            $('#course_cost_modal').modal('show');
            $('#course-cost').html(data);
            CKEDITOR.replace( 'editor');
        }
    })
});

/*ONCLICK OPEN COURSE ASSIGNMENT EDIT FORM MODAL*/
$(document).on('click','.editCourseAssignment', function(e){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var id = $(this).attr('data-id');
    var url = $(this).attr('data-href');
    //var url = e.target;
    var csrf_token=$('meta[name="csrf_token"]').attr('content');
    $.ajax({
        url:url,
        type:"POST",
        data: {
            "id": id,
            "_token": csrf_token,
        },
        success:function(data) {
            $('#course_cost_modal').modal('show');
            $('#course-cost').html(data);
            CKEDITOR.replace( 'editor');
        }
    })
});

/*ONCLICK OPEN COURSE PACKAGE BATCH LIST MODAL*/
$(document).on('click','.packageBatch', function(e){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var id = $(this).attr('data-id');
    var url = $(this).attr('data-href');
    //var url = e.target;
    var csrf_token=$('meta[name="csrf_token"]').attr('content');
    $.ajax({
        url:url,
        type:"POST",
        data: {
            "id": id,
            "_token": csrf_token,
        },
        success:function(data) {
            $('#course_cost_modal').modal('show');
            $('#course-cost').html(data);
        }
    })
});

/*ONCLICK OPEN COURSE PACKAGE BATCH ADD FORM MODAL*/
$(document).on('click','.addPackageBatch', function(e){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var id = $(this).attr('data-id');
    var url = $(this).attr('data-href');
    //var url = e.target;
    var csrf_token=$('meta[name="csrf_token"]').attr('content');
    $.ajax({
        url:url,
        type:"POST",
        data: {
            "id": id,
            "_token": csrf_token,
        },
        success:function(data) {
            $('#course_cost_modal').modal('show');
            $('#course-cost').html(data);
        }
    })
});

/*ONCLICK OPEN COURSE PACKAGE BATCH EDIT FORM MODAL*/
$(document).on('click','.editPackageBatch', function(e){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var id = $(this).attr('data-id');
    var url = $(this).attr('data-href');
    //var url = e.target;
    var csrf_token=$('meta[name="csrf_token"]').attr('content');
    $.ajax({
        url:url,
        type:"POST",
        data: {
            "id": id,
            "_token": csrf_token,
        },
        success:function(data) {
            $('#course_cost_modal').modal('show');
            $('#course-cost').html(data);
        }
    })
});

/*ONCLICK OPEN COURSE PACKAGE BATCH WISE STUDENT LIST MODAL*/
$(document).on('click','.packageBatchStudentMapping', function(e){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var id = $(this).attr('data-id');
    var url = $(this).attr('data-href');
    //var url = e.target;
    var csrf_token=$('meta[name="csrf_token"]').attr('content');
    $.ajax({
        url:url,
        type:"POST",
        data: {
            "id": id,
            "_token": csrf_token,
        },
        success:function(data) {
            $('#course_cost_modal').modal('show');
            $('#course-cost').html(data);
        }
    })
});

/*ONCLICK OPEN COURSE PACKAGE BATCH WISE STUDENT ADD FORM MODAL*/
$(document).on('click','.addPackageBatchStudent', function(e){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var id = $(this).attr('data-id');
    var url = $(this).attr('data-href');
    //var url = e.target;
    var csrf_token=$('meta[name="csrf_token"]').attr('content');
    $.ajax({
        url:url,
        type:"POST",
        data: {
            "id": id,
            "_token": csrf_token,
        },
        success:function(data) {
            $('#course_cost_modal').modal('show');
            $('#course-cost').html(data);
        }
    })
});

/*ONCLICK OPEN COURSE PACKAGE QUIZ LIST MODAL*/
$(document).on('click','.packageQuiz', function(e){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var id = $(this).attr('data-id');
    var url = $(this).attr('data-href');
    //var url = e.target;
    var csrf_token=$('meta[name="csrf_token"]').attr('content');
    $.ajax({
        url:url,
        type:"POST",
        data: {
            "id": id,
            "_token": csrf_token,
        },
        success:function(data) {
            $('#course_cost_modal').modal('show');
            $('#course-cost').html(data);
        }
    })
});

/*ONCLICK OPEN PACKAGE QUIZ ADD FORM MODAL*/
$(document).on('click','.addPackageQuiz', function(e){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var id = $(this).attr('data-id');
    var url = $(this).attr('data-href');
    //var url = e.target;
    var csrf_token=$('meta[name="csrf_token"]').attr('content');
    $.ajax({
        url:url,
        type:"POST",
        data: {
            "id": id,
            "_token": csrf_token,
        },
        success:function(data) {
            $('#course_cost_modal').modal('show');
            $('#course-cost').html(data);
        }
    })
});

/*ONCLICK OPEN PACKAGE QUIZ EDIT FORM MODAL*/
$(document).on('click','.editPackageQuiz', function(e){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var id = $(this).attr('data-id');
    var url = $(this).attr('data-href');
    //var url = e.target;
    var csrf_token=$('meta[name="csrf_token"]').attr('content');
    $.ajax({
        url:url,
        type:"POST",
        data: {
            "id": id,
            "_token": csrf_token,
        },
        success:function(data) {
            $('#course_cost_modal').modal('show');
            $('#course-cost').html(data);
        }
    })
});

/*ONCLICK OPEN PACKAGE QUIZ QUESTION LIST MODAL*/
$(document).on('click','.packageQuizQuestions', function(e){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var id = $(this).attr('data-id');
    var url = $(this).attr('data-href');
    //var url = e.target;
    var csrf_token=$('meta[name="csrf_token"]').attr('content');
    $.ajax({
        url:url,
        type:"POST",
        data: {
            "id": id,
            "_token": csrf_token,
        },
        success:function(data) {
            $('#course_cost_modal').modal('show');
            $('#course-cost').html(data);
        }
    })
});


/*ONCLICK OPEN PACKAGE QUIZ QUESTION ADD FORM MODAL*/
$(document).on('click','.addPackageQuizQuestion', function(e){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var id = $(this).attr('data-id');
    var url = $(this).attr('data-href');
    //var url = e.target;
    var csrf_token=$('meta[name="csrf_token"]').attr('content');
    $.ajax({
        url:url,
        type:"POST",
        data: {
            "id": id,
            "_token": csrf_token,
        },
        success:function(data) {
            $('#course_cost_modal').modal('show');
            $('#course-cost').html(data);
        }
    })
});

/*ONCLICK OPEN PACKAGE QUIZ QUESTION EDIT FORM MODAL*/
$(document).on('click','.editPackageQuizQuestion', function(e){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var id = $(this).attr('data-id');
    var url = $(this).attr('data-href');
    //var url = e.target;
    var csrf_token=$('meta[name="csrf_token"]').attr('content');
    $.ajax({
        url:url,
        type:"POST",
        data: {
            "id": id,
            "_token": csrf_token,
        },
        success:function(data) {
            $('#course_cost_modal').modal('show');
            $('#course-cost').html(data);
        }
    })
});

/*ONCLICK OPEN PACKAGE ASSIGNMENT LIST MODAL*/
$(document).on('click','.packageAssignment', function(e){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var id = $(this).attr('data-id');
    var url = $(this).attr('data-href');
    //var url = e.target;
    var csrf_token=$('meta[name="csrf_token"]').attr('content');
    $.ajax({
        url:url,
        type:"POST",
        data: {
            "id": id,
            "_token": csrf_token,
        },
        success:function(data) {
            $('#course_cost_modal').modal('show');
            $('#course-cost').html(data);
        }
    })
});

/*ONCLICK OPEN PACKAGE ASSIGNMENT ADD FORM MODAL*/
$(document).on('click','.addPackageAssignment', function(e){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var id = $(this).attr('data-id');
    var url = $(this).attr('data-href');
    //var url = e.target;
    var csrf_token=$('meta[name="csrf_token"]').attr('content');
    $.ajax({
        url:url,
        type:"POST",
        data: {
            "id": id,
            "_token": csrf_token,
        },
        success:function(data) {
            $('#course_cost_modal').modal('show');
            $('#course-cost').html(data);
            CKEDITOR.replace( 'editor');
        }
    })
});

/*ONCLICK OPEN PACKAGE ASSIGNMENT EDIT FORM MODAL*/
$(document).on('click','.editPackageAssignment', function(e){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var id = $(this).attr('data-id');
    var url = $(this).attr('data-href');
    //var url = e.target;
    var csrf_token=$('meta[name="csrf_token"]').attr('content');
    $.ajax({
        url:url,
        type:"POST",
        data: {
            "id": id,
            "_token": csrf_token,
        },
        success:function(data) {
            $('#course_cost_modal').modal('show');
            $('#course-cost').html(data);
            CKEDITOR.replace( 'editor');
        }
    })
});

/*ONCLICK OPEN PACKAGE ASSIGNMENT SUBMIT FORM BY STUDENT MODAL*/
$(document).on('click','.startPackageAssignment', function(e){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var id = $(this).attr('data-id');
    var url = $(this).attr('data-href');
    //var url = e.target;
    var csrf_token=$('meta[name="csrf_token"]').attr('content');
    $.ajax({
        url:url,
        type:"POST",
        data: {
            "id": id,
            "_token": csrf_token,
        },
        success:function(data) {
            $('#course_cost_modal').modal('show');
            $('#course-cost').html(data);
        }
    })
});

/*ONCLICK OPEN COURSE QUIZ LIST FOR STUDENT MODAL*/
$(document).on('click','.studentQuiz', function(e){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var id = $(this).attr('data-id');
    var stdID = $(this).attr('data-stdID');
    var url = $(this).attr('data-href');
    //var url = e.target;
    var csrf_token=$('meta[name="csrf_token"]').attr('content');
    $.ajax({
        url:url,
        type:"POST",
        data: {
            "id": id,
            "stdID": stdID,
            "_token": csrf_token,
        },
        success:function(data) {
            $('#course_cost_modal').modal('show');
            $('#course-cost').html(data);
        }
    })
});

/*ONCLICK OPEN COURSE QUIZ ANSWER FROM STUDENT MODAL*/
$(document).on('click','.courseQuizAnswers', function(e){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var id = $(this).attr('data-id');
    var stdID = $(this).attr('data-stdID');
    var url = $(this).attr('data-href');
    //var url = e.target;
    var csrf_token=$('meta[name="csrf_token"]').attr('content');
    $.ajax({
        url:url,
        type:"POST",
        data: {
            "id": id,
            "stdID": stdID,
            "_token": csrf_token,
        },
        success:function(data) {
            $('#course_cost_modal').modal('show');
            $('#course-cost').html(data);
        }
    })
});

/*ONCLICK OPEN COURSE ASSIGNMENT FROM STUDENT MODAL*/
$(document).on('click','.studentAssignment', function(e){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var id = $(this).attr('data-id');
    var url = $(this).attr('data-href');
    //var url = e.target;
    var csrf_token=$('meta[name="csrf_token"]').attr('content');
    $.ajax({
        url:url,
        type:"POST",
        data: {
            "id": id,
            "_token": csrf_token,
        },
        success:function(data) {
            $('#course_cost_modal').modal('show');
            $('#course-cost').html(data);
        }
    })
});

/*ONCLICK OPEN STUDENT MURKS LIST OF COURSE MODAL*/
$(document).on('click','.studentMarks', function(e){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var id = $(this).attr('data-id');
    var stdID = $(this).attr('data-stdID');
    var url = $(this).attr('data-href');
    //var url = e.target;
    var csrf_token=$('meta[name="csrf_token"]').attr('content');
    $.ajax({
        url:url,
        type:"POST",
        data: {
            "id": id,
            "stdID": stdID,
            "_token": csrf_token,
        },
        success:function(data) {
            $('#course_cost_modal').modal('show');
            $('#course-cost').html(data);
        }
    })
});

/*ONCLICK OPEN ADD STUDENT MURKS OF COURSE MODAL*/
$(document).on('click','.addStudentMarks', function(e){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var id = $(this).attr('data-id');
    var stdID = $(this).attr('data-stdID');
    var url = $(this).attr('data-href');
    //var url = e.target;
    var csrf_token=$('meta[name="csrf_token"]').attr('content');
    $.ajax({
        url:url,
        type:"POST",
        data: {
            "id": id,
            "stdID": stdID,
            "_token": csrf_token,
        },
        success:function(data) {
            $('#course_cost_modal').modal('show');
            $('#course-cost').html(data);
        }
    })
});

/*ONCLICK OPEN PACKAGE QUIZ LIST FOR STUDENT MODAL*/
$(document).on('click','.studentPackageQuiz', function(e){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var id = $(this).attr('data-id');
    var stdID = $(this).attr('data-stdID');
    var url = $(this).attr('data-href');
    //var url = e.target;
    var csrf_token=$('meta[name="csrf_token"]').attr('content');
    $.ajax({
        url:url,
        type:"POST",
        data: {
            "id": id,
            "stdID": stdID,
            "_token": csrf_token,
        },
        success:function(data) {
            $('#course_cost_modal').modal('show');
            $('#course-cost').html(data);
        }
    })
});

/*ONCLICK OPEN PACKAGE QUIZ ANSWER FROM STUDENT MODAL*/
$(document).on('click','.packageQuizAnswers', function(e){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var id = $(this).attr('data-id');
    var stdID = $(this).attr('data-stdID');
    var url = $(this).attr('data-href');
    //var url = e.target;
    var csrf_token=$('meta[name="csrf_token"]').attr('content');
    $.ajax({
        url:url,
        type:"POST",
        data: {
            "id": id,
            "stdID": stdID,
            "_token": csrf_token,
        },
        success:function(data) {
            $('#course_cost_modal').modal('show');
            $('#course-cost').html(data);
        }
    })
});

/*ONCLICK OPEN PACKAGE ASSIGNMENT FROM STUDENT MODAL*/
$(document).on('click','.studentPackageAssignment', function(e){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var id = $(this).attr('data-id');
    var url = $(this).attr('data-href');
    //var url = e.target;
    var csrf_token=$('meta[name="csrf_token"]').attr('content');
    $.ajax({
        url:url,
        type:"POST",
        data: {
            "id": id,
            "_token": csrf_token,
        },
        success:function(data) {
            $('#course_cost_modal').modal('show');
            $('#course-cost').html(data);
        }
    })
});

/*ONCLICK OPEN STUDENT PACKAGE MURKS LIST OF COURSE MODAL*/
$(document).on('click','.studentPackageMarks', function(e){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var id = $(this).attr('data-id');
    var stdID = $(this).attr('data-stdID');
    var url = $(this).attr('data-href');
    //var url = e.target;
    var csrf_token=$('meta[name="csrf_token"]').attr('content');
    $.ajax({
        url:url,
        type:"POST",
        data: {
            "id": id,
            "stdID": stdID,
            "_token": csrf_token,
        },
        success:function(data) {
            $('#course_cost_modal').modal('show');
            $('#course-cost').html(data);
        }
    })
});

/*ONCLICK OPEN ADD STUDENT PACKAGE MURKS OF COURSE MODAL*/
$(document).on('click','.addStudentPackageMarks', function(e){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var id = $(this).attr('data-id');
    var stdID = $(this).attr('data-stdID');
    var url = $(this).attr('data-href');
    //var url = e.target;
    var csrf_token=$('meta[name="csrf_token"]').attr('content');
    $.ajax({
        url:url,
        type:"POST",
        data: {
            "id": id,
            "stdID": stdID,
            "_token": csrf_token,
        },
        success:function(data) {
            $('#course_cost_modal').modal('show');
            $('#course-cost').html(data);
        }
    })
});

/*ONCLICK OPEN TEACHERS COURSE COMMISSION MODAL*/
$(document).on('click','.courseCommission', function(e){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var id = $(this).attr('data-id');
    var url = $(this).attr('data-href');
    //var url = e.target;
    var csrf_token=$('meta[name="csrf_token"]').attr('content');
    $.ajax({
        url:url,
        type:"POST",
        data: {
            "id": id,
            "_token": csrf_token,
        },
        success:function(data) {
            $('#course_cost_modal').modal('show');
            $('#course-cost').html(data);
        }
    })
});

/*ONCLICK OPEN TEACHERS PAYMENT HISTORY MODAL*/
$(document).on('click','.paymentHistory', function(e){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var id = $(this).attr('data-id');
    var url = $(this).attr('data-href');
    //var url = e.target;
    var csrf_token=$('meta[name="csrf_token"]').attr('content');
    $.ajax({
        url:url,
        type:"POST",
        data: {
            "id": id,
            "_token": csrf_token,
        },
        success:function(data) {
            $('#course_cost_modal').modal('show');
            $('#course-cost').html(data);
        }
    })
});

/*ONCLICK OPEN AGENTS REFERRED STUDENT LIST MODAL*/
$(document).on('click','.agentReferredStudent', function(e){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var id = $(this).attr('data-id');
    var url = $(this).attr('data-href');
    //var url = e.target;
    var csrf_token=$('meta[name="csrf_token"]').attr('content');
    $.ajax({
        url:url,
        type:"POST",
        data: {
            "id": id,
            "_token": csrf_token,
        },
        success:function(data) {
            $('#course_cost_modal').modal('show');
            $('#course-cost').html(data);
        }
    })
});

/*ONCLICK REQUEST FOR WITHDRAW*/
$(document).on('click','.withdrawRequest', function(e){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var amount = $(this).attr('data-amount');
    var url = $(this).attr('data-href');

    //var url = e.target;
    var csrf_token=$('meta[name="csrf_token"]').attr('content');
    $.ajax({
        url:url,
        type:"POST",
        data: {
            "amount": amount,
            "_token": csrf_token,
        },
        success:function(data) {
            location.reload();
        }
    })
});

/*ONCLICK OPEN VIDEO SHOW MODAL*/
$(document).on('click','.showVideo', function(e){
    var url = $(this).attr('data-href');

    $('#video-show-modal').modal({
        backdrop: 'static',
        keyboard: false
    });
    $('#show-video').prepend('<div style="margin-bottom: 20px" class="modal-header"><button type="button" class="close" data-dismiss="modal">&times;</button></div><iframe width="100%" height="420" src="http://www.youtube.com/embed/'+url+'"></iframe>');

});

/*ONCLICK CLOSE MODAL RELOAD WINDOWS*/
$(document).on('click','.close', function(e){
    location.reload();
});

/*ADD LIST ICON*/
$( document ).ready(function() {
    $('.list-icon-style').find('ul').addClass('list list-icons');
    $('.list-icon-style').find('ol').addClass('list list-icons');
    $('.list-icon-style').find('li').prepend('<i class="icon-checkmark3 text-success position-left"></i>');
});

/*ON SUBMIT COURSE SEARCH RESULT FOR STUDENT DASHBOARD*/
$(document).on('submit','#search_form', function(e){
    e.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var subcategory = $('#subcategory').val();
    var institution_type_id = $('#institution_type_id').val();
    var type = $('#type').val();
    var url = $(this).attr('data-href');

    //var url = e.target;
    var csrf_token=$('meta[name="csrf_token"]').attr('content');
    $.ajax({
        url: url,
        type: 'POST',
        data: {
            "subcategory": subcategory,
            "institution_type_id": institution_type_id,
            "type": type,
            "_token": csrf_token,
        },
        success:function(data)
        {
            $('.course_search_result').html(data);
        }
    })
});





