<div class="modal" id="addClientModel" tabindex="-1" role="dialog" aria-labelledby="addClientModelLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addClientModelLabel">Add Client</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="add-client-form">
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="name" class="fw-bold">Name<span class="text-danger"> *</span></label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter name">
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <label class="fw-bold" for="email">Email <span class="text-danger"> *</span></label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <label class="fw-bold" for="email">Phone <span class="text-danger"> *</span></label>
                                <input type="text" onkeydown="return /[0-9]/i.test(event.key)" maxlength="10" class="form-control" id="phone" name="phone" placeholder="Enter phone">
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <label class="fw-bold" for="password">Password <span class="text-danger"> *</span></label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <label class="fw-bold" for="confirmPassword">Confirm Password <span class="text-danger"> *</span></label>
                                <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Enter confirm password">
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <label class="fw-bold" for="companyName">Company Name <span class="text-danger"> *</span></label>
                                <input type="text" class="form-control" id="companyName" name="companyName" placeholder="Enter compnay name">
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <label class="fw-bold" for="companyProfile">Company Profile</label>
                                <input type="text" class="form-control" id="companyProfile" name="companyProfile" placeholder="Enter compnay profile">
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <label class="fw-bold" for="companyAddress">Company Address <span class="text-danger"> *</span></label>
                                <textarea class="form-control" id="companyAddress" name="companyAddress" placeholder="Enter compnay address"></textarea>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <label class="fw-bold" for="companyPhone">Company Phone Number <span class="text-danger"> *</span></label>
                                <input type="text" onkeydown="return /[0-9]/i.test(event.key)" maxlength="10" class="form-control" id="companyPhone" name="companyPhone" placeholder="Enter compnay number">
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <label class="fw-bold" for="websiteUrl">Website URL <span class="text-danger"> *</span></label>
                                <input type="text" class="form-control" id="websiteUrl" name="websiteUrl" placeholder="Enter website url">
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <label class="fw-bold" for="facebookLink">Facebook Link</label>
                                <input type="text" class="form-control" id="facebookLink" name="facebookLink" placeholder="Enter facebook link">
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <label class="fw-bold" for="twitterLink">Twitter Link</label>
                                <input type="text" class="form-control" id="twitterLink" name="twitterLink" placeholder="Enter twitter link">
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <label class="fw-bold" for="googleplus">Google Plus</label>
                                <input type="text" class="form-control" id="googleplus" name="googleplus" placeholder="Enter google plus link">
                            </div>
                        </div>


                        <div class="col-4">
                            <div class="form-group">
                                <label class="fw-bold" for="linkedIn">Linked In</label>
                                <input type="text" class="form-control" id="linkedIn" name="linkedIn" placeholder="Enter linked in link">
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <label class="fw-bold" for="companyLogo">Company Logo <span class="text-danger"> *</span></label>
                                <input type="file" class="form-control" id="companyLogo" name="companyLogo" placeholder="Select logo" accept="image/*">
                            </div>
                        </div>

                        <div class="col-4 offset-8">
                            <img class="mb-3 img img-fluid" id="ajaxImgUpload" alt="Preview Image" src="https://via.placeholder.com/100" />
                        </div>
                        <?php
                        $session = \Config\Services::session();
                        ?>
                        <input type="hidden" name="partner_name" value="<?= $session->login_user['user_name'];?>" />
                        <input type="hidden" name='ekey' value="<?php echo "e-THEWINGSHIELD".generateRandomNum(); ?>">
                        <input type="hidden" name='ekeypass' value="<?php echo generateRandomString(); ?>">

                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="saveClient">Save</button>
            </div>
        </div>
    </div>
</div>