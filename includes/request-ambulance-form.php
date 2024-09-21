 <!--Start Main Contact Form Area-->
 <section id="contact" class="main-contact-form-area mt-10">
     <div class="container">
         <div class="sec-title text-center">
             <div class="icon">
                 <span class="icon-heartbeat"></span>
             </div>
             <div class="sub-title">
                 <h3>Send us Message</h3>
             </div>
             <h2>Write us Anytime</h2>
         </div>
         <div class="row">
             <div class="col-xl-12">
                 <div class="contact-form">
                     <form
                         id="contact-form"
                         name="contact_form"
                         class="default-form2"
                         action="assets/inc/sendmail.php"
                         method="post">
                         <div class="row">
                             <div class="col-xl-6">
                                 <div class="form-group">
                                     <div class="input-box">
                                         <input
                                             type="text"
                                             name="form_name"
                                             id="formName"
                                             placeholder="Full Name"
                                             required="" />
                                     </div>
                                 </div>
                             </div>
                             <div class="col-xl-6">
                                 <div class="form-group">
                                     <div class="input-box">
                                         <input
                                             type="email"
                                             name="form_email"
                                             id="formEmail"
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
                                             name="form_phone"
                                             value=""
                                             id="formPhone"
                                             placeholder="Phone" />
                                     </div>
                                 </div>
                             </div>
                             <div class="col-xl-6">
                                 <div class="form-group">
                                     <div class="input-box">
                                         <input
                                             type="text"
                                             name="form_subject"
                                             value=""
                                             id="formSubject"
                                             placeholder="Subject" />
                                     </div>
                                 </div>
                             </div>
                         </div>

                         <div class="row">
                             <div class="col-xl-12">
                                 <div class="form-group">
                                     <div class="input-box">
                                         <textarea
                                             name="form_message"
                                             id="formMessage"
                                             placeholder="Write a Message"
                                             required=""></textarea>
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
                                         <span class="txt"> send a message </span>
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