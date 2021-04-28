$(function() {
	'use strict'
	$('#wizard1').steps({
		headerTag: 'h3',
		bodyTag: 'section',
		autoFocus: true,
		titleTemplate: '<span class="number">#index#<\/span> <span class="title">#title#<\/span>',
        		onStepChanging: function(event, currentIndex, newIndex) {
			if (currentIndex < newIndex) {
				// Step 1 form validation
				if (currentIndex === 0) {
					var name = $('#name').parsley();
					var age = $('#age').parsley();
                    var fathername = $('#fathername').parsley();
					var fatherstudy = $('#fatherstudy').parsley();
                    var fatherjobsyr = $('#fatherjobsyr').parsley();
					var fatherjob = $('#fatherjob').parsley();
                    var mothername = $('#mothername').parsley();
					var motherstudy = $('#motherstudy').parsley();
                    var motherjobsyr = $('#motherjobsyr').parsley();
					var motherjob = $('#motherjob').parsley();
					var citysyr = $('#citysyr').parsley();
					var areasyr = $('#areasyr').parsley();
					var livenow = $('#livenow').parsley();
                    var stu_livenow = $('#stu_livenow').parsley();
					var Ye_entry_Turkey = $('#Ye_entry_Turkey').parsley();
					if (name.isValid() && age.isValid() && fathername.isValid() && fatherstudy.isValid()
                    && fatherjobsyr.isValid()&& fatherjob.isValid()&& mothername.isValid() &&
                    motherstudy.isValid()&& motherjobsyr.isValid() && motherjob.isValid()
                    && citysyr.isValid() && areasyr.isValid() && livenow.isValid() && Ye_entry_Turkey.isValid() && stu_livenow.isValid() ) {
						return true;
					} else {
						name.validate();
						age.validate();
                        fathername.validate();
						fatherstudy.validate();
						fatherjobsyr.validate();
						fatherjob.validate();
						mothername.validate();
						motherstudy.validate();
						motherjobsyr.validate();
						motherjob.validate();
						citysyr.validate();
						areasyr.validate();
						livenow.validate();
                        stu_livenow.validate();
                        Ye_entry_Turkey.validate();
					}
				}
				// Step 2 form validation
				if (currentIndex === 1) {
					var which_univer_stud = $('#which_univer_stud').parsley();
					var Univer_loca = $('#Univer_loca').parsley();
                    var spec = $('#spec').parsley();
					var Nu_years = $('#Nu_years').parsley();
                    var Current_rate = $('#Current_rate').parsley();
					var Cumul_average = $('#Cumul_average').parsley();
                    var Prepar_year = $('#Prepar_year').parsley();
					var study_language = $('#study_language').parsley();
                    var current_level_language = $('#current_level_language').parsley();
					var motherjob = $('#motherjob').parsley();
					var Mark_previous_level = $('#Mark_previous_level').parsley();
					var rate_previous_levels = $('#rate_previous_levels').parsley();
					var Accept_univer = $('#Accept_univer').parsley();
                    var Rate_accept_certif = $('#Rate_accept_certif').parsley();
					var Another_univer_branch = $('#Another_univer_branch').parsley();
					var Another_specialty = $('#Another_specialty').parsley();
                    var Rate_univer = $('#Rate_univer').parsley();
                    var Are_there_scholarships = $('#Are_there_scholarships').parsley();
                    var Name_scholarship = $('#Name_scholarship').parsley();
                    var value_Scholarship = $('#value_Scholarship').parsley();
					if (which_univer_stud.isValid() && Univer_loca.isValid() && spec.isValid() && Nu_years.isValid()
                    && Current_rate.isValid()&& Cumul_average.isValid()&& Prepar_year.isValid() &&
                    study_language.isValid()&& current_level_language.isValid() && motherjob.isValid()
                    && Mark_previous_level.isValid() && rate_previous_levels.isValid() && Accept_univer.isValid()
                     && Another_univer_branch.isValid() && Rate_accept_certif.isValid()
                      && Another_specialty.isValid() && Rate_univer.isValid() && Are_there_scholarships.isValid() && Name_scholarship.isValid() && value_Scholarship.isValid() ) {
						return true;
					} else {
						which_univer_stud.validate();
						Univer_loca.validate();
                        spec.validate();
						Nu_years.validate();
						Current_rate.validate();
						Cumul_average.validate();
						Prepar_year.validate();
						study_language.validate();
						current_level_language.validate();
						motherjob.validate();
						Mark_previous_level.validate();
						rate_previous_levels.validate();
						Accept_univer.validate();
                        Rate_accept_certif.validate();
                        Another_univer_branch.validate();
                        Another_specialty.validate();
                        How_accept_second_univer.validate();
                        Rate_univer.validate();
                        Are_there_scholarships.validate();
                        Name_scholarship.validate();
                        value_Scholarship.validate();
					}
				}
                // Step 3 form validation
				if (currentIndex === 2) {
					var live_univer_stud = $('#live_univer_stud').parsley();
					var live_hous_free = $('#live_hous_free').parsley();
                    var Is_food_free = $('#Is_food_free').parsley();
					var How_much_month_hous_rent = $('#How_much_month_hous_rent').parsley();
                    var live_special_hous = $('#live_special_hous').parsley();
					var housing_type = $('#housing_type').parsley();
                    var How_much_monthly = $('#How_much_monthly').parsley();
                    var test = $('#test').parsley();
					if (live_univer_stud.isValid() && live_hous_free.isValid() && Is_food_free.isValid() && How_much_month_hous_rent.isValid()
                    && live_special_hous.isValid()&& housing_type.isValid()&& How_much_monthly.isValid() && test.isValid() ) {
						return true;
					} else {
						live_univer_stud.validate();
						live_hous_free.validate();
                        Is_food_free.validate();
						How_much_month_hous_rent.validate();
						live_special_hous.validate();
						housing_type.validate();
						How_much_monthly.validate();
						test.validate();

					}
				}


				// Always allow step back to the previous step even if the current step is not valid.
			}
             else {
				return true;
			}
		}
	});
	$('#wizard2').steps({
		headerTag: 'h3',
		bodyTag: 'section',
		autoFocus: true,
		titleTemplate: '<span class="number">#index#<\/span> <span class="title">#title#<\/span>',
		onStepChanging: function(event, currentIndex, newIndex) {
			if (currentIndex < newIndex) {
				// Step 1 form validation
				if (currentIndex === 0) {
					var name = $('#firstname').parsley();
					var age = $('#age').parsley();
                    var fathername = $('#fathername').parsley();
					var fatherstudy = $('#fatherstudy').parsley();
                    var fatherjobsyr = $('#fatherjobsyr').parsley();
					var fatherjob = $('#fatherjob').parsley();
                    var mothername = $('#mothername').parsley();
					var motherstudy = $('#motherstudy').parsley();
                    var motherjobsyr = $('#motherjobsyr').parsley();
					var motherjob = $('#motherjob').parsley();
					var citysyr = $('#citysyr').parsley();
					var areasyr = $('#areasyr').parsley();
					var livenow = $('#livenow').parsley();
					if (name.isValid() && age.isValid() && fathername.isValid() && fatherstudy.isValid()
                    && fatherjobsyr.isValid()&& fatherjob.isValid()&& mothername.isValid() &&
                    motherstudy.isValid()&& motherjobsyr.isValid() && motherjob.isValid()
                    && citysyr.isValid() && areasyr.isValid() && livenow.isValid()) {
						return true;
					} else {
						name.validate();
						age.validate();
                        fathername.validate();
						fatherstudy.validate();
						fatherjobsyr.validate();
						fatherjob.validate();
						mothername.validate();
						motherstudy.validate();
						motherjobsyr.validate();
						motherjob.validate();
						citysyr.validate();
						areasyr.validate();
						livenow.validate();
					}
				}
				// Step 2 form validation
				if (currentIndex === 1) {
					var email = $('#email').parsley();
					if (email.isValid()) {
						return true;
					} else {
						email.validate();
					}
				}

				// Always allow step back to the previous step even if the current step is not valid.
			}
             else {
				return true;
			}
		}
	});
	$('#wizard3').steps({
		headerTag: 'h3',
		bodyTag: 'section',
		autoFocus: true,
		titleTemplate: '<span class="number">#index#<\/span> <span class="title">#title#<\/span>',
		stepsOrientation: 1
	});
});
