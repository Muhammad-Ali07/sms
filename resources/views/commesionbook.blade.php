@extends('layouts.master')
@section('body')
main
@endsection
@section('main-content')
@include('includes.mobile-nav')
<div class="flex">
   @include('includes.side-nav')
   <!-- BEGIN: Content -->
   <style>
      .SubmitClass_SVG {
      padding: 10px 10px;
      width: 100%;
      max-width: 120px;
      text-transform: uppercase;
      background: #6c0606;
      border-radius: 4px 4px;
      color: #fff;
      letter-spacing: 1px;
      }
   </style>
   <div class="content">
      <!-- BEGIN: Top Bar -->
      <h3 class="page-title text-lg font-medium mr-auto">
         Commision Book
      </h3>
      <div class="top-bar">
         <!-- BEGIN: Breadcrumb -->
         <div class="-intro-x breadcrumb mr-auto hidden sm:flex"> <a href="">Application</a> <i data-feather="chevron-right" class="breadcrumb__icon"></i> <a href="" class="breadcrumb--active">Commission Book</a> </div>
         <!-- END: Breadcrumb -->
         <!-- BEGIN: Search -->
         <div class="intro-x relative mr-3 sm:mr-6">
            <div class="search hidden sm:block">
               <input type="text" class="search__input form-control border-transparent placeholder-theme-13" placeholder="Search...">
               <i data-feather="search" class="search__icon dark:text-gray-300"></i>
            </div>
            <a class="notification sm:hidden" href=""> <i data-feather="search" class="notification__icon dark:text-gray-300"></i> </a>
            <div class="search-result">
               <div class="search-result__content">
                  <div class="search-result__content__title">Pages</div>
                  <div class="mb-5">
                     <a href="" class="flex items-center">
                        <div class="w-8 h-8 bg-theme-18 text-theme-9 flex items-center justify-center rounded-full"> <i class="w-4 h-4" data-feather="inbox"></i> </div>
                        <div class="ml-3">Mail Settings</div>
                     </a>
                     <a href="" class="flex items-center mt-2">
                        <div class="w-8 h-8 bg-theme-17 text-theme-11 flex items-center justify-center rounded-full"> <i class="w-4 h-4" data-feather="users"></i> </div>
                        <div class="ml-3">Users & Permissions</div>
                     </a>
                     <a href="" class="flex items-center mt-2">
                        <div class="w-8 h-8 bg-theme-14 text-theme-10 flex items-center justify-center rounded-full"> <i class="w-4 h-4" data-feather="credit-card"></i> </div>
                        <div class="ml-3">Transactions Report</div>
                     </a>
                  </div>
                  <div class="search-result__content__title">Users</div>
                  <div class="mb-5">
                     <a href="" class="flex items-center mt-2">
                        <div class="w-8 h-8 image-fit">
                           <img alt="Nowshera Tailwind HTML Admin Template" class="rounded-full" src="dist/images/profile-10.jpg">
                        </div>
                        <div class="ml-3">Charlize Theron</div>
                        <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">charlizetheron@left4code.com</div>
                     </a>
                     <a href="" class="flex items-center mt-2">
                        <div class="w-8 h-8 image-fit">
                           <img alt="Nowshera Tailwind HTML Admin Template" class="rounded-full" src="dist/images/profile-1.jpg">
                        </div>
                        <div class="ml-3">Russell Crowe</div>
                        <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">russellcrowe@left4code.com</div>
                     </a>
                     <a href="" class="flex items-center mt-2">
                        <div class="w-8 h-8 image-fit">
                           <img alt="Nowshera Tailwind HTML Admin Template" class="rounded-full" src="dist/images/profile-15.jpg">
                        </div>
                        <div class="ml-3">Russell Crowe</div>
                        <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">russellcrowe@left4code.com</div>
                     </a>
                     <a href="" class="flex items-center mt-2">
                        <div class="w-8 h-8 image-fit">
                           <img alt="Nowshera Tailwind HTML Admin Template" class="rounded-full" src="dist/images/profile-7.jpg">
                        </div>
                        <div class="ml-3">Al Pacino</div>
                        <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">alpacino@left4code.com</div>
                     </a>
                  </div>
                  <div class="search-result__content__title">Products</div>
                  <a href="" class="flex items-center mt-2">
                     <div class="w-8 h-8 image-fit">
                        <img alt="Nowshera Tailwind HTML Admin Template" class="rounded-full" src="dist/images/preview-1.jpg">
                     </div>
                     <div class="ml-3">Samsung Galaxy S20 Ultra</div>
                     <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">Smartphone &amp; Tablet</div>
                  </a>
                  <a href="" class="flex items-center mt-2">
                     <div class="w-8 h-8 image-fit">
                        <img alt="Nowshera Tailwind HTML Admin Template" class="rounded-full" src="dist/images/preview-12.jpg">
                     </div>
                     <div class="ml-3">Samsung Q90 QLED TV</div>
                     <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">Electronic</div>
                  </a>
                  <a href="" class="flex items-center mt-2">
                     <div class="w-8 h-8 image-fit">
                        <img alt="Nowshera Tailwind HTML Admin Template" class="rounded-full" src="dist/images/preview-11.jpg">
                     </div>
                     <div class="ml-3">Nike Air Max 270</div>
                     <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">Sport &amp; Outdoor</div>
                  </a>
                  <a href="" class="flex items-center mt-2">
                     <div class="w-8 h-8 image-fit">
                        <img alt="Nowshera Tailwind HTML Admin Template" class="rounded-full" src="dist/images/preview-1.jpg">
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
            <div class="dropdown-toggle notification notification--bullet cursor-pointer" role="button" aria-expanded="false"> <i data-feather="bell" class="notification__icon dark:text-gray-300"></i> </div>
            <div class="notification-content pt-2 dropdown-menu">
               <div class="notification-content__box dropdown-menu__content box dark:bg-dark-6">
                  <div class="notification-content__title">Notifications</div>
                  <div class="cursor-pointer relative flex items-center ">
                     <div class="w-12 h-12 flex-none image-fit mr-1">
                        <img alt="Nowshera Tailwind HTML Admin Template" class="rounded-full" src="dist/images/profile-10.jpg">
                        <div class="w-3 h-3 bg-theme-9 absolute right-0 bottom-0 rounded-full border-2 border-white"></div>
                     </div>
                     <div class="ml-2 overflow-hidden">
                        <div class="flex items-center">
                           <a href="javascript:;" class="font-medium truncate mr-5">Charlize Theron</a>
                           <div class="text-xs text-gray-500 ml-auto whitespace-nowrap">05:09 AM</div>
                        </div>
                        <div class="w-full truncate text-gray-600 mt-0.5">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomi</div>
                     </div>
                  </div>
                  <div class="cursor-pointer relative flex items-center mt-5">
                     <div class="w-12 h-12 flex-none image-fit mr-1">
                        <img alt="Nowshera Tailwind HTML Admin Template" class="rounded-full" src="dist/images/profile-1.jpg">
                        <div class="w-3 h-3 bg-theme-9 absolute right-0 bottom-0 rounded-full border-2 border-white"></div>
                     </div>
                     <div class="ml-2 overflow-hidden">
                        <div class="flex items-center">
                           <a href="javascript:;" class="font-medium truncate mr-5">Russell Crowe</a>
                           <div class="text-xs text-gray-500 ml-auto whitespace-nowrap">03:20 PM</div>
                        </div>
                        <div class="w-full truncate text-gray-600 mt-0.5">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 20</div>
                     </div>
                  </div>
                  <div class="cursor-pointer relative flex items-center mt-5">
                     <div class="w-12 h-12 flex-none image-fit mr-1">
                        <img alt="Nowshera Tailwind HTML Admin Template" class="rounded-full" src="dist/images/profile-15.jpg">
                        <div class="w-3 h-3 bg-theme-9 absolute right-0 bottom-0 rounded-full border-2 border-white"></div>
                     </div>
                     <div class="ml-2 overflow-hidden">
                        <div class="flex items-center">
                           <a href="javascript:;" class="font-medium truncate mr-5">Russell Crowe</a>
                           <div class="text-xs text-gray-500 ml-auto whitespace-nowrap">01:10 PM</div>
                        </div>
                        <div class="w-full truncate text-gray-600 mt-0.5">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 20</div>
                     </div>
                  </div>
                  <div class="cursor-pointer relative flex items-center mt-5">
                     <div class="w-12 h-12 flex-none image-fit mr-1">
                        <img alt="Nowshera Tailwind HTML Admin Template" class="rounded-full" src="dist/images/profile-7.jpg">
                        <div class="w-3 h-3 bg-theme-9 absolute right-0 bottom-0 rounded-full border-2 border-white"></div>
                     </div>
                     <div class="ml-2 overflow-hidden">
                        <div class="flex items-center">
                           <a href="javascript:;" class="font-medium truncate mr-5">Al Pacino</a>
                           <div class="text-xs text-gray-500 ml-auto whitespace-nowrap">01:10 PM</div>
                        </div>
                        <div class="w-full truncate text-gray-600 mt-0.5">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy text ever since the 1500</div>
                     </div>
                  </div>
                  <div class="cursor-pointer relative flex items-center mt-5">
                     <div class="w-12 h-12 flex-none image-fit mr-1">
                        <img alt="Nowshera Tailwind HTML Admin Template" class="rounded-full" src="dist/images/profile-8.jpg">
                        <div class="w-3 h-3 bg-theme-9 absolute right-0 bottom-0 rounded-full border-2 border-white"></div>
                     </div>
                     <div class="ml-2 overflow-hidden">
                        <div class="flex items-center">
                           <a href="javascript:;" class="font-medium truncate mr-5">Johnny Depp</a>
                           <div class="text-xs text-gray-500 ml-auto whitespace-nowrap">01:10 PM</div>
                        </div>
                        <div class="w-full truncate text-gray-600 mt-0.5">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- END: Notifications -->
         <!-- BEGIN: Account Menu -->
         <div class="intro-x dropdown w-8 h-8">
            <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in" role="button" aria-expanded="false">
               <img alt="Nowshera Tailwind HTML Admin Template" src="dist/images/profile-6.jpg">
            </div>
            <div class="dropdown-menu w-56">
               <div class="dropdown-menu__content box bg-theme-26 dark:bg-dark-6 text-white">
                  <div class="p-4 border-b border-theme-27 dark:border-dark-3">
                     <div class="font-medium">Charlize Theron</div>
                     <div class="text-xs text-theme-28 mt-0.5 dark:text-gray-600">Software Engineer</div>
                  </div>
                  <div class="p-2">
                     <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md"> <i data-feather="user" class="w-4 h-4 mr-2"></i> Profile </a>
                     <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md"> <i data-feather="edit" class="w-4 h-4 mr-2"></i> Add Account </a>
                     <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md"> <i data-feather="lock" class="w-4 h-4 mr-2"></i> Reset Password </a>
                     <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md"> <i data-feather="help-circle" class="w-4 h-4 mr-2"></i> Help </a>
                  </div>
                  <div class="p-2 border-t border-theme-27 dark:border-dark-3">
                     <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md"> <i data-feather="toggle-right" class="w-4 h-4 mr-2"></i> Logout </a>
                  </div>
               </div>
            </div>
         </div>
         <!-- END: Account Menu -->
      </div>
      <div class="main-svg-div">
         <form method="post" action="{{route('saveviewSVG')}}" autocomplete="off">
            @csrf
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:xhtml="http://www.w3.org/1999/xhtml" width="1183" height="888" viewBox="0 0 1183 888">
               <defs>
                  <style>
                     .main-svg-div {
                     position: relative;
                     width: 100%
                     }
                     .main-svg-div svg {
                     width: 100%;
                     }
                     .cls-1, .cls-4 {
                     font-size: 15.067px;
                     }
                     .cls-1, .cls-10, .cls-2, .cls-3, .cls-4, .cls-6, .cls-8, .cls-9 {
                     fill: #231f20;
                     }
                     .cls-1, .cls-10, .cls-2, .cls-3, .cls-5, .cls-6, .cls-8, .cls-9 {
                     font-family: Arial;
                     }
                     .cls-2 {
                     font-size: 10px;
                     }
                     .cls-3 {
                     font-size: 11.581px;
                     }
                     .cls-4 {
                     font-family: Besties;
                     }
                     .cls-6 {
                     font-size: 13.144px;
                     }
                     .cls-7 {
                     fill: #0d1e1d;
                     fill-rule: evenodd;
                     }
                     .cls-8 {
                     font-size: 24.403px;
                     }
                     .cls-9 {
                     font-size: 16.566px;
                     }
                     .cls-10, .cls-9 {
                     font-weight: 800;
                     }
                     .cls-10 {
                     font-size: 17.11px;
                     }
                     xhtml:input {
                     border: none;
                     outline: none;
                     }
                     .cls-1 input {
                     width: 100%;
                     position: relative;
                     margin-bottom: 1px;
                     height: 18px;
                     border: none;
                     background: transparent;
                     outline: none;
                     font-size: 13px;
                     margin-top: 1px;
                     padding: 0px 6px;
                     }
                     .cls-1 input:nth-child(odd) {
                     height: 22px;
                     }
                  </style>
               </defs>
               <image id="_1" data-name="1" width="1183" height="888" xlink:href="data:img/png;base64,iVBORw0KGgoAAAANSUhEUgAABJ8AAAN4CAYAAABta0nFAAAYAklEQVR4nOzYMQEAIADDMMC/56GiXyKhZ++2HQAAAAAIPFEBAAAAqJhPAAAAAGTMJwAAAAAy5hMAAAAAGfMJAAAAgIz5BAAAAEDGfAIAAAAgYz4BAAAAkDGfAAAAAMiYTwAAAABkzCcAAAAAMuYTAAAAABnzCQAAAICM+QQAAABAxnwCAAAAIGM+AQAAAJAxnwAAAADImE8AAAAAZMwnAAAAADLmEwAAAAAZ8wkAAACAjPkEAAAAQMZ8AgAAACBjPgEAAACQMZ8AAAAAyJhPAAAAAGTMJwAAAAAy5hMAAAAAGfMJAAAAgIz5BAAAAEDGfAIAAAAgYz4BAAAAkDGfAAAAAMiYTwAAAABkzCcAAAAAMuYTAAAAABnzCQAAAICM+QQAAABAxnwCAAAAIGM+AQAAAJAxnwAAAADImE8AAAAAZMwnAAAAADLmEwAAAAAZ8wkAAACAjPkEAAAAQMZ8AgAAACBjPgEAAACQMZ8AAAAAyJhPAAAAAGTMJwAAAAAy5hMAAAAAGfMJAAAAgIz5BAAAAEDGfAIAAAAgYz4BAAAAkDGfAAAAAMiYTwAAAABkzCcAAAAAMuYTAAAAABnzCQAAAICM+QQAAABAxnwCAAAAIGM+AQAAAJAxnwAAAADImE8AAAAAZMwnAAAAADLmEwAAAAAZ8wkAAACAjPkEAAAAQMZ8AgAAACBjPgEAAACQMZ8AAAAAyJhPAAAAAGTMJwAAAAAy5hMAAAAAGfMJAAAAgIz5BAAAAEDGfAIAAAAgYz4BAAAAkDGfAAAAAMiYTwAAAABkzCcAAAAAMuYTAAAAABnzCQAAAICM+QQAAABAxnwCAAAAIGM+AQAAAJAxnwAAAADImE8AAAAAZMwnAAAAADLmEwAAAAAZ8wkAAACAjPkEAAAAQMZ8AgAAACBjPgEAAACQMZ8AAAAAyJhPAAAAAGTMJwAAAAAy5hMAAAAAGfMJAAAAgIz5BAAAAEDGfAIAAAAgYz4BAAAAkDGfAAAAAMiYTwAAAABkzCcAAAAAMuYTAAAAABnzCQAAAICM+QQAAABAxnwCAAAAIGM+AQAAAJAxnwAAAADImE8AAAAAZMwnAAAAADLmEwAAAAAZ8wkAAACAjPkEAAAAQMZ8AgAAACBjPgEAAACQMZ8AAAAAyJhPAAAAAGTMJwAAAAAy5hMAAAAAGfMJAAAAgIz5BAAAAEDGfAIAAAAgYz4BAAAAkDGfAAAAAMiYTwAAAABkzCcAAAAAMuYTAAAAABnzCQAAAICM+QQAAABAxnwCAAAAIGM+AQAAAJAxnwAAAADImE8AAAAAZMwnAAAAADLmEwAAAAAZ8wkAAACAjPkEAAAAQMZ8AgAAACBjPgEAAACQMZ8AAAAAyJhPAAAAAGTMJwAAAAAy5hMAAAAAGfMJAAAAgIz5BAAAAEDGfAIAAAAgYz4BAAAAkDGfAAAAAMiYTwAAAABkzCcAAAAAMuYTAAAAABnzCQAAAICM+QQAAABAxnwCAAAAIGM+AQAAAJAxnwAAAADImE8AAAAAZMwnAAAAADLmEwAAAAAZ8wkAAACAjPkEAAAAQMZ8AgAAACBjPgEAAACQMZ8AAAAAyJhPAAAAAGTMJwAAAAAy5hMAAAAAGfMJAAAAgIz5BAAAAEDGfAIAAAAgYz4BAAAAkDGfAAAAAMiYTwAAAABkzCcAAAAAMuYTAAAAABnzCQAAAICM+QQAAABAxnwCAAAAIGM+AQAAAJAxnwAAAADImE8AAAAAZMwnAAAAADLmEwAAAAAZ8wkAAACAjPkEAAAAQMZ8AgAAACBjPgEAAACQMZ8AAAAAyJhPAAAAAGTMJwAAAAAy5hMAAAAAGfMJAAAAgIz5BAAAAEDGfAIAAAAgYz4BAAAAkDGfAAAAAMiYTwAAAABkzCcAAAAAMuYTAAAAABnzCQAAAICM+QQAAABAxnwCAAAAIGM+AQAAAJAxnwAAAADImE8AAAAAZMwnAAAAADLmEwAAAAAZ8wkAAACAjPkEAAAAQMZ8AgAAACBjPgEAAACQMZ8AAAAAyJhPAAAAAGTMJwAAAAAy5hMAAAAAGfMJAAAAgIz5BAAAAEDGfAIAAAAgYz4BAAAAkDGfAAAAAMiYTwAAAABkzCcAAAAAMuYTAAAAABnzCQAAAICM+QQAAABAxnwCAAAAIGM+AQAAAJAxnwAAAADImE8AAAAAZMwnAAAAADLmEwAAAAAZ8wkAAACAjPkEAAAAQMZ8AgAAACBjPgEAAACQMZ8AAAAAyJhPAAAAAGTMJwAAAAAy5hMAAAAAGfMJAAAAgIz5BAAAAEDGfAIAAAAgYz4BAAAAkDGfAAAAAMiYTwAAAABkzCcAAAAAMuYTAAAAABnzCQAAAICM+QQAAABAxnwCAAAAIGM+AQAAAJAxnwAAAADImE8AAAAAZMwnAAAAADLmEwAAAAAZ8wkAAACAjPkEAAAAQMZ8AgAAACBjPgEAAACQMZ8AAAAAyJhPAAAAAGTMJwAAAAAy5hMAAAAAGfMJAAAAgIz5BAAAAEDGfAIAAAAgYz4BAAAAkDGfAAAAAMiYTwAAAABkzCcAAAAAMuYTAAAAABnzCQAAAICM+QQAAABAxnwCAAAAIGM+AQAAAJAxnwAAAADImE8AAAAAZMwnAAAAADLmEwAAAAAZ8wkAAACAjPkEAAAAQMZ8AgAAACBjPgEAAACQMZ8AAAAAyJhPAAAAAGTMJwAAAAAy5hMAAAAAGfMJAAAAgIz5BAAAAEDGfAIAAAAgYz4BAAAAkDGfAAAAAMiYTwAAAABkzCcAAAAAMuYTAAAAABnzCQAAAICM+QQAAABAxnwCAAAAIGM+AQAAAJAxnwAAAADImE8AAAAAZMwnAAAAADLmEwAAAAAZ8wkAAACAjPkEAAAAQMZ8AgAAACBjPgEAAACQMZ8AAAAAyJhPAAAAAGTMJwAAAAAy5hMAAAAAGfMJAAAAgIz5BAAAAEDGfAIAAAAgYz4BAAAAkDGfAAAAAMiYTwAAAABkzCcAAAAAMuYTAAAAABnzCQAAAICM+QQAAABAxnwCAAAAIGM+AQAAAJAxnwAAAADImE8AAAAAZMwnAAAAADLmEwAAAAAZ8wkAAACAjPkEAAAAQMZ8AgAAACBjPgEAAACQMZ8AAAAAyJhPAAAAAGTMJwAAAAAy5hMAAAAAGfMJAAAAgIz5BAAAAEDGfAIAAAAgYz4BAAAAkDGfAAAAAMiYTwAAAABkzCcAAAAAMuYTAAAAABnzCQAAAICM+QQAAABAxnwCAAAAIGM+AQAAAJAxnwAAAADImE8AAAAAZMwnAAAAADLmEwAAAAAZ8wkAAACAjPkEAAAAQMZ8AgAAACBjPgEAAACQMZ8AAAAAyJhPAAAAAGTMJwAAAAAy5hMAAAAAGfMJAAAAgIz5BAAAAEDGfAIAAAAgYz4BAAAAkDGfAAAAAMiYTwAAAABkzCcAAAAAMuYTAAAAABnzCQAAAICM+QQAAABAxnwCAAAAIGM+AQAAAJAxnwAAAADImE8AAAAAZMwnAAAAADLmEwAAAAAZ8wkAAACAjPkEAAAAQMZ8AgAAACBjPgEAAACQMZ8AAAAAyJhPAAAAAGTMJwAAAAAy5hMAAAAAGfMJAAAAgIz5BAAAAEDGfAIAAAAgYz4BAAAAkDGfAAAAAMiYTwAAAABkzCcAAAAAMuYTAAAAABnzCQAAAICM+QQAAABAxnwCAAAAIGM+AQAAAJAxnwAAAADImE8AAAAAZMwnAAAAADLmEwAAAAAZ8wkAAACAjPkEAAAAQMZ8AgAAACBjPgEAAACQMZ8AAAAAyJhPAAAAAGTMJwAAAAAy5hMAAAAAGfMJAAAAgIz5BAAAAEDGfAIAAAAgYz4BAAAAkDGfAAAAAMiYTwAAAABkzCcAAAAAMuYTAAAAABnzCQAAAICM+QQAAABAxnwCAAAAIGM+AQAAAJAxnwAAAADImE8AAAAAZMwnAAAAADLmEwAAAAAZ8wkAAACAjPkEAAAAQMZ8AgAAACBjPgEAAACQMZ8AAAAAyJhPAAAAAGTMJwAAAAAy5hMAAAAAGfMJAAAAgIz5BAAAAEDGfAIAAAAgYz4BAAAAkDGfAAAAAMiYTwAAAABkzCcAAAAAMuYTAAAAABnzCQAAAICM+QQAAABAxnwCAAAAIGM+AQAAAJAxnwAAAADImE8AAAAAZMwnAAAAADLmEwAAAAAZ8wkAAACAjPkEAAAAQMZ8AgAAACBjPgEAAACQMZ8AAAAAyJhPAAAAAGTMJwAAAAAy5hMAAAAAGfMJAAAAgIz5BAAAAEDGfAIAAAAgYz4BAAAAkDGfAAAAAMiYTwAAAABkzCcAAAAAMuYTAAAAABnzCQAAAICM+QQAAABAxnwCAAAAIGM+AQAAAJAxnwAAAADImE8AAAAAZMwnAAAAADLmEwAAAAAZ8wkAAACAjPkEAAAAQMZ8AgAAACBjPgEAAACQMZ8AAAAAyJhPAAAAAGTMJwAAAAAy5hMAAAAAGfMJAAAAgIz5BAAAAEDGfAIAAAAgYz4BAAAAkDGfAAAAAMiYTwAAAABkzCcAAAAAMuYTAAAAABnzCQAAAICM+QQAAABAxnwCAAAAIGM+AQAAAJAxnwAAAADImE8AAAAAZMwnAAAAADLmEwAAAAAZ8wkAAACAjPkEAAAAQMZ8AgAAACBjPgEAAACQMZ8AAAAAyJhPAAAAAGTMJwAAAAAy5hMAAAAAGfMJAAAAgIz5BAAAAEDGfAIAAAAgYz4BAAAAkDGfAAAAAMiYTwAAAABkzCcAAAAAMuYTAAAAABnzCQAAAICM+QQAAABAxnwCAAAAIGM+AQAAAJAxnwAAAADImE8AAAAAZMwnAAAAADLmEwAAAAAZ8wkAAACAjPkEAAAAQMZ8AgAAACBjPgEAAACQMZ8AAAAAyJhPAAAAAGTMJwAAAAAy5hMAAAAAGfMJAAAAgIz5BAAAAEDGfAIAAAAgYz4BAAAAkDGfAAAAAMiYTwAAAABkzCcAAAAAMuYTAAAAABnzCQAAAICM+QQAAABAxnwCAAAAIGM+AQAAAJAxnwAAAADImE8AAAAAZMwnAAAAADLmEwAAAAAZ8wkAAACAjPkEAAAAQMZ8AgAAACBjPgEAAACQMZ8AAAAAyJhPAAAAAGTMJwAAAAAy5hMAAAAAGfMJAAAAgIz5BAAAAEDGfAIAAAAgYz4BAAAAkDGfAAAAAMiYTwAAAABkzCcAAAAAMuYTAAAAABnzCQAAAICM+QQAAABAxnwCAAAAIGM+AQAAAJAxnwAAAADImE8AAAAAZMwnAAAAADLmEwAAAAAZ8wkAAACAjPkEAAAAQMZ8AgAAACBjPgEAAACQMZ8AAAAAyJhPAAAAAGTMJwAAAAAy5hMAAAAAGfMJAAAAgIz5BAAAAEDGfAIAAAAgYz4BAAAAkDGfAAAAAMiYTwAAAABkzCcAAAAAMuYTAAAAABnzCQAAAICM+QQAAABAxnwCAAAAIGM+AQAAAJAxnwAAAADImE8AAAAAZMwnAAAAADLmEwAAAAAZ8wkAAACAjPkEAAAAQMZ8AgAAACBjPgEAAACQMZ8AAAAAyJhPAAAAAGTMJwAAAAAy5hMAAAAAGfMJAAAAgIz5BAAAAEDGfAIAAAAgYz4BAAAAkDGfAAAAAMiYTwAAAABkzCcAAAAAMuYTAAAAABnzCQAAAICM+QQAAABAxnwCAAAAIGM+AQAAAJAxnwAAAADImE8AAAAAZMwnAAAAADLmEwAAAAAZ8wkAAACAjPkEAAAAQMZ8AgAAACBjPgEAAACQMZ8AAAAAyJhPAAAAAGTMJwAAAAAy5hMAAAAAGfMJAAAAgIz5BAAAAEDGfAIAAAAgYz4BAAAAkDGfAAAAAMiYTwAAAABkzCcAAAAAMuYTAAAAABnzCQAAAICM+QQAAABAxnwCAAAAIGM+AQAAAJAxnwAAAADImE8AAAAAZMwnAAAAADLmEwAAAAAZ8wkAAACAjPkEAAAAQMZ8AgAAACBjPgEAAACQMZ8AAAAAyJhPAAAAAGTMJwAAAAAy5hMAAAAAGfMJAAAAgIz5BAAAAEDGfAIAAAAgYz4BAAAAkDGfAAAAAMiYTwAAAABkzCcAAAAAMuYTAAAAABnzCQAAAICM+QQAAABAxnwCAAAAIGM+AQAAAJAxnwAAAADImE8AAAAAZMwnAAAAADLmEwAAAAAZ8wkAAACAjPkEAAAAQMZ8AgAAACBjPgEAAACQMZ8AAAAAyJhPAAAAAGTMJwAAAAAy5hMAAAAAGfMJAAAAgIz5BAAAAEDGfAIAAAAgYz4BAAAAkDGfAAAAAMiYTwAAAABkzCcAAAAAMuYTAAAAABnzCQAAAICM+QQAAABAxnwCAAAAIGM+AQAAAJAxnwAAAADImE8AAAAAZMwnAAAAADLmEwAAAAAZ8wkAAACAjPkEAAAAQMZ8AgAAACBjPgEAAACQMZ8AAAAAyJhPAAAAAGTMJwAAAAAy5hMAAAAAGfMJAAAAgIz5BAAAAEDGfAIAAAAgYz4BAAAAkDGfAAAAAMiYTwAAAABkzCcAAAAAMuYTAAAAABnzCQAAAICM+QQAAABAxnwCAAAAIGM+AQAAAJAxnwAAAADImE8AAAAAZMwnAAAAADLmEwAAAAAZ8wkAAACAjPkEAAAAQMZ8AgAAACBjPgEAAACQMZ8AAAAAyJhPAAAAAGTMJwAAAAAy5hMAAAAAGfMJAAAAgIz5BAAAAEDGfAIAAAAgYz4BAAAAkDGfAAAAAMiYTwAAAABkzCcAAAAAMuYTAAAAABnzCQAAAICM+QQAAABAxnwCAAAAIGM+AQAAAJAxnwAAAADImE8AAAAAZMwnAAAAADLmEwAAAAAZ8wkAAACAjPkEAAAAQMZ8AgAAACBjPgEAAACQMZ8AAAAAyJhPAAAAAGTMJwAAAAAy5hMAAAAAGfMJAAAAgIz5BAAAAEDGfAIAAAAgYz4BAAAAkDGfAAAAAMiYTwAAAABkzCcAAAAAMuYTAAAAABnzCQAAAICM+QQAAABAxnwCAAAAIGM+AQAAAJAxnwAAAADImE8AAAAAZMwnAAAAADLmEwAAAAAZ8wkAAACAjPkEAAAAQMZ8AgAAACBjPgEAAACQMZ8AAAAAyJhPAAAAAGTMJwAAAAAy5hMAAAAAGfMJAAAAgIz5BAAAAEDGfAIAAAAgYz4BAAAAkDGfAAAAAMiYTwAAAABkzCcAAAAAMuYTAAAAABnzCQAAAICM+QQAAABAxnwCAAAAIGM+AQAAAJAxnwAAAADImE8AAAAAZMwnAAAAADLmEwAAAAAZ8wkAAACAjPkEAAAAQMZ8AgAAACBjPgEAAACQMZ8AAAAAyJhPAAAAAGTMJwAAAAAy5hMAAAAAGfMJAAAAgIz5BAAAAEDGfAIAAAAgYz4BAAAAkDGfAAAAAMiYTwAAAABkzCcAAAAAMuYTAAAAABnzCQAAAICM+QQAAABAxnwCAAAAIGM+AQAAAJAxnwAAAADImE8AAAAAZMwnAAAAADLmEwAAAAAZ8wkAAACAjPkEAAAAQMZ8AgAAACBjPgEAAACQMZ8AAAAAyJhPAAAAAGTMJwAAAAAy5hMAAAAAGfMJAAAAgIz5BAAAAEDGfAIAAAAgYz4BAAAAkDGfAAAAAMiYTwAAAABkzCcAAAAAMuYTAAAAABnzCQAAAICM+QQAAABAxnwCAAAAIGM+AQAAAJAxnwAAAADImE8AAAAAZMwnAAAAADLmEwAAAAAZ8wkAAACAjPkEAAAAQMZ8AgAAACBjPgEAAACQMZ8AAAAAyJhPAAAAAGTMJwAAAAAy5hMAAAAAGfMJAAAAgIz5BAAAAEDGfAIAAAAgYz4BAAAAkDGfAAAAAMiYTwAAAABkzCcAAAAAMuYTAAAAABnzCQAAAICM+QQAAABAxnwCAAAAIGM+AQAAAJAxnwAAAADImE8AAAAAZMwnAAAAADLmEwAAAAAZ8wkAAACA344dEwAAACAMsn9qU+yDGGTkEwAAAAAZ+QQAAABARj4BAAAAkJFPAAAAAGTkEwAAAAAZ+QQAAABARj4BAAAAkJFPAAAAAGTkEwAAAAAZ+QQAAABARj4BAAAAkJFPAAAAAGTkEwAAAAAZ+QQAAABARj4BAAAAkJFPAAAAAGTkEwAAAAAZ+QQAAABARj4BAAAAkJFPAAAAAGTkEwAAAAAZ+QQAAABARj4BAAAAkJFPAAAAAGTkEwAAAAAZ+QQAAABAY9sBf4wK7FXJVdMAAAAASUVORK5CYII="/>
               <image x="22" y="177" width="1141" height="684" xlink:href="data:img/png;base64,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"/>
               <image x="611" y="181" width="552" height="2" xlink:href="data:img/png;base64,iVBORw0KGgoAAAANSUhEUgAAAigAAAACCAYAAABypSf8AAACIUlEQVRYhZ1XW24DMQiEkzRSfnr/67USVTesjYcBO+Fnk8U8ZgDbq8+vx7eo/IpJLeqaao26bjxVxOz1vOxMVFXMKgckBomp7m/4IWtizI9EHUTMo3JV6eJ796eiYnExs/P1Lwur1wzsOnEOLtTjG+dnCQV8Fu9SXFQhXluKNvBcHKDfVHfAVL0XrWuM/SjQk8OPTp6M5LKS5Tqi7HSIgwnLk8kyV5ZzJnNX5tHGyXOX6oa9EmPq7UY9TcwD8lvyeocrwI1roNba9XWK0/RJw8mZa52cpfkFrBKwCJnrk5qy94kzsibmEXBLx2ORz4UZ9rTJA54fsplv0j8Ctq6/qq5NvqeCewTm5/qEKXGSzytdZsim7zBHS78wf7u5YXkIsan2joNYxzOR9q+i1v+le349fmgSIv0A4bCG5hv/RVdMg3Q2/GuS6uvsJosRVxCVG5YQy/AworpBVsmHbuknvMdmnoCz3UYi93hgDIjVZYXF1LCQcYU4ikFNv7GB2cFaietv+7TZ7exR2KAn/IM80CMXjY+jYSW+FPiNw9y5TBdj6W0Zb9UFkeXKsC92flm++/M+LOTDDwiaL+TBZjL5kdy3Cz6iS9i4LJeP3UcG8DMPKP/Q2F3sUt4Nrltw3znBxXRpX5yx05xbOIjjAcwuKSwu0zF8uAcGH/kyTeai/M1wEfy4H+36SDb9dnKJrC48L7B72zuHd6WrzXHdNh8NIvoHfomn9842vY4AAAAASUVORK5CYII="/>
               <image x="21" y="30" width="1137" height="64" xlink:href="data:img/png;base64,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"/>
               <image x="630" y="162" width="92" height="1" xlink:href="data:img/png;base64,iVBORw0KGgoAAAANSUhEUgAAAFwAAAABCAYAAABT/8lxAAAATklEQVQYlYWPUQ6AMAhDX0+iifc/Y82cMZU5xw9QoC06tt20kMC9nIYAL3brTHd29Hma+3VWsS/dx9PbmyT8xzv4Lh4TTP3rlwX/TA84Aav6ImNYv7W1AAAAAElFTkSuQmCC"/>
               <text id="سریل_نمبر_" data-name="سریل نمبر " class="cls-1" transform="translate(740.02 160.95) scale(0.986)">سریل نمبر </text>
               <text id="گاڑی_نمبر_" data-name="گاڑی نمبر " class="cls-1" transform="translate(768.019 177.951) scale(0.986)">گاڑی نمبر </text>
               <!-- <foreignObject xmlns="http://www.w3.org/2000/svg" id="_1-2" data-name="1" class="cls-1" x="895.999" y="227" width="90" height="25"><xhtml:input xmlns:xhtml="http://www.w3.org/1999/xhtml" type="text" name="namesjj"  style="&#10;    border: none;&#10;    outline: none;&#10;    width: 100%;&#10;" /></foreignObject>
                  <foreignObject xmlns="http://www.w3.org/2000/svg" id="_2" data-name="2" class="cls-1" x="895.999" y="250" width="90" height="23"><xhtml:input xmlns:xhtml="http://www.w3.org/1999/xhtml" type="text" name="namesjj" style="&#10;    border: none;&#10;    outline: none;&#10;    width: 100%;&#10;" /></foreignObject>


                  <foreignObject xmlns="http://www.w3.org/2000/svg"  id="_3" data-name="3" class="cls-1" x="895.999" y="273" width="90" height="23"><xhtml:input xmlns:xhtml="http://www.w3.org/1999/xhtml" type="text" name="namesjj" style="&#10;    border: none;&#10;    outline: none;&#10;    width: 100%;&#10;" /></foreignObject>


                  <foreignObject xmlns="http://www.w3.org/2000/svg"   id="_4" data-name="4" class="cls-1" x="895.999" y="296" width="90" height="23"><xhtml:input xmlns:xhtml="http://www.w3.org/1999/xhtml" type="text" name="namesjj" style="&#10;    border: none;&#10;    outline: none;&#10;    width: 100%;&#10;" /></foreignObject> -->
               <foreignObject xmlns="http://www.w3.org/2000/svg" id="_1-2" data-name="1" class="cls-1" x="890.999" y="228" width="90" height="635">
                  <body xmlns="http://www.w3.org/1999/xhtml">
                     <input type="text" name="DIK" />
                     <input type="text" name="Sarailogin"/>
                     <input type="text" name="Bannu"/>
                     <input type="text" name="MirAnsha"/>
                     <input type="text" name="Kohat"/>
                     <input type="text" name="Pesharwar"/>
                     <input type="text" value=""/>
                     <input type="text" value="" />
                     <input type="text" name="wapsirent"/>
                     <input type="text" name="total"/>
                     <input type="text" name="bakaya" />
                     <input type="text" name="totalcash"/>
                     <input type="text" value=""/>
                     <input type="text" value=""/>
                     <input type="text" value=""/>
                     <input type="text" value=""/>
                     <input type="text" value=""/>
                     <input type="text" value=""/>
                     <input type="text" value=""/>
                     <input type="text" name="remaincashwithvehicle" />
                     <input type="text" name="cashreceived" />
                     <input type="text" name="totalcash1"/>
                     <input type="text" name="totalExpense"/>
                     <input type="text" name="cashwithvehicle"/>
                     <input type="text" value=""/>
                     <input type="text" value=""/>
                     <input type="text" value=""/>
                     <input type="text" value=""/>
                  </body>
               </foreignObject>
               <foreignObject xmlns="http://www.w3.org/2000/svg" id="_1-2" data-name="1" class="cls-1" x="650.999" y="228" width="90" height="635">
                  <body xmlns="http://www.w3.org/1999/xhtml">
                     <input type="text" name="Desiel"/>
                     <input type="text" name="MobileCall"/>
                     <input type="text" name="Toll"/>
                     <input type="text" name="Motarwaypolice"/>
                     <input type="text" name="Chai"/>
                     <input type="text" name="Manshiat "/>
                     <input type="text" name="parts "/>
                     <input type="text" value="" />
                     <input type="text" value=""/>
                     <input type="text" name="Grease"/>
                     <input type="text" value="" />
                     <input type="text" value="" />
                     <input type="text" name="AirCheck" />
                     <input type="text" value=""/>
                     <input type="text" value=""/>
                     <input type="text" value="" />
                     <input type="text" name="munshiana" />
                     <input type="text" name="Labor" />
                     <input type="text" name="karachiAdda"   />
                     <input type="text" name="WapasAddaCommission"  />
                     <input type="text" value="" />
                     <input type="text" value=""/>
                     <input type="text" value=""/>
                     <input type="text" name="Service"/>
                     <input type="text" name="Kanta"/>
                     <input type="text" value=""/>
                     <input type="text" value=""/>
                     <input type="text" name="MechanicLabor"/>
                  </body>
               </foreignObject>
               <!-- Stations -->
               <foreignObject
                  xmlns="http://www.w3.org/2000/svg" id="_1-2" data-name="1" class="cls-1 cls-1__line___" x="480.999" y="228" width="90" height="635">
                  <body xmlns="http://www.w3.org/1999/xhtml">
                     <input type="text" name="station1"/>
                     <input type="text" name="station2"/>
                     <input type="text" name="station3"/>
                     <input type="text" name="station4"/>
                     <input type="text" name="station5"/>
                     <input type="text" name="station6"/>
                     <input type="text" name="station7"/>
                     <input type="text" name="station8" />
                     <input type="text" name="station9"/>
                     <input type="text" name="station10"/>
                     <input type="text" name="station11" />
                     <input type="text" name="station12" />
                     <input type="text" name="station13" />
                     <input type="text" name="station14"/>
                     <input type="text" name="station15"/>
                  </body>
               </foreignObject>
               <!-- Current Bakaya -->
               <foreignObject
                  xmlns="http://www.w3.org/2000/svg" id="_1-2" data-name="1" class="cls-1 cls-1__line___1" x="380.999" y="228" width="90" height="635">
                  <body xmlns="http://www.w3.org/1999/xhtml">
                     <input type="text" name="currentRemain1"/>
                     <input type="text" name="currentRemain2"/>
                     <input type="text" name="currentRemain3"/>
                     <input type="text" name="currentRemain4"/>
                     <input type="text" name="currentRemain5"/>
                     <input type="text" name="currentRemain6"/>
                     <input type="text" name="currentRemain7"/>
                     <input type="text" name="currentRemain8" />
                     <input type="text" name="currentRemain9"/>
                     <input type="text" name="currentRemain10"/>
                     <input type="text" name="currentRemain11" />
                     <input type="text" name="currentRemain12" />
                     <input type="text" name="currentRemain13" />
                     <input type="text" name="currentRemain14"/>
                     <input type="text" name="currentRemain15"/>
                  </body>
               </foreignObject>
               <!-- Remain Bakaya -->
               <foreignObject
                  xmlns="http://www.w3.org/2000/svg" id="_1-2" data-name="1" class="cls-1 cls-1__line___2" x="260.999" y="228" width="90" height="635">
                  <body xmlns="http://www.w3.org/1999/xhtml">
                     <input type="text" name="Remain1"/>
                     <input type="text" name="Remain2"/>
                     <input type="text" name="Remain3"/>
                     <input type="text" name="Remain4"/>
                     <input type="text" name="Remain5"/>
                     <input type="text" name="Remain6"/>
                     <input type="text" name="Remain7"/>
                     <input type="text" name="Remain8" />
                     <input type="text" name="Remain9"/>
                     <input type="text" name="Remain10"/>
                     <input type="text" name="Remain11" />
                     <input type="text" name="Remain12" />
                     <input type="text" name="Remain13" />
                     <input type="text" name="Remain14"/>
                     <input type="text" name="Remain15"/>
                  </body>
               </foreignObject>
               <!-- Total Bakaya -->
               <foreignObject
                  xmlns="http://www.w3.org/2000/svg" id="_1-2" data-name="1" class="cls-1 cls-1__line___4" x="145.999" y="228" width="90" height="635">
                  <body xmlns="http://www.w3.org/1999/xhtml">
                     <input type="text" name="stationTotal1"/>
                     <input type="text" name="stationTotal2"/>
                     <input type="text" name="stationTotal3"/>
                     <input type="text" name="stationTotal4"/>
                     <input type="text" name="stationTotal5"/>
                     <input type="text" name="stationTotal6"/>
                     <input type="text" name="stationTotal7"/>
                     <input type="text" name="stationTotal8" />
                     <input type="text" name="stationTotal9"/>
                     <input type="text" name="stationTotal10"/>
                     <input type="text" name="stationTotal11" />
                     <input type="text" name="stationTotal12" />
                     <input type="text" name="stationTotal13" />
                     <input type="text" name="stationTotal14"/>
                     <input type="text" name="stationTotal15"/>
                  </body>
               </foreignObject>
               <!-- Remarks -->
               <foreignObject
                  xmlns="http://www.w3.org/2000/svg" id="_1-2" data-name="1" class="cls-1 cls-1__line___4" x="35.999" y="228" width="90" height="635">
                  <body xmlns="http://www.w3.org/1999/xhtml">
                     <input type="text" name="remark1"/>
                     <input type="text" name="remark2"/>
                     <input type="text" name="remark3"/>
                     <input type="text" name="remark4"/>
                     <input type="text" name="remark5"/>
                     <input type="text" name="remark6"/>
                     <input type="text" name="remark7" />
                     <input type="text" name="remark8"/>
                     <input type="text" name="remark9"/>
                     <input type="text" name="remark10" />
                     <input type="text" name="remark11" />
                     <input type="text" name="remark12" />
                     <input type="text" name="remark13"/>
                     <input type="text" name="remark14"/>
                     <input type="text" name="remark15"/>
                  </body>
               </foreignObject>

               <foreignObject xmlns="http://www.w3.org/2000/svg" id="_75214" data-name="75214" class="cls-1" x="843" y="154" width="70" height="25">
                  <input type="text" name="TO" />
                  </body>
               </foreignObject>
               <foreignObject xmlns="http://www.w3.org/2000/svg" id="_31069" data-name="31069" class="cls-1" x="945" y="154" width="70" height="25">
                  <input type="text" name="From" />
                  </body>
               </foreignObject>
               <foreignObject
                  xmlns="http://www.w3.org/2000/svg" id="_968745" data-name="968745" class="cls-1" x="1045" y="154" width="90" height="25">
                  <body xmlns="http://www.w3.org/1999/xhtml">
                     <input type="text" name="Date" />
                  </body>
               </foreignObject>
               <foreignObject xmlns="http://www.w3.org/2000/svg" id="_985123" data-name="985123" class="cls-1" x="634" y="140" width="90" height="25">
                  <input type="text" name="SerialNO" />
                  </body>
               </foreignObject>
               <foreignObject xmlns="http://www.w3.org/2000/svg" id="_96348" data-name="96348" class="cls-1" x="634" y="158" width="90" height="25">
                  <input type="text" name="VehicleNo" />
                  </body>
               </foreignObject>
               <foreignObject xmlns="http://www.w3.org/2000/svg" id="_96348" data-name="96348" class="cls-1" x="35" y="158" width="150" height="25">
                  <input type="text" name="TripNO">
               </foreignObject>
               <!--<text id="_75963150" data-name="75963150" class="cls-1" x="93" y="656">75963150</text>-->
               <!--<text id="_9547862" data-name="9547862" class="cls-1" x="117" y="691">9547862</text>-->
               <!--<text id="_486579" data-name="486579" class="cls-1" x="113" y="723">486579</text>-->
               <!--<text id="_115850" data-name="115850" class="cls-1" x="109" y="754">115850</text>-->
               <!--<text id="_1625890" data-name="1625890" class="cls-1" x="121" y="784">1625890</text>-->
               <!--<text id="_1576340" data-name="1576340" class="cls-1" x="114" y="820">1576340</text>-->
               <!--<text id="_15985120" data-name="15985120" class="cls-1" x="56" y="852">15985120</text>-->
               <!--<text id="_187463250" data-name="187463250" class="cls-1" x="243" y="852">187463250</text>-->
               <!--<text id="_1580560" data-name="1580560" class="cls-1" x="438" y="852">1580560</text>-->






               <foreignObject xmlns="http://www.w3.org/2000/svg" id="_186250" data-name="186250" class="cls-1" x="62" y="831" width="120" height="25">
                    <input type="text" name="to" value="2112725424">
               </foreignObject>
               <foreignObject xmlns="http://www.w3.org/2000/svg"  id="_186250" data-name="186250" class="cls-1" x="210" y="831" width="120" height="25">
                  <input type="text" name="to" value="2112744524">
               </foreignObject>
               <foreignObject xmlns="http://www.w3.org/2000/svg"  id="_186250" data-name="186250" class="cls-1" x="412" y="831" width="120" height="25">
                  <input type="text" name="to" value="211224214">
               </foreignObject>











               <foreignObject xmlns="http://www.w3.org/2000/svg"  id="_186250" data-name="186250" class="cls-1" x="92" y="734" width="120" height="25">
                  <input type="text" name="Trip" >
               </foreignObject>
               <foreignObject xmlns="http://www.w3.org/2000/svg"  id="_186250" data-name="186250" class="cls-1" x="92" y="795" width="120" height="25">
                  <input type="text" name="NI" >
               </foreignObject>
               <foreignObject xmlns="http://www.w3.org/2000/svg"  id="_186250" data-name="186250" class="cls-1" x="92" y="765" width="120" height="25">
                  <input type="text" name="Difference" >
               </foreignObject>
               <foreignObject xmlns="http://www.w3.org/2000/svg" id="_69853" data-name="69853" class="cls-1" x="92" y="668" width="120" height="25">
                  <input type="text" name="TEX" >
               </foreignObject>
               <foreignObject xmlns="http://www.w3.org/2000/svg" id="_69853" data-name="69853" class="cls-1" x="92" y="638" width="120" height="25">
                  <input type="text" name="TIn" >
               </foreignObject>
               <foreignObject xmlns="http://www.w3.org/2000/svg" id="_69853" data-name="69853" class="cls-1" x="92" y="704" width="120" height="25">
                  <input type="text" name="T">
               </foreignObject>











               <foreignObject xmlns="http://www.w3.org/2000/svg"  id="_186250" data-name="186250" class="cls-1" x="362" y="734" width="80" height="25">
                  <input type="text" name="Vcash4" >
               </foreignObject>
               <foreignObject xmlns="http://www.w3.org/2000/svg"  id="_186250" data-name="186250" class="cls-1" x="362" y="704" width="80" height="25">
                  <input type="text" name="Vcash3" >
               </foreignObject>
               <foreignObject xmlns="http://www.w3.org/2000/svg" id="_69853" data-name="69853" class="cls-1" x="362" y="668" width="80" height="25">
                  <input type="text" name="Vcash2" >
               </foreignObject>
               <foreignObject xmlns="http://www.w3.org/2000/svg" id="_69853" data-name="69853" class="cls-1" x="362" y="638" width="80" height="25">
                  <input type="text" name="Vcash1" >
               </foreignObject>





               <foreignObject xmlns="http://www.w3.org/2000/svg"  id="_186250" data-name="186250" class="cls-1" x="473" y="734" width="80" height="25">
                  <input type="text" name="cash4" >
               </foreignObject>
               <foreignObject xmlns="http://www.w3.org/2000/svg"  id="_186250" data-name="186250" class="cls-1" x="473" y="704" width="80" height="25">
                  <input type="text" name="cash3" >
               </foreignObject>
               <foreignObject xmlns="http://www.w3.org/2000/svg" id="_69853" data-name="69853" class="cls-1" x="473" y="668" width="80" height="25">
                  <input type="text" name="cash2" >
               </foreignObject>
               <foreignObject xmlns="http://www.w3.org/2000/svg" id="_69853" data-name="69853" class="cls-1" x="473" y="638" width="80" height="25">
                  <input type="text" name="cash1">
               </foreignObject>






               <text id="تک" class="cls-2" transform="translate(924.18 180.363) scale(1.476)">تک</text>
               <text id="سے" class="cls-1" transform="translate(1019.403 175.779)">سے</text>
               <text id="مورخہ" class="cls-1" transform="translate(1134.348 175.726) scale(1.049)">مورخہ</text>
               <text id="تاریخ" class="cls-1" transform="translate(1134.706 219.47) scale(1.086)">تاریخ</text>
               <text id="تفصیل_" data-name="تفصیل " class="cls-1" transform="translate(1042.766 222.717) scale(1.05)">تفصیل</text>
               <text id="اخراجات" class="cls-1" transform="translate(724.766 197.717) scale(1.05)">اخراجات</text>
               <text id="آمدن_" data-name="آمدن " class="cls-1" transform="translate(1004.766 197.717) scale(1.05)">آمدن</text>
               <text id="تفصیل_copy" data-name="تفصیل  copy" class="cls-1" transform="translate(797.767 222.717) scale(1.05)">تفصیل</text>
               <text id="ڈیزل_" data-name="ڈیزل " class="cls-1" transform="translate(859.767 242.716) scale(1.05)">ڈیزل</text>
               <text id="موجودہ_بقايا_" data-name="موجودہ بقايا " class="cls-1" transform="translate(397.766 218.716) scale(1.05)">موجودہ بقايا</text>
               <text id="سابقہ_بقايا_" data-name="سابقہ بقايا " class="cls-1" transform="translate(285.767 218.716) scale(1.05)">سابقہ بقايا</text>
               <text id="_ٹوٹل_بقايا_" data-name=" ٹوٹل بقايا " class="cls-1" transform="translate(168.767 221.717) scale(1.05)"> ٹوٹل بقايا</text>
               <text id="ريمار_کس_" data-name="ريمار کس " class="cls-1" transform="translate(47.766 211.716) scale(1.05)">ريمار کس</text>
               <text id="تفصيل_بقايا_مندرجہ_ذيل_اسٹيشن_" data-name="تفصيل  بقايا مندرجہ ذيل اسٹيشن " class="cls-3" transform="translate(265.766 199.717) scale(1.05)">تفصيل  بقايا مندرجہ ذيل اسٹيشن</text>
               <text id="چکر_نمبر_" data-name="چکر نمبر " class="cls-1" transform="translate(185.766 176.716) scale(1.05)">چکر نمبر</text>
               <text id="اسٹيشن_" data-name="اسٹيشن " class="cls-1" transform="translate(516.766 208.716) scale(1.05)">اسٹيشن</text>
               <text id="موبل_آئل_" data-name="موبل آئل " class="cls-1" transform="translate(841.766 267.716) scale(1.05)">موبل آئل</text>
               <text id="ٹول_پلازہ_" data-name="ٹول پلازہ " class="cls-1" transform="translate(833.767 290.716) scale(1.05)">ٹول پلازہ</text>
               <text id="موٹر_وے_پولیس_" data-name="موٹر وے پولیس " class="cls-1" transform="translate(804.767 311.716) scale(1.05)">موٹر وے پولیس</text>
               <text id="چائے_روٹی_" data-name="چائے روٹی " class="cls-1" transform="translate(826.767 332.717) scale(1.05)">چائے روٹی</text>
               <text id="سگریٹ_نسوار_دھوبی_کارڈ_" data-name="سگریٹ + نسوار + دھوبی + کارڈ " class="cls-1" transform="translate(736.506 357.032) scale(0.9)">سگریٹ + نسوار + دھوبی + کارڈ</text>
               <text id="اسپتر_پارٹس_" data-name="اسپتر پارٹس " class="cls-1" transform="translate(822.766 379.716) scale(1.05)">اسپتر پارٹس</text>
               <text id="گرليس" class="cls-1" transform="translate(849.767 448.716) scale(1.05)">گرليس</text>
               <text id="ہوا_چیک_" data-name="ہوا چیک " class="cls-1" transform="translate(841.766 516.717) scale(1.05)">ہوا چیک</text>
               <text id="منشیانہ_چوکیدار_لیبر_" data-name="منشیانہ + چوکیدار + لیبر " class="cls-1" transform="translate(753.766 605.716) scale(1.05)">منشیانہ + چوکیدار + لیبر</text>
               <text id="لیبر_مزدوری_" data-name="لیبر مزدوری " class="cls-1" transform="translate(817.766 627.717) scale(1.05)">لیبر مزدوری</text>
               <text id="کراچی_اڈا_کمیشن_" data-name="کراچی  اڈا کمیشن " class="cls-1" transform="translate(791.767 653.716) scale(1.05)">کراچی  اڈا کمیشن</text>
               <text id="واپس_اڈا_کمیشن_" data-name="واپس اڈا کمیشن " class="cls-1" transform="translate(798.766 675.716) scale(1.05)">واپس اڈا کمیشن</text>
               <text id="لیبر_مزدوری_2" data-name="لیبر مزدوری " class="cls-1" transform="translate(808.766 697.717) scale(1.05)">لیبر مزدوری</text>
               <text id="گاڑی_سروس" data-name="گاڑی سروس" class="cls-1" transform="translate(812.766 764.716) scale(1.05)">گاڑی سروس</text>
               <text id="_گاڑی_کيساتھ_کيش" data-name=" گاڑی کيساتھ کيش" class="cls-1" transform="translate(1028.766 766.716) scale(1.05)"> گاڑی کيساتھ کيش</text>
               <text id="کل_اخراجات_" data-name="کل اخراجات " class="cls-1" transform="translate(1059.766 744.717) scale(1.05)">کل اخراجات</text>
               <text id="ٹوٹل_کيش_" data-name="ٹوٹل  کيش " class="cls-1" transform="translate(1069.767 722.717) scale(1.05)">ٹوٹل  کيش</text>
               <text id="کل_کيش_وصول_آمدن_" data-name="کل کيش وصول (آمدن " class="cls-1" transform="translate(1011.767 698.717) scale(1.05)">کل کيش وصول (آمدن</text>
               <text id="_" data-name="( " class="cls-1" transform="translate(1005.766 698.717) scale(1.05)">(</text>
               <text id="سابقہ_کيش_گاڑی_کيساتھ_" data-name="سابقہ کيش  گاڑی کيساتھ " class="cls-1" transform="translate(1001.767 675.716) scale(1.05)">سابقہ کيش  گاڑی کيساتھ</text>
               <text id="کل_کيش_" data-name="کل کيش " class="cls-1" transform="translate(1082.767 495.716) scale(1.05)">کل کيش</text>
               <text id="بقايا_کرایہ_" data-name="بقايا کرایہ  " class="cls-1" transform="translate(1072.766 469.716) scale(1.05)">بقايا کرایہ</text>
               <text id="واپسی_کرایہ_" data-name="واپسی کرایہ " class="cls-1" transform="translate(1058.766 423.716) scale(1.05)">واپسی کرایہ</text>
               <text id="ٹوٹل_" data-name="ٹوٹل " class="cls-1" transform="translate(1100.766 447.716) scale(1.05)">ٹوٹل</text>
               <text id="پشاور" class="cls-1" transform="translate(1090.766 356.717) scale(1.05)">پشاور</text>
               <text id="کوہاٹ" class="cls-1" transform="translate(1089.767 331.716) scale(1.05)">کوہاٹ</text>
               <text id="میرانشاہ_" data-name="میرانشاہ " class="cls-1" transform="translate(1080.766 309.717) scale(1.05)">میرانشاہ</text>
               <text id="بنوں" class="cls-1" transform="translate(1098.766 287.716) scale(1.05)">بنوں</text>
               <text id="_سراتے_نورنگ_" data-name="   سراتے نورنگ " class="cls-1" transform="translate(1031.766 267.716) scale(1.05)">   سراتے نورنگ</text>
               <text id="ڈیرہ_اسمحیل_خان_" data-name="ڈیرہ اسمحیل خان  " class="cls-1" transform="translate(1035.766 242.716) scale(1.05)">ڈیرہ اسمحیل خان</text>
               <text id="کانٹا" class="cls-1" transform="translate(857.766 787.716) scale(1.05)">کانٹا</text>
               <text id="گاڑی_کام_مستری_مزدوری" data-name="گاڑی کام مستری مزدوری" class="cls-1" transform="translate(751.766 854.716) scale(1.05)">گاڑی کام مستری مزدوری</text>
               <text id="رقم" class="cls-1" transform="translate(928.766 220.716) scale(1.05)">رقم</text>
               <text id="صافی_بچت_" data-name="صافی بچت " class="cls-1" transform="translate(17.766 615.716) scale(1.05)">صافی بچت</text>
               <text id="_گاڑی_کے_پاسس_کيش_" data-name="        گاڑی کے پاسس کيش " class="cls-4" transform="translate(340.767 605.716) scale(1.05)">
                  <tspan class="cls-5">گاڑی</tspan>
                  <tspan>کے</tspan>
                  <tspan>پاسس</tspan>
                  <tspan>کيش</tspan>
               </text>
               <text id="کيش_تفصيل_" data-name="کيش  تفصيل  " class="cls-1" transform="translate(509.767 605.716) scale(1.05)">کيش  تفصيل </text>
               <text id="دستخط_کلرک_" data-name="دستخط  کلرک " class="cls-1" transform="translate(523.766 854.716) scale(1.05)">دستخط  کلرک</text>
               <text id="دستخط_کلرک_2" data-name="دستخط  کلرک " class="cls-1" transform="translate(332.183 856.33) scale(0.954)">دستخط  کلرک</text>
               <text id="دستخط_ڈرائیور_" data-name="دستخط ڈرائیور " class="cls-1" transform="translate(142.913 856.667) scale(0.92)">دستخط ڈرائیور</text>
               <text id="N.I" class="cls-6" transform="translate(19.433 825.05) scale(1.05)">N.I</text>
               <text id="Difference" class="cls-6" transform="translate(18.433 788.049) scale(1.05)">Difference</text>
               <text id="Trip" class="cls-6" transform="translate(18.433 759.05) scale(1.05)">Trip</text>
               <text id="T._Exp" data-name="T. Exp" class="cls-6" transform="translate(17.433 694.049) scale(1.05)">T. Exp</text>
               <text id="T._In" data-name="T. In" class="cls-6" transform="translate(17.433 662.049) scale(1.05)">T. In</text>
               <path class="cls-7" d="M555,662v1H476v-1h79Z"/>
               <path id="Shape_1_copy" data-name="Shape 1 copy" class="cls-7" d="M444,662v1H365v-1h79Z"/>
               <path id="Shape_1_copy_2" data-name="Shape 1 copy 2" class="cls-7" d="M555,693v1H476v-1h79Z"/>
               <path id="Shape_1_copy_2-2" data-name="Shape 1 copy 2" class="cls-7" d="M444,693v1H365v-1h79Z"/>
               <path id="Shape_1_copy_3" data-name="Shape 1 copy 3" class="cls-7" d="M555,727v1H476v-1h79Z"/>
               <path id="Shape_1_copy_3-2" data-name="Shape 1 copy 3" class="cls-7" d="M444,727v1H365v-1h79Z"/>
               <path id="Shape_1_copy_4" data-name="Shape 1 copy 4" class="cls-7" d="M555,759v1H476v-1h79Z"/>
               <path id="Shape_1_copy_4-2" data-name="Shape 1 copy 4" class="cls-7" d="M444,759v1H365v-1h79Z"/>
               <text id="_.4" data-name=".4" class="cls-6" transform="translate(562.433 759.05) scale(1.05)">.4</text>
               <text id="_.2" data-name=".2" class="cls-6" transform="translate(563.433 694.049) scale(1.05)">.2</text>
               <text id="_.1" data-name=".1" class="cls-6" transform="translate(564.433 662.049) scale(1.05)">.1</text>
               <text id="T" class="cls-6" transform="translate(18.433 728.05) scale(1.05)">T</text>
               <text id="_.3" data-name=".3" class="cls-6" transform="translate(564.433 728.05) scale(1.05)">.3</text>
               <text id="رقم_copy" data-name="رقم copy" class="cls-1" transform="translate(661.767 220.716) scale(1.05)">رقم</text>
               <text id="ہید_آفس:_گیٹ_نمبر_5_گلی_نمبر_1_پلاٹ_نمبر_" data-name="ہید آفس: گیٹ نمبر 5 گلی نمبر 1 پلاٹ نمبر " class="cls-2" transform="translate(942.015 111.479) scale(1.485)">ہید آفس: گیٹ نمبر 5 گلی نمبر 1 پلاٹ نمبر </text>
               <text id="کائداعظم_ٹرک_اسٹینڈہاکس_بے_روڈ" data-name="کائداعظم ٹرک اسٹینڈہاکس بے روڈ" class="cls-2" transform="translate(989.014 131.479) scale(1.485)">کائداعظم ٹرک اسٹینڈہاکس بے روڈ</text>
               <text id="نیو_سرحدکراچی_گڈذ_ٹرانسپورٹ_کمپنی" data-name="نیو سرحدکراچی گڈذ ٹرانسپورٹ کمپنی" class="cls-8" transform="translate(604.056 51.295) scale(0.905)">نیو سرحدکراچی گڈذ ٹرانسپورٹ کمپنی</text>
               <text id="GOODS_TRANSPORT_CO." data-name="GOODS TRANSPORT CO." class="cls-9" transform="translate(604.275 87.409) scale(0.93)">GOODS TRANSPORT CO.</text>
               <text id="NEW_SARHAD_KARACHI" data-name="NEW SARHAD KARACHI" class="cls-10" transform="translate(603.057 71.295) scale(0.905)">NEW SARHAD KARACHI</text>
               <text id="کداچی" class="cls-2" transform="translate(954.014 132.479) scale(1.485)">کداچی</text>
               <text id="_353-A" data-name="353-A" class="cls-2" transform="translate(896.014 111.479) scale(1.485)">353-A</text>
               <text id="_92-21-3235_0818-19-20-92" data-name="92-21-3235 0818-19-20-92" class="cls-2" transform="translate(620.422 109.094) scale(1.144)">92-21-3235 0818-19-20-92</text>
               <text id="_0307-2222839_0302-8296688" data-name="0307-2222839, 0302-8296688" class="cls-2" transform="translate(623.123 124.397) scale(1.144)">0307-2222839, 0302-8296688</text>
               <text id="nskg_trco1_yahoo.com" data-name="nskg_trco1@yahoo.com" class="cls-2" transform="translate(623.123 138.8) scale(1.144)">nskg_trco1@yahoo.com</text>
               <text id="www.nskg.com.pk" class="cls-2" transform="translate(809.459 124.397) scale(1.144)">www.nskg.com.pk</text>
               <text id="_92-21-32350761" data-name="92-21-32350761" class="cls-2" transform="translate(786.881 109.094) scale(1.144)">92-21-32350761</text>
               <text id="ہید_آفس:_گیٹ_نمبر_5_گلی_نمبر_1_پلاٹ_نمبر_copy" data-name="ہید آفس: گیٹ نمبر 5 گلی نمبر 1 پلاٹ نمبر  copy" class="cls-2" transform="translate(363.014 111.479) scale(1.485)">ہید آفس: گیٹ نمبر 5 گلی نمبر 1 پلاٹ نمبر </text>
               <text id="کائداعظم_ٹرک_اسٹینڈہاکس_بے_روڈ_copy" data-name="کائداعظم ٹرک اسٹینڈہاکس بے روڈ copy" class="cls-2" transform="translate(388.015 132.479) scale(1.485)">کائداعظم ٹرک اسٹینڈہاکس بے روڈ</text>
               <text id="نیو_سرحدکراچی_گڈذ_ٹرانسپورٹ_کمپنی_copy" data-name="نیو سرحدکراچی گڈذ ٹرانسپورٹ کمپنی copy" class="cls-8" transform="translate(22.057 51.295) scale(0.905)">نیو سرحدکراچی گڈذ ٹرانسپورٹ کمپنی</text>
               <text id="GOODS_TRANSPORT_CO._copy" data-name="GOODS TRANSPORT CO. copy" class="cls-9" transform="translate(22.275 87.409) scale(0.93)">GOODS TRANSPORT CO.</text>
               <text id="NEW_SARHAD_KARACHI_copy" data-name="NEW SARHAD KARACHI copy" class="cls-10" transform="translate(21.057 71.295) scale(0.905)">NEW SARHAD KARACHI</text>
               <text id="کداچی_copy" data-name="کداچی copy" class="cls-2" transform="translate(358.014 132.479) scale(1.485)">کداچی</text>
               <text id="_353-A_copy" data-name="353-A copy" class="cls-2" transform="translate(317.014 111.479) scale(1.485)">353-A</text>
               <text id="_92-21-3235_0818-19-20-92_copy" data-name="92-21-3235 0818-19-20-92 copy" class="cls-2" transform="translate(38.423 109.094) scale(1.144)">92-21-3235 0818-19-20-92</text>
               <text id="_0307-2222839_0302-8296688_copy" data-name="0307-2222839, 0302-8296688 copy" class="cls-2" transform="translate(41.123 124.397) scale(1.144)">0307-2222839, 0302-8296688</text>
               <text id="nskg_trco1_yahoo.com_copy" data-name="nskg_trco1@yahoo.com copy" class="cls-2" transform="translate(41.123 138.8) scale(1.144)">nskg_trco1@yahoo.com</text>
               <text id="www.nskg.com.pk_copy" data-name="www.nskg.com.pk copy" class="cls-2" transform="translate(227.459 124.397) scale(1.144)">www.nskg.com.pk</text>
               <text id="_92-21-32350761_copy" data-name="92-21-32350761 copy" class="cls-2" transform="translate(204.88 109.094) scale(1.144)">92-21-32350761</text>
            </svg>
            <input type="submit" value="submit" class="SubmitClass_SVG" />
         </form>
      </div>
      <!-- main-svg-div -->
   </div>
</div>
</div>
<!-- END: Content -->
</div>
@endsection
@section('script')
<script>
   $(document).ready(function() { var max_fields = 10; var wrapper = $(".phoneDivbar"); var add_button = $(".AddMorePhone"); var x = 1; $(add_button).click(function(e){ e.preventDefault(); if(x < max_fields){ x++; $(wrapper).append('<div class="col-span-12" id="rem-'+x+'"><div class="mt-2"><label for="regular-form-3" class="form-label">Phone</label><input id="regular-form-3" type="text" class="form-control" placeholder="Enter Phone"  name="phones[]"><button type="button" class="btn_remove btn-danger mt-5">Remove</button></div>'); } });
   $(wrapper).on("click",".remove_field", function(e){ e.preventDefault(); $(this).parent('div').remove(); x--; });
   $(document).on('click',".btn_remove", function(e) {
   e.preventDefault();
   $('#rem-'+x+'').remove();
   x--;
   });
   });
</script>
<script>
   $(document).ready(function() { var max_fields = 10; var wrapper = $(".phoneDivAddress_ware"); var add_button = $(".AddMoreAddress"); var x = 1; $(add_button).click(function(e){ e.preventDefault(); if(x < max_fields){ x++; $(wrapper).append('<div class="col-span-12" id="rem-'+x+'"><div class="mt-2"><label for="regular-form-3" class="form-label">Address(Warehouse)</label><textarea id="regular-form-3" class="form-control" placeholder="Enter Address" name="address[]"></textarea><button type="button" class="btn_remove btn-danger mt-5">Remove</button></div>'); } });
       $(wrapper).on("click",".remove_field", function(e){ e.preventDefault(); $(this).parent('div').remove(); x--; });
        $(document).on('click',".btn_remove", function(e) {
   e.preventDefault();
   $('#rem-'+x+'').remove();
   x--;
   });
   });
</script>
@endsection
