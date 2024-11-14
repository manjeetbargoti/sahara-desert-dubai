<div class="navbar-expand-lg navbar-expand-lg-collapse-block">
    <button class="btn d-lg-none mb-5 p-0 collapsed" type="button" data-toggle="collapse" data-target="#sidebar" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
        <i class="far fa-caret-square-down text-primary font-size-20 card-btn-arrow ml-0"></i>
        <span class="text-primary ml-2">Sidebar</span>
    </button>
    <div id="sidebar" class="collapse navbar-collapse">
        <div class="mb-6 w-100">
            <div class="pb-4 mb-2">
                <div class="sidebar border border-color-1 rounded-xs">
                    <div class="p-4 mx-1 mb-1">
                        <!-- Input -->
                        <span class="d-block text-gray-1  font-weight-normal mb-0 text-left">Destination or Hotel Name</span>
                        <div class="mb-4">
                            <div class="input-group border-bottom border-width-2 border-color-1">
                                <i class="flaticon-pin-1 d-flex align-items-center mr-2 text-primary font-weight-semi-bold font-size-22"></i>
                              <input type="text" class="form-control font-weight-bold font-size-16 shadow-none hero-form font-weight-bold border-0 p-0" placeholder="Where are you going?" aria-label="Keyword or title" aria-describedby="keywordInputAddon">
                            </div>
                        </div>
                        <!-- End Input -->
                        <!-- Input -->
                        <span class="d-block text-gray-1 text-left font-weight-normal mb-0">From - To</span>
                        <div class="border-bottom border-width-2 border-color-1 mb-4">
                            <div id="datepickerWrapperFromOne" class="u-datepicker input-group flex-nowrap">
                                <div class="input-group-prepend">
                                    <span class="d-flex align-items-center mr-2 font-size-21">
                                        <i class="flaticon-calendar text-primary font-weight-semi-bold"></i>
                                    </span>
                                </div>
                                <input class="js-range-datepicker font-size-16 ml-1 shadow-none font-weight-bold form-control hero-form bg-transparent border-0 flatpickr-input p-0" type="date"
                                    data-rp-wrapper="#datepickerWrapperFromOne"
                                    data-rp-type="range"
                                    data-rp-date-format="M d / Y"
                                    data-rp-default-date='["Jul 7 / 2020", "Aug 25 / 2020"]'>
                            </div>
                             <!-- End Datepicker -->
                        </div>
                        <!-- End Input -->

                        <div class="col dropdown-custom px-0 mb-5">
                            <!-- Input -->
                            <span class="d-block text-gray-1 text-left font-weight-normal mb-2">Trip Type</span>
                            <div class="flex-horizontal-center border-bottom border-width-2 border-color-1 pb-2">
                                <i class="flaticon-backpack d-flex align-items-center mr-2 font-size-24 text-primary"></i>
                                <select class="js-select selectpicker dropdown-select bootstrap-select__custom-nav"
                                    data-style="btn-sm mt-1 py-0 px-0  text-black font-size-16 font-weight-semi-bold d-flex align-items-center">
                                    <option value="one" selected>City Tour</option>
                                    <option value="two">Village Tour</option>
                                    <option value="three">Holiday Tour</option>
                                    <option value="four">City Tour</option>
                                </select>
                            </div>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary height-60 w-100 font-weight-bold mb-xl-0 mb-lg-1 transition-3d-hover"><i class="flaticon-magnifying-glass mr-2 font-size-17"></i>Search</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pb-4 mb-2">
                <a href="https://goo.gl/maps/kCVqYkjHX3XvoC4B9" class="d-block border border-color-1 rounded-xs">
                    <img src="../../assets/img/map-markers/map.jpg" alt="" width="100%">
                </a>
            </div>

            <div class="sidenav border border-color-8 rounded-xs">
                <!-- Accordiaon -->
                <div id="shopRatingAccordion" class="accordion rounded-0 shadow-none border-bottom">
                    <div class="border-0">
                        <div class="card-collapse" id="shopCategoryHeadingOne">
                            <h3 class="mb-0">
                                <button type="button" class="btn btn-link btn-block card-btn py-2 px-5 text-lh-3 collapsed" data-toggle="collapse" data-target="#shopRatingOne" aria-expanded="false" aria-controls="shopRatingOne">
                                    <span class="row align-items-center">
                                        <span class="col-9">
                                            <span class="d-block font-size-lg-15 font-size-17 font-weight-bold text-dark text-lh-1dot4">Star Ratings</span>
                                        </span>
                                        <span class="col-3 text-right">
                                            <span class="card-btn-arrow">
                                                <span class="fas fa-chevron-down small"></span>
                                            </span>
                                        </span>
                                    </span>
                                </button>
                            </h3>
                        </div>
                        <div id="shopRatingOne" class="collapse show" aria-labelledby="shopCategoryHeadingOne" data-parent="#shopRatingAccordion">
                            <div class="card-body pt-0 mt-1 px-5">
                                <!-- Checkboxes -->
                                <div class="form-group font-size-14 text-lh-md text-secondary mb-3">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="brandAdidas">
                                        <label class="custom-control-label text-lh-inherit text-color-1" for="brandAdidas">
                                            <div class="d-inline-flex align-items-center font-size-13 text-lh-1 text-primary">
                                                <div class="green-lighter ml-1 letter-spacing-2">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group font-size-14 text-lh-md text-secondary mb-3">
                                    <div class="custom-control custom-checkbox">
                                       <input type="checkbox" class="custom-control-input" id="brandNewBalance">
                                       <label class="custom-control-label text-lh-inherit text-color-1" for="brandNewBalance">
                                            <div class="d-inline-flex align-items-center font-size-13 text-lh-1 text-primary">
                                                <div class="green-lighter ml-1 letter-spacing-2">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                </div>
                                            </div>
                                       </label>
                                    </div>
                                </div>
                                <div class="form-group font-size-14 text-lh-md text-secondary mb-3">
                                    <div class="custom-control custom-checkbox">
                                      <input type="checkbox" class="custom-control-input" id="brandNike">
                                      <label class="custom-control-label text-lh-inherit text-color-1" for="brandNike">
                                            <div class="d-inline-flex align-items-center font-size-13 text-lh-1 text-primary">
                                                <div class="green-lighter ml-1 letter-spacing-2">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                </div>
                                            </div>
                                      </label>
                                    </div>
                                </div>
                                <div class="form-group font-size-14 text-lh-md text-secondary mb-3">
                                    <div class="custom-control custom-checkbox">
                                      <input type="checkbox" class="custom-control-input" id="brandFredPerry">
                                      <label class="custom-control-label text-lh-inherit text-color-1" for="brandFredPerry">
                                            <div class="d-inline-flex align-items-center font-size-13 text-lh-1 text-primary">
                                                <div class="green-lighter ml-1 letter-spacing-2">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                </div>
                                            </div>
                                      </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="shopCartAccordion" class="accordion rounded shadow-none">
                    <div class="border-0">
                        <div class="card-collapse" id="shopCardHeadingOne">
                            <h3 class="mb-0">
                                <button type="button" class="btn btn-link btn-block card-btn py-2 px-5 text-lh-3 collapsed" data-toggle="collapse" data-target="#shopCardOne" aria-expanded="false" aria-controls="shopCardOne">
                                    <span class="row align-items-center">
                                        <span class="col-9">
                                            <span class="d-block font-size-lg-15 font-size-17 font-weight-bold text-dark">Price Range ($)</span>
                                        </span>
                                        <span class="col-3 text-right">
                                            <span class="card-btn-arrow">
                                                <span class="fas fa-chevron-down small"></span>
                                            </span>
                                        </span>
                                    </span>
                                </button>
                            </h3>
                        </div>
                        <div id="shopCardOne" class="collapse show" aria-labelledby="shopCardHeadingOne" data-parent="#shopCartAccordion">
                            <div class="card-body pt-0 px-5">
                                <div class="pb-3 mb-1 d-flex text-lh-1">
                                    <span>£</span>
                                    <span id="rangeSliderExample3MinResult" class=""></span>
                                    <span class="mx-0dot5"> — </span>
                                    <span>£</span>
                                    <span id="rangeSliderExample3MaxResult" class=""></span>
                                </div>
                                <input class="js-range-slider" type="text"
                                data-extra-classes="u-range-slider height-35"
                                data-type="double"
                                data-grid="false"
                                data-hide-from-to="true"
                                data-min="0"
                                data-max="3456"
                                data-from="200"
                                data-to="3456"
                                data-prefix="$"
                                data-result-min="#rangeSliderExample3MinResult"
                                data-result-max="#rangeSliderExample3MaxResult">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Accordion -->
                <div id="cityCategoryAccordion" class="accordion rounded-0 shadow-none border-top">
                    <div class="border-0">
                        <div class="card-collapse" id="cityCategoryHeadingOne">
                            <h3 class="mb-0">
                                <button type="button" class="btn btn-link btn-block card-btn py-2 px-5 text-lh-3 collapsed" data-toggle="collapse" data-target="#cityCategoryOne" aria-expanded="false" aria-controls="cityCategoryOne">
                                    <span class="row align-items-center">
                                        <span class="col-9">
                                            <span class="font-weight-bold font-size-17 text-dark mb-3">City</span>
                                        </span>
                                        <span class="col-3 text-right">
                                            <span class="card-btn-arrow">
                                                <span class="fas fa-chevron-down small"></span>
                                            </span>
                                        </span>
                                    </span>
                                </button>
                            </h3>
                        </div>
                        <div id="cityCategoryOne" class="collapse show" aria-labelledby="cityCategoryHeadingOne" data-parent="#cityCategoryAccordion">
                            <div class="card-body pt-0 mt-1 px-5 pb-4">
                                <div class="form-group d-flex align-items-center justify-content-between font-size-1 text-lh-md text-secondary mb-3">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="brandamsterdam">
                                        <label class="custom-control-label" for="brandamsterdam">Amsterdam</label>
                                    </div>
                                    <span>749</span>
                                </div>
                                <div class="form-group d-flex align-items-center justify-content-between font-size-1 text-lh-md text-secondary mb-3">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="brandrotterdam">
                                        <label class="custom-control-label" for="brandrotterdam">Rotterdam</label>
                                    </div>
                                    <span>630</span>
                                </div>
                                <div class="form-group d-flex align-items-center justify-content-between font-size-1 text-lh-md text-secondary mb-3">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="brandvalkenburg">
                                        <label class="custom-control-label" for="brandvalkenburg">Valkenburg</label>
                                    </div>
                                    <span>58</span>
                                </div>
                                <div class="form-group d-flex align-items-center justify-content-between font-size-1 text-lh-md text-secondary mb-3">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="brandeindhoven">
                                        <label class="custom-control-label" for="brandeindhoven">Eindhoven</label>
                                    </div>
                                    <span>29</span>
                                </div>
                                <!-- End Checkboxes -->

                                <!-- View More - Collapse -->
                                <div class="collapse" id="collapseBrand3">
                                    <div class="form-group d-flex align-items-center justify-content-between font-size-1 text-lh-md text-secondary mb-3">
                                        <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="gucci">
                                        <label class="custom-control-label" for="gucci">Gucci</label>
                                        </div>
                                        <span>5</span>
                                    </div>
                                    <div class="form-group d-flex align-items-center justify-content-between font-size-1 text-lh-md text-secondary mb-3">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="mango">
                                            <label class="custom-control-label" for="mango">Mango</label>
                                        </div>
                                        <span>1</span>
                                    </div>
                                </div>
                                <!-- End View More - Collapse -->

                                <!-- Link -->
                                <a class="link link-collapse small font-size-1 mt-2" data-toggle="collapse" href="#collapseBrand3" role="button" aria-expanded="false" aria-controls="collapseBrand3">
                                  <span class="link-collapse__default font-size-14">Show all 25</span>
                                  <span class="link-collapse__active font-size-14">Show less</span>
                                </a>
                                <!-- End Link -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Accordion -->
            </div>
        </div>
    </div>
</div>