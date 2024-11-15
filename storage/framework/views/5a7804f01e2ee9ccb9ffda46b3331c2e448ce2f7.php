<?php $__env->startSection('body'); ?>
    main
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main-content'); ?>
    <?php echo $__env->make('includes.mobile-nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="flex">

        <!-- BEGIN: Side Menu -->
        <?php echo $__env->make('includes.side-nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="content">
            <!-- BEGIN: Top Bar -->
            <div class="top-bar">
                <!-- BEGIN: Breadcrumb -->
                <div class="-intro-x breadcrumb mr-auto hidden sm:flex"> <a href="">Application</a> <i
                        data-feather="chevron-right" class="breadcrumb__icon"></i> <a href=""
                        class="breadcrumb--active">Customer</a> </div>
                <!-- END: Breadcrumb -->
                <!-- BEGIN: Search -->
                <div class="intro-x relative mr-3 sm:mr-6">
                    <div class="search hidden sm:block">
                        <input type="text" class="search__input form-control border-transparent placeholder-theme-13"
                            placeholder="Search...">
                        <i data-feather="search" class="search__icon dark:text-gray-300"></i>
                    </div>
                    <a class="notification sm:hidden" href=""> <i data-feather="search"
                            class="notification__icon dark:text-gray-300"></i> </a>
                    <div class="search-result">
                        <div class="search-result__content">
                            <div class="search-result__content__title">Pages</div>
                            <div class="mb-5">
                                <a href="" class="flex items-center">
                                    <div
                                        class="w-8 h-8 bg-theme-18 text-theme-9 flex items-center justify-center rounded-full">
                                        <i class="w-4 h-4" data-feather="inbox"></i> </div>
                                    <div class="ml-3">Mail Settings</div>
                                </a>
                                <a href="" class="flex items-center mt-2">
                                    <div
                                        class="w-8 h-8 bg-theme-17 text-theme-11 flex items-center justify-center rounded-full">
                                        <i class="w-4 h-4" data-feather="users"></i> </div>
                                    <div class="ml-3">Users & Permissions</div>
                                </a>
                                <a href="" class="flex items-center mt-2">
                                    <div
                                        class="w-8 h-8 bg-theme-14 text-theme-10 flex items-center justify-center rounded-full">
                                        <i class="w-4 h-4" data-feather="credit-card"></i> </div>
                                    <div class="ml-3">Transactions Report</div>
                                </a>
                            </div>
                            <div class="search-result__content__title">Users</div>
                            <div class="mb-5">
                                <a href="" class="flex items-center mt-2">
                                    <div class="w-8 h-8 image-fit">
                                        <img alt="Nowshera Tailwind HTML Admin Template" class="rounded-full"
                                            src="dist/images/profile-10.jpg">
                                    </div>
                                    <div class="ml-3">Charlize Theron</div>
                                    <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">
                                        charlizetheron@left4code.com</div>
                                </a>
                                <a href="" class="flex items-center mt-2">
                                    <div class="w-8 h-8 image-fit">
                                        <img alt="Nowshera Tailwind HTML Admin Template" class="rounded-full"
                                            src="dist/images/profile-1.jpg">
                                    </div>
                                    <div class="ml-3">Russell Crowe</div>
                                    <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">
                                        russellcrowe@left4code.com</div>
                                </a>
                                <a href="" class="flex items-center mt-2">
                                    <div class="w-8 h-8 image-fit">
                                        <img alt="Nowshera Tailwind HTML Admin Template" class="rounded-full"
                                            src="dist/images/profile-15.jpg">
                                    </div>
                                    <div class="ml-3">Russell Crowe</div>
                                    <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">
                                        russellcrowe@left4code.com</div>
                                </a>
                                <a href="" class="flex items-center mt-2">
                                    <div class="w-8 h-8 image-fit">
                                        <img alt="Nowshera Tailwind HTML Admin Template" class="rounded-full"
                                            src="dist/images/profile-7.jpg">
                                    </div>
                                    <div class="ml-3">Al Pacino</div>
                                    <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">
                                        alpacino@left4code.com</div>
                                </a>
                            </div>
                            <div class="search-result__content__title">Products</div>
                            <a href="" class="flex items-center mt-2">
                                <div class="w-8 h-8 image-fit">
                                    <img alt="Nowshera Tailwind HTML Admin Template" class="rounded-full"
                                        src="dist/images/preview-1.jpg">
                                </div>
                                <div class="ml-3">Samsung Galaxy S20 Ultra</div>
                                <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">Smartphone &amp; Tablet
                                </div>
                            </a>
                            <a href="" class="flex items-center mt-2">
                                <div class="w-8 h-8 image-fit">
                                    <img alt="Nowshera Tailwind HTML Admin Template" class="rounded-full"
                                        src="dist/images/preview-12.jpg">
                                </div>
                                <div class="ml-3">Samsung Q90 QLED TV</div>
                                <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">Electronic</div>
                            </a>
                            <a href="" class="flex items-center mt-2">
                                <div class="w-8 h-8 image-fit">
                                    <img alt="Nowshera Tailwind HTML Admin Template" class="rounded-full"
                                        src="dist/images/preview-11.jpg">
                                </div>
                                <div class="ml-3">Nike Air Max 270</div>
                                <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">Sport &amp; Outdoor
                                </div>
                            </a>
                            <a href="" class="flex items-center mt-2">
                                <div class="w-8 h-8 image-fit">
                                    <img alt="Nowshera Tailwind HTML Admin Template" class="rounded-full"
                                        src="dist/images/preview-1.jpg">
                                </div>
                                <div class="ml-3">Sony Master Series A9G</div>
                                <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">Electronic</div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- END: Search -->
                <!-- BEGIN: Notifications -->
                <div class="intro-x dropdown mr-auto sm:mr-6">
                    <div class="dropdown-toggle notification notification--bullet cursor-pointer" role="button"
                        aria-expanded="false"> <i data-feather="bell" class="notification__icon dark:text-gray-300"></i>
                    </div>
                    <div class="notification-content pt-2 dropdown-menu">
                        <div class="notification-content__box dropdown-menu__content box dark:bg-dark-6">
                            <div class="notification-content__title">Notifications</div>
                            <div class="cursor-pointer relative flex items-center ">
                                <div class="w-12 h-12 flex-none image-fit mr-1">
                                    <img alt="Nowshera Tailwind HTML Admin Template" class="rounded-full"
                                        src="dist/images/profile-10.jpg">
                                    <div
                                        class="w-3 h-3 bg-theme-9 absolute right-0 bottom-0 rounded-full border-2 border-white">
                                    </div>
                                </div>
                                <div class="ml-2 overflow-hidden">
                                    <div class="flex items-center">
                                        <a href="javascript:;" class="font-medium truncate mr-5">Charlize Theron</a>
                                        <div class="text-xs text-gray-500 ml-auto whitespace-nowrap">05:09 AM</div>
                                    </div>
                                    <div class="w-full truncate text-gray-600 mt-0.5">There are many variations of passages
                                        of Lorem Ipsum available, but the majority have suffered alteration in some form, by
                                        injected humour, or randomi</div>
                                </div>
                            </div>
                            <div class="cursor-pointer relative flex items-center mt-5">
                                <div class="w-12 h-12 flex-none image-fit mr-1">
                                    <img alt="Nowshera Tailwind HTML Admin Template" class="rounded-full"
                                        src="dist/images/profile-1.jpg">
                                    <div
                                        class="w-3 h-3 bg-theme-9 absolute right-0 bottom-0 rounded-full border-2 border-white">
                                    </div>
                                </div>
                                <div class="ml-2 overflow-hidden">
                                    <div class="flex items-center">
                                        <a href="javascript:;" class="font-medium truncate mr-5">Russell Crowe</a>
                                        <div class="text-xs text-gray-500 ml-auto whitespace-nowrap">03:20 PM</div>
                                    </div>
                                    <div class="w-full truncate text-gray-600 mt-0.5">Contrary to popular belief, Lorem
                                        Ipsum is not simply random text. It has roots in a piece of classical Latin
                                        literature from 45 BC, making it over 20</div>
                                </div>
                            </div>
                            <div class="cursor-pointer relative flex items-center mt-5">
                                <div class="w-12 h-12 flex-none image-fit mr-1">
                                    <img alt="Nowshera Tailwind HTML Admin Template" class="rounded-full"
                                        src="dist/images/profile-15.jpg">
                                    <div
                                        class="w-3 h-3 bg-theme-9 absolute right-0 bottom-0 rounded-full border-2 border-white">
                                    </div>
                                </div>
                                <div class="ml-2 overflow-hidden">
                                    <div class="flex items-center">
                                        <a href="javascript:;" class="font-medium truncate mr-5">Russell Crowe</a>
                                        <div class="text-xs text-gray-500 ml-auto whitespace-nowrap">01:10 PM</div>
                                    </div>
                                    <div class="w-full truncate text-gray-600 mt-0.5">Contrary to popular belief, Lorem
                                        Ipsum is not simply random text. It has roots in a piece of classical Latin
                                        literature from 45 BC, making it over 20</div>
                                </div>
                            </div>
                            <div class="cursor-pointer relative flex items-center mt-5">
                                <div class="w-12 h-12 flex-none image-fit mr-1">
                                    <img alt="Nowshera Tailwind HTML Admin Template" class="rounded-full"
                                        src="dist/images/profile-7.jpg">
                                    <div
                                        class="w-3 h-3 bg-theme-9 absolute right-0 bottom-0 rounded-full border-2 border-white">
                                    </div>
                                </div>
                                <div class="ml-2 overflow-hidden">
                                    <div class="flex items-center">
                                        <a href="javascript:;" class="font-medium truncate mr-5">Al Pacino</a>
                                        <div class="text-xs text-gray-500 ml-auto whitespace-nowrap">01:10 PM</div>
                                    </div>
                                    <div class="w-full truncate text-gray-600 mt-0.5">Lorem Ipsum is simply dummy text of
                                        the printing and typesetting industry. Lorem Ipsum has been the industry&#039;s
                                        standard dummy text ever since the 1500</div>
                                </div>
                            </div>
                            <div class="cursor-pointer relative flex items-center mt-5">
                                <div class="w-12 h-12 flex-none image-fit mr-1">
                                    <img alt="Nowshera Tailwind HTML Admin Template" class="rounded-full"
                                        src="dist/images/profile-8.jpg">
                                    <div
                                        class="w-3 h-3 bg-theme-9 absolute right-0 bottom-0 rounded-full border-2 border-white">
                                    </div>
                                </div>
                                <div class="ml-2 overflow-hidden">
                                    <div class="flex items-center">
                                        <a href="javascript:;" class="font-medium truncate mr-5">Johnny Depp</a>
                                        <div class="text-xs text-gray-500 ml-auto whitespace-nowrap">01:10 PM</div>
                                    </div>
                                    <div class="w-full truncate text-gray-600 mt-0.5">It is a long established fact that a
                                        reader will be distracted by the readable content of a page when looking at its
                                        layout. The point of using Lorem </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: Notifications -->
                <!-- BEGIN: Account Menu -->
                <div class="intro-x dropdown w-8 h-8">
                    <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in"
                        role="button" aria-expanded="false">
                        <img alt="Nowshera Tailwind HTML Admin Template" src="dist/images/profile-6.jpg">
                    </div>
                    <div class="dropdown-menu w-56">
                        <div class="dropdown-menu__content box bg-theme-26 dark:bg-dark-6 text-white">
                            <div class="p-4 border-b border-theme-27 dark:border-dark-3">
                                <div class="font-medium">Charlize Theron</div>
                                <div class="text-xs text-theme-28 mt-0.5 dark:text-gray-600">Software Engineer</div>
                            </div>
                            <div class="p-2">
                                <a href=""
                                    class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md">
                                    <i data-feather="user" class="w-4 h-4 mr-2"></i> Profile </a>
                                <a href=""
                                    class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md">
                                    <i data-feather="edit" class="w-4 h-4 mr-2"></i> Add Account </a>
                                <a href=""
                                    class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md">
                                    <i data-feather="lock" class="w-4 h-4 mr-2"></i> Reset Password </a>
                                <a href=""
                                    class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md">
                                    <i data-feather="help-circle" class="w-4 h-4 mr-2"></i> Help </a>
                            </div>
                            <div class="p-2 border-t border-theme-27 dark:border-dark-3">
                                <a href=""
                                    class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md">
                                    <i data-feather="toggle-right" class="w-4 h-4 mr-2"></i> Logout </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: Account Menu -->
            </div>
            <!-- END: Top Bar -->
            <?php if(empty($select)): ?>
                <form method="post" id="tutorial_form" action="<?php echo e(route('videos.store')); ?>" enctype="multipart/form-data">
                <?php else: ?>
                    
                        <input type="hidden" name="id" value="<?php echo e($select->id); ?>">
            <?php endif; ?>

                        <?php echo csrf_field(); ?>
                        <div class="grid">
                            <div class="intro-y flex items-center mt-12">
                                <h2 class="text-lg font-medium mr-auto">
                                    Tutorial Form
                                </h2>
                            </div>

                            <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="intro-y col-span-12 lg:col-span-12">
                            <!-- BEGIN: Input -->
                            <div class="intro-y box">
                                <div id="input" class="p-5">
                                    <div class="preview">
                                        <div class="mt-2 c_name">
                                            <label for="regular-form-2" class="form-label">Tutorial Title</label>
                                            <input required id="regular-form-2" type="text"
                                                value="<?php if(!empty($select)): ?> <?php echo e($select->video_title); ?> <?php endif; ?>"
                                                class="form-control " placeholder="name" name="video_title">
                                        </div>
                                        <div class="mt-2 c_name">
                                            <label for="regular-form-2" class="form-label">Module Name</label>
                                            <input required id="regular-form-2" type="text"
                                                value="<?php if(!empty($select)): ?> <?php echo e($select->module_name); ?> <?php endif; ?>"
                                                class="form-control " placeholder="name" name="module_name">
                                        </div>
                                        <div class="mt-2 c_name">
                                            <label for="regular-form-2" class="form-label">Select Video File</label>
                                            <input required id="regular-form-2" type="file"
                                                class="form-control " placeholder="name" name="video" accept="video/*">
                                        </div>
                                        <div class="btn btn-primary mt-3">
                                            <button type="submit" id="submitBtn"> Submit </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END: Input -->
                        </div>
                    </div>
                        </div>
                </form>
                <?php
                    $yards = DB::table('shipping_line')->get();
                ?>
                <?php if(!Request::is('*shippingLine-edit*')): ?>
                    <div class="grid">
                   <div class="intro-y flex items-center mt-12">
                      <h2 class="text-lg font-medium mr-auto">
                      </h2>
                   </div>
                   <div class="grid grid-cols-12 gap-6 mt-5">
                      <div class="intro-y col-span-12 lg:col-span-12">
                         <!-- BEGIN: Input -->
                         <div class="intro-y box">
                            <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">
                               <h2 class="font-medium text-base mr-auto">
                                  View Tutorials
                               </h2>

                            </div>
                            <div id="input" class="p-5">
                                <div class="preview">
                                    <table id="vehicleTypeTable" class="display nowrap" style="width:100%">
                                   <thead>
                                      <tr>
                                         <th>Module</th>
                                         <th>Vido</th>
                                         <th>Action</th>
                                      </tr>
                                   </thead>
                                   <tbody>
                                          <?php $__currentLoopData = $tutorials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tut): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                          <tr>
                                                <td><?php echo e($tut->module_name); ?></td>
                                                <td class="video-cell" data-video="<?php echo e(asset($tut->video_path)); ?>" style="cursor: pointer;">Watch Video</td>
                                                <td>
                                                    
                                                </td>
                                             </td>
                                          </tr>
                                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                   </tbody>
                                </table>
                             </div>
                             <style>
                                /* Custom styles for the video modal */
                                .modal-video {
                                    background-color: rgba(0, 0, 0, 0.8);
                                }
                                .modal-video .modal-content {
                                    border: none;
                                    border-radius: 0;
                                }
                                .modal-video video {
                                    max-width: 100%;
                                    border-radius: 5px;
                                }
                                .custom-centered-modal {
                                    display: flex !important; /* Use flex to center the modal */
                                    align-items: center; /* Center vertically */
                                    justify-content: center; /* Center horizontally */
                                    min-height: 100vh; /* Ensure it covers the full viewport height */
                                    z-index: 1050; /* Ensure the modal is above other content */
                                    position: fixed; /* Position it fixed to the viewport */
                                }
                                .custom-centered-modal .modal-dialog {
                                    max-width: 800px; /* Set a max width for your modal */
                                    width: 100%; /* Full width */
                                }
                            </style>
                             <div class="modal fade modal-video" id="videoModal" tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="videoModalLabel">Video Tutorial</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <video id="videoPlayer" controls>
                                                <source id="videoSource" src="" type="video/mp4">
                                                Your browser does not support the video tag.
                                            </video>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <script>
                                $(document).on('click', '.video-cell', function() {
                                    const videoSrc = $(this).data('video');
                                    $('#videoSource').attr('src', videoSrc);
                                    $('#videoPlayer')[0].load();
                                    $('#videoModal').modal('show');

                                    $('#videoModal').removeClass('modal');
                                    $('.modal-backdrop').remove();

                                });

                                $(document).on('hidden.bs.modal', '#videoModal', function () {
                                    $('#videoPlayer')[0].pause(); // Pause the video when modal is closed
                                    $('#videoSource').attr('src', ''); // Clear the source to reset
                                });

                                $(document).on('click', '.deleteTutorial', function() {
                                    const url = $(this).data('url');
                                    const name = $(this).data('name');
                                    if(confirm(`Are you sure you want to delete the tutorial for ${name}?`)) {
                                        $.ajax({
                                            url: url,
                                            type: 'DELETE',
                                            success: function(result) {
                                                location.reload(); // Refresh the page to see the updated list
                                            },
                                            error: function(err) {
                                                alert('Error deleting the tutorial.');
                                            }
                                        });
                                    }
                                });
                            </script>








                            </div>
                         </div>
                         <!-- END: Input -->
                         <!-- BEGIN: Input Sizing -->
                      </div>
                   </div>
                </div>
                <?php endif; ?>
        </div>

    </div>
    <!-- END: Content -->
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script>
        // Attach event listener to all delete links
        document.querySelectorAll('.deleteShippingLine').forEach(function(element) {
            element.addEventListener('click', function(event) {
                event.preventDefault(); // Prevent default action

                // Get customer name and delete URL from data attributes
                var name = this.getAttribute('data-name');
                var deleteUrl = this.getAttribute('data-url');

                // Call the SweetAlert function with dynamic data
                showSweetAlert('warning', 'Are you sure?', "Do you really want to delete " + name + "?", deleteUrl);
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH H:\xamp_7.2.5\htdocs\projects\software2\sms\resources\views/tutorials/create.blade.php ENDPATH**/ ?>