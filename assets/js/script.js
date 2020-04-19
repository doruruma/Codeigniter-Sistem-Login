$(document).ready(function () {

    $.switcher();   //init plugin checkbox
    const flashdata = $('.flash-data').data('flashdata');
    const type = $('.flash-data').data('type');
    if (flashdata) {
        Swal.fire
            ({
                title: type.toUpperCase(),
                text: flashdata,
                type: type
            });
    }

    $('footer span').addClass('text-primary');

    $('.btn-logout').on('click', function (e) {
        e.preventDefault();
        const href = $(this).attr('href');
        Swal.fire
            ({
                title: 'Are you really want to quit now?',
                type: 'question',
                animation: false,
                customClass: 'animated fadeInDown faster',
                showCancelButton: true,
                confirmButtonText: '<i class="fas fa-fw fa-sign-out-alt"></i> Confirm',
                cancelButtonText: '<i class="fas fa-fw fa-times"></i> Cancel',
            }).then((result) => {       //result bisa apa saja
                if (result.value)    //jika value == true
                {
                    document.location.href = href;
                }
            });
    });
    $('.btn-hapus').on('click', function (e) {
        e.preventDefault();
        const href = $(this).attr('href');
        Swal.fire
            ({
                title: 'Are You Sure?',
                text: 'The data will be removed',
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: '<i class="fas fa-fw fa-check"></i> Confirm',
                cancelButtonText: '<i class="fas fa-fw fa-times"></i> Cancel',
            }).then((result) => {       //result bisa apa saja
                if (result.value)    //jika value == true
                {
                    document.location.href = href;
                }
            });
    });

    //Submenu Page
    $('.btn-edit-submenu').on('click', function () {
        $('.modal-title').html('Edit Submenu');
        const href = $(this).attr('href');
        const id = $(this).data('id');
        $('.form-mod-submenu').attr('action', 'http://localhost/wpu-login/menu/editSubmenu/' + id);
        $.ajax({
            url: href,
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $('#title').val(data.title);
                $('#menu_id').val(data.menu_id);
                $('#url').val(data.url);
                $('#icon').val(data.icon);
            }
        });
    });
    $('.btn-add-submenu').on('click', function () {
        $('.form-mod-submenu').attr('action', 'http://localhost/wpu-login/menu/submenu');
        $('.modal-title').html('Add New Submenu');
        $('#title').val('');
        $('#url').val('');
        $('#icon').val('');
    });


    // Menu Page
    $('.btn-edit-menu').on('click', function () {
        const id = $(this).data('id');
        const href = $(this).attr('href');
        $('.form-mod-menu').attr('action', 'http://localhost/wpu-login/menu/editMenu/' + id);
        $('#modal-title-menu').html('Edit Menu Name');
        $.ajax({
            url: href,
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $('#menu_menu').val(data.menu);
            }
        })
    });
    $('.btn-add-menu').on('click', function () {
        $('#modal-title-menu').html('Add New Menu');
        $('#menu_menu').val('');
    });


    //role page
    $('.btn-add-role').on('click', function () {
        $('#modal-title-role').html('Add Role');
        $('.form-mod-role').attr('action', 'http://localhost/wpu-login/admin/role');
        $('#role_role').val('');
    });
    $('.btn-edit-role').on('click', function () {
        $('#modal-title-role').html('Edit Role Name');
        const id = $(this).data('id');
        const href = $(this).attr('href');
        $('.form-mod-role').attr('action', 'http://localhost/wpu-login/admin/editrole/' + id);
        $('#modal-title-menu').html('Edit Menu Name');
        $.ajax({
            url: href,
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $('#role_role').val(data.role);
            }
        })
    });


    // roleAccess page
    $('.form-check-input').on('click', function () {
        const menuId = $(this).data('menu');
        const roleId = $(this).data('role');
        $.ajax({
            url: 'http://localhost/wpu-login/admin/changeaccess',
            method: 'post',
            data: {
                menuId: menuId,
                roleId: roleId
            },
            success: function () {
                location.reload();
            }
        });
    });


    //edit page
    $('.custom-file-input').on('change', function () {
        const fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass('selected').html(fileName);
    });


});
