@extends('administrator.account.index')
@section('content_account')
<div class="card mb-5 mb-xl-10">
    <!--begin::Card header-->
    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
        <!--begin::Card title-->
        <div class="card-title m-0">
            <h3 class="fw-bold m-0">Profile Details</h3>
        </div>
        <!--end::Card title-->
    </div>
    <!--begin::Card header-->

    <!--begin::Content-->
    <div id="kt_account_settings_profile_details" class="collapse show">
        <!--begin::Form-->
        <form id="kt_account_profile_details_form" class="form fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate">
            <!--begin::Card body-->
            <div class="card-body border-top p-9" data-select2-id="select2-data-133-7i1k">
                <!--begin::Input group-->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label fw-semibold fs-6">Avatar</label>   
                    <!--end::Label-->  
                    
                    <!--begin::Col-->
                    <div class="col-lg-8">
                        <!--begin::Image input-->
                        <input type="file" 
                            class="filepond"
                            name="filepond"
                            accept="image/png, image/jpeg, image/gif"/>
                        <!--end::Image input-->

                        <!--begin::Hint-->
                        <div class="form-text">Allowed file types:  png, jpg, jpeg.</div>
                        <!--end::Hint-->
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->

                <!--begin::Input group-->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">Full Name</label>
                    <!--end::Label-->

                    <!--begin::Col-->
                    <div class="col-lg-8">
                        <!--begin::Row-->
                        <div class="row">
                            <!--begin::Col-->
                            <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                <input type="text" name="fname" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="First name" value="Max" fdprocessedid="jas2m">
                            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div></div>
                            <!--end::Col-->

                            <!--begin::Col-->
                            <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                <input type="text" name="lname" class="form-control form-control-lg form-control-solid" placeholder="Last name" value="Smith" fdprocessedid="qqayv">
                            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div></div>
                            <!--end::Col-->
                        </div>
                        <!--end::Row-->
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->

                <!--begin::Input group-->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">Company</label>
                    <!--end::Label-->

                    <!--begin::Col-->
                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                        <input type="text" name="company" class="form-control form-control-lg form-control-solid" placeholder="Company name" value="Keenthemes" fdprocessedid="eg6kx">
                    <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div></div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->

                <!--begin::Input group-->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label fw-semibold fs-6">
                        <span class="required">Contact Phone</span>

                        
<span class="ms-1" data-bs-toggle="tooltip" aria-label="Phone number must be active" data-bs-original-title="Phone number must be active" data-kt-initialized="1">
	<i class="ki-outline ki-information-5 text-gray-500 fs-6"></i></span>                    </label>
                    <!--end::Label-->
                    
                    <!--begin::Col-->
                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                        <input type="tel" name="phone" class="form-control form-control-lg form-control-solid" placeholder="Phone number" value="044 3276 454 935" fdprocessedid="o0iq4k">
                    <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div></div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->

                <!--begin::Input group-->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label fw-semibold fs-6">Company Site</label>
                    <!--end::Label-->

                    <!--begin::Col-->
                    <div class="col-lg-8 fv-row">
                        <input type="text" name="website" class="form-control form-control-lg form-control-solid" placeholder="Company website" value="keenthemes.com" fdprocessedid="imm74i">
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->

                <!--begin::Input group-->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label fw-semibold fs-6">
                        <span class="required">Country</span>

                        
<span class="ms-1" data-bs-toggle="tooltip" aria-label="Country of origination" data-bs-original-title="Country of origination" data-kt-initialized="1">
	<i class="ki-outline ki-information-5 text-gray-500 fs-6"></i></span>                    </label>
                    <!--end::Label-->

                    <!--begin::Col-->
                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                        <select name="country" aria-label="Select a Country" data-control="select2" data-placeholder="Select a country..." class="form-select form-select-solid form-select-lg fw-semibold select2-hidden-accessible" data-select2-id="select2-data-9-45e2" tabindex="-1" aria-hidden="true" data-kt-initialized="1">
                            <option value="" data-select2-id="select2-data-11-12e8">Select a Country...</option>
                                                            <option data-kt-flag="flags/afghanistan.svg" value="AF" data-select2-id="select2-data-182-xvnm">Afghanistan</option>
                                                            <option data-kt-flag="flags/aland-islands.svg" value="AX" data-select2-id="select2-data-183-4nvg">Aland Islands</option>
                                                            <option data-kt-flag="flags/albania.svg" value="AL" data-select2-id="select2-data-184-4ss5">Albania</option>
                                                            <option data-kt-flag="flags/algeria.svg" value="DZ" data-select2-id="select2-data-185-c856">Algeria</option>
                                                            <option data-kt-flag="flags/american-samoa.svg" value="AS" data-select2-id="select2-data-186-0av4">American Samoa</option>
                                                            <option data-kt-flag="flags/andorra.svg" value="AD" data-select2-id="select2-data-187-ehgf">Andorra</option>
                                                            <option data-kt-flag="flags/angola.svg" value="AO" data-select2-id="select2-data-188-4vkh">Angola</option>
                                                            <option data-kt-flag="flags/anguilla.svg" value="AI" data-select2-id="select2-data-189-jtrf">Anguilla</option>
                                                            <option data-kt-flag="flags/antigua-and-barbuda.svg" value="AG" data-select2-id="select2-data-190-y6eb">Antigua and Barbuda</option>
                                                            <option data-kt-flag="flags/argentina.svg" value="AR" data-select2-id="select2-data-191-o1n2">Argentina</option>
                                                            <option data-kt-flag="flags/armenia.svg" value="AM" data-select2-id="select2-data-192-9fxd">Armenia</option>
                                                            <option data-kt-flag="flags/aruba.svg" value="AW" data-select2-id="select2-data-193-rh8n">Aruba</option>
                                                            <option data-kt-flag="flags/australia.svg" value="AU" data-select2-id="select2-data-194-8oi6">Australia</option>
                                                            <option data-kt-flag="flags/austria.svg" value="AT" data-select2-id="select2-data-195-7ogw">Austria</option>
                                                            <option data-kt-flag="flags/azerbaijan.svg" value="AZ" data-select2-id="select2-data-196-ltqv">Azerbaijan</option>
                                                            <option data-kt-flag="flags/bahamas.svg" value="BS" data-select2-id="select2-data-197-lkv2">Bahamas</option>
                                                            <option data-kt-flag="flags/bahrain.svg" value="BH" data-select2-id="select2-data-198-1cd7">Bahrain</option>
                                                            <option data-kt-flag="flags/bangladesh.svg" value="BD" data-select2-id="select2-data-199-y4w1">Bangladesh</option>
                                                            <option data-kt-flag="flags/barbados.svg" value="BB" data-select2-id="select2-data-200-i7va">Barbados</option>
                                                            <option data-kt-flag="flags/belarus.svg" value="BY" data-select2-id="select2-data-201-nbfv">Belarus</option>
                                                            <option data-kt-flag="flags/belgium.svg" value="BE" data-select2-id="select2-data-202-inot">Belgium</option>
                                                            <option data-kt-flag="flags/belize.svg" value="BZ" data-select2-id="select2-data-203-hrf2">Belize</option>
                                                            <option data-kt-flag="flags/benin.svg" value="BJ" data-select2-id="select2-data-204-ddtk">Benin</option>
                                                            <option data-kt-flag="flags/bermuda.svg" value="BM" data-select2-id="select2-data-205-d2ve">Bermuda</option>
                                                            <option data-kt-flag="flags/bhutan.svg" value="BT" data-select2-id="select2-data-206-l2g0">Bhutan</option>
                                                            <option data-kt-flag="flags/bolivia.svg" value="BO" data-select2-id="select2-data-207-0kl9">Bolivia, Plurinational State of</option>
                                                            <option data-kt-flag="flags/bonaire.svg" value="BQ" data-select2-id="select2-data-208-t763">Bonaire, Sint Eustatius and Saba</option>
                                                            <option data-kt-flag="flags/bosnia-and-herzegovina.svg" value="BA" data-select2-id="select2-data-209-8mbs">Bosnia and Herzegovina</option>
                                                            <option data-kt-flag="flags/botswana.svg" value="BW" data-select2-id="select2-data-210-pepd">Botswana</option>
                                                            <option data-kt-flag="flags/brazil.svg" value="BR" data-select2-id="select2-data-211-iop5">Brazil</option>
                                                            <option data-kt-flag="flags/british-indian-ocean-territory.svg" value="IO" data-select2-id="select2-data-212-91ve">British Indian Ocean Territory</option>
                                                            <option data-kt-flag="flags/brunei.svg" value="BN" data-select2-id="select2-data-213-t0sr">Brunei Darussalam</option>
                                                            <option data-kt-flag="flags/bulgaria.svg" value="BG" data-select2-id="select2-data-214-92kk">Bulgaria</option>
                                                            <option data-kt-flag="flags/burkina-faso.svg" value="BF" data-select2-id="select2-data-215-zc66">Burkina Faso</option>
                                                            <option data-kt-flag="flags/burundi.svg" value="BI" data-select2-id="select2-data-216-8mxx">Burundi</option>
                                                            <option data-kt-flag="flags/cambodia.svg" value="KH" data-select2-id="select2-data-217-xheq">Cambodia</option>
                                                            <option data-kt-flag="flags/cameroon.svg" value="CM" data-select2-id="select2-data-218-4q2s">Cameroon</option>
                                                            <option data-kt-flag="flags/canada.svg" value="CA" data-select2-id="select2-data-219-sukv">Canada</option>
                                                            <option data-kt-flag="flags/cape-verde.svg" value="CV" data-select2-id="select2-data-220-f91h">Cape Verde</option>
                                                            <option data-kt-flag="flags/cayman-islands.svg" value="KY" data-select2-id="select2-data-221-1uk1">Cayman Islands</option>
                                                            <option data-kt-flag="flags/central-african-republic.svg" value="CF" data-select2-id="select2-data-222-gc94">Central African Republic</option>
                                                            <option data-kt-flag="flags/chad.svg" value="TD" data-select2-id="select2-data-223-yl2e">Chad</option>
                                                            <option data-kt-flag="flags/chile.svg" value="CL" data-select2-id="select2-data-224-2rm3">Chile</option>
                                                            <option data-kt-flag="flags/china.svg" value="CN" data-select2-id="select2-data-225-e0d3">China</option>
                                                            <option data-kt-flag="flags/christmas-island.svg" value="CX" data-select2-id="select2-data-226-j2ht">Christmas Island</option>
                                                            <option data-kt-flag="flags/cocos-island.svg" value="CC" data-select2-id="select2-data-227-farm">Cocos (Keeling) Islands</option>
                                                            <option data-kt-flag="flags/colombia.svg" value="CO" data-select2-id="select2-data-228-misb">Colombia</option>
                                                            <option data-kt-flag="flags/comoros.svg" value="KM" data-select2-id="select2-data-229-f5w2">Comoros</option>
                                                            <option data-kt-flag="flags/cook-islands.svg" value="CK" data-select2-id="select2-data-230-b7ev">Cook Islands</option>
                                                            <option data-kt-flag="flags/costa-rica.svg" value="CR" data-select2-id="select2-data-231-kqb7">Costa Rica</option>
                                                            <option data-kt-flag="flags/ivory-coast.svg" value="CI" data-select2-id="select2-data-232-djfi">Côte d'Ivoire</option>
                                                            <option data-kt-flag="flags/croatia.svg" value="HR" data-select2-id="select2-data-233-rogw">Croatia</option>
                                                            <option data-kt-flag="flags/cuba.svg" value="CU" data-select2-id="select2-data-234-2rt3">Cuba</option>
                                                            <option data-kt-flag="flags/curacao.svg" value="CW" data-select2-id="select2-data-235-ouyk">Curaçao</option>
                                                            <option data-kt-flag="flags/czech-republic.svg" value="CZ" data-select2-id="select2-data-236-xmox">Czech Republic</option>
                                                            <option data-kt-flag="flags/denmark.svg" value="DK" data-select2-id="select2-data-237-kq6a">Denmark</option>
                                                            <option data-kt-flag="flags/djibouti.svg" value="DJ" data-select2-id="select2-data-238-qdh1">Djibouti</option>
                                                            <option data-kt-flag="flags/dominica.svg" value="DM" data-select2-id="select2-data-239-130x">Dominica</option>
                                                            <option data-kt-flag="flags/dominican-republic.svg" value="DO" data-select2-id="select2-data-240-yc1q">Dominican Republic</option>
                                                            <option data-kt-flag="flags/ecuador.svg" value="EC" data-select2-id="select2-data-241-x7ul">Ecuador</option>
                                                            <option data-kt-flag="flags/egypt.svg" value="EG" data-select2-id="select2-data-242-p6xs">Egypt</option>
                                                            <option data-kt-flag="flags/el-salvador.svg" value="SV" data-select2-id="select2-data-243-3aqb">El Salvador</option>
                                                            <option data-kt-flag="flags/equatorial-guinea.svg" value="GQ" data-select2-id="select2-data-244-536c">Equatorial Guinea</option>
                                                            <option data-kt-flag="flags/eritrea.svg" value="ER" data-select2-id="select2-data-245-o1tf">Eritrea</option>
                                                            <option data-kt-flag="flags/estonia.svg" value="EE" data-select2-id="select2-data-246-5x6y">Estonia</option>
                                                            <option data-kt-flag="flags/ethiopia.svg" value="ET" data-select2-id="select2-data-247-rh12">Ethiopia</option>
                                                            <option data-kt-flag="flags/falkland-islands.svg" value="FK" data-select2-id="select2-data-248-vp3n">Falkland Islands (Malvinas)</option>
                                                            <option data-kt-flag="flags/fiji.svg" value="FJ" data-select2-id="select2-data-249-y8xx">Fiji</option>
                                                            <option data-kt-flag="flags/finland.svg" value="FI" data-select2-id="select2-data-250-mmr5">Finland</option>
                                                            <option data-kt-flag="flags/france.svg" value="FR" data-select2-id="select2-data-251-s9ti">France</option>
                                                            <option data-kt-flag="flags/french-polynesia.svg" value="PF" data-select2-id="select2-data-252-tauk">French Polynesia</option>
                                                            <option data-kt-flag="flags/gabon.svg" value="GA" data-select2-id="select2-data-253-klp6">Gabon</option>
                                                            <option data-kt-flag="flags/gambia.svg" value="GM" data-select2-id="select2-data-254-j0am">Gambia</option>
                                                            <option data-kt-flag="flags/georgia.svg" value="GE" data-select2-id="select2-data-255-79dv">Georgia</option>
                                                            <option data-kt-flag="flags/germany.svg" value="DE" data-select2-id="select2-data-256-l157">Germany</option>
                                                            <option data-kt-flag="flags/ghana.svg" value="GH" data-select2-id="select2-data-257-yuhs">Ghana</option>
                                                            <option data-kt-flag="flags/gibraltar.svg" value="GI" data-select2-id="select2-data-258-6cq9">Gibraltar</option>
                                                            <option data-kt-flag="flags/greece.svg" value="GR" data-select2-id="select2-data-259-rani">Greece</option>
                                                            <option data-kt-flag="flags/greenland.svg" value="GL" data-select2-id="select2-data-260-sf1m">Greenland</option>
                                                            <option data-kt-flag="flags/grenada.svg" value="GD" data-select2-id="select2-data-261-jj56">Grenada</option>
                                                            <option data-kt-flag="flags/guam.svg" value="GU" data-select2-id="select2-data-262-xlk9">Guam</option>
                                                            <option data-kt-flag="flags/guatemala.svg" value="GT" data-select2-id="select2-data-263-wm4n">Guatemala</option>
                                                            <option data-kt-flag="flags/guernsey.svg" value="GG" data-select2-id="select2-data-264-k6dm">Guernsey</option>
                                                            <option data-kt-flag="flags/guinea.svg" value="GN" data-select2-id="select2-data-265-heja">Guinea</option>
                                                            <option data-kt-flag="flags/guinea-bissau.svg" value="GW" data-select2-id="select2-data-266-xx0f">Guinea-Bissau</option>
                                                            <option data-kt-flag="flags/haiti.svg" value="HT" data-select2-id="select2-data-267-rl08">Haiti</option>
                                                            <option data-kt-flag="flags/vatican-city.svg" value="VA" data-select2-id="select2-data-268-w5az">Holy See (Vatican City State)</option>
                                                            <option data-kt-flag="flags/honduras.svg" value="HN" data-select2-id="select2-data-269-7vlb">Honduras</option>
                                                            <option data-kt-flag="flags/hong-kong.svg" value="HK" data-select2-id="select2-data-270-ic4l">Hong Kong</option>
                                                            <option data-kt-flag="flags/hungary.svg" value="HU" data-select2-id="select2-data-271-xqkh">Hungary</option>
                                                            <option data-kt-flag="flags/iceland.svg" value="IS" data-select2-id="select2-data-272-xv0w">Iceland</option>
                                                            <option data-kt-flag="flags/india.svg" value="IN" data-select2-id="select2-data-273-lebr">India</option>
                                                            <option data-kt-flag="flags/indonesia.svg" value="ID" data-select2-id="select2-data-274-8f3k">Indonesia</option>
                                                            <option data-kt-flag="flags/iran.svg" value="IR" data-select2-id="select2-data-275-ugbq">Iran, Islamic Republic of</option>
                                                            <option data-kt-flag="flags/iraq.svg" value="IQ" data-select2-id="select2-data-276-lues">Iraq</option>
                                                            <option data-kt-flag="flags/ireland.svg" value="IE" data-select2-id="select2-data-277-o5wd">Ireland</option>
                                                            <option data-kt-flag="flags/isle-of-man.svg" value="IM" data-select2-id="select2-data-278-so18">Isle of Man</option>
                                                            <option data-kt-flag="flags/israel.svg" value="IL" data-select2-id="select2-data-279-w0n7">Israel</option>
                                                            <option data-kt-flag="flags/italy.svg" value="IT" data-select2-id="select2-data-280-iv8f">Italy</option>
                                                            <option data-kt-flag="flags/jamaica.svg" value="JM" data-select2-id="select2-data-281-g2yt">Jamaica</option>
                                                            <option data-kt-flag="flags/japan.svg" value="JP" data-select2-id="select2-data-282-czye">Japan</option>
                                                            <option data-kt-flag="flags/jersey.svg" value="JE" data-select2-id="select2-data-283-orjr">Jersey</option>
                                                            <option data-kt-flag="flags/jordan.svg" value="JO" data-select2-id="select2-data-284-0v5l">Jordan</option>
                                                            <option data-kt-flag="flags/kazakhstan.svg" value="KZ" data-select2-id="select2-data-285-fdq3">Kazakhstan</option>
                                                            <option data-kt-flag="flags/kenya.svg" value="KE" data-select2-id="select2-data-286-104c">Kenya</option>
                                                            <option data-kt-flag="flags/kiribati.svg" value="KI" data-select2-id="select2-data-287-dxov">Kiribati</option>
                                                            <option data-kt-flag="flags/north-korea.svg" value="KP" data-select2-id="select2-data-288-05vf">Korea, Democratic People's Republic of</option>
                                                            <option data-kt-flag="flags/kuwait.svg" value="KW" data-select2-id="select2-data-289-hayn">Kuwait</option>
                                                            <option data-kt-flag="flags/kyrgyzstan.svg" value="KG" data-select2-id="select2-data-290-ixu6">Kyrgyzstan</option>
                                                            <option data-kt-flag="flags/laos.svg" value="LA" data-select2-id="select2-data-291-z665">Lao People's Democratic Republic</option>
                                                            <option data-kt-flag="flags/latvia.svg" value="LV" data-select2-id="select2-data-292-qhks">Latvia</option>
                                                            <option data-kt-flag="flags/lebanon.svg" value="LB" data-select2-id="select2-data-293-dyqb">Lebanon</option>
                                                            <option data-kt-flag="flags/lesotho.svg" value="LS" data-select2-id="select2-data-294-hkh2">Lesotho</option>
                                                            <option data-kt-flag="flags/liberia.svg" value="LR" data-select2-id="select2-data-295-9z9f">Liberia</option>
                                                            <option data-kt-flag="flags/libya.svg" value="LY" data-select2-id="select2-data-296-a5xs">Libya</option>
                                                            <option data-kt-flag="flags/liechtenstein.svg" value="LI" data-select2-id="select2-data-297-zffp">Liechtenstein</option>
                                                            <option data-kt-flag="flags/lithuania.svg" value="LT" data-select2-id="select2-data-298-v4rd">Lithuania</option>
                                                            <option data-kt-flag="flags/luxembourg.svg" value="LU" data-select2-id="select2-data-299-ho3t">Luxembourg</option>
                                                            <option data-kt-flag="flags/macao.svg" value="MO" data-select2-id="select2-data-300-q162">Macao</option>
                                                            <option data-kt-flag="flags/madagascar.svg" value="MG" data-select2-id="select2-data-301-9vdh">Madagascar</option>
                                                            <option data-kt-flag="flags/malawi.svg" value="MW" data-select2-id="select2-data-302-9642">Malawi</option>
                                                            <option data-kt-flag="flags/malaysia.svg" value="MY" data-select2-id="select2-data-303-6ezb">Malaysia</option>
                                                            <option data-kt-flag="flags/maldives.svg" value="MV" data-select2-id="select2-data-304-hwm0">Maldives</option>
                                                            <option data-kt-flag="flags/mali.svg" value="ML" data-select2-id="select2-data-305-bimj">Mali</option>
                                                            <option data-kt-flag="flags/malta.svg" value="MT" data-select2-id="select2-data-306-9pdm">Malta</option>
                                                            <option data-kt-flag="flags/marshall-island.svg" value="MH" data-select2-id="select2-data-307-r6ii">Marshall Islands</option>
                                                            <option data-kt-flag="flags/martinique.svg" value="MQ" data-select2-id="select2-data-308-hxqz">Martinique</option>
                                                            <option data-kt-flag="flags/mauritania.svg" value="MR" data-select2-id="select2-data-309-qge6">Mauritania</option>
                                                            <option data-kt-flag="flags/mauritius.svg" value="MU" data-select2-id="select2-data-310-njfp">Mauritius</option>
                                                            <option data-kt-flag="flags/mexico.svg" value="MX" data-select2-id="select2-data-311-vl32">Mexico</option>
                                                            <option data-kt-flag="flags/micronesia.svg" value="FM" data-select2-id="select2-data-312-6mf6">Micronesia, Federated States of</option>
                                                            <option data-kt-flag="flags/moldova.svg" value="MD" data-select2-id="select2-data-313-1r4k">Moldova, Republic of</option>
                                                            <option data-kt-flag="flags/monaco.svg" value="MC" data-select2-id="select2-data-314-sce9">Monaco</option>
                                                            <option data-kt-flag="flags/mongolia.svg" value="MN" data-select2-id="select2-data-315-4zak">Mongolia</option>
                                                            <option data-kt-flag="flags/montenegro.svg" value="ME" data-select2-id="select2-data-316-41rs">Montenegro</option>
                                                            <option data-kt-flag="flags/montserrat.svg" value="MS" data-select2-id="select2-data-317-0b41">Montserrat</option>
                                                            <option data-kt-flag="flags/morocco.svg" value="MA" data-select2-id="select2-data-318-qsaq">Morocco</option>
                                                            <option data-kt-flag="flags/mozambique.svg" value="MZ" data-select2-id="select2-data-319-cx30">Mozambique</option>
                                                            <option data-kt-flag="flags/myanmar.svg" value="MM" data-select2-id="select2-data-320-u4iy">Myanmar</option>
                                                            <option data-kt-flag="flags/namibia.svg" value="NA" data-select2-id="select2-data-321-7y9o">Namibia</option>
                                                            <option data-kt-flag="flags/nauru.svg" value="NR" data-select2-id="select2-data-322-rffd">Nauru</option>
                                                            <option data-kt-flag="flags/nepal.svg" value="NP" data-select2-id="select2-data-323-nxal">Nepal</option>
                                                            <option data-kt-flag="flags/netherlands.svg" value="NL" data-select2-id="select2-data-324-y7qz">Netherlands</option>
                                                            <option data-kt-flag="flags/new-zealand.svg" value="NZ" data-select2-id="select2-data-325-skfd">New Zealand</option>
                                                            <option data-kt-flag="flags/nicaragua.svg" value="NI" data-select2-id="select2-data-326-45hc">Nicaragua</option>
                                                            <option data-kt-flag="flags/niger.svg" value="NE" data-select2-id="select2-data-327-84xf">Niger</option>
                                                            <option data-kt-flag="flags/nigeria.svg" value="NG" data-select2-id="select2-data-328-822c">Nigeria</option>
                                                            <option data-kt-flag="flags/niue.svg" value="NU" data-select2-id="select2-data-329-qqg5">Niue</option>
                                                            <option data-kt-flag="flags/norfolk-island.svg" value="NF" data-select2-id="select2-data-330-mfsp">Norfolk Island</option>
                                                            <option data-kt-flag="flags/northern-mariana-islands.svg" value="MP" data-select2-id="select2-data-331-m1gn">Northern Mariana Islands</option>
                                                            <option data-kt-flag="flags/norway.svg" value="NO" data-select2-id="select2-data-332-hpx3">Norway</option>
                                                            <option data-kt-flag="flags/oman.svg" value="OM" data-select2-id="select2-data-333-6h9j">Oman</option>
                                                            <option data-kt-flag="flags/pakistan.svg" value="PK" data-select2-id="select2-data-334-yy2o">Pakistan</option>
                                                            <option data-kt-flag="flags/palau.svg" value="PW" data-select2-id="select2-data-335-olc4">Palau</option>
                                                            <option data-kt-flag="flags/palestine.svg" value="PS" data-select2-id="select2-data-336-76t3">Palestinian Territory, Occupied</option>
                                                            <option data-kt-flag="flags/panama.svg" value="PA" data-select2-id="select2-data-337-eobo">Panama</option>
                                                            <option data-kt-flag="flags/papua-new-guinea.svg" value="PG" data-select2-id="select2-data-338-wwsd">Papua New Guinea</option>
                                                            <option data-kt-flag="flags/paraguay.svg" value="PY" data-select2-id="select2-data-339-18fl">Paraguay</option>
                                                            <option data-kt-flag="flags/peru.svg" value="PE" data-select2-id="select2-data-340-hoi5">Peru</option>
                                                            <option data-kt-flag="flags/philippines.svg" value="PH" data-select2-id="select2-data-341-oeip">Philippines</option>
                                                            <option data-kt-flag="flags/poland.svg" value="PL" data-select2-id="select2-data-342-9egs">Poland</option>
                                                            <option data-kt-flag="flags/portugal.svg" value="PT" data-select2-id="select2-data-343-5md4">Portugal</option>
                                                            <option data-kt-flag="flags/puerto-rico.svg" value="PR" data-select2-id="select2-data-344-qn7f">Puerto Rico</option>
                                                            <option data-kt-flag="flags/qatar.svg" value="QA" data-select2-id="select2-data-345-r4gm">Qatar</option>
                                                            <option data-kt-flag="flags/romania.svg" value="RO" data-select2-id="select2-data-346-w8cl">Romania</option>
                                                            <option data-kt-flag="flags/russia.svg" value="RU" data-select2-id="select2-data-347-erd3">Russian Federation</option>
                                                            <option data-kt-flag="flags/rwanda.svg" value="RW" data-select2-id="select2-data-348-ws1u">Rwanda</option>
                                                            <option data-kt-flag="flags/st-barts.svg" value="BL" data-select2-id="select2-data-349-nik5">Saint Barthélemy</option>
                                                            <option data-kt-flag="flags/saint-kitts-and-nevis.svg" value="KN" data-select2-id="select2-data-350-ofuz">Saint Kitts and Nevis</option>
                                                            <option data-kt-flag="flags/st-lucia.svg" value="LC" data-select2-id="select2-data-351-ti54">Saint Lucia</option>
                                                            <option data-kt-flag="flags/sint-maarten.svg" value="MF" data-select2-id="select2-data-352-xzby">Saint Martin (French part)</option>
                                                            <option data-kt-flag="flags/st-vincent-and-the-grenadines.svg" value="VC" data-select2-id="select2-data-353-hr4x">Saint Vincent and the Grenadines</option>
                                                            <option data-kt-flag="flags/samoa.svg" value="WS" data-select2-id="select2-data-354-pydh">Samoa</option>
                                                            <option data-kt-flag="flags/san-marino.svg" value="SM" data-select2-id="select2-data-355-eev2">San Marino</option>
                                                            <option data-kt-flag="flags/sao-tome-and-prince.svg" value="ST" data-select2-id="select2-data-356-idef">Sao Tome and Principe</option>
                                                            <option data-kt-flag="flags/saudi-arabia.svg" value="SA" data-select2-id="select2-data-357-b4yw">Saudi Arabia</option>
                                                            <option data-kt-flag="flags/senegal.svg" value="SN" data-select2-id="select2-data-358-5mmj">Senegal</option>
                                                            <option data-kt-flag="flags/serbia.svg" value="RS" data-select2-id="select2-data-359-zbbr">Serbia</option>
                                                            <option data-kt-flag="flags/seychelles.svg" value="SC" data-select2-id="select2-data-360-4x29">Seychelles</option>
                                                            <option data-kt-flag="flags/sierra-leone.svg" value="SL" data-select2-id="select2-data-361-taq2">Sierra Leone</option>
                                                            <option data-kt-flag="flags/singapore.svg" value="SG" data-select2-id="select2-data-362-h9bl">Singapore</option>
                                                            <option data-kt-flag="flags/sint-maarten.svg" value="SX" data-select2-id="select2-data-363-gk9e">Sint Maarten (Dutch part)</option>
                                                            <option data-kt-flag="flags/slovakia.svg" value="SK" data-select2-id="select2-data-364-hbst">Slovakia</option>
                                                            <option data-kt-flag="flags/slovenia.svg" value="SI" data-select2-id="select2-data-365-rhw8">Slovenia</option>
                                                            <option data-kt-flag="flags/solomon-islands.svg" value="SB" data-select2-id="select2-data-366-v7b8">Solomon Islands</option>
                                                            <option data-kt-flag="flags/somalia.svg" value="SO" data-select2-id="select2-data-367-fsuu">Somalia</option>
                                                            <option data-kt-flag="flags/south-africa.svg" value="ZA" data-select2-id="select2-data-368-3vj8">South Africa</option>
                                                            <option data-kt-flag="flags/south-korea.svg" value="KR" data-select2-id="select2-data-369-hhyk">South Korea</option>
                                                            <option data-kt-flag="flags/south-sudan.svg" value="SS" data-select2-id="select2-data-370-c3om">South Sudan</option>
                                                            <option data-kt-flag="flags/spain.svg" value="ES" data-select2-id="select2-data-371-5n6y">Spain</option>
                                                            <option data-kt-flag="flags/sri-lanka.svg" value="LK" data-select2-id="select2-data-372-je5b">Sri Lanka</option>
                                                            <option data-kt-flag="flags/sudan.svg" value="SD" data-select2-id="select2-data-373-91p0">Sudan</option>
                                                            <option data-kt-flag="flags/suriname.svg" value="SR" data-select2-id="select2-data-374-ooay">Suriname</option>
                                                            <option data-kt-flag="flags/swaziland.svg" value="SZ" data-select2-id="select2-data-375-k1nq">Swaziland</option>
                                                            <option data-kt-flag="flags/sweden.svg" value="SE" data-select2-id="select2-data-376-pvx9">Sweden</option>
                                                            <option data-kt-flag="flags/switzerland.svg" value="CH" data-select2-id="select2-data-377-6giu">Switzerland</option>
                                                            <option data-kt-flag="flags/syria.svg" value="SY" data-select2-id="select2-data-378-ig1e">Syrian Arab Republic</option>
                                                            <option data-kt-flag="flags/taiwan.svg" value="TW" data-select2-id="select2-data-379-aekw">Taiwan, Province of China</option>
                                                            <option data-kt-flag="flags/tajikistan.svg" value="TJ" data-select2-id="select2-data-380-c12t">Tajikistan</option>
                                                            <option data-kt-flag="flags/tanzania.svg" value="TZ" data-select2-id="select2-data-381-l9p1">Tanzania, United Republic of</option>
                                                            <option data-kt-flag="flags/thailand.svg" value="TH" data-select2-id="select2-data-382-d7sa">Thailand</option>
                                                            <option data-kt-flag="flags/togo.svg" value="TG" data-select2-id="select2-data-383-c2tc">Togo</option>
                                                            <option data-kt-flag="flags/tokelau.svg" value="TK" data-select2-id="select2-data-384-sp9n">Tokelau</option>
                                                            <option data-kt-flag="flags/tonga.svg" value="TO" data-select2-id="select2-data-385-9xiz">Tonga</option>
                                                            <option data-kt-flag="flags/trinidad-and-tobago.svg" value="TT" data-select2-id="select2-data-386-iddo">Trinidad and Tobago</option>
                                                            <option data-kt-flag="flags/tunisia.svg" value="TN" data-select2-id="select2-data-387-f3f9">Tunisia</option>
                                                            <option data-kt-flag="flags/turkey.svg" value="TR" data-select2-id="select2-data-388-bq06">Turkey</option>
                                                            <option data-kt-flag="flags/turkmenistan.svg" value="TM" data-select2-id="select2-data-389-ri3s">Turkmenistan</option>
                                                            <option data-kt-flag="flags/turks-and-caicos.svg" value="TC" data-select2-id="select2-data-390-t62q">Turks and Caicos Islands</option>
                                                            <option data-kt-flag="flags/tuvalu.svg" value="TV" data-select2-id="select2-data-391-gqu4">Tuvalu</option>
                                                            <option data-kt-flag="flags/uganda.svg" value="UG" data-select2-id="select2-data-392-ugsb">Uganda</option>
                                                            <option data-kt-flag="flags/ukraine.svg" value="UA" data-select2-id="select2-data-393-czm3">Ukraine</option>
                                                            <option data-kt-flag="flags/united-arab-emirates.svg" value="AE" data-select2-id="select2-data-394-1hb5">United Arab Emirates</option>
                                                            <option data-kt-flag="flags/united-kingdom.svg" value="GB" data-select2-id="select2-data-395-jvs3">United Kingdom</option>
                                                            <option data-kt-flag="flags/united-states.svg" value="US" data-select2-id="select2-data-396-517v">United States</option>
                                                            <option data-kt-flag="flags/uruguay.svg" value="UY" data-select2-id="select2-data-397-xcvq">Uruguay</option>
                                                            <option data-kt-flag="flags/uzbekistan.svg" value="UZ" data-select2-id="select2-data-398-nqbi">Uzbekistan</option>
                                                            <option data-kt-flag="flags/vanuatu.svg" value="VU" data-select2-id="select2-data-399-xahm">Vanuatu</option>
                                                            <option data-kt-flag="flags/venezuela.svg" value="VE" data-select2-id="select2-data-400-yrcz">Venezuela, Bolivarian Republic of</option>
                                                            <option data-kt-flag="flags/vietnam.svg" value="VN" data-select2-id="select2-data-401-reu0">Vietnam</option>
                                                            <option data-kt-flag="flags/virgin-islands.svg" value="VI" data-select2-id="select2-data-402-wx5v">Virgin Islands</option>
                                                            <option data-kt-flag="flags/yemen.svg" value="YE" data-select2-id="select2-data-403-f8mv">Yemen</option>
                                                            <option data-kt-flag="flags/zambia.svg" value="ZM" data-select2-id="select2-data-404-025j">Zambia</option>
                                                            <option data-kt-flag="flags/zimbabwe.svg" value="ZW" data-select2-id="select2-data-405-e4yz">Zimbabwe</option>
                                                    </select><span class="select2 select2-container select2-container--bootstrap5 select2-container--below" dir="ltr" data-select2-id="select2-data-10-mo7s" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single form-select form-select-solid form-select-lg fw-semibold" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-country-ip-container" aria-controls="select2-country-ip-container"><span class="select2-selection__rendered" id="select2-country-ip-container" role="textbox" aria-readonly="true" title="Select a country..."><span class="select2-selection__placeholder">Select a country...</span></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                    <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div></div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->

                <!--begin::Input group-->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">Language</label>
                    <!--end::Label-->

                    <!--begin::Col-->
                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                        <!--begin::Input-->
                        <select name="language" aria-label="Select a Language" data-control="select2" data-placeholder="Select a language..." class="form-select form-select-solid form-select-lg select2-hidden-accessible" data-select2-id="select2-data-12-sl02" tabindex="-1" aria-hidden="true" data-kt-initialized="1">
                            <option value="" data-select2-id="select2-data-14-vhz3">Select a Language...</option>
                                                            <option data-kt-flag="flags/indonesia.svg" value="id" data-select2-id="select2-data-135-vl4r">Bahasa Indonesia - Indonesian</option>
                                                            <option data-kt-flag="flags/malaysia.svg" value="msa" data-select2-id="select2-data-136-n11n">Bahasa Melayu - Malay</option>
                                                            <option data-kt-flag="flags/canada.svg" value="ca" data-select2-id="select2-data-137-w559">Català - Catalan</option>
                                                            <option data-kt-flag="flags/czech-republic.svg" value="cs" data-select2-id="select2-data-138-hnre">Čeština - Czech</option>
                                                            <option data-kt-flag="flags/netherlands.svg" value="da" data-select2-id="select2-data-139-jpn0">Dansk - Danish</option>
                                                            <option data-kt-flag="flags/germany.svg" value="de" data-select2-id="select2-data-140-y53f">Deutsch - German</option>
                                                            <option data-kt-flag="flags/united-kingdom.svg" value="en" data-select2-id="select2-data-141-35je">English</option>
                                                            <option data-kt-flag="flags/united-kingdom.svg" value="en-gb" data-select2-id="select2-data-142-iuvj">English UK - British English</option>
                                                            <option data-kt-flag="flags/spain.svg" value="es" data-select2-id="select2-data-143-htzj">Español - Spanish</option>
                                                            <option data-kt-flag="flags/philippines.svg" value="fil" data-select2-id="select2-data-144-dy1l">Filipino</option>
                                                            <option data-kt-flag="flags/france.svg" value="fr" data-select2-id="select2-data-145-wah6">Français - French</option>
                                                            <option data-kt-flag="flags/gabon.svg" value="ga" data-select2-id="select2-data-146-08nj">Gaeilge - Irish (beta)</option>
                                                            <option data-kt-flag="flags/greenland.svg" value="gl" data-select2-id="select2-data-147-ng7z">Galego - Galician (beta)</option>
                                                            <option data-kt-flag="flags/croatia.svg" value="hr" data-select2-id="select2-data-148-glbe">Hrvatski - Croatian</option>
                                                            <option data-kt-flag="flags/italy.svg" value="it" data-select2-id="select2-data-149-rbxz">Italiano - Italian</option>
                                                            <option data-kt-flag="flags/hungary.svg" value="hu" data-select2-id="select2-data-150-o0lz">Magyar - Hungarian</option>
                                                            <option data-kt-flag="flags/netherlands.svg" value="nl" data-select2-id="select2-data-151-dey1">Nederlands - Dutch</option>
                                                            <option data-kt-flag="flags/norway.svg" value="no" data-select2-id="select2-data-152-f8b5">Norsk - Norwegian</option>
                                                            <option data-kt-flag="flags/poland.svg" value="pl" data-select2-id="select2-data-153-xxk1">Polski - Polish</option>
                                                            <option data-kt-flag="flags/portugal.svg" value="pt" data-select2-id="select2-data-154-htau">Português - Portuguese</option>
                                                            <option data-kt-flag="flags/romania.svg" value="ro" data-select2-id="select2-data-155-j6x0">Română - Romanian</option>
                                                            <option data-kt-flag="flags/slovakia.svg" value="sk" data-select2-id="select2-data-156-czs9">Slovenčina - Slovak</option>
                                                            <option data-kt-flag="flags/finland.svg" value="fi" data-select2-id="select2-data-157-swb0">Suomi - Finnish</option>
                                                            <option data-kt-flag="flags/el-salvador.svg" value="sv" data-select2-id="select2-data-158-4uuy">Svenska - Swedish</option>
                                                            <option data-kt-flag="flags/virgin-islands.svg" value="vi" data-select2-id="select2-data-159-90lu">Tiếng Việt - Vietnamese</option>
                                                            <option data-kt-flag="flags/turkey.svg" value="tr" data-select2-id="select2-data-160-hndw">Türkçe - Turkish</option>
                                                            <option data-kt-flag="flags/greece.svg" value="el" data-select2-id="select2-data-161-i0o7">Ελληνικά - Greek</option>
                                                            <option data-kt-flag="flags/bulgaria.svg" value="bg" data-select2-id="select2-data-162-7oen">Български език - Bulgarian</option>
                                                            <option data-kt-flag="flags/russia.svg" value="ru" data-select2-id="select2-data-163-2enr">Русский - Russian</option>
                                                            <option data-kt-flag="flags/suriname.svg" value="sr" data-select2-id="select2-data-164-1uy4">Српски - Serbian</option>
                                                            <option data-kt-flag="flags/ukraine.svg" value="uk" data-select2-id="select2-data-165-zizv">Українська мова - Ukrainian</option>
                                                            <option data-kt-flag="flags/israel.svg" value="he" data-select2-id="select2-data-166-5b20">עִבְרִית - Hebrew</option>
                                                            <option data-kt-flag="flags/pakistan.svg" value="ur" data-select2-id="select2-data-167-mltn">اردو - Urdu (beta)</option>
                                                            <option data-kt-flag="flags/argentina.svg" value="ar" data-select2-id="select2-data-168-ta7e">العربية - Arabic</option>
                                                            <option data-kt-flag="flags/argentina.svg" value="fa" data-select2-id="select2-data-169-sinj">فارسی - Persian</option>
                                                            <option data-kt-flag="flags/mauritania.svg" value="mr" data-select2-id="select2-data-170-9k71">मराठी - Marathi</option>
                                                            <option data-kt-flag="flags/india.svg" value="hi" data-select2-id="select2-data-171-9385">हिन्दी - Hindi</option>
                                                            <option data-kt-flag="flags/bangladesh.svg" value="bn" data-select2-id="select2-data-172-wylt">বাংলা - Bangla</option>
                                                            <option data-kt-flag="flags/guam.svg" value="gu" data-select2-id="select2-data-173-4p1h">ગુજરાતી - Gujarati</option>
                                                            <option data-kt-flag="flags/india.svg" value="ta" data-select2-id="select2-data-174-gn35">தமிழ் - Tamil</option>
                                                            <option data-kt-flag="flags/saint-kitts-and-nevis.svg" value="kn" data-select2-id="select2-data-175-lb0y">ಕನ್ನಡ - Kannada</option>
                                                            <option data-kt-flag="flags/thailand.svg" value="th" data-select2-id="select2-data-176-jss6">ภาษาไทย - Thai</option>
                                                            <option data-kt-flag="flags/south-korea.svg" value="ko" data-select2-id="select2-data-177-l8ye">한국어 - Korean</option>
                                                            <option data-kt-flag="flags/japan.svg" value="ja" data-select2-id="select2-data-178-9e2f">日本語 - Japanese</option>
                                                            <option data-kt-flag="flags/china.svg" value="zh-cn" data-select2-id="select2-data-179-49yd">简体中文 - Simplified Chinese</option>
                                                            <option data-kt-flag="flags/taiwan.svg" value="zh-tw" data-select2-id="select2-data-180-69av">繁體中文 - Traditional Chinese</option>
                                                    </select><span class="select2 select2-container select2-container--bootstrap5 select2-container--below" dir="ltr" data-select2-id="select2-data-13-r9bl" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single form-select form-select-solid form-select-lg" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-language-te-container" aria-controls="select2-language-te-container"><span class="select2-selection__rendered" id="select2-language-te-container" role="textbox" aria-readonly="true" title="Select a language..."><span class="select2-selection__placeholder">Select a language...</span></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                        <!--end::Input-->

                        <!--begin::Hint-->
                        <div class="form-text">
                            Please select a preferred language, including date, time, and number formatting.
                        </div>
                        <!--end::Hint-->
                    <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div></div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->

                <!--begin::Input group-->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">Time Zone</label>
                    <!--end::Label-->

                    <!--begin::Col-->
                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                        <select name="timezone" aria-label="Select a Timezone" data-control="select2" data-placeholder="Select a timezone.." class="form-select form-select-solid form-select-lg select2-hidden-accessible" data-select2-id="select2-data-15-838s" tabindex="-1" aria-hidden="true" data-kt-initialized="1">
                            <option value="" data-select2-id="select2-data-17-43zn">Select a Timezone..</option>
                                                            <option data-bs-offset="-39600" value="International Date Line West">(GMT-11:00) International Date Line West</option>
                                                            <option data-bs-offset="-39600" value="Midway Island">(GMT-11:00) Midway Island</option>
                                                            <option data-bs-offset="-39600" value="Samoa">(GMT-11:00) Samoa</option>
                                                            <option data-bs-offset="-36000" value="Hawaii">(GMT-10:00) Hawaii</option>
                                                            <option data-bs-offset="-28800" value="Alaska">(GMT-08:00) Alaska</option>
                                                            <option data-bs-offset="-25200" value="Pacific Time (US &amp; Canada)">(GMT-07:00) Pacific Time (US &amp; Canada)</option>
                                                            <option data-bs-offset="-25200" value="Tijuana">(GMT-07:00) Tijuana</option>
                                                            <option data-bs-offset="-25200" value="Arizona">(GMT-07:00) Arizona</option>
                                                            <option data-bs-offset="-21600" value="Mountain Time (US &amp; Canada)">(GMT-06:00) Mountain Time (US &amp; Canada)</option>
                                                            <option data-bs-offset="-21600" value="Chihuahua">(GMT-06:00) Chihuahua</option>
                                                            <option data-bs-offset="-21600" value="Mazatlan">(GMT-06:00) Mazatlan</option>
                                                            <option data-bs-offset="-21600" value="Saskatchewan">(GMT-06:00) Saskatchewan</option>
                                                            <option data-bs-offset="-21600" value="Central America">(GMT-06:00) Central America</option>
                                                            <option data-bs-offset="-18000" value="Central Time (US &amp; Canada)">(GMT-05:00) Central Time (US &amp; Canada)</option>
                                                            <option data-bs-offset="-18000" value="Guadalajara">(GMT-05:00) Guadalajara</option>
                                                            <option data-bs-offset="-18000" value="Mexico City">(GMT-05:00) Mexico City</option>
                                                            <option data-bs-offset="-18000" value="Monterrey">(GMT-05:00) Monterrey</option>
                                                            <option data-bs-offset="-18000" value="Bogota">(GMT-05:00) Bogota</option>
                                                            <option data-bs-offset="-18000" value="Lima">(GMT-05:00) Lima</option>
                                                            <option data-bs-offset="-18000" value="Quito">(GMT-05:00) Quito</option>
                                                            <option data-bs-offset="-14400" value="Eastern Time (US &amp; Canada)">(GMT-04:00) Eastern Time (US &amp; Canada)</option>
                                                            <option data-bs-offset="-14400" value="Indiana (East)">(GMT-04:00) Indiana (East)</option>
                                                            <option data-bs-offset="-14400" value="Caracas">(GMT-04:00) Caracas</option>
                                                            <option data-bs-offset="-14400" value="La Paz">(GMT-04:00) La Paz</option>
                                                            <option data-bs-offset="-14400" value="Georgetown">(GMT-04:00) Georgetown</option>
                                                            <option data-bs-offset="-10800" value="Atlantic Time (Canada)">(GMT-03:00) Atlantic Time (Canada)</option>
                                                            <option data-bs-offset="-10800" value="Santiago">(GMT-03:00) Santiago</option>
                                                            <option data-bs-offset="-10800" value="Brasilia">(GMT-03:00) Brasilia</option>
                                                            <option data-bs-offset="-10800" value="Buenos Aires">(GMT-03:00) Buenos Aires</option>
                                                            <option data-bs-offset="-9000" value="Newfoundland">(GMT-02:30) Newfoundland</option>
                                                            <option data-bs-offset="-7200" value="Greenland">(GMT-02:00) Greenland</option>
                                                            <option data-bs-offset="-7200" value="Mid-Atlantic">(GMT-02:00) Mid-Atlantic</option>
                                                            <option data-bs-offset="-3600" value="Cape Verde Is.">(GMT-01:00) Cape Verde Is.</option>
                                                            <option data-bs-offset="0" value="Azores">(GMT) Azores</option>
                                                            <option data-bs-offset="0" value="Monrovia">(GMT) Monrovia</option>
                                                            <option data-bs-offset="0" value="UTC">(GMT) UTC</option>
                                                            <option data-bs-offset="3600" value="Dublin">(GMT+01:00) Dublin</option>
                                                            <option data-bs-offset="3600" value="Edinburgh">(GMT+01:00) Edinburgh</option>
                                                            <option data-bs-offset="3600" value="Lisbon">(GMT+01:00) Lisbon</option>
                                                            <option data-bs-offset="3600" value="London">(GMT+01:00) London</option>
                                                            <option data-bs-offset="3600" value="Casablanca">(GMT+01:00) Casablanca</option>
                                                            <option data-bs-offset="3600" value="West Central Africa">(GMT+01:00) West Central Africa</option>
                                                            <option data-bs-offset="7200" value="Belgrade">(GMT+02:00) Belgrade</option>
                                                            <option data-bs-offset="7200" value="Bratislava">(GMT+02:00) Bratislava</option>
                                                            <option data-bs-offset="7200" value="Budapest">(GMT+02:00) Budapest</option>
                                                            <option data-bs-offset="7200" value="Ljubljana">(GMT+02:00) Ljubljana</option>
                                                            <option data-bs-offset="7200" value="Prague">(GMT+02:00) Prague</option>
                                                            <option data-bs-offset="7200" value="Sarajevo">(GMT+02:00) Sarajevo</option>
                                                            <option data-bs-offset="7200" value="Skopje">(GMT+02:00) Skopje</option>
                                                            <option data-bs-offset="7200" value="Warsaw">(GMT+02:00) Warsaw</option>
                                                            <option data-bs-offset="7200" value="Zagreb">(GMT+02:00) Zagreb</option>
                                                            <option data-bs-offset="7200" value="Brussels">(GMT+02:00) Brussels</option>
                                                            <option data-bs-offset="7200" value="Copenhagen">(GMT+02:00) Copenhagen</option>
                                                            <option data-bs-offset="7200" value="Madrid">(GMT+02:00) Madrid</option>
                                                            <option data-bs-offset="7200" value="Paris">(GMT+02:00) Paris</option>
                                                            <option data-bs-offset="7200" value="Amsterdam">(GMT+02:00) Amsterdam</option>
                                                            <option data-bs-offset="7200" value="Berlin">(GMT+02:00) Berlin</option>
                                                            <option data-bs-offset="7200" value="Bern">(GMT+02:00) Bern</option>
                                                            <option data-bs-offset="7200" value="Rome">(GMT+02:00) Rome</option>
                                                            <option data-bs-offset="7200" value="Stockholm">(GMT+02:00) Stockholm</option>
                                                            <option data-bs-offset="7200" value="Vienna">(GMT+02:00) Vienna</option>
                                                            <option data-bs-offset="7200" value="Cairo">(GMT+02:00) Cairo</option>
                                                            <option data-bs-offset="7200" value="Harare">(GMT+02:00) Harare</option>
                                                            <option data-bs-offset="7200" value="Pretoria">(GMT+02:00) Pretoria</option>
                                                            <option data-bs-offset="10800" value="Bucharest">(GMT+03:00) Bucharest</option>
                                                            <option data-bs-offset="10800" value="Helsinki">(GMT+03:00) Helsinki</option>
                                                            <option data-bs-offset="10800" value="Kiev">(GMT+03:00) Kiev</option>
                                                            <option data-bs-offset="10800" value="Kyiv">(GMT+03:00) Kyiv</option>
                                                            <option data-bs-offset="10800" value="Riga">(GMT+03:00) Riga</option>
                                                            <option data-bs-offset="10800" value="Sofia">(GMT+03:00) Sofia</option>
                                                            <option data-bs-offset="10800" value="Tallinn">(GMT+03:00) Tallinn</option>
                                                            <option data-bs-offset="10800" value="Vilnius">(GMT+03:00) Vilnius</option>
                                                            <option data-bs-offset="10800" value="Athens">(GMT+03:00) Athens</option>
                                                            <option data-bs-offset="10800" value="Istanbul">(GMT+03:00) Istanbul</option>
                                                            <option data-bs-offset="10800" value="Minsk">(GMT+03:00) Minsk</option>
                                                            <option data-bs-offset="10800" value="Jerusalem">(GMT+03:00) Jerusalem</option>
                                                            <option data-bs-offset="10800" value="Moscow">(GMT+03:00) Moscow</option>
                                                            <option data-bs-offset="10800" value="St. Petersburg">(GMT+03:00) St. Petersburg</option>
                                                            <option data-bs-offset="10800" value="Volgograd">(GMT+03:00) Volgograd</option>
                                                            <option data-bs-offset="10800" value="Kuwait">(GMT+03:00) Kuwait</option>
                                                            <option data-bs-offset="10800" value="Riyadh">(GMT+03:00) Riyadh</option>
                                                            <option data-bs-offset="10800" value="Nairobi">(GMT+03:00) Nairobi</option>
                                                            <option data-bs-offset="10800" value="Baghdad">(GMT+03:00) Baghdad</option>
                                                            <option data-bs-offset="14400" value="Abu Dhabi">(GMT+04:00) Abu Dhabi</option>
                                                            <option data-bs-offset="14400" value="Muscat">(GMT+04:00) Muscat</option>
                                                            <option data-bs-offset="14400" value="Baku">(GMT+04:00) Baku</option>
                                                            <option data-bs-offset="14400" value="Tbilisi">(GMT+04:00) Tbilisi</option>
                                                            <option data-bs-offset="14400" value="Yerevan">(GMT+04:00) Yerevan</option>
                                                            <option data-bs-offset="16200" value="Tehran">(GMT+04:30) Tehran</option>
                                                            <option data-bs-offset="16200" value="Kabul">(GMT+04:30) Kabul</option>
                                                            <option data-bs-offset="18000" value="Ekaterinburg">(GMT+05:00) Ekaterinburg</option>
                                                            <option data-bs-offset="18000" value="Islamabad">(GMT+05:00) Islamabad</option>
                                                            <option data-bs-offset="18000" value="Karachi">(GMT+05:00) Karachi</option>
                                                            <option data-bs-offset="18000" value="Tashkent">(GMT+05:00) Tashkent</option>
                                                            <option data-bs-offset="19800" value="Chennai">(GMT+05:30) Chennai</option>
                                                            <option data-bs-offset="19800" value="Kolkata">(GMT+05:30) Kolkata</option>
                                                            <option data-bs-offset="19800" value="Mumbai">(GMT+05:30) Mumbai</option>
                                                            <option data-bs-offset="19800" value="New Delhi">(GMT+05:30) New Delhi</option>
                                                            <option data-bs-offset="19800" value="Sri Jayawardenepura">(GMT+05:30) Sri Jayawardenepura</option>
                                                            <option data-bs-offset="20700" value="Kathmandu">(GMT+05:45) Kathmandu</option>
                                                            <option data-bs-offset="21600" value="Astana">(GMT+06:00) Astana</option>
                                                            <option data-bs-offset="21600" value="Dhaka">(GMT+06:00) Dhaka</option>
                                                            <option data-bs-offset="21600" value="Almaty">(GMT+06:00) Almaty</option>
                                                            <option data-bs-offset="21600" value="Urumqi">(GMT+06:00) Urumqi</option>
                                                            <option data-bs-offset="23400" value="Rangoon">(GMT+06:30) Rangoon</option>
                                                            <option data-bs-offset="25200" value="Novosibirsk">(GMT+07:00) Novosibirsk</option>
                                                            <option data-bs-offset="25200" value="Bangkok">(GMT+07:00) Bangkok</option>
                                                            <option data-bs-offset="25200" value="Hanoi">(GMT+07:00) Hanoi</option>
                                                            <option data-bs-offset="25200" value="Jakarta">(GMT+07:00) Jakarta</option>
                                                            <option data-bs-offset="25200" value="Krasnoyarsk">(GMT+07:00) Krasnoyarsk</option>
                                                            <option data-bs-offset="28800" value="Beijing">(GMT+08:00) Beijing</option>
                                                            <option data-bs-offset="28800" value="Chongqing">(GMT+08:00) Chongqing</option>
                                                            <option data-bs-offset="28800" value="Hong Kong">(GMT+08:00) Hong Kong</option>
                                                            <option data-bs-offset="28800" value="Kuala Lumpur">(GMT+08:00) Kuala Lumpur</option>
                                                            <option data-bs-offset="28800" value="Singapore">(GMT+08:00) Singapore</option>
                                                            <option data-bs-offset="28800" value="Taipei">(GMT+08:00) Taipei</option>
                                                            <option data-bs-offset="28800" value="Perth">(GMT+08:00) Perth</option>
                                                            <option data-bs-offset="28800" value="Irkutsk">(GMT+08:00) Irkutsk</option>
                                                            <option data-bs-offset="28800" value="Ulaan Bataar">(GMT+08:00) Ulaan Bataar</option>
                                                            <option data-bs-offset="32400" value="Seoul">(GMT+09:00) Seoul</option>
                                                            <option data-bs-offset="32400" value="Osaka">(GMT+09:00) Osaka</option>
                                                            <option data-bs-offset="32400" value="Sapporo">(GMT+09:00) Sapporo</option>
                                                            <option data-bs-offset="32400" value="Tokyo">(GMT+09:00) Tokyo</option>
                                                            <option data-bs-offset="32400" value="Yakutsk">(GMT+09:00) Yakutsk</option>
                                                            <option data-bs-offset="34200" value="Darwin">(GMT+09:30) Darwin</option>
                                                            <option data-bs-offset="34200" value="Adelaide">(GMT+09:30) Adelaide</option>
                                                            <option data-bs-offset="36000" value="Canberra">(GMT+10:00) Canberra</option>
                                                            <option data-bs-offset="36000" value="Melbourne">(GMT+10:00) Melbourne</option>
                                                            <option data-bs-offset="36000" value="Sydney">(GMT+10:00) Sydney</option>
                                                            <option data-bs-offset="36000" value="Brisbane">(GMT+10:00) Brisbane</option>
                                                            <option data-bs-offset="36000" value="Hobart">(GMT+10:00) Hobart</option>
                                                            <option data-bs-offset="36000" value="Vladivostok">(GMT+10:00) Vladivostok</option>
                                                            <option data-bs-offset="36000" value="Guam">(GMT+10:00) Guam</option>
                                                            <option data-bs-offset="36000" value="Port Moresby">(GMT+10:00) Port Moresby</option>
                                                            <option data-bs-offset="36000" value="Solomon Is.">(GMT+10:00) Solomon Is.</option>
                                                            <option data-bs-offset="39600" value="Magadan">(GMT+11:00) Magadan</option>
                                                            <option data-bs-offset="39600" value="New Caledonia">(GMT+11:00) New Caledonia</option>
                                                            <option data-bs-offset="43200" value="Fiji">(GMT+12:00) Fiji</option>
                                                            <option data-bs-offset="43200" value="Kamchatka">(GMT+12:00) Kamchatka</option>
                                                            <option data-bs-offset="43200" value="Marshall Is.">(GMT+12:00) Marshall Is.</option>
                                                            <option data-bs-offset="43200" value="Auckland">(GMT+12:00) Auckland</option>
                                                            <option data-bs-offset="43200" value="Wellington">(GMT+12:00) Wellington</option>
                                                            <option data-bs-offset="46800" value="Nuku'alofa">(GMT+13:00) Nuku'alofa</option>
                                                    </select><span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-16-m75k" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single form-select form-select-solid form-select-lg" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-timezone-c5-container" aria-controls="select2-timezone-c5-container"><span class="select2-selection__rendered" id="select2-timezone-c5-container" role="textbox" aria-readonly="true" title="Select a timezone.."><span class="select2-selection__placeholder">Select a timezone..</span></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                    <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div></div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->

                <!--begin::Input group-->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label  fw-semibold fs-6">Currency</label>
                    <!--end::Label-->

                    <!--begin::Col-->
                    <div class="col-lg-8 fv-row">
                        <select name="currnecy" aria-label="Select a Currency" data-control="select2" data-placeholder="Select a currency.." class="form-select form-select-solid form-select-lg select2-hidden-accessible" data-select2-id="select2-data-18-wcj0" tabindex="-1" aria-hidden="true" data-kt-initialized="1">
                            <option value="" data-select2-id="select2-data-20-tzza">Select a currency..</option>
                                                            <option data-kt-flag="flags/united-states.svg" value="USD">USD&nbsp;-&nbsp;USA dollar</option>
                                                            <option data-kt-flag="flags/united-kingdom.svg" value="GBP">GBP&nbsp;-&nbsp;British pound</option>
                                                            <option data-kt-flag="flags/australia.svg" value="AUD">AUD&nbsp;-&nbsp;Australian dollar</option>
                                                            <option data-kt-flag="flags/japan.svg" value="JPY">JPY&nbsp;-&nbsp;Japanese yen</option>
                                                            <option data-kt-flag="flags/sweden.svg" value="SEK">SEK&nbsp;-&nbsp;Swedish krona</option>
                                                            <option data-kt-flag="flags/canada.svg" value="CAD">CAD&nbsp;-&nbsp;Canadian dollar</option>
                                                            <option data-kt-flag="flags/switzerland.svg" value="CHF">CHF&nbsp;-&nbsp;Swiss franc</option>
                                                    </select><span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-19-nldo" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single form-select form-select-solid form-select-lg" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-currnecy-ax-container" aria-controls="select2-currnecy-ax-container"><span class="select2-selection__rendered" id="select2-currnecy-ax-container" role="textbox" aria-readonly="true" title="Select a currency.."><span class="select2-selection__placeholder">Select a currency..</span></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->

                <!--begin::Input group-->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">Communication</label>
                    <!--end::Label-->

                    <!--begin::Col-->
                    <div class="col-lg-8 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
                        <!--begin::Options-->
                        <div class="d-flex align-items-center mt-3">
                            <!--begin::Option-->
                            <label class="form-check form-check-custom form-check-inline form-check-solid me-5 is-valid">
                                <input class="form-check-input" name="communication[]" type="checkbox" value="1">
                                <span class="fw-semibold ps-2 fs-6">
                                    Email
                                </span>
                            </label>
                            <!--end::Option-->

                            <!--begin::Option-->
                            <label class="form-check form-check-custom form-check-inline form-check-solid is-invalid">
                                <input class="form-check-input" name="communication[]" type="checkbox" value="2">
                                <span class="fw-semibold ps-2 fs-6">
                                    Phone
                                </span>
                            </label>
                            <!--end::Option-->
                        </div>
                        <!--end::Options-->
                    <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"><div data-field="communication[]" data-validator="notEmpty">Please select at least one communication method</div></div></div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->

                <!--begin::Input group-->
                <div class="row mb-0">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label fw-semibold fs-6">Allow Marketing</label>
                    <!--begin::Label-->

                    <!--begin::Label-->
                    <div class="col-lg-8 d-flex align-items-center">
                        <div class="form-check form-check-solid form-switch form-check-custom fv-row">
                            <input class="form-check-input w-45px h-30px" type="checkbox" id="allowmarketing" checked="">
                            <label class="form-check-label" for="allowmarketing"></label>
                        </div>
                    </div>
                    <!--begin::Label-->
                </div>
                <!--end::Input group-->
            </div>
            <!--end::Card body-->

            <!--begin::Actions-->
            <div class="card-footer d-flex justify-content-end py-6 px-9">
                <button type="reset" class="btn btn-light btn-active-light-primary me-2" fdprocessedid="72sjfq">Discard</button>
                <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit" fdprocessedid="zsdt5">Save Changes</button>
            </div>
            <!--end::Actions-->
        <input type="hidden"></form>
        <!--end::Form-->
    </div>
    <!--end::Content-->
</div>
@endsection