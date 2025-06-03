<?= $this->extend('Layout/template') ?>

<?= $this->section('content') ?>
<!--begin::Content wrapper-->
<div class="d-flex flex-column flex-column-fluid">
    <!--begin::Content-->
    <div id="kt_app_content" class="app-content">
        <!--begin::Card-->
        <div class="card">
            <!--begin::Card header-->
            <div class="card-header border-0 pt-6">
                <!--begin::Card title-->
                <div class="card-title">
                    <!--begin::Search-->
                    <div class="d-flex align-items-center position-relative my-1">
                        <i class="ki-outline ki-magnifier fs-3 position-absolute ms-5"></i>
                        <input type="text" data-kt-customer-table-filter="search" class="form-control form-control-solid w-250px ps-12" placeholder="Search Customers" />
                    </div>
                    <!--end::Search-->
                </div>
                <!--begin::Card title-->
                <!--begin::Card toolbar-->
                <div class="card-toolbar">
                    
                        <!--begin::Export-->
                        <button type="button" class="btn btn-light-primary me-3" data-bs-toggle="modal" data-bs-target="#kt_customers_export_modal">
                        <i class="ki-outline ki-exit-up fs-2"></i>Export</button>
                        <!--end::Export-->
                        <!--begin::Add customer-->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_add_customer">Add Customer</button>
                        <!--end::Add customer-->
                    </div>
                    <!--end::Toolbar-->
                    <!--begin::Group actions-->
                    <div class="d-flex justify-content-end align-items-center d-none" data-kt-customer-table-toolbar="selected">
                        <div class="fw-bold me-5">
                        <span class="me-2" data-kt-customer-table-select="selected_count"></span>Selected</div>
                        <button type="button" class="btn btn-danger" data-kt-customer-table-select="delete_selected">Delete Selected</button>
                    </div>
                    <!--end::Group actions-->
                </div>
                <!--end::Card toolbar-->
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body pt-0">
                <!--begin::Table-->
                <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_customers_table">
                    <thead>
                        <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                             <th class="min-w-125px">No</th>
                            <th class="min-w-125px">Nama</th>
                            <th class="min-w-125px">Program Study</th>
                            <th class="text-end min-w-70px">Actions</th>
                        </tr>
                    </thead>
                   
                </table>
                <!--end::Table-->
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Card-->
        <!--begin::Modals-->
     
        <!--begin::Modal - Adjust Balance-->
        <div class="modal fade" id="kt_customers_export_modal" tabindex="-1" aria-hidden="true">
            <!--begin::Modal dialog-->
            <div class="modal-dialog modal-dialog-centered mw-650px">
                <!--begin::Modal content-->
                <div class="modal-content">
                    <!--begin::Modal header-->
                    <div class="modal-header">
                        <!--begin::Modal title-->
                        <h2 class="fw-bold">Export Surat Keputusan</h2>
                        <!--end::Modal title-->
                        <!--begin::Close-->
                        <div id="kt_customers_export_close" class="btn btn-icon btn-sm btn-active-icon-primary">
                            <i class="ki-outline ki-cross fs-1"></i>
                        </div>
                        <!--end::Close-->
                    </div>
                    <!--end::Modal header-->
                    <!--begin::Modal body-->
                    <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                       <!--begin::Form-->
                <form id="kt_customers_export_form" class="form" method="post" action="<?= base_url('export/pdf') ?>">
                            <!--begin::Input group-->
                            <div class="fv-row mb-10">
                                <!--begin::Input-->
                                <select data-control="select2" data-placeholder="Select a format" data-hide-search="true" name="format" class="form-select form-select-solid">
                                    <option value="excell">Excel</option>
                                    <option value="pdf">PDF</option>
                                </select>
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                            
                           
                            <!--begin::Actions-->
                            <div class="text-center">
                                <button type="reset" id="kt_customers_export_cancel" class="btn btn-light me-3">Discard</button>
                                <button type="submit" id="kt_customers_export_submit" class="btn btn-primary">
                                    <span class="indicator-label">Submit</span>
                                    <span class="indicator-progress">Please wait... 
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                            </div>
                            <!--end::Actions-->
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Modal body-->
                </div>
                <!--end::Modal content-->
            </div>
            <!--end::Modal dialog-->
        </div>
        <!--end::Modal - New Card-->
        <!--end::Modals-->
    </div>
    <!--end::Content-->
</div>
<!--end::Content wrapper-->
<?= $this->endSection() ?>
