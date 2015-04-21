
<div class="verticalcenter container">
  <div>
     <h2 class="text-center row title">Please Register with your details below</h2>
     <diV class="row">{{success}}</diV>
    <form name="sgnpform" novalidate  id="partnerform">
         <div class="form-title row">
          <h4 class="col-md-12">Company Details</h4>
        </div>


      <div class="row">        
        <div class="input-row">
          <label class="col-xs-12 col-sm-3 col-md-3"> Company Name : </label>
          <span class="col-xs-12 col-sm-9 col-md-9"><input class="form-control" type="text" ng-model="signup.comp_name" name="comp_name" required></span>
        </div>
        <div class="col-md-offset-3 col-sm-offset-3" ng-show="sgnpform.$submitted || sgnpform.comp_name.$touched"> <span ng-show="sgnpform.comp_name.$error.required">Company Name is Required.</span> </div>
      </div>
      
      
      <div class="row">
        <div class="input-row">
          <label class="col-xs-12 col-sm-3 col-md-3">Primary Address :</label>
          <span class="col-xs-12 col-sm-9 col-xs-12 col-sm-9 col-md-9"><input class="form-control" type="text" ng-model="signup.comp_address" required name="comp_address"  id="comp_address"></span>
          <div ng-show="sgnpform.$submitted || sgnpform.comp_address.$touched"> <span ng-show="sgnpform.comp_address.$error.required">Company Primary Address is Required.</span> </div>
        </div>
      </div>
      <div class="row">
        <div class="input-row">
          <label class="col-xs-12 col-sm-3 col-md-3">Country :</label>
          <span class="col-xs-12 col-sm-9 col-xs-12 col-sm-9 col-md-9"><select class="form-control" name="comp_country" data-ng-model="signup.comp_country" data-ng-change="updateCountry()" required data-ng-options="country.country_name for country in countries | orderBy:'country_name'">
            <option value="">--Select country--</option>
          </select></span>
          <div ng-show="sgnpform.$submitted || sgnpform.comp_country.$touched"> <span ng-show="sgnpform.comp_country.$error.required">Company Country is Required.</span> </div>
        </div>
      </div>
      <div class="row">
        <div class="input-row">
          <label class="col-xs-12 col-sm-3 col-md-3">City :</label>
          <span class="col-xs-12 col-sm-9 col-md-9">
              <select class="form-control" name="comp_city" ng-disabled="!availablecity" data-ng-model="signup.comp_city" required data-ng-options="city.city_name for city in availablecity | orderBy:'city_name'">
                <option value="">--Select City--</option>
              </select>
          </span>
        </div>
        <div ng-show="sgnpform.$submitted || sgnpform.comp_city.$touched"> <span ng-show="sgnpform.comp_city.$error.required">City is Required.</span> </div>
      </div>
      
      <div class="row">
        <div class="input-row">
          <label class="col-xs-12 col-sm-3 col-md-3">Zip Code</label>
          <span class="col-xs-12 col-sm-9 col-xs-12 col-sm-9 col-md-9"><input class="form-control" data-ng-model="signup.comp_zipcode" type="text" name="comp_zipcode"  id="comp_zipcode">
        </div>
      </div>
      <div class="row">
        <div class="input-row">
          <label class="col-xs-12 col-sm-3 col-md-3">Phone</label>
          <span class="col-xs-12 col-sm-9 col-xs-12 col-sm-9 col-md-9"><input class="form-control" data-ng-model="signup.comp_phone" required type="number" name="comp_phone"  id="comp_phone"></span>
        </div>
        <div ng-show="sgnpform.$submitted || sgnpform.comp_phone.$touched"> <span ng-show="sgnpform.comp_phone.$error.required">Phone is Required.</span> <span ng-show="sgnpform.comp_phone.$error.number">Enter Valid Phone No.</span> </div>
      </div>
      <div class="row">
        <div class="input-row">
          <label class="col-xs-12 col-sm-3 col-md-3">Fax</label>
          <span class="col-xs-12 col-sm-9 col-md-9"> <input class="form-control" data-ng-model="signup.comp_fax" type="text"  name="comp_fax" id="comp_fax"></span>
        </div>
      </div>
      <div class="row">
        <div class="input-row">
          <label class="col-xs-12 col-sm-3 col-md-3">Email</label>
          <span class="col-xs-12 col-sm-9 col-xs-12 col-sm-9 col-md-9"><input class="form-control" type="email" data-ng-model="signup.comp_email" required type="email" name="comp_email" id="comp_email"></span>
        </div>
        <div ng-show="sgnpform.$submitted || sgnpform.comp_email.$touched"> <span ng-show="sgnpform.comp_email.$error.required">Email is Required.</span> <span ng-show="sgnpform.comp_email.$error.email">InValid Email Address.</span> </div>
      </div>
      
      <div class="row">
        <div class="input-row">
          <label class="col-xs-12 col-sm-3 col-md-3">Website Address</label>
          <span class="col-xs-12 col-sm-9"><input class="form-control" data-ng-model="signup.comp_website" type="url" name="comp_website" id="comp_website">
        </div>
        <span ng-show="sgnpform.comp_website.$error.url"> Not valid url!</span> </div>
        
      <div class="row form-title">
        <h4 class="col-md-12">Primary Contact</h4>
      </div>
      
      <div class="row">
        <div class="input-row">
          <label class="col-xs-12 col-sm-3 col-md-3">Title</label>
          <span class="col-xs-12 col-sm-9 col-md-9">
          <select class="form-control" data-ng-model="signup.comp_person_gender" required name="comp_person_gender" class="form" id="comp_person_gender">
            <option value="">&ndash;Please Select&ndash;</option>
            <option value="Mr.">Mr.</option>
            <option value="Mrs.">Mrs.</option>
            <option value="Miss">Miss</option>
            <option value="Ms.">Ms.</option>
            <option value="Dr.">Dr.</option>
            <option value="Prof.">Prof.</option>
          </select>
          </span>
        </div>
        <div ng-show="sgnpform.$submitted || sgnpform.comp_person_gender.$touched"> <span ng-show="sgnpform.comp_person_gender.$error.required">Title is Required.</span> </div>
      </div>
      
      <div class="row">
        <div class="input-row">
          <label class="col-xs-12 col-sm-3 col-md-3">Name</label>
          <span class="col-xs-12 col-sm-9 col-md-9"><input class="form-control" data-ng-model="signup.comp_person_name" required type="text" name="comp_person_name"></span>
        </div>
        <div ng-show="sgnpform.$submitted || sgnpform.comp_person_name.$touched"> <span ng-show="sgnpform.comp_person_name.$error.required">Name is Required.</span> </div>
      </div>
      <div class="row">
        <div class="input-row">
          <label class="col-xs-12 col-sm-3 col-md-3">Position</label>
          <span class="col-xs-12 col-sm-9 col-md-9"><input class="form-control" data-ng-model="signup.comp_person_position" required type="text" name="comp_person_position"></span>
        </div>
        <div ng-show="sgnpform.$submitted || sgnpform.comp_person_position.$touched"> <span ng-show="sgnpform.comp_person_position.$error.required">Position is Required.</span> </div>
      </div>
      <div class="row">
        <div class="input-row">
          <label class="col-xs-12 col-sm-3 col-md-3">Phone</label>
          <span class="col-xs-12 col-sm-9 col-md-9"><input class="form-control" data-ng-model="signup.comp_person_phone" required type="number" name="comp_person_phone"  id="comp_person_phone"></span>
        </div>
        <div ng-show="sgnpform.$submitted || sgnpform.comp_person_phone.$touched"> <span ng-show="sgnpform.comp_person_phone.$error.required">Phone is Required.</span> <span ng-show="sgnpform.comp_person_phone.$error.number">Enter Valid Phone No.</span> </div>
      </div>
      <div class="row">
        <div class="input-row">
          <label class="col-xs-12 col-sm-3 col-md-3">Email</label>
          <span class="col-xs-12 col-sm-9 col-md-9"><input class="form-control" type="email" data-ng-model="signup.comp_person_email" required name="comp_person_email"  id="comp_person_email"></span>
        </div>
        <div ng-show="sgnpform.$submitted || sgnpform.comp_person_email.$touched"> <span ng-show="sgnpform.comp_person_email.$error.required">Email is Required.</span> <span ng-show="sgnpform.comp_person_email.$error.email">InValid Email Address.</span> <span ng-hide="uniquemail">Enter unique Email Address </span> </div>
      </div>
      
      <div class="row form-title">
        <h4 class="col-md-12">About You</h4>
      </div>
      
      <div class="row">
        <div class="input-row">
          <label class="col-xs-12 col-sm-3 col-md-3">Title</label>
          <span class="col-xs-12 col-sm-9 col-md-9">
          <select name="comp_managing_person_Title" class="form form-control" data-ng-model="signup.comp_managing_person_Title" required>
            <option value="" <?php echo set_select('comp_managing_person_Title', '', TRUE); ?>>&ndash;Please Select&ndash;</option>
            <option value="Mr." <?php echo set_select('comp_managing_person_Title', 'Mr.', TRUE); ?>>Mr.</option>
            <option value="Mrs." <?php echo set_select('comp_managing_person_Title', 'Mrs.', TRUE); ?>>Mrs.</option>
            <option value="Miss" <?php echo set_select('comp_managing_person_Title', 'Miss', TRUE); ?>>Miss</option>
            <option value="Ms." <?php echo set_select('comp_managing_person_Title', 'Ms.', TRUE); ?>>Ms.</option>
            <option value="Dr." <?php echo set_select('comp_managing_person_Title', 'Dr.', TRUE); ?>>Dr.</option>
            <option value="Prof." <?php echo set_select('comp_managing_person_Title', 'Prof.', TRUE); ?>>Prof.</option>
          </select>
          </span>
        </div>
        
        <div ng-show="sgnpform.$submitted || sgnpform.comp_managing_person_Title.$touched"> <span ng-show="sgnpform.comp_managing_person_Title.$error.required">Title is Required.</span> </div>
      </div>
      
      <div class="row">
        <div class="input-row">
          <label class="col-xs-12 col-sm-3 col-md-3">Owner/Manager Name</label>
          <span class="col-xs-12 col-sm-9 col-md-9"><input class="form-control" type="text" data-ng-model="signup.comp_managing_person_name" required name="comp_managing_person_name"></span>
        </div>
        <div ng-show="sgnpform.$submitted || sgnpform.comp_managing_person_name.$touched"> <span ng-show="sgnpform.comp_managing_person_name.$error.required">Owner/Manager Name is Required.</span> </div>
      </div>
      
      <div class="row">
        <div class="input-row">
          <label class="col-xs-12 col-sm-3 col-md-3">Please provide a brief description of the services provided by your company</label>
          <span class="col-xs-12 col-sm-9 col-md-9"><textarea class="form-control" rows="2" name="comp_services" data-ng-model="signup.comp_services" required cols="40" id="comp_services"></textarea></span>
        </div>
        <div ng-show="sgnpform.$submitted || sgnpform.comp_services.$touched"> <span ng-show="sgnpform.comp_services.$error.required">This is Required.</span> </div>
      </div>
      
      <div class="row">
        <label class="col-xs-12 col-sm-3 col-md-3">Who is your target market and customer base? <span class="required">*</span></label>
        <span class="col-xs-12 col-sm-9 col-md-9"><textarea class="form-control" name="comp_target_market" data-ng-model="signup.comp_target_market" required cols="40"></textarea></span>
          <div ng-show="sgnpform.$submitted || sgnpform.comp_target_market.$touched"> <span ng-show="sgnpform.comp_target_market.$error.required">This is Required.</span> </div>
      </div>
      <div class="row">
        <div class="input-row">
          <label class="col-xs-12 col-sm-3 col-md-3"> What territories do you cover? <span class="required">*</span></label>
          <span class="col-xs-12 col-sm-9 col-md-9"><input class="form-control" type="text" name="comp_territories" data-ng-model="signup.comp_territories" required></span>
        </div>
        <div ng-show="sgnpform.$submitted || sgnpform.comp_territories.$touched"> <span ng-show="sgnpform.comp_territories.$error.required">This is Required.</span> </div>
      </div>
      <div class="row">
        <label class="col-xs-12 col-sm-3 col-md-3"> What are the strengths and qualities of your company? *</label>
        <span class="col-xs-12 col-sm-9 col-md-9"><textarea class="form-control" name="comp_strength" data-ng-model="signup.comp_strength" required cols="40"></textarea></span>
        <div ng-show="sgnpform.$submitted || sgnpform.comp_strength.$touched"> <span ng-show="sgnpform.comp_strength.$error.required">This is Required.</span> </div>
      </div>
      
      <div class="row form-title">
        <h4 class="col-md-12">General Company Information</h4>
      </div>
      
      <div class="row">
        <div class="input-row">
          <label class="col-xs-12 col-sm-3 col-md-3">Year of establishment</label>
          <span class="col-xs-12 col-sm-9 col-md-9"><input class="form-control" type="text" data-ng-model="signup.content_office_opened" name="content_office_opened"></span>
        </div>
      </div> 
      <div class="row">
        <div class="input-row">
          <label class="col-xs-12 col-sm-3 col-md-3">Team Size</label>
          <span class="col-xs-12 col-sm-9 col-md-9"><input class="form-control" type="text" data-ng-model="signup.comp_employees" name="comp_employees"></span>
        </div>
      </div>
      <div class="row">
        <div class="input-row">
          <label class="col-xs-12 col-sm-3 col-md-3">Estimated Yearly Turnover</label>
          <span class="col-xs-12 col-sm-9 col-md-9"><input class="form-control" type="text" data-ng-model="signup.comp_yearly_turnover" name="comp_yearly_turnover"></span>
        </div>
      </div>
      <div class="row">
      	<div class="col-md-12">
        <input class="btn btn-default" ng-disabled="sgnpform.$invalid" ng-click="register(signup)" type="submit" value="Submit" id="submitbutton">
        </div>
      </div>
    </form>
  </div>
</div>
