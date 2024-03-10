@php
    $logo = \App\Models\Setting::find(1);
@endphp

<!--begin::Footer-->
<div id="kt_app_footer" class="app-footer">
    <!--begin::Footer container-->
    <div class="app-container container-fluid d-flex flex-column flex-md-row flex-center flex-md-stack py-3">
        <!--begin::Copyright-->
        <div class="text-dark order-2 order-md-1 mt-15">
            {{-- <span class="text-muted fw-semibold me-1">2023 &copy;</span> --}}
            @if(isset($logo->footer_text))
            <a href="#" target="_blank" class="text-gray-800 text-hover-primary">@if(isset($logo->footer_text)) {{$logo->footer_text}} @endif</a>
            @else
            <a href="#" target="_blank" class="text-gray-800 text-hover-primary"> 2023 @ Metronic</a>
            @endif
        </div>
        <!--end::Copyright-->
        <!--begin::Menu-->
        {{-- <ul class="menu menu-gray-600 menu-hover-primary fw-semibold order-1">
            <li class="menu-item">
                <a href="https://keenthemes.com" target="_blank" class="menu-link px-2">About</a>
            </li>
            <li class="menu-item">
                <a href="https://devs.keenthemes.com" target="_blank" class="menu-link px-2">Support</a>
            </li>
            <li class="menu-item">
                <a href="https://1.envato.market/EA4JP" target="_blank" class="menu-link px-2">Purchase</a>
            </li>
        </ul> --}}
        <!--end::Menu-->
    </div>
    <!--end::Footer container-->
</div>
<!--end::Footer-->
</div>
<!--end:::Main-->
</div>
<!--end::Wrapper-->
</div>
<!--end::Page-->
</div>

<!--end::Modal - Invite Friend-->
<!--end::Modals-->
<!--begin::Javascript-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>var hostUrl = "assets/";</script>
<!--begin::Global Javascript Bundle(mandatory for all pages)-->
<script src="{{asset('admin/dist/assets/plugins/global/plugins.bundle.js')}}"></script>
<script src="{{asset('admin/dist/assets/js/scripts.bundle.js')}}"></script>
<!--end::Global Javascript Bundle-->
<!--begin::Vendors Javascript(used for this page only)-->
<script src="{{asset('admin/dist/assets/plugins/custom/fullcalendar/fullcalendar.bundle.js')}}"></script>
<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
<script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
<script src="https://cdn.amcharts.com/lib/5/radar.js"></script>
<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
<script src="https://cdn.amcharts.com/lib/5/map.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/worldLow.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/continentsLow.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/usaLow.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZonesLow.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZoneAreasLow.js"></script>
<script src="{{asset('admin/dist/assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
<script src="{{asset('admin/dist/assets/plugins/custom/formrepeater/formrepeater.bundle.js')}}"></script>
<!--end::Vendors Javascript-->
<!--begin::Custom Javascript(used for this page only)-->
<script src="{{asset('admin/dist/assets/js/custom/apps/ecommerce/catalog/save-category.js')}}"></script>
<script src="{{asset('admin/dist/assets/js/custom/apps/ecommerce/catalog/save-product.js')}}"></script>
{{-- product list js --}}
<script src="{{asset('admin/dist/assets/js/custom/apps/ecommerce/catalog/products.js')}}"></script>
<script src="{{asset('admin/dist/assets/js/custom/account/settings/signin-methods.js')}}"></script>
<script src="{{asset('admin/dist/assets/js/custom/account/settings/profile-details.js')}}"></script>
<script src="{{asset('admin/dist/assets/js/custom/account/settings/deactivate-account.js')}}"></script>
{{-- user list --}}
<script src="{{asset('admin/dist/assets/js/custom/apps/user-management/users/list/table.js')}}"></script>
<script src="{{asset('admin/dist/assets/js/custom/apps/user-management/users/list/export-users.js')}}"></script>
<script src="{{asset('admin/dist/assets/js/custom/apps/user-management/users/list/add.js')}}"></script>
<script src="{{asset('admin/dist/assets/js/widgets.bundle.js')}}"></script>
<script src="{{asset('admin/dist/assets/js/custom/widgets.js')}}"></script>
<script src="{{asset('admin/dist/assets/js/custom/apps/chat/chat.js')}}"></script>
<script src="{{asset('admin/dist/assets/js/custom/utilities/modals/upgrade-plan.js')}}"></script>
<script src="{{asset('admin/dist/assets/js/custom/utilities/modals/create-campaign.js')}}"></script>
<script src="{{asset('admin/dist/assets/js/custom/utilities/modals/users-search.js')}}"></script>
<script src="{{asset('admin/dist/assets/js/custom/apps/user-management/permissions/list.js')}}"></script>
<script src="{{asset('admin/dist/assets/js/custom/apps/user-management/permissions/add-permission.js')}}"></script>
<script src="{{asset('admin/dist/assets/js/custom/apps/user-management/permissions/update-permission.js')}}"></script>
<!-- validation cdn -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
{{-- <script type="text/javascript" src="{{ asset('js/registervalidation.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/edituservalidation.js') }}"></script> --}}
<script type="text/javascript" src="{{ asset('js/usermanage.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/usermanageEdit.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/Employee.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/EmployeeEdit.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/Category.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/CategoryEdit.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/Product.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/ProductEdit.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/Setting.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/Profile.js') }}"></script>



<script>
    $("document").ready(function(){
     setTimeout(function(){
        $("div.alert").remove();
     }, 3000 );
 });

// Role
document.addEventListener('DOMContentLoaded', () => {
 const deleteButtons = document.querySelectorAll('.role_delete_btn');

 deleteButtons.forEach((button) => {
     button.addEventListener('click', (event) => {
         event.preventDefault();

         const itemId = button.getAttribute('data-id');

         Swal.fire({
             title: 'Are you sure?',
             text: 'You won\'t be able to revert this!',
             icon: 'warning',
             showCancelButton: true,
             confirmButtonColor: '#d33',
             cancelButtonColor: '#3085d6',
             confirmButtonText: 'Yes, delete it!'
         }).then((result) => {
             if (result.isConfirmed) {
                 // If confirmed, submit the form for deletion
                 const form = document.createElement('form');
                 form.action = `/admin/roles/delete/${itemId}`;
                 form.method = 'POST';
                 form.innerHTML = `
                     @csrf
                     @method('DELETE')
                 `;
                 document.body.appendChild(form);
                 form.submit();
             }
         });
     });
 });

});

// permission
document.addEventListener('DOMContentLoaded', () => {
 const deleteButtons = document.querySelectorAll('.permission_delete_btn');

 deleteButtons.forEach((button) => {
     button.addEventListener('click', (event) => {
         event.preventDefault();

         const itemId = button.getAttribute('data-id');

         Swal.fire({
             title: 'Are you sure?',
             text: 'You won\'t be able to revert this!',
             icon: 'warning',
             showCancelButton: true,
             confirmButtonColor: '#d33',
             cancelButtonColor: '#3085d6',
             confirmButtonText: 'Yes, delete it!'
         }).then((result) => {
             if (result.isConfirmed) {
                 // If confirmed, submit the form for deletion
                 const form = document.createElement('form');
                 form.action = `/admin/permissions/delete/${itemId}`;
                 form.method = 'POST';
                 form.innerHTML = `
                     @csrf
                     @method('DELETE')
                 `;
                 document.body.appendChild(form);
                 form.submit();
             }
         });
     });
  });
});

// Category
document.addEventListener('DOMContentLoaded', () => {
 const deleteButtons = document.querySelectorAll('.cat_delete_btn');

 deleteButtons.forEach((button) => {
     button.addEventListener('click', (event) => {
         event.preventDefault();

         const itemId = button.getAttribute('data-id');

         Swal.fire({
             title: 'Are you sure?',
             text: 'You won\'t be able to revert this!',
             icon: 'warning',
             showCancelButton: true,
             confirmButtonColor: '#d33',
             cancelButtonColor: '#3085d6',
             confirmButtonText: 'Yes, delete it!'
         }).then((result) => {
             if (result.isConfirmed) {
                 // If confirmed, submit the form for deletion
                 const form = document.createElement('form');
                 form.action = `/admin/category/delete/${itemId}`;
                 form.method = 'POST';
                 form.innerHTML = `
                     @csrf
                     @method('DELETE')
                 `;
                 document.body.appendChild(form);
                 form.submit();
             }
         });
     });
  });
});

// product
document.addEventListener('DOMContentLoaded', () => {
 const deleteButtons = document.querySelectorAll('.prod_delete_btn');

 deleteButtons.forEach((button) => {
     button.addEventListener('click', (event) => {
         event.preventDefault();

         const itemId = button.getAttribute('data-id');

         Swal.fire({
             title: 'Are you sure?',
             text: 'You won\'t be able to revert this!',
             icon: 'warning',
             showCancelButton: true,
             confirmButtonColor: '#d33',
             cancelButtonColor: '#3085d6',
             confirmButtonText: 'Yes, delete it!'
         }).then((result) => {
             if (result.isConfirmed) {
                 // If confirmed, submit the form for deletion
                 const form = document.createElement('form');
                 form.action = `/admin/product/delete/${itemId}`;
                 form.method = 'POST';
                 form.innerHTML = `
                     @csrf
                     @method('DELETE')
                 `;
                 document.body.appendChild(form);
                 form.submit();
             }
         });
     });
  });
});

// User
document.addEventListener('DOMContentLoaded', () => {
 const deleteButtons = document.querySelectorAll('.user_delete_btn');

 deleteButtons.forEach((button) => {
     button.addEventListener('click', (event) => {
         event.preventDefault();

         const itemId = button.getAttribute('data-id');

         Swal.fire({
             title: 'Are you sure?',
             text: 'You won\'t be able to revert this!',
             icon: 'warning',
             showCancelButton: true,
             confirmButtonColor: '#d33',
             cancelButtonColor: '#3085d6',
             confirmButtonText: 'Yes, delete it!'
         }).then((result) => {
             if (result.isConfirmed) {
                 // If confirmed, submit the form for deletion
                 const form = document.createElement('form');
                 form.action = `/admin/users/delete/${itemId}`;
                 form.method = 'POST';
                 form.innerHTML = `
                     @csrf
                     @method('DELETE')
                 `;
                 document.body.appendChild(form);
                 form.submit();
             }
         });
     });
  });
});


// Employee
document.addEventListener('DOMContentLoaded', () => {
 const deleteButtons = document.querySelectorAll('.emp_delete_btn');

 deleteButtons.forEach((button) => {
     button.addEventListener('click', (event) => {
         event.preventDefault();

         const itemId = button.getAttribute('data-id');

         Swal.fire({
             title: 'Are you sure?',
             text: 'You won\'t be able to revert this!',
             icon: 'warning',
             showCancelButton: true,
             confirmButtonColor: '#d33',
             cancelButtonColor: '#3085d6',
             confirmButtonText: 'Yes, delete it!'
         }).then((result) => {
             if (result.isConfirmed) {
                 // If confirmed, submit the form for deletion
                 const form = document.createElement('form');
                 form.action = `/admin/employee/delete/${itemId}`;
                 form.method = 'POST';
                 form.innerHTML = `
                     @csrf
                     @method('DELETE')
                 `;
                 document.body.appendChild(form);
                 form.submit();
             }
         });
     });
  });
});

document.addEventListener("DOMContentLoaded", function() {
        var yesRadio = document.getElementById('warranty_yes');
        var noRadio = document.getElementById('warranty_no');
        var warranty_model1 = document.getElementById('warranty_model1');
        var warranty_model2 = document.getElementById('warranty_model2');
        var warranty_model3 = document.getElementById('warranty_model3');

        if (yesRadio.checked) {
            warranty_model1.classList.remove('d-none');
            warranty_model2.classList.remove('d-none');
            warranty_model3.classList.remove('d-none');
        }

        if (noRadio.checked) {
            warranty_model1.classList.add('d-none');
            warranty_model2.classList.add('d-none');
            warranty_model3.classList.add('d-none');
        }

        yesRadio.addEventListener('change', function() {
            if (yesRadio.checked) {
                warranty_model1.classList.remove('d-none');
                warranty_model2.classList.remove('d-none');
                warranty_model3.classList.remove('d-none');
            }
        });

        noRadio.addEventListener('change', function() {
            if (noRadio.checked) {
                warranty_model1.classList.add('d-none');
                warranty_model2.classList.add('d-none');
                warranty_model3.classList.add('d-none');
            }
        });
    });

// document.addEventListener("change", function() {
//     let date11 = document.getElementById('start_date');
//     let date22= document.getElementById('end_date');

// });






</script>
@yield('script')
</body>
<!--end::Body-->
</html>
