<?php
ob_clean();
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <base href="">
      <meta charset="utf-8"/>
      <title>Dashboard</title>
      <meta name="description" content="Updates and statistics"/>
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"/>
      <link href="<?php echo base_url();?>assets/plugins/custom/fullcalendar/fullcalendar.bundle.css?v=7.0.6" rel="stylesheet" type="text/css"/>
      <link href="<?php echo base_url();?>assets/plugins/global/plugins.bundle.css?v=7.0.6" rel="stylesheet" type="text/css"/>
      <link href="<?php echo base_url();?>assets/plugins/custom/prismjs/prismjs.bundle.css?v=7.0.6" rel="stylesheet" type="text/css"/>
      <link href="<?php echo base_url();?>assets/css/style.bundle.css?v=7.0.6" rel="stylesheet" type="text/css"/>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
      <link rel="shortcut icon" href="<?php echo base_url();?>assets/media/logos/favicon.png"/>
      <style type="text/css">
         .bg-primary {
         background-color: #35504b!important;
         }
         .field-icon {
         float: right;
         margin-left: -25px;
         margin-top: -25px;
         position: relative;
         z-index: 2;
         }
         .container1{
         padding-top:50px;
         margin: auto;
         }
         .hover-card:hover {
         background: gold;
         }​
         .symbol-100{
            display: none !important;
         }
         .zoom {
             box-sizing: border-box;
      
           transition: transform .2s;
           width: 100px;
           height: 100px;
           /*margin: 0 auto;*/
         }
         .zoom:hover {
           -ms-transform: scale(1.09); /* IE 9 */
           -webkit-transform: scale(1.09); /* Safari 3-8 */
           transform: scale(1.09); 
         }
      </style>
   </head>
   <body  id="kt_body"  class="header-fixed header-mobile-fixed subheader-enabled" style="background-color:  #fff; ">
      
      <div id="kt_header_mobile" class="header-mobile bg-primary  header-mobile-fixed " >
         <a href="#">
         <img alt="Logo" src="<?php echo base_url();?>assets/media/logos/logo7.png" class="max-h-20px"/>
         </a>
         <div class="d-flex align-items-center">
            <!-- <button class="btn p-0 burger-icon burger-icon-left ml-4" id="kt_header_mobile_toggle">
            <span></span>
            </button> -->
            <button class="btn p-0 ml-2" id="kt_header_mobile_topbar_toggle">
               <span class="svg-icon svg-icon-xl">
                  <!--begin::Svg Icon | path:assets/media/svg/icons/General/User.svg-->
                  <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                     <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <polygon points="0 0 24 0 24 24 0 24"></polygon>
                        <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                        <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero"></path>
                     </g>
                  </svg>
                  <!--end::Svg Icon-->
               </span>
            </button>
         </div>
      </div>
      <div class="d-flex flex-column flex-root">
      <!--begin::Page-->
      <div class="d-flex flex-row flex-column-fluid page">
      <!--begin::Wrapper-->
      <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
      <!--begin::Header-->
      <div id="kt_header" class="header flex-column  header-fixed " >
         <!--begin::Top-->
         <div class="header-top" style="background-color: #35504b;">
            <!--begin::Container-->
            <div class="container-fluid">
               <div class="d-none d-lg-flex align-items-center mr-3">
                  <!--begin::Logo-->
                  <a href="#" class="mr-20">
                  <img alt="Logo" src="<?php echo base_url();?>assets/media/logos/logo7.png" class="max-h-25px"/>
                  </a>
               </div>
              
               <!--begin::Topbar-->
               <div class="topbar bg-primary" style="background-color: #35504b!important;">
                  <div class="dropdown">
                     
                   
                     <div class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-anim-up dropdown-menu-lg">
                     </div>
                    
                  </div>
                  <div class="topbar-item mr-1">
                      <a href="<?php echo base_url('Dashboard');?>"> 
                     <div class="btn btn-icon btn-hover-transparent-white btn-clean btn-lg">
                        <span class="svg-icon svg-icon-xl">
                           <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group-chat.svg-->
                                 <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"/>
                                    <path d="M16,15.6315789 L16,12 C16,10.3431458 14.6568542,9 13,9 L6.16183229,9 L6.16183229,5.52631579 C6.16183229,4.13107011 7.29290239,3 8.68814808,3 L20.4776218,3 C21.8728674,3 23.0039375,4.13107011 23.0039375,5.52631579 L23.0039375,13.1052632 L23.0206157,17.786793 C23.0215995,18.0629336 22.7985408,18.2875874 22.5224001,18.2885711 C22.3891754,18.2890457 22.2612702,18.2363324 22.1670655,18.1421277 L19.6565168,15.6315789 L16,15.6315789 Z" fill="#000000"/>
                                    <path d="M1.98505595,18 L1.98505595,13 C1.98505595,11.8954305 2.88048645,11 3.98505595,11 L11.9850559,11 C13.0896254,11 13.9850559,11.8954305 13.9850559,13 L13.9850559,18 C13.9850559,19.1045695 13.0896254,20 11.9850559,20 L4.10078614,20 L2.85693427,21.1905292 C2.65744295,21.3814685 2.34093638,21.3745358 2.14999706,21.1750444 C2.06092565,21.0819836 2.01120804,20.958136 2.01120804,20.8293182 L2.01120804,18.32426 C1.99400175,18.2187196 1.98505595,18.1104045 1.98505595,18 Z M6.5,14 C6.22385763,14 6,14.2238576 6,14.5 C6,14.7761424 6.22385763,15 6.5,15 L11.5,15 C11.7761424,15 12,14.7761424 12,14.5 C12,14.2238576 11.7761424,14 11.5,14 L6.5,14 Z M9.5,16 C9.22385763,16 9,16.2238576 9,16.5 C9,16.7761424 9.22385763,17 9.5,17 L11.5,17 C11.7761424,17 12,16.7761424 12,16.5 C12,16.2238576 11.7761424,16 11.5,16 L9.5,16 Z" fill="#000000" opacity="0.3"/>
                                    </g>
                                 </svg>
                           <!--end::Svg Icon-->
                        </span>
                     </div>
                  </a>
                  </div>
                
                  <div class="topbar-item">
                     <div class="btn btn-icon btn-hover-transparent-white w-lg-auto d-flex align-items-center btn-lg px-2" id="kt_quick_user_toggle">
                        <div class="d-flex flex-column text-right pr-lg-3">
                           <span class="text-white opacity-50 font-weight-bold font-size-sm d-none d-md-inline"></span>
                           <span class="text-white font-weight-bolder font-size-sm d-none d-md-inline" style="color:#ffff !important;">Emp Code: <?php if(isset($_SESSION['Arham_user_code'])){echo $_SESSION['Arham_user_code'];}?></span>
                        </div>
                        <span class="symbol symbol-35">
                        <span class="symbol-label font-size-h5 font-weight-bold text-white bg-white-o-30">A</span>
                        </span>
                     </div>
                  </div>
                  <!--end::User-->
               </div>
               <!--end::Topbar-->
            </div>
            <!--end::Container-->
         </div>
         <!--end::Top-->
         <!--begin::Bottom-->
      </div>
      <!--end::Header-->