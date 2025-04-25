<script src="{{ asset('admin-assets/js/jquery-3.5.1.min.js') }}"></script>
{{--  <script src="{{ asset('admin-assets/js/popper.js') }}"></script>  --}}
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.5/dist/umd/popper.min.js"></script>
<script src="{{ asset('admin-assets/js/bootsrap/bootstrap.min.js') }}"></script>
<script src="{{ asset('admin-assets/js/grid.js') }}"></script>
<script src="{{ asset('admin-assets/select2/js/select2.min.js') }}"></script>
<script src="{{ asset('admin-assets/sweetalert/sweetalert2.min.js') }}"></script>


<script>
    let notificationDropdown = document.getElementById('header-notification-toggle');
    notificationDropdown.addEventListener('click', function () {
        $.ajax({
            type: "post",
            url: '/admin/notification/read-all',
            data: {_token: '{{csrf_token()}}'},
            success : function()
            {
                console.log('yes')
            }
        })
    });
</script>