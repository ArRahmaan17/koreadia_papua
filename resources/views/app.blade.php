<!DOCTYPE html>
<html lang="en">

<head>
    <title> {{ env('APP_NAME') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="Permissions-Policy" content="interest-cohort=()">
    <meta charset="utf-8" />
    <meta property="og:locale" content="en_US" />
    <link rel="shortcut icon" href="{{ asset('assets/media/logos/favicon.ico') }}" />

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />

    <link href="{{ asset('assets/plugins/custom/prismjs/prismjs.bundle.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    @stack('css')
</head>

<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed aside-fixed aside-secondary-enabled" data-kt-aside-minimize="on"
    data-kt-app-page-loading-enabled="true" data-kt-app-page-loading="on">
    <div class="page-loader">
        <span class="spinner-border text-primary" role="status"></span>
        &nbsp;
        <span class="text-grey-300">Memuat Halaman...</span>
    </div>
    <script>
        var defaultThemeMode = "light";
        var themeMode;
        if (document.documentElement) {
            if (document.documentElement.hasAttribute("data-bs-theme-mode")) {
                themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
            } else {
                if (localStorage.getItem("data-bs-theme") !== null) {
                    themeMode = localStorage.getItem("data-bs-theme");
                } else {
                    themeMode = defaultThemeMode;
                }
            }

            if (themeMode === "system") {
                themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
            }

            document.documentElement.setAttribute("data-bs-theme", themeMode);
        }
    </script>
    <div class="d-flex flex-column flex-root">
        <div class="page d-flex flex-row flex-column-fluid">
            @auth
                <div id="kt_aside" class="aside aside-extended bg-dark" data-kt-drawer="true" data-kt-drawer-name="aside"
                    data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="auto"
                    data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_toggle">
                    @include('components.navbar')
                    @include('components.navbar-2')
            </div> @endauth
            @auth
                <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                @endauth
                @guest
                    <div class="d-flex flex-column flex-row-fluid" id="kt_wrapper">
                    @endguest
                    @auth
                        @include('components.header-content')
                    @endauth
                    @guest
                        @include('components.navbar-horizontal')
                    @endguest
                    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                        <div class="container-fluid" id="kt_content_container">
                            @yield('content')
                        </div>
                    </div> @include('components.footer')
                </div>
            </div>
        </div>

        <div id="kt_activities" class="bg-body" data-kt-drawer="true" data-kt-drawer-name="activities" data-kt-drawer-activate="true"
            data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'300px', 'lg': '900px'}" data-kt-drawer-direction="end"
            data-kt-drawer-toggle="#kt_activities_toggle" data-kt-drawer-close="#kt_activities_close">
            <div class="card shadow-none rounded-0">

                <div class="card-header" id="kt_activities_header">
                    <h3 class="card-title fw-bolder text-dark">Activity Logs</h3>
                    <div class="card-toolbar">
                        <button type="button" class="btn btn-sm btn-icon btn-active-light-primary me-n5" id="kt_activities_close">
                            <span class="svg-icon svg-icon-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)"
                                        fill="black" />
                                    <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                                </svg>
                            </span>
                        </button>
                    </div>
                </div>

                <div class="card-body position-relative" id="kt_activities_body">

                    <div id="kt_activities_scroll" class="position-relative scroll-y me-n5 pe-5" data-kt-scroll="true" data-kt-scroll-height="auto"
                        data-kt-scroll-wrappers="#kt_activities_body" data-kt-scroll-dependencies="#kt_activities_header, #kt_activities_footer"
                        data-kt-scroll-offset="5px">

                        <div class="timeline">

                            <div class="timeline-item">

                                <div class="timeline-line w-40px"></div>

                                <div class="timeline-icon symbol symbol-circle symbol-40px me-4">
                                    <div class="symbol-label bg-light">

                                        <span class="svg-icon svg-icon-2 svg-icon-gray-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path opacity="0.3"
                                                    d="M2 4V16C2 16.6 2.4 17 3 17H13L16.6 20.6C17.1 21.1 18 20.8 18 20V17H21C21.6 17 22 16.6 22 16V4C22 3.4 21.6 3 21 3H3C2.4 3 2 3.4 2 4Z"
                                                    fill="black" />
                                                <path
                                                    d="M18 9H6C5.4 9 5 8.6 5 8C5 7.4 5.4 7 6 7H18C18.6 7 19 7.4 19 8C19 8.6 18.6 9 18 9ZM16 12C16 11.4 15.6 11 15 11H6C5.4 11 5 11.4 5 12C5 12.6 5.4 13 6 13H15C15.6 13 16 12.6 16 12Z"
                                                    fill="black" />
                                            </svg>
                                        </span>

                                    </div>
                                </div>

                                <div class="timeline-content mb-10 mt-n1">

                                    <div class="pe-3 mb-5">

                                        <div class="fs-5 fw-bold mb-2">There are 2 new tasks for you in “AirPlus Mobile
                                            APp” project:</div>

                                        <div class="d-flex align-items-center mt-1 fs-6">

                                            <div class="text-muted me-2 fs-7">Added at 4:23 PM by</div>

                                            <div class="symbol symbol-circle symbol-25px" data-bs-toggle="tooltip" data-bs-boundary="window"
                                                data-bs-placement="top" title="Nina Nilson">
                                                <img src="{{ asset('assets/media/avatars/150-11.jpg') }}" alt="img" />
                                            </div>

                                        </div>

                                    </div>

                                    <div class="overflow-auto pb-5">

                                        <div class="d-flex align-items-center border border-dashed border-gray-300 rounded min-w-750px px-7 py-3 mb-5">

                                            <a href="#" class="fs-5 text-dark text-hover-primary fw-bold w-375px min-w-200px">Meeting
                                                with customer</a>

                                            <div class="min-w-175px pe-2">
                                                <span class="badge badge-light text-muted">Application Design</span>
                                            </div>

                                            <div class="symbol-group symbol-hover flex-nowrap flex-grow-1 min-w-100px pe-2">

                                                <div class="symbol symbol-circle symbol-25px">
                                                    <img src="{{ asset('assets/media/avatars/150-3.jpg') }}" alt="img" />
                                                </div>

                                                <div class="symbol symbol-circle symbol-25px">
                                                    <img src="{{ asset('assets/media/avatars/150-11.jpg') }}" alt="img" />
                                                </div>

                                                <div class="symbol symbol-circle symbol-25px">
                                                    <div class="symbol-label fs-8 fw-bold bg-primary text-inverse-primary">
                                                        A</div>
                                                </div>

                                            </div>

                                            <div class="min-w-125px pe-2">
                                                <span class="badge badge-light-primary">In Progress</span>
                                            </div>

                                            <a href="#" class="btn btn-sm btn-light btn-active-light-primary">View</a>

                                        </div>

                                        <div class="d-flex align-items-center border border-dashed border-gray-300 rounded min-w-750px px-7 py-3 mb-0">

                                            <a href="#" class="fs-5 text-dark text-hover-primary fw-bold w-375px min-w-200px">Project
                                                Delivery Preparation</a>

                                            <div class="min-w-175px">
                                                <span class="badge badge-light text-muted">CRM System
                                                    Development</span>
                                            </div>
                                            <div class="symbol-group symbol-hover flex-nowrap flex-grow-1 min-w-100px">
                                                <div class="symbol symbol-circle symbol-25px">
                                                    <img src="{{ asset('assets/media/avatars/150-5.jpg') }}" alt="img" />
                                                </div>
                                                <div class="symbol symbol-circle symbol-25px">
                                                    <div class="symbol-label fs-8 fw-bold bg-success text-inverse-primary">
                                                        B</div>
                                                </div>
                                            </div>
                                            <div class="min-w-125px">
                                                <span class="badge badge-light-success">Completed</span>
                                            </div> <a href="#" class="btn btn-sm btn-light btn-active-light-primary">View</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="timeline-item">
                                <div class="timeline-line w-40px"></div>
                                <div class="timeline-icon symbol symbol-circle symbol-40px">
                                    <div class="symbol-label bg-light">
                                        <span class="svg-icon svg-icon-2 svg-icon-gray-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path opacity="0.3"
                                                    d="M5.78001 21.115L3.28001 21.949C3.10897 22.0059 2.92548 22.0141 2.75004 21.9727C2.57461 21.9312 2.41416 21.8418 2.28669 21.7144C2.15923 21.5869 2.06975 21.4264 2.0283 21.251C1.98685 21.0755 1.99507 20.892 2.05201 20.7209L2.886 18.2209L7.22801 13.879L10.128 16.774L5.78001 21.115Z"
                                                    fill="black" />
                                                <path
                                                    d="M21.7 8.08899L15.911 2.30005C15.8161 2.2049 15.7033 2.12939 15.5792 2.07788C15.455 2.02637 15.3219 1.99988 15.1875 1.99988C15.0531 1.99988 14.92 2.02637 14.7958 2.07788C14.6717 2.12939 14.5589 2.2049 14.464 2.30005L13.74 3.02295C13.548 3.21498 13.4402 3.4754 13.4402 3.74695C13.4402 4.01849 13.548 4.27892 13.74 4.47095L14.464 5.19397L11.303 8.35498C10.1615 7.80702 8.87825 7.62639 7.62985 7.83789C6.38145 8.04939 5.2293 8.64265 4.332 9.53601C4.14026 9.72817 4.03256 9.98855 4.03256 10.26C4.03256 10.5315 4.14026 10.7918 4.332 10.984L13.016 19.667C13.208 19.859 13.4684 19.9668 13.74 19.9668C14.0115 19.9668 14.272 19.859 14.464 19.667C15.3575 18.77 15.9509 17.618 16.1624 16.3698C16.374 15.1215 16.1932 13.8383 15.645 12.697L18.806 9.53601L19.529 10.26C19.721 10.452 19.9814 10.5598 20.253 10.5598C20.5245 10.5598 20.785 10.452 20.977 10.26L21.7 9.53601C21.7952 9.44108 21.8706 9.32825 21.9221 9.2041C21.9737 9.07995 22.0002 8.94691 22.0002 8.8125C22.0002 8.67809 21.9737 8.54505 21.9221 8.4209C21.8706 8.29675 21.7952 8.18392 21.7 8.08899Z"
                                                    fill="black" />
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                                <div class="timeline-content mb-10 mt-n2">
                                    <div class="overflow-auto pe-3">
                                        <div class="fs-5 fw-bold mb-2">Invitation for crafting engaging designs that
                                            speak human workshop</div>
                                        <div class="d-flex align-items-center mt-1 fs-6">

                                            <div class="text-muted me-2 fs-7">Sent at 4:23 PM by</div>

                                            <div class="symbol symbol-circle symbol-25px" data-bs-toggle="tooltip" data-bs-boundary="window"
                                                data-bs-placement="top" title="Alan Nilson">
                                                <img src="{{ asset('assets/media/avatars/150-2.jpg') }}" alt="img" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="timeline-item">
                                <div class="timeline-line w-40px"></div>
                                <div class="timeline-icon symbol symbol-circle symbol-40px">
                                    <div class="symbol-label bg-light">
                                        <span class="svg-icon svg-icon-2 svg-icon-gray-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path
                                                    d="M11.2166 8.50002L10.5166 7.80007C10.1166 7.40007 10.1166 6.80005 10.5166 6.40005L13.4166 3.50002C15.5166 1.40002 18.9166 1.50005 20.8166 3.90005C22.5166 5.90005 22.2166 8.90007 20.3166 10.8001L17.5166 13.6C17.1166 14 16.5166 14 16.1166 13.6L15.4166 12.9C15.0166 12.5 15.0166 11.9 15.4166 11.5L18.3166 8.6C19.2166 7.7 19.1166 6.30002 18.0166 5.50002C17.2166 4.90002 16.0166 5.10007 15.3166 5.80007L12.4166 8.69997C12.2166 8.89997 11.6166 8.90002 11.2166 8.50002ZM11.2166 15.6L8.51659 18.3001C7.81659 19.0001 6.71658 19.2 5.81658 18.6C4.81658 17.9 4.71659 16.4 5.51659 15.5L8.31658 12.7C8.71658 12.3 8.71658 11.7001 8.31658 11.3001L7.6166 10.6C7.2166 10.2 6.6166 10.2 6.2166 10.6L3.6166 13.2C1.7166 15.1 1.4166 18.1 3.1166 20.1C5.0166 22.4 8.51659 22.5 10.5166 20.5L13.3166 17.7C13.7166 17.3 13.7166 16.7001 13.3166 16.3001L12.6166 15.6C12.3166 15.2 11.6166 15.2 11.2166 15.6Z"
                                                    fill="black" />
                                                <path opacity="0.3"
                                                    d="M5.0166 9L2.81659 8.40002C2.31659 8.30002 2.0166 7.79995 2.1166 7.19995L2.31659 5.90002C2.41659 5.20002 3.21659 4.89995 3.81659 5.19995L6.0166 6.40002C6.4166 6.60002 6.6166 7.09998 6.5166 7.59998L6.31659 8.30005C6.11659 8.80005 5.5166 9.1 5.0166 9ZM8.41659 5.69995H8.6166C9.1166 5.69995 9.5166 5.30005 9.5166 4.80005L9.6166 3.09998C9.6166 2.49998 9.2166 2 8.5166 2H7.81659C7.21659 2 6.71659 2.59995 6.91659 3.19995L7.31659 4.90002C7.41659 5.40002 7.91659 5.69995 8.41659 5.69995ZM14.6166 18.2L15.1166 21.3C15.2166 21.8 15.7166 22.2 16.2166 22L17.6166 21.6C18.1166 21.4 18.4166 20.8 18.1166 20.3L16.7166 17.5C16.5166 17.1 16.1166 16.9 15.7166 17L15.2166 17.1C14.8166 17.3 14.5166 17.7 14.6166 18.2ZM18.4166 16.3L19.8166 17.2C20.2166 17.5 20.8166 17.3 21.0166 16.8L21.3166 15.9C21.5166 15.4 21.1166 14.8 20.5166 14.8H18.8166C18.0166 14.8 17.7166 15.9 18.4166 16.3Z"
                                                    fill="black" />
                                            </svg>
                                        </span>
                                    </div>
                                </div>

                                <div class="timeline-content mb-10 mt-n1">

                                    <div class="mb-5 pe-3">
                                        <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">3
                                            New Incoming Project Files:</a>

                                        <div class="d-flex align-items-center mt-1 fs-6">

                                            <div class="text-muted me-2 fs-7">Sent at 10:30 PM by</div>

                                            <div class="symbol symbol-circle symbol-25px" data-bs-toggle="tooltip" data-bs-boundary="window"
                                                data-bs-placement="top" title="Jan Hummer">
                                                <img src="{{ asset('assets/media/avatars/150-6.jpg') }}" alt="img" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="overflow-auto pb-5">
                                        <div class="d-flex align-items-center border border-dashed border-gray-300 rounded min-w-700px p-5">
                                            <div class="d-flex flex-aligns-center pe-10 pe-lg-20">
                                                <img alt="" class="w-30px me-3" src="{{ asset('assets/media/svg/files/pdf.svg') }}" />
                                                <div class="ms-1 fw-bold">
                                                    <a href="#" class="fs-6 text-hover-primary fw-bolder">Finance
                                                        KPI App Guidelines</a>
                                                    <div class="text-gray-400">1.9mb</div>
                                                </div>
                                            </div>

                                            <div class="d-flex flex-aligns-center pe-10 pe-lg-20">

                                                <img alt="" class="w-30px me-3" src="{{ asset('assets/media/svg/files/doc.svg') }}" />

                                                <div class="ms-1 fw-bold">

                                                    <a href="#" class="fs-6 text-hover-primary fw-bolder">Client
                                                        UAT Testing Results</a>

                                                    <div class="text-gray-400">18kb</div>

                                                </div>

                                            </div>

                                            <div class="d-flex flex-aligns-center">

                                                <img alt="" class="w-30px me-3" src="{{ asset('assets/media/svg/files/css.svg') }}" />

                                                <div class="ms-1 fw-bold">

                                                    <a href="#" class="fs-6 text-hover-primary fw-bolder">Finance
                                                        Reports</a>

                                                    <div class="text-gray-400">20mb</div>

                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="timeline-item">
                                <div class="timeline-line w-40px"></div>
                                <div class="timeline-icon symbol symbol-circle symbol-40px">
                                    <div class="symbol-label bg-light">

                                        <span class="svg-icon svg-icon-2 svg-icon-gray-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path opacity="0.3"
                                                    d="M21.25 18.525L13.05 21.825C12.35 22.125 11.65 22.125 10.95 21.825L2.75 18.525C1.75 18.125 1.75 16.725 2.75 16.325L4.04999 15.825L10.25 18.325C10.85 18.525 11.45 18.625 12.05 18.625C12.65 18.625 13.25 18.525 13.85 18.325L20.05 15.825L21.35 16.325C22.35 16.725 22.35 18.125 21.25 18.525ZM13.05 16.425L21.25 13.125C22.25 12.725 22.25 11.325 21.25 10.925L13.05 7.62502C12.35 7.32502 11.65 7.32502 10.95 7.62502L2.75 10.925C1.75 11.325 1.75 12.725 2.75 13.125L10.95 16.425C11.65 16.725 12.45 16.725 13.05 16.425Z"
                                                    fill="black" />
                                                <path
                                                    d="M11.05 11.025L2.84998 7.725C1.84998 7.325 1.84998 5.925 2.84998 5.525L11.05 2.225C11.75 1.925 12.45 1.925 13.15 2.225L21.35 5.525C22.35 5.925 22.35 7.325 21.35 7.725L13.05 11.025C12.45 11.325 11.65 11.325 11.05 11.025Z"
                                                    fill="black" />
                                            </svg>
                                        </span>

                                    </div>
                                </div>
                                <div class="timeline-content mb-10 mt-n1">
                                    <div class="pe-3 mb-5">
                                        <div class="fs-5 fw-bold mb-2">Task
                                            <a href="#" class="text-primary fw-bolder me-1">#45890</a>merged
                                            with
                                            <a href="#" class="text-primary fw-bolder me-1">#45890</a>in “Ads
                                            Pro
                                            Admin Dashboard project:
                                        </div>
                                        <div class="d-flex align-items-center mt-1 fs-6">
                                            <div class="text-muted me-2 fs-7">Initiated at 4:23 PM by</div>
                                            <div class="symbol symbol-circle symbol-25px" data-bs-toggle="tooltip" data-bs-boundary="window"
                                                data-bs-placement="top" title="Nina Nilson">
                                                <img src="{{ asset('assets/media/avatars/150-11.jpg') }}" alt="img" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="timeline-item">

                                <div class="timeline-line w-40px"></div>

                                <div class="timeline-icon symbol symbol-circle symbol-40px">
                                    <div class="symbol-label bg-light">

                                        <span class="svg-icon svg-icon-2 svg-icon-gray-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path opacity="0.3"
                                                    d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z"
                                                    fill="black" />
                                                <path
                                                    d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z"
                                                    fill="black" />
                                            </svg>
                                        </span>

                                    </div>
                                </div>

                                <div class="timeline-content mb-10 mt-n1">

                                    <div class="pe-3 mb-5">

                                        <div class="fs-5 fw-bold mb-2">3 new application design concepts added:</div>

                                        <div class="d-flex align-items-center mt-1 fs-6">

                                            <div class="text-muted me-2 fs-7">Created at 4:23 PM by</div>

                                            <div class="symbol symbol-circle symbol-25px" data-bs-toggle="tooltip" data-bs-boundary="window"
                                                data-bs-placement="top" title="Marcus Dotson">
                                                <img src="{{ asset('assets/media/avatars/150-3.jpg') }}" alt="img" />
                                            </div>

                                        </div>

                                    </div>

                                    <div class="overflow-auto pb-5">
                                        <div class="d-flex align-items-center border border-dashed border-gray-300 rounded min-w-700px p-7">

                                            <div class="overlay me-10">

                                                <div class="overlay-wrapper">
                                                    <img alt="img" class="rounded w-100px"
                                                        src="{{ asset('assets/media/stock/300x270/1.jpg') }}" />
                                                </div>

                                                <div class="overlay-layer bg-dark bg-opacity-10 rounded">
                                                    <a href="#" class="btn btn-sm btn-primary btn-shadow">Explore</a>
                                                </div>

                                            </div>

                                            <div class="overlay me-10">

                                                <div class="overlay-wrapper">
                                                    <img alt="img" class="rounded w-100px"
                                                        src="{{ asset('assets/media/stock/300x270/2.jpg') }}" />
                                                </div>

                                                <div class="overlay-layer bg-dark bg-opacity-10 rounded">
                                                    <a href="#" class="btn btn-sm btn-primary btn-shadow">Explore</a>
                                                </div>

                                            </div>

                                            <div class="overlay">

                                                <div class="overlay-wrapper">
                                                    <img alt="img" class="rounded w-100px"
                                                        src="{{ asset('assets/media/stock/300x270/3.jpg') }}" />
                                                </div>

                                                <div class="overlay-layer bg-dark bg-opacity-10 rounded">
                                                    <a href="#" class="btn btn-sm btn-primary btn-shadow">Explore</a>
                                                </div>

                                            </div>

                                        </div>
                                    </div>

                                </div>

                            </div>

                            <div class="timeline-item">

                                <div class="timeline-line w-40px"></div>

                                <div class="timeline-icon symbol symbol-circle symbol-40px">
                                    <div class="symbol-label bg-light">

                                        <span class="svg-icon svg-icon-2 svg-icon-gray-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path
                                                    d="M6 8.725C6 8.125 6.4 7.725 7 7.725H14L18 11.725V12.925L22 9.725L12.6 2.225C12.2 1.925 11.7 1.925 11.4 2.225L2 9.725L6 12.925V8.725Z"
                                                    fill="black" />
                                                <path opacity="0.3"
                                                    d="M22 9.72498V20.725C22 21.325 21.6 21.725 21 21.725H3C2.4 21.725 2 21.325 2 20.725V9.72498L11.4 17.225C11.8 17.525 12.3 17.525 12.6 17.225L22 9.72498ZM15 11.725H18L14 7.72498V10.725C14 11.325 14.4 11.725 15 11.725Z"
                                                    fill="black" />
                                            </svg>
                                        </span>

                                    </div>
                                </div>

                                <div class="timeline-content mb-10 mt-n1">

                                    <div class="pe-3 mb-5">

                                        <div class="fs-5 fw-bold mb-2">New case
                                            <a href="#" class="text-primary fw-bolder me-1">#67890</a>is
                                            assigned
                                            to you in Multi-platform Database Design project
                                        </div>

                                        <div class="overflow-auto pb-5">

                                            <div class="d-flex align-items-center mt-1 fs-6">

                                                <div class="text-muted me-2 fs-7">Added at 4:23 PM by</div>

                                                <a href="#" class="text-primary fw-bolder me-1">Alice Tan</a>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                            <div class="timeline-item">

                                <div class="timeline-line w-40px"></div>

                                <div class="timeline-icon symbol symbol-circle symbol-40px">
                                    <div class="symbol-label bg-light">

                                        <span class="svg-icon svg-icon-2 svg-icon-gray-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path opacity="0.3"
                                                    d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z"
                                                    fill="black" />
                                                <path
                                                    d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z"
                                                    fill="black" />
                                            </svg>
                                        </span>

                                    </div>
                                </div>

                                <div class="timeline-content mb-10 mt-n1">

                                    <div class="pe-3 mb-5">

                                        <div class="fs-5 fw-bold mb-2">You have received a new order:</div>

                                        <div class="d-flex align-items-center mt-1 fs-6">

                                            <div class="text-muted me-2 fs-7">Placed at 5:05 AM by</div>

                                            <div class="symbol symbol-circle symbol-25px" data-bs-toggle="tooltip" data-bs-boundary="window"
                                                data-bs-placement="top" title="Robert Rich">
                                                <img src="{{ asset('assets/media/avatars/150-14.jpg') }}" alt="img" />
                                            </div>

                                        </div>

                                    </div>

                                    <div class="overflow-auto pb-5">

                                        <div
                                            class="notice d-flex bg-light-primary rounded border-primary border border-dashed min-w-lg-600px flex-shrink-0 p-6">

                                            <span class="svg-icon svg-icon-2tx svg-icon-primary me-4">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                                    fill="none">
                                                    <path opacity="0.3"
                                                        d="M19.0687 17.9688H11.0687C10.4687 17.9688 10.0687 18.3687 10.0687 18.9688V19.9688C10.0687 20.5687 10.4687 20.9688 11.0687 20.9688H19.0687C19.6687 20.9688 20.0687 20.5687 20.0687 19.9688V18.9688C20.0687 18.3687 19.6687 17.9688 19.0687 17.9688Z"
                                                        fill="black" />
                                                    <path
                                                        d="M4.06875 17.9688C3.86875 17.9688 3.66874 17.8688 3.46874 17.7688C2.96874 17.4688 2.86875 16.8688 3.16875 16.3688L6.76874 10.9688L3.16875 5.56876C2.86875 5.06876 2.96874 4.46873 3.46874 4.16873C3.96874 3.86873 4.56875 3.96878 4.86875 4.46878L8.86875 10.4688C9.06875 10.7688 9.06875 11.2688 8.86875 11.5688L4.86875 17.5688C4.66875 17.7688 4.36875 17.9688 4.06875 17.9688Z"
                                                        fill="black" />
                                                </svg>
                                            </span>

                                            <div class="d-flex flex-stack flex-grow-1 flex-wrap flex-md-nowrap">

                                                <div class="mb-3 mb-md-0 fw-bold">
                                                    <h4 class="text-gray-900 fw-bolder">Database Backup Process
                                                        Completed!
                                                    </h4>
                                                    <div class="fs-6 text-gray-700 pe-7">Login into Jet Admin Dashboard
                                                        to
                                                        make sure the data integrity is OK</div>
                                                </div>

                                                <a href="#" class="btn btn-primary px-6 align-self-center text-nowrap">Proceed</a>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                            <div class="timeline-item">
                                <div class="timeline-line w-40px"></div>
                                <div class="timeline-icon symbol symbol-circle symbol-40px">
                                    <div class="symbol-label bg-light">
                                        <span class="svg-icon svg-icon-2 svg-icon-gray-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path
                                                    d="M21 10H13V11C13 11.6 12.6 12 12 12C11.4 12 11 11.6 11 11V10H3C2.4 10 2 10.4 2 11V13H22V11C22 10.4 21.6 10 21 10Z"
                                                    fill="black" />
                                                <path opacity="0.3"
                                                    d="M12 12C11.4 12 11 11.6 11 11V3C11 2.4 11.4 2 12 2C12.6 2 13 2.4 13 3V11C13 11.6 12.6 12 12 12Z"
                                                    fill="black" />
                                                <path opacity="0.3"
                                                    d="M18.1 21H5.9C5.4 21 4.9 20.6 4.8 20.1L3 13H21L19.2 20.1C19.1 20.6 18.6 21 18.1 21ZM13 18V15C13 14.4 12.6 14 12 14C11.4 14 11 14.4 11 15V18C11 18.6 11.4 19 12 19C12.6 19 13 18.6 13 18ZM17 18V15C17 14.4 16.6 14 16 14C15.4 14 15 14.4 15 15V18C15 18.6 15.4 19 16 19C16.6 19 17 18.6 17 18ZM9 18V15C9 14.4 8.6 14 8 14C7.4 14 7 14.4 7 15V18C7 18.6 7.4 19 8 19C8.6 19 9 18.6 9 18Z"
                                                    fill="black" />
                                            </svg>
                                        </span>
                                    </div>
                                </div>

                                <div class="timeline-content mt-n1">

                                    <div class="pe-3 mb-5">

                                        <div class="fs-5 fw-bold mb-2">New order
                                            <a href="#" class="text-primary fw-bolder me-1">#67890</a>is placed
                                            for Workshow Planning &amp; Budget Estimation
                                        </div>

                                        <div class="d-flex align-items-center mt-1 fs-6">

                                            <div class="text-muted me-2 fs-7">Placed at 4:23 PM by</div>

                                            <a href="#" class="text-primary fw-bolder me-1">Jimmy Bold</a>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="card-footer py-5 text-center" id="kt_activities_footer">
                    <a href="../dist/pages/profile/activity.html" class="btn btn-bg-body text-primary">View All
                        Activities

                        <span class="svg-icon svg-icon-3 svg-icon-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1" transform="rotate(-180 18 13)"
                                    fill="black" />
                                <path
                                    d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z"
                                    fill="black" />
                            </svg>
                        </span>

                    </a>
                </div>

            </div>
        </div>

        <div class="modal fade" id="kt_modal_invite_friends" tabindex="-1" aria-hidden="true">

            <div class="modal-dialog mw-650px">

                <div class="modal-content">

                    <div class="modal-header pb-0 border-0 justify-content-end">

                        <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">

                            <span class="svg-icon svg-icon-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                        transform="rotate(-45 6 17.3137)" fill="black" />
                                    <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)"
                                        fill="black" />
                                </svg>
                            </span>

                        </div>

                    </div>

                    <div class="modal-body scroll-y mx-5 mx-xl-18 pt-0 pb-15">

                        <div class="text-center mb-13">

                            <h1 class="mb-3">Invite a Friend</h1>

                            <div class="text-muted fw-bold fs-5">If you need more info, please check out
                                <a href="#" class="link-primary fw-bolder">FAQ Page</a>.
                            </div>

                        </div>

                        <div class="btn btn-light-primary fw-bolder w-100 mb-8">
                            <img alt="Logo" src="{{ asset('assets/media/svg/brand-logos/google-icon.svg') }}" class="h-20px me-3" />Invite Gmail
                            Contacts
                        </div>

                        <div class="separator d-flex flex-center mb-8">
                            <span class="text-uppercase bg-body fs-7 fw-bold text-muted px-3">or</span>
                        </div>

                        <textarea class="form-control form-control-solid mb-8" rows="3" placeholder="Type or paste emails here"></textarea>

                        <div class="mb-10">

                            <div class="fs-6 fw-bold mb-2">Your Invitations</div>

                            <div class="mh-300px scroll-y me-n7 pe-7">

                                <div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">

                                    <div class="d-flex align-items-center">

                                        <div class="symbol symbol-35px symbol-circle">
                                            <img alt="Pic" src="{{ asset('assets/media/avatars/150-1.jpg') }}" />
                                        </div>

                                        <div class="ms-5">
                                            <a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Emma
                                                Smith</a>
                                            <div class="fw-bold text-muted">e.smith@kpmg.com.au</div>
                                        </div>

                                    </div>

                                    <div class="ms-2 w-100px">
                                        <select class="form-select form-select-solid form-select-sm" data-control="select2" data-hide-search="true">
                                            <option value="1">Guest</option>
                                            <option value="2" selected="selected">Owner</option>
                                            <option value="3">Can Edit</option>
                                        </select>
                                    </div>

                                </div>

                                <div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">

                                    <div class="d-flex align-items-center">

                                        <div class="symbol symbol-35px symbol-circle">
                                            <span class="symbol-label bg-light-danger text-danger fw-bold">M</span>
                                        </div>

                                        <div class="ms-5">
                                            <a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Melody
                                                Macy</a>
                                            <div class="fw-bold text-muted">melody@altbox.com</div>
                                        </div>

                                    </div>

                                    <div class="ms-2 w-100px">
                                        <select class="form-select form-select-solid form-select-sm" data-control="select2" data-hide-search="true">
                                            <option value="1" selected="selected">Guest</option>
                                            <option value="2">Owner</option>
                                            <option value="3">Can Edit</option>
                                        </select>
                                    </div>

                                </div>

                                <div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">

                                    <div class="d-flex align-items-center">

                                        <div class="symbol symbol-35px symbol-circle">
                                            <img alt="Pic" src="{{ asset('assets/media/avatars/150-26.jpg') }}" />
                                        </div>

                                        <div class="ms-5">
                                            <a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Max
                                                Smith</a>
                                            <div class="fw-bold text-muted">max@kt.com</div>
                                        </div>

                                    </div>

                                    <div class="ms-2 w-100px">
                                        <select class="form-select form-select-solid form-select-sm" data-control="select2" data-hide-search="true">
                                            <option value="1">Guest</option>
                                            <option value="2">Owner</option>
                                            <option value="3" selected="selected">Can Edit</option>
                                        </select>
                                    </div>

                                </div>

                                <div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">

                                    <div class="d-flex align-items-center">

                                        <div class="symbol symbol-35px symbol-circle">
                                            <img alt="Pic" src="{{ asset('assets/media/avatars/150-4.jpg') }}" />
                                        </div>

                                        <div class="ms-5">
                                            <a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Sean
                                                Bean</a>
                                            <div class="fw-bold text-muted">sean@dellito.com</div>
                                        </div>

                                    </div>

                                    <div class="ms-2 w-100px">
                                        <select class="form-select form-select-solid form-select-sm" data-control="select2" data-hide-search="true">
                                            <option value="1">Guest</option>
                                            <option value="2" selected="selected">Owner</option>
                                            <option value="3">Can Edit</option>
                                        </select>
                                    </div>

                                </div>

                                <div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">

                                    <div class="d-flex align-items-center">

                                        <div class="symbol symbol-35px symbol-circle">
                                            <img alt="Pic" src="{{ asset('assets/media/avatars/150-15.jpg') }}" />
                                        </div>

                                        <div class="ms-5">
                                            <a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Brian
                                                Cox</a>
                                            <div class="fw-bold text-muted">brian@exchange.com</div>
                                        </div>

                                    </div>

                                    <div class="ms-2 w-100px">
                                        <select class="form-select form-select-solid form-select-sm" data-control="select2" data-hide-search="true">
                                            <option value="1">Guest</option>
                                            <option value="2">Owner</option>
                                            <option value="3" selected="selected">Can Edit</option>
                                        </select>
                                    </div>

                                </div>

                                <div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">

                                    <div class="d-flex align-items-center">

                                        <div class="symbol symbol-35px symbol-circle">
                                            <span class="symbol-label bg-light-warning text-warning fw-bold">M</span>
                                        </div>

                                        <div class="ms-5">
                                            <a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Mikaela
                                                Collins</a>
                                            <div class="fw-bold text-muted">mikaela@pexcom.com</div>
                                        </div>

                                    </div>

                                    <div class="ms-2 w-100px">
                                        <select class="form-select form-select-solid form-select-sm" data-control="select2" data-hide-search="true">
                                            <option value="1">Guest</option>
                                            <option value="2" selected="selected">Owner</option>
                                            <option value="3">Can Edit</option>
                                        </select>
                                    </div>

                                </div>

                                <div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">

                                    <div class="d-flex align-items-center">

                                        <div class="symbol symbol-35px symbol-circle">
                                            <img alt="Pic" src="{{ asset('assets/media/avatars/150-8.jpg') }}" />
                                        </div>

                                        <div class="ms-5">
                                            <a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Francis
                                                Mitcham</a>
                                            <div class="fw-bold text-muted">f.mitcham@kpmg.com.au</div>
                                        </div>

                                    </div>

                                    <div class="ms-2 w-100px">
                                        <select class="form-select form-select-solid form-select-sm" data-control="select2" data-hide-search="true">
                                            <option value="1">Guest</option>
                                            <option value="2">Owner</option>
                                            <option value="3" selected="selected">Can Edit</option>
                                        </select>
                                    </div>

                                </div>

                                <div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">

                                    <div class="d-flex align-items-center">

                                        <div class="symbol symbol-35px symbol-circle">
                                            <span class="symbol-label bg-light-danger text-danger fw-bold">O</span>
                                        </div>

                                        <div class="ms-5">
                                            <a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Olivia
                                                Wild</a>
                                            <div class="fw-bold text-muted">olivia@corpmail.com</div>
                                        </div>

                                    </div>

                                    <div class="ms-2 w-100px">
                                        <select class="form-select form-select-solid form-select-sm" data-control="select2" data-hide-search="true">
                                            <option value="1">Guest</option>
                                            <option value="2" selected="selected">Owner</option>
                                            <option value="3">Can Edit</option>
                                        </select>
                                    </div>

                                </div>

                                <div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">

                                    <div class="d-flex align-items-center">

                                        <div class="symbol symbol-35px symbol-circle">
                                            <span class="symbol-label bg-light-primary text-primary fw-bold">N</span>
                                        </div>

                                        <div class="ms-5">
                                            <a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Neil
                                                Owen</a>
                                            <div class="fw-bold text-muted">owen.neil@gmail.com</div>
                                        </div>

                                    </div>

                                    <div class="ms-2 w-100px">
                                        <select class="form-select form-select-solid form-select-sm" data-control="select2" data-hide-search="true">
                                            <option value="1" selected="selected">Guest</option>
                                            <option value="2">Owner</option>
                                            <option value="3">Can Edit</option>
                                        </select>
                                    </div>

                                </div>

                                <div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">

                                    <div class="d-flex align-items-center">

                                        <div class="symbol symbol-35px symbol-circle">
                                            <img alt="Pic" src="{{ asset('assets/media/avatars/150-6.jpg') }}" />
                                        </div>

                                        <div class="ms-5">
                                            <a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Dan
                                                Wilson</a>
                                            <div class="fw-bold text-muted">dam@consilting.com</div>
                                        </div>

                                    </div>

                                    <div class="ms-2 w-100px">
                                        <select class="form-select form-select-solid form-select-sm" data-control="select2" data-hide-search="true">
                                            <option value="1">Guest</option>
                                            <option value="2">Owner</option>
                                            <option value="3" selected="selected">Can Edit</option>
                                        </select>
                                    </div>

                                </div>

                                <div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">

                                    <div class="d-flex align-items-center">

                                        <div class="symbol symbol-35px symbol-circle">
                                            <span class="symbol-label bg-light-danger text-danger fw-bold">E</span>
                                        </div>

                                        <div class="ms-5">
                                            <a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Emma
                                                Bold</a>
                                            <div class="fw-bold text-muted">emma@intenso.com</div>
                                        </div>

                                    </div>

                                    <div class="ms-2 w-100px">
                                        <select class="form-select form-select-solid form-select-sm" data-control="select2" data-hide-search="true">
                                            <option value="1">Guest</option>
                                            <option value="2" selected="selected">Owner</option>
                                            <option value="3">Can Edit</option>
                                        </select>
                                    </div>

                                </div>

                                <div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">

                                    <div class="d-flex align-items-center">

                                        <div class="symbol symbol-35px symbol-circle">
                                            <img alt="Pic" src="{{ asset('assets/media/avatars/150-7.jpg') }}" />
                                        </div>

                                        <div class="ms-5">
                                            <a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Ana
                                                Crown</a>
                                            <div class="fw-bold text-muted">ana.cf@limtel.com</div>
                                        </div>

                                    </div>

                                    <div class="ms-2 w-100px">
                                        <select class="form-select form-select-solid form-select-sm" data-control="select2" data-hide-search="true">
                                            <option value="1" selected="selected">Guest</option>
                                            <option value="2">Owner</option>
                                            <option value="3">Can Edit</option>
                                        </select>
                                    </div>

                                </div>

                                <div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">

                                    <div class="d-flex align-items-center">

                                        <div class="symbol symbol-35px symbol-circle">
                                            <span class="symbol-label bg-light-info text-info fw-bold">A</span>
                                        </div>

                                        <div class="ms-5">
                                            <a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Robert
                                                Doe</a>
                                            <div class="fw-bold text-muted">robert@benko.com</div>
                                        </div>

                                    </div>

                                    <div class="ms-2 w-100px">
                                        <select class="form-select form-select-solid form-select-sm" data-control="select2" data-hide-search="true">
                                            <option value="1">Guest</option>
                                            <option value="2">Owner</option>
                                            <option value="3" selected="selected">Can Edit</option>
                                        </select>
                                    </div>

                                </div>

                                <div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">

                                    <div class="d-flex align-items-center">

                                        <div class="symbol symbol-35px symbol-circle">
                                            <img alt="Pic" src="{{ asset('assets/media/avatars/150-17.jpg') }}" />
                                        </div>

                                        <div class="ms-5">
                                            <a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">John
                                                Miller</a>
                                            <div class="fw-bold text-muted">miller@mapple.com</div>
                                        </div>

                                    </div>

                                    <div class="ms-2 w-100px">
                                        <select class="form-select form-select-solid form-select-sm" data-control="select2" data-hide-search="true">
                                            <option value="1">Guest</option>
                                            <option value="2">Owner</option>
                                            <option value="3" selected="selected">Can Edit</option>
                                        </select>
                                    </div>

                                </div>

                                <div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">

                                    <div class="d-flex align-items-center">

                                        <div class="symbol symbol-35px symbol-circle">
                                            <span class="symbol-label bg-light-success text-success fw-bold">L</span>
                                        </div>

                                        <div class="ms-5">
                                            <a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Lucy
                                                Kunic</a>
                                            <div class="fw-bold text-muted">lucy.m@fentech.com</div>
                                        </div>

                                    </div>

                                    <div class="ms-2 w-100px">
                                        <select class="form-select form-select-solid form-select-sm" data-control="select2" data-hide-search="true">
                                            <option value="1">Guest</option>
                                            <option value="2" selected="selected">Owner</option>
                                            <option value="3">Can Edit</option>
                                        </select>
                                    </div>

                                </div>

                                <div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">

                                    <div class="d-flex align-items-center">

                                        <div class="symbol symbol-35px symbol-circle">
                                            <img alt="Pic" src="{{ asset('assets/media/avatars/150-10.jpg') }}" />
                                        </div>

                                        <div class="ms-5">
                                            <a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Ethan
                                                Wilder</a>
                                            <div class="fw-bold text-muted">ethan@loop.com.au</div>
                                        </div>

                                    </div>

                                    <div class="ms-2 w-100px">
                                        <select class="form-select form-select-solid form-select-sm" data-control="select2" data-hide-search="true">
                                            <option value="1" selected="selected">Guest</option>
                                            <option value="2">Owner</option>
                                            <option value="3">Can Edit</option>
                                        </select>
                                    </div>

                                </div>

                                <div class="d-flex flex-stack py-4">

                                    <div class="d-flex align-items-center">

                                        <div class="symbol symbol-35px symbol-circle">
                                            <span class="symbol-label bg-light-success text-success fw-bold">L</span>
                                        </div>

                                        <div class="ms-5">
                                            <a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Lucy
                                                Kunic</a>
                                            <div class="fw-bold text-muted">lucy.m@fentech.com</div>
                                        </div>

                                    </div>

                                    <div class="ms-2 w-100px">
                                        <select class="form-select form-select-solid form-select-sm" data-control="select2" data-hide-search="true">
                                            <option value="1">Guest</option>
                                            <option value="2">Owner</option>
                                            <option value="3" selected="selected">Can Edit</option>
                                        </select>
                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="d-flex flex-stack">

                            <div class="me-5 fw-bold">
                                <label class="fs-6">Adding Users by Team Members</label>
                                <div class="fs-7 text-muted">If you need more info, please check budget planning</div>
                            </div>

                            <label class="form-check form-switch form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" value="1" checked="checked" />
                                <span class="form-check-label fw-bold text-muted">Allowed</span>
                            </label>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <div class="modal fade" id="kt_modal_create_app" tabindex="-1" aria-hidden="true">

            <div class="modal-dialog modal-dialog-centered mw-900px">

                <div class="modal-content">

                    <div class="modal-header">

                        <h2>Create App</h2>

                        <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">

                            <span class="svg-icon svg-icon-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                        transform="rotate(-45 6 17.3137)" fill="black" />
                                    <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)"
                                        fill="black" />
                                </svg>
                            </span>

                        </div>

                    </div>

                    <div class="modal-body py-lg-10 px-lg-10">

                        <div class="stepper stepper-pills stepper-column d-flex flex-column flex-xl-row flex-row-fluid" id="kt_modal_create_app_stepper">

                            <div class="d-flex justify-content-center justify-content-xl-start flex-row-auto w-100 w-xl-300px">

                                <div class="stepper-nav ps-lg-10">

                                    <div class="stepper-item current" data-kt-stepper-element="nav">

                                        <div class="stepper-line w-40px"></div>

                                        <div class="stepper-icon w-40px h-40px">
                                            <i class="stepper-check fas fa-check"></i>
                                            <span class="stepper-number">1</span>
                                        </div>

                                        <div class="stepper-label">
                                            <h3 class="stepper-title">Details</h3>
                                            <div class="stepper-desc">Name your App</div>
                                        </div>

                                    </div>

                                    <div class="stepper-item" data-kt-stepper-element="nav">

                                        <div class="stepper-line w-40px"></div>

                                        <div class="stepper-icon w-40px h-40px">
                                            <i class="stepper-check fas fa-check"></i>
                                            <span class="stepper-number">2</span>
                                        </div>

                                        <div class="stepper-label">
                                            <h3 class="stepper-title">Frameworks</h3>
                                            <div class="stepper-desc">Define your app framework</div>
                                        </div>

                                    </div>

                                    <div class="stepper-item" data-kt-stepper-element="nav">

                                        <div class="stepper-line w-40px"></div>

                                        <div class="stepper-icon w-40px h-40px">
                                            <i class="stepper-check fas fa-check"></i>
                                            <span class="stepper-number">3</span>
                                        </div>

                                        <div class="stepper-label">
                                            <h3 class="stepper-title">Database</h3>
                                            <div class="stepper-desc">Select the app database type</div>
                                        </div>

                                    </div>

                                    <div class="stepper-item" data-kt-stepper-element="nav">

                                        <div class="stepper-line w-40px"></div>

                                        <div class="stepper-icon w-40px h-40px">
                                            <i class="stepper-check fas fa-check"></i>
                                            <span class="stepper-number">4</span>
                                        </div>

                                        <div class="stepper-label">
                                            <h3 class="stepper-title">Billing</h3>
                                            <div class="stepper-desc">Provide payment details</div>
                                        </div>

                                    </div>

                                    <div class="stepper-item" data-kt-stepper-element="nav">

                                        <div class="stepper-line w-40px"></div>

                                        <div class="stepper-icon w-40px h-40px">
                                            <i class="stepper-check fas fa-check"></i>
                                            <span class="stepper-number">5</span>
                                        </div>

                                        <div class="stepper-label">
                                            <h3 class="stepper-title">Completed</h3>
                                            <div class="stepper-desc">Review and Submit</div>
                                        </div>

                                    </div>

                                </div>

                            </div>

                            <div class="flex-row-fluid py-lg-5 px-lg-15">

                                <form class="form" novalidate="novalidate" id="kt_modal_create_app_form">

                                    <div class="current" data-kt-stepper-element="content">
                                        <div class="w-100">

                                            <div class="fv-row mb-10">

                                                <label class="d-flex align-items-center fs-5 fw-bold mb-2">
                                                    <span class="required">App Name</span>
                                                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                                        title="Specify your unique app name"></i>
                                                </label>

                                                <input type="text" class="form-control form-control-lg form-control-solid" name="name"
                                                    placeholder="" value="" />

                                            </div>

                                            <div class="fv-row">

                                                <label class="d-flex align-items-center fs-5 fw-bold mb-4">
                                                    <span class="required">Category</span>
                                                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                                        title="Select your app category"></i>
                                                </label>

                                                <div class="fv-row">

                                                    <label class="d-flex flex-stack mb-5 cursor-pointer">

                                                        <span class="d-flex align-items-center me-2">

                                                            <span class="symbol symbol-50px me-6">
                                                                <span class="symbol-label bg-light-primary">

                                                                    <span class="svg-icon svg-icon-1 svg-icon-primary">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                                            viewBox="0 0 24 24" fill="none">
                                                                            <path opacity="0.3"
                                                                                d="M18.4 5.59998C21.9 9.09998 21.9 14.8 18.4 18.3C14.9 21.8 9.2 21.8 5.7 18.3L18.4 5.59998Z"
                                                                                fill="black" />
                                                                            <path
                                                                                d="M12 2C6.5 2 2 6.5 2 12C2 17.5 6.5 22 12 22C17.5 22 22 17.5 22 12C22 6.5 17.5 2 12 2ZM19.9 11H13V8.8999C14.9 8.6999 16.7 8.00005 18.1 6.80005C19.1 8.00005 19.7 9.4 19.9 11ZM11 19.8999C9.7 19.6999 8.39999 19.2 7.39999 18.5C8.49999 17.7 9.7 17.2001 11 17.1001V19.8999ZM5.89999 6.90002C7.39999 8.10002 9.2 8.8 11 9V11.1001H4.10001C4.30001 9.4001 4.89999 8.00002 5.89999 6.90002ZM7.39999 5.5C8.49999 4.7 9.7 4.19998 11 4.09998V7C9.7 6.8 8.39999 6.3 7.39999 5.5ZM13 17.1001C14.3 17.3001 15.6 17.8 16.6 18.5C15.5 19.3 14.3 19.7999 13 19.8999V17.1001ZM13 4.09998C14.3 4.29998 15.6 4.8 16.6 5.5C15.5 6.3 14.3 6.80002 13 6.90002V4.09998ZM4.10001 13H11V15.1001C9.1 15.3001 7.29999 16 5.89999 17.2C4.89999 16 4.30001 14.6 4.10001 13ZM18.1 17.1001C16.6 15.9001 14.8 15.2 13 15V12.8999H19.9C19.7 14.5999 19.1 16.0001 18.1 17.1001Z"
                                                                                fill="black" />
                                                                        </svg>
                                                                    </span>

                                                                </span>
                                                            </span>

                                                            <span class="d-flex flex-column">
                                                                <span class="fw-bolder fs-6">Quick Online
                                                                    Courses</span>
                                                                <span class="fs-7 text-muted">Creating a clear text
                                                                    structure is just one SEO</span>
                                                            </span>

                                                        </span>

                                                        <span class="form-check form-check-custom form-check-solid">
                                                            <input class="form-check-input" type="radio" name="category" value="1" />
                                                        </span>

                                                    </label>

                                                    <label class="d-flex flex-stack mb-5 cursor-pointer">

                                                        <span class="d-flex align-items-center me-2">

                                                            <span class="symbol symbol-50px me-6">
                                                                <span class="symbol-label bg-light-danger">

                                                                    <span class="svg-icon svg-icon-1 svg-icon-danger">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                                                            viewBox="0 0 24 24">
                                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                <rect x="5" y="5" width="5" height="5" rx="1"
                                                                                    fill="#000000" />
                                                                                <rect x="14" y="5" width="5" height="5" rx="1"
                                                                                    fill="#000000" opacity="0.3" />
                                                                                <rect x="5" y="14" width="5" height="5" rx="1"
                                                                                    fill="#000000" opacity="0.3" />
                                                                                <rect x="14" y="14" width="5" height="5" rx="1"
                                                                                    fill="#000000" opacity="0.3" />
                                                                            </g>
                                                                        </svg>
                                                                    </span>

                                                                </span>
                                                            </span>

                                                            <span class="d-flex flex-column">
                                                                <span class="fw-bolder fs-6">Face to Face
                                                                    Discussions</span>
                                                                <span class="fs-7 text-muted">Creating a clear text
                                                                    structure is just one aspect</span>
                                                            </span>

                                                        </span>

                                                        <span class="form-check form-check-custom form-check-solid">
                                                            <input class="form-check-input" type="radio" name="category" value="2" />
                                                        </span>

                                                    </label>

                                                    <label class="d-flex flex-stack cursor-pointer">

                                                        <span class="d-flex align-items-center me-2">

                                                            <span class="symbol symbol-50px me-6">
                                                                <span class="symbol-label bg-light-success">

                                                                    <span class="svg-icon svg-icon-1 svg-icon-success">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                                            viewBox="0 0 24 24" fill="none">
                                                                            <path opacity="0.3"
                                                                                d="M20.9 12.9C20.3 12.9 19.9 12.5 19.9 11.9C19.9 11.3 20.3 10.9 20.9 10.9H21.8C21.3 6.2 17.6 2.4 12.9 2V2.9C12.9 3.5 12.5 3.9 11.9 3.9C11.3 3.9 10.9 3.5 10.9 2.9V2C6.19999 2.5 2.4 6.2 2 10.9H2.89999C3.49999 10.9 3.89999 11.3 3.89999 11.9C3.89999 12.5 3.49999 12.9 2.89999 12.9H2C2.5 17.6 6.19999 21.4 10.9 21.8V20.9C10.9 20.3 11.3 19.9 11.9 19.9C12.5 19.9 12.9 20.3 12.9 20.9V21.8C17.6 21.3 21.4 17.6 21.8 12.9H20.9Z"
                                                                                fill="black" />
                                                                            <path
                                                                                d="M16.9 10.9H13.6C13.4 10.6 13.2 10.4 12.9 10.2V5.90002C12.9 5.30002 12.5 4.90002 11.9 4.90002C11.3 4.90002 10.9 5.30002 10.9 5.90002V10.2C10.6 10.4 10.4 10.6 10.2 10.9H9.89999C9.29999 10.9 8.89999 11.3 8.89999 11.9C8.89999 12.5 9.29999 12.9 9.89999 12.9H10.2C10.4 13.2 10.6 13.4 10.9 13.6V13.9C10.9 14.5 11.3 14.9 11.9 14.9C12.5 14.9 12.9 14.5 12.9 13.9V13.6C13.2 13.4 13.4 13.2 13.6 12.9H16.9C17.5 12.9 17.9 12.5 17.9 11.9C17.9 11.3 17.5 10.9 16.9 10.9Z"
                                                                                fill="black" />
                                                                        </svg>
                                                                    </span>

                                                                </span>
                                                            </span>

                                                            <span class="d-flex flex-column">
                                                                <span class="fw-bolder fs-6">Full Intro Training</span>
                                                                <span class="fs-7 text-muted">Creating a clear text
                                                                    structure copywriting</span>
                                                            </span>

                                                        </span>

                                                        <span class="form-check form-check-custom form-check-solid">
                                                            <input class="form-check-input" type="radio" name="category" value="3" />
                                                        </span>

                                                    </label>

                                                </div>

                                            </div>

                                        </div>
                                    </div>

                                    <div data-kt-stepper-element="content">
                                        <div class="w-100">

                                            <div class="fv-row">

                                                <label class="d-flex align-items-center fs-5 fw-bold mb-4">
                                                    <span class="required">Select Framework</span>
                                                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                                        title="Specify your apps framework"></i>
                                                </label>

                                                <label class="d-flex flex-stack cursor-pointer mb-5">

                                                    <span class="d-flex align-items-center me-2">

                                                        <span class="symbol symbol-50px me-6">
                                                            <span class="symbol-label bg-light-warning">
                                                                <i class="fab fa-html5 text-warning fs-2x"></i>
                                                            </span>
                                                        </span>

                                                        <span class="d-flex flex-column">
                                                            <span class="fw-bolder fs-6">HTML5</span>
                                                            <span class="fs-7 text-muted">Base Web Projec</span>
                                                        </span>

                                                    </span>

                                                    <span class="form-check form-check-custom form-check-solid">
                                                        <input class="form-check-input" type="radio" checked="checked" name="framework"
                                                            value="1" />
                                                    </span>

                                                </label>

                                                <label class="d-flex flex-stack cursor-pointer mb-5">

                                                    <span class="d-flex align-items-center me-2">

                                                        <span class="symbol symbol-50px me-6">
                                                            <span class="symbol-label bg-light-success">
                                                                <i class="fab fa-react text-success fs-2x"></i>
                                                            </span>
                                                        </span>

                                                        <span class="d-flex flex-column">
                                                            <span class="fw-bolder fs-6">ReactJS</span>
                                                            <span class="fs-7 text-muted">Robust and flexible app
                                                                framework</span>
                                                        </span>

                                                    </span>

                                                    <span class="form-check form-check-custom form-check-solid">
                                                        <input class="form-check-input" type="radio" name="framework" value="2" />
                                                    </span>

                                                </label>

                                                <label class="d-flex flex-stack cursor-pointer mb-5">

                                                    <span class="d-flex align-items-center me-2">

                                                        <span class="symbol symbol-50px me-6">
                                                            <span class="symbol-label bg-light-danger">
                                                                <i class="fab fa-angular text-danger fs-2x"></i>
                                                            </span>
                                                        </span>

                                                        <span class="d-flex flex-column">
                                                            <span class="fw-bolder fs-6">Angular</span>
                                                            <span class="fs-7 text-muted">Powerful data
                                                                mangement</span>
                                                        </span>

                                                    </span>

                                                    <span class="form-check form-check-custom form-check-solid">
                                                        <input class="form-check-input" type="radio" name="framework" value="3" />
                                                    </span>

                                                </label>

                                                <label class="d-flex flex-stack cursor-pointer">

                                                    <span class="d-flex align-items-center me-2">

                                                        <span class="symbol symbol-50px me-6">
                                                            <span class="symbol-label bg-light-primary">
                                                                <i class="fab fa-vuejs text-primary fs-2x"></i>
                                                            </span>
                                                        </span>

                                                        <span class="d-flex flex-column">
                                                            <span class="fw-bolder fs-6">Vue</span>
                                                            <span class="fs-7 text-muted">Lightweight and responsive
                                                                framework</span>
                                                        </span>

                                                    </span>

                                                    <span class="form-check form-check-custom form-check-solid">
                                                        <input class="form-check-input" type="radio" name="framework" value="4" />
                                                    </span>

                                                </label>

                                            </div>

                                        </div>
                                    </div>

                                    <div data-kt-stepper-element="content">
                                        <div class="w-100">

                                            <div class="fv-row mb-10">

                                                <label class="required fs-5 fw-bold mb-2">Database Name</label>

                                                <input type="text" class="form-control form-control-lg form-control-solid" name="dbname"
                                                    placeholder="" value="master_db" />

                                            </div>

                                            <div class="fv-row">

                                                <label class="d-flex align-items-center fs-5 fw-bold mb-4">
                                                    <span class="required">Select Database Engine</span>
                                                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                                        title="Select your app database engine"></i>
                                                </label>

                                                <label class="d-flex flex-stack cursor-pointer mb-5">

                                                    <span class="d-flex align-items-center me-2">

                                                        <span class="symbol symbol-50px me-6">
                                                            <span class="symbol-label bg-light-success">
                                                                <i class="fas fa-database text-success fs-2x"></i>
                                                            </span>
                                                        </span>

                                                        <span class="d-flex flex-column">
                                                            <span class="fw-bolder fs-6">MySQL</span>
                                                            <span class="fs-7 text-muted">Basic MySQL database</span>
                                                        </span>

                                                    </span>

                                                    <span class="form-check form-check-custom form-check-solid">
                                                        <input class="form-check-input" type="radio" name="dbengine" checked="checked"
                                                            value="1" />
                                                    </span>

                                                </label>

                                                <label class="d-flex flex-stack cursor-pointer mb-5">

                                                    <span class="d-flex align-items-center me-2">

                                                        <span class="symbol symbol-50px me-6">
                                                            <span class="symbol-label bg-light-danger">
                                                                <i class="fab fa-google text-danger fs-2x"></i>
                                                            </span>
                                                        </span>

                                                        <span class="d-flex flex-column">
                                                            <span class="fw-bolder fs-6">Firebase</span>
                                                            <span class="fs-7 text-muted">Google based app data
                                                                management</span>
                                                        </span>

                                                    </span>

                                                    <span class="form-check form-check-custom form-check-solid">
                                                        <input class="form-check-input" type="radio" name="dbengine" value="2" />
                                                    </span>

                                                </label>

                                                <label class="d-flex flex-stack cursor-pointer">

                                                    <span class="d-flex align-items-center me-2">

                                                        <span class="symbol symbol-50px me-6">
                                                            <span class="symbol-label bg-light-warning">
                                                                <i class="fab fa-amazon text-warning fs-2x"></i>
                                                            </span>
                                                        </span>

                                                        <span class="d-flex flex-column">
                                                            <span class="fw-bolder fs-6">DynamoDB</span>
                                                            <span class="fs-7 text-muted">Amazon Fast NoSQL
                                                                Database</span>
                                                        </span>

                                                    </span>

                                                    <span class="form-check form-check-custom form-check-solid">
                                                        <input class="form-check-input" type="radio" name="dbengine" value="3" />
                                                    </span>

                                                </label>

                                            </div>

                                        </div>
                                    </div>

                                    <div data-kt-stepper-element="content">
                                        <div class="w-100">

                                            <div class="d-flex flex-column mb-7 fv-row">

                                                <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                                    <span class="required">Name On Card</span>
                                                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                                        title="Specify a card holder's name"></i>
                                                </label>

                                                <input type="text" class="form-control form-control-solid" placeholder="" name="card_name"
                                                    value="Max Doe" />
                                            </div>

                                            <div class="d-flex flex-column mb-7 fv-row">

                                                <label class="required fs-6 fw-bold form-label mb-2">Card
                                                    Number</label>

                                                <div class="position-relative">

                                                    <input type="text" class="form-control form-control-solid" placeholder="Enter card number"
                                                        name="card_number" value="4111 1111 1111 1111" />

                                                    <div class="position-absolute translate-middle-y top-50 end-0 me-5">
                                                        <img src="{{ asset('assets/media/svg/card-logos/visa.svg') }}" alt=""
                                                            class="h-25px" />
                                                        <img src="{{ asset('assets/media/svg/card-logos/mastercard.svg') }}" alt=""
                                                            class="h-25px" />
                                                        <img src="{{ asset('assets/media/svg/card-logos/american-express.svg') }}" alt=""
                                                            class="h-25px" />
                                                    </div>

                                                </div>

                                            </div>

                                            <div class="row mb-10">

                                                <div class="col-md-8 fv-row">

                                                    <label class="required fs-6 fw-bold form-label mb-2">Expiration
                                                        Date</label>

                                                    <div class="row fv-row">

                                                        <div class="col-6">
                                                            <select name="card_expiry_month" class="form-select form-select-solid"
                                                                data-control="select2" data-hide-search="true" data-placeholder="Month">
                                                                <option></option>
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4">4</option>
                                                                <option value="5">5</option>
                                                                <option value="6">6</option>
                                                                <option value="7">7</option>
                                                                <option value="8">8</option>
                                                                <option value="9">9</option>
                                                                <option value="10">10</option>
                                                                <option value="11">11</option>
                                                                <option value="12">12</option>
                                                            </select>
                                                        </div>

                                                        <div class="col-6">
                                                            <select name="card_expiry_year" class="form-select form-select-solid"
                                                                data-control="select2" data-hide-search="true" data-placeholder="Year">
                                                                <option></option>
                                                                <option value="2021">2021</option>
                                                                <option value="2022">2022</option>
                                                                <option value="2023">2023</option>
                                                                <option value="2024">2024</option>
                                                                <option value="2025">2025</option>
                                                                <option value="2026">2026</option>
                                                                <option value="2027">2027</option>
                                                                <option value="2028">2028</option>
                                                                <option value="2029">2029</option>
                                                                <option value="2030">2030</option>
                                                                <option value="2031">2031</option>
                                                            </select>
                                                        </div>

                                                    </div>

                                                </div>

                                                <div class="col-md-4 fv-row">

                                                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                                        <span class="required">CVV</span>
                                                        <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                                            title="Enter a card CVV code"></i>
                                                    </label>

                                                    <div class="position-relative">

                                                        <input type="text" class="form-control form-control-solid" minlength="3" maxlength="4"
                                                            placeholder="CVV" name="card_cvv" />

                                                        <div class="position-absolute translate-middle-y top-50 end-0 me-3">

                                                            <span class="svg-icon svg-icon-2hx">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                                    viewBox="0 0 24 24" fill="none">
                                                                    <path d="M22 7H2V11H22V7Z" fill="black" />
                                                                    <path opacity="0.3"
                                                                        d="M21 19H3C2.4 19 2 18.6 2 18V6C2 5.4 2.4 5 3 5H21C21.6 5 22 5.4 22 6V18C22 18.6 21.6 19 21 19ZM14 14C14 13.4 13.6 13 13 13H5C4.4 13 4 13.4 4 14C4 14.6 4.4 15 5 15H13C13.6 15 14 14.6 14 14ZM16 15.5C16 16.3 16.7 17 17.5 17H18.5C19.3 17 20 16.3 20 15.5C20 14.7 19.3 14 18.5 14H17.5C16.7 14 16 14.7 16 15.5Z"
                                                                        fill="black" />
                                                                </svg>
                                                            </span>

                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="d-flex flex-stack">

                                                <div class="me-5">
                                                    <label class="fs-6 fw-bold form-label">Save Card for further
                                                        billing?</label>
                                                    <div class="fs-7 fw-bold text-muted">If you need more info, please
                                                        check budget planning</div>
                                                </div>

                                                <label class="form-check form-switch form-check-custom form-check-solid">
                                                    <input class="form-check-input" type="checkbox" value="1" checked="checked" />
                                                    <span class="form-check-label fw-bold text-muted">Save Card</span>
                                                </label>

                                            </div>

                                        </div>
                                    </div>

                                    <div data-kt-stepper-element="content">
                                        <div class="w-100 text-center">

                                            <h1 class="fw-bolder text-dark mb-3">Release!</h1>

                                            <div class="text-muted fw-bold fs-3">Submit your app to kickstart your
                                                project.</div>

                                            <div class="text-center px-4 py-15">
                                                <img src="{{ asset('assets/media/illustrations/sigma-1/9.png') }}" alt=""
                                                    class="w-100 mh-300px" />
                                            </div>

                                        </div>
                                    </div>

                                    <div class="d-flex flex-stack pt-10">

                                        <div class="me-2">
                                            <button type="button" class="btn btn-lg btn-light-primary me-3" data-kt-stepper-action="previous">

                                                <span class="svg-icon svg-icon-3 me-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                                        fill="none">
                                                        <rect opacity="0.5" x="6" y="11" width="13" height="2" rx="1"
                                                            fill="black" />
                                                        <path
                                                            d="M8.56569 11.4343L12.75 7.25C13.1642 6.83579 13.1642 6.16421 12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75L5.70711 11.2929C5.31658 11.6834 5.31658 12.3166 5.70711 12.7071L11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25C13.1642 17.8358 13.1642 17.1642 12.75 16.75L8.56569 12.5657C8.25327 12.2533 8.25327 11.7467 8.56569 11.4343Z"
                                                            fill="black" />
                                                    </svg>
                                                </span>

                                        </div>

                                        <div>
                                            <button type="button" class="btn btn-lg btn-primary" data-kt-stepper-action="submit">
                                                <span class="indicator-label">Submit

                                                    <span class="svg-icon svg-icon-3 ms-2 me-0">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                                            fill="none">
                                                            <rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1"
                                                                transform="rotate(-180 18 13)" fill="black" />
                                                            <path
                                                                d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z"
                                                                fill="black" />
                                                        </svg>
                                                    </span>

                                                </span>
                                                <span class="indicator-progress">Please wait...
                                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                            </button>
                                            <button type="button" class="btn btn-lg btn-primary" data-kt-stepper-action="next">Continue

                                                <span class="svg-icon svg-icon-3 ms-1 me-0">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                                        fill="none">
                                                        <rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1"
                                                            transform="rotate(-180 18 13)" fill="black" />
                                                        <path
                                                            d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z"
                                                            fill="black" />
                                                    </svg>
                                                </span>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">

            <span class="svg-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)"
                        fill="black" />
                    <path
                        d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z"
                        fill="black" />
                </svg>
            </span>

        </div>
    </div>
    <script>
        var hostUrl = "assets/";
    </script>

    <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>

    <script src="{{ asset('assets/plugins/custom/prismjs/prismjs.bundle.js') }}"></script>

    <script src="{{ asset('assets/js/custom/widgets.js') }}"></script>
    <script>
        moment.locale('id');
        var target = document.querySelector("body");
        var blockUI = new KTBlockUI(target, {
            overlayClass: "page-loader bg-opacity-75",
            message: '<div class="blockui-message text-grey-600"><span class="spinner-border text-grey-600"></span> Loading Data...</div>'
        });
        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toastr-top-center",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "3000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };

        function progressxhr(loading) {
            toastr.info(`Loading ${loading}`);
        }

        function failurexhr(message) {
            toastr.error(message);
        }

        function successxhr(message) {
            toastr.success(message);
        }

        function blockUi() {
            blockUI.block();
        }

        function releaseUi() {
            blockUI.release();
        }

        function sendXhr(type = 'GET', url, data) {
            xhr = new XMLHttpRequest();
            xhr.withCredentials = false;
            xhr.open(type, url);

            xhr.upload.onprogress = function(e) {
                progressxhr(e.loaded / e.total * 100);
            };

            xhr.onload = function() {
                var json;

                if (xhr.status === 422) {
                    failurexhr('HTTP Error: ' + JSON.parse(xhr.response).message);
                    return;
                }
                if (xhr.status === 403) {
                    failurexhr('HTTP Error: ' + xhr.status);
                    return;
                }

                if (xhr.status < 200 || xhr.status >= 300) {
                    failurexhr('HTTP Error: ' + xhr.status);
                    return;
                }

                json = JSON.parse(xhr.responseText);

                if (!json || typeof json.message != 'string') {
                    failurexhr('Invalid JSON: ' + xhr.responseText);
                    return;
                }

                successxhr(json.message);
            };

            xhr.onerror = function() {
                failurexhr('Image upload failed due to a XHR Transport error. Code: ' + xhr.status);
            };
            xhr.setRequestHeader('X-CSRF-TOKEN', `{{ csrf_token() }}`);
            xhr.setRequestHeader('CONTENT-TYPE', `application/json;`);
            xhr.send(data);
        }
        $(function() {
            KTApp.hidePageLoading();
            document.querySelector('.page-loader').remove();
        });
    </script>
    @stack('js')
</body>

</html>
