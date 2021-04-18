@inject('request', 'Illuminate\Http\Request')
<!-- Left side column. contains the sidebar -->
@if(Auth::user()->role[0]->title!=='Subscriber')
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <ul class="sidebar-menu">

                {{--            <li>--}}
                {{--                <a href="{{ url('/dashboard') }}">--}}
                {{--                    <i class="fa fa-wrench"></i>--}}
                {{--                    <span class="title">@lang('quickadmin.qa_dashboard')</span>--}}
                {{--                </a>--}}
                {{--            </li>--}}
                @if(Auth::user()->role[0]->title!=='Subscriber')
                    <li v-if="$can('user_access')">
                        <router-link :to="{ name: 'users.index' }">
                            <i class="fa fa-user"></i>
                            <span>@lang('quickadmin.users.title')</span>
                        </router-link>
                    </li>
                    {{--            <li class="treeview" v-if="$can('user_management_access')">--}}
                    {{--                <a href="#">--}}
                    {{--                    <i class="fa fa-users"></i>--}}
                    {{--                    <span>@lang('quickadmin.user-management.title')</span>--}}
                    {{--                    <span class="pull-right-container">--}}
                    {{--                        <i class="fa fa-angle-left pull-right"></i>--}}
                    {{--                    </span>--}}
                    {{--                </a>--}}
                    {{--                <ul class="treeview-menu">--}}
                    {{--                    <li v-if="$can('permission_access')">--}}
                    {{--                        <router-link :to="{ name: 'permissions.index' }">--}}
                    {{--                            <i class="fa fa-briefcase"></i>--}}
                    {{--                            <span>@lang('quickadmin.permissions.title')</span>--}}
                    {{--                        </router-link>--}}
                    {{--                    </li>--}}
                    {{--                    <li v-if="$can('role_access')">--}}
                    {{--                        <router-link :to="{ name: 'roles.index' }">--}}
                    {{--                            <i class="fa fa-briefcase"></i>--}}
                    {{--                            <span>@lang('quickadmin.roles.title')</span>--}}
                    {{--                        </router-link>--}}
                    {{--                    </li>--}}
                    {{--                    <li v-if="$can('user_access')">--}}
                    {{--                        <router-link :to="{ name: 'users.index' }">--}}
                    {{--                            <i class="fa fa-user"></i>--}}
                    {{--                            <span>@lang('quickadmin.users.title')</span>--}}
                    {{--                        </router-link>--}}
                    {{--                    </li>--}}
                    {{--                </ul>--}}
                    {{--            </li>--}}
                    {{--            <li v-if="$can('usernotification_access')">--}}
                    {{--                <router-link :to="{ name: 'usernotifications.index' }">--}}
                    {{--                    <i class="fa fa-gears"></i>--}}
                    {{--                    <span>@lang('quickadmin.usernotifications.title')</span>--}}
                    {{--                </router-link>--}}
                    {{--            </li>--}}
                    {{--            <li v-if="$can('country_access')">--}}
                    {{--                <router-link :to="{ name: 'countries.index' }">--}}
                    {{--                    <i class="fa fa-gears"></i>--}}
                    {{--                    <span>@lang('quickadmin.country.title')</span>--}}
                    {{--                </router-link>--}}
                    {{--            </li>--}}
                    {{--            <li v-if="$can('state_access')">--}}
                    {{--                <router-link :to="{ name: 'states.index' }">--}}
                    {{--                    <i class="fa fa-gears"></i>--}}
                    {{--                    <span>@lang('quickadmin.state.title')</span>--}}
                    {{--                </router-link>--}}
                    {{--            </li>--}}
                    {{--            <li v-if="$can('city_access')">--}}
                    {{--                <router-link :to="{ name: 'cities.index' }">--}}
                    {{--                    <i class="fa fa-gears"></i>--}}
                    {{--                    <span>@lang('quickadmin.city.title')</span>--}}
                    {{--                </router-link>--}}
                    {{--            </li>--}}
                    {{--            <li v-if="$can('countrydatum_access')">--}}
                    {{--                <router-link :to="{ name: 'countrydatas.index' }">--}}
                    {{--                    <i class="fa fa-gears"></i>--}}
                    {{--                    <span>@lang('quickadmin.countrydata.title')</span>--}}
                    {{--                </router-link>--}}
                    {{--            </li>--}}
                    {{--            <li v-if="$can('citydatum_access')">--}}
                    {{--                <router-link :to="{ name: 'citydatas.index' }">--}}
                    {{--                    <i class="fa fa-gears"></i>--}}
                    {{--                    <span>@lang('quickadmin.citydata.title')</span>--}}
                    {{--                </router-link>--}}
                    {{--            </li>--}}
                    {{--            <li v-if="$can('countrylanguage_access')">--}}
                    {{--                <router-link :to="{ name: 'countrylanguages.index' }">--}}
                    {{--                    <i class="fa fa-gears"></i>--}}
                    {{--                    <span>@lang('quickadmin.countrylanguage.title')</span>--}}
                    {{--                </router-link>--}}
                    {{--            </li>--}}
                                <li v-if="$can('question_access')">
                                    <router-link :to="{ name: 'questions.index' }">
                                        <i class="fa fa-handshake-o"></i>
                                        <span>Compatibility Questions</span>
                                    </router-link>
                                </li>
                                <li v-if="$can('personalityquestion_access')">
                                    <router-link :to="{ name: 'personalityquestions.index' }">
                                        <i class="fa fa-users"></i>
                                        <span>Personality Questions</span>
                                    </router-link>
                                </li>
                    {{--            <li v-if="$can('questionoption_access')">--}}
                    {{--                <router-link :to="{ name: 'questionoptions.index' }">--}}
                    {{--                    <i class="fa fa-gears"></i>--}}
                    {{--                    <span>@lang('quickadmin.questionoptions.title')</span>--}}
                    {{--                </router-link>--}}
                    {{--            </li>--}}
                    {{--            <li v-if="$can('personalityoption_access')">--}}
                    {{--                <router-link :to="{ name: 'personalityoptions.index' }">--}}
                    {{--                    <i class="fa fa-gears"></i>--}}
                    {{--                    <span>@lang('quickadmin.personalityoptions.title')</span>--}}
                    {{--                </router-link>--}}
                    {{--            </li>--}}
                    {{--            <li v-if="$can('answer_access')">--}}
                    {{--                <router-link :to="{ name: 'answers.index' }">--}}
                    {{--                    <i class="fa fa-gears"></i>--}}
                    {{--                    <span>@lang('quickadmin.answers.title')</span>--}}
                    {{--                </router-link>--}}
                    {{--            </li>--}}
                    {{--            <li v-if="$can('personalityanswer_access')">--}}
                    {{--                <router-link :to="{ name: 'personalityanswers.index' }">--}}
                    {{--                    <i class="fa fa-gears"></i>--}}
                    {{--                    <span>@lang('quickadmin.personalityanswers.title')</span>--}}
                    {{--                </router-link>--}}
                    {{--            </li>--}}
                    {{--            <li v-if="$can('message_access')">--}}
                    {{--                <router-link :to="{ name: 'messages.index' }">--}}
                    {{--                    <i class="fa fa-gears"></i>--}}
                    {{--                    <span>@lang('quickadmin.message.title')</span>--}}
                    {{--                </router-link>--}}
                    {{--            </li>--}}
                    {{--            <li v-if="$can('messageconection_access')">--}}
                    {{--                <router-link :to="{ name: 'messageconections.index' }">--}}
                    {{--                    <i class="fa fa-gears"></i>--}}
                    {{--                    <span>@lang('quickadmin.messageconection.title')</span>--}}
                    {{--                </router-link>--}}
                    {{--            </li>--}}
                    {{--            <li v-if="$can('messagedelete_access')">--}}
                    {{--                <router-link :to="{ name: 'messagedeletes.index' }">--}}
                    {{--                    <i class="fa fa-gears"></i>--}}
                    {{--                    <span>@lang('quickadmin.messagedelete.title')</span>--}}
                    {{--                </router-link>--}}
                    {{--            </li>--}}
                    {{--            <li v-if="$can('messageblock_access')">--}}
                    {{--                <router-link :to="{ name: 'messageblocks.index' }">--}}
                    {{--                    <i class="fa fa-gears"></i>--}}
                    {{--                    <span>@lang('quickadmin.messageblock.title')</span>--}}
                    {{--                </router-link>--}}
                    {{--            </li>--}}
                    {{--            <li v-if="$can('whoviewme_access')">--}}
                    {{--                <router-link :to="{ name: 'whoviewmes.index' }">--}}
                    {{--                    <i class="fa fa-gears"></i>--}}
                    {{--                    <span>@lang('quickadmin.whoviewme.title')</span>--}}
                    {{--                </router-link>--}}
                    {{--            </li>--}}
                    {{--            <li v-if="$can('usercommeetrequest_access')">--}}
                    {{--                <router-link :to="{ name: 'usercommeetrequests.index' }">--}}
                    {{--                    <i class="fa fa-gears"></i>--}}
                    {{--                    <span>@lang('quickadmin.usercommeetrequest.title')</span>--}}
                    {{--                </router-link>--}}
                    {{--            </li>--}}
                    {{--            <li v-if="$can('usergroupmap_access')">--}}
                    {{--                <router-link :to="{ name: 'usergroupmaps.index' }">--}}
                    {{--                    <i class="fa fa-gears"></i>--}}
                    {{--                    <span>@lang('quickadmin.usergroupmap.title')</span>--}}
                    {{--                </router-link>--}}
                    {{--            </li>--}}
                    {{--            <li v-if="$can('groupsmember_access')">--}}
                    {{--                <router-link :to="{ name: 'groupsmembers.index' }">--}}
                    {{--                    <i class="fa fa-gears"></i>--}}
                    {{--                    <span>@lang('quickadmin.groupsmembers.title')</span>--}}
                    {{--                </router-link>--}}
                    {{--            </li>--}}
                    {{--            <li v-if="$can('usersession_access')">--}}
                    {{--                <router-link :to="{ name: 'usersessions.index' }">--}}
                    {{--                    <i class="fa fa-gears"></i>--}}
                    {{--                    <span>@lang('quickadmin.usersession.title')</span>--}}
                    {{--                </router-link>--}}
                    {{--            </li>--}}
                    {{--            <li v-if="$can('redirectlink_access')">--}}
                    {{--                <router-link :to="{ name: 'redirectlinks.index' }">--}}
                    {{--                    <i class="fa fa-gears"></i>--}}
                    {{--                    <span>@lang('quickadmin.redirectlinks.title')</span>--}}
                    {{--                </router-link>--}}
                    {{--            </li>--}}
                    {{--            <li v-if="$can('weeklyhit_access')">--}}
                    {{--                <router-link :to="{ name: 'weeklyhits.index' }">--}}
                    {{--                    <i class="fa fa-gears"></i>--}}
                    {{--                    <span>@lang('quickadmin.weeklyhits.title')</span>--}}
                    {{--                </router-link>--}}
                    {{--            </li>--}}
                                <li v-if="$can('astrologycalcsign_access')">
                                    <router-link :to="{ name: 'astrologycalcsigns.index' }">
                                        <i class="fa fa-file-text"></i>
                                        <span>Zodiac Match</span>
                                    </router-link>
                                </li>
                                <li v-if="$can('payment_access')">
                                    <router-link :to="{ name: 'payments.index' }">
                                        <i class="fa fa-money"></i>
                                        <span>@lang('quickadmin.payments.title')</span>
                                    </router-link>
                                </li>
                                <li v-if="$can('astrologycalcsign_access')">
                                    <router-link :to="{ name: 'reportproblem' }">
                                        <i class="fa fa-file-text-o"></i>
                                        <span>Report Problem</span>
                                    </router-link>
                                </li>
                                <li v-if="$can('astrologycalcsign_access')">
                                    <router-link :to="{ name: 'reportimage' }">
                                        <i class="fa fa-file-text-o"></i>
                                        <span>Report Image</span>
                                    </router-link>
                                </li>
                    {{--            <li v-if="$can('userspaymentsplan_access')">--}}
                    {{--                <router-link :to="{ name: 'userspaymentsplans.index' }">--}}
                    {{--                    <i class="fa fa-gears"></i>--}}
                    {{--                    <span>@lang('quickadmin.userspaymentsplan.title')</span>--}}
                    {{--                </router-link>--}}
                    {{--            </li>--}}
                    {{--            <li v-if="$can('uservideo_access')">--}}
                    {{--                <router-link :to="{ name: 'uservideos.index' }">--}}
                    {{--                    <i class="fa fa-gears"></i>--}}
                    {{--                    <span>@lang('quickadmin.uservideos.title')</span>--}}
                    {{--                </router-link>--}}
                    {{--            </li>--}}
                    {{--            <li v-if="$can('blockuser_access')">--}}
                    {{--                <router-link :to="{ name: 'blockusers.index' }">--}}
                    {{--                    <i class="fa fa-gears"></i>--}}
                    {{--                    <span>@lang('quickadmin.blockusers.title')</span>--}}
                    {{--                </router-link>--}}
                    {{--            </li>--}}
                    {{--            <li v-if="$can('subscriptionplan_access')">--}}
                    {{--                <router-link :to="{ name: 'subscriptionplans.index' }">--}}
                    {{--                    <i class="fa fa-gears"></i>--}}
                    {{--                    <span>@lang('quickadmin.subscriptionplan.title')</span>--}}
                    {{--                </router-link>--}}
                    {{--            </li>--}}
                    {{--            <li v-if="$can('astrologycalc_access')">--}}
                    {{--                <router-link :to="{ name: 'astrologycalcs.index' }">--}}
                    {{--                    <i class="fa fa-gears"></i>--}}
                    {{--                    <span>@lang('quickadmin.astrologycalc.title')</span>--}}
                    {{--                </router-link>--}}
                    {{--            </li>--}}
                @endif
                <li>
                    <router-link :to="{ name: 'auth.change_password' }">
                        <i class="fa fa-key"></i>
                        <span class="title">@lang('quickadmin.qa_change_password')</span>
                    </router-link>
                </li>

                <li>
                    <a href="#logout" onclick="$('#logout').submit();">
                        <i class="fa fa-sign-out"></i>
                        <span class="title">@lang('quickadmin.qa_logout')</span>
                    </a>
                </li>
            </ul>
        </section>
    </aside>
@endif
