<!--Start Main Contact Form Area-->
<section id="requestAmbulanceForm" class="main-contact-form-area mt-10">
    <div class="container">
        <div class="sec-title text-center">
            <div class="icon">
                <span class="icon-heartbeat"></span>
            </div>
            <div class="sub-title">
                <h3>Request an Ambulance</h3>
            </div>
            <h2>We're Here to Help</h2>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="contact-form">
                    <form
                        id="ambulance-request-form"
                        name="ambulance_request_form"
                        class="default-form2"
                        action=""
                        method="post">
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="form-group">
                                    <div class="input-box">
                                        <input
                                            type="text"
                                            name="patientName"
                                            id="fullName"
                                            placeholder="Patient Name"
                                            required="" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-group">
                                    <div class="input-box">
                                        <input
                                            type="email"
                                            name="email"
                                            id="email"
                                            placeholder="Email Address"
                                            required="" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xl-6">
                                <div class="form-group">
                                    <div class="input-box">
                                        <input
                                            type="text"
                                            name="phone"
                                            id="phone"
                                            placeholder="Phone"
                                            required="" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-group">
                                    <div class="input-box">
                                        <input
                                            type="text"
                                            name="hospital_name"
                                            id="hospitalName"
                                            placeholder="Hospital Name"
                                            required="" />
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-xl-6">
                                <div class="form-group">
                                    <div class="input-box">
                                        <input
                                            type="text"
                                            name="pickup_address"
                                            id="pickupAddress"
                                            placeholder="Pickup Address"
                                            required="" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-group">
                                    <div class="input-box">
                                        <input
                                            type="text"
                                            name="pickup_address"
                                            id="pickupAddress"
                                            placeholder="Pickup Address"
                                            required="" />
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row ">
                            <div class="col-xl-6">
                                <div class="form-group">
                                    <div class="input-box">
                                        <select name="request_type" id="requestType" required="">
                                            <option value="" disabled selected>Select Request Type</option>
                                            <option value="emergency">Emergency</option>
                                            <option value="non-emergency">Non-Emergency</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-6">
                                <div class="form-group">
                                    <div class="input-box">
                                        <select name="equipment_level" id="equipment_level" class="form-control" required>
                                            <option value="Basic Life Support (BLS)">Basic Life Support (BLS)</option>
                                            <option value="Advanced Life Support (ALS)">Advanced Life Support (ALS)</option>
                                            <option value="Neonatal Ambulance">Neonatal Ambulance</option>
                                            <option value="Air Ambulance">Air Ambulance</option>
                                            <option value="Patient Transport">Patient Transport</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xl-12">
                                <div class="form-group">
                                    <div class="input-box">
                                        <textarea
                                            name="additional_info"
                                            id="additionalInfo"
                                            placeholder="Additional Information (optional)"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xl-12 text-center">
                                <div class="button-box">
                                    <input
                                        id="form_botcheck"
                                        name="form_botcheck"
                                        class="form-control"
                                        type="hidden"
                                        value="" />
                                    <button
                                        class="btn-one"
                                        type="submit"
                                        data-loading-text="Please wait...">
                                        <span class="txt"> Request Ambulance </span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!--End Main Contact Form Area-->