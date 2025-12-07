<section class="section_four">
    <div class="">
        <div class="container">
            <div class="containerblog">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-xs-12">
                        <center>
                            <div class="loaderse"></div>
                        </center>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-xs-12">
                        <center>
                            <h4 class="section_three_head">Informasi terkini</h4>
                        </center>
                    </div>
                </div>
                <br />
                <div class="row" style="margin-top:20px;" id="bloglist_container">
                    <!-- Card akan di-generate di sini via JavaScript -->
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    /* Card Container */
    #bloglist_container {
        display: flex !important;
        flex-wrap: wrap !important;
        align-items: stretch !important;
    }

    #bloglist_container .col-md-4,
    #bloglist_container .col-lg-4,
    #bloglist_container .col-sm-6,
    #bloglist_container .col-md-3 {
        margin-bottom: 30px !important;
        display: flex !important;
    }

    /* Card Styling */
    #bloglist_container .card {
        border: 1px solid #e0e0e0 !important;
        border-radius: 8px !important;
        overflow: hidden !important;
        transition: all 0.3s ease !important;
        width: 100% !important;
        display: flex !important;
        flex-direction: column !important;
    }

    #bloglist_container .card:hover {
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1) !important;
        transform: translateY(-3px) !important;
    }

    /* Card Image - Fixed Height */
    #bloglist_container .card-img-top {
        width: 100% !important;
        height: 200px !important;
        object-fit: cover !important;
        background-color: #f8f9fa !important;
    }

    /* Card Body - Flexible */
    #bloglist_container .card-body {
        padding: 18px !important;
        display: flex !important;
        flex-direction: column !important;
    }

    /* Content Wrapper untuk grouping title + text */
    #bloglist_container .card-body>div:first-child {
        flex: 1 !important;
        display: flex !important;
        flex-direction: column !important;
    }

    /* Title - Fixed Height dengan Clamp */
    #bloglist_container .blog_head {
        font-size: 1.05rem !important;
        font-weight: 600 !important;
        margin-bottom: 8px !important;
        margin-top: 0 !important;
        color: #2c3e50 !important;
        line-height: 1.35 !important;
        max-height: 56px !important;
        display: -webkit-box !important;
        -webkit-line-clamp: 2 !important;
        -webkit-box-orient: vertical !important;
        overflow: hidden !important;
    }

    /* Description - Fixed Height dengan Clamp */
    #bloglist_container .card-text {
        margin-bottom: 12px !important;
        margin-top: 0 !important;
        color: #6c757d !important;
        font-size: 0.88rem !important;
        line-height: 1.5 !important;
        max-height: 66px !important;
        display: -webkit-box !important;
        -webkit-line-clamp: 3 !important;
        -webkit-box-orient: vertical !important;
        overflow: hidden !important;
    }

    /* Footer - Consistent Position */
    #bloglist_container .card-footer-custom {
        padding-top: 12px !important;
        border-top: 1px solid #f0f0f0 !important;
        margin-top: auto !important;
    }

    #bloglist_container .d-flex {
        display: flex !important;
        justify-content: space-between !important;
        align-items: center !important;
    }

    #bloglist_container .text-muted {
        font-size: 0.82rem !important;
        color: #999 !important;
        margin: 0 !important;
    }

    #bloglist_container .btn-outline-secondary {
        border-radius: 4px !important;
        padding: 5px 14px !important;
        font-size: 0.82rem !important;
        transition: all 0.2s ease !important;
        white-space: nowrap !important;
    }

    #bloglist_container .btn-outline-secondary:hover {
        background-color: #6c757d !important;
        border-color: #6c757d !important;
        color: white !important;
    }

    /* Responsive */
    @media (max-width: 991px) {
        #bloglist_container .card-img-top {
            height: 180px !important;
        }

        #bloglist_container .blog_head {
            max-height: 54px !important;
        }

        #bloglist_container .card-text {
            max-height: 63px !important;
        }
    }

    @media (max-width: 767px) {
        #bloglist_container .card-img-top {
            height: 160px !important;
        }

        #bloglist_container .blog_head {
            font-size: 1rem !important;
            max-height: 52px !important;
        }

        #bloglist_container .card-text {
            font-size: 0.85rem !important;
            max-height: 60px !important;
        }

        #bloglist_container .card-body {
            padding: 15px !important;
        }
    }
</style>