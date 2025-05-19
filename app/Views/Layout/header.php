<!--begin::Header-->
<div id="kt_app_header" class="app-header" data-kt-sticky="true" data-kt-sticky-activate="{default: false, lg: true}"
    data-kt-sticky-name="app-header-sticky" data-kt-sticky-offset="{default: false, lg: '300px'}">
    <!--begin::Header container-->
    <div class="app-container container-xxl d-flex align-items-stretch justify-content-between"
        id="kt_app_header_container">
        <!--begin::Header mobile toggle-->
        <div class="d-flex align-items-center d-lg-none ms-n3 me-2" title="Show sidebar menu">
            <div class="btn btn-icon btn-color-gray-600 btn-active-color-primary w-35px h-35px"
                id="kt_app_header_menu_toggle">
                <i class="ki-outline ki-abstract-14 fs-2"></i>
            </div>
        </div>
        <!--end::Header mobile toggle-->
        <!--begin::Logo-->
        <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0 me-lg-15">
            <!-- <a href="index.html"> -->
            <img alt="Logo" src="<?= base_url('assets/media/logos/logo-dark.svg') ?>" class="h-35px d-lg-none" />
            <img alt="Logo" src="<?= base_url('assets/media/logos/logo-dark.svg') ?>"
                class="h-35px d-none d-lg-inline app-sidebar-logo-default theme-light-show" />
            <img alt="Logo" src="<?= base_url('assets/media/logos/logo-dark.svg') ?>"
                class="h-35px d-none d-lg-inline app-sidebar-logo-default theme-dark-show" />
            <!-- </a> -->
        </div>
        <!--end::Logo-->
        <!--begin::Header wrapper-->
        <div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1" id="kt_app_header_wrapper">
            <!--begin::Menu wrapper-->
            <div class="app-header-menu app-header-mobile-drawer align-items-stretch" data-kt-drawer="true"
                data-kt-drawer-name="app-header-menu" data-kt-drawer-activate="{default: true, lg: false}"
                data-kt-drawer-overlay="true" data-kt-drawer-width="250px" data-kt-drawer-direction="start"
                data-kt-drawer-toggle="#kt_app_header_menu_toggle" data-kt-swapper="true"
                data-kt-swapper-mode="{default: 'append', lg: 'prepend'}"
                data-kt-swapper-parent="{default: '#kt_app_body', lg: '#kt_app_header_wrapper'}">
                <!--begin::Menu-->
                <div class="menu menu-rounded menu-active-bg menu-state-primary menu-column menu-lg-row menu-title-gray-700 menu-icon-gray-500 menu-arrow-gray-500 menu-bullet-gray-500 my-5 my-lg-0 align-items-stretch fw-semibold px-2 px-lg-0"
                    id="kt_app_header_menu" data-kt-menu="true">
                    <!--begin:Menu item-->
                    <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="bottom-start"
                        data-kt-menu-offset="-50,0"
                        class="menu-item <?= (current_url() == base_url('dashboard') ? 'here show menu-here-bg' : '') ?> menu-lg-down-accordion me-0 me-lg-2"
                        onclick="window.location.href='<?= base_url('dashboard') ?>'">
                        <!--begin:Menu link-->
                        <span class="menu-link">
                            <span class="menu-icon">
                                <i class="ki-duotone ki-home fs-3">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                            </span>
                            <span class="menu-title">Dashboard</span>
                        </span>
                        <!--end:Menu link-->
                    </div>
                    <!--end:Menu item-->

                    <!-- menu admin -->
                    <?php if ($user['role'] == 'admin') { ?>
                        <!--begin:Menu item-->
                        <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="bottom-start"
                            class="menu-item <?= (current_url() == base_url('master-group-user') || current_url() == base_url('master-menu') || current_url() == base_url('users') ? 'here show menu-here-bg' : '') ?> menu-lg-down-accordion menu-sub-lg-down-indention me-0 me-lg-2">
                            <!--begin:Menu link-->
                            <span class="menu-link">
                                <span class="menu-icon">
                                    <i class="ki-duotone ki-setting fs-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </span>
                                <span class="menu-title">Master Data</span>
                                <span class="menu-arrow d-lg-none"></span>
                            </span>
                            <!--end:Menu link-->
                            <!--begin:Menu sub-->
                            <div
                                class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown px-lg-2 py-lg-4 w-lg-250px">
                                <!--begin:Menu item-->
                                <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}"
                                    data-kt-menu-placement="bottom-start" data-kt-menu-offset="-100,0"
                                    class="menu-item <?= (current_url() == base_url('admin/users') ? 'here show menu-here-bg' : '') ?> menu-lg-down-accordion me-0 me-lg-2"
                                    onclick="window.location.href='<?= base_url('admin/users') ?>'">
                                    <!--begin:Menu link-->
                                    <span class="menu-link">
                                        <span class="menu-icon">
                                            <i class="ki-duotone ki-profile-user fs-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                                <span class="path3"></span>
                                                <span class="path4"></span>
                                            </i>
                                        </span>
                                        <span class="menu-title">
                                            Data Users
                                        </span>
                                    </span>
                                    <!--end:Menu link-->
                                </div>
                                <!--end:Menu item-->
                                <!--begin:Menu item-->
                                <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}"
                                    data-kt-menu-placement="bottom-start" data-kt-menu-offset="-100,0"
                                    class="menu-item <?= (current_url() == base_url('admin/prodi') ? 'here show menu-here-bg' : '') ?> menu-lg-down-accordion me-0 me-lg-2"
                                    onclick="window.location.href='<?= base_url('admin/prodi') ?>'">
                                    <!--begin:Menu link-->
                                    <span class="menu-link">
                                        <span class="menu-icon">
                                            <i class="ki-duotone ki-element-11 fs-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                                <span class="path3"></span>
                                                <span class="path4"></span>
                                            </i>
                                        </span>
                                        <span class="menu-title">
                                            Data Program Studi
                                        </span>
                                        <!-- <span class="menu-arrow"></span> -->
                                    </span>
                                    <!--end:Menu link-->
                                </div>
                                <!--end:Menu item-->
                                <!--begin:Menu item-->
                                <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}"
                                    data-kt-menu-placement="bottom-start" data-kt-menu-offset="-100,0"
                                    class="menu-item <?= (current_url() == base_url('admin/tahun-ajar') ? 'here show menu-here-bg' : '') ?> menu-lg-down-accordion me-0 me-lg-2"
                                    onclick="window.location.href='<?= base_url('admin/tahun-ajar') ?>'">
                                    <!--begin:Menu link-->
                                    <span class="menu-link">
                                        <span class="menu-icon">
                                            <i class="ki-duotone ki-calendar fs-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                        </span>
                                        <span class="menu-title">
                                            Data Tahun Ajaran
                                        </span>
                                        <!-- <span class="menu-arrow"></span> -->
                                    </span>
                                    <!--end:Menu link-->
                                </div>
                                <!--end:Menu item-->
                                <!--begin:Menu item-->
                                <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}"
                                    data-kt-menu-placement="bottom-start" data-kt-menu-offset="-100,0"
                                    class="menu-item <?= (current_url() == base_url('admin/mata-kuliah') ? 'here show menu-here-bg' : '') ?> menu-lg-down-accordion me-0 me-lg-2"
                                    onclick="window.location.href='<?= base_url('admin/mata-kuliah') ?>'">
                                    <!--begin:Menu link-->
                                    <span class="menu-link">
                                        <span class="menu-icon">
                                            <i class="ki-duotone ki-book-open fs-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                                <span class="path3"></span>
                                                <span class="path4"></span>
                                            </i>
                                        </span>
                                        <span class="menu-title">
                                            Data Mata Kuliah
                                        </span>
                                        <!-- <span class="menu-arrow"></span> -->
                                    </span>
                                    <!--end:Menu link-->
                                </div>
                                <!--end:Menu item-->
                                <!--begin:Menu item-->
                                <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}"
                                    data-kt-menu-placement="bottom-start" data-kt-menu-offset="-100,0"
                                    class="menu-item <?= (current_url() == base_url('admin/kurikulum') ? 'here show menu-here-bg' : '') ?> menu-lg-down-accordion me-0 me-lg-2"
                                    onclick="window.location.href='<?= base_url('admin/kurikulum') ?>'">
                                    <!--begin:Menu link-->
                                    <span class="menu-link">
                                        <span class="menu-icon">
                                            <i class="ki-duotone ki-questionnaire-tablet fs-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                        </span>
                                        <span class="menu-title">
                                            Data Kurikulum
                                        </span>
                                        <!-- <span class="menu-arrow"></span> -->
                                    </span>
                                    <!--end:Menu link-->
                                </div>
                                <!--end:Menu item-->
                            </div>
                            <!--end:Menu sub-->
                        </div>
                        <!--end:Menu item-->

                        <!--begin:Menu item-->
                        <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="bottom-start"
                            class="menu-item <?= (current_url() == base_url('admin/data-pendaftaran') ? 'here show menu-here-bg' : '') ?> menu-lg-down-accordion menu-sub-lg-down-indention me-0 me-lg-2"
                            onclick="window.location.href='<?= base_url('admin/data-pendaftaran') ?>'">
                            <!--begin:Menu link-->
                            <span class="menu-link">
                                <span class="menu-icon">
                                    <i class="ki-duotone ki-teacher fs-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </span>
                                <span class="menu-title">Assign Asesor</span>
                            </span>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                    <?php } ?>

                    <!-- menu asesor -->
                    <?php if ($user['role'] == 'asesor') { ?>
                        <!--begin:Menu item-->
                        <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="bottom-start"
                            class="menu-item <?= (current_url() == base_url('asesor/data-pendaftaran') ? 'here show menu-here-bg' : '') ?> menu-lg-down-accordion menu-sub-lg-down-indention me-0 me-lg-2">
                            <!--begin:Menu link-->
                            <span class="menu-link">
                                <span class="menu-title">Asesor Sistem</span>
                                <span class="menu-arrow d-lg-none"></span>
                            </span>
                            <!--end:Menu link-->
                            <!--begin:Menu sub-->
                            <div
                                class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown px-lg-2 py-lg-4 w-lg-250px">
                                <!--begin:Menu item-->
                                <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}"
                                    data-kt-menu-placement="bottom-start" data-kt-menu-offset="-100,0"
                                    class="menu-item <?= (current_url() == base_url('asesor/data-pendaftaran') ? 'here show menu-here-bg' : '') ?> menu-lg-down-accordion me-0 me-lg-2"
                                    onclick="window.location.href='<?= base_url('asesor/data-pendaftaran') ?>'">
                                    <!--begin:Menu link-->
                                    <span class="menu-link">
                                        <span class="menu-icon">
                                            <i class="ki-duotone ki-users fs-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                        </span>
                                        <span class="menu-title">
                                            Data Approved
                                        </span>
                                    </span>
                                    <!--end:Menu link-->
                                </div>
                                <!--end:Menu item-->
                                <!--begin:Menu item-->
                                <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}"
                                    data-kt-menu-placement="bottom-start" data-kt-menu-offset="-100,0"
                                    class="menu-item <?= (current_url() == base_url('asesor/data-program-studi') ? 'here show menu-here-bg' : '') ?> menu-lg-down-accordion me-0 me-lg-2"
                                    onclick="window.location.href='<?= base_url('asesor/data-program-studi') ?>'">
                                    <!--begin:Menu link-->
                                    <span class="menu-link">
                                        <span class="menu-icon">
                                            <i class="ki-duotone ki-users"></i>
                                        </span>
                                        <span class="menu-title">
                                            Data Program Studi
                                        </span>
                                        <!-- <span class="menu-arrow"></span> -->
                                    </span>
                                    <!--end:Menu link-->
                                </div>
                                <!--end:Menu item-->
                                <!--begin:Menu item-->
                                <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}"
                                    data-kt-menu-placement="bottom-start" data-kt-menu-offset="-100,0"
                                    class="menu-item <?= (current_url() == base_url('asesor/data-tahun-ajar') ? 'here show menu-here-bg' : '') ?> menu-lg-down-accordion me-0 me-lg-2"
                                    onclick="window.location.href='<?= base_url('asesor/data-tahun-ajar') ?>'">
                                    <!--begin:Menu link-->
                                    <span class="menu-link">
                                        <span class="menu-icon">
                                            <i class="ki-duotone ki-users"></i>
                                        </span>
                                        <span class="menu-title">
                                            Data Tahun Ajaran
                                        </span>
                                        <!-- <span class="menu-arrow"></span> -->
                                    </span>
                                    <!--end:Menu link-->
                                </div>
                                <!--end:Menu item-->
                                <!--begin:Menu item-->
                                <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}"
                                    data-kt-menu-placement="bottom-start" data-kt-menu-offset="-100,0"
                                    class="menu-item <?= (current_url() == base_url('asesor/data-mata-kuliah') ? 'here show menu-here-bg' : '') ?> menu-lg-down-accordion me-0 me-lg-2"
                                    onclick="window.location.href='<?= base_url('asesor/data-mata-kuliah') ?>'">
                                    <!--begin:Menu link-->
                                    <span class="menu-link">
                                        <span class="menu-icon">
                                            <i class="ki-duotone ki-users"></i>
                                        </span>
                                        <span class="menu-title">
                                            Data Mata Kuliah
                                        </span>
                                        <!-- <span class="menu-arrow"></span> -->
                                    </span>
                                    <!--end:Menu link-->
                                </div>
                                <!--end:Menu item-->
                            </div>
                            <!--end:Menu sub-->
                        </div>
                        <!--end:Menu item-->
                    <?php } ?>

                    <!-- menu aplikan -->
                    <?php if ($user['role'] == 'aplikan') { ?>
                        <!--begin:Menu item-->
                        <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="bottom-start"
                            class="menu-item <?= (current_url() == base_url('aplikan/tentang-rpl') ? 'here show menu-here-bg' : '') ?> menu-lg-down-accordion menu-sub-lg-down-indention me-0 me-lg-2">
                            <!--begin:Menu link-->
                            <span class="menu-link">
                                <span class="menu-title">Tentang RPL</span>
                            </span>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                    <?php } ?>
                </div>
                <!--end::Menu-->
            </div>
            <!--end::Menu wrapper-->
            <!--begin::Navbar-->
            <div class="app-navbar flex-shrink-0">
                <!--begin::Quick links-->
                <div class="app-navbar-item ms-1 ms-lg-5">
                    <!--begin::Menu- wrapper-->
                    <!--begin::Menu item-->
                    <div class="menu-item px-5" data-kt-menu-trigger="{default: 'click', lg: 'hover'}"
                        data-kt-menu-placement="left-start" data-kt-menu-offset="-15px, 0">
                        <div class="menu-link px-5">
                            <span class="menu-title position-relative">
                                <span class="ms-5 position-absolute translate-middle-y top-50 end-0">
                                    <i class="ki-outline ki-night-day theme-light-show fs-2"></i>
                                    <i class="ki-outline ki-moon theme-dark-show fs-2"></i>
                                </span></span>
                        </div>
                        <!--begin::Menu-->
                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-title-gray-700 menu-icon-gray-500 menu-active-bg menu-state-color fw-semibold py-4 fs-base w-150px"
                            data-kt-menu="true" data-kt-element="theme-mode-menu">
                            <!--begin::Menu item-->
                            <div class="menu-item px-3 my-0">
                                <a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="light">
                                    <span class="menu-icon" data-kt-element="icon">
                                        <i class="ki-outline ki-night-day fs-2"></i>
                                    </span>
                                    <span class="menu-title">Light</span>
                                </a>
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-3 my-0">
                                <a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="dark">
                                    <span class="menu-icon" data-kt-element="icon">
                                        <i class="ki-outline ki-moon fs-2"></i>
                                    </span>
                                    <span class="menu-title">Dark</span>
                                </a>
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-3 my-0">
                                <a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="system">
                                    <span class="menu-icon" data-kt-element="icon">
                                        <i class="ki-outline ki-screen fs-2"></i>
                                    </span>
                                    <span class="menu-title">System</span>
                                </a>
                            </div>
                            <!--end::Menu item-->
                        </div>
                        <!--end::Menu-->
                    </div>
                    <!--end::Menu item-->
                    <!--end::Menu wrapper-->
                </div>
                <!--end::Quick links-->
                <!--begin::User menu-->
                <div class="app-navbar-item ms-3 ms-lg-5" id="kt_header_user_menu_toggle">
                    <!--begin::Menu wrapper-->
                    <div class="cursor-pointer symbol symbol-35px symbol-md-45px"
                        data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent"
                        data-kt-menu-placement="bottom-end">
                        <img class="symbol symbol-circle symbol-35px symbol-md-45px" src="<?= $user['pict'] ?? base_url('assets/media/avatars/300-1.jpg') ?>"
                            alt="user" style="object-fit: cover;" />
                    </div>
                    <!--begin::User account menu-->
                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px"
                        data-kt-menu="true">
                        <!--begin::Menu item-->
                        <div class="menu-item px-3">
                            <div class="menu-content d-flex align-items-center px-3">
                                <!--begin::Username-->
                                <div class="d-flex flex-column">
                                    <div class="fw-bold d-flex align-items-center fs-5">
                                        <?= $user['name'] ?>
                                        <?php if ($user['role'] == 'asesor') {
                                            $badge = 'success';
                                        } else if ($user['role'] == 'admin') {
                                            $badge = 'primary';
                                        } else {
                                            $badge = 'secondary';
                                        } ?>
                                        <span class="badge badge-light-<?= $badge ?> fw-bold fs-8 px-2 py-1 ms-2"><?= strtoupper($user['role']) ?></span>
                                    </div>
                                    <div class="text-muted text-hover-primary fs-7">
                                        <?= $user['email'] ?>
                                    </div>
                                </div>
                                <!--end::Username-->
                            </div>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu separator-->
                        <div class="separator my-2"></div>
                        <!--end::Menu separator-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-5">
                            <a href="<?= base_url('editprofile') ?>" class="menu-link px-5">My
                                Profile</a>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-5">
                            <a href="<?= base_url('logout') ?>" class="menu-link px-5">Sign Out</a>
                        </div>
                        <!--end::Menu item-->
                    </div>
                    <!--end::User account menu-->
                    <!--end::Menu wrapper-->
                </div>
                <!--end::User menu-->
            </div>
            <!--end::Navbar-->
        </div>
        <!--end::Header wrapper-->
    </div>
    <!--end::Header container-->
</div>
<!--end::Header-->